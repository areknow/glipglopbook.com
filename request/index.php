<?php




if (isset($_POST['request-book'])) {
  
  include '../php/con.php';
  
  $bookid = mysql_real_escape_string($_POST['book']);
  $ownerid = mysql_real_escape_string($_POST['owner']);
  $userid = mysql_real_escape_string($_POST['user']);
  $message = mysql_real_escape_string($_POST['message']);
  
  $bookresults = mysql_query("SELECT * FROM books WHERE id = $bookid");
  while($bookrow = mysql_fetch_array($bookresults)) {
    $title = $bookrow['title'];
    $author = $bookrow['author'];
    $isbn = $bookrow['isbn'];
  }
  
  $ownerresults = mysql_query("SELECT * FROM users WHERE id = $ownerid");
  while($ownerrow = mysql_fetch_array($ownerresults)) {
    $ownerfirst = $ownerrow['first'];
    $ownerlast = $ownerrow['last'];
    $owneremail = $ownerrow['email'];
  }
  
  $userresults = mysql_query("SELECT * FROM users WHERE id = $userid");
  while($userrow = mysql_fetch_array($userresults)) {
    $first = $userrow['first'];
    $last = $userrow['last'];
    $email = $userrow['email'];
    $campus = $userrow['campus'];
  }
  

  $to      = $owneremail;
  $subject = 'GlipGlop | Book Purchase Request';
  $message = '

Congratulations! Someone would like to purchase one of your books from GlipGlop.

--------------------------------------

Book information:
Title: '.$title.'
Author: '.$author.'
ISBN: '.$isbn.'

Requested from:
Name: '.$first.' '.$last.'
Email: '.$email.'
Location: '.$campus.'
Message: '.$message.'

--------------------------------------

Please reply directly to this email in order to start a conversation with '.$first.' about how you would like to get your book to them.

Once you have sold your book, remember to mark it as "sold" in your inventory.

  ';
  $headers = "From: noreply@glipglopbook.com\r\nReply-to: $email";
  mail($to, $subject, $message, $headers);
  
}

?>

<!doctype html>

<html lang="en">
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/>
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no'>
    <meta name='author' content='Arnaud Crowther, Alex Osbourne, Amanda Labelle, Eric Maul'>
    <title>GlipGlop | Request</title>
    <link rel="stylesheet" href="../materialize/css/materialize.min.css" type="text/css">
    <link rel="stylesheet" href="../css/base.css" type="text/css">
    <link rel="stylesheet" href="../css/verify.css" type="text/css">
  </head>
  <body>
    <div class="verified z-depth-1">
      <div class="header"><img src="../res/logo/white.png"></div>
      <form action="../php/reset.php" method="post" class="body row">
        <h5>Message sent to <?php echo "$ownerfirst $ownerlast" ?></h5>
        <p style="font-size:14px">Your request to purchase "<?php echo mb_strimwidth($title, 0, 30, "...");?>" has been sent. Please monitor your email for their response.</p>
        <a href="../" class="waves-effect waves-light btn">HOME</a>
      </form>
    </div>
  </body>
  <script type="text/javascript" src="../js/jquery.1.11.3.min.js"></script>
  <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
</html>
