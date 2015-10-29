<?php

$isbn = $_POST['isbn'];

$isbn = str_replace('-', '', $isbn);

require_once 'amazon.php';

// make a new object
$Amazon = new Amazon();

// load book parameteres
$parameters = array( 
  'Operation'     => 'ItemLookup', 
  'ResponseGroup' => 'Medium,Images',
  'IdType'        => 'ISBN',
  'SearchIndex'   => 'All',
  'ItemId'        => $isbn );

// get the signed url
$queryUrl = $Amazon->getSignedUrl($parameters);

// load the xml response into a variable
$response = simplexml_load_file($queryUrl);

// check if response is valid
$error = $response->Items->Request->Errors->Error->Code;
if ($error=="AWS.InvalidParameterValue") {
  // encode error response for AJAX
  echo json_encode(array(
    "error" => "false"
  ));
}
else {
  // traverse xml and get variables
  $image = $response->Items->Item->LargeImage->URL;
  $title = $response->Items->Item->ItemAttributes->Title;
  $author = $response->Items->Item->ItemAttributes->Author;
  $publisher = $response->Items->Item->ItemAttributes->Publisher;
  $price = $response->Items->Item->ItemAttributes->ListPrice->FormattedPrice;
  // encode json array for return
  echo json_encode(array(
    "title" => $title, 
    "author" => $author, 
    "publisher" => $publisher, 
    "price" => $price, 
    "img" => $image,
    "query" => $queryUrl
  ));
}

