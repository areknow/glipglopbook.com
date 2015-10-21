<?php
session_start();
if ($_SESSION['logged'] == true) {
  include '../php/con.php';
  include '../php/functions.php';
  $logged = true;
  $userid = $_SESSION['id'];
  $bookresults = mysql_query("SELECT * FROM books WHERE owner = $userid");
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
    <title>GlipGlop | Books</title>
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
    <div class="bg bg-books"></div>
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
          <a href="#">MATH</a>
          <a href="#">SCIENCE</a>
          <a href="#" class="last">HISTORY</a>
        </div>
      </li>
      <li><a href="#!">NEW ARRIVALS</a></li>
      <li><a href="#!">BEST SELLERS</a></li>
      <li><a href="#!">SEE ALL BOOK</a></li>
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
          <a href="../dashboard/"  class="menu-item">
            <div><i class="material-icons">dashboard</i></div>
            <div>Dashboard</div>
          </a>
          <a href="../books/"  class="menu-item">
            <div><i class="material-icons">book</i></div>
            <div>Books</div>
          </a>
          <a href="../history/"  class="menu-item">
            <div><i class="material-icons">history</i></div>
            <div>History</div>
          </a>
          <a href="../transactions/"  class="menu-item">
            <div><i class="material-icons">payment</i></div>
            <div>Transactions</div>
          </a>
          <a href="../ratings/"  class="menu-item">
            <div><i class="material-icons">star_half</i></div>
            <div>Ratings</div>
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
    
    <section class="profile books">
      <div class="sheet z-depth-1">
        <h1>Books</h1>
        <div class="row">
          <div class="book-cont">
            <div class="book z-depth-1"></div>
            <?php 
            while($bookrow = mysql_fetch_array($bookresults)) {
              $bookid = $bookrow['id'];
              $title = $bookrow['title'];
              $isbn = $bookrow['isbn'];
              $coverurl = "http://covers.openlibrary.org/b/isbn/$isbn-L.jpg";
              if (is_404($coverurl)) {
                $style = 'style="background-image: url('.$coverurl.');"';
              } else { $style = ""; }
              echo '<div id="'.$bookid.'" class="book-wrapper">';
              echo '<div class="book tooltipped z-depth-1" data-tooltip="'.$title.'" data-position="top" data-delay="0" book-id='.$bookid.' onclick="editBookModal('.$bookid.')" '.$style.'></div>';
              echo '<i book-id='.$bookid.' class="material-icons closer">close</i>';
              echo '</div>';
            }
            ?>
          </div>
        </div>
        <a id="btn-book-add" class="noselect btn-floating btn-large waves-light green sheet-button"><i class="material-icons">add</i></a>
      </div>
      
      <!-- add book modal -->
      <div id="modal-add-books" class="modal modal-fixed-footer">
        <div class="modal-content">
          <div class="row">
            <div class="top row">
              <div class="input-field col s12">
                <input value="" id="inpt-isbn" type="text" class="">
                <label id="lbl-isbn" for="inpt-isbn" >Search by ISBN</label>
                <i id="btn-get-book" class="material-icons">search</i>
                <div class="lbl-isbn-error">no matches</div>
              </div>
            </div>
              <div class="inputs col s6">
                <div class="input-field col s12">
                  <input id="inpt-book-title" type="text">
                  <label for="inpt-book-title">Title</label>
                </div>
                <div class="input-field col s12">
                  <input value="" id="inpt-book-author" type="text">
                  <label for="inpt-book-author">Author</label>
                </div>
                <div class="input-field col s12">
                  <input value="" id="inpt-book-pub" type="text">
                  <label for="inpt-book-pub">Publisher</label>
                </div>
                <div class="input-field col s12">
                  <input value="" id="inpt-book-isbn" type="text">
                  <label for="inpt-book-isbn">ISBN</label>
                </div>
              </div>
              <div class="col s6">
                <div class="preview"></div>
              </div>
              <input type="hidden" value="<?php echo $userid ?>" id="inpt-book-owner">
          </div>
        </div>
        <div class="modal-footer">
          <div id="btn-modal-book-save" class="modal-action waves-effect waves-green btn-flat">Save</div>
          <div id="btn-modal-book-cancel" class="modal-action modal-close waves-effect btn-flat">Cancel</div>
        </div>
      </div>
      
      <!-- edit book modal -->
      <div id="modal-modify-books" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4 class="modal-header">Edit book information</h4>
          <br>
          <div class="row">
            <div class="col s6">
              <div class="input-field col s12">
                <input class="active" value=" " id="inpt-mod-book-title" type="text">
                <label for="inpt-mod-book-title">Title</label>
              </div>
              <div class="input-field col s12">
                <input class="active" value=" " id="inpt-mod-book-author" type="text">
                <label for="inpt-mod-book-author">Author</label>
              </div>
              <div class="input-field col s12">
                <input class="active" value=" " id="inpt-mod-book-pub" type="text">
                <label for="inpt-mod-book-pub">Publisher</label>
              </div>
              <div class="input-field col s12">
                <input class="active" value=" " id="inpt-mod-book-isbn" type="text">
                <label for="inpt-mod-book-isbn">ISBN</label>
              </div>
            </div>
            <div class="col s6">
              <div class="preview"></div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div id="btn-modal-modify-book-delete" class="no-float modal-action modal-close waves-effect waves-red btn-flat">Delete</div>
          <div id="btn-modal-modify-book-save" class="modal-action waves-effect waves-green btn-flat">Save</div>
          <div id="btn-modal-modify-book-cancel" class="modal-action modal-close waves-effect btn-flat">Cancel</div>
          
        </div>
      </div>
      
<!--
      <div id="warning-modal" class="modal">
        <div class="modal-content">
          <h4>Delete book-name</h4>
          <p>Are you sure you want to permanently delete this book from your library? This is not reversible.</p>
        </div>
        <div class="modal-footer">
          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
      </div>
-->
    </section>
  </body>
  <script type="text/javascript" src="../js/jquery.1.11.3.min.js"></script>
  <script type="text/javascript" src="../js/jquery.easing.js"></script>
  <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
  <script type="text/javascript" src="../plugins/owl.carousel/owl.carousel.min.js"></script>
  <script type="text/javascript" src="../js/wow.min.js"></script>
  <script type="text/javascript" src="../js/parallax.min.js"></script>
  <script type="text/javascript" src="../js/base-init.js"></script>
  <script type="text/javascript" src="../js/book-init.js"></script>
</html>