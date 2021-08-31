<?php
class Database extends Table
{
    private static $faker;

    static public function setFaker($obj) {
        self::$faker = $obj;
    }

    static public function creer(string $sqlfile): string
    {
        $sql = file_get_contents($sqlfile);
        Table::$link->setAttribute(PDO::ATTR_EMULATE_PREPARES, 0);
        Table::$link->exec($sql);
        return $sql;
    }

    

    static public function genererDepartements()
    {
        $nbdepartement = 8;
        $data = [];
        $label = ["Paris", "Haut-Rhin", "Oise", "Meurthe et Moselle", "Vendée", "Rhon", "Nord", "Tarn"];
        for ($i = 0; $i < $nbdepartement; $i++) {
            $data[] = "(null,'$label[$i]')";
        }
        self::insertInto("departement", $data);
    }

    static public function genererCategories()
    {
        $nbcategorie = 6;
        $data = [];
        $label = ["Petit", "Moyen", "Grand", "utilitaire", "Prestige", "Camping car"];
        for ($i = 0; $i < $nbcategorie; $i++) {
            $data[] = "(null,'$label[$i]')";
        }
        self::insertInto("categorie", $data);
    }

    static public function genererTranches()
    {
        $nbtranche = 3;
        $data = [];
        $min = [0, 12, 24];
        $max = [12, 24, 720];
        for ($i = 0; $i < $nbtranche; $i++) {
            $tra_min = $min[$i];
            $tra_max = $max[$i];
            $data[] = "(null,'$tra_min','$tra_max')";
        }
        self::insertInto("tranche", $data);
    }

    static public function genererAccessoires()
    {
        $nbaccessoire = 5;
        $data = [];
        $label = ["climatisation", "GPS", "Pneus Neige", "Lecteur Video", "Minibar"];
        $prix = [10, 7, 23, 5, 15];
        for ($i = 0; $i < $nbaccessoire; $i++) {
            $data[] = "(null,'$label[$i]','$prix[$i]')";
        }
        self::insertInto("accessoire", $data);
    }

    static public function genererAgences($nbdepartement)
    {
        $nbagence = 20;
        $data = [];
        for ($i = 0; $i < $nbagence; $i++) {
            $age_nom = self::$faker->company;
            $age_departement = mt_rand(1, $nbdepartement);
            $data[] = "(null,'$age_nom','$age_departement')";
        }
        self::insertInto("agence", $data);
    }

    static public function genererVoitures($nbagence,$nbcategorie)
    {
        $nbvoiture = 15 * $nbagence;
        $marque = ["Toyota", "Tesla", "Saab", "Volvo", "Jaguar", "Peugeot", "Renault", "Porsche", "BMW", "Audi", "Fiat", "Lamborghini", "Ferrari"];
        $color = ["Noir", "Blanc", "Gris", "Rouge", "Vert", "Bleu Ciel", "Marron", "Jaune", "Bleu", "Argen", "Bronze", "Or"];
        $data = [];
        for ($i = 1; $i <= $nbvoiture; $i++) {
            shuffle($marque);
            shuffle($color);
            $voi_marque = $marque[1];
            $voi_plaque = "FR" . mt_rand(1000000000, 9999999999);
            $voi_color = $color[0];
            $voi_agence = mt_rand(1, $nbagence);
            $voi_categorie = mt_rand(1, $nbcategorie);
            $data[] = "(null,'$voi_marque','$voi_plaque','$voi_color','$voi_agence','$voi_categorie')";
        }
        self::insertInto("voiture", $data);
    }

    static public function genererUtilisateurs($nbagence)
    {
        $nbutilisateur = 250;
        $compteur = 1;
        $nbsrc = 10;
        $traParAgence = 2;
        $travailleur = $nbagence * $traParAgence + $nbsrc;
        $data = [];
        for ($i = 1; $i <= $nbutilisateur; $i++) {
            $uti_nom = self::$faker->lastName;
            $uti_prenom = self::$faker->firstName;
            $uti_login = self::$faker->username;
            $uti_mdp = password_hash("mdp", PASSWORD_DEFAULT);
            $uti_adresse = self::$faker->address;
            $uti_email = self::$faker->email;
            $uti_telephone = self::$faker->phoneNumber;
            if ($i < $nbutilisateur - $travailleur) {
                $uti_profil = "client";
                $uti_agence = "null";
            } else if ($i <= $nbutilisateur - $nbsrc) {
                $uti_profil = "agent";
                if ($compteur <= $nbagence) {
                    $uti_agence = $compteur;
                    $compteur++;
                } else {
                    $compteur = 1;
                }
            } else {
                $uti_profil = "SRC";
                $uti_agence = "null";
            }

            $data[] = "(null,'$uti_nom', '$uti_prenom','$uti_login','$uti_mdp','$uti_adresse','$uti_email','$uti_telephone','$uti_profil',$uti_agence)";
        }

        self::insertInto("utilisateur", $data);
    }

    static public function genererAllocations($nbcategorie, $nbtranche)
    {
        $data = [];
        for ($i = 1; $i <= $nbcategorie; $i++) {
            for ($j = 1; $j <= $nbtranche; $j++) {
                $all_categorie = $i;
                $all_tranche = $j;
                $all_prix = round(mt_rand(2, 34) / 2, 2);
                $data[] = "(null,'$all_categorie','$all_tranche','$all_prix')";
            }
        }
        $nbtotalallocation = $nbcategorie * $nbtranche;
        self::insertInto("allouer", $data);
    }

    static public function genererLocations($nbvoiture, $nbutilisateur,$nbagence)
    {
        $nbtotallocation = 0;
        $data = [];
        $type = ["En ligne", "Par téléphone", "En présentiel"];
        $statut = ["Initialisée", "Validée", "Annullée"];
        for ($i = 1; $i <= $nbvoiture; $i++) {
            $nblocation = mt_rand(0, 10);
            $mois = mt_rand(1, 12);
            $jour = mt_rand(1, 31);
            $annee = mt_rand(2014, 2018);
            for ($j = 1; $j <= $nblocation; $j++) {
                $loc_utilisateur = mt_rand(1, $nbutilisateur);
                $loc_date_demande = date("Y-m-d", mktime(0, 0, 0, $mois, $jour, $annee));
                $mois += mt_rand(0, 5);
                $jour += mt_rand(0, 30);
                $loc_debut = date("Y-m-d H:i:s", mktime(mt_rand(7, 22), 0, 0, $mois, $jour, $annee));
                $jour += mt_rand(0, 30);
                $loc_fin = date("Y-m-d H:i:s", mktime(mt_rand(7, 22), 0, 0, $mois, $jour, $annee));
                $loc_voiture = $i;
                shuffle($type);
                shuffle($statut);
                //depart de voiture 
                $sql = "select voi_id,voi_agence from voiture 
                where voi_id='$loc_voiture'";
                $result = self::$link->query($sql);
                if ($row = $result->fetch()) {
                    extract($row);
                    $loc_agence_depart = $voi_agence;
                }
                //$loc_agence_depart = mt_rand(1,$nbagence) ;   
                $loc_agence_arrivee = mt_rand(1, $nbagence);
                //mettre à jour le site de voiture
                $sql = "update voiture set voi_agence=$loc_agence_arrivee where voi_id=$loc_voiture";
                self::$link->exec($sql);

                $data[] = "(null,'$loc_utilisateur','$loc_voiture','$loc_date_demande','$loc_debut','$loc_fin','$type[0]','$statut[0]','$loc_agence_depart','$loc_agence_arrivee')";
            }
            $nbtotallocation += $nblocation;
        }
        //shuffle($data);
        self::insertInto("location", $data);
        return $nbtotallocation;
    }

    static public function genererContenir($nbaccessoire,$nbtotallocation)
    {
        $nbtotalcontenu = 0;
        $data = [];
        $accessoires = range(1, $nbaccessoire);
        shuffle($accessoires);
        for ($i = 1; $i <= $nbtotallocation; $i++) {
            $nbcontenu = mt_rand(0, 4);
            for ($j = 1; $j <= $nbcontenu; $j++) {
                $con_location = $i;
                $con_accessoire = $accessoires[$j];
                $data[] = "(null,'$con_location','$con_accessoire')";
            }
            $nbtotalcontenu += $nbcontenu;
        }
        self::insertInto("contenir", $data);
        return $nbtotalcontenu ;
    }

    static function insertInto($table, $data)
    {
        $sql = "insert into $table values " . implode(",",$data);
        Table::$link->exec($sql);
    }
}
