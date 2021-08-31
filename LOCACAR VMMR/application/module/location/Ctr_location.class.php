<?php

/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
 */
class Ctr_location extends Ctr_controleur
{

	public function __construct($action)
	{
		parent::__construct("location", $action);
		$a = "a_$action";
		$this->$a();
	}

	function a_index()
	{
		if (isset($_SESSION["profil"]) and $_SESSION["profil"] == "admin") {
			$u = new Location();
			$result = $u->findAll();

			require $this->gabarit;
		} else {
			header("location:" . hlien("_default", "index"));
		}
	}

	//$_GET["id"] : id de l'enregistrement
	function a_edit()
	{
		if (isset($_SESSION["profil"])) {
			if (isset($_POST["btSubmit"])) {
				if ($_SESSION["id"] == $_POST["loc_utilisateur"] or $_SESSION["profil"] != "client") {
					extract($_POST) ; 
					$u = new Location();
					$_POST["date_debut"] = implode(" ", $date_debut);
					$_POST["date_fin"] = implode(" ", $date_fin); 
					$u->chargerDepuisTableau($_POST);
					$u->sauver();
					if ($_SESSION["profil"] == "admin")
						header("location:" . hlien("location", "index"));
					else
						header("location:" . hlien("utilisateur", "prive"));
				} else {
					header("location:" . hlien("_default", "index"));
				}
			} else {
				$id = isset($_GET["id"]) ? $_GET["id"] : 0;
				$u = new Location($id);
				extract(array_map("mhe",$u->data));
				$a = new Agence();
				$age = $a->findAll();
				$c = new Categorie();
				$cat = $c->findAll();
				if ($id == 0) {
					$loc_date_demande = date("Y-m-d") ; 
					$voi_categorie = 0;
					$loc_agence_depart = 0 ; 
					$loc_agence_arrivee = 0 ; 
					//$voitures = Voiture::findVoitureDisponible($debut,$fin,$voi_categorie) ;
				}
				if ($loc_utilisateur == $_SESSION["id"] or $id == 0 or $_SESSION["profil"] != "client") {
					require $this->gabarit;
				} else {
					header("location:" . hlien("_default", "index"));
				}
			}
		} else {
			header("location:" . hlien("_default", "index"));
		}
	}


	//param GET id 
	function a_del()
	{
		if (isset($_GET["id"])) {
			if (isset($_SESSION["agence"])) {
				$u = new Location();
				$u->supprimer($_GET["id"]);
			}
			header("location:" . hlien("location"));
		}
		header("location:index.php");
	}
}
