<?php
  require '../configuration.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>GesPRi :: Install PAGE</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $conf['dirbase'];?>/template/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $conf['dirbase'];?>/template/css/install_page.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">
        <?php if(isset($_GET['start'])) {
          require 'createAdmin.php';
        } else {?>
          <div class="jumbotron">
          <h1><img width="30%" src="<?php echo $conf['dirbase'];?>/template/images/logo_installer.png"></h1>
          <p class="lead">E se poi te ne penti?</p>
          <p><a class="btn btn-lg btn-success" href="<?php echo $conf['dirbase'];?>/install/?start">Start!</a></p>
        <?php } ?>
      </div>

    </div> <!-- /container -->
  </body>
</html>
