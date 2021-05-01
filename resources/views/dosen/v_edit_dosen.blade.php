@extends('part/template')
@section('judul_halaman','Dosen')
@section('title','Edit Dosen')

@section('konten')
    <h1 style="text-align: center">Edit Dosen</h1>
    <form method="POST" action="/dosen/update/{{$dosen->id_dosen}}" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label for="nidn">Nidn</label>
            <input type="text" name="nidn" class="form-control @error('nidn') is-invalid @enderror" id="nidn" placeholder="Nidn" value="{{$dosen->nidn}}" readonly>
            <div class="invalid-feedback">
                @error('nidn')
                    {{ $message}}
                @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" value="{{$dosen->nama}}">
            <div class="invalid-feedback">
                @error('nama')
                    {{ $message}}
                @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" placeholder="Jenis Kelamin">
                <option value="{{$dosen->jenis_kelamin}}">{{$dosen->jenis_kelamin}} -- Dipilih</option>
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <div class="invalid-feedback">
                @error('jenis_kelamin')
                    {{ $message}}
                @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Tempat Lahir" value="{{$dosen->tempat_lahir}}">
            <div class="invalid-feedback">
                @error('tempat_lahir')
                    {{ $message}}
                @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Tanggal Lahir" value="{{$dosen->tanggal_lahir}}">
            <div class="invalid-feedback">
                @error('tanggal_lahir')
                    {{ $message}}
                @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" value="{{$dosen->alamat}}">
            <div class="invalid-feedback">
                @error('alamat')
                    {{ $message}}
                @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="hp">Hp</label>
            <input type="number" name="hp" class="form-control @error('hp') is-invalid @enderror" id="hp" placeholder="Hp" value="{{$dosen->hp}}">
            <div class="invalid-feedback">
                @error('hp')
                    {{ $message}}
                @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{$dosen->email}}">
            <div class="invalid-feedback">
                @error('email')
                    {{ $message}}
                @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="lulusan">Lulusan</label>
            <input type="text" name="lulusan" class="form-control @error('lulusan') is-invalid @enderror" id="lulusan" placeholder="Lulusan" value="{{$dosen->lulusan}}">
            <div class="invalid-feedback">
                @error('lulusan')
                    {{ $message}}
                @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="foto">Foto</label><br/>
            <img src="{{url('foto_dosen/'.$dosen->foto)}}" width="100px"><br/><br/>
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
