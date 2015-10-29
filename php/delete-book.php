<?php

include "con.php";

$id = $_POST['bookid'];

echo $sql = "DELETE FROM books WHERE id = $id";

if (!mysql_query($sql,$db)) {
    die('Error: ' . mysql_error());
}