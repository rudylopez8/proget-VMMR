<?php
class Ctr_database extends Ctr_controleur
{

    public function __construct($action)
    {
        parent::__construct("database", $action);
        $a = "a_$action";
        $this->$a();
    }

    public function a_creer()
    {
        $sql = Database::creer("../document/locacar.sql");
        require $this->gabarit;
    }

    public function a_dataset()
    {
        require "../vendor/autoload.php";
        $faker = Faker\Factory::create('fr_FR');
        Database::setFaker($faker);

        Database::creer("../document/locacar.sql");

        $nbdepartement = 8;
        Database::genererDepartements();
        $nbcategorie = 6;
        Database::genererCategories();
        $nbtranche = 3;
        Database::genererTranches();
        $nbaccessoire = 5;
        Database::genererAccessoires();
        $nbagence = 20;
        Database::genererAgences($nbdepartement);
        $nbvoiture = 15 * $nbagence;
        Database::genererVoitures($nbagence, $nbcategorie);
        $nbutilisateur = 250;
        Database::genererUtilisateurs($nbagence);
        $nballocation = $nbtranche * $nbcategorie;
        Database::genererAllocations($nbcategorie, $nbtranche);
        $nblocation = Database::genererLocations($nbvoiture, $nbutilisateur,$nbagence);
        $nbcontenu = Database::genererContenir($nbaccessoire, $nblocation);

        /*
        $nbprofil = Database::genererProfil();
        $nbutilisateur = Database::genererUtilisateur(30, 3);        
        $nbmsg = Database::genererMsg(100,30); 
        */
        require $this->gabarit;
    }
}
