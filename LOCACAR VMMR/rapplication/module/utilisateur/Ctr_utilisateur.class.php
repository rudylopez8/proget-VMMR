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
				if (isset($_GET) and $_GET["param"]=1) {
//					//$result=$u->findPrecit($_SESSION["id"]);
					$u = new Utilisateur($_SESSION["id"]);
					extract($u->data);
				}
				else {
					$u = new Utilisateur() ; 
					$result = $u->findAll();
				}
				require $this->gabarit;
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
					$_POST["uti_profil"] = $_POST["uti_profil"] ?? "client" ; 
					$_POST["uti_agence"] = $_POST["uti_agence"] ?? "null" ; 
					if ($_POST["uti_agence"] == "null")
						$_POST["uti_agence"] = null;
					$u->chargerDepuisTableau($_POST);
					$u->sauver();
					header("location:" . hlien("utilisateur", "index"));
				} else {
					header("location" . hlien("_default", "index"));
				}
			} else {
				if ($_SESSION["profil"] != "client" or $_SESSION["id"] == $_GET["id"]) {
					$id = isset($_GET["id"]) ? $_GET["id"] : 0;
					$u = new Utilisateur($id);
					extract($u->data);
					if ($id==0 or $uti_agence==null) $uti_agence=0;
					$profil =["client","SRC","agent"]; 
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
    function a_privee() {
        if (isset($_SESSION["profil"])) {
            if ($_SESSION["profil"] == "client") {
                
            } else if ($_SESSION["profil"]=="SRC") {
                 
            } else if ($_SESSION["profil"] == "agent") {

            } else if ($_SESSION["profil"] == "admin") {
				require $this->gabarit ;  
            }
        } else {
            header("location:". hlien("_default", "index")) ; 
        }
    }

	static function navPrivee() {
		echo "<div>";
		echo "<ul class='nav-bar nav ml-auto'>" ; 
		if ($_SESSION["profil"] == "admin") {
			echo "<li class='nav-item'><a class='nav-link' href=" . hlien("_default","index") ."> Titre </a></li>";
			echo "<li class='nav-item'><a class='nav-link' href=" . hlien("utilisateur","edit","id",$_SESSION["id"]) ."> modifier mon profil </a></li>";
			echo "<li class='nav-item'><a class='nav-link' href=" . hlien("utilisateur","index","id",$_SESSION["id"],"param",1) ."> mon profil </a></li>";
			echo "<li class='nav-item'><a class='nav-link' href=" . hlien("utilisateur","profil","id","SRC","param",2) ."> src profil </a></li>";
			echo "<li class='nav-item'><a class='nav-link' href=" . hlien("utilisateur","profil","id","agent","param",2) ."> agents profil </a></li>";
			echo "<li class='nav-item'><a class='nav-link' href=" . hlien("location","index","id",$_SESSION["id"]) ."> mes locations </a></li>";


		} else if ($_SESSION["profil"] == "SRC") {

		} else if ($_SESSION["profil"] == "agent") {

		} else if ($_SESSION["profil"] == "client") {

		}
		echo "</ul>";
		echo "</div>";  
	}
	
	function a_profil() {
		$u=new Utilisateur();
		$result=$u->findCatProfil($_GET["id"]);
		require $this->gabarit;
	}
    

}
