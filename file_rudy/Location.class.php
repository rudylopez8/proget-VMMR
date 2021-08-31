<?php
/**
Classe créé par le générateur.
*/
class Location extends Table {
	public function __construct($id=0) {
		parent::__construct("location", "loc_id",$id);
	}
	function findAll() {
		$sql="select * from location, utilisateur, voiture, agence where loc_utilisateur=uti_id and loc_voiture=voi_id and loc_agence_depart=age_id and loc_agence_arrivee=age_id";
		$result=self::$link->query($sql);
		return $result->fetchAll();			
	}
/*
	function charger($id) {
		parent::charger($id);
		sql="select * from location, utilisateur, voiture, agence, where loc_utilisateur=uti_id and loc_voiture=voi_id and loc_agence_depart=age_id and loc_agence_arrivee=age_id and loc_id=$id"; //$this->cle=:id
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
