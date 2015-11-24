<?php 

// bind database
include 'con.php';

// get data from ajax
$cat = $_POST['cat'];

// determine category and make query
if($cat == "all") {
  $query = "SELECT * FROM books";
} else {
  $query = "SELECT * FROM books WHERE category = '$cat'";
}

// run query to get all user books
$bookresults = mysql_query($query);

// create array
while($bookrow = mysql_fetch_array($bookresults)) {
  $bookid = $bookrow['id'];
  $title = $bookrow['title'];
  $isbn = $bookrow['isbn'];
  $coverurl = $bookrow['img'];
  $style = 'style="background-image: url('.$coverurl.');"';
  $data[] = array(
    "bookid" => $bookid, 
    "title" => $title, 
    "isbn" => $isbn, 
    "img" => $coverurl,
    "cat" => $cat
  );
}

// return data json array
echo json_encode($data);