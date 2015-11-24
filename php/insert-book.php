<?php

include "con.php";

$title = mysql_real_escape_string($_POST['title']);
$author = mysql_real_escape_string($_POST['author']);
$category = mysql_real_escape_string($_POST['category']);
$pub = mysql_real_escape_string($_POST['pub']);
$price = mysql_real_escape_string($_POST['price']);
$isbn = mysql_real_escape_string($_POST['isbn']);
$owner = mysql_real_escape_string($_POST['owner']);
$img = mysql_real_escape_string($_POST['img']);


$sql="INSERT INTO `books` 
  (`id`, `isbn`, `title`, `author`, `category`, `publisher`, `price`, `owner`, `img`) VALUES 
  (NULL, '$isbn', '$title', '$author', '$category', '$pub', '$price', '$owner', '$img')";


if (!mysql_query($sql,$db)) {
  die('Error: ' . mysql_error());
}

echo $sql;