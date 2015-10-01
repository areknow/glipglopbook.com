<?PHP
session_start();
$_SESSION['logged'] = FALSE;
session_destroy();

//change this header to full length address http://....
header("Location: ../");
exit;
