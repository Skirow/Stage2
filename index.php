<?php
session_start();
require("./modeles/modele.php");

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];

switch($uc)
{
	case 'accueil':
		{include("./vues/connexion.php");break;}
	case 'login' :
		{include("./controleurs/login.php");break;}
	case 'connecter' :
	  {include("./controleurs/connecter.php");break;  }
}
?>
