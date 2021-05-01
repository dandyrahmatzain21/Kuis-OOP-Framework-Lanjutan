<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Laporan Mahasiswa {{date('D-M-Y')}}</title>
  @include('part/css_link')
</head>

<body onload="window.print();">
  <!-- Sidenav -->

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <!-- Navbar links -->

        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header --><div class="header bg-primary pb-9">
    <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h1 class="h1 text-white d-inline-block mb-0">Laporan Data Mahasiswa</h1>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <h3 style="color: white">Date : {{date('D-M-Y')}}</h3>
            </div>
          </div>
          <!-- Card stats -->
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--9">
      <div class="row justify-content-center">
        <div class=" col ">
          <div class="card">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Data Mahasiswa Yang Terdaftar</h3>
            </div>
            <div class="card-body">
                <div class="icon-example">
                    <table class="table table-bordered table table-striped">
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->

    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  @include('part/javascript_link')
</body>

</html>
