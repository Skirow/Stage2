<?php
	$clients= getClients();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
	<script>	$(document).ready(function() {
				$('#table').DataTable();
		} );</script>
<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th class="text-center">Code client</th>
				<th class="text-center">Nom client</th>
				<th class="text-center">Nbre(s) de domaines</th>
				<th class="text-center">Paiement</th>
				<th class="text-center">Cout</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
		<tbody class="table-hover">
	    <?php foreach ($clients as $client):?>
        <tr>
            <td class="text-center"><?php  echo $client['codeClient']; ?></td>
            <td class="text-center"><?php  echo $client['nomClient']; ?></td>
            <td class="text-center"><?php  echo $client['count(*)']; ?></td>
            <td class="text-center"><?php  echo $client['paiement']." euros" ?></td>
            <td class="text-center"><?php  echo $client['cout']." euros" ?></td>
						<td class="text-center">
                <a href="index.php?uc=connecter&action=voirClient&idClient=<?php echo $client['idClient']; ?>" >
                    <input id="modif" border=0 src="./images/modif.png" onMouseOver="this.src='./images/modif-ani.png'"  onMouseOut="this.src='./images/modif.png'" value=submit type=image title="Consulter et/ou modifer"/>
                </a>&nbsp;&nbsp;
                <a href="./modeles/suppressionClient.php?id=<?php echo $client['idClient']; ?>"
                   onclick="return confirm('Etes-vous sûr de vouloir supprimer ce client?');">
                    <input id="delete" border=0 src="./images/delete.png" onMouseOver="this.src='./images/delete-ani.png'"  onMouseOut="this.src='./images/delete.png'" value=submit type=image title="Supprimer le client"/></td>
         </tr>


    <?php endforeach; ?>
		</tbody>
</table>
