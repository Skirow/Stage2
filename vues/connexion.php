<!DOCTYPE html>

<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <title>Authentification Nom de domaines</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="./css/css.css"/>
    </head>
    <body style="background-color:#607D8B;">
        <div class="container">

            <header>
              <img src="./images/logo.png" height="auto" width="30%">
            </header>
            <section>
                <div id="container_demo">
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  method="post" action="index.php?uc=login&action=connexion">
                                <h1>Connexion</h1>
                                <p>
                                    <label for="username" class="uname" > Identifiant </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="Entrer un login"/>
                                </p>
                                <p>
                                    <label for="password" class="youpasswd"> Mot de passe </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="Entrer un mot de passe" />
                                </p>
                                <p class="login button">
                                    <input type="submit" value="Envoyer" />
								                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
