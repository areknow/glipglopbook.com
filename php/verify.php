<?php

//bind database
include 'con.php';

//check if gets are valid and set
if(isset($_GET['email']) 
   && !empty($_GET['email']) 
   AND isset($_GET['hash']) 
   && !empty($_GET['hash'])){
  
  //gather variables
  $email = mysql_escape_string($_GET['email']); 
  $hash = mysql_escape_string($_GET['hash']); 
  
  //check db for verification of email and hash
  $search = mysql_query("
  SELECT email, hash, verified 
  FROM users 
  WHERE email='".$email."' AND hash='".$hash."' AND verified='false'") 
  or die(mysql_error()); 
  
  //search for number of matches
  $match = mysql_num_rows($search);
  
  //if match is > 0, authenticate user
  if ($match>0) {
    mysql_query("UPDATE users SET verified='true' WHERE email='".$email."' AND hash='".$hash."' AND verified='false'") or die(mysql_error());
    //success page
    header("Location: ../verify/good.php");
    exit;
  }
  else {
    //error page
    header("Location: ../verify/bad.php");
    exit;
  }
}

else {
  header("Location: ../");
  exit;
}