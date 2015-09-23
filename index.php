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
        <div class="block glip"><img src="res/logo/white.png"></div>
      </div>
      <div class="menu">
        <div id="btn-search" class="block"><i class="material-icons">search</i></div>
        <div id="search-cont" class="searchbar"><input id="search-input" type="text"></div>
        <a href="." class="block"><i class="material-icons">home</i></a>
        <div id="btn-account" class="block"><i class="material-icons">account_circle</i></div>
      </div>
      <form method="post" action="php/login.php" class="drop-down-login">
        <div><input name="email" placeholder="Email" type="text"></div>
        <div><input name="password" placeholder="Password" type="password"></div>
        <div><button id="btn-login" name="login-submit" type="submit" class="waves-effect waves-light">ENTER</button></div>
        <div class="help-row">
          <a id="btn-new-account-link" class="new" href="#started">new account</a>
          <a class="help" href="#!">help?</a>
        </div>
      </form>
    </div>
    
    <!-- HERO SLIDER -->
    <div class="header-slider">
      <a href="#about" class="btn-floating btn-large waves-effect "><i class="material-icons">keyboard_arrow_down</i></a>
      <div class="owl-carousel">
        <div class="item slide1">
          <div class="slide-text z-depth-2">
            <div class="title">Save your money</div>
            <div class="sub">Use your money on things that really matter. We help you keep your money in the bank.</div>
          </div>
        </div>
        <div class="item slide2">
          <div class="slide-text z-depth-2">
            <div class="title">Make Connections</div>
            <div class="sub">Get acquainted with classmates on your campus that are also selling school books.</div>
          </div>
        </div>
        <div class="item slide3">
          <div class="slide-text z-depth-2">
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
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div id="about-tab2" class="about-tab">
          <h2>Meet up with classmates and colleagues</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div id="about-tab3" class="about-tab">
          <h2>Exchange, sell, ship and receive textbooks</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </div>
    </section>
    
    <!-- STARTED -->
    <section id="started">
      <h1>How do I get started?</h1>
      <div class="row started-row">
        <form id="frm-started-mini" class="col l6 m6 s12 form">
          <p>Make a new account</p>
          <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input onkeyup="checkForm()" id="input-started-firstname" type="text">
            <label for="input-started-firstname">First Name</label>
          </div>
          <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input onkeyup="checkForm()"  id="input-started-lastname" type="text">
            <label for="input-started-lastname">Last Name</label>
          </div>
          <div class="input-field col s12">
            <i class="material-icons prefix">swap_vertical_circle</i>
            <input onkeyup="checkForm()"  id="input-started-email" type="email">
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
              <i class="material-icons prefix">search</i>
              <input type="text" placeholder="SEARCH FOR A BOOK">
            </div>
            <a href="#!" class="waves-effect waves-light">
              <i class="material-icons prefix">live_help</i>Read the FAQ</a>
            <a href="#!" class="waves-effect waves-light">
              <i class="material-icons prefix">school</i>Terms of Service</a>
            <a href="#!" class="waves-effect waves-light">
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
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.</p>
        </div>
        <div class="col l3 m3 s12">
          <h3>Helpful links</h3>
          <a>My Account</a>
          <a>Privacy Policy</a>
          <a>Terms of Service</a>
          <a>Cookies Policy</a>
        </div>
        <div class="col l3 m3 s12">
          <h3>Helpful links</h3>
          <a>My Account</a>
          <a>Privacy Policy</a>
          <a>Terms of Service</a>
          <a>Cookies Policy</a>
        </div>
      </div>
    </section>
  </body>
  <script type="text/javascript" src="js/jquery.1.11.3.min.js"></script>
  <script type="text/javascript" src="js/jquery.easing.js"></script>
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  <script type="text/javascript" src="plugins/owl.carousel/owl.carousel.min.js"></script>
<!--  <script type="text/javascript" src="js/wow.min.js"></script>-->
  <script type="text/javascript" src="js/parallax.min.js"></script>
  <script type="text/javascript" src="js/init.js"></script>
</html>