<?php

include "con.php";

$id = $_POST['bookid'];
$title = $_POST['title'];
$author = $_POST['author'];
$pub = $_POST['pub'];
$isbn = $_POST['isbn'];

mysql_query("UPDATE books SET 
`title` = '$title',
`author` = '$author',
`publisher` = '$pub',
`isbn` = '$isbn'
WHERE id = $id");

echo "updated book: $id";