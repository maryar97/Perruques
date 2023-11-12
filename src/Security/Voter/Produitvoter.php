<?php  

namespace App\Security\Voter;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class ProduitVoter extends Voter
{


    private $security; 

    public function __construct(Security $security)

    {
            $this->security = $security;
    }
    

    protected function supports(string $attribute, $produitRepository): bool
    {
        if(!in_array($attribute, [self:: EDIT, self::DELETE]))
        {
            return false; 
        }
        if (!$produitRepository instanceof ProduitRepository)
        {
            return false; 
        }
        return true; 

        // return in_array($attribute, [self:: EDIT, self::DELETE]) && $produitRepository instanceof ProduitRepository; 
    }

    protected function voteOnAttribute($attribute, $produitRepository, TokenInterface $token): bool
    {
        // on recupère l'utilisateur a partir du token 
        $user = $token->getUser();


        if(!$user instanceof UserInterface) return false; 

        // on verifie si l'utilisateur est admin 
        if($this->security->isGranted('ROLE_ADMIN')) return true; 

        // on verifie les permissions 
        switch($attribute){
            case self:: EDIT:
                // on verifie si l'utilisateur peut éditer
                return $this->canEdit();
                break; 
            case self:: DELETE:
                // on verifie si l'utilisateur peut supprimer 
                return $this->candDELETE();
                break; 
        }
    }
    private function canEdit(){
        return $this->security->isGranted(('ROLE_ADMIN'));
    }

    private function candDELETE(){
        return $this->security->isGranted(('ROLE_ADMIN'));
    }
}


