@extends('layout.coba1')
@section('conten')
          <!--start container-->
          <!-- <div class="container">
            <div style="background-image: url(images/gallary/12.png");"><h1>asd</h1></div>
          </div> -->

         
          <div class="row">
            <div class="col s8 offset-s2">
              <div class="card">
                <div class="card-content">
                  
                  <h4 class="card-title">Search NIS</h4>
                  
                  <div class="divider"></div>
                  <br>
                  <div class="row">
                    <div class="col s12">           
                      <div class="col s8">
                        <form method="get" action="{{url('/carisiswa')}}">
                        @csrf
                        <div class="row">
                          <div class="input-field col s6">
                            <input id="nisn" type="text" name="nisn">
                            <label for="nisn">Cari NIS</label>
                          </div>
                          <div class="input-field col s3">
                            <button class="btn waves-effect waves-light right btn-small " type="submit" name="submit">Search
                              <!-- <i class="material-icons left">search</i> -->
                            </button>
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>            
          <!--end container-->

<!-- <div class="container">
  <div class="row justify-content-md-center ">
    <div class="col-md-12">
      <div class="card">
        <h5 class="card-header h5 text-white indigo darken-3">coba</h5>
        <div class="card-body">
        <h5 class="card-title">Cari NISN</h5>
        <hr>
          
          
          <form class="form-inline md-form form-sm" action="{{url('/carisiswa')}}" method="POST"> 
          @csrf
            <div class="col-md-4">
            <i class="fas fa-search" aria-hidden="true"></i>
            <input class="form-control form-control-sm ml-3 w-75" name="siswa" type="text" placeholder="Search"
              aria-label="Search">
            </div>
            <button class="btn btn-default btn-sm my-0 indigo darken-3" name="submit" type="submit">Cari</button>
          </form>
         

        </div>
      </div>
    </div>
  </div>
</div> -->
@endsection