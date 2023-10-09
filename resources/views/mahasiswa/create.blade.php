@extends('layout.template')
@section('konten')

<!-- START FORM -->
       <form action='{{ url('mahasiswa') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url("mahasiswa") }}" class="btn btn-secondary">Kembali</a>
            <div class="mb-3 row">
                <label for="npm" class="col-sm-2 col-form-label">NPM</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='npm' value="{{ Session::get('npm') }}" id="npm">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' value="{{ Session::get('nama') }}" id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='kelas' value="{{ Session::get('kelas') }}" id="kelas">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='jurusan' value="{{ Session::get('jurusan') }}" id="jurusan">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nohp" class="col-sm-2 col-form-label">No. HP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nohp' value="{{ Session::get('nohp') }}" id="nohp">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
        </div>
    </form>
<!-- AKHIR FORM -->

@endsection
