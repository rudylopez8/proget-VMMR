<?php
/**
Classe créé par le générateur.
*/
class Allouer extends Table {
	public function __construct($id=0) {
		parent::__construct("allouer", "all_id",$id);
	}

	static function trouverPrix($all_tranche,$all_categorie) {
		$sql = "select * from allouer where all_tranche=:tra and all_categorie=:cat" ; 
		$stmt = self::$link->prepare($sql); 
		$stmt->bindParam(":tra",$all_tranche) ; 
		$stmt->bindParam(":cat",$all_categorie) ;
		$stmt->execute(); 
		return $stmt->fetch(); 
	}
}
?>
