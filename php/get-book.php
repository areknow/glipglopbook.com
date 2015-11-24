<?php

include "con.php";

$bookid = $_POST['bookid'];

$bookresults = mysql_query("SELECT * FROM books WHERE id = $bookid");

while($bookrow = mysql_fetch_array($bookresults)) {
  $title = $bookrow['title'];
  $author = $bookrow['author'];
  $category = $bookrow['category'];
  $publisher = $bookrow['publisher'];
  $price = $bookrow['price'];
  $isbn = $bookrow['isbn'];
  $img = $bookrow['img'];
  $owner = $bookrow['owner'];
  
  echo json_encode(array(
    "title" => $title, 
    "author" => $author, 
    "category" => $category, 
    "publisher" => $publisher,
    "price" => $price,
    "isbn" => $isbn,
    "img" => $img,
    "owner" => $owner
  ));
}

