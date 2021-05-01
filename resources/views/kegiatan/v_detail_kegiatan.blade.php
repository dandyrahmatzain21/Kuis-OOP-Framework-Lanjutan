@extends('part/template')
@section('judul_halaman','Dashboard')
@section('title','Dashboard')

@section('konten')
<h1 style="text-align: center">Detail Kegiatan</h1><br/>
<div class="table-responsive">
    <table class="table table-striped">
            <tr>
            <th style="width: 100px">Jam</th>
            <th style="width: 30px">:</th>
            <th>{{$kegiatan->jam_mulai}} - {{$kegiatan->jam_akhir}}</th>
            </tr>
            <tr>
            <th style="width: 100px">Tanggal</th>
            <th style="width: 30px">:</th>
            <th>{{$kegiatan->tanggal}}</th>
            </tr>
            <tr>
            <th style="width: 100px">Ruangan</th>
            <th style="width: 30px">:</th>
            <th>{{$kegiatan->ruangan}}</th>
            </tr>
            <tr>
            <th style="width: 100px">Nama Kegiatan</th>
            <th style="width: 30px">:</th>
            <th>{{$kegiatan->nama_kegiatan}}</th>
            </tr>
            <tr>
            <th style="width: 100px">Keterangan</th>
            <th style="width: 30px">:</th>
            <th>{{$kegiatan->keterangan}}</th>
            </tr>
            <tr>
            <th style="width: 100px">Foto</th>
            <th style="width: 30px">:</th>
            <th><img src="{{url('foto_kegiatan/'.$kegiatan->foto)}}" width="200px"></th>
            </tr>
            <tr>
                <th><a href="/kegiatan" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a></th>
            </tr>

    </table>
</div>
@endsection
