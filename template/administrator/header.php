<!DOCTYPE html>
    
<html>
	<head>
		<link href = "../css/bootstrap.css" type = "text/css" rel = "stylesheet" media = "screen">
		<link href = "../css/gespri.css" type = "text/css" rel = "stylesheet">
        <title> </title>
        <meta name = "viewport" content = "width=device-width, initial-scale = 1.0" charset="UTF-8">
    </head>
    <body>
        <script src = "//code.jquery.com/jquery.js"></script>
        <script src = "../js/bootstrap.min.js"></script>
        <div class="header row">
            <div>
                <img src = "../images/logo.png" class = "img-rounded col-md-2" alt = "GesPRi">
            </div>
            <div class = "col-md-9 gespri-div">
                <nav class="navbar navbar-default" role="navigation">
                    
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="home.php">Home</a>
                    </div>
                    
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Utenti<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="visualizza_utenti.php">Visualizza Utenti</a></li>
                                    <li><a href="aggiungi_utente.php">Registra Utente</a></li>
                                </ul>
							</li>
                            <li><a href="visualizza_bandi.php">Bandi</a></li>
                            <li><a href="form_ricerca.php">Ricerca</a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="modifica_password.php">Modifica password</a></li>
                                    <li><a href="aggiungi_email.php">Aggiungi e-mail</a></li>
                                    <li><a href="visualizza_profilo.php">Visualizza profilo completo</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class = "navbar-text">Ciao, {username}</li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </nav>    
            </div>
        </div>
