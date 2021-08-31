<?php
/**
Classe créé par le générateur.
*/
class Utilisateur extends Table {
	public function __construct($id=0) {
		parent::__construct("utilisateur", "uti_id",$id);
	}
	static public function findByLogin($login) {
		$sql = "select * from utilisateur where uti_login=:login" ; 
		try{
		$stmt = self::$link->prepare($sql); 
		$stmt->bindValue(":login",$login, PDO::PARAM_STR);
		$stmt->execute(); 
		} catch (Exception $e) {
			var_dump($e);
		}
		return $stmt->fetch();  
	}

static public function findPrecit($id) {
		$sql = "select * from utilisateur where uti_id=:id" ; 
		try{
		$stmt = self::$link->prepare($sql); 
		$stmt->bindValue(":id",$id, PDO::PARAM_INT);
		$stmt->execute(); 
		} catch (Exception $e) {
			var_dump($e);
		}
		return $stmt->fetchAll();  
	}

	public function findCatProfil($profil) {
		$sql = "select * from utilisateur where uti_profil=:profil" ; 
		try{
		$stmt = self::$link->prepare($sql); 
		$stmt->bindValue(":profil",$profil, PDO::PARAM_STR);
		$stmt->execute(); 
		} catch (Exception $e) {
			var_dump($e);
		}
		return $stmt->fetchAll();  
	}


	/*function insertSql() {
		$sql = "insert into utilisateur values (null,':uti_nom',':uti_prenom',':uti_login',':uti_mdp',':uti_adresse',':uti_email',':uti_telephone',':uti_profil',:uti_agence)"; 
		return $sql;
	}

	function updateSql() {
		$sql = "update utilisateur set uti_nom=':uti_nom',uti_prenom=':uti_prenom',uti_login=':uti_login',uti_mdp=':uti_mdp',uti_adresse=':uti_adresse',uti_email=':uti_email',uti_telephone=':uti_telephone',uti_profil=':uti_profil',uti_agence=:uti_agence where $this->cle=:" . $this->cle ;
		return $sql;
	}*/
//	function findSRC() {
//		$sql="select * from utilisateur where uti_profil=src";
//		$result=self::$link->query($sql);
//		return $result->fetchAll();			
//	}



}
