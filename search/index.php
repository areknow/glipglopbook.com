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
    <title>GlipGlop | Search</title>
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
    <div class="bg bg-search"></div>
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
    <section class="profile search">
      <div class="sheet z-depth-1">
        <h1>Search</h1>
        <div class="row">
          <div class="col s12">
            <div class="input-field col s12 main-search">
              <input class="active" id="inpt-search" type="text">
              <label for="inpt-search">Enter ISBN, Title, Author or Publisher</label>
              <i class="material-icons ">search</i>
            </div>
            <div class="search-results">
              <ul id="results"></ul>
            </div>
        </div>
      </div>
        
      <div id="modal-book" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4 class="modal-header">Title</h4>
          <br>
          <div class="row">
            <div class="col s6">
              <div class="input-field col s12">
                <input disabled class="active" value=" " id="inpt-modal-book-title" type="text">
                <label for="inpt-modal-book-title">Title</label>
              </div>
              <div class="input-field col s6">
                <input disabled class="active" value=" " id="inpt-modal-book-author" type="text">
                <label for="inpt-modal-book-author">Author</label>
              </div>
              <div class="input-field col s6">
                <input disabled class="active capitalize" value=" " id="inpt-modal-book-category" type="text">
                <label for="inpt-modal-book-category">Category</label>
              </div>
              <div class="input-field col s12">
                <input disabled class="active" value=" " id="inpt-modal-book-pub" type="text">
                <label for="inpt-modal-book-pub">Publisher</label>
              </div>
              <div class="input-field col s12">
                <input disabled class="active" value=" " id="inpt-modal-book-isbn" type="text">
                <label for="inpt-modal-book-isbn">ISBN</label>
              </div>
              <div class="input-field col s12">
                <input disabled class="active" value=" " id="inpt-modal-book-price" type="text">
                <label for="inpt-modal-book-price">Price</label>
              </div>
            </div>
            <div class="col s6">
              <div class="preview"></div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div id="btn-modal-book-buy" class="modal-action waves-effect waves-green btn-flat">Buy</div>
          <div id="btn-modal-book-cancel" class="modal-action modal-close waves-effect btn-flat">Cancel</div>
        </div>
      </div>
        
      <form action="../request/" method="post" id="modal-buy" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4 class="modal-header">Request to Purchase</h4>
          <div class="row header">
            <div class="col s12">
              <div class="title">title</div>
              <div class="author">author</div>
              <div class="isbn">isbn</div>
            </div>
          </div>
          <div class="row icons center">
            <div class="col s4">
              <i class="btl bt-user"></i>
              <div id="modal-buy-user">first last</div>
            </div>
            <div class="col s4">
              <i class="btl bt-map"></i>
              <div id="modal-buy-campus">campus</div>
            </div>
            <div class="col s4">
              <i class="btl bt-money"></i>
              <div id="modal-buy-price">$price</div>
            </div>
          </div>
          <div class="row message">
            <div class="input-field col s12">
              <textarea name="message" id="txt-modal-buy-message" class="materialize-textarea"></textarea>
              <label for="txt-modal-buy-message">Message</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input name="book" id="inpt-hide-book" type="hidden">
          <input name="owner" id="inpt-hide-owner" type="hidden">
          <input name="user" id="inpt-hide-user" type="hidden" value="<?php echo $userid?>">
          <button type="submit" name="request-book" id="btn-modal-buy-send" class="modal-action waves-effect waves-green btn-flat">Send</button>
          <div id="btn-modal-buy-cancel" class="modal-action modal-close waves-effect btn-flat">Cancel</div>
        </div>
      </form>
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
  <script type="text/javascript" src="../js/search-init.js"></script>
</html>