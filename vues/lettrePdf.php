<?php
header('Content-Type: text/html; charset=utf-8');
//  require('fpdf17/fpdf.php');
?>



<?php

/*Signature sitcom*/

$pdf->AddPage();
$pdf->Image('../images/logo_sitcom.png',10,10,-220);
$pdf->Ln(20);
$pdf->SetFont('Arial','I',11);
$pdf->Write(0,utf8_decode("18 rue Pharaon-31 000 Toulouse"));
$pdf->Ln(5);
$pdf->Write(0,utf8_decode("Tél: 05 61 14 92 92 - Fax: 05 61 14 92 93"));
$pdf->Ln(5);
$pdf->Write(0,utf8_decode("www.sitcom.fr - sitcom@sitcom.fr"));
$pdf->Ln(5);


/*Adresse du destinataire*/
$pdf->SetFont('Arial','B',12);
$nomClient=strtoupper ($nomClient);
$adresse=strtoupper ($adresse);
$ville=strtoupper ($ville);
$pays = strtoupper ($pays);
if ($pays=="FRANCE") $pays="";
$pdf->MultiCell(0,5, utf8_decode("\n".$nomClient."                  \n".$adresse."                  \n".$codePostal." ".$ville."                  \n".$pays."                  ") ,0,"R");


/*Date*/
$pdf->SetFont('Arial','',11);
$pdf->Ln(5);
$pdf->MultiCell(0,5,utf8_decode("Toulouse, le ".$date."                  "),0, "R" );


/*Objet*/
$pdf->Ln(13);

/*important*/
$pdf->Ln(1);

$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(229,49,70);
$pdf->MultiCell(0,5,utf8_decode("IMPORTANT"),0);
$pdf->Ln(4);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(150,0,utf8_decode("Objet: Renouvellement de nom de domaine."),0, 2 );
$pdf->Ln(5);
$pdf->Cell(150,0,utf8_decode("Référence client: ".$codeClient),0, 2 );

/*Contenu*/
$pdf->Ln(20);
$pdf->Cell(150,0,"      Cher Client, ",0, 2 );
$pdf->Ln(7);
$pdf->MultiCell(0,5,utf8_decode("     Nous vous informons que nous allons procéder à l'entretien annuel des noms de domaines installés sur notre serveur, dans le but de les maintenir pour la période annuelle ".$année),0);
$pdf->Ln(3);

$pdf->MultiCell(0,5,utf8_decode("Afin de renouveler votre nom de domaine auprès des organismes AFNIC, INTERNIC, TUCOWS, GANDI... etc, nous vous prions de bien vouloir vous acquitter des factures "),0);
$pdf->SetFont('Arial','B',11);
$x= $pdf->GetX();
$y= $pdf->GetY($x);
$pdf->Text($x + 113, $y-1.4, utf8_decode("avant le ".$dateLimite."."));
$pdf->Ln(3);


/*affichage des domaines*/
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(190,5,utf8_decode("La liste des noms de domaines concernés: "),0);
$pdf->SetFont('Courier','B',11);
$pdf->SetTextColor(7,6,70);

$textDomaine="";
    foreach ($domaines as $domaine):
        $textDomaine= $textDomaine."                       - ".$domaine['nomDomaine']."\n";
    endforeach;
$pdf->MultiCell(0,5,$textDomaine, 0 );

$pdf->SetTextColor(0,0,0);
$pdf->Ln(3);
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(190,5,utf8_decode("Le non réglement de ces factures aura comme incidence la perte ou la résiliation de votre domaine dans le domaine public. Nous insistons sur les conséquences du non renouvellement d'un nom de domaine : "),0);
$pdf->SetFont('Arial','B',11);
$pdf->Ln(3);

$pdf->MultiCell(0,3, utf8_decode("      - site internet rendu inaccessible par le bureau d'enregistrement,\n
      - e-mails rattachés au nom de domaine rendus inactifs,\n
      - perte totale du nom de domaine 30 jours après la date anniversaire à défaut de renouvellement."));
$pdf->Ln();

$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,5,utf8_decode("Veuillez agréer, cher Client, l'expression de nos salutations distinguées."),0);
$pdf->Ln(7);

$pdf->SetFont('Arial','B',11);
$pdf->MultiCell(0,5,utf8_decode("Le service comptable, SITCOM SOFTWARE"),0,"R");

$pdf->Ln(20);
$pdf->SetX(10);
$pdf->SetY(270);
$pdf->SetFont('Arial','B',9);
$pdf->MultiCell(0,5,utf8_decode("NB : Merci de bien vouloir établir un chèque à l'ordre de Sitcom Software"),0);
$y= $pdf->GetY($x);
$pdf->SetTextColor(229,49,70);
$pdf->Text($x + 113, $y-1.5, utf8_decode("avant le ".$dateLimite."."));
$pdf->SetTextColor(0,0,0);
$pdf->Ln(7);
