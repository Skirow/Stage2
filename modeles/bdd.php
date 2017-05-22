<?php
function getBdd(){
    //$login ='adminweb';
    //$mdp= '7putoqte';
		$login ='root';
    $mdp= '46C4ki7m*';
    try
    {
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=crm', $login, $mdp);
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
}
 ?>
