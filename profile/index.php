<?PHP

session_start();

if ($_SESSION['logged'] == true) {
  echo "logged in";
}
else {
  echo "login failed";
}