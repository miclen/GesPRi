<?php
if(basename($_SERVER['REQUEST_URI']) == basename(__FILE__)) {
    die('Volevi fare il furbacchione??');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin Page Login</title>
    <link href="<?php echo $conf['dirbase']; ?>/template/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $conf['dirbase']; ?>/template/css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input name="username" type="text" class="form-control" placeholder="Email address" autofocus>
        <input name="password" type="password" class="form-control" placeholder="Password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div>
  </body>
</html>