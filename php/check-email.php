<?php

// get post variable
$email = mysql_real_escape_string($_POST['email']);

// bind database
include 'con.php';

// build query
$sql = mysql_query("SELECT * FROM users WHERE email='$email'");

// compare and set variable
if(mysql_num_rows($sql) == 1) {
  $exists = "true";
}
else {
  $exists = "false";
}

// return json array
echo json_encode(array(
  "exists" => $exists
));