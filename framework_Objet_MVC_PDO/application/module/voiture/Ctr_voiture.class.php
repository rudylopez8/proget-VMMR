<?php
/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
*/
class Ctr_voiture extends Ctr_controleur {

    public function __construct($action) {
        parent::__construct("voiture", $action);        
        $a = "a_$action";
        $this->$a();
    }

	function a_index() {
		$u=new Voiture();
		$result=$u->findAll();
		require $this->gabarit;
	}
	
	//$_GET["id"] : id de l'enregistrement
	function a_edit() {
		if (isset($_POST["btSubmit"])) {
			$u=new Voiture();
			$u->chargerDepuisTableau($_POST);
			$u->sauver();
			header("location:" . hlien("voiture"));
		} else {				
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$u=new Voiture($id);
			extract($u->data);	
			require $this->gabarit;
		}
	}
	

	//param GET id 
	function a_del() {
		if (isset($_GET["id"])) {
			$u=new Voiture();
			$u->supprimer($_GET["id"]);
		}
		header("location:" . hlien("voiture"));
	}
}

?>