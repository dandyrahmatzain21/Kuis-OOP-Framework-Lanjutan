@extends('part/template')
@section('judul_halaman','Dashboard')
@section('title','Dashboard')

@section('konten')
<h1 style="text-align: center">Data Mahasiswa</h1><br/>
<div class="table-responsive">
    <table class="table table-striped">
            <tr>
            <th style="width: 100px">NIM</th>
            <th style="width: 30px">:</th>
            <th>{{$mahasiswa->nim}}</th>
            </tr>
            <tr>
            <th style="width: 100px">Nama</th>
            <th style="width: 30px">:</th>
            <th>{{$mahasiswa->nama}}</th>
            </tr>
            <tr>
            <th style="width: 100px">Jenis Kelamin</th>
            <th style="width: 30px">:</th>
            <th>{{$mahasiswa->jenis_kelamin}}</th>
            </tr>
            <tr>
            <th style="width: 100px">Tempat Lahir</th>
            <th style="width: 30px">:</th>
            <th>{{$mahasiswa->tempat_lahir}}</th>
            </tr>
            <tr>
            <th style="width: 100px">Tanggal Lahir</th>
            <th style="width: 30px">:</th>
            <th>{{$mahasiswa->tanggal_lahir}}</th>
            </tr>
            <tr>
            <th style="width: 100px">Alamat</th>
            <th style="width: 30px">:</th>
            <th>{{$mahasiswa->alamat}}</th>
            </tr>
            <tr>
            <th style="width: 100px">Hp</th>
            <th style="width: 30px">:</th>
            <th>{{$mahasiswa->hp}}</th>
            </tr>
            <tr>
            <th style="width: 100px">Foto</th>
            <th style="width: 30px">:</th>
            <th><img src="{{url('foto/'.$mahasiswa->foto)}}" width="200px"></th>
            </tr>
            <tr>
                <th><a href="/mahasiswa" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a></th>
            </tr>

    </table>
</div>
@endsection
