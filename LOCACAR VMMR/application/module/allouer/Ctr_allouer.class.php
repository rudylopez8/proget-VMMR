<?php

/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
 */
class Ctr_allouer extends Ctr_controleur
{

	public function __construct($action)
	{
		parent::__construct("allouer", $action);
		$a = "a_$action";
		$this->$a();
	}

	function a_index()
	{
		if (isset($_SESSION["profil"]) and $_SESSION["profil"] == "admin") {
			$c = new Categorie();
			$cat = $c->findAll();
			$t = new Tranche();
			$tra = $t->findAll();
			require $this->gabarit;
		} else {
			header("location:" . hlien("_default", "index"));
		}
	}

	//$_GET["id"] : id de l'enregistrement
	function a_edit()
	{
		if (isset($_SESSION["profil"]) and $_SESSION["profil"] == "admin") {
			if (isset($_POST["btSubmit"])) {
				$message = "" ; 
				if (is_numeric($_POST["all_prix"])) {
					$u = new Allouer();
					$u->chargerDepuisTableau($_POST);
					$u->sauver();
					header("location:" . hlien("allouer", "index"));
				} else {
					$message = "Vous avez tapé une valeure invalide." ;
					extract($_POST) ; 
					require $this->gabarit;  
				}
			} else {
				$id = isset($_GET["id"]) ? $_GET["id"] : 0;
				$u = new Allouer($id);
				extract(array_map("mhe", $u->data));
				extract($_GET);
				$c = new Categorie($all_categorie);
				extract(array_map("mhe", $c->data));
				$t = new Tranche($all_tranche);
				extract(array_map("mhe", $t->data));
				$message = ""; 
				require $this->gabarit;
			}
		} else {
			header("location:" . hlien("_default", "index"));
		}
	}


	//param GET id 
	function a_del()
	{
		if (isset($_GET["id"])) {
			$u = new Allouer();
			$u->supprimer($_GET["id"]);
		}
		header("location:" . hlien("allouer"));
	}
}
