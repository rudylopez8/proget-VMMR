<?php

/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
 */
class Ctr_utilisateur extends Ctr_controleur
{

	public function __construct($action)
	{
		parent::__construct("utilisateur", $action);
		$a = "a_$action";
		$this->$a();
	}

	function a_index()
	{
		if (isset($_SESSION["id"])) {
			if ($_SESSION["profil"] != "client") {
				$types = ["agent", "SRC", "client"];
				$u = new Utilisateur();
				if (isset($_GET["type"]) and in_array($_GET["type"], $types)) {
					$result = $u->findAll($_GET["type"]);
					require $this->gabarit;
				} else {
					header("location:" . hlien("_default","index")) ; 
				}
			} else {
				header("location:" . hlien("_default", "index"));
			}
		} else {
			header("location:" . hlien("_default", "index"));
		}
	}

	//$_GET["id"] : id de l'enregistrement
	function a_edit()
	{
		if (isset($_SESSION["id"])) {
			if (isset($_POST["btSubmit"])) {
				if ($_SESSION["profil"] != "client" or $_SESSION["id"] == $_GET["id"]) {
					$u = new Utilisateur();
					$_POST["uti_mdp"] = password_hash($_POST["uti_mdp"], PASSWORD_DEFAULT);
					if ($_SESSION["id"] == $_GET["id"]) {
						$_POST["uti_profil"] = $_SESSION["profil"];
						$_POST["uti_agence"] = $_SESSION["uti_agence"];
					} else if ($_SESSION["profil"] == "SRC" or $_SESSION["profil"] == "agent") {
						if ($_POST["uti_profil"] == "client") {
							$_POST["uti_profil"] = "client";
							$_POST["uti_agence"] = "null";
						} else {
							header("location:" . hlien("_default", "index"));
						}
					}

					if ($_POST["uti_agence"] == "null")
						$_POST["uti_agence"] = null;
					$u->chargerDepuisTableau($_POST);
					$u->sauver();
					if ($_GET["id"] == $_SESSION["id"]) {
						$_SESSION["profil"] = $_POST["uti_profil"];
						$_SESSION["nom"] = $_POST["uti_nom"];
						$_SESSION["prenom"] = $_POST["uti_prenom"];
						$_SESSION["adresse"] = $_POST["uti_adresse"];
						$_SESSION["email"] = $_POST["uti_email"];
						$_SESSION["telephone"] = $_POST["uti_telephone"];
						$_SESSION["login"] = $_POST["uti_login"];
						$_SESSION["agence"] = $_POST["uti_agence"];
					}
					header("location:" . hlien("utilisateur", "index"));
				} else {
					header("location" . hlien("_default", "index"));
				}
			} else {
				if ($_SESSION["profil"] != "client" or $_SESSION["id"] == $_GET["id"]) {
					$id = isset($_GET["id"]) ? $_GET["id"] : 0;
					$u = new Utilisateur($id);
					extract($u->data);
					if ($id == 0 or $uti_agence == null) $uti_agence = 0;
					$profil = ["client", "SRC", "agent"];
					$a = new Agence();
					$age = $a->findAll();
					require $this->gabarit;
				} else {
					header("location:" . hlien("utilisateur", "edit", "id", $_SESSION["id"]));
				}
			}
		} else {
			header("location:" . hlien("_default", "index"));
		}
	}

	function a_statistique() {
		if (isset($_SESSION["profil"]) and $_SESSION["profil"] != "client") {
			if ($_SESSION["profil"] == "admin") {
				
			} else if ($_SESSION["profil"] == "SRC") {

			} else if ($_SESSION["profil"] == "agent") {

			} else {
				header("location:" . hlien("_default","index")) ; 
			}
		} else {
			header("location:" . hlien("_default","index")) ; 
		}
	}

	//param GET id 
	function a_del()
	{
		if (isset($_GET["id"])) {
			if ($_SESSION["profil"] == "admin") {
				$u = new Utilisateur();
				$u->supprimer($_GET["id"]);
				header("location:" . hlien("utilisateur", "index"));
			} else {
				header("location:" . hlien("_default", "index"));
			}
		} else {
			header("location:" . hlien("_default", "index"));
		}
	}
}
