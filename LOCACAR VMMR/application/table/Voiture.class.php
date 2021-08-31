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

	/**
	 * -----------------t1-----t2-----------
	 * ----td-------tf-------------------------
	 * -----------------------------td-------tf---
	 * !(tf<t1 OR td>t2)
	 */
	static function findVoitureDisponible($t1,$t2,$cat) {
		$sql = "select * from voiture, categorie 
		where voi_categorie = cat_id  and cat_id=:cat and voi_id not in ( 
		select loc_voiture from location where !(loc_fin<:t1 
		or loc_debut>:t2)) ";
		$stmt = self::$link->prepare($sql) ; 
		$stmt->bindParam(":cat",$cat,PDO::PARAM_INT) ; 
		$stmt->bindParam(":t1", $t1,PDO::PARAM_STR) ;
		$stmt->bindParam(":t2", $t2,PDO::PARAM_STR) ;
		$stmt->execute(); 
		return $stmt->fetchAll();   
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
