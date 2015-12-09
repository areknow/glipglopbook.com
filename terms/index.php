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
    <title>GlipGlop | Terms &amp; Conditions</title>
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
        <h1>Terms &amp; Conditions</h1>
        <div class="inner">

          

<h5>Please read these Terms and Conditions ("Terms", "Terms and Conditions") carefully before using the glipglopbook.com website (the "Service") operated by GlipGlop ("us", "we", or "our").</h5>

<p>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.</p>

<p>By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service.</p>

<h5>Accounts</h5>
When you create an account with us, you must provide us information that is accurate, complete, and current at all times. Failure to do so constitutes a breach of the Terms, which may result in immediate termination of your account on our Service.</p>

<p>You are responsible for safeguarding the password that you use to access the Service and for any activities or actions under your password, whether your password is with our Service or a third-party service.</p>

<p>You agree not to disclose your password to any third party. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.</p>

<h5>Links To Other Web Sites</h5>
<p>Our Service may contain links to third-party web sites or services that are not owned or controlled by GlipGlop.</p>

<p>GlipGlop has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that GlipGlop shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</p>

<p>We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.</p>

<h5>Termination</h5>
<p>We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>

<p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>

<p>We may terminate or suspend your account immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>

<p>Upon termination, your right to use the Service will immediately cease. If you wish to terminate your account, you may simply discontinue using the Service.</p>

<p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>

<h5>Governing Law</h5>
<p>These Terms shall be governed and construed in accordance with the laws of Michigan, United States, without regard to its conflict of law provisions.</p>

<p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.</p>

<h5>Changes</h5>
<p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>

<p>By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p>

<h5>Contact Us</h5>
<p>If you have any questions about these Terms, please contact us.</p>

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