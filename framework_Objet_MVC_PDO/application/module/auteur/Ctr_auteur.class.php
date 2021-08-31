<?php
/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
*/
class Ctr_auteur extends Ctr_controleur {
/*
	public $classTable = "Auteur";
	public $table = "auteur";
	public $cle = "aut_id";
*/
    public function __construct($action) {
        parent::__construct("auteur", $action);        
        $a = "a_$action";
        $this->$a();
    }

	function a_index() {
		$u=new Auteur();
		$result=$u->findAll();
		require $this->gabarit;
	}
	
	//$_GET["id"] : id de l'enregistrement
	function a_edit() {
		if (isset($_POST["btSubmit"])) {
			$u=new Auteur();
			$u->chargerDepuisTableau($_POST);
			$u->sauver();
			header("location:index.php?m=auteur");
		} else {				
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$u=new Auteur($id);
			extract($u->data);	
			require $this->gabarit;
		}
	}
	

	//param GET id 
	function a_del() {
		if (isset($_GET["id"])) {
			$u=new Auteur();
			$u->supprimer($_GET["id"]);
		}
		header("location:index.php?m=auteur");
	}
}

?>