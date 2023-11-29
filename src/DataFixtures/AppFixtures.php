<?php

namespace App\DataFixtures;

use App\Entity\Users;
use App\Entity\Adresse;
use App\Entity\Produit;
use App\Entity\Commande;
use App\Entity\Categorie;
use App\Entity\Commercial;
use App\Entity\Fournisseur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
        private $hasher;

        public function __construct(UserPasswordHasherInterface $hasher)
        {
                $this->hasher = $hasher;
        }
        public function load(ObjectManager $manager): void
        {

                $fournisseur1 = new Fournisseur();
                $fournisseur1->setnomfou('Galbiati')
                        ->setadrfou('32 rue winston churchill')
                        ->setpostfou('60100')
                        ->setvillefou('Creil')
                        ->setmailfou('angedave@live.fr')
                        ->settelfou('0322514587');
                        $manager->persist($fournisseur1);
                
                $fournisseur2 = new Fournisseur(); 
                $fournisseur2->setnomfou('Adzayi')
                        ->setadrfou('02 rue winston churchill')
                        ->setpostfou('80080')
                        ->setvillefou('Amiens')
                        ->setmailfou('story@live.fr')
                        ->settelfou('0322514847');
                        $manager->persist($fournisseur2);


                $fournisseur3 = new Fournisseur(); 
                $fournisseur3->setnomfou('Hagbe')
                        ->setadrfou('5 avenue de la division leclerc')
                        ->setpostfou('94110')
                        ->setvillefou('Cachan')
                        ->setmailfou('hagbei@gmail.com')
                        ->settelfou('0654892135');
                        $manager->persist($fournisseur3);

                $fournisseur4 = new Fournisseur(); 
                $fournisseur4->setnomfou('Acka')
                        ->setadrfou('21 rue clement ader')
                        ->setpostfou('94110')
                        ->setvillefou('Arcueil')
                        ->setmailfou('ackalo@outlook.fr')
                        ->settelfou('0758412367');
                        $manager->persist($fournisseur4);

                $fournisseur5 = new Fournisseur(); 
                $fournisseur5->setnomfou('Zah')
                        ->setadrfou('8 rue hironval')
                        ->setpostfou('60100')
                        ->setvillefou('Creil')
                        ->setmailfou('azah14@gmail.com')
                        ->settelfou('0657891235');
                        $manager->persist($fournisseur5);

                $fournisseur6 = new Fournisseur(); 
                $fournisseur6->setnomfou('Konan')
                        ->setadrfou('32 rue paul claudel')
                        ->setpostfou('60100')
                        ->setvillefou('Creil')
                        ->setmailfou('konanve@yahoo.fr')
                        ->settelfou('0745126857');
                        $manager->persist($fournisseur6);

                $fournisseur7 = new Fournisseur(); 
                $fournisseur7->setnomfou('Peralvo')
                        ->setadrfou('32 rue winston churchill')
                        ->setpostfou('75007')
                        ->setvillefou('Paris')
                        ->setmailfou('peperal@yahoo.fr')
                        ->settelfou('0685412564');
                        $manager->persist($fournisseur7);

                $fournisseur8 = new Fournisseur(); 
                $fournisseur8->setnomfou('Fernandez')
                        ->setadrfou('322 rue jules michelet')
                        ->setpostfou('60100')
                        ->setvillefou('Creil')
                        ->setmailfou('angedave@live.fr')
                        ->settelfou('0322514587');
                        $manager->persist($fournisseur8);

                $fournisseur9 = new Fournisseur(); 
                $fournisseur9->setnomfou('Vehai')
                        ->setadrfou('2 rue winston churchill')
                        ->setpostfou('80800')
                        ->setvillefou('Amiens')
                        ->setmailfou('vehai@live.fr')
                        ->settelfou('0322517887');
                        $manager->persist($fournisseur9);


                $fournisseur10 = new Fournisseur(); 
                $fournisseur10->setnomfou('Koudou')
                        ->setadrfou('111 boulevard carnot')
                        ->setpostfou('78110')
                        ->setvillefou('le vesinet le pecq')
                        ->setmailfou('koudou@live.fr')
                        ->settelfou('0622514587');
                        $manager->persist($fournisseur10);

                $users1 = new Users();
                $users1->setnom('Kouadio')
                ->setprenom('Celestin');
                $password = $this->hasher->hashPassword($users1, "Afpa1234");
                $users1->setPassword($password)
                ->setsexe('M')
                ->setemail('kouadiocelestin@live.fr')
                ->setadresse('2 rue Cazotte')
                ->setcodepostal('75018')
                ->setville('Paris')
                ->setRoles(['ROLE_ADMIN'])
                ->setCreatedAt(new \DateTimeImmutable())
                ->settelephone('0765894512');
                $manager->persist($users1);


                $users2 = new Users();
                $users2->setnom('Dembele')
                ->setprenom('Romane');
                $password = $this->hasher->hashPassword($users2, "Afpa1234");
                $users2->setPassword($password)
                ->setsexe('F')
                ->setemail('dembeleromane@gmail.com')
                ->setadresse('36 avenue De Clichy')
                ->setcodepostal('75018')
                ->setville('Paris')
                ->setCreatedAt(new \DateTimeImmutable())
                ->settelephone('0689953612');
                $manager->persist($users2);



                $users3 = new Users();
                $users3->setnom('Trottier')
                ->setprenom('Amand');
                $password = $this->hasher->hashPassword($users3, "Afpa1234");
                $users3->setPassword($password)
                ->setsexe('M')
                ->setemail('trottieramand@live.fr')
                ->setadresse('88 boulevard Rochechouart')
                ->setcodepostal('80080')
                ->setville('Amiens')
                ->setCreatedAt(new \DateTimeImmutable())
                ->settelephone('0684125696');
                $manager->persist($users3);



                $users4 = new Users();
                $users4->setnom('Choquet')
                ->setprenom('Eliane');
                $password = $this->hasher->hashPassword($users4, "Afpa1234");
                $users4->setPassword($password)
                ->setsexe('F')
                ->setEmail('choqueteliane54@outlook.fr')
                ->setadresse('98 rue Caulaincourt')
                ->setcodepostal('60100')
                ->setville('Creil')
                ->setCreatedAt(new \DateTimeImmutable())
                ->settelephone('0724517895');
                $manager->persist($users4);


                $users5 = new Users();
                $users5->setnom('Lefeuvre')
                ->setprenom('Mireille');
                $password = $this->hasher->hashPassword($users5, "Afpa1234");
                $users5->setPassword($password)
                ->setsexe('F')
                ->setEmail('lefeuvremireille@gmail.com')
                ->setadresse('128 boulevard De Clichy')
                ->setcodepostal('75018')
                ->setville('Paris')
                ->setCreatedAt(new \DateTimeImmutable())
                ->settelephone('0708541269');
                $manager->persist($users5);



                $users6 = new Users();
                $users6->setnom('Jegou')
                ->setprenom('Blanche');
                $password = $this->hasher->hashPassword($users6, "Afpa1234");
                $users6->setPassword($password)
                ->setsexe('F')
                ->setEmail('jegoublanche@outlook.fr')
                ->setadresse('52 boulevard Barbes')
                ->setcodepostal('75018')
                ->setville('Paris')
                ->setCreatedAt(new \DateTimeImmutable())
                ->settelephone('0787451265');
                $manager->persist($users6);


                $users7 = new Users();
                $users7->setnom('Dubois')
                ->setprenom('Marie Josey');
                $password = $this->hasher->hashPassword($users7, "Afpa1234");
                $users7->setPassword($password)
                ->setsexe('F')
                ->setEmail('duboismariejosey@yahoo.fr')
                ->setadresse('6 boulevard de Clichy')
                ->setcodepostal('75018')
                ->setville('Paris')
                ->setCreatedAt(new \DateTimeImmutable())
                ->settelephone('0622445566');
                $manager->persist($users7);


                $users8 = new Users();
                $users8->setnom('Daucourt')
                ->setprenom('Sigolene');
                $password = $this->hasher->hashPassword($users8, "Afpa1234");
                $users8->setPassword($password)
                ->setsexe('F')
                ->setEmail('daucourtsigolene@yahoo.fr')
                ->setadresse('112 boulevard De La Chapelle')
                ->setcodepostal('94110')
                ->setville('Arcueil')
                ->setCreatedAt(new \DateTimeImmutable())
                ->settelephone('0799887744');
                $manager->persist($users8);


                $users9 = new Users();
                $users9->setnom('Affre')
                ->setprenom('Lou');
                $password = $this->hasher->hashPassword($users9, "Afpa1234");
                $users9->setPassword($password)
                ->setsexe('F')
                ->setEmail('affrelou@yahoo.fr')
                ->setadresse('60 rue De Torcy')
                ->setcodepostal('75018')
                ->setville('Paris')
                ->setCreatedAt(new \DateTimeImmutable())
                ->settelephone('0733415278');
                $manager->persist($users9);


                $users10 = new Users();
                $users10->setnom('Bureau')
                ->setprenom('Claudine');
                $password = $this->hasher->hashPassword($users10, "Afpa1234");
                $users10->setPassword($password)
                ->setsexe('F')
                ->setEmail('bureauclaudine4@live.fr')
                ->setadresse('280 boulevard Michelet ')
                ->setcodepostal('13008')
                ->setville('Marseille')
                ->setCreatedAt(new \DateTimeImmutable())
                ->settelephone('0755998430');
                $manager->persist($users10);


                $users11 = new Users();
                $users11->setnom('Chapuis')
                ->setprenom('Deborah');
                $password = $this->hasher->hashPassword($users11, "Afpa1234");
                $users11->setPassword($password)
                ->setsexe('F')
                ->setEmail('chapuisdeborah@live.fr')
                ->setadresse('29 rue Desire Pellaprat')
                ->setcodepostal('13008')
                ->setville('Marseille')
                ->setCreatedAt(new \DateTimeImmutable())
                ->settelephone('0777763067');
                $manager->persist($users11);


                $users12 = new Users();
                $users12->setnom('Cuvillier')
                ->setprenom('Marie');
                $password = $this->hasher->hashPassword($users12, "Afpa1234");
                $users12->setPassword($password)
                ->setsexe('F')
                ->setEmail('cuvilliermarie@gmail.com')
                ->setadresse('4 rue des Recolettes ')
                ->setcodepostal('13001')
                ->setville('Marseille')
                ->setCreatedAt(new \DateTimeImmutable())
                ->settelephone('0605802768');
                $manager->persist($users12);


                $users13 = new Users();
                $users13->setnom('Garnier')
                ->setprenom('Clara');
                $password = $this->hasher->hashPassword($users13, "Afpa1234");
                $users13->setPassword($password)
                ->setsexe('F')
                ->setEmail('garnierclara@gmail.com')
                ->setadresse('39 rue Saint Remi')
                ->setcodepostal('33000')
                ->setville('Bordeaux')
                ->setCreatedAt(new \DateTimeImmutable())
                ->settelephone('0626589004');
                $manager->persist($users13);


                $users14 = new Users();
                $users14->setnom('LeMahieu')
                ->setprenom('Peggy');
                $password = $this->hasher->hashPassword($users14, "Afpa1234");
                $users14->setPassword($password)
                ->setsexe('F')
                ->setEmail('lemahieupeggy@outlook.fr')
                ->setadresse('52 rue Croix de Seguey')
                ->setcodepostal('33000')
                ->setville('Bordeaux')
                ->setCreatedAt(new \DateTimeImmutable())
                ->settelephone('0765890385');
                $manager->persist($users14);


                $users15 = new Users();
                $users15->setnom('Anouilh')
                ->setprenom('Celine');
                $password = $this->hasher->hashPassword($users15, "Afpa1234");
                $users15->setPassword($password)
                ->setsexe('F')
                ->setEmail('anouilhceline@outlook.fr')
                ->setadresse('7 rue du Palais Gallien')
                ->setcodepostal('33000')
                ->setville('Bordeaux')
                ->setCreatedAt(new \DateTimeImmutable())
                ->settelephone('0769639654');
                $manager->persist($users15);



                $commande1 = new Commande();
                $commande1->setTransporteurNom('')
                        ->setTransporteurPrix(10,0)
                        ->setLivraison('')
                        ->setAdrFact('')
                        ->setComFactId(1)
                        ->setFactureTotalTtc(298)
                        ->setFactureTotalHt(270)
                        ->setFactureTva(20)
                        ->setIsPaid('')
                        ->setPaypalCommandeId('')
                        ->setCreateAt(new \DateTimeImmutable())
                        ->setMethode('')
                        ->setReference('')
                        ->setStripeSessionId('');
                        $manager->persist($commande1);


                $adresse1 = new Adresse();
                $adresse1->setTitre('ma maison')
                        ->setPrenom('Lucas')
                        ->setNom('Dro')
                        ->setAdresse('20 rue jfkfkf')
                        ->setCodepostal('80080')
                        ->setVille('Amiens')
                        ->setTelephone('0767897678')
                        ->setPays('France');
                        $manager->persist($adresse1);

                $adresse2 = new Adresse();
                $adresse2->setTitre('au travail')
                        ->setPrenom('Quentin')
                        ->setNom('Alexandre')
                        ->setAdresse('4 rue henri dunant')
                        ->setCodepostal('60100')
                        ->setVille('Creil')
                        ->setTelephone('0_67897678')
                        ->setPays('Suisse');
                        $manager->persist($adresse2);




                $categorie1 = new Categorie();
                $categorie1->setnomcat('Accessoires')
                ->setimage('acc.JPG');
                $manager->persist($categorie1);

                $categorie2 = new Categorie();
                $categorie2->setnomcat('Perruques')
                ->setimage('image46.jpeg');
                $manager->persist($categorie2);

                $categorie3 = new Categorie();
                $categorie3->setnomcat('Tissages brésilien')
                ->setimage('tissage.jpeg');
                $manager->persist($categorie3);

                $souscategorie1 = new Categorie();
                $souscategorie1->setnomcat('Bonnets')
                ->setParent($categorie1)
                ->setimage('');
                $manager->persist($souscategorie1);

                $souscategorie2 = new Categorie();
                $souscategorie2->setnomcat('Coloration')
                ->setParent($categorie1)
                ->setimage('');
                $manager->persist($souscategorie2);

                $souscategorie3 = new Categorie();
                $souscategorie3->setnomcat('Lisseur peigne chauffant')
                ->setParent($categorie1)
                ->setimage('');
                $manager->persist($souscategorie3);

                $souscategorie4 = new Categorie();
                $souscategorie4->setnomcat('Carré plongeant')
                ->setParent($categorie2)
                ->setimage('');
                $manager->persist($souscategorie4);

                $souscategorie5 = new Categorie();
                $souscategorie5->setnomcat('Perruque courte')
                ->setParent($categorie2)
                ->setimage('');
                $manager->persist($souscategorie5);

                $souscategorie6 = new Categorie();
                $souscategorie6->setnomcat('Perruque 360°')
                ->setParent($categorie2)
                ->setimage('');
                $manager->persist($souscategorie6);

                $souscategorie7 = new Categorie();
                $souscategorie7->setnomcat('Perruque de couleur ')
                ->setParent($categorie2)
                ->setimage('');
                $manager->persist($souscategorie7);

                $souscategorie8 = new Categorie();
                $souscategorie8->setnomcat('Perruque frange')
                ->setParent($categorie2)
                ->setimage('');
                $manager->persist($souscategorie8);

                $souscategorie9 = new Categorie();
                $souscategorie9->setnomcat('Perruque sans colle')
                ->setParent($categorie2)
                ->setimage('');
                $manager->persist($souscategorie9);

                $souscategorie10 = new Categorie();
                $souscategorie10->setnomcat('Pack 3 bundle')
                ->setParent($categorie3)
                ->setimage('');
                $manager->persist($souscategorie10);

                $souscategorie11 = new Categorie();
                $souscategorie11->setnomcat('Pack 3 bundle + closure')
                ->setParent($categorie3)
                ->setimage('');
                $manager->persist($souscategorie11);

                $souscategorie12 = new Categorie();
                $souscategorie12->setnomcat('Pack 3 bundle dégradé + closure')
                ->setParent($categorie3)
                ->setimage('');
                $manager->persist($souscategorie12);

                
                $produit1 = new Produit();
                $produit1->setrubriqueart('Accessoires')
                        ->setsousrubriqueart('BONNETS')
                        ->setlibcourt('Un bonnet 1 ')
                        ->setliblong('Bonnet 1 de couleur noire  ')
                        ->setreffou('fournisseur2')
                        ->setFournisseur($fournisseur2)
                        ->setprixachat(3)
                        ->setquantite(12)
                        ->setphoto('bo1.jpeg');
                        $manager->persist($produit1);
                        $souscategorie1->addProduit($produit1);


                $produit2 = new Produit();
                $produit2->setrubriqueart('Accessoires')
                        ->setsousrubriqueart('BONNETS')
                        ->setlibcourt('Un bonnet 2')
                        ->setliblong('Bonnet 2 de couleur crème')
                        ->setreffou('fournisseur5')
                        ->setFournisseur($fournisseur5)
                        ->setprixachat(3)
                        ->setquantite(10)
                        ->setphoto('bo2.jpeg');
                        $manager->persist($produit2);
                        $souscategorie1->addProduit($produit2);


                $produit3 = new Produit();
                $produit3->setrubriqueart('Accessoires')
                        ->setsousrubriqueart('COLORATION')
                        ->setlibcourt('Une coloration 1')
                        ->setliblong('Coloration 1 rouge bordeau')
                        ->setreffou('fournisseur7')
                        ->setFournisseur($fournisseur7)
                        ->setprixachat(10)
                        ->setquantite(9)
                        ->setphoto('colo2.jpeg');
                        $manager->persist($produit3);
                        $souscategorie2->addProduit($produit3);


                $produit4 = new Produit();
                $produit4->setrubriqueart('Accessoires')
                        ->setsousrubriqueart('COLORATION')
                        ->setlibcourt('Une coloration 2')
                        ->setliblong('Coloration 2 blond')
                        ->setreffou('fournisseur1')
                        ->setFournisseur($fournisseur1)
                        ->setprixachat(10)
                        ->setquantite(8)
                        ->setphoto('colo3.jpeg');
                        $manager->persist($produit4);
                        $souscategorie2->addProduit($produit4);


                $produit5 = new Produit();
                $produit5->setrubriqueart('Accessoires')
                        ->setsousrubriqueart('LISSEUR PEIGNE CHAUFFANT')
                        ->setlibcourt('Un lisseur peigne chauffant 1')
                        ->setliblong('Lisseur peigne chauffant 1 or noir')
                        ->setreffou('fournisseur2')
                        ->setFournisseur($fournisseur2)
                        ->setprixachat(25)
                        ->setquantite(9)
                        ->setphoto('lisseur1.jpeg');
                        $manager->persist($produit5);
                        $souscategorie3->addProduit($produit5);


                $produit6 = new Produit();
                $produit6->setrubriqueart('Accessoires')
                        ->setsousrubriqueart('LISSEUR PEIGNE CHAUFFANT ')
                        ->setlibcourt('Un lisseur peigne chauffant 2')
                        ->setliblong('Lisseur peigne chauffant 2 noir')
                        ->setreffou('fournisseur9')
                        ->setFournisseur($fournisseur9)
                        ->setprixachat(30)
                        ->setquantite(14)
                        ->setphoto('lisseur3.jpeg');
                        $manager->persist($produit6);
                        $souscategorie3->addProduit($produit6);


                $produit7 = new Produit();
                $produit7->setrubriqueart('Perruques')
                        ->setsousrubriqueart('Carré plongeant')
                        ->setlibcourt('Bobo wig front lace 13*4 raide noir standard ')
                        ->setliblong('La dentelle HD est un matériau de dentelle royale également appelé dentelle suisse, qui est invisible lorsqu elle est appliquée sur le cuir chevelu. Cela garantit que le porteur de la perruque peut avoir une racine des cheveux exposée, ce qui semble très naturel et rend la dentelle le long de la racine des cheveux hautement indétectable.')
                        ->setreffou('fournisseur8')
                        ->setFournisseur($fournisseur8)
                        ->setprixachat(125)
                        ->setquantite(11)
                        ->setphoto('image4.jpg');
                        $manager->persist($produit7);
                        $souscategorie4->addProduit($produit7);


                $produit8 = new Produit();
                $produit8->setrubriqueart('Perruques')
                        ->setsousrubriqueart('Perruque courte')
                        ->setlibcourt('Perruque courte noire curly.')
                        ->setliblong('Si vous voulez une coupe courte, curly et tendance, la Pixie curly est un excellent choix. Idéal pour un look féminin et chic. Cette parruque est conçue à la main dans nos ateliers. Ce modèle est facile à porter et idéale pour toutes les occasions!')
                        ->setreffou('fournisseur6')
                        ->setFournisseur($fournisseur6)
                        ->setprixachat(99)
                        ->setquantite(7)
                        ->setphoto('image16.jpg');
                        $manager->persist($produit8);
                        $souscategorie5->addProduit($produit8);


                $produit9 = new Produit();
                $produit9->setrubriqueart('Perruques')
                        ->setsousrubriqueart('Perruques 360°')
                        ->setlibcourt('Perruque noire lace frontal 360 ondulée.')
                        ->setliblong('Bonnet perruque taille standard, 3 peignes, 2 sangles élastiques réglables, perruque lace frontal cap respirant et confortable.')
                        ->setreffou('fournisseur3')
                        ->setFournisseur($fournisseur3)
                        ->setprixachat(350)
                        ->setquantite(10)
                        ->setphoto('image47.jpeg');
                        $manager->persist($produit9);
                        $souscategorie6->addProduit($produit9);


                $produit10 = new Produit();
                $produit10->setrubriqueart('Perruques')
                        ->setsousrubriqueart('Perruques de couleurs')
                        ->setlibcourt('Perruque de couleur coupe courte curly.')
                        ->setliblong('Si vous voulez une coupe courte, curly et tendance, la Pixie curly est un excellent choix. Idéal pour un look féminin et chic. Cette parruque est conçue à la main dans nos ateliers. Ce modèle est facile à porter et idéale pour toutes les occasions!')
                        ->setreffou('fournisseur4')
                        ->setFournisseur($fournisseur4)
                        ->setprixachat(100)
                        ->setquantite(7)
                        ->setphoto('image56.jpg');
                        $manager->persist($produit10);
                        $souscategorie7->addProduit($produit10);


                $produit11 = new Produit();
                $produit11->setrubriqueart('Perruques')
                        ->setsousrubriqueart('Perruques frange')
                        ->setlibcourt('Perruque frange noire.')
                        ->setliblong('Perruque moyenne noire ondulée à frange. Elle est idéal pour toutes celles qui souhaitent changer de look en un clin d oeil. Nos perruques sont fabriquées avec soin, toujours dans un grand souci de qualité. A chacune son style, trouvez le vôtre!')
                        ->setreffou('fournisseur10')
                        ->setFournisseur($fournisseur10)
                        ->setprixachat(125)
                        ->setquantite(6)
                        ->setphoto('image114.jpg');
                        $manager->persist($produit11);
                        $souscategorie8->addProduit($produit11);


                $produit12 = new Produit();
                $produit12->setrubriqueart('Perruques')
                        ->setsousrubriqueart('Perruques frange')
                        ->setlibcourt('Perruque frange noire.')
                        ->setliblong('Perruque frange noire avec possibilité de faire un chignon en haut.')
                        ->setreffou('fournisseur9')
                        ->setFournisseur($fournisseur9)
                        ->setprixachat(135)
                        ->setquantite(3)
                        ->setphoto('image122.jpeg');
                        $manager->persist($produit12);
                        $souscategorie8->addProduit($produit12);


                $produit13 = new Produit();
                $produit13->setrubriqueart('Perruques')
                        ->setsousrubriqueart('Perruques sans colle')
                        ->setlibcourt('Perruque longue noire bouclée ')
                        ->setliblong('Des perruques pédécoupées pour une facilité d utilisation instantanée, pas besoin de colle ni de perdre du temps chez le coiffeur: les perruques pédécoupées sont conçues pour vous offrir une solution capillaire pratique et facile à mettre en place. ')
                        ->setreffou('fournisseur7')
                        ->setFournisseur($fournisseur7)
                        ->setprixachat(225)
                        ->setquantite(8)
                        ->setphoto('image138.jpg');
                        $manager->persist($produit13);
                        $souscategorie9->addProduit($produit13);


                $produit14 = new Produit();
                $produit14->setrubriqueart('Perruques')
                        ->setsousrubriqueart('Perruques sans colle')
                        ->setlibcourt('Perruque longue noire endulée')
                        ->setliblong('Des perruques pédécoupées pour une facilité d utilisation instantanée, pas besoin de colle ni de perdre du temps chez le coiffeur: les perruques pédécoupées sont conçues pour vous offrir une solution capillaire pratique et facile à mettre en place.')
                        ->setreffou('fournisseur8')
                        ->setFournisseur($fournisseur8)
                        ->setprixachat(225)
                        ->setquantite(3)
                        ->setphoto('image144.jpg');
                        $manager->persist($produit14);
                        $souscategorie9->addProduit($produit14);

                $produit15 = new Produit();
                $produit15->setrubriqueart('Tissages brésilien')
                        ->setsousrubriqueart('PACK 3 BUNDLE')
                        ->setlibcourt('Trois boules de tissage lisses de la même taille sans closure')
                        ->setliblong(' Cheveux vierges d origine contrôlée, à porter au naturel, à décolorer ou colorer si vous le souhaitez car ils n ont reçu aucun traitement. Une totale liberté de coiffage après la pose.')
                        ->setreffou('fournisseur7')
                        ->setFournisseur($fournisseur7)
                        ->setprixachat(140)
                        ->setquantite(2)
                        ->setphoto('bundle1.jpg');
                        $manager->persist($produit15);
                        $souscategorie10->addProduit($produit15);

                $produit16 = new Produit();
                $produit16->setrubriqueart('Tissages brésilien')
                        ->setsousrubriqueart('PACK 3 BUNDLE')
                        ->setlibcourt('Trois boules de tissage ondulés de la même taille sans closure')
                        ->setliblong('Cheveux vierges d origine contrôlée, à porter au naturel, à décolorer ou colorer si vous le souhaitez car ils n ont reçu aucun traitement. Une totale liberté de coiffage après la pose.')
                        ->setreffou('fournisseur5')
                        ->setFournisseur($fournisseur5)
                        ->setprixachat(145)
                        ->setquantite(15)
                        ->setphoto('bundle2.jpg');
                        $manager->persist($produit16);
                        $souscategorie10->addProduit($produit16);

                $produit17 = new Produit();
                $produit17->setrubriqueart('Tissages brésilien')
                        ->setsousrubriqueart('PACK 3 BUNDLE')
                        ->setlibcourt('Trois boules de tissage bouclés de la même taille sans closure')
                        ->setliblong('Cheveux vierges d origine contrôlée, à porter au naturel, à décolorer ou colorer si vous le souhaitez car ils n ont reçu aucun traitement. Une totale liberté de coiffage après la pose.')
                        ->setreffou('fournisseur6')
                        ->setFournisseur($fournisseur6)
                        ->setprixachat(145)
                        ->setquantite(16)
                        ->setphoto('bundle3.jpg');
                        $manager->persist($produit17);
                        $souscategorie10->addProduit($produit17);

                $produit18 = new Produit();
                $produit18->setrubriqueart('Tissages brésilien')
                        ->setsousrubriqueart('PACK 3 BUNDLE + CLOSURE')
                        ->setlibcourt('Trois boules de tissage lisses de la même taille + une closure')
                        ->setliblong('Cheveux vierges d origine contrôlée, à porter au naturel, à décolorer ou colorer si vous le souhaitez car ils n ont reçu aucun traitement. Une totale liberté de coiffage après la pose.')
                        ->setreffou('fournisseur5')
                        ->setFournisseur($fournisseur5)
                        ->setprixachat(225)
                        ->setquantite(11)
                        ->setphoto('closure1.jpg');
                        $manager->persist($produit18);
                        $souscategorie11->addProduit($produit18);

                $produit19 = new Produit();
                $produit19->setrubriqueart('Tissages brésilien')
                        ->setsousrubriqueart('PACK 3 BUNDLE + CLOSURE')
                        ->setlibcourt('Trois boules de tissage ondulés de la même taille + une closure')
                        ->setliblong('Cheveux vierges d origine contrôlée, à porter au naturel, à décolorer ou colorer si vous le souhaitez car ils n ont reçu aucun traitement. Une totale liberté de coiffage après la pose.')
                        ->setreffou('fournisseur10')
                        ->setFournisseur($fournisseur10)
                        ->setprixachat(235)
                        ->setquantite(2)
                        ->setphoto('closure2.jpg');
                        $manager->persist($produit19);
                        $souscategorie11->addProduit($produit19);


                $produit20 = new Produit();
                $produit20->setrubriqueart('Tissages brésilien')
                        ->setsousrubriqueart('PACK 3 BUNDLE + CLOSURE')
                        ->setlibcourt('Trois boules de tissage bouclés de la même taille + une closure')
                        ->setliblong('Cheveux vierges d origine contrôlée, à porter au naturel, à décolorer ou colorer si vous le souhaitez car ils n ont reçu aucun traitement. Une totale liberté de coiffage après la pose.')
                        ->setreffou('fournisseur9')
                        ->setFournisseur($fournisseur9)
                        ->setprixachat(235)
                        ->setquantite(1)
                        ->setphoto('closure3.jpg');
                        $manager->persist($produit20);
                        $souscategorie11->addProduit($produit20);


                $produit21 = new Produit();
                $produit21->setrubriqueart('Tissages brésilien')
                        ->setsousrubriqueart('PACK 3 BUNDLE DÉGRADÉ + CLOSURE')
                        ->setlibcourt('Trois boules de tissage lisses dégradé + une closure')
                        ->setliblong('Cheveux vierges d origine contrôlée, à porter au naturel, à décolorer ou colorer si vous le souhaitez car ils n ont reçu aucun traitement. Une totale liberté de coiffage après la pose. ')
                        ->setreffou('fournisseur1')
                        ->setFournisseur($fournisseur1)
                        ->setprixachat(237)
                        ->setquantite(14)
                        ->setphoto('degrade1.jpg');
                        $manager->persist($produit21);
                        $souscategorie12->addProduit($produit21);

                $produit22 = new Produit();
                $produit22->setrubriqueart('Tissages brésilien')
                        ->setsousrubriqueart('PACK 3 BUNDLE DÉGRADÉ + CLOSURE')
                        ->setlibcourt('Trois boules de tissage ondulés dégradé + une closure')
                        ->setliblong('Cheveux vierges d origine contrôlée, à porter au naturel, à décolorer ou colorer si vous le souhaitez car ils n ont reçu aucun traitement. Une totale liberté de coiffage après la pose. ')
                        ->setreffou('fournisseur2')
                        ->setFournisseur($fournisseur2)
                        ->setprixachat(240)
                        ->setquantite(9)
                        ->setphoto('degrade2.jpg');
                        $manager->persist($produit22);
                        $souscategorie12->addProduit($produit22);

                $produit23 = new Produit();
                $produit23->setrubriqueart('Tissages brésilien')
                        ->setsousrubriqueart('PACK 3 BUNDLE DÉGRADÉ + CLOSURE')
                        ->setlibcourt('Trois boules de tissage bouclés dégradé + une closure')
                        ->setliblong('Cheveux vierges d origine contrôlée, à porter au naturel, à décolorer ou colorer si vous le souhaitez car ils n ont reçu aucun traitement. Une totale liberté de coiffage après la pose. ')
                        ->setreffou('fournisseur1')
                        ->setFournisseur($fournisseur1)
                        ->setprixachat(240)
                        ->setquantite(19)
                        ->setphoto('degrade3.jpg');
                        $manager->persist($produit23);
                        $souscategorie12->addProduit($produit23);
                        $manager->flush();

        }

}




