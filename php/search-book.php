<?php

include 'con.php';

$db = new mysqli();
$db->connect($dbHost, $dbUser, $dbPass, $dbDatabase);
$db->set_charset("utf8");

if ($db->connect_errno) {
    printf("Connect failed: %s\n", $db->connect_error);
    exit();
}



// Define Output HTML Formating
$html = '';
$html .= '<li class="result">';
$html .= '<div  onclick="openBookModal(bookId);">';
$html .= '<h3>nameString</h3>';
$html .= '<h4>functionString</h4>';
$html .= '<div class="img" style="background-image: url(coverUrl);"></div>';
$html .= '</div>';
$html .= '</li>';

// Get Search
$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_POST['query']);
$search_string = $db->real_escape_string($search_string);

// Check Length More Than One Character
if (strlen($search_string) >= 1 && $search_string !== ' ') {
  
  // Build Query
  $query = 'SELECT * FROM books WHERE 
  title LIKE "%'.$search_string.'%" OR 
  author LIKE "%'.$search_string.'%" OR 
  publisher LIKE "%'.$search_string.'%" OR 
  isbn LIKE "%'.$search_string.'%"';

  // Do Search
  $result = $db->query($query);
  while($results = $result->fetch_array()) {
    $result_array[] = $results;
  }

  // Check If We Have Results
  if (isset($result_array)) {
    
    foreach ($result_array as $result) {

      // Format Output Strings And Hightlight Matches
      $display_function = preg_replace("/".$search_string."/i", "<b class='highlight'>".$search_string."</b>", $result['author']);
      $display_name = preg_replace("/".$search_string."/i", "<b class='highlight'>".$search_string."</b>", $result['title']);
//      $display_url = 'http://php.net/manual-lookup.php?pattern='.urlencode($result['function']).'&lang=en';

      // Insert Name
      $output = str_replace('nameString', $display_name, $html);

      // Insert Function
      $output = str_replace('functionString', $display_function, $output);

      // Insert URL
      $output = str_replace('urlString', $display_url, $output);
      
      // Insert IMG
      $output = str_replace('coverUrl', $result['img'], $output);
      
      // Insert bookid
      $output = str_replace('bookId', $result['id'], $output);

      // Output
      echo($output);
    }
  } else {

    // Format No Results Output
//    $output = str_replace('urlString', 'javascript:void(0);', $html);
//    $output = str_replace('nameString', '<b>No Results Found.</b>', $output);
//    $output = str_replace('functionString', 'Sorry :(', $output);
    
    $output = "No results found";

    // Output
    echo($output);
  }
}

?>