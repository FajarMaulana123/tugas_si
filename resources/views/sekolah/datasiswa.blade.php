@extends('layout.coba')
@section('conten')
    <div class="container-fluid mt-5">
    <div class="card">
        <div class="card-body mx-4">
            <div class='col-md-3'>
                <h3>Data siswa</h3>    
            </div>  
            <hr class="my-2">
            <a  class="btn btn-md btn-primary btn-rounded " data-toggle="modal" data-target="#modalContactForm">Tambah Siswa</a>
            <a class="btn btn-md btn-primary btn-rounded " data-toggle="modal" data-target="#modaltahunForm">Tahun Ajaran</a>
            <br><br>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Sekolah</th>
                        <th>Tahun / Ajaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $n=1;
                ?>
                @foreach ($siswa as $siswas)
                    <tr>
                        <td>{{$n++}}</td>
                        <td>{{$siswas->nisn}}</td>
                        <td>{{$siswas->nama_siswa}}</td>
                        <td>{{$siswas->kelas}}</td>
                        <td>{{$siswas->sekolah}}</td>
                        <td>{{$siswas->tahun_ajaran}}</td>
                        <td>
                            <a class="waves-effect btn waves-light btn-rounded btn-sm btn-primary" data-toggle="modal" data-target="#FormEdit{{$siswas->id_siswa}}"><i class="fas fa-edit fa-sm"></i></a>
                            <a class="waves-effect btn waves-light btn-rounded btn-sm btn-danger" href="{{url('/hapussiswa',['id'=>$siswas->id_siswa])}}"><i class="fas fa-trash fa-sm"></i></a>
                        </td>
                    </tr>

                    <div class="modal fade" id="FormEdit{{$siswas->id_siswa}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                        <div class="modal-dialog cascading-modal" role="document">
                            <!--Content-->
                            <div class="modal-content">

                            <!--Header-->
                            <div class="modal-header light-blue darken-3 white-text">
                                <h4 class="title"><i class="fas fa-pencil-alt"></i> Edit Data Siswa</h4>
                                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <!--Body-->
                            <div class="modal-body mb-0">
                            <form method="POST" action="{{url('/datasiswa',['id' => $siswas->id_siswa])}}">
                            @csrf
                            <input type="hidden" name="id_siswa" value="{{$siswas->id_siswa}}">
                            <input type="hidden" name="id_sekolah" value="{{Session::get('id_sekolah')}}">
                            <input type="hidden" name="sekolah" value="{{Session::get('nama_sekolah')}}">
                                <div class="md-form form-sm">
                                    <input type="text" id="form7" name="nisn" class="form-control" value="{{$siswas->nisn}}">
                                    <label for="form7" class="active">NISN</label>
                                </div>

                                <div class="md-form form-sm">
                                    <input type="text" id="form8" name="nama_siswa" value="{{$siswas->nama_siswa}}" class="form-control">
                                    <label for="form8" class="active">Nama Siswa</label>
                                </div>

                                <div class="md-form form-sm">
                                    <input type="text" id="form9" name="kelas" value="{{$siswas->kelas}}" class="form-control">
                                    <label for="form9" class="active">Kelas</label>
                                </div>
                                <div class="md-form form-sm">
                                <select class="mdb-select" name="tahun_ajaran">
                                    @foreach ($tahun as $tahuns)
                                    <option value="{{$tahuns->tahun_ajaran}}" {{ $tahuns->tahun_ajaran == $siswas->tahun_ajaran ? 'selected' : '' }}>{{$tahuns->tahun_ajaran}}</option>
                                    @endforeach
                                </select>
                                </div>

                                <div class="text-center mt-1-half">
                                    <button class="btn btn-info mb-2 waves-effect waves-light" type="submit" name="submit">Send <i class="fas fa-send ml-1"></i></button>
                                </div>
                            </form>
                            </div>
                            </div>
                            <!--/.Content-->
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>   
        </div>
        </div>
    </div>



  <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

        <!--Header-->
        <div class="modal-header light-blue darken-3 white-text">
            <h4 class="title"><i class="fas fa-pencil-alt"></i> Tambah Data Siswa</h4>
            <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <!--Body-->
        <div class="modal-body mb-0">
        <form method="POST" action="{{url('')}}/datasiswa/tambah">
        @csrf
        <input type="hidden" name="id_sekolah" value="{{Session::get('id_sekolah')}}">
        <input type="hidden" name="sekolah" value="{{Session::get('nama_sekolah')}}">
            <div class="md-form form-sm">
                <input type="text" id="form14" name="nisn" class="form-control" required>
                <label for="form14" class="active">NISN</label>
            </div>

            <div class="md-form form-sm">
                <input type="text" id="form11" name="nama_siswa" class="form-control" required>
                <label for="form11" class="active">Nama Siswa</label>
            </div>

            <div class="md-form form-sm">
                <input type="text" id="form13" name="kelas" class="form-control" required> 
                <label for="form13" class="active">Kelas</label>
            </div>
            <div class="md-form form-sm">
            <select class="mdb-select" name="tahun_ajaran">
                <option value="" disabled selected>Pilih Tahun / Ajaran</option>
                @foreach ($tahun as $tahuns)
                <option value="{{$tahuns->tahun_ajaran}}">{{$tahuns->tahun_ajaran}}</option>
                @endforeach
            </select>
            </div>
            <div class="text-center mt-1-half">
                <button class="btn btn-info mb-2 waves-effect waves-light" type="submit" name="submit">Send <i class="fas fa-send ml-1"></i></button>
            </div>
        </form>
        </div>
        </div>
        <!--/.Content-->
    </div>
 </div>

 <div class="modal fade" id="modaltahunForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

        <!--Header-->
        <div class="modal-header light-blue darken-3 white-text">
            <h4 class="title"><i class="fas fa-pencil-alt"></i> Tambah Tahun / Ajaran</h4>
            <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <!--Body-->
        <div class="modal-body mb-0">
          <form method="POST" action="{{url('')}}/tahunajaran">
          @csrf
            <div class="md-form form-sm">
                <input type="text" id="form12" name="tahun_ajaran" class="form-control" required>
                <label for="form12" class="active">Tahun / Ajaran</label>
            </div>
            <div class="text-center mt-1-half">
                <button class="btn btn-info mb-2 waves-effect waves-light" type="submit" name="submit">Send <i class="fas fa-send ml-1"></i></button>
            </div>
          </form>
        </div>
        </div>
        <!--/.Content-->
    </div>
 </div>

@endsection