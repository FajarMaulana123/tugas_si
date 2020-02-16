@extends('layout.coba')
@section('conten')
<div class="container-fluid mt-5">
  <div class="card">
    <div class="card-body mx-4">
        <div class='col-md-3'>
            <h3>SPP</h3>    
        </div>  
        <hr class="my-2">
        <a  class="btn btn-md btn-primary btn-rounded " data-toggle="modal" data-target="#modaltagihanForm">Tambah Tagihan</a>
            <br><br>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Tahun / Ajaran</th>
                        <th>Bulan</th>
                        <th>Tagihan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $datas)
                    <tr>
                        <td>{{$datas->tahun_ajaran}}</td>
                        <td>{{$datas->bulan}}</td>
                        <td>{{$datas->tarif_spp}}</td>
                        <td>
                            <a class="waves-effect btn waves-light btn-rounded btn-sm btn-danger" href="{{url('/hapustarif',['id'=>$datas->id_tarifspp])}}"><i class="fas fa-trash fa-sm"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>   
    </div>
  </div>
</div>

<div class="modal fade" id="modaltagihanForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

        <!--Header-->
        <div class="modal-header light-blue darken-3 white-text">
            <h4 class="title"><i class="fas fa-pencil-alt"></i> Tambah Tagihan</h4>
            <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <!--Body-->
        <div class="modal-body mb-0">
        <form method="POST" action="{{url('/tarif')}}">
        @csrf

            <div class="md-form form-sm">
            <select class="mdb-select" name="tahun_ajaran">
                <option value="" disabled selected>Pilih Tahun / Ajaran</option>
                @foreach ($tahun as $tahuns)
                <option value="{{$tahuns->tahun_ajaran}}">{{$tahuns->tahun_ajaran}}</option>
                @endforeach
            </select>
            </div>

            <div class="md-form form-sm">
            <select class="mdb-select" name="bulan">
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
            </div>
            

            <div class="md-form form-sm">
                <input type="text" id="form13" name="tarif_spp" class="form-control" required> 
                <label for="form13" class="active">Tarif SPP</label>
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