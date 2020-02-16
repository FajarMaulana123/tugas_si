@extends('layout.admin')
@section('conten')
    <div class="container-fluid mt-5">
    <div class="card">
        <div class="card-body mx-4">
            <div class='col-md-3'>
                <h3>Data Sekolah</h3>    
            </div>  
            <hr class="my-2">
           <br>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Sekolah</th>
                        <th>E-mail</th>
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
                        <td>{{$datas->nama_sekolah}}</td>
                        <td>{{$datas->email}}</td>
                        <td>
                        <a class="waves-effect btn waves-light btn-rounded btn-sm btn-danger" href="{{url('/hapussekolah',['id'=>$datas->id_sekolah])}}"><i class="fas fa-trash fa-sm"></i></a>
                        </td>
                    </tr>

                   
                @endforeach
                </tbody>
            </table>   
        </div>
        </div>
    </div>



@endsection