<?php
/**
Classe créé par le générateur.
*/
class Tranche extends Table {
	public function __construct($id=0) {
		parent::__construct("tranche", "tra_id",$id);
	}
/	function tranchePrec($id) {
/
/		$sql="select tra_max from tranche where tra_id=$id "; //$this->cle=:id
/		$statement = self::$link->prepare($sql);
/		$statement->bindValue(":id",$id,PDO::PARAM_INT);
/		try {
/			$statement->execute();
/		} finally {}
/		$this->data=$statement->fetch();
/	}

}
?>
