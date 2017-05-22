<?php

// Modéle : intéractions avec la bd (requete SQL...)
require('bdd.php');
function connexionAdmin($username, $password)
{
	$bdd = getBdd();
	$mdp = md5($password);
	$req = "select * from crm_utilisateurs where nomUtilisateur='$username' and mdp='$mdp'";
	$res = $bdd->query($req);
	$leslogins=$res->fetch();
	return $leslogins;
}

function getDomaine($idDomaine){
    $bdd= getBdd();
    $requete=$bdd->query('SELECT *
                          FROM gnd_domaine
                          WHERE idDomaine='.$idDomaine);
    return $requete;
}

function getDomainesClient($idClient){

    $bdd= getBdd();
    $requete=$bdd->query('SELECT *
                          FROM gnd_avoir, gnd_domaine
                          WHERE gnd_avoir.idDomaine= gnd_domaine.idDomaine
                          AND gnd_avoir.idClient='.$idClient.'
                          ORDER BY nomDomaine');
    return $requete;
}


function getClient($idClient){
    $bdd= getBdd();
    $requete=$bdd->query('SELECT *
                          FROM gnd_client
                          WHERE idClient='.$idClient);
    return $requete;
}


function getClientDomaine($idDomaine){
    $bdd= getBdd();
    $requete=$bdd->query('SELECT *
                          FROM gnd_avoir, gnd_domaine
                          WHERE gnd_avoir.idClient= gnd_domaine.idClient
                          AND gnd_avoir.idDomaine='.$idDomaine);
    return $requete;
}



function getClients(){
    $bdd= getBdd();
    $requete=$bdd->query('SELECT distinct gnd_client.idClient, nomClient, codeClient, codePostal, ville, adresse1,pays,
                          count(*), sum(gnd_domaine.prixVente) as paiement, sum(gnd_domaine.prixAchat) as cout, count(gnd_client.idClient)
                          FROM gnd_avoir, gnd_client, gnd_domaine
                          WHERE gnd_avoir.idClient=gnd_client.idClient
                          AND gnd_domaine.idDomaine= gnd_avoir.idDomaine
                          GROUP BY idClient
                          ORDER BY nomClient');
    return $requete;
}

function getNbClients(){
    $bdd= getBdd();
    $requete=$bdd->query('SELECT  count(gnd_client.idClient)
                          FROM  gnd_client
                          WHERE gnd_client.idClient  IN (select gnd_avoir.idClient
   					                                     FROM gnd_avoir)');
    return $requete;
}

function getClientsSansDomaine(){
    $bdd= getBdd();
    $requete=$bdd->query('SELECT *
                          FROM  gnd_client
                          WHERE gnd_client.idClient NOT IN (select gnd_avoir.idClient
   					                                         FROM gnd_avoir)
													ORDER BY nomClient ASC');
    return $requete;
}

function getDomainesSansClient(){
    $bdd= getBdd();
    $requete= $bdd->query('SELECT *
                           FROM gnd_domaine
                           WHERE gnd_domaine.idDomaine NOT IN (select gnd_avoir.idDomaine
                                                    FROM gnd_avoir)');
    return $requete;
}


function getNbDomainesSansClient(){
    $bdd= getBdd();
    $requete= $bdd->query('SELECT count(gnd_domaine.idDomaine)
                           FROM gnd_domaine
                           WHERE gnd_domaine.idDomaine NOT IN (select gnd_avoir.idDomaine
                                                    FROM gnd_avoir)');
    return $requete;
}



function getNbClientsSansDomaine(){
    $bdd= getBdd();
    $requete=$bdd->query('SELECT  count(gnd_client.idClient)
                          FROM  gnd_client
                          WHERE gnd_client.idClient NOT IN (select gnd_avoir.idClient
   					                                         FROM gnd_avoir)');
    return $requete;
}



function getAllClients(){
    $bdd= getBdd();
    $requete=$bdd->query('SELECT distinct *
                         FROM gnd_client
											 ORDER BY nomClient ASC');
    return $requete;
}



function getDomaines(){
    $bdd= getBdd();
    $requete=$bdd->query('SELECT distinct gnd_domaine.idDomaine, gnd_client.idClient, nomDomaine, nomClient, hebergeur, prixAchat, prixVente, dateValidite
                          FROM gnd_avoir, gnd_client, gnd_domaine
                          WHERE gnd_avoir.idClient=gnd_client.idClient
                          AND gnd_avoir.idDomaine=gnd_domaine.idDomaine
                          ORDER BY nomDomaine');
    return $requete;
}

function getNbDomaines(){
    $bdd= getBdd();
    $requete=$bdd->query('SELECT count(gnd_domaine.idDomaine)
                          FROM gnd_avoir, gnd_client, gnd_domaine
                          WHERE gnd_avoir.idClient=gnd_client.idClient
                          AND gnd_avoir.idDomaine=gnd_domaine.idDomaine');
    return $requete;
}




function modifierDomaine($idDomaine, $nomDomaine, $hebergeur, $prixAchat, $prixVente, $dateValidite ){
    $bdd= getBdd();

    $bdd->exec('UPDATE gnd_domaine
                 SET nomDomaine="'.$nomDomaine.'",
                 hebergeur="'.$hebergeur.'",
                 prixAchat='.$prixAchat.',
                 prixVente='.$prixVente.',
                 dateValidite="'.$dateValidite.'"
                 WHERE idDomaine='.$idDomaine);

}



function insertDomaine ($idClient, $nomDomaine, $hebergeur, $prixAchat, $prixVente, $dateValidite){
    $bdd = getBdd();

    $req=$bdd->query('select *
                 from gnd_domaine
                 where nomDomaine="'.$nomDomaine.'"');
    $doublon= $req->fetch();

    if(empty($doublon['idDomaine'])){
    $insertion=$bdd->prepare('INSERT INTO gnd_domaine (nomDomaine, hebergeur, prixAchat, prixVente, dateValidite)
                              VALUES (:nomDomaine, :hebergeur, :prixAchat, :prixVente, :dateValidite)');

    $insertion->execute(array ('nomDomaine'=>$nomDomaine, 'hebergeur'=>$hebergeur,
                               'prixAchat'=> $prixAchat, 'prixVente'=> $prixVente, 'dateValidite'=> $dateValidite ));
    $idDomaine = $bdd->lastInsertId();

    $insertion= $bdd->prepare('INSERT INTO gnd_avoir(idClient, idDomaine)
                               VALUES (:idClient, :idDomaine)');
    $insertion->execute(array('idClient'=>$idClient, 'idDomaine'=>$idDomaine));
    return true;
    }
    else return false;
}




function deleteDomaine($idDomaine){
    $bdd = getBdd();

    $bdd->exec('DELETE FROM gnd_domaine
                WHERE idDomaine='.$idDomaine);
    $bdd->exec('DELETE FROM gnd_avoir
                WHERE idDomaine='.$idDomaine);
}

function modifierClient( $idClient, $nomClient, $adresse1, $adresse2, $codePostal, $ville, $pays, $mail){
    $bdd= getBdd();

    $bdd->exec('UPDATE gnd_client
                SET nomClient="'.$nomClient.'",
                 adresse1="'.$adresse1.'",
                 adresse2="'.$adresse2.'",
                 codePostal='.$codePostal.',
                 ville="'.$ville.'",
                 pays="'.$pays.'",
                 mail="'.$mail.'"
                 WHERE idClient='.$idClient);
}



function insertClient ($codeClient, $nomClient, $adresse1, $adresse2, $codePostal, $ville, $pays, $mail){
    $bdd = getBdd();

    $req=$bdd->query('select *
                 from gnd_client
                 where codeClient="'.$codeClient.'"
                 or nomClient="'.$nomClient.'"');
    $doublon= $req->fetch();

    if(empty($doublon['idClient'])){
    $insertion=$bdd->prepare('INSERT INTO gnd_client (codeClient, nomClient, adresse1, adresse2, codePostal, ville, pays, mail)
                              VALUES (:codeClient,:nomClient, :adresse1, :adresse2, :codePostal, :ville, :pays, :mail)');

    $insertion->execute(array('codeClient'=>$codeClient, 'nomClient'=>$nomClient, 'adresse1'=> $adresse1, 'adresse2'=> $adresse2, 'codePostal'=> $codePostal,
                                'ville'=> $ville, 'pays'=>$pays, 'mail'=>$mail ));
        return true;
    }
    else return false;
}



function deleteClient($idClient){
    $bdd = getBdd();

    $bdd->exec('DELETE FROM gnd_client
                WHERE idClient='.$idClient);
    $bdd->exec('DELETE FROM gnd_avoir
                WHERE idClient='.$idClient);
}
