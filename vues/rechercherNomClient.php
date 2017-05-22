<head>
<script>
  $(function() {
        $("#search").on("keyup", function() {
          var regval = new RegExp('^' + $(this).val(), "i");
          $("table tr:gt(0)").addClass('hidden');
          $("table tr:gt(0)").filter(function() {
            var found = 0;
            $(this).find('td').each(function() {
              $(this).html().match(regval) && found++
            });
            return found > 0; }).removeClass('hidden');
            });
        });

</script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  <script type='text/javascript' src='http://code.jquery.com/jquery-1.5.js'></script>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.js"></script>
</head>
<body>

 <div style="margin-left:20%;margin-right:20%;padding-bottom:30px;" class="ui-widget">
   <label for="client"><h3><span class="label label-info">Recherche dans le tableau</span></h3></label>
   <input name="client" id="search" class="form-control" />
 </div>
</body>
