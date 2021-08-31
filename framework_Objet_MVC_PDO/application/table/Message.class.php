<?php
/**
Classe créé par le générateur.
*/
class Message extends Table {
	public function __construct($id=0) {
		parent::__construct("message", "mes_id",$id);
	}

	public function findAll()
	{
		$sql="select * from auteur,message where aut_id=mes_auteur order by mes_date desc";
		$result=self::$link->query($sql);
		return $result->fetchAll();	
	}
}
?>
