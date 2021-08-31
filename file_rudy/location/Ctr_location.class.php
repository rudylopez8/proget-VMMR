<?php
/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
*/
class Ctr_location extends Ctr_controleur {

    public function __construct($action) {
        parent::__construct("location", $action);        
        $a = "a_$action";
        $this->$a();
    }

	function a_index() {
		$u=new Location();
		$result=$u->findAll();
		require $this->gabarit;
	}
	
	//$_GET["id"] : id de l'enregistrement
	function a_edit() {
		if (isset($_SESSION["agence"])) {
			if (isset($_POST["btSubmit"])) {
				$u=new Location();
				$u->chargerDepuisTableau($_POST);
				$u->sauver();
				header("location:" . hlien("location"));
			} else {				
				$id = isset($_GET["id"]) ? $_GET["id"] : 0;
				$u=new Location($id);
				extract($u->data);	
				require $this->gabarit;
			}
		}
	header("location:index.php");
	}
	

	//param GET id 
	function a_del() {
		if (isset($_GET["id"])) {
			if (isset($_SESSION["agence"])) {
				$u=new Location();
				$u->supprimer($_GET["id"]);
			}
			header("location:" . hlien("location"));
		}
		header("location:index.php");
	}

}
?>