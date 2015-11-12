<?php

include "con.php";

$title = mysql_real_escape_string($_POST['title']);
$author = mysql_real_escape_string($_POST['author']);
$pub = mysql_real_escape_string($_POST['pub']);
$price = mysql_real_escape_string($_POST['price']);
$isbn = mysql_real_escape_string($_POST['isbn']);
$owner = mysql_real_escape_string($_POST['owner']);
$img = mysql_real_escape_string($_POST['img']);


$sql="INSERT INTO `books` 
  (`id`, `isbn`, `title`, `author`, `publisher`, `price`, `owner`, `img`) VALUES 
  (NULL, '$isbn', '$title', '$author', '$pub', '$price', '$owner', '$img')";


if (!mysql_query($sql,$db)) {
  die('Error: ' . mysql_error());
}

echo $sql;