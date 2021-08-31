<?php
/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
*/
class Ctr_accessoire extends Ctr_controleur {

    public function __construct($action) {
        parent::__construct("accessoire", $action);        
        $a = "a_$action";
        $this->$a();
    }

	function a_index() {
		$u=new Accessoire();
		$result=$u->findAll();
		require $this->gabarit;
	}
	
	//$_GET["id"] : id de l'enregistrement
	function a_edit() {
		if (isset($_POST["btSubmit"])) {
			$u=new Accessoire();
			$u->chargerDepuisTableau($_POST);
			$u->sauver();
			header("location:" . hlien("accessoire"));
		} else {				
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$u=new Accessoire($id);
			extract($u->data);	
			require $this->gabarit;
		}
	}
	

	//param GET id 
	function a_del() {
		if (isset($_GET["id"])) {
			$u=new Accessoire();
			$u->supprimer($_GET["id"]);
		}
		header("location:" . hlien("accessoire"));
	}
}

?>