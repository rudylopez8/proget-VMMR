<?php
class Ctr_authentification extends Ctr_controleur
{

	public function __construct($action)
	{
		parent::__construct("authentification", $action);
		$a = "a_$action";
		$this->$a();
	}

	function a_connexion()
	{
		$message = "";
		extract($_POST);
		if (isset($btSubmit)) {
			if ($row = Utilisateur::findByLogin($uti_login)) {
				//Si le mot de passe correspond
				if (password_verify($uti_mdp, $row["uti_mdp"])) {
					//création d'une session pour l'utilisateur authentifié
					$_SESSION["id"]      = $row["uti_id"];;
					$_SESSION["login"] = $row["uti_login"];
					$_SESSION["nom"] = $row["uti_nom"];
					$_SESSION["prenom"] = $row["uti_prenom"];
					$_SESSION["adresse"] = $row["uti_adresse"];
					$_SESSION["telephone"] = $row["uti_telephone"];
					$_SESSION["email"] = $row["uti_email"];
					$_SESSION["profil"] = $row["uti_profil"];
					$_SESSION["agence"] = $row["uti_agence"];

					header("location:" . hlien("_default", "index"));
				} else {
					//Si password_verify échoue
					$message = "Erreur d'authentification. Veuillez recommencer.";
				}
			} else {
				//pas d'enregistrement correspondant au login
				$message = "Erreur d'authentification. Veuillez recommencer...";
			}
		} else {
			$uti_login = "";
		}

		require $this->gabarit;
	}

	function a_inscription()
	{
		$message = "";
		if (isset($_POST["btSubmit"])) {
			extract($_POST); 
			$u = new utilisateur();
			$_POST["uti_profil"] = "client";
			$_POST["uti_agence"] = null;
			if (!$row = Utilisateur::findByLogin($_POST["uti_login"])) {
				if ($_POST["uti_mdp"] == $_POST["uti_mdp2"]) {
					$_POST["uti_mdp"] = password_hash($_POST["uti_mdp"],PASSWORD_DEFAULT); 
					$u->chargerDepuisTableau($_POST);
					$u->sauver();
				} else {
					$message = "Vérifier votre saisie de mot de passe." ; 
				}
			} else {
				$message = "Login déjà existant. Essyer avec un autre." ;
			}
		} else {
			$u = new utilisateur(0);
			extract($u->data);
		}

		require $this->gabarit ; 
	}

	function a_deconnexion()
	{
		$_SESSION = [];
		session_destroy();
		header("location:" . hlien("authentification", "connexion"));
	}
}
