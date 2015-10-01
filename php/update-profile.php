<?PHP

include "con.php";

$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$id = $_POST['userid'];

$result = mysql_query("UPDATE users SET 
`first` = '$first', 
`last` = '$last',
`email` = '$email',
`phone` = '$phone'
WHERE id = $id");

if($result) { 
  echo "true";
}
else {
  echo "false";
}