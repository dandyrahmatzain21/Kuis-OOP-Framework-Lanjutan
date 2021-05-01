@extends('part/template')
@section('judul_halaman','Edit Kegiatan')
@section('title','Edit Kegiatan')

@section('konten')
    <h1 style="text-align: center">Edit Kegiatan</h1>
    <form method="POST" action="/kegiatan/update/{{$kegiatan->id_kegiatan}}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="jam_mulai">Jam</label>
            <div class="form-group row">
                <label for="jam_mulai" class="col-sm-1 col-form-label">Jam Mulai</label>
                <div class="col-sm-5">
                <input type="time" name="jam_mulai" class="form-control @error('jam_mulai') is-invalid @enderror" id="jam_mulai" placeholder="Jam Mulai" value="{{$kegiatan->jam_mulai}}">
                <div class="invalid-feedback">
                    @error('jam_mulai')
                        {{ $message}}
                    @enderror
                </div>
                </div>
                <label for="jam_akhir" class="col-sm-1 col-form-label">Jam Akhir</label>
                <div class="col-sm-5">
                <input type="time" name="jam_akhir" class="form-control @error('jam_akhir') is-invalid @enderror" id="jam_akhir" placeholder="Jam Akhir" value="{{$kegiatan->jam_akhir}}">
                <div class="invalid-feedback">
                    @error('jam_akhir')
                        {{ $message}}
                    @enderror
                </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" placeholder="Tanggal" value="{{$kegiatan->tanggal}}">
            <div class="invalid-feedback">
                @error('tanggal')
                    {{ $message}}
                @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="ruangan">Ruangan</label>
            <input type="text" name="ruangan" class="form-control @error('ruangan') is-invalid @enderror" id="ruangan" placeholder="Ruangan" value="{{$kegiatan->ruangan}}">
            <div class="invalid-feedback">
                @error('ruangan')
                    {{ $message}}
                @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="nama_kegiatan">Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan" class="form-control @error('nama_kegiatan') is-invalid @enderror" id="nama_kegiatan" placeholder="Nama Kegiatan" value="{{$kegiatan->nama_kegiatan}}">
            <div class="invalid-feedback">
                @error('nama_kegiatan')
                    {{ $message}}
                @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="Keterangan" value="{{$kegiatan->keterangan}}">
            <div class="invalid-feedback">
                @error('keterangan')
                    {{ $message}}
                @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="foto">Foto</label><br/>
            <img src="{{url('foto_kegiatan/'.$kegiatan->foto)}}" width="100px"><br/><br/>
            <label for="foto">Ganti Foto</label><br/>
            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto" placeholder="Foto">
            <div class="invalid-feedback">
                @error('foto')
                    {{ $message}}
                @enderror
            </div>
          </div>

        <!-- Modal -->
        <div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               <p>Pastikan Data Yang Anda Edit Sudah Benar, Yakin Untuk Megubah Data ?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                <button class="btn btn-primary">Ya</button>
              </div>
            </div>
          </div>
        </div>

        </form>

        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit">
          <i class="fas fa-save fa-lg"></i> Save
        </button>
@endsection
