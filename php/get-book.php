<?php

include "con.php";

$bookid = $_POST['bookid'];

$bookresults = mysql_query("SELECT * FROM books WHERE id = $bookid");

while($bookrow = mysql_fetch_array($bookresults)) {
  $title = $bookrow['title'];
  $author = $bookrow['author'];
  $publisher = $bookrow['publisher'];
  $price = $bookrow['price'];
  $isbn = $bookrow['isbn'];
  $img = $bookrow['img'];
  
  echo json_encode(array(
    "title" => $title, 
    "author" => $author, 
    "publisher" => $publisher,
    "price" => $price,
    "isbn" => $isbn,
    "img" => $img
  ));
}

