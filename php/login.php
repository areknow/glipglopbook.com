<?php

//bind database
include 'con.php';

//gather post variables
$usr = mysql_real_escape_string($_POST['email']);
$pas = mysql_real_escape_string($_POST['password']);

//encrypt password
$sec = hash('sha256', $pas);

//build query
$sql = mysql_query("SELECT * FROM users  
  WHERE email='$usr' AND 
  password='$sec' LIMIT 1");

//check for matches and make session variables
if(mysql_num_rows($sql) == 1) {
  $row = mysql_fetch_array($sql);
  session_start();
  $_SESSION['id'] = $row['id'];
  $_SESSION['logged'] = TRUE;
  echo "true";
}

//bounce user and destroy session
else {
  session_start();
  $_SESSION['logged'] = FALSE;
  echo "false";
}
