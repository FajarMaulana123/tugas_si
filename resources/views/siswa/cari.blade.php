@extends('layout.coba1')
@section('conten')
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
                  <button class="btn waves-effect waves-light right btn-small" type="submit" name="submit">Search
                    <!-- <i class="material-icons left">search</i> -->
                  </button>
                </div>
              </div>
              </form>
              
              <!-- <h4>Data Tagihan</h4>
              <table class="responsive-table centered striped highlight">
                <thead>
                  <tr>
                      <th>Bulan</th>
                      <th>Tarif SPP</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($tarif as $tarifs)
                <tr>      
                    <td>{{$tarifs->bulan}}</td>
                    <td>{{$tarifs->tarif_spp}}</td>
                    <td>s</td>
                    <td>
                        <a class="waves-effect btn waves-light btn-rounded btn-sm btn-danger" href="">Bayar</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
              </table> -->
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col s12 ">
            <ul class="tabs ">
              <li class="tab col s3"><a href="#test1">Data Siswa</a></li>
              <li class="tab col s3"><a href="#test2">Data Tagihan</a></li>
              <li class="tab col s3"><a href="#test3">Pembayaran</a></li>
              <li class="tab col s3"><a href="#test4">Data Pembayaran</a></li>
            </ul>
          </div>
          <div id="test1" class="col s12">
          <br>
          <div class="col s8 offset-s2">
            <div class="card horizontal">
              <div class="card-stacked">
                <div class="card-content">
                  <p>NISN         : {{$data->nisn}}</p>
                  <p>Nama         : {{$data->nama_siswa}}</p>
                  <p>Kelas        : {{$data->kelas}}</p>
                  <p>Sekolah      : {{$data->sekolah}}</p>
                  <p>Tahun Ajaran : {{$data->tahun_ajaran}}</p>
                </div>
              </div>
            </div>
          </div>
          </div>
          <div id="test2" class="col s12">
          <br>
          <div class="col s8 offset-s2">
            <div class="card horizontal">
              <div class="card-stacked">
                <div class="card-content">
                <table class="responsive-table centered striped highlight">
                <thead>
                  <tr>
                      <th>Bulan</th>
                      <th>Tarif SPP</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($tarif as $tarifs)
                <tr>      
                    <td>{{$tarifs->bulan}}</td>
                    <td>{{$tarifs->tarif_spp}}</td>
                </tr>
                @endforeach
                </tbody>
              </table>
                </div>
              </div>
            </div>
          </div>
          </div>
          <div id="test3" class="col s12">
          <br>
          <div class="col s8 offset-s2">
            <div class="card horizontal">
              <div class="card-stacked">
                <div class="card-content">
                <form class="col s12" method="post" action="{{url('/pembayaran')}}"  enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="nisn" value="{{$data->nisn}}">
                  <input type="hidden" name="nama_siswa" value="{{$data->nama_siswa}}">
                  <input type="hidden" name="kelas" value="{{$data->kelas}}">
                  <input type="hidden" name="sekolah" value="{{$data->sekolah}}">
                  <input type="hidden" name="tahun_ajaran" value="{{$data->tahun_ajaran}}">
                  <div class="row">
                  <div class="input-field col s12">
                    <select name="bulan">
                      <option value="" disabled selected>Pilih Bulan</option>
                      <option value="Januari">Januari</option>
                      <option value="Febuari">Fabuari</option>
                      <option value="Maret">Maret</option>
                      <option value="April">April</option>
                      <option value="Mei">Mei</option>
                      <option value="Juni">Juni</option>
                      <option value="Juli">Juli</option>
                      <option value="Agustus">Agustus</option>
                      <option value="September">September</option>
                      <option value="Oktober">Oktober</option>
                      <option value="November">November</option>
                      <option value="Desember">Desember</option>
                    </select>
                    <label>Bulan</label>
                  </div>
                  </div>
                  <div class="row"> 
                    <div class="file-field input-field col s12">
                      <div class="btn">
                        <span>File</span>
                        <input type="file" name="bukti_tf" multiple>
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload Bukti Transfer">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <button class="btn waves-effect waves-light right" type="submit" name="submit">Submit
                        <i class="material-icons right">send</i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          <div id="test4" class="col s12">
          <br>
          <div class="col s8 offset-s2">
            <div class="card horizontal">
              <div class="card-stacked">
                <div class="card-content">
                  <table class="responsive-table centered striped highlight">
                <thead>
                  <tr>
                      <th>Bulan</th>
                      <th>Bukti transfer</th>
                      <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($bayar as $bayars)
                <tr>      
                    <td>{{$bayars->bulan}}</td>
                    <td><img src="{{url('')}}/Foto/{{$bayars->bukti_tf}}" width="50 px" height="50 px"></td>
                    <td><span class=" new badge yellow">{{$bayars->status}}</span></td>
                </tr>
                @endforeach
                </tbody>
              </table>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>         

@endsection