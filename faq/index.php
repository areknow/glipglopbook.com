<?php
session_start();
if ($_SESSION['logged'] == true) {
  include '../php/con.php';
  $userid = $_SESSION['id'];
  $logged = true;
  $result = mysql_query("SELECT * FROM users WHERE id = '$userid'");
  $row = mysql_fetch_array($result);
  $bookresults = mysql_query("SELECT * FROM books WHERE owner = $userid");
  $booknum = mysql_num_rows($bookresults);
  $first = $row['first'];
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/>
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no'>
    <meta name='author' content='Arnaud Crowther, Alex Osbourne, Amanda Labelle, Eric Maul'>
    <title>GlipGlop | FAQ</title>
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
    <div class="bg bg-dashboard"></div>
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
            <div>Categories</div>
          </a>
          <a href="../search/"  class="menu-item">
            <div><i class="material-icons">search</i></div>
            <div>Search</div>
          </a>
        </div>
        <div class="bottom">
          <a id="btn-new-account-link" href="../php/signout.php">Sign out</a>
        </div>
      </form>
    </div>
    
    <section class="profile dashboard">
      <div class="sheet z-depth-1">
        <h1>Frequently Asked Questions</h1>
        <div class="inner">


          
<h5>“How can I cash out my Glip Glop points?”</h5>
	
<p>At this time, we not have implemented a formal buyout feature into the website. You can, however set up an informal trade with another trader using paypal or by contacting the admins.</p>

<h5>“Can I meet people that live close to me?”</h5>

<p>Yes! For college students, we recommend adding your campus information to your profile to help with local trades. Also, when initiating a trade with another trader, if you notice their address is close to you, you can set up an informal meeting at a public place.</p>

<h5>“Do I have to sign up with Glip Glop in order to buy a book from someone?”</h5>
	
<p>Yes. Glip Glop is not designed for a one-time purchase scenario. The real benefit from the site comes from long-term trading of textbooks or reading books. However, if you want to do a one time purchase, you can signup and purchase enough points for the book and just do the one trade.</p>

<h5>“Can I adjust the price of the book I want to sell?”</h5>

<p>Yes. You have free range to sell your books at any price. We will autofill the price with the suggested selling price, but you can increase or decrease that amount as you see fit.</p>

<h5>“Do I have to know the exact name of the book I am looking for?”</h5>

<p>No, we have multiple ways to search for a book. You can search using the book name, author, ISBN, etc. You can also browse books by their category or visit the New Arrivals section for the most recently added books.</p>


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
  <script type="text/javascript" src="../js/profile-init.js"></script>
</html>