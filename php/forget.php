<?php
if(isset($_POST['forgot-submit'])) {
    
  //bind database
  include 'con.php';
    
  //post escaped data
  $email = mysql_real_escape_string($_POST['email']);
  
  //find user
  $search = mysql_query("SELECT email FROM users WHERE email='$email'")
  or die(mysql_error());
  
  //search for number of matches
  $match = mysql_num_rows($search);
  
  if ($match>0) {
    
    $query = mysql_query("SELECT hash FROM users WHERE email='$email'")
  or die(mysql_error());
    $row = mysql_fetch_array($query);
    $hash = $row['hash'];
    
    $to      = $email;
    $subject = 'GlipGlop | Verification';
    $message = '
  
GlipGlop account retreival

Please click this link to change your password before logging in:
http://www.glipglopbook.com/password/index.php?email='.$email.'&hash='.$hash.'
  
    ';
    $headers = 'From:noreply@glipglopbook.com' . "\r\n";
    mail($to, $subject, $message, $headers);
    
    header("Location: ../verify");
    exit;
  }
  else {
    header("Location: ../verify/invalid.php");
    exit;
  }
}