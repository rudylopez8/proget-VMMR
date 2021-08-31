<?php
/**
Classe créé par le générateur.
*/
class Utilisateur extends Table {
	public function __construct($id=0) {
		parent::__construct("utilisateur", "uti_id",$id);
	}
}
?>
