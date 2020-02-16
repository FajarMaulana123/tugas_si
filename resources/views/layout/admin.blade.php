<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Selamat Datang | {{Session::get('username')}}</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link href="assets/css/style.min.css" rel="stylesheet">
  <link href="assets/css/addons/datatables.min.css" rel="stylesheet">
  <style>

    .map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
  </style>
</head>

<body class="grey lighten-3">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar  blue darken-3 ">
      <div class="container-fluid">
      <a class="navbar-brand waves-effect" href="#" target="_blank">
        <strong class="white-text">{{Session::get('username')}}</strong>
      </a>

      <ul class="nav navbar-nav nav-flex-icons ml-auto">
        
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle white-text" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Hi, {{Session::get('username')}}
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" data-toggle="modal" data-target="#Formpass">Ganti Password</a>
            <a class="dropdown-item" href="{{url('')}}/logoutadmin">Logout</a>
            
          </div>
        </li>
      </ul>
      </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed blue darken-4">

      <!-- <a class="logo-wrapper waves-effect">
        <img src="https://mdbootstrap.com/img/logo/mdb-email.png" class="img-fluid" alt="">
      </a> -->
      <br><br>
      <h1 class="text-center font-weight-bold white-text">SP-SPP</h1>
      <br><br>
      <div class="list-group list-group-flush">
        <a href="{{url('')}}/admin" class="blue darken-4 white-text list-group-item list-group-item-action waves-effect">
          <i class="fas fa-chart-pie mr-3"></i>Dashboard
        </a>
        <a href="{{url('')}}/datasekolah" class="blue darken-4 white-text list-group-item list-group-item-action waves-effect">
          <i class="fas fa-user mr-3"></i>Data Sekolah</a>
        <a href="{{url('')}}/daftarsekolah" class=" blue darken-4 white-text list-group-item list-group-item-action waves-effect">
          <i class="fas fa-table mr-3"></i>Daftar Sekolah</a>
        
      </div>

    </div>
    <!-- Sidebar -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    @yield('conten');
    
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2019 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> MDBootstrap.com </a>
    </div>
    <!--/.Copyright-->
    <div class="modal fade" id="Formpass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Ganti Password</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3">
        <form action="{{url('/gantipassadmin',['id' => Session::get('id_admin')])}}" method="POST">
        @csrf
            <!-- <div class="md-form mb-5">
            <i class="fas fa-envelope prefix grey-text"></i>
            <input type="text" id="defaultForm-user" class="form-control validate" name="username">
            <label data-error="wrong" data-success="right" for="defaultForm-user">Username</label>
            </div> -->

            <div class="md-form mb-4">
            <input type="password" id="defaultForm-pass" class="form-control validate" name="curpass">
            <label for="defaultForm-pass">Password Lama</label>
            </div>

            <div class="md-form mb-4">
            <input type="password" id="defaultForm-pass" class="form-control validate" name="newpass">
            <label for="defaultForm-pass">Password Baru</label>
            </div>

        </div>
        <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-default" name="submit" type="submit">Simpan</button>
        </div>
        </div>
        </form>
    </div>
    </div>
  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="assets/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="assets/js/mdb.min.js"></script>
  <script type="text/javascript" src="assets/js/addons/datatables.min.js"></script>
    <script type="text/javascript">
    $(".button-collapse").sideNav();
    $(document).ready(function() {
    $('#example').DataTable();
    $('.dataTables_length').addClass('bs-select');
    } );

    $(document).ready(function() {
$('.mdb-select').materialSelect();
});

$(function () {
$("#mdb-lightbox-ui").load("assets/mdb-addons/mdb-lightbox-ui.html");
});
    </script>

  <script>
      @if(Session::has('success'))
          toastr.success('{{Session::get('success')}}', 'success');
      @endif
      @if(Session::has('error'))
          toastr.info('{{Session::get('error')}}', 'info');
      @endif
  </script>
  
</body>

</html>
