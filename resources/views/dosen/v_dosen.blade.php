@extends('part.template')
@section('judul_halaman','Dosen')
@section('title','Dosen')

@section('konten')
<h1 style="text-align: center">Data Dosen</h1><p>
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

<a href="/dosen/add" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
<a href="/dosen/print" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-print"></i> Print</a>
<p></p>
<div class="table-responsive">
    <table id="tbl_dosen" class="table table-bordered table table-striped">
        <thead>
            <th>No</th>
            <th>Nidn</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Hp</th>
            <th>Email</th>
            <th>Lulusan</th>
            <th>Foto</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php $no=1;?>
            @foreach ($dosen as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->nidn}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->jenis_kelamin}}</td>
                    <td>{{$data->tempat_lahir}}</td>
                    <td>{{$data->tanggal_lahir}}</td>
                    <td>{{$data->alamat}}</td>
                    <td>{{$data->hp}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->lulusan}}</td>
                    <td><img src="{{url('foto_dosen/'.$data->foto)}}" width="100px"></td>
                    <td>
                        <a href="/dosen/detail/{{$data->id_dosen}}" class="btn btn-sm btn-success"><i class="fas fa-info-circle"></i> Detail</a>
                        <a href="/dosen/edit/{{$data->id_dosen}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$data->id_dosen}}">
                        <i class="fas fa-trash"></i> Hapus
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table><br/>
</div>

@foreach ($dosen as $data)
  <!-- Modal -->
  <div class="modal fade" id="delete{{$data->id_dosen}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah Anda Yakin Ingin Menghapus Data Dosen Dengan Nama {{$data->nama}} </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
          <a href="/dosen/delete/{{$data->id_dosen}}" class="btn btn-danger">Ya</a>
        </div>
      </div>
    </div>
  </div>
@endforeach

@endsection
