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


        function surligne(champ, erreur)
        {
            if(erreur)
                champ.style.backgroundColor = "#fba";
            else
                champ.style.backgroundColor = "";
        }

        function verifNomDomaine(champ)
        {

            var regex = /^[a-zA-Z0-9._-]+\.[a-z]{2,4}$/;
            if(!regex.test(champ.value))
            {
                surligne(champ, true);
                return false;
            }
            else
            {
                surligne(champ, false);
                return true;
            }
        }

        function verifPrix(champ)
        {
            var prix = parseInt(champ.value);
            if(isNaN(prix) || prix <0 || prix > 9999)
            {
                surligne(champ, true);
                return false;
            }
            else
            {
                surligne(champ, false);
                return true;
            }
        }
        function verifForm2(f)
        {
            var nomDomaineOk = verifNomClient(f.nomDomaine);


            if(nomDomaineOk)
                return true;
            else
            {
                alert("Veuillez remplir correctement tous les champs obligatoires");
                return false;
            }
        }

    </script>

</head>

<form action="index.php?uc=connecter&action=ajouterDomaine" onsubmit="return verifForm2(this)" method="post">
    <fieldset align="center">
        <legend align="center"><h2>Ajouter un domaine</h2></legend>

        <label class="form" for="nomDomaine"> Nom du domaine : <font color=red>*</font>
        </label>
        <input class="form" type="text" name="nomDomaine" id="nomDomaine" onblur="verifNomDomaine(this)" style="width:200px;">
        <br>


        <label class="form" for="hebergeur"> Hebergeur : <font color=red>*</font>
        </label>
        <select class="form" name="hebergeur" id="hebergeur" style="width:200px;">
            <option value="Jetmultimedia">Jetmultimedia (sfr)</option>
            <option value="nfrance">nfrance</option>
            <option value="OVH">OVH</option>
            <option value="Zen">Zen</option>
            <option value="Autre">Autre</option>

        </select>
        <br>

        <label class="form" for="prixAchat">Prix achat :
        </label>
        <input class="form" type="text" name="prixAchat" id="prixAchat" onblur="verifPrix(this)" style="width:200px;">
        <br>


        <label class="form" for="prixVente"> Prix de vente :
        </label>
        <input class="form" type="text" name="prixVente" id="prixVente" onblur="verifPrix(this)" style="width:200px;">
        <br>

        <label class="form" for="datepicker">
            Date de validité : </label>
        <input class="form" type="text" id="datepicker"  name="dateValidite"  style="width:200px;"/>
        <br>

        <label class="form" for="client">  Client propriétaire : <font color=red>*</font></label>
        <select class="form" name="client" id="client" style="width:200px;">
            <?php foreach ($clients as $client):
                echo '<option value="'.$client['idClient'].'">'.$client['nomClient'].'</option>';
            endforeach;
            ?>
         </select>

        <p style="text-align:right">
            <input class="btn btn-primary black-background white" type="submit" name="ajouterDomaine" value="Ajouter"><br>
        </p>
    </fieldset>
</form>
