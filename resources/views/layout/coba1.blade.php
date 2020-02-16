<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <title>Selamat datang | SP-SPP</title>
    <!-- <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32"> -->
    <!-- <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">-->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <!-- <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png"> -->
    <link href="coba/css/materialize.css" type="text/css" rel="stylesheet">
    <link href="coba/css//style.css" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="coba/css/custom/custom.css" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="coba/vendors/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
    <link href="coba/vendors/flag-icon/css/flag-icon.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    
  </head>
  <body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START HEADER -->
    <header id="header" class="page-topbar">
      <!-- start header nav-->
      <div class="navbar-fixed">
        <nav class="navbar-color gradient-45deg-purple-deep-orange">
          <div class="nav-wrapper">
            <ul class="left">
              <li>
                <h1 class="logo-wrapper">
                  <a href="index.html" class="brand-logo darken-1">
                    <span class="logo-text hide-on-med-and-down">SP-SPP</span>
                  </a>
                </h1>
              </li>
            </ul>
           <!--  <div class="header-search-wrapper hide-on-med-and-down">
              <i class="material-icons">search</i>
              <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize" />
            </div> -->
            <!-- translation-button -->
          </div>
        </nav>
      </div>
      <!-- end header nav-->
    </header>
    <!-- END HEADER -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START MAIN -->


      <div class="wrapper">
    <br>
        @yield('conten');
        
      </div>
      <footer class="page-footer gradient-45deg-purple-deep-orange">
        <div class="footer-copyright">
          <div class="container">
            <span>Tubes Sistem Informasi</span>
          </div>
        </div>
    </footer>

    
    <!-- ================================================
    Scripts
    ================================================ -->
    <!-- jQuery Library -->
    <script type="text/javascript" src="coba/vendors/jquery-3.2.1.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="coba/js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="coba/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="coba/js/plugins.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="coba/js/custom-script.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    
  </body>
</html>
