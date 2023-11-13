<?php


namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
class ImageService
{
    private $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }
    public function add(UploadedFile $image, ?string $folder ='', ?int $width = 250, ?int $height = 250)
    {
        // On donne un nouveau nom à l'image
        $fichier = md5(uniqid(rand(), true)) . '.webp';
        
        // On récupère les infos de l'image
        $image_infos = getimagesize($image);

        if($image_infos === false){
            throw new Exception('Format d\'image incorrect');
        }
        // On verifie le format de l'image
        switch ($image_infos['mime']) {
            case 'image/png':
               $image_source = imagecreateformpng($image);
                break;
            
            case 'image/jpeg':
                $image_source = imagecreateformjpeg($image);
                break;
            default;
                throw new Exception('Format d\'image incorrect');                 
        }
        // On recadre l'image 
        // On récupère les dimensions
        $imagewidth = $image_infos[0];
        $imageHeight = $image_infos[1];


        // On verifie l'orientation de l'image 
        switch ($imageWidth <=> $imageHeight) {
            case -1: // portrait
                $squareSize =  $imageWidth;
                $src_x = 0;
                $src_y = ($imageHeight - $squareSize) / 2;
                break;

            case 0: // carré
                $squareSize =  $imageWidth;
                $src_x = 0;
                $src_y = 0;
                break;

            case 1: // paysage
                $squareSize =  $imageHeight;
                $src_x = ($imageWidth - $squareSize) / 2;;
                $src_y = 0;
                break;
                
        }

        // On crée une nouvelle image "vierge"
        $resized_image = imagecreatetruecolor($width, $height);

        imagecopyresampled($resized_image, $image_source, 0, 0, $src_x, $src_y,
        $width, $height, $squareSize, $squareSize);

        $path = $this->params->get('images_directory') . $folder;


        // On crée le dossier de destination s'il n'existe pas
        if(!file_exists($path . '/mini/')){
            mkdir($path . '/mini/', 0755, true); 
        }
        

        // On stocke l'image recadrée 
        imagewebp($resized_image, $path . '/mini/' . $width . 'x' .
        $height . '-' . $fichier);

        $image->move($path . '/', $fichier);

        return $fichier; 
    }

    public function delete(string $fichier, ?string $folder = '', 
    ?int $width = 250, ?int $height = 250)
    {

    
        if($fichier !== 'default.webp'){
            $success = false; 
            $path = $this->params->get('images_directory') . $folder;
            $mini = $path . '/mini/' . $width . 'x' . $height . '-' .
            $fichier; 

            if(file_exists($mini)){
                unlink($mini);
                $success = true; 
            }
            $original = $path . '/' . $fichier;

            if(file_exists($original)){
                unlink($mini);
                $success = true;
            }
            return $success; 
        }
        return false; 
                   
    }
}
