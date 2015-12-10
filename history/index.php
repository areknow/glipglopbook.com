<?php
session_start();
if ($_SESSION['logged'] == true) {
  include '../php/con.php';
  $userid = $_SESSION['id'];
  $logged = true;
  $result = mysql_query("SELECT * FROM users WHERE id = '$userid'");
  $row = mysql_fetch_array($result);
  $first = $row['first'];
}
else {
  header('Location: ../');
  exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/>
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no'>
    <meta name='author' content='Arnaud Crowther, Alex Osbourne, Amanda Labelle, Eric Maul'>
    <title>GlipGlop | History</title>
    <link rel="stylesheet" href="../materialize/css/materialize.min.css" type="text/css">
    <link rel="stylesheet" href="../plugins/owl.carousel/assets/owl.carousel.css" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='../plugins/black-tie/css/black-tie.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/animate.css" type="text/css">
    <link rel="stylesheet" href="../css/base.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/profile.css" type="text/css">
  </head>
  <body>
    <div class="bg bg-history"></div>
    <div class="login-overlay"></div>
    
    <!-- SLIDE OUT -->
    <ul id="slide-out" class="side-nav no-select">
      <div class="side-menu-header"><img src="../res/logo/white.png"></div>
      <li class="collapser">
        <div class="collapse-header">
          <div>CATEGORIES</div>
          <i class="material-icons">arrow_drop_down</i>
        </div>
        <div class="collapse-menu">
          <a href="../category/?=math">MATH</a>
          <a href="../category/?=science">SCIENCE</a>
          <a href="../category/?=history">HISTORY</a>
          <a href="../category/?=language">LANGUAGE</a>
          <a href="../category/?=fiction">FICTION</a>
          <a href="../category/?=other" class="last">OTHER</a>
        </div>
      </li>
      <li><a href="../category/?=all">NEW ARRIVALS</a></li>
      <li><a href="../category/?=all">BEST SELLERS</a></li>
      <li><a href="../category/?=all">SEE ALL BOOKS</a></li>
    </ul>
    
    <!-- NAV BAR -->
    <div class="navigation-bar no-select">
      <div class="logo">
        <a href="#" class="button-collapse block" data-activates="slide-out">
          <i class="material-icons">menu</i>
        </a>
        <div class="block glip"><img src="../res/logo/white.png"></div>
      </div>
      <div class="menu">
        <div id="btn-search" class="block"><i class="material-icons">search</i></div>
        <div id="search-cont" class="searchbar"><input id="search-input" type="text"></div>
        <a href=".." class="block"><i class="material-icons">home</i></a>
        <div id="btn-account" class="block"><i class="material-icons">account_circle</i></div>
      </div>
      <form class="drop-down-login drop-down-admin z-depth-2">
        <div class="top logged-in-menu">
          <a href="../profile/" class="menu-item menu-top">
            <div class="avatar"><i class="material-icons avatar">account_circle</i></div>
            <div class="profile-name">
              <div class="name"><?php echo $first; ?></div>
              <div class="link">View profile</div>
            </div>
          </a>
          <a href="../books/"  class="menu-item">
            <div><i class="material-icons">book</i></div>
            <div>Books</div>
          </a>
          <a href="../history/"  class="menu-item">
            <div><i class="material-icons">history</i></div>
            <div>History</div>
          </a>
          <a href="../category/"  class="menu-item">
            <div><i class="material-icons">library_books</i></div>
            <div>Browse</div>
          </a>
          <a href="../search/"  class="menu-item">
            <div><i class="material-icons">search</i></div>
            <div>Search</div>
          </a>
          <a href="../faq/"  class="menu-item">
            <div><i class="material-icons">help</i></div>
            <div>Help</div>
          </a>
        </div>
        <div class="bottom">
          <a id="btn-new-account-link" href="../php/signout.php">Sign out</a>
        </div>
      </form>
    </div>
    
    <section class="profile history">
      <div class="sheet z-depth-1">
        <h1>History</h1>
        <div class="inner">
          
          <ul class="collapsible popout" data-collapsible="accordion">
          <?php 
          $requestresults = mysql_query("SELECT * FROM history WHERE sellerid = $userid");
          while($requests = mysql_fetch_array($requestresults)) {
            $booktitle = $requests['title'];
            $buyerfirst = $requests['buyerfirst'];
            $buyerlast = $requests['buyerlast'];
            $buyeremail = $requests['buyeremail'];
            $buyercampus = $requests['buyercampus'];
            $message = $requests['message'];
            $datetime = new DateTime( $requests['timestamp'] );
            $timestamp = $datetime->format( 'm/d/Y' );
            ?>
            <li>
              <div class="collapsible-header row">
                <div class="col s8 truncate"><i class="material-icons">book</i><?php echo $booktitle ?></div>
                <div class="col s4 date"><?php echo $timestamp ?></div>
              </div>
              <div class="collapsible-body">
                <div class="body-inner row">
                  <div class="col s6">
                    <div class="heading">Requested from</div>
                    <div class="content">
                      <?php echo "$buyerfirst $buyerlast" ?><br>
                      <a href="mailto:<?php echo $buyeremail ?>"><?php echo $buyeremail ?></a><br>
                      <?php echo $buyercampus ?>
                    </div>
                  </div>
                  <div class="col s6">
                    <div class="heading">Message</div>
                    <div class="content">
                      <?php echo $message ?><br>
                    </div>
                  </div>
                  
                </div>
              </div>
            </li>
            <?php }?>
          </ul>
          
        </div>
      </div>
    </section>
  </body>
  <script type="text/javascript" src="../js/jquery.1.11.3.min.js"></script>
  <script type="text/javascript" src="../js/jquery.easing.js"></script>
  <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
  <script type="text/javascript" src="../plugins/owl.carousel/owl.carousel.min.js"></script>
  <script type="text/javascript" src="../js/wow.min.js"></script>
  <script type="text/javascript" src="../js/parallax.min.js"></script>
  <script type="text/javascript" src="../js/pace.js"></script>
  <script type="text/javascript" src="../js/base-init.js"></script>
  <script type="text/javascript" src="../js/history-init.js"></script>
</html>