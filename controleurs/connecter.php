<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'voir':
	{
		if(isset($_SESSION['coAd']))
		{
			$temp= getNbClients()->fetch();
			$nbClients= $temp['count(gnd_client.idClient)'];
			$req= getNbDomaines();
			$temp= $req->fetch();
			$nbDomaines = $temp['count(gnd_domaine.idDomaine)'];
			$clients= getClientsSansDomaine();
			$req= getNbClientsSansDomaine();
			$temp= $req->fetch();
			$nbClients2= $temp['count(gnd_client.idClient)'];
			require("./vues/menu.php");
			include("./vues/accueil.php");
		}
		else {
			header("Location:index.php");
		}
  		break;
	}
	case 'voirAjout':
	{
		if(isset($_SESSION['coAd']))
		{
			$clients= getAllClients();
			include("./vues/menu.php");
			include("./vues/formulaireAjoutClient.php");
			include("./vues/formulaireAjoutDomaine.php");
		}
		else {
			header("Location:index.php");
		}
		break;
	}
	case 'ajouterClient':
	{
			if(isset($_SESSION['coAd']))
			{
				if(isset($_POST['ajouterClient'])){
				    if( !empty($_POST['nomClient']) and !empty($_POST['codeClient'])
				    and !empty($_POST['adresse1'])  and !empty($_POST['codePostal'])
				    and !empty($_POST['ville'])     and !empty($_POST['pays'])){
				        if(insertClient($_POST['codeClient'], $_POST['nomClient'],$_POST['adresse1'], $_POST['adresse2'], $_POST['codePostal'], $_POST['ville'],$_POST['pays'], $_POST['mail']))
				            {
											$clients= getAllClients();
											include("./vues/menu.php");
											echo '<div style="margin-left:30%;margin-right:30%" style="margin-left:auto;" align="center" class="alert alert-success" role="alert"><h2><strong>Ajout du Client!</strong></h2></div>';
											include("./vues/formulaireAjoutClient.php");
											include("./vues/formulaireAjoutDomaine.php");}
				         else {
									 $clients= getAllClients();
									 include("./vues/menu.php");
									 echo '<div style="margin-left:30%;margin-right:30%" align="center" class="alert alert-danger" role="alert"><h2><strong>Client déjà existant!</strong></h2></div>';
									 include("./vues/formulaireAjoutClient.php");
									 include("./vues/formulaireAjoutDomaine.php");
								 }
				    }
				    else{
				        $message='Le formulaire est incomplet.';
				        echo $message;
				    }
				}
			}
		else {
					header("Location:index.php");
					}
				break;
	}
	case 'ajouterDomaine':
	{
			$clients= getAllClients();
			if(isset($_POST['ajouterDomaine'])){
			    if( !empty($_POST['nomDomaine']) and !empty($_POST['hebergeur'])){
			        $dateValidite =date("Y/m/d", strtotime($_POST['dateValidite']));
			        if(insertDomaine($_POST['client'], $_POST['nomDomaine'], $_POST['hebergeur'], $_POST['prixAchat'], $_POST['prixVente'], $dateValidite))
			        {
								$clients= getAllClients();
								include("./vues/menu.php");
								echo '<div style="margin-left:30%;margin-right:30%" align="center" class="alert alert-success" role="alert"><h2><strong>Ajout du domaine effectué!</strong></h2></div>';
								include("./vues/formulaireAjoutClient.php");
								include("./vues/formulaireAjoutDomaine.php");}

			        else {
								$clients= getAllClients();
								include("./vues/menu.php");
								echo '<div style="margin-left:30%;margin-right:30%" align="center" class="alert alert-danger" role="alert"><h2><strong>Domaine du même nom déjà existant!</strong></h2></div>';
								include("./vues/formulaireAjoutClient.php");
								include("./vues/formulaireAjoutDomaine.php");
							}
			    }
			    else{
			        $message='Le formulaire est incomplet.';
			        echo $message;
			    }
				}
				else {
					header("Location:index.php");
				}
			break;
	}
	case 'imprimer':
	{
		if(isset($_SESSION['coAd']))
		{
			include("./vues/menu.php");
			include("./vues/formulaireImpression.php");
		}
		else {
			header("Location:index.php");
		}
		break;
	}
	case 'voirClient':
		{
			if(isset($_SESSION['coAd']))
			{
				$requete= getClient($_GET['idClient']);
				$client= $requete->fetch();
				$nomClient= $client['nomClient'];
				$domaines= getDomainesClient($client['idClient']);
				include("./vues/menu.php");
				include("./vues/listeDomainesClient.php");
				require("./vues/ajouterDomaine.php");
				include ("./vues/modifierClient.php");
			}
				else {
					header("Location:index.php");
				}
				break;
		}
	case 'modifCli':
		{
			if(isset($_SESSION['coAd']))
			{

				if(isset($_POST['AjouterDomaine']) and !empty($_POST['nom']) ){
				insertDomaine($_GET['idClient'], $_POST['nom'], $_POST['hebergeur'], $_POST['prixAchat'], $_POST['prixVente'], $_POST['dateValidite']);
				header("Location:index.php?uc=connecter&action=voirClient&idClient=".$_GET['idClient']);
				}

				if(isset ($_POST['modifierClient'])){
						modifierClient( $_GET['idClient'], $_POST['nomClient'], $_POST['adresse1'], $_POST['adresse2'], $_POST['codePostal'], $_POST['ville'], $_POST['pays'], $_POST['mail']);
						header("Location:index.php?uc=connecter&action=voirClient&idClient=".$_GET['idClient']);
				}

			}
				else {
					header("Location:index.php");
				}
				break;


		}
	case 'voirDomaine':
			{
				if(isset($_SESSION['coAd']))
				{
					$requete= getDomaine($_GET['idDomaine']);
					if(isset($_GET['idClient'])){
					 $requete2= getClient($_GET['idClient']);
					    $clientActuel= $requete2->fetch();
					}
					$domaine=$requete->fetch();
					$clients =getAllClients();
					include("./vues/menu.php");
					include("./vues/modifierDomaine.php");
					}
					else {
						header("Location:index.php");
					}
					break;
			}
		case 'modifDom':
			{
				if(isset($_SESSION['coAd']))
				{
								if(isset ($_POST['modifierDomaine'])){
							    $dateValidite =date("Y/m/d", strtotime($_POST['dateValidite']));
								    modifierDomaine( $_GET['idDomaine'], $_POST['nomDomaine'], $_POST['hebergeur'], $_POST['prixAchat'], $_POST['prixVente'], $dateValidite );
										header("Location:index.php?uc=connecter&action=voirDomaine&idDomaine=".$_GET['idDomaine']);
								}
				}
					else {
						header("Location:index.php");
					}
					break;
			}
	case 'chercher':
	{
		if(isset($_SESSION['coAd']))
		{
			include("./vues/menu.php");
			include("./vues/rechercherNomClient.php");
			include("./vues/clients.php");
		}
		else {
				header("Location:index.php");
			}
			break;
	}
	case 'deconnexion':
	{
		if(isset($_SESSION['coAd']))
		{
			session_destroy();
		}
		
		header("Location:index.php");
		break;
	}
}
?>
