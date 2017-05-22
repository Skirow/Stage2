<br>
<?php
  $clients= getClientsSansDomaine();
  $temp= getNbClientsSansDomaine()->fetch();
  $nbClients2= $temp['count(gnd_client.idClient)'];
?>
<table class="table-fill">
		<thead>
			<tr>
        <th class="text-center">Code client</th>
        <th class="text-center">Nom client</th>
        <th class="text-center">Actions</th>
			</tr>

      <tbody class="table-hover">
  	    <?php foreach ($clients as $client):?>
          <tr>
              <td class="text-center"><?php  echo $client['codeClient']; ?></td>
              <td class="text-center"><?php  echo $client['nomClient']; ?></td>
              <td class="text-center">
                <a href="index.php?uc=connecter&action=voirClient&idClient=<?php echo $client['idClient']; ?>" >
                    <input id="modif" border=0 src="./images/modif.png"  onMouseOver="this.src='./images/modif-ani.png'"  onMouseOut="this.src='./images/modif.png'" value=submit type=image title="Consulter et/ou modifer"/>
                </a>
                &nbsp;&nbsp;
								<a href="./modeles/suppressionClient.php?id=<?php echo $client['idClient']; ?>"
                   onclick="return confirm('Etes-vous sûr de vouloir supprimer ce client?');">
                    <input id="delete" border=0 src="./images/delete.png" onMouseOver="this.src='./images/delete-ani.png'"  onMouseOut="this.src='./images/delete.png'" value=submit type=image title="Supprimer le client"/>
                </a>
            </td>
        </tr>


    <?php endforeach; ?>

</table>
