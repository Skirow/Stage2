<body>
<div id="#accueil">
<div id="menuG">
<ul class="nav nav-pills nav-stacked">
  <li class="active"></li>
  <li><a id="Cli" data-toggle="pill" href="#client">Client avec domaines <span class="badge"><?php echo $nbClients?></span></a></li>
  <li><a id="Dom" data-toggle="pill" href="#domaines">Domaines des clients <span class="badge"><?php echo $nbDomaines?></span></a></li>
  <li><a id="SDom" data-toggle="pill" href="#sansdom">Client sans domaines <span class="badge"><?php echo $nbClients2?></span></a></li>
</ul>

</div>
    <div id="client" class="table-responsive">
      <?php include("./vues/clients.php");?>
    </div>
    <div id="domaine" class="table-responsive">
      <?php include("./vues/domaines.php");?>
    </div>
    <div id="cliSdomaines" class="table-responsive">
      <?php include("./vues/clisansdomaine.php");?>
    </div>

</div>
        <script type="text/javascript">

          $(document).ready(function(){

            $("#Cli").click(function(){
              $("#domaine").hide("./vues/domaines.php");
              $("#cliSdomaines").hide("./vues/clisansdomaine.php");
              $("#client").show();
            });
            $("#Dom").click(function(){
              $("#cliSdomaines").hide("./vues/clisansdomaine.php");
              $("#client").hide("./vues/clients.php");
              $("#domaine").show();
             });

            $("#SDom").click(function(){
              $("#client").hide("./vues/clients.php");
              $("#domaine").hide("./vues/domaines.php");
              $("#cliSdomaines").show();
             });

          });

        </script>

</body>
</html>
