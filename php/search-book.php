<?php


// bind to database
include 'con.php';

// create new msqli object
$db = new mysqli();
$db->connect($dbHost, $dbUser, $dbPass, $dbDatabase);
$db->set_charset("utf8");

if ($db->connect_errno) {
    printf("Connect failed: %s\n", $db->connect_error);
    exit();
}



// define output template
$html = '';
$html .= '<li class="result">';
$html .= '<div onclick="openBookModal(bookId);">';
$html .= '<h3 class="truncate">nameString</h3>';
$html .= '<h4>functionString</h4>';
$html .= '<div class="img" style="background-image: url(coverUrl);"></div>';
$html .= '</div>';
$html .= '</li>';

// get search string
$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_POST['query']);
$search_string = $db->real_escape_string($search_string);

// make sure its atleast one character
if (strlen($search_string) >= 1 && $search_string !== ' ') {
  
  // build the query
  $query = 'SELECT * FROM books WHERE 
  title LIKE "%'.$search_string.'%" OR 
  author LIKE "%'.$search_string.'%" OR 
  publisher LIKE "%'.$search_string.'%" OR 
  isbn LIKE "%'.$search_string.'%"';

  // run search query
  $result = $db->query($query);
  while($results = $result->fetch_array()) {
    $result_array[] = $results;
  }

  // check if we have results
  if (isset($result_array)) {
    
    // loop through results
    foreach ($result_array as $result) {

      // format output strings
      $display_function = preg_replace("/".$search_string."/i", "<b class='highlight'>".$search_string."</b>", $result['author']);
      $display_name = preg_replace("/".$search_string."/i", "<b class='highlight'>".$search_string."</b>", $result['title']);

      $output = str_replace('nameString', $display_name, $html);
      $output = str_replace('functionString', $display_function, $output);
      $output = str_replace('urlString', $display_url, $output);
      $output = str_replace('coverUrl', $result['img'], $output);
      $output = str_replace('bookId', $result['id'], $output);

      // output
      echo($output);
    }
  } 
  // echo error
  else {
    echo("No results found");
  }
}

?>