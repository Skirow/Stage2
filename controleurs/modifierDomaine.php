<?php

require "../modeles/modele.php";
$requete= getDomaine($_GET['idDomaine']);
if(isset($_GET['idClient'])){
 $requete2= getClient($_GET['idClient']);
    $clientActuel= $requete2->fetch();
}
$domaine=$requete->fetch();
$clients =getAllClients();
require"../vues/modifierDomaine.php";


if(isset ($_POST['modifierDomaine'])){
    $dateValidite =date("Y/m/d", strtotime($_POST['dateValidite']));
    modifierDomaine( $_GET['idDomaine'], $_POST['nomDomaine'], $_POST['hebergeur'], $_POST['prixAchat'], $_POST['prixVente'], $dateValidite );
echo "<script> window.location.reload(true); </script>";

}
?>
