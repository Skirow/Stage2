
<?php
$domaines= getDomaines();
?>

<table class="table-fill">
		<thead>
			<tr>
				<th class="text-center">Nom du domaine</th>
				<th class="text-center">Nom client</th>
				<th class="text-center">Registrar</th>
				<th class="text-center">Prix d'achat</th>
        <th class="text-center">Prix de vente</th>
				<th class="text-center">Validité</th>
        <th class="text-center">Actions</th>

			</tr>
		</thead>
		<tbody class="table-hover">
      <?php foreach ($domaines as $domaine):?>
        <tr>
            <td class="text-center"><?php  echo $domaine['nomDomaine']; ?></td>
            <td class="text-center"><?php  echo $domaine['nomClient']; ?></td>
            <td class="text-center"><?php  echo $domaine['hebergeur']; ?></td>
            <td class="text-center"><?php  echo $domaine['prixAchat']." euros" ?></td>
            <td class="text-center"><?php  echo $domaine['prixVente']." euros" ?></td>
            <td class="text-center"><?php $dateValidite =date("d/m/Y", strtotime($domaine['dateValidite']));if($dateValidite=="01/01/1970" OR $dateValidite=="30/11/-0001") echo'Non définie';else echo $dateValidite; ?></td>
						<td class="text-center">
								<a href="index.php?uc=connecter&action=voirDomaine&idDomaine=<?php echo $domaine['idDomaine'];?>" >
                    <input id="modif" border=0 src="./images/modif.png"  onMouseOver="this.src='./images/modif-ani.png'"  onMouseOut="this.src='./images/modif.png'" value=submit type=image title="Modifier le domaine"/>
                </a>
                &nbsp;&nbsp;
                <a href="./modeles/suppressionDomaine.php?id=<?php echo $domaine['idDomaine']; ?>&type=2&idClient=<?php echo $domaine['idClient']; ?>"
                   onclick="return confirm('Etes-vous sûr de vouloir supprimer ce domaine?');">
                    <input id="delete" border=0 src="./images/delete.png" onMouseOver="this.src='./images/delete-ani.png'"  onMouseOut="this.src='./images/delete.png'" value=submit type=image title="Supprimer le domaine"/>
                </a></td>
				 </tr>


    <?php endforeach; ?>
		</tbody>
</table>
