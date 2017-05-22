<?php

$action = $_REQUEST['action'];
switch($action)
{
	case 'voirConnexion' :
	{
		if(isset($_SESSION['coAd']))
		{
			header("Location:index.php?uc=connecter&action=voir");
		}
		else
		include("./vues/connexion.php");
			break;
	}
	case 'connexion':
	{
		$nom=$_REQUEST["username"];
		$mdp=$_REQUEST["password"];

		$res = connexionAdmin($nom,$mdp);

		if($res !=null)
		{
			$_SESSION['coAd'] = $res['nomUtilisateur'];
			header("Location:index.php?uc=connecter&action=voir");
		}
		else
		{
			$message = "Identifiants erronés";
			include('./vues/v_message.php');
			include('./vues/connexion.php');
		}
		break;
	}


}


?>
