<?php
if(isset($_POST['new-account-submit'])) {
    
  //bind database
  include 'con.php';
    
  //post escaped data
  $first = mysql_real_escape_string($_POST['first']);
  $last = mysql_real_escape_string($_POST['last']);
  $email = mysql_real_escape_string($_POST['email']);
  $pas = mysql_real_escape_string($_POST['password']);
  
  //hash password
  $sec = hash('sha256', $pas);
  
  //create verification
  $ver = md5(rand(0,1000));
  
  //build query
  $sql="INSERT INTO `users` 
  (`id`, `first`, `last`, `email`, `password`, `hash`) VALUES 
  (NULL, '$first', '$last', '$email', '$sec', '$ver')";

  //insert or die
  if (!mysql_query($sql,$db)) {
    die('Error: ' . mysql_error());
  }
  
  //mail verification link
  $to      = $email;
  $subject = 'GlipGlop | Verification';
  $message = '

Thanks for creating an account with GlopGlop!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

--------------------------------------
Email: '.$email.'
--------------------------------------

Please click this link to activate your account before logging in:
http://www.glipglopbook.com/php/verify.php?email='.$email.'&hash='.$ver.'

  ';
  $headers = 'From:noreply@glipglopbook.com' . "\r\n";
  mail($to, $subject, $message, $headers);

  //push user to first verify stage
  header("Location: ../verify");
  exit;
}

else {
  header("Location: ../");
  exit;
}
