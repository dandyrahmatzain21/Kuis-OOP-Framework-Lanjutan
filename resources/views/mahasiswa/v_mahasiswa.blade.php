@extends('part.template')
@section('judul_halaman','Mahasiswa')
@section('title','Mahasiswa')

@section('konten')
<h1 style="text-align: center">Data Mahasiswa</h1><p>
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

<a href="/mahasiswa/add" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
<a href="/mahasiswa/print" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-print"></i> Print</a>
<!-- Bekas Latihan,Ga kepake ko -->
<!--<a href="/mahasiswa/printpdf" target="_blank" class="btn btn-sm btn-success"><i class="fas fa-print"></i> Print To Pdf</a>-->
<p></p>
<div class="table-responsive">
    <table id="tbl_mahasiswa" class="table table-bordered table table-striped">
        <thead>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Hp</th>
            <th>Foto</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php $no=1;?>
            @foreach ($mahasiswa as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->nim}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->jenis_kelamin}}</td>
                    <td>{{$data->tempat_lahir}}</td>
                    <td>{{$data->tanggal_lahir}}</td>
                    <td>{{$data->alamat}}</td>
                    <td>{{$data->hp}}</td>
                    <td><img src="{{url('foto/'.$data->foto)}}" width="100px"></td>
                    <td>
                        <a href="/mahasiswa/detail/{{$data->id}}" class="btn btn-sm btn-success"><i class="fas fa-info-circle"></i> Detail</a>
                        <a href="/mahasiswa/edit/{{$data->id}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$data->id}}">
                        <i class="fas fa-trash"></i> Hapus
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table><br/>
</div>

@foreach ($mahasiswa as $data)
  <!-- Modal -->
  <div class="modal fade" id="delete{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah Anda Yakin Ingin Menghapus Data Mahasiswa Dengan Nama {{$data->nama}} </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
          <a href="/mahasiswa/delete/{{$data->id}}" class="btn btn-danger">Ya</a>
        </div>
      </div>
    </div>
  </div>
@endforeach

@endsection
