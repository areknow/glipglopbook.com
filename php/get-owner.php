<?php

include "con.php";

$id = $_POST['id'];

$results = mysql_query("SELECT * FROM users WHERE id = $id");

while($row = mysql_fetch_array($results)) {
  $first = $row['first'];
  $last = $row['last'];
  $campus = $row['campus'];
  
  echo json_encode(array(
    "first" => $first, 
    "last" => $last, 
    "campus" => $campus
  ));
}
