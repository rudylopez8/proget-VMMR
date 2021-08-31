<?php
/**
Classe créé par le générateur.
*/
class Agence extends Table {
	public function __construct($id=0) {
		parent::__construct("agence", "age_id",$id);
	}
	function findAll() {
		$sql="select * from agence, departement where age_departement=dep_id";
		$result=self::$link->query($sql);
		return $result->fetchAll();			
	}
}
?>
