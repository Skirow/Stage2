<?php

require "modele.php";

deleteClient($_GET['id']);

header ("Location: ../index.php?uc=connecter&action=voir#client");

?>
