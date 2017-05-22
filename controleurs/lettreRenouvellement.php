<?php

require ('../vues/fpdf17/fpdf.php');
require ("../modeles/modele.php");


$clients = getClients();
setlocale(LC_TIME, 'fra_fra');
$date = strftime('%d %B %Y');
$dateLimite=strftime('%d %B %Y', strtotime($_POST['dateLimite']));
$année = date('Y', strtotime($_POST['dateLimite']));

$pdf = new FPDF();

    foreach ($clients as $client):
        $nomClient= $client['nomClient'];
        $adresse = $client['adresse1'];
        $pays= $client['pays'];
        $ville= $client['ville'];
        $codeClient= $client['codeClient'];
        $codePostal= $client['codePostal'];
        $domaines= getDomainesClient($client['idClient']);
require ("../vues/lettrePdf.php");
    endforeach;

$pdf->Output();
