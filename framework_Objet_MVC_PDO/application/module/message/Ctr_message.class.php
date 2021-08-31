<?php
/**
Controleur créé par le générateur.
Controleur associé à une table (implémente le CRUD)
*/
class Ctr_message extends Ctr_controleur {

	public $classTable = "Message";
	public $table = "message";
	public $cle = "mes_id";

    public function __construct($action) {
        parent::__construct("message", $action);        
        $a = "a_$action";
        $this->$a();
    }

	function a_index() {
		$u=new Message();
		$result=$u->findAll();
		require $this->gabarit;
	}
	
	//$_GET["id"] : id de l'enregistrement
	function a_edit() {
		if (isset($_POST["btSubmit"])) {
			$u=new Message();
			$u->chargerDepuisTableau($_POST);
			$u->sauver();
			header("location:index.php?m=message");
		} else {				
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$u=new Message($id);
			extract($u->data);	
			require $this->gabarit;
		}
	}
	

	//param GET id 
	function a_del() {
		if (isset($_GET["id"])) {
			$u=new Message();
			$u->supprimer($_GET["id"]);
		}
		header("location:index.php?m=message");
	}
}

?>