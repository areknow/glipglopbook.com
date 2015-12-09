<?php
session_start();
if ($_SESSION['logged'] == true) {
  include 'php/con.php';
  $userid = $_SESSION['id'];
  $logged = true;
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
    <title>GlipGlop | Home</title>
    <link rel="stylesheet" href="materialize/css/materialize.min.css" type="text/css">
    <link rel="stylesheet" href="plugins/owl.carousel/assets/owl.carousel.css" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='plugins/black-tie/css/black-tie.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/animate.css" type="text/css">
    <link rel="stylesheet" href="css/base.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
  </head>
  
  <!-- BODY -->
  <body id="top" class="front">
    <div class="login-overlay"></div>
    
    <!-- SLIDE OUT -->
    <ul id="slide-out" class="side-nav no-select">
      <div class="side-menu-header"><img src="res/logo/white.png"></div>
      <li class="collapser">
        <div class="collapse-header">
          <div>CATEGORIES</div>
          <i class="material-icons">arrow_drop_down</i>
        </div>
        <div class="collapse-menu">
          <a href="category/?=math">MATH</a>
          <a href="category/?=science">SCIENCE</a>
          <a href="category/?=history">HISTORY</a>
          <a href="category/?=language">LANGUAGE</a>
          <a href="category/?=fiction">FICTION</a>
          <a href="category/?=other" class="last">OTHER</a>
        </div>
      </li>
      <li><a href="category/?=all">NEW ARRIVALS</a></li>
      <li><a href="category/?=all">BEST SELLERS</a></li>
      <li><a href="category/?=all">SEE ALL BOOKS</a></li>
    </ul>
    
    <!-- NAV BAR -->
    <div class="navigation-bar no-select">
      <div class="logo">
        <a href="#" class="button-collapse block" data-activates="slide-out">
          <i class="material-icons">menu</i>
        </a>
        <div class="block glip"><img src="res/logo/white.png"></div>
      </div>
      <div class="menu">
        <a href="#mini-search-wrap" id="btn-home-nav-search" class="block"><i class="material-icons">search</i></a>
        <div id="btn-account" class="block"><i class="material-icons">account_circle</i></div>
      </div>
      <form class="drop-down-login z-depth-2 <?php echo $hidden;?>">
        <div class="top">
          <p>Access your profile</p>
          <p class="invalid">Please try again</p>
          <div><input name="email" placeholder="Email" type="text"></div>
          <div><input name="password" placeholder="Password" type="password"></div>
          <a class="help" href="verify/forgot.php">
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
          <a href="profile/" class="menu-item menu-top">
            <div class="avatar"><i class="material-icons avatar">account_circle</i></div>
            <div class="profile-name">
              <div class="name"><?php echo $first; ?></div>
              <div class="link">View profile</div>
            </div>
          </a>
          <a href="books/"  class="menu-item">
            <div><i class="material-icons">book</i></div>
            <div>Books</div>
          </a>
          <a href="history/"  class="menu-item">
            <div><i class="material-icons">history</i></div>
            <div>History</div>
          </a>
          <a href="category/"  class="menu-item">
            <div><i class="material-icons">library_books</i></div>
            <div>Categories</div>
          </a>
          <a href="search/"  class="menu-item">
            <div><i class="material-icons">search</i></div>
            <div>Search</div>
          </a>
        </div>
        <div class="bottom">
          <a id="btn-new-account-link" href="php/signout.php">Sign out</a>
        </div>
      </form>
    </div>
    
    <!-- HERO SLIDER -->
    <div class="header-slider">
      <a href="#about" class="btn-floating btn-large waves-effect"><i class="material-icons">keyboard_arrow_down</i></a>
      <div class="owl-carousel">
        <div class="item slide1">
          <div class="slide-text z-depth-1">
            <div class="title">Save your money</div>
            <div class="sub">Use your money on things that really matter. We help you keep your money in the bank.</div>
          </div>
        </div>
        <div class="item slide2">
          <div class="slide-text z-depth-1">
            <div class="title">Make Connections</div>
            <div class="sub">Get acquainted with classmates on your campus that are also selling school books.</div>
          </div>
        </div>
        <div class="item slide3">
          <div class="slide-text z-depth-1">
            <div class="title">Study Harder</div>
            <div class="sub">Spend less time worrying about getting your books, and more time focusing on your grades.</div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- ABOUT -->
    <section id="about">
      <a href="#started" class="btn-floating btn-large waves-effect  orange darken-2"><i class="material-icons">keyboard_arrow_down</i></a>
      <h1 class="no-select">How does GlipGlop work?</h1>
      <div class="row circle-row no-select">
        <div class="col l4 m4 s12">
          <div id="btn-about1" class="waves-effect about-circle search active-circle"><div class="inner">Search</div></div>
        </div>
        <div class="col l4 m4 s12">
          <div id="btn-about2" class="waves-effect about-circle meetup"><div class="inner">Meet Up</div></div>
        </div>
        <div class="col l4 m4 s12">
          <div id="btn-about3" class="waves-effect about-circle exchange"><div class="inner">Exchange</div></div>
        </div>
      </div>
      <div class="row tab-row">
        <div class="nubbin no-select"></div>
        <div id="about-tab1" class="about-tab active-tab">
          <h2>Search for what you need</h2>
          <p>Search for What You Need
With Glip Glop, you can search book listings from all over the world to find the book you want, in the condition you want, without spending a dime on it! List books for free and send them to other users to build up points that you can use towards the book of your dreams... or for that textbook that is “required” for your course next semester.
Search books of any category, edition, or publication date; you never know what someone might want to trade!</p>
        </div>
        <div id="about-tab2" class="about-tab">
          <h2>Meet up with classmates and colleagues</h2>
          <p>Meet Up With Classmates and Colleagues
Glip Glop makes finding that expensive textbook easy by allowing you to choose a College or University to set as your base. Meet up with other students on campus that just took the class, or ones that just dropped the class, to trade without spending money on shipping. Schedule a meeting place and time to and avoid trips to the post office!</p>
        </div>
        <div id="about-tab3" class="about-tab">
          <h2>Exchange, sell, ship and receive textbooks</h2>
          <p>Exchange, Sell, Ship, and Receive Books
Set a price you are looking to get for your book, list it, and review offers from other traders. With Glip Glop, you have the reassurance of sending books to strangers while having the flexibility to set your own asking price. No more ten dollar trade-ins for a hundred dollar book! Get the price you deserve, from the convenience of your home.</p>
        </div>
      </div>
    </section>
    
    <!-- STARTED -->
    <section id="started">
      <h1>How do I get started?</h1>
      <div class="row started-row">
        <form id="frm-started-mini" class="col l6 m6 s12 form">
          <p>Make a new account</p>
          <div id="mini-search-wrap" class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input onkeyup="checkForm()" id="input-started-firstname" type="text">
            <label for="input-started-firstname">First Name</label>
          </div>
          <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input onkeyup="checkForm()" id="input-started-lastname" type="text">
            <label for="input-started-lastname">Last Name</label>
          </div>
          <div class="input-field col s12">
            <i id="icon-email-check" class="material-icons prefix">swap_vertical_circle</i>
            <input onkeyup="checkForm()" id="input-started-email" type="email">
            <label for="input-started-email">Email</label>
          </div>
          <div class="input-field col s12">
            <i class="material-icons prefix">check_circle</i>
            <input onkeyup="checkForm()" id="input-started-password" type="password">
            <label for="input-started-password">Password</label>
          </div>
          <div>
            <button disabled type="button" id="btn-modal1" class="waves-effect waves-light btn-flat">
              <div>GO</div>
              <i class="material-icons">keyboard_arrow_right</i>
            </button>
          </div>
        </form>
        <div class="col l6 m6 s12 links">
          <p>Learn more about GlipGlop</p>
          <div class="col col s12">
            <div class="input-wrapper">
              <i class="material-icons search-prefix prefix">search</i>
              <i class="material-icons search-close">close</i>
              <input id="inpt-mini-search" type="text" placeholder="SEARCH FOR A BOOK">
              <ul id="results" class="z-depth-1"></ul>
            </div>
            <a href="#!" class="waves-effect waves-light">
              <i class="material-icons prefix">live_help</i>Read the FAQ</a>
            <a href="#!" class="waves-effect waves-light">
              <i class="material-icons prefix">school</i>Terms of Service</a>
            <a target="_blank" href="https://github.com/arnaudcrowther/glipglopbook.com" class="waves-effect waves-light">
              <i class="fab fab-github"></i>GitHub Documentation</a>
          </div>
        </div>
      </div>
      <form action="php/new-account.php" method="post" id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Create a New Account</h4>
          <p>Please verify your account information and confirm your password</p>
          <div class="row modal-input-row">
            <div class="input-field col s12">
              <input name="first" value=" " id="input-modal-firstname" type="text">
              <label for="input-modal-firstname">First Name</label>
            </div>
            <div class="input-field col s12">
              <input name="last" value=" " id="input-modal-lastname" type="text">
              <label for="input-modal-lastname">Last Name</label>
            </div>
            <div class="input-field col s12">
              <input name="email" value=" " id="input-modal-email" type="text">
              <label for="input-modal-email">Email</label>
            </div>
            <div class="input-field col s12">
              <input name="password" value=" " id="input-modal-password" type="password">
              <label for="input-modal-password">Password</label>
            </div>
            <div class="input-field col s12">
              <input name="confirm_password" id="input-modal-password2" type="password">
              <label for="input-modal-password2">Enter password again</label>
            </div>
          </div>
          <div class="row agree-row">
            <div class="col s12">
              <p>
                <input id="chk-started-modal-agree" type="checkbox"/>
                <label for="chk-started-modal-agree">I have read and agree to the <a href="#!">Terms of Use</a></label>
              </p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="btn-modal-started-continue" disabled type="submit" name="new-account-submit" class="modal-action waves-effect waves-green btn-flat">Continue</button>
          <div id="btn-modal-started-cancel" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancel</div>
        </div>
      </form>
    </section>
    
    <!-- FOOTER -->
    <section id="footer">
      <div class="row">
        <div class="col l6 m6 s12">
          <h3>&nbsp;<img src="res/logo/white.png"></h3>
          <p>Glip Glop is an Oakland University Project created by Arnaud Crowther, Amanda LaBelle, Alex Osbourn, and Eric Maul. This website is for testing purposes only; no real transactions are made.</p>
        </div>
        <div class="col l3 m3 s12">
          <h3>Helpful links</h3>
          <a href="profile/">My Account</a>
          <a href="privacy/">Privacy Policy</a>
          <a href="terms/">Terms of Service</a>
          <a href="cookies/">Cookies Policy</a>
        </div>
        <div class="col l3 m3 s12">
          <h3>Social Media</h3>
          <a>Facebook</a>
          <a>Twitter</a>
          <a>Instagram</a>
          <a>GitHub</a>
        </div>
      </div>
    </section>
    
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
    
    <form action="request/" method="post" id="modal-buy" class="modal modal-fixed-footer">
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
        <h4>Authentication Required</h4>
        <h5></h5>
        <p>You must login or create an account in order to purchase books.</p>
      </div>
      <div class="modal-footer">
        <div class="modal-action modal-close waves-effect btn-flat">OK</div>
      </div>
    </div>
  </body>
  <script type="text/javascript" src="js/jquery.1.11.3.min.js"></script>
  <script type="text/javascript" src="js/jquery.easing.js"></script>
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="js/tweenmax.min.js"></script>
  <script type="text/javascript" src="js/tweenscroll.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  <script type="text/javascript" src="plugins/owl.carousel/owl.carousel.min.js"></script>
  <script type="text/javascript" src="js/wow.min.js"></script>
  <script type="text/javascript" src="js/parallax.min.js"></script>
  <script type="text/javascript" src="js/pace.js"></script>
  <script type="text/javascript" src="js/base-init.js"></script>
  <script type="text/javascript" src="js/home-init.js"></script>
</html>