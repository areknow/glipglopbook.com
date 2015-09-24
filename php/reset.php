<?php
if(isset($_POST['reset-submit'])) {
    
  //bind database
  include 'con.php';
  
  $email = mysql_real_escape_string($_POST['email']);
  $hash = mysql_real_escape_string($_POST['hash']);
  $password = mysql_real_escape_string($_POST['password']);
  
  $sec = hash('sha256', $password);
  
  //find user
  $search = mysql_query("SELECT email FROM users WHERE email='$email'")
  or die(mysql_error());
  
  //search for number of matches
  $match = mysql_num_rows($search);
  
  if ($match>0) {
    //insert new password

    mysql_query("UPDATE users SET `password` = '$sec' WHERE email = '$email'") or die(mysql_error());;

    header("Location: ../password/thankyou.php");
    exit;
  }
}