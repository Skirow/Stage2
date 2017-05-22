<br>

<table class="contentText1" cellpadding ="0" border="5" rules="all" bgcolor=#EFEFEF>
    <tr>
        <td><h3>  Code client   </h3> </td><td><h3>   Nom client   </h3> </td><td> <h3> Actions </h3></td>
    </tr>

    <?php foreach ($clients as $client):?>
        <tr>
            <td><?php  echo $client['codeClient']; ?></td>
            <td><?php  echo $client['nomClient']; ?></td>
            <td>
                <a href="../controleurs/ficheClient.php?idClient=<?php echo $client['idClient'];?>" >
                    <input border=0 src="../style/modifier.png" value=submit type=image title="Consulter et/ou modifer"/>
                </a>
                &nbsp;&nbsp;
                <a href="../modeles/suppressionClient.php?id=<?php echo $client['idClient']; ?>"
                   onclick="return confirm('Etes-vous sûr de vouloir supprimer ce client?');">
                    <input border=0 src="../vues/croix-supprimer.gif" value=submit type=image title="Supprimer le client"/>
                </a>
            </td>
        </tr>


    <?php endforeach; ?>

</table>
