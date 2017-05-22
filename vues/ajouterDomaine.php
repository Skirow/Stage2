
<head>

    <link rel="stylesheet" href="./vues/jquery-ui.css" />
    <script src="./vues/jquery-1.9.1.js"></script>
    <script src="./vues/jquery-ui.js"></script>
    <link rel="stylesheet" href"./css/formulaire.css" />
    <script>  $(document).ready(function(){
      $(".toggler").hide();
      $("#button").click(function(){
        $(".toggler").show();
          $(function() {
            $( "#spinner" ).spinner({
                spin: function( event, ui ) {
                    if ( ui.value > 999 ) {
                        $( this ).spinner( "value", 0 );
                        return false;
                    } else if ( ui.value < 0 ) {
                        $( this ).spinner( "value", 999 );
                        return false;
                    }
                }
            });
        });
        $(function() {
            $( "#spinner2" ).spinner({
                spin: function( event, ui ) {
                    if ( ui.value > 999 ) {
                        $( this ).spinner( "value", 0 );
                        return false;
                    } else if ( ui.value < 0 ) {
                        $( this ).spinner( "value", 999 );
                        return false;
                    }
                }
            });
        });


        $(function() {
            $( "#datepicker" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
        $(function() {
            var nom = $( "#nom" ),
                prixAchat = $( "#prixAchat" ),
                prixVente = $( "#prixVente" ),
                allFields = $( [] ).add( nom ).add( prixAchat ).add( prixVente ),
                tips = $( ".validateTips" );


            function updateTips( t ) {
                tips
                    .text( t )
                    .addClass( "ui-state-highlight" );
                setTimeout(function() {
                    tips.removeClass( "ui-state-highlight", 1500 );
                }, 500 );
            }



            function verifPrix(champ)
            {
                var prix = parseInt(champ.value);
                if(isNaN(prix) )
                {
                    champ.addClass( "ui-state-error" );
                    updateTips("Veuillez rentrer des nombres pour les prix");
                    return false;
                }
                else
                {
                    return true;
                }
            }

            function checkLength( o, n, min, max ) {
                if ( o.val().length > max || o.val().length < min ) {
                    o.addClass( "ui-state-error" );
                    updateTips( "La longueur de " + n + " doit être entre " +
                        min + " et " + max + "." );
                    return false;
                } else {
                    return true;
                }
            }

            function checkRegexp( o, regexp, n ) {
                if ( !( regexp.test( o.val() ) ) ) {
                    o.addClass( "ui-state-error" );
                    updateTips( n );
                    return false;
                } else {
                    return true;
                }
            }

            $( "#dialog-form" ).dialog({
                autoOpen: false,
                height: 380,
                width: 350,
                modal: true,
                buttons: {
                    "Vérifier": function() {
                        var bValid = true;
                        allFields.removeClass( "ui-state-error" );
                        checkLength( nom, "nom de domaine", 3, 26 );
                        checkRegexp(nom, /^[a-zA-Z0-9._-]+\.[a-z]{2,4}$/ ,"Nom de domaine de type [a-z 0-9].com par exemple");
                    },
                    Annuler: function() {
                        $( this ).dialog( "close" );
                    }
                },
                close: function() {
                    allFields.val( "" ).removeClass( "ui-state-error" );
                }
            });

            $( "#create-user" )
                .button()
                .click(function() {
                    $( "#dialog-form" ).dialog( "open" );
                });
        });

        function verifLongueur( o, min, max ) {
            if ( o.length > max || o.length < min ) {
                return false;
            } else {
                return true;
            }
        }
        function verifRegexp( o, regexp ) {
            if ( !( regexp.test( o ) ) ) {
                return false;
            } else {
                return true;
            }
        }

        function verifForm3(f){
            var longueurOk = verifLongueur(f.nom.value, 3, 26);
            var formeOk = verifRegexp(f.nom.value,/^[a-zA-Z0-9._-]+\.[a-z]{2,4}$/ );

            if( longueurOk && formeOk ){

                return true;
            }
            else
            {
                alert("Veuillez remplir correctement tous les champs obligatoires et vérifier avant de les envoyés");
                return false;
            }
        }
        $( function() {
          // run the currently selected effect
          function runEffect() {
            var selectedEffect = "slide";
            var options = {};
            $( "#effect" ).toggle( selectedEffect, options, 500 );
          };

          $( "#button" ).on( "click", function() {
            runEffect();
          });
        });
      });
    });
    </script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<div style="margin-left" class="toggler">
  <div id="effect" class="ui-widget-content ui-corner-all">
    <form  action="index.php?uc=connecter&action=modifCli&idClient=<?php echo $client['idClient'];?>" onsubmit="return verifForm3(this)" method="post"  >
      <fieldset align="center">
        <legend align="center"><h3 class="ui-widget-header ui-corner-all">Ajouter un Domaine</h3></legend>
            <label class="form"for="nom">Nom du domaine </label>
            <input class="form" type="text" name="nom" id="nom" class="text ui-widget-content ui-corner-all" />
            <label class="form" for="hebergeur"> Hebergeur </label>
            <select class="form" name="hebergeur" id="hebergeur" style="width:200px;">
                <option value="Jetmultimedia">Jetmultimedia (sfr)</option>
                <option value="nfrance">nfrance</option>
                <option value="OVH">OVH</option>
                <option value="Zen">Zen</option>
                <option value="Autre">Autre</option>
            </select>
            <br><br>
            <label class="form"for="spinner">Prix d'achat (euros)</label>
            <input class="form" id="spinner" name="prixAchat"/><br><br>
            <label class="form"for="spinner2">Prix de vente (euros)</label>
            <input class="form" id="spinner2" name="prixVente" /><br><br>
            <label class="form" for="datepicker">Date de validité </label>
            <input class="form" type="text" id="datepicker"  name="dateValidite"  class="text ui-widget-content ui-corner-all"/>
            <p style="text-align:right">
            <input class="btn btn-primary black-background white" type="submit" value="Ajouter" name="AjouterDomaine"/>
          </p>
      </fieldset>
    </form>
  </div>
</div>
<p align="center">
<button id="button" class="ui-state-default ui-corner-all">Ajouter un nom de domaine</button>
</p>
