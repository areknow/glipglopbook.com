<?php 

// get user id from post
$userid = $_POST['userid'];

// bind database
include 'con.php';

// run query to get all user books
$bookresults = mysql_query("SELECT * FROM books WHERE owner = $userid");

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
    "img" => $coverurl
  );
}

// return data json array
echo json_encode($data);