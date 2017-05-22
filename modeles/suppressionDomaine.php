<?php

require "modele.php";

deleteDomaine($_GET['id']);

if($_GET['type']==1)
    header ("Location: ../index.php?uc=connecter&action=voir#domaine");

if($_GET['type']==2)
    header ("Location: ../index.php?uc=connecter&action=voirClient&idClient=".$_GET['idClient']);
?>
