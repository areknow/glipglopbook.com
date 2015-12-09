<?php
session_start();
if ($_SESSION['logged'] == true) {
  include '../php/con.php';
  include '../php/functions.php';
  $logged = true;
  $userid = $_SESSION['id'];
  $result = mysql_query("SELECT * FROM users WHERE id = '$userid'");
  $row = mysql_fetch_array($result);
  $first = $row['first'];
  $hidden = "hidden";
}
else {
  $adminhidden = "hidden";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/>
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no'>
    <meta name='author' content='Arnaud Crowther, Alex Osbourne, Amanda Labelle, Eric Maul'>
    <title>GlipGlop | Category</title>
    <link rel="stylesheet" href="../materialize/css/materialize.min.css" type="text/css">
    <link rel="stylesheet" href="../plugins/owl.carousel/assets/owl.carousel.css" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='../plugins/black-tie/css/black-tie.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/animate.css" type="text/css">
    <link rel="stylesheet" href="../css/base.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/profile.css" type="text/css">
  </head>
  <body user-id="<?php echo $userid; ?>">
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
          <a href=".?=math">MATH</a>
          <a href=".?=science">SCIENCE</a>
          <a href=".?=history">HISTORY</a>
          <a href=".?=language">LANGUAGE</a>
          <a href=".?=fiction">FICTION</a>
          <a href=".?=other" class="last">OTHER</a>
        </div>
      </li>
      <li><a href=".?=all">NEW ARRIVALS</a></li>
      <li><a href=".?=all">BEST SELLERS</a></li>
      <li><a href=".?=all">SEE ALL BOOKS</a></li>
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
      <form class="drop-down-login z-depth-2 <?php echo $hidden;?>">
        <div class="top">
          <p>Access your profile</p>
          <p class="invalid">Please try again</p>
          <div><input name="email" placeholder="Email" type="text"></div>
          <div><input name="password" placeholder="Password" type="password"></div>
          <a class="help" href="../verify/forgot.php">
            <i class="material-icons">help</i>
            <span>Forgot password</span>
          </a>
          <div>
            <button id="btn-login" name="login-submit" type="submit" class="waves-effect waves-light">ENTER</button>
          </div>
        </div>
        <div class="bottom">
          <a id="btn-new-account-link" href="#started">Create a new account</a>
        </div>
      </form>
      <form class="drop-down-login drop-down-admin z-depth-2 <?php echo $adminhidden;?>">
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
    
    <section class="profile category">
      <div class="sheet z-depth-1">
        <h1>All Books</h1>
        <div class="row">
          <div class="book-cont">
            <!-- dynamic book loading -->
          </div>
        </div>
      </div>
      
      <!-- pop up book modal -->
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
        <div id="btn-modal-book-buy" class="modal-action waves-effect waves-green btn-flat <?php echo $adminhidden;?>">Buy</div>
        <div id="btn-modal-book-buy-login" class="modal-action waves-effect waves-green btn-flat <?php echo $hidden;?>">Buy</div>
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
      
      <div id="modal-warning" class="modal">
        <div class="modal-content">
          <h4>Delete Book</h4>
          <h5></h5>
          <p>Removing a book from your library is not reversible. Please make sure that you want to delete this book from the GlipGlop inventory before proceeding.</p>
        </div>
        <div class="modal-footer">
          <div id="modal-warning-delete" class="modal-action waves-effect waves-red btn-flat">Delete</div>
          <div class="modal-action modal-close waves-effect btn-flat">Cancel</div>
        </div>
      </div>
      
      <div id="modal-warning-login" class="modal">
        <div class="modal-content">
          <h4>Authentication Required</h4>
          <h5></h5>
          <p>You must login or create an account in order to purchase books.</p>
        </div>
        <div class="modal-footer">
          <div class="modal-action modal-close waves-effect btn-flat">OK</div>
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
  <script type="text/javascript" src="../js/category-init.js"></script>
</html>