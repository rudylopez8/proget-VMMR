<?php
/**
Classe créé par le générateur.
*/
class Voiture extends Table {
	public function __construct($id=0) {
		parent::__construct("voiture", "voi_id",$id);
	}
	function findAll() {
		$sql="select * from voiture, agence, categorie where voi_agence=age_id and voi_categorie=cat_id";
		$result=self::$link->query($sql);
		return $result->fetchAll();			
	}
/*
	function charger($id) {

		$sql="select * from voiture, agence where voi_agence=age_nom and voi_id=$id "; //$this->cle=:id
		$statement = self::$link->prepare($sql);
		$statement->bindValue(":id",$id,PDO::PARAM_INT);
		try {
			$statement->execute();
		} finally {}
		$this->data=$statement->fetch();
	}
*/
}
?>
