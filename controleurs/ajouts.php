<?php
require "../modeles/modele.php";



if(isset($_POST['ajouterClient'])){
    if( !empty($_POST['nomClient']) and !empty($_POST['codeClient'])
    and !empty($_POST['adresse1'])  and !empty($_POST['codePostal'])
    and !empty($_POST['ville'])     and !empty($_POST['pays'])){
        if(insertClient($_POST['codeClient'], $_POST['nomClient'],$_POST['adresse1'], $_POST['adresse2'], $_POST['codePostal'], $_POST['ville'],$_POST['pays'], $_POST['mail']))
            { echo 'Ajout du client effectué.';

        			header("Location:index.php?uc=connecter&action=ajout");
            }
        else echo 'Client déjà existant';
    }
    else{
        $message='Le formulaire est incomplet.';
        echo $message;
    }
}

$clients= getAllClients();
require"../vues/formulaireAjoutDomaine.php";

if(isset($_POST['ajouterDomaine'])){
    if( !empty($_POST['nomDomaine']) and !empty($_POST['hebergeur'])){
        $dateValidite =date("Y/m/d", strtotime($_POST['dateValidite']));
        if(insertDomaine($_POST['client'], $_POST['nomDomaine'], $_POST['hebergeur'], $_POST['prixAchat'], $_POST['prixVente'], $dateValidite))
        {
          echo'Ajout du domaine effectué.';
          header("Location:index.php?uc=connecter&action=ajout");
        }
        else echo'Domaine du même nom déjà existant.';
    }
    else{
        $message='Le formulaire est incomplet.';
        echo $message;
    }
}
