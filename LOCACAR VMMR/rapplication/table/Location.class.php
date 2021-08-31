<?php
/**
Classe créé par le générateur.
*/
class Location extends Table {
	public function __construct($id=0) {
		parent::__construct("location", "loc_id",$id);
	}
	function findAll() {
		$sql="select  location.*,cat_label,uti_nom,uti_login,uti_prenom,voiture.*,agence.age_id as depart_id, agence.age_nom as depart_nom,agence.age_departement as depart_departement,arrivee.age_id as arrivee_id, arrivee.age_nom as arrivee_nom,arrivee.age_departement as arrivee_departement 
		from location,utilisateur,voiture,categorie,agence,agence as arrivee 
		where loc_utilisateur=uti_id and voi_categorie=cat_id and loc_voiture=voi_id and loc_agence_depart=agence.age_id and loc_agence_arrivee=arrivee.age_id
		order by loc_id";
		$result=self::$link->query($sql);
		return $result->fetchAll();			
	}

	function findAccessoiresBylocation($id) {
		$sql = "select loc_id, GROUP_CONCAT(acc_label) as accessoires
		from location,accessoire,contenir 
		where con_location=loc_id and con_accessoire=acc_id and loc_id=$id
		group by loc_id ";
		$result=self::$link->query($sql);
		return $result->fetch();
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
