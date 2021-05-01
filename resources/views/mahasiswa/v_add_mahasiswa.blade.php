@extends('part/template')
@section('judul_halaman','Add Mahasiswa')
@section('title','Mahasiswa')

@section('konten')
<h1 style="text-align: center;">Tambah Data Mahasiswa</h1><br/>

<form method="POST" action="/mahasiswa/insert" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="nim">Nim</label>
    <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror" id="nim" placeholder="Nim" value="{{old('nim')}}">
    <div class="invalid-feedback">
        @error('nim')
            {{ $message}}
        @enderror
    </div>
  </div>

  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" value="{{old('nama')}}">
    <div class="invalid-feedback">
        @error('nama')
            {{ $message}}
        @enderror
    </div>
  </div>

  <div class="form-group">
    <label for="jenis_kelamin">Jenis Kelamin</label>
    <input type="text" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" placeholder="Jenis Kelamin" value="{{old('jenis_kelamin')}}">
    <div class="invalid-feedback">
        @error('jenis_kelamin')
            {{ $message}}
        @enderror
    </div>
  </div>

  <div class="form-group">
    <label for="tempat_lahir">Tempat Lahir</label>
    <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Tempat Lahir" value="{{old('tempat_lahir')}}">
    <div class="invalid-feedback">
        @error('tempat_lahir')
            {{ $message}}
        @enderror
    </div>
  </div>

  <div class="form-group">
    <label for="tanggal_lahir">Tanggal Lahir</label>
    <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Tanggal Lahir" value="{{old('tanggal_lahir')}}">
    <div class="invalid-feedback">
        @error('tanggal_lahir')
            {{ $message}}
        @enderror
    </div>
  </div>

  <div class="form-group">
    <label for="alamat">Alamat</label>
    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" value="{{old('alamat')}}">
    <div class="invalid-feedback">
        @error('alamat')
            {{ $message}}
        @enderror
    </div>
  </div>

  <div class="form-group">
    <label for="hp">Hp</label>
    <input type="number" name="hp" class="form-control @error('hp') is-invalid @enderror" id="hp" placeholder="Hp" value="{{old('hp')}}">
    <div class="invalid-feedback">
        @error('hp')
            {{ $message}}
        @enderror
    </div>
  </div>

  <div class="form-group">
    <label for="foto">Foto</label>
    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto" placeholder="Foto" value="{{old('foto')}}">
    <div class="invalid-feedback">
        @error('foto')
            {{ $message}}
        @enderror
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p>Pastikan Data Yang Anda Masukan Sudah Benar, Yakin Untuk Menambah Data ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        <button class="btn btn-primary">Ya</button>
      </div>
    </div>
  </div>
</div>

</form>

<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_add">
  <i class="fas fa-save fa-lg"></i> Simpan
</button>
@endsection
