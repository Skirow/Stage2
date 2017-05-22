<head> <link rel="stylesheet" href="./css/formulaire.css"></head>
<script>
    function surligne(champ, erreur)
    {
        if(erreur)
            champ.style.backgroundColor = "#fba";
        else
            champ.style.backgroundColor = "";
    }

    function verifNomClient(champ)
    {
        if(champ.value.length < 2 || champ.value.length > 150)
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
    function verifAdresse(champ)
    {
        if(champ.value.length < 8 || champ.value.length > 300)
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


    function verifPays(champ)
    {
        if(champ.value.length < 2 )
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
    function verifVille(champ)
    {
        if(champ.value.length < 2)
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
    function verifMail(champ)
    {
        var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
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
    function verifCodePostal(champ)
    {
        var cp = parseInt(champ.value);
        if(isNaN(cp) || cp < 10000 || cp > 99999)
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
    function verifCodeClient(champ){

        var lg= champ.value.length;
        if(lg!=7){
            surligne(champ, true);
            return false;
        }
        else
        {
            surligne(champ, false);
            return true;
        }
    }
    function verifForm1(f)
    {
        var nomClientOk = verifNomClient(f.nomClient);
        var codePostalOk = verifCodePostal(f.codePostal);
        var villeOk = verifVille(f.ville);
        var adresseOk = verifAdresse(f.adresse1);
        var paysOk = verifPays(f.pays);
        var codeClientOk = verifCodeClient(f.codeClient);


        if(codeClientOk  && codePostalOk && nomClientOk && villeOk && adresseOk && paysOk)
            return true;
        else
        {
           alert("Veuillez remplir correctement tous les champs obligatoires");
            return false;
        }
    }


</script>


<form action="index.php?uc=connecter&action=ajouterClient" method="post" onsubmit="return verifForm1(this)">
      <fieldset align="center">
        <legend align="center"><h2>Ajouter un client </h2></legend>

        <label class="form" for="nomClient"> Société/Client : <font color=red>*</font>
        </label>
        <input class="form"type="text" name="nomClient" id="nomClient" onblur="verifNomClient(this)" style="width:200px;">
        <br>

        <label class="form" for="codeClient"> Code client : <font color=red>*</font>
        </label>
        <input class="form"type="text" name="codeClient" id="codeClient" onblur="verifCodeClient(this)" placeholder="Code Client SAGE" style="width:200px;">
        <br>

        <label class="form" for="adresse1">Adresse 1 : <font color=red>*</font>
        </label>
        <input class="form"type="text" name="adresse1" id="adresse1" onblur="verifAdresse(this)" style="width:300px;">
        <br>

        <label class="form" for="adresse2">Adresse 2 :
        </label>
        <input class="form"type="text" name="adresse2" id="adresse2" style="width:300px;">
        <br>

        <label class="form" for="codePostal"> Code postal : <font color=red>*</font>
        </label>
        <input class="form"type="text" name="codePostal" id="codePostal" onblur="verifCodePostal(this)"  style="width:200px;">
        <br>

        <label class="form" for="ville">Ville : <font color=red>*</font>
        </label>
        <input class="form"type="text" name="ville" id="ville" onblur="verifVille(this)" style="width:200px;">
        <br>

        <label class="form" for="pays"> Pays : <font color=red>*</font>
        </label>
        <input class="form"type="text" name="pays" id="pays" onblur="verifPays(this)" style="width:200px;">
        <br>

        <label class="form" for="mail"> Mail :
        </label>
        <input class="form"type="text" name="mail" id="mail"  style="width:200px;">
        <br>


        <p style="text-align:right">
    <input class="btn btn-primary black-background white" type="submit" name="ajouterClient" value="Ajouter"><br>
</p>
</fieldset>
</form>
