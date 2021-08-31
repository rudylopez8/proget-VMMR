<?php

/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
 */
class Ctr_tranche extends Ctr_controleur
{

	public function __construct($action)
	{
		parent::__construct("tranche", $action);
		$a = "a_$action";
		$this->$a();
	}

	function a_index()
	{
		if (isset($_SESSION["profil"]) and $_SESSION["profil"] == "admin") {
			$u = new Tranche();
			$result = $u->findAll();
			require $this->gabarit;
		} else {
			header("location:" . hlien("_default", "index"));
		}
	}

	//$_GET["id"] : id de l'enregistrement
	function a_edit()
	{
		if (isset($_SESSION["profil"]) and $_SESSION["profil"] == "admin") {
			$message = "";
			if (isset($_POST["btSubmit"])) {
				extract($_POST);
				if (is_numeric($tra_min) and is_numeric($tra_max)) {
					if ($tra_min < $tra_max) {
						$u = new Tranche();
						$u->chargerDepuisTableau($_POST);
						$u->sauver();
						if ($_GET["from"] == "tarif")
							header("location:" . hlien("allouer", "index"));
						else
							header("location:" . hlien("tranche", "index"));
					} else {
						$message = "Le minimum et supérieur ou égale au maximum." ; 
					}
				} else {
					$message = "Vous avez tapé une ou des valeures invalide(s).";
				}
				$id = $tra_id ; 
				require $this->gabarit; 
			} else {
				$id = isset($_GET["id"]) ? $_GET["id"] : 0;
				$u = new Tranche($id);
				extract($u->data);
				require $this->gabarit;
			}
		} else {
			header("location:" . hlien("_default", "index"));
		}
	}


	//param GET id 
	function a_del()
	{
		if (isset($_SESSION["profil"]) and $_SESSION["profil"] == "admin") {
			if (isset($_GET["id"])) {
				$u = new Tranche();
				$u->supprimer($_GET["id"]);
				header("location:" . hlien("tranche", "index"));
			} else {
				header("location:" . hlien("tranche", "index"));
			}
		} else {
			header("location:" . hlien("_default", "index"));
		}
	}
}
