<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Dandy Rahmat Zain">
  <title>Laporan Dosen {{date('D-M-Y')}}</title>
  @include('part/css_link')
</head>

<body onload="window.print();">
  <div class="main-content" id="panel">
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        </div>
      </div>
    </nav>
    <div class="header bg-primary pb-9">
    <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h1 class="h1 text-white d-inline-block mb-0">Laporan Data Dosen</h1>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <h3 style="color: white">Date : {{date('D-M-Y')}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--9">
      <div class="row justify-content-center">
        <div class=" col ">
          <div class="card">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Data Dosen Yang Terdaftar</h3>
            </div>
            <div class="card-body">
                <div class="icon-example">
                    <table class="table table-bordered table table-striped">
                        <thead>
                            <th>No</th>
                            <th>Nidn</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat,Tgl Lahir</th>
                            <th>Alamat</th>
                            <th>Hp</th>
                            <th>Email</th>
                            <th>Lulusan</th>
                            <th>Foto</th>
                        </thead>
                        <tbody>
                            <?php $no=1;?>
                            @foreach ($dosen as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->nidn}}</td>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->jenis_kelamin}}</td>
                                    <td>{{$data->tempat_lahir}},{{$data->tanggal_lahir}}</td>
                                    <td>{{$data->alamat}}</td>
                                    <td>{{$data->hp}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->lulusan}}</td>
                                    <td><img src="{{url('foto_dosen/'.$data->foto)}}" width="100px"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('part/javascript_link')
</body>

</html>
