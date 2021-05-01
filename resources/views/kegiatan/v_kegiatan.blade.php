@extends('part.template')
@section('judul_halaman','Kegiatan')
@section('title','Kegiatan')

@section('konten')
<h1 style="text-align: center">Halaman Kegiatan</h1>
<div class="row">
    <div class="col-sm-5">
        @if(session('Pesan'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text"><strong>Success!</strong> {{session('Pesan')}}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
  </div>

<a href="/kegiatan/add" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
<a href="/kegiatan/print" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-print"></i> Print</a>
<p></p>
<div class="table-responsive">
    <table id="tbl_kegiatan" class="table table-bordered table table-striped">
        <thead>
            <th>No</th>
            <th>Jam</th>
            <th>Tanggal</th>
            <th>Ruangan</th>
            <th>Nama Kegiatan</th>
            <th>Keterangan</th>
            <th>Foto</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php $no=1;?>
            @foreach ($kegiatan as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->jam_mulai}} - {{$data->jam_akhir}}</td>
                    <td>{{$data->tanggal}}</td>
                    <td>{{$data->ruangan}}</td>
                    <td>{{$data->nama_kegiatan}}</td>
                    <td>{{$data->keterangan}}</td>
                    <td><img src="{{url('foto_kegiatan/'.$data->foto)}}" width="100px"></td>
                    <td>
                        <a href="/kegiatan/detail/{{$data->id_kegiatan}}" class="btn btn-sm btn-success"><i class="fas fa-info-circle"></i> Detail</a>
                        <a href="/kegiatan/edit/{{$data->id_kegiatan}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$data->id_kegiatan}}">
                        <i class="fas fa-trash"></i> Hapus
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table><br/>
</div>

@foreach ($kegiatan as $data)
  <!-- Modal -->
  <div class="modal fade" id="delete{{$data->id_kegiatan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah Anda Yakin Ingin Menghapus Data Kegiatan Dengan Nama {{$data->nama_kegiatan}} </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
          <a href="/kegiatan/delete/{{$data->id_kegiatan}}" class="btn btn-danger">Ya</a>
        </div>
      </div>
    </div>
  </div>
@endforeach
@endsection



