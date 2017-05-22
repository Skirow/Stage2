<head> <link rel="stylesheet" href="./css/formulaire.css"></head>

<form  action="index.php?uc=connecter&action=modifCli&idClient=<?php echo $client['idClient']; ?>" method="post">
    <fieldset align="center">

        <legend align="center"><h2>Modifications</h2></legend>

        <label class="form" for="nomClient"> Société/Client:
        </label>
        <input class="form" type="text" name="nomClient" id="nomClient" value="<?php echo $client['nomClient']; ?>"  style="width:200px;">
        <br>

        <label class="form" for="adresse1">Adresse 1  :
        </label>
        <input class="form" type="text" name="adresse1" id="adresse1" value="<?php echo $client['adresse1']; ?>" style="width:300px;">
        <br>
        <label class="form" for="adresse2">Adresse 2:
        </label>
        <input class="form" type="text" name="adresse2" id="adresse2" value="<?php echo $client['adresse2']; ?>" style="width:300px;">
        <br>

        <label class="form" for="codePostal"> Code postal :
        </label>
        <input class="form" type="text" name="codePostal" id="codePostal"  value="<?php echo $client['codePostal']; ?>" style="width:200px;">
        <br>

        <label class="form" for="ville">Ville :
        </label>
        <input class="form" type="text" name="ville" id="ville"  value="<?php echo $client['ville']; ?>" style="width:200px;">
        <br>

        <label class="form" for="pays"> Pays :
        </label>
        <input class="form" type="text" name="pays" id="pays" value="<?php echo $client['pays']; ?>" style="width:200px;">
        <br>

        <label class="form" for="mail"> Mail:
        </label>
        <input class="form" type="text" name="mail" id="mail" value="<?php echo $client['mail']; ?>" style="width:200px;">

        <br>

        <p style="text-align:right">
            <input class="btn btn-primary black-background white" type="submit" name="modifierClient" value="Modifier">
        </p>

    </fieldset>
</form>
