<?php
/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
*/
class Ctr_utilisateur extends Ctr_controleur {

    public function __construct($action) {
        parent::__construct("utilisateur", $action);        
        $a = "a_$action";
        $this->$a();
    }

	function a_index() {
		$u=new Utilisateur();
		$result=$u->findAll();
		require $this->gabarit;
	}
	
	//$_GET["id"] : id de l'enregistrement
	function a_edit() {
		if (isset($_POST["btSubmit"])) {
			$u=new Utilisateur();
			$_POST["uti_mdp"] = password_hash($_POST["uti_mdp"], PASSWORD_DEFAULT);
			$_POST["uti_profil"] = $_POST["uti_profil"] ?? "" ; 
			$_POST["uti_agence"] = $_POST["uti_agence"] ?? "null" ; 
			if ($_POST["uti_agence"] == "null")
				$_POST["uti_agence"] = null;
			$u->chargerDepuisTableau($_POST);
			$u->sauver();
			header("location:" . hlien("utilisateur"));
		} else {				
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$u=new Utilisateur($id);
			extract($u->data);	
			require $this->gabarit;
		}
	}
	

	//param GET id 
	function a_del() {
		if (isset($_GET["id"])) {
			$u=new Utilisateur();
			$u->supprimer($_GET["id"]);
		}
		header("location:" . hlien("utilisateur"));
	}
}

?>