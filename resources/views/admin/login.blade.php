<!doctype html>
<html lang="en">
  <head>
    <title>Login Admin</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/mdb.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/sa/sweetalert.css"> 
    <script type="text/javascript" src="assets/js/jquery-2.1.0.js"></script>
  </head>
  <body style="background: #ffffff;">
    <main><br><br><br><br>
    <section class="form-elegant">
    <div class="row justify-content-center">
      <div class="col-md-9 col-lg-7 col-xl-4">
        <div class="card">
          <div class="card-body mx-4">
            <div class="text-center">
              <h3 class="dark-grey-text mb-5"><strong>Login Admin</strong></h3>
            </div>
            <form method="POST" action="{{url('/loginadmin')}}">
            @csrf
              <div class="md-form">
                <input type="text" id="Form-user" name="username" class="form-control">
                <label for="Form-user">Username</label>
              </div>

              <div class="md-form pb-3">
                <input type="password" id="Form-pass1" name="password" class="form-control">
                <label for="Form-pass1">Your password</label>
              </div>

              

              <div class="text-center mb-3">
                <button type="submit" name="submit" class="btn blue-gradient btn-block btn-rounded z-depth-1a">Login</button>
              </div>
            </div>
          </form>
          <div class=" mx-5 pt-3 mb-1">
            
          </div>

        </div>
      </div>
    </div>
    </section>
    </main>
    <script type="text/javascript" src="assets/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/sa/sweetalert.min.js"></script>
    <script type="text/javascript" src="assets/sa/sweetalert-dev.js"></script>
    <script type="text/javascript" src="assets/js/addons/datatables.min.js"></script>
    <script>
      @if(Session::has('success'))
          toastr.success('{{Session::get('success')}}', 'success');
      @endif
      @if(Session::has('info'))
          toastr.info('{{Session::get('info')}}', 'info');
      @endif
  </script>
  </body>
</html>