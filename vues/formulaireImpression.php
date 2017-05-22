<head>

    <!--<script src=".jquery-ui.js"></script>
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script>
    $(function() {
    	$( "#datepicker" ).datepicker();
    });
			</script>-->
      <script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/minified/i18n/jquery-ui-i18n.min.js" type="text/javascript"></script>
      <script type="text/javascript">
          jQuery(function($){ $.datepicker.setDefaults($.datepicker.regional['fr']); });
      </script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="/resources/demos/style.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

      <script>
      jQuery(function($){
   $.datepicker.regional['fr'] = {
      closeText: 'Fermer',
      prevText: '&#x3c;Préc',
      nextText: 'Suiv&#x3e;',
      currentText: 'Courant',
      monthNames: ['Janvier','Février','Mars','Avril','Mai','Juin',
      'Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
      monthNamesShort: ['Jan','Fév','Mar','Avr','Mai','Jun',
      'Jul','Aoû','Sep','Oct','Nov','Déc'],
      dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
      dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
      dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
      weekHeader: 'Sm',
      //dateFormat: 'dd/mm/yy',
                dateFormat: 'mm/dd/yy',
      firstDay: 1,
      isRTL: false,
      showMonthAfterYear: false,
      yearSuffix: ''};
   $.datepicker.setDefaults($.datepicker.regional['fr']);
});
      $( function() {
        $( "#datepicker" ).datepicker();
      } );
      </script>
</head>


<form action="./controleurs/lettreRenouvellement.php"  method="POST">
    <fieldset align="center">
        <legend><h2>Pour tous les clients</h2></legend>

                 Date limite de renouvellement :<font color=red>*</font>
                <input type="text" id="datepicker"  name="dateLimite"  style="width:100px;"/><br>
            <p style="text-align:center">
            <input class="btn btn-warning" type="submit" name="impression" value="Créer le pdf">
            </p>
    </fieldset>
</form>
