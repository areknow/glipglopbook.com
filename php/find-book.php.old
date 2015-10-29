<?php

$isbn = $_POST['isbn'];
$url = 'http://isbndb.com/api/books.xml?access_key=QNR0QW1Z&results=details&index1=isbn&value1='.$isbn;
$response = simplexml_load_file($url);

if ($response->BookList['total_results'] > 0) {
  foreach($response->BookList->BookData as $book) {

    $title = $book->Title;
    $author = $book->AuthorsText;
    $publisher = $book->PublisherText;
    $img = "http://covers.openlibrary.org/b/isbn/$isbn-L.jpg";

    echo json_encode(array(
      "title" => $title, 
      "author" => $author, 
      "publisher" => $publisher, 
      "img" => $img
    ));
  }
}
else {
  echo json_encode(array(
    "error" => "false"
  ));
}
