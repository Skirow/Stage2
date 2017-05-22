<head>
    <link rel="stylesheet" href="./vues/jquery-ui.css" />
    <script src="./vues/jquery-1.9.1.js"></script>
    <script src="./vues/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <link rel="stylesheet" href="./css/formulaire.css">
    <script>
        $(function() {
            $( "#datepicker" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
</head>


<form action="index.php?uc=connecter&action=modifDom&idDomaine=<?php echo $domaine['idDomaine'];?>" method="post">
    <fieldset align="center">
        <legend align="center"><h2>Modifications :</h2></legend>

        <label class="form" for="nomDomaine"> Nom du domaine:
        </label>
        <input class="form" type="text" name="nomDomaine" id="nomDomaine" value="<?php echo $domaine['nomDomaine'];?>" style="width:200px;">
        <br>


        <label class="form" for="hebergeur"> Hebergeur :
        </label>
        <select class="form" name="hebergeur" id="hebergeur" style="width:200px;">
            <option value="Jetmultimedia" <?php if($domaine['hebergeur']=="Jetmultimedia") echo"selected";?> >Jetmultimedia (sfr)</option>
            <option value="nfrance" <?php if($domaine['hebergeur']=="nfrance") echo"selected";?>>nfrance</option>
            <option value="OVH" <?php if($domaine['hebergeur']=="OVH") echo"selected";?>>OVH</option>
            <option value="Zen" <?php if($domaine['hebergeur']=="Zen") echo"selected";?>>Zen</option>
        </select>
        <br>

        <label class="form" for="prixAchat">Prix achat:
        </label>
        <input class="form" type="text" name="prixAchat" value="<?php echo $domaine['prixAchat'];?>" id="prixAchat" style="width:200px;">
        <br>


        <label class="form" for="prixVente"> Prix de vente :
        </label>
        <input class="form" type="text" name="prixVente" id="prixVente" value="<?php echo $domaine['prixVente'];?>"  style="width:200px;">
        <br>

        <label class="form" for="datepicker">
            Date de validité: </label>
        <input class="form" type="text" id="datepicker" value="<?php echo date("d/m/Y", strtotime($domaine['dateValidite']))     ;?>"  name="dateValidite"  style="width:200px;"/>
        <br>



        <p style="text-align:right">
            <input class="btn btn-primary black-background white" type="submit" name="modifierDomaine" value="Modifier"><br>
        </p>
    </fieldset>
</form>
