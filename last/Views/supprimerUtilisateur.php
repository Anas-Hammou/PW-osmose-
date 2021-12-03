<?PHP
	if(!isset($_SESSION)){
		session_start();
	}

	include_once "../controller/UtilisateurC.php";

	if (isset($_REQUEST['supprimer_utilisateur']))
	{
		$utilisateurC=new UtilisateurC();
	
		if (isset($_POST["id_user"])){
			$utilisateurC->supprimer_Utilisateur($_POST["id_user"]);
			// header('Refresh:0');
			if (isset($_SESSION['role_user']) && $_SESSION["role_user"] == "Administrateur"){
				header('Location: administrateur.php');
			}
		}
	}
?>