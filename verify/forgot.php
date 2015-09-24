<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/>
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no'>
    <meta name='author' content='Arnaud Crowther, Alex Osbourne, Amanda Labelle, Eric Maul'>
    <title>GlipGlop | Verify</title>
    <link rel="stylesheet" href="../materialize/css/materialize.min.css" type="text/css">
    <link rel="stylesheet" href="../css/base.css" type="text/css">
    <link rel="stylesheet" href="../css/verify.css" type="text/css">
  </head>
  <body>
    <div class="verified forgotten z-depth-1">
      <div class="header"><img src="../res/logo/white.png"></div>
      <form action="../php/forget.php" method="post" class="body row">
        <h5>Forgotten Password</h5>
        <p>Enter your email to verify the account.</p>
        <div class="input-field col s12">
          <input name="email" id="input-started-email" type="email">
          <label for="input-started-email">Email</label>
        </div>
        <button name="forgot-submit" class="waves-effect waves-light btn">VERIFY</button>
      </form>
    </div>
  </body>
  <script type="text/javascript" src="../js/jquery.1.11.3.min.js"></script>
  <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
</html>