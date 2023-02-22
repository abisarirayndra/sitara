<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SiTara</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="{{ route('admin.dashboard') }}" class="navbar-brand">
        {{-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text font-weight-bold">SiTara</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link nav-link-active">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.kelas') }}" class="nav-link">Prestasi</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.lampiran_prestasi') }}" class="nav-link">Lampiran</a>
          </li>
          {{-- <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">Some action </a></li>
              <li><a href="#" class="dropdown-item">Some other action</a></li>

              <li class="dropdown-divider"></li>

              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                  </li>

                  <!-- Level three dropdown-->
                  <li class="dropdown-submenu">
                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                    </ul>
                  </li>
                  <!-- End Level three -->

                  <li><a href="#" class="dropdown-item">level 2</a></li>
                  <li><a href="#" class="dropdown-item">level 2</a></li>
                </ul>
              </li>
              <!-- End Level two -->
            </ul>
          </li> --}}
        </ul>

        {{-- <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form> --}}
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                <img src="{{ asset('logo/Pak Yayan.png') }}" alt="" width="30" class="img-profile rounded-circle"> {{ $user }}</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{ route('logout') }}" class="dropdown-item">Logout </a></li>
            </ul>
          </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
            <div class="col-lg-1">
                <img src="{{ asset('logo/logo.png') }}" alt="Logo Smada" width="80">
            </div>
          <div class="col-lg-10">
            <h1 class="m-0"> Sistem Informasi Prestasi <br> SMAN 2 TARUNA BHAYANGKARA <small>v1.0</small></h1>
          </div><!-- /.col -->
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li>
            </ol>
          </div><!-- /.col --> --}}
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Prestasi</h3>
                    {{-- <div class="float-right">
                        <form action="{{ route('daftar_nama') }}" method="GET">
                            <input type="text" name="tingkat" value="{{ $siswa->tingkat }}" hidden>
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                        </form>
                    </div> --}}
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if (session()->has('success'))
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-info"></i> Alert!</h5>
                        {{ session()->get('success') }}
                    </div>
                    @endif

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                      <th>Jenis</th>
                      <th>Tingkat</th>
                      <th>Juara</th>
                      <th>Nama Kejuaraan</th>
                      <th>Penyelanggara</th>
                      <th>Nomor Piagam</th>
                      <th>Tanggal</th>
                      <th>Tempat Pelaksanaan</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($prestasi as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->jenis }}</td>
                            @if ($item->tingkat == 1)
                            <td>Nasional {{ $item->wilayah }}</td>
                            @elseif ($item->tingkat == 2)
                            <td>Provinsi {{ $item->wilayah }}</td>
                            @elseif ($item->tingkat == 3)
                            <td>Keresidenan {{ $item->wilayah }}</td>
                            @elseif ($item->tingkat == 4)
                            <td>Kabupaten {{ $item->wilayah }}</td>
                            @else
                            <td> - </td>
                            @endif
                            <td>{{ $item->juara }}</td>
                            <td>{{ $item->nama_kejuaraan }}</td>
                            <td>{{ $item->penyelenggara }}</td>
                            <td>{{ $item->nomor_piagam }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('DD MMMM Y') }}</td>
                            <td>{{ $item->tempat_pelaksanaan }}</td>

                        </tr>
                        @endforeach

                  </table>
                </div>
                <!-- /.card-body -->
              </div>

            <!-- /.row -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lampiran File Prestasi</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                        <div class="filter-container p-0 row">
                            @foreach ($piagam as $item)
                            <div class="col-lg-4">
                                <div class="card">
                                <div class="card-body">
                                    <iframe src="{{ asset('files/'. $item->file) }}" frameborder="0" scrolling="auto"></iframe>
                                    <div class="text-center">
                                        <p>{{ $item->file }}</p>
                                        <p>{{ $item->jenis }}</p>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{ route('hapus_file', [$item->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus file ini ?')"><i class="fas fa-trash"></i></a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endforeach
                            @foreach ($foto as $item)
                            <div class="col-lg-4">
                                <div class="card">
                                <div class="card-body">
                                    <img src="{{ asset('files/'. $item->file) }}" width="100%" frameborder="0" scrolling="auto">
                                    <div class="text-center">
                                        <p>{{ $item->file }}</p>
                                        <p>{{ $item->jenis }}</p>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{ route('hapus_file', [$item->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus file ini ?')"><i class="fas fa-trash"></i></a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endforeach
                            @foreach ($video as $item)
                            <div class="col-lg-4">
                                <div class="card">
                                <div class="card-body">
                                    <iframe src="{{ asset('files/'. $item->file) }}" frameborder="0" scrolling="auto"></iframe>
                                    <div class="text-center">
                                        <p>{{ $item->file }}</p>
                                        <p>{{ $item->jenis }}</p>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{ route('admin.hapus_file', [$item->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus file ini ?')"><i class="fas fa-trash"></i></a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endforeach

                        </div>

                </div>
                <!-- /.card-body -->
              </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022 Yayan Ferdiyan, M.Pd. </strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }} "></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src=" {{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src=" {{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }} "></script>
<script src=" {{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src=" {{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src=" {{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src=" {{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src=" {{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
<script src=" {{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src=" {{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src=" {{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src=" {{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src=" {{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }} "></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "excel",   {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'A4'
            }, "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>
</html>
