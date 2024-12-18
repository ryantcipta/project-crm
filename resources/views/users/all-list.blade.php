<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url("plugins/fontawesome-free/css/all.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{url("plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url("plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url("plugins/jqvmap/jqvmap.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url("dist/css/adminlte.min.css")}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url("plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url("plugins/daterangepicker/daterangepicker.css")}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url("plugins/summernote/summernote-bs4.min.css")}}">
   <!-- DataTables -->
   <link rel="stylesheet" href="{{url("plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
   <link rel="stylesheet" href="{{url("plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
   <link rel="stylesheet" href="{{url("plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Aplikasi Laravel</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <!-- <h1 class="mb-4 text-center">Daftar Pengguna</h1> -->

        <!-- Flash Message -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Add Button -->

        <!-- Dealer Information -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead style="table-dark">
              <tr>

                <th>Username</th>
                <th>Departments</th>
                <th>Nama Project</th>
                <th>Link</th>
                <th>Keterangan</th>
                <th>Video Tutorial</th>
                <th>Status</th>
              </tr>
              </thead>
              <tbody>
                {{-- @php
                    $i = 1
                @endphp --}}

                @foreach ($project as $item)
                <tr>
                  <td>{{$item->users->username ?? 'Tidak ada'}}</td>
                  <td>{{$item->department->name_departments ?? 'Tidak ada'}}</td>
                  <td>{{$item->nama_project}}</td>
                  <td>
                    @if ($item->link)
                    <a href="{{ $item->link }}" target="_blank">Open Link</a>
                    @else
                        Kosong
                    @endif
                  </td>
                  <td>{{$item->keterangan}}</td>
                  <td>
                    @if ($item->video_tutorial)
                    <a href="{{ $item->video_tutorial}}" target="_blank">Open Video/PPT</a>
                    @else
                        Kosong
                    @endif
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="badge badge-status {{ $item->link ? 'badge-success' : 'badge-danger' }}" 
                            data-status="{{ $item->link ? 'aktif' : 'nonaktif' }}">
                          {{ $item->link ? 'Aktif' : 'Nonaktif' }}
                      </span>
                      
                  </div>
                  
                </td>
                
                </td>
                </tr>
                @endforeach
              </tbody>
              {{-- <tfoot>
              <tr>
                <th>Nama Project</th>
                <th>Link</th>
                <th>Keterangan</th>
                <th>Tugas Pending</th>
                
              </tr>
              </tfoot> --}}
            </table>
          </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
