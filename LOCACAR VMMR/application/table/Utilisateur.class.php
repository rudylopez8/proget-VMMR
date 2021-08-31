<?php
/**
Classe créé par le générateur.
*/
class Utilisateur extends Table {
	public function __construct($id=0) {
		parent::__construct("utilisateur", "uti_id",$id);
	}

	function findAll(string $type="") {
		$sql = "select * from utilisateur ";
		if ($type != "") {
			$sql.=" where uti_profil=:type ";
			$stmt = self::$link->prepare($sql) ; 
			$stmt->bindParam(":type",$type,PDO::PARAM_STR);
			$stmt->execute() ; 
			return $stmt->fetchAll() ; 
		} else {
			$sql.= " where uti_profil!='admin' " ; 
			$stmt = self::$link->query($sql) ;
			$stmt->execute() ; 
			return $stmt->fetchAll() ;  
		}
		
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

	/*function insertSql() {
		$sql = "insert into utilisateur values (null,':uti_nom',':uti_prenom',':uti_login',':uti_mdp',':uti_adresse',':uti_email',':uti_telephone',':uti_profil',:uti_agence)"; 
		return $sql;
	}

	function updateSql() {
		$sql = "update utilisateur set uti_nom=':uti_nom',uti_prenom=':uti_prenom',uti_login=':uti_login',uti_mdp=':uti_mdp',uti_adresse=':uti_adresse',uti_email=':uti_email',uti_telephone=':uti_telephone',uti_profil=':uti_profil',uti_agence=:uti_agence where $this->cle=:" . $this->cle ;
		return $sql;
	}*/
}
