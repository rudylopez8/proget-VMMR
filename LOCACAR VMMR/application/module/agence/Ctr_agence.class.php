<?php

/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
 */
class Ctr_agence extends Ctr_controleur
{

	public function __construct($action)
	{
		parent::__construct("agence", $action);
		$a = "a_$action";
		$this->$a();
	}

	function a_index()
	{
		if (isset($_SESSION["profil"]) and $_SESSION["profil"] == "admin") {
			$u = new Agence();
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
			if (isset($_POST["btSubmit"])) {
				$u = new Agence();
				$u->chargerDepuisTableau($_POST);
				$u->sauver();
				header("location:" . hlien("agence", "index"));
			} else {
				$id = isset($_GET["id"]) ? $_GET["id"] : 0;
				$u = new Agence($id);
				extract($u->data);
				$age_departement = ($id==0) ? 0 : $age_departement ; 
				$d = new Departement() ; 
				$dep = $d->findAll() ;

				require $this->gabarit;
			}
		} else {
			header("location:" . hlien("_default","index")) ; 
		}
	}


	//param GET id 
	function a_del()
	{
		if (isset($_SESSION["profil"]) and $_SESSION["profil"] == "admin") {
			if (isset($_GET["id"])) {
				$u = new Agence();
				$u->supprimer($_GET["id"]);
			}
			header("location:" . hlien("agence", "index"));
		} else {
			header("location:" . hlien("_default","index"));
		}
	}
}
