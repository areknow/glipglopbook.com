<?php

include "con.php";

$id = $_POST['bookid'];
$title = $_POST['title'];
$author = $_POST['author'];
$category = $_POST['category'];
$pub = $_POST['pub'];
$price = $_POST['price'];
$isbn = $_POST['isbn'];

mysql_query("UPDATE books SET 
`title` = '$title',
`author` = '$author',
`category` = '$category',
`publisher` = '$pub',
`price` = '$price',
`isbn` = '$isbn'
WHERE id = $id");

echo "updated book: $id";