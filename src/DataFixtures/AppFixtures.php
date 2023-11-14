<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Commande;
use App\Entity\Commercial;
use App\Entity\Fournisseur;
use App\Entity\Livraison;
use App\Entity\Produit;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
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


        $commercial1 = new Commercial();
        $commercial1->setnomcomm('Poirot')
            ->setprenomcomm('Penelope')
            ->setmailcomm('poirotpene@live.fr')
            ->settauxcomm('10')
            ->settelcomm('0785964125');
            $manager->persist($commercial1);

        $commercial2 = new Commercial();
        $commercial2->setnomcomm('Minta')
            ->setprenomcomm('grâce')
            ->setmailcomm('graceminta@gmail.com')
            ->settauxcomm('10')
            ->settelcomm('0384125698');
            $manager->persist($commercial2);


        $commercial3 = new Commercial();
        $commercial3->setnomcomm('Kouadio')
            ->setprenomcomm('Jean')
            ->setmailcomm('jeankouadio1@outlook.fr')
            ->settauxcomm('10')
            ->settelcomm('0162345789');
            $manager->persist($commercial3);

        $commercial4 = new Commercial();
        $commercial4->setnomcomm('Leroy')
            ->setprenomcomm('Christophe')
            ->setmailcomm('christopheleroy@gmail.fr')
            ->settauxcomm('15')
            ->settelcomm('0365489562');
            $manager->persist($commercial4);


        $commercial5 = new Commercial();
        $commercial5->setnomcomm('Picolo')
            ->setprenomcomm('mohammed')
            ->setmailcomm('mohammed125@live.fr')
            ->settauxcomm('12')
            ->settelcomm('0345869125');
            $manager->persist($commercial5);

        $commercial6 = new Commercial();
        $commercial6->setnomcomm('Poisson')
            ->setprenomcomm('Serge')
            ->setmailcomm('poissonserge25@gmail.com')
            ->settauxcomm('10')
            ->settelcomm('0322548756');
            $manager->persist($commercial6);

        $commercial7 = new Commercial();
        $commercial7->setnomcomm('Léonard')
            ->setprenomcomm('Celice')
            ->setmailcomm('leonardcelice@hootmail.fr')
            ->settauxcomm('12')
            ->settelcomm('0322965412');
            $manager->persist($commercial7);

        $commercial8 = new Commercial();
        $commercial8->setnomcomm('Compere')
            ->setprenomcomm('Isaïe')
            ->setmailcomm('compereisaie@live.fr')
            ->settauxcomm('10')
            ->settelcomm('0156324586');
            $manager->persist($commercial8);

        $commercial9 = new Commercial();
        $commercial9->setnomcomm('Cerfbeer')
            ->setprenomcomm('Natanaël')
            ->setmailcomm('cerfbeernatanael@gmail.com')
            ->settauxcomm('10')
            ->settelcomm('0154879652');
            $manager->persist($commercial9);

        $commercial10 = new Commercial();
        $commercial10->setnomcomm('Saunier')
            ->setprenomcomm('Remy')
            ->setmailcomm('saunierremy@gmail.com')
            ->settauxcomm('15')
            ->settelcomm('0147856325');
            $manager->persist($commercial10);


        $users1 = new Users();
        $users1->setnom('Kouadio')
            ->setprenom('Celestin')
            ->setpassword(password_hash('password', PASSWORD_DEFAULT))
            ->setsexe('M')
            ->setCommercial($commercial1)
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
            ->setprenom('Romane')
            ->setpassword(password_hash('password', PASSWORD_DEFAULT))
            ->setsexe('F')
            ->setCommercial($commercial2)
            ->setemail('dembeleromane@gmail.com')
            ->setadresse('36 avenue De Clichy')
            ->setcodepostal('75018')
            ->setville('Paris')
            ->setCreatedAt(new \DateTimeImmutable())
            ->settelephone('0689953612');
            $manager->persist($users2);



        $users3 = new Users();
        $users3->setnom('Trottier')
            ->setprenom('Amand')
            ->setpassword(password_hash('password', PASSWORD_DEFAULT))
            ->setsexe('M')
            ->setCommercial($commercial4)
            ->setemail('trottieramand@live.fr')
            ->setadresse('88 boulevard Rochechouart')
            ->setcodepostal('80080')
            ->setville('Amiens')
            ->setCreatedAt(new \DateTimeImmutable())
            ->settelephone('0684125696');
            $manager->persist($users3);



        $users4 = new Users();
        $users4->setnom('Choquet')
            ->setprenom('Eliane')
            ->setpassword(password_hash('password', PASSWORD_DEFAULT))
            ->setsexe('F')
            ->setCommercial($commercial3)
            ->setEmail('choqueteliane54@outlook.fr')
            ->setadresse('98 rue Caulaincourt')
            ->setcodepostal('60100')
            ->setville('Creil')
            ->setCreatedAt(new \DateTimeImmutable())
            ->settelephone('0724517895');
            $manager->persist($users4);


        $users5 = new Users();
        $users5->setnom('Lefeuvre')
            ->setprenom('Mireille')
            ->setpassword(password_hash('password', PASSWORD_DEFAULT))
            ->setsexe('F')
            ->setCommercial($commercial6)
            ->setEmail('lefeuvremireille@gmail.com')
            ->setadresse('128 boulevard De Clichy')
            ->setcodepostal('75018')
            ->setville('Paris')
            ->setCreatedAt(new \DateTimeImmutable())
            ->settelephone('0708541269');
            $manager->persist($users5);



        $users6 = new Users();
        $users6->setnom('Jegou')
            ->setprenom('Blanche')
            ->setpassword(password_hash('password', PASSWORD_DEFAULT))
            ->setsexe('F')
            ->setCommercial($commercial5)
            ->setEmail('jegoublanche@outlook.fr')
            ->setadresse('52 boulevard Barbes')
            ->setcodepostal('75018')
            ->setville('Paris')
            ->setCreatedAt(new \DateTimeImmutable())
            ->settelephone('0787451265');
            $manager->persist($users6);


        $users7 = new Users();
        $users7->setnom('Dubois')
            ->setprenom('Marie Josey')
            ->setpassword(password_hash('password', PASSWORD_DEFAULT))
            ->setsexe('F')
            ->setCommercial($commercial8)
            ->setEmail('duboismariejosey@yahoo.fr')
            ->setadresse('6 boulevard de Clichy')
            ->setcodepostal('75018')
            ->setville('Paris')
            ->setCreatedAt(new \DateTimeImmutable())
            ->settelephone('0622445566');
            $manager->persist($users7);


        $users8 = new Users();
        $users8->setnom('Daucourt')
            ->setprenom('Sigolene')
            ->setpassword(password_hash('password', PASSWORD_DEFAULT))
            ->setsexe('F')
            ->setCommercial($commercial7)
            ->setEmail('daucourtsigolene@yahoo.fr')
            ->setadresse('112 boulevard De La Chapelle')
            ->setcodepostal('94110')
            ->setville('Arcueil')
            ->setCreatedAt(new \DateTimeImmutable())
            ->settelephone('0799887744');
            $manager->persist($users8);


        $users9 = new Users();
        $users9->setnom('Affre')
            ->setprenom('Lou')
            ->setpassword(password_hash('password', PASSWORD_DEFAULT))
            ->setsexe('F')
            ->setCommercial($commercial10)
            ->setEmail('affrelou@yahoo.fr')
            ->setadresse('60 rue De Torcy')
            ->setcodepostal('75018')
            ->setville('Paris')
            ->setCreatedAt(new \DateTimeImmutable())
            ->settelephone('0733415278');
            $manager->persist($users9);


        $users10 = new Users();
        $users10->setnom('Bureau')
            ->setprenom('Claudine')
            ->setpassword(password_hash('password', PASSWORD_DEFAULT))
            ->setsexe('F')
            ->setCommercial($commercial9)
            ->setEmail('bureauclaudine4@live.fr')
            ->setadresse('280 boulevard Michelet ')
            ->setcodepostal('13008')
            ->setville('Marseille')
            ->setCreatedAt(new \DateTimeImmutable())
            ->settelephone('0755998430');
            $manager->persist($users10);


        $users11 = new Users();
        $users11->setnom('Chapuis')
            ->setprenom('Deborah')
            ->setpassword(password_hash('password', PASSWORD_DEFAULT))
            ->setsexe('F')
            ->setCommercial($commercial1)
            ->setEmail('chapuisdeborah@live.fr')
            ->setadresse('29 rue Desire Pellaprat')
            ->setcodepostal('13008')
            ->setville('Marseille')
            ->setCreatedAt(new \DateTimeImmutable())
            ->settelephone('0777763067');
            $manager->persist($users11);


        $users12 = new Users();
        $users12->setnom('Cuvillier')
            ->setprenom('Marie')
            ->setpassword(password_hash('password', PASSWORD_DEFAULT))
            ->setsexe('F')
            ->setCommercial($commercial2)
            ->setEmail('cuvilliermarie@gmail.com')
            ->setadresse('4 rue des Recolettes ')
            ->setcodepostal('13001')
            ->setville('Marseille')
            ->setCreatedAt(new \DateTimeImmutable())
            ->settelephone('0605802768');
            $manager->persist($users12);


        $users13 = new Users();
        $users13->setnom('Garnier')
            ->setprenom('Clara')
            ->setpassword(password_hash('password', PASSWORD_DEFAULT))
            ->setsexe('F')
            ->setCommercial($commercial3)
            ->setEmail('garnierclara@gmail.com')
            ->setadresse('39 rue Saint Remi')
            ->setcodepostal('33000')
            ->setville('Bordeaux')
            ->setCreatedAt(new \DateTimeImmutable())
            ->settelephone('0626589004');
            $manager->persist($users13);


        $users14 = new Users();
        $users14->setnom('LeMahieu')
            ->setprenom('Peggy')
            ->setpassword(password_hash('password', PASSWORD_DEFAULT))
            ->setsexe('F')
            ->setCommercial($commercial4)
            ->setEmail('lemahieupeggy@outlook.fr')
            ->setadresse('52 rue Croix de Seguey')
            ->setcodepostal('33000')
            ->setville('Bordeaux')
            ->setCreatedAt(new \DateTimeImmutable())
            ->settelephone('0765890385');
            $manager->persist($users14);


        $users15 = new Users();
        $users15->setnom('Anouilh')
            ->setprenom('Celine')
            ->setpassword(password_hash('password', PASSWORD_DEFAULT))
            ->setsexe('F')
            ->setCommercial($commercial5)
            ->setEmail('anouilhceline@outlook.fr')
            ->setadresse('7 rue du Palais Gallien')
            ->setcodepostal('33000')
            ->setville('Bordeaux')
            ->setCreatedAt(new \DateTimeImmutable())
            ->settelephone('0769639654');
            $manager->persist($users15);


        $livraison1 = new Livraison();
        $livraison1->setlivrdate(new \DateTimeImmutable())
                ->setlivraisondescp('hhgh')
                ->setIdUsers(3)
                ->setmodelivraison('Colossimo');
                $manager->persist($livraison1);

        $livraison2 = new Livraison();
        $livraison2->setlivrdate(new \DateTimeImmutable())
                ->setlivraisondescp('hhgh')
                ->setIdUsers(6)
                ->setmodelivraison('Chronopost');
                $manager->persist($livraison2);

        $livraison3 = new Livraison();
        $livraison3->setlivrdate(new \DateTimeImmutable())
                ->setlivraisondescp('hhgh')
                ->setIdUsers(1)
                ->setmodelivraison('Mondial relay');
                $manager->persist($livraison3);

        $livraison4 = new Livraison();
        $livraison4->setlivrdate(new \DateTimeImmutable())
                ->setlivraisondescp('hhgh')
                ->setIdUsers(5)
                ->setmodelivraison('Mondial relay');
                $manager->persist($livraison4);

        $livraison5 = new Livraison();
        $livraison5->setlivrdate(new \DateTimeImmutable())
                ->setlivraisondescp('hhgh')
                ->setIdUsers(4)
                ->setmodelivraison('Colossimo');
                $manager->persist($livraison5);

        $livraison6 = new Livraison();
        $livraison6->setlivrdate(new \DateTimeImmutable())
                ->setlivraisondescp('hhgh')
                ->setIdUsers(2)
                ->setmodelivraison('Chronopost');
                $manager->persist($livraison6);

        $commande1 = new Commande();
        $commande1->setdatecom(new \DateTimeImmutable())
               ->settotalcom(2)
               ->setdescpcom('bgng')
               ->setidpaiement(1)
               ->setdatepaiement(new \DateTimeImmutable())
               ->setdescppaiement('Diféré')
               ->setmodepaiement('Carte bancaire')
               ->setidfacture(4521)
               ->setfacturedate(new \DateTimeImmutable())
               ->setfacturetotalttc(124)
               ->setfacturetotaltva(104)
               ->setfacturetotalht(564)
               ->setLivraison($livraison1)
               ->setUsers($users1);
               $manager->persist($commande1);

        $commande2 = new Commande();
        $commande2->setdatecom(new \DateTimeImmutable())
               ->settotalcom(2)
               ->setdescpcom('bgng')
               ->setidpaiement(2)
               ->setdatepaiement(new \DateTimeImmutable())
               ->setdescppaiement('Diféré')
               ->setmodepaiement('carte bancaire')
               ->setidfacture(4521)
               ->setfacturedate(new \DateTimeImmutable())
               ->setfacturetotalttc(124)
               ->setfacturetotaltva(104)
               ->setfacturetotalht(564)
               ->setLivraison($livraison1)
               ->setUsers($users2);
               $manager->persist($commande2);

        $commande3 = new Commande();
        $commande3->setdatecom(new \DateTimeImmutable())
               ->settotalcom(3)
               ->setdescpcom('bgng')
               ->setidpaiement(3)
               ->setdatepaiement(new \DateTimeImmutable())
               ->setdescppaiement('Diféré')
               ->setmodepaiement('Carte bancaire')
               ->setidfacture(4521)
               ->setfacturedate(new \DateTimeImmutable())
               ->setfacturetotalttc(124)
               ->setfacturetotaltva(104)
               ->setfacturetotalht(564)
               ->setLivraison($livraison1)
               ->setUsers($users3);
               $manager->persist($commande3);

        $commande4 = new Commande();
        $commande4->setdatecom(new \DateTimeImmutable())
               ->settotalcom(1)
               ->setdescpcom('bgng')
               ->setidpaiement(4)
               ->setdatepaiement(new \DateTimeImmutable())
               ->setdescppaiement('Comptant')
               ->setmodepaiement('Carte bancaire')
               ->setidfacture(4521)
               ->setfacturedate(new \DateTimeImmutable())
               ->setfacturetotalttc(124)
               ->setfacturetotaltva(104)
               ->setfacturetotalht(564)
               ->setLivraison($livraison1)
               ->setUsers($users4);
               $manager->persist($commande4);

        $commande5 = new Commande();
        $commande5->setdatecom(new \DateTimeImmutable())
               ->settotalcom(1)
               ->setdescpcom('bgng')
               ->setidpaiement(5)
               ->setdatepaiement(new \DateTimeImmutable())
               ->setdescppaiement('Comptant')
               ->setmodepaiement('Carte bancaire')
               ->setidfacture(4521)
               ->setfacturedate(new \DateTimeImmutable())
               ->setfacturetotalttc(124)
               ->setfacturetotaltva(104)
               ->setfacturetotalht(564)
               ->setLivraison($livraison1)
               ->setUsers($users5);
               $manager->persist($commande5);

        $commande6 = new Commande();
        $commande6->setdatecom(new \DateTimeImmutable())
               ->settotalcom(2)
               ->setdescpcom('bgng')
               ->setidpaiement(6)
               ->setdatepaiement(new \DateTimeImmutable())
               ->setdescppaiement('Comptant')
               ->setmodepaiement('Carte bancaire')
               ->setidfacture(4521)
               ->setfacturedate(new \DateTimeImmutable())
               ->setfacturetotalttc(124)
               ->setfacturetotaltva(104)
               ->setfacturetotalht(564)
               ->setLivraison($livraison1)
               ->setUsers($users6);
               $manager->persist($commande6);


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
               ->setstock(9)
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
               ->setstock(9)
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
               ->setstock(8)
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
               ->setstock(10)
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
               ->setstock(5)
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
               ->setstock(3)
               ->setphoto('lisseur3.jpeg');
               $manager->persist($produit6);
               $souscategorie3->addProduit($produit6);


        $produit7 = new Produit();
        $produit7->setrubriqueart('Perruques')
               ->setsousrubriqueart('Carré plongeant')
               ->setlibcourt('Bobo wig front lace 13*4 raide noir standard. ')
               ->setliblong('La dentelle HD est un matériau de dentelle royale également appelé dentelle suisse, qui est invisible lorsqu elle est appliquée sur le cuir chevelu. Cela garantit que le porteur de la perruque peut avoir une racine des cheveux exposée, ce qui semble très naturel et rend la dentelle le long de la racine des cheveux hautement indétectable.')
               ->setreffou('fournisseur8')
               ->setFournisseur($fournisseur8)
               ->setprixachat(125)
               ->setstock(11)
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
               ->setstock(2)
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
               ->setstock(6)
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
               ->setstock(7)
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
               ->setstock(4)
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
               ->setstock(3)
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
               ->setstock(8)
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
               ->setstock(3)
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
               ->setstock(7)
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
               ->setstock(3)
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
               ->setstock(8)
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
               ->setstock(5)
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
               ->setstock(2)
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
               ->setstock(1)
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
               ->setstock(5)
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
               ->setstock(7)
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
               ->setstock(2)
               ->setphoto('degrade3.jpg');
               $manager->persist($produit23);
               $souscategorie12->addProduit($produit23);
               $manager->flush();

      
    }

}



