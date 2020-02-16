@extends('layout.admin')
@section('conten')
<div class="container-fluid mt-5">
<div class="col-md-6">
<div class="card">

    <h5 class="card-header blue darken-4 white-text text-center py-4">
        <strong>Daftar Sekolah</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;" method ="POST">
            @csrf
            <!-- Name -->
            <div class="md-form mt-3">
                <input type="text" id="sekolah" name="nama_sekolah" class="form-control">
                <label for="sekolah">Nama Sekolah</label>
            </div>
            <div class="md-form mt-3">
                <input type="email" id="email" name="email" class="form-control">
                <label for="email">E-mail Sekolah</label>
            </div>
            <div class="md-form mt-3">
                <input type="password" id="password" name="password" class="form-control">
                <label for="password">Password</label>
            </div>
            <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Daftar</button>
        </form>
        <!-- Form -->

    </div>

</div>
</div>
</div>
@endsection