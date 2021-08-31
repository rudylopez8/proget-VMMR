<?php
require "../../include/inc_config.php";



extract($_POST);
if (isset($btSubmit)) {
    require "../../vendor/autoload.php";
    $faker = Faker\Factory::create('fr_FR');

    //création de la bdd
    createDatabase("../../document/creation_locacar.sql");       

    //1 - création des catégories
$nbcategorie = 6;
    $data=[];
    $label = ["Petit","Moyen","Grand","utilitaire","Prestige","Camping car"];
    for ($i = 0; $i < $nbcategorie; $i++) {
        $data[]="(null,'$label[$i]')";
    }
    insertInto("categorie",$data,$nbcategorie);

    //2 - création des departements
    $nbdepartement = 8;
    $data=[];
    $label = ["Paris","Haut-Rhin","Oise","Meurthe et Moselle", "Vendée","Rhon","Nord","Tarn"];
    for ($i = 0; $i < $nbdepartement ; $i++) {
        $data[]="(null,'$label[$i]')";
    }
    insertInto("departement",$data,$nbdepartement);

    //3 - création des tranches horaires
    $nbtranche = 3;
    $data=[];
    $min = [0,12,24] ; 
    $max = [12,24,720] ; 
    for ($i = 0; $i < $nbtranche ; $i++) {
        $tra_min = $min[$i] ; 
        $tra_max = $max[$i] ; 
        $data[]="(null,'$tra_min','$tra_max')";
    }
    insertInto("tranche",$data,$nbtranche);

    //4 - création des accessoires
    $nbaccessoire = 5;
    $data=[];
    $label = ["climatisation","GPS", "Pneus Neige", "Lecteur Video","Minibar"];
    $prix = [10,7,23,5,15] ;   
    for ($i = 0; $i < $nbaccessoire ; $i++) {
    $data[]="(null,'$label[$i]','$prix[$i]')";
    }
    insertInto("accessoire",$data,$nbaccessoire);

    //5 - création des agences
    $nbagence = 20;
    $data=[];   
    for ($i = 0; $i < $nbagence ; $i++) {
        $age_nom = $faker->company;
        $age_departement = mt_rand(1,$nbdepartement) ;  
        $data[]="(null,'$age_nom','$age_departement')";
    }
    insertInto("agence",$data,$nbagence);

    //6 - création des voitures
    $nbvoiture = 15 * $nbagence ;
    $marque = ["Toyota","Tesla","Saab","Volvo","Jaguar","Peugeot","Renault","Porsche","BMW","Audi","Fiat","Lamborghini","Ferrari"] ;
    $color = ["Noir","Blanc", "Gris","Rouge","Vert","Bleu Ciel", "Marron", "Jaune", "Bleu", "Argen","Bronze","Or"] ;   
    $data=[];   
    for ($i = 1; $i <= $nbvoiture ; $i++) {
        shuffle($marque) ;
        shuffle($color) ;  
        $voi_marque=$marque[1] ; 
        $voi_plaque = "FR" . mt_rand(1000000000,9999999999) ;
        $voi_color = $color[0] ;
        $voi_agence = mt_rand(1,$nbagence) ; 
        $voi_categorie = mt_rand(1,$nbcategorie) ;   
        $data[]="(null,'$voi_marque','$voi_plaque','$voi_color','$voi_agence','$voi_categorie')";
    }
    insertInto("voiture",$data,$nbvoiture);

    //7 - création des utilisateurs
    $nbutilisateur = 250;
    $compteur = 1 ; 
    $nbsrc= 10 ;
    $traParAgence = 2 ; 
    $travailleur = $nbagence * $traParAgence + $nbsrc ; 
    $data=[];
    for ($i = 1; $i <= $nbutilisateur; $i++) {        
        $uti_nom=$faker->lastName;
        $uti_prenom=$faker->firstName;
        $uti_login =$faker->username;
        $uti_mdp = password_hash("mdp", PASSWORD_DEFAULT);
        $uti_adresse = mres($faker->address);
        $uti_email = $faker->email;
        $uti_telephone =$faker->phoneNumber;
        if ($i<$nbutilisateur-$travailleur) {
            $uti_profil = "client";
            $uti_agence = "null" ; 
        } else if ($i<=$nbutilisateur-$nbsrc) {
            $uti_profil = "agent";
            if ($compteur<=$nbagence) {
                $uti_agence = $compteur ; 
                $compteur++ ; 
            }else {
                $compteur = 1 ; 
            }   
        } else {
            $uti_profil = "SRC" ; 
            $uti_agence = "null" ; 
        }
        
        $data[]="(null,'$uti_nom', '$uti_prenom','$uti_login','$uti_mdp','$uti_adresse','$uti_email','$uti_telephone','$uti_profil',$uti_agence)";
    }  

    insertInto("utilisateur",$data,$nbutilisateur);

    //8 - création des allocations 
    $data=[];  
    for ($i = 1; $i <= $nbcategorie; $i++) {        
        for($j=1; $j<=$nbtranche; $j++) {
            $all_categorie= $i ;
            $all_tranche = $j ;
            $all_prix = round(mt_rand(2,34)/2,2) ;  
            $data[]="(null,'$all_categorie','$all_tranche','$all_prix')";
        }
    }
    $nbtotalallocation=$nbcategorie * $nbtranche ;
    insertInto("allouer",$data,$nbtotalallocation);    
    
    //9 - création des locations : pour chaque utilisateur entre 0 et 5 locations
    $nbtotallocation=0;  
    $data=[];
    $type = ["En ligne", "Par téléphone","En présentiel"] ; 
    $statut = ["Initialisée","Validée","Annullée"] ;   
    for ($i = 1; $i <= $nbvoiture; $i++) {
        $nblocation=mt_rand(0,10);
        $mois = mt_rand(1,12) ; 
        $jour = mt_rand(1,31) ; 
        $annee = mt_rand(2014,2018) ;        
        for($j=1; $j<=$nblocation; $j++) {
            $loc_utilisateur = mt_rand(1,$nbutilisateur) ;   
            $loc_date_demande = date("Y-m-d",mktime(0,0,0,$mois,$jour,$annee)) ;
            $mois+=mt_rand(0,5) ; 
            $jour+=mt_rand(0,30) ;  
            $loc_debut = date("Y-m-d H:i:s",mktime(mt_rand(7,22),0,0,$mois,$jour,$annee)) ;
            $jour+=mt_rand(0,30) ; 
            $loc_fin = date("Y-m-d H:i:s",mktime(mt_rand(7,22),0,0,$mois,$jour,$annee)) ;
            $loc_voiture=$i ;   
            shuffle($type) ; 
            shuffle($statut) ;
            //depart de voiture 
            $sql = "select voi_id,voi_agence from voiture 
            where voi_id='$loc_voiture'" ; 
            $result=mysqli_query($link,$sql) ; 
            if ($row=mysqli_fetch_assoc($result)) {
                extract($row) ; 
                $loc_agence_depart=$voi_agence ; 
            }
            //$loc_agence_depart = mt_rand(1,$nbagence) ;   
            $loc_agence_arrivee = mt_rand(1,$nbagence) ; 
            //mettre à jour le site de voiture 
            mysqli_query($link,"update voiture set voi_agence=$loc_agence_arrivee where voi_id=$loc_voiture") ; 

            $data[]="(null,'$loc_utilisateur','$loc_voiture','$loc_date_demande','$loc_debut','$loc_fin','$type[0]','$statut[0]','$loc_agence_depart','$loc_agence_arrivee')";
        }
        $nbtotallocation+=$nblocation;  
    }
    shuffle($data) ; 
    insertInto("location",$data,$nbtotallocation);
    
    //10 - création de contenir : pour chaque location, créer de 0 à 4 accessoires
    $nbtotalcontenu=0;  
    $data=[];
    $accessoires = range(1,$nbaccessoire) ;
    shuffle($accessoires) ;   
    for ($i = 1; $i <= $nbtotallocation; $i++) {
        $nbcontenu=mt_rand(0,4);        
        for($j=1; $j<=$nbcontenu; $j++) {
            $con_location = $i ; 
            $con_accessoire = $accessoires[$j] ;   
            $data[]="(null,'$con_location','$con_accessoire')";
        }
        $nbtotalcontenu+=$nbcontenu;  
    }
    insertInto("contenir",$data,$nbtotalcontenu);

}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require "../../include/inc_head.php"; ?>
</head>

<body>
    <a href="#main" class="sr-only">Allez au contenu principal</a>
    <!-- entete de page -->
    <header>
        <?php require "../../include/inc_header.php"; ?>
    </header>
    <!-- liens de navigation -->
    <nav id="navigation">
        <?php require "../../include/inc_nav.php"; ?>
    </nav>
    <!-- contenu principal -->
    <div id="main">
        <h1>création du jeu de données</h1>
        <form method="post">
            <p>Générer les données <input type="submit" name="btSubmit" value="OK"></p>
        </form>
    </div>
    <!-- pied de page -->
    <footer>
        <?php require "../../include/inc_footer.php"; ?>
    </footer>
</body>

</html>