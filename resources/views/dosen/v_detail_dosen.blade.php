@extends('part/template')
@section('judul_halaman','Dashboard')
@section('title','Dashboard')

@section('konten')
<h1 style="text-align: center">Data Dosen</h1><br/>
<div class="table-responsive">
    <table class="table table-striped">
            <tr>
            <th style="width: 100px">Nidn</th>
            <th style="width: 30px">:</th>
            <th>{{$dosen->nidn}}</th>
            </tr>
            <tr>
            <th style="width: 100px">Nama</th>
            <th style="width: 30px">:</th>
            <th>{{$dosen->nama}}</th>
            </tr>
            <tr>
            <th style="width: 100px">Jenis Kelamin</th>
            <th style="width: 30px">:</th>
            <th>{{$dosen->jenis_kelamin}}</th>
            </tr>
            <tr>
            <th style="width: 100px">Tempat Lahir</th>
            <th style="width: 30px">:</th>
            <th>{{$dosen->tempat_lahir}}</th>
            </tr>
            <tr>
            <th style="width: 100px">Tanggal Lahir</th>
            <th style="width: 30px">:</th>
            <th>{{$dosen->tanggal_lahir}}</th>
            </tr>
            <tr>
            <th style="width: 100px">Alamat</th>
            <th style="width: 30px">:</th>
            <th>{{$dosen->alamat}}</th>
            </tr>
            <tr>
            <th style="width: 100px">Hp</th>
            <th style="width: 30px">:</th>
            <th>{{$dosen->hp}}</th>
            </tr>
            <tr>
            <th style="width: 100px">Email</th>
            <th style="width: 30px">:</th>
            <th>{{$dosen->email}}</th>
            </tr>
            <tr>
            <th style="width: 100px">Lulusan</th>
            <th style="width: 30px">:</th>
            <th>{{$dosen->lulusan}}</th>
            </tr>
            <tr>
            <th style="width: 100px">Foto</th>
            <th style="width: 30px">:</th>
            <th><img src="{{url('foto_dosen/'.$dosen->foto)}}" width="200px"></th>
            </tr>
            <tr>
                <th><a href="/dosen" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a></th>
            </tr>

    </table>
</div>
@endsection
