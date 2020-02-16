@extends('layout.coba')
@section('conten')
    <div class="container-fluid mt-5">
    <div class="card">
        <div class="card-body mx-4">
            <div class='col-md-3'>
                <h3>Data Pembayaran</h3>    
            </div>  
            <hr class="my-2">
           <br>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Sekolah</th>
                        <th>Tahun / Ajaran</th>
                        <th>Bulan</th>
                        <th>Bukti Transfer</th>
                        <th>Setting</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $n=1;
                ?>
                @foreach ($data as $datas)
                    <tr>
                        <td>{{$n++}}</td>
                        <td>{{$datas->nisn}}</td>
                        <td>{{$datas->nama_siswa}}</td>
                        <td>{{$datas->kelas}}</td>
                        <td>{{$datas->sekolah}}</td>
                        <td>{{$datas->tahun_ajaran}}</td>
                        <td>{{$datas->bulan}}</td>
                        <td>
                        <div id="mdb-lightbox-ui"></div>
                            <div class="mdb-lightbox">
                            <figure >
                                <a href="{{url('')}}/Foto/{{$datas->bukti_tf}}" data-size="1600x1067">
                                <img src="{{url('')}}/Foto/{{$datas->bukti_tf}}" class="img-fluid" width="50 px" height="50 px">
                                </a>
                            </figure>
                            </div>
                        </div>
                        </td>
                        <td>
                        
                        <form action="{{url('/status')}}" method="post" >
                        @csrf
                        <input type="hidden" name="id" value="{{$datas->id_pembayaran}}">
                        <div class="md-form form-sm">
                        <select class="mdb-select" name="status" id="status" onchange="this.form.submit()">
                        <option {{old('status',$datas->status)=="Pending"? 'selected':''}}  value="Pending">Pending</option>
                        <option {{old('status',$datas->status)=="Lunas"? 'selected':''}} value="Lunas">Lunas</option>
                        </select>
                        </div>
                        </form>
                        </td>
                    </tr>

                   
                @endforeach
                </tbody>
            </table>   
        </div>
        </div>
    </div>



@endsection