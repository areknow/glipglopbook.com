<?php 

//bind database
include '../php/con.php';

//check if gets are valid and set
if(isset($_GET['email']) 
   && !empty($_GET['email']) 
   AND isset($_GET['hash']) 
   && !empty($_GET['hash'])){
  
  //gather variables
  $email = mysql_escape_string($_GET['email']); 
  $hash = mysql_escape_string($_GET['hash']);
}

?>

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
      <form action="../php/reset.php" method="post" class="body row">
        <h5><?PHP echo $email; ?></h5>
        <p>Enter your new password.</p>
        <div class="input-field col s12">
          <input name="password" id="input-started-email" type="password">
          <input name="hash" value="<?php echo $hash; ?>" type="hidden">
          <input name="email" value="<?php echo $email; ?>" type="hidden">
          <label for="input-started-email">Password</label>
        </div>
        <button name="reset-submit" class="waves-effect waves-light btn">RESET</button>
      </form>
    </div>
  </body>
  <script type="text/javascript" src="../js/jquery.1.11.3.min.js"></script>
  <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
</html>