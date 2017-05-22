


<br> <table class="contentText1" cellpadding ="0" border="5" rules="all" bgcolor=#EFEFEF>
    <tr>
        <td><h3>    Nom du domaine   </h3> </td><td><h3>     Registrar  </h3> </td><td> <h3>   Prix d'achat </h3></td><td> <h3>   Prix de vente   </h3></td><td><h3> Validité</h3> </td><td ><h3>Actions</h3></td>
    </tr>

    <?php foreach ($domaines as $domaine):?>
        <tr>
            <td><?php  echo $domaine['nomDomaine']; ?></td>
            <td><?php  echo $domaine['hebergeur']; ?></td>
            <td><?php  echo $domaine['prixAchat'].' euros'; ?></td>
            <td><?php  echo $domaine['prixVente'].' euros'; ?></td>
            <td><?php $dateValidite =date("d/m/Y", strtotime($domaine['dateValidite']));if($dateValidite=="01/01/1970" OR $dateValidite=="30/11/-0001") echo'Non définie';else echo $dateValidite; ?></td>
            <td>
                <a href="../controleurs/modifierDomaine.php?idDomaine=<?php echo $domaine['idDomaine'];?>" >
                    <input border=0 src="../style/modifier.png" value=submit type=image title="Modifier le domaine"/>
                </a>
                &nbsp;&nbsp;
                <a href="../modeles/suppressionDomaine.php?id=<?php echo $domaine['idDomaine'];?>&type=1"
                   onclick="return confirm('Etes-vous sûr de vouloir supprimer ce domaine?');">
                    <input border=0 src="../vues/croix-supprimer.gif" value=submit type=image title="Supprimer le domaine"/>
                </a>
            </td>
        </tr>

    <?php endforeach; ?>

</table>