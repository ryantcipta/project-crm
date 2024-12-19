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
    <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Dashboard Users</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <!-- Tombol Home -->
        <div class="mb-3 text-start">
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Home</a>
        </div>

        <!-- Dealer Information -->
        <div class="mb-4">
            <strong>Kode Dealer: </strong> {{ Auth::user()->kode_dealer }}<br>
            <strong>Nama Dealer: </strong> {{ Auth::user()->nama_dealer }}
        </div>

        <!-- Tombol Tambah Project -->
        <div class="mb-3 text-end">
            <a href="{{ route('projects.create') }}" class="btn btn-primary">Tambah Project</a>
        </div>

        <!-- Tabel Data -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead style="table-dark">
                    <tr>
                        <th>Departments</th>
                        <th>Nama Project</th>
                        <th>Link</th>
                        <th>Keterangan</th>
                        <th>Video Tutorial</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project as $item)
                    <tr data-id="{{ $item->id }}">
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
                                <!-- Tombol Status -->
                                <button class="btn toggle-status" 
                                        data-id="{{ $item->id }}" 
                                        data-status="{{ $item->status_link }}" 
                                        style="margin-left: 10px; background-color: {{ $item->status_link === 'aktif' ? 'green' : 'red' }}; color: white; width: 100px;">
                                    {{ ucfirst($item->status_link) }}
                                </button>
                        
                                <!-- Tombol Edit -->
                                <a href="{{route('projects.edit', $item->id)}}" 
                                   class="btn btn-primary ms-2" 
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
      $(document).on('click', '.toggle-status', function () {
    const button = $(this);
    const projectId = button.data('id');

    $.ajax({
        url: `/projects/${projectId}/toggle-status`,
        type: 'PATCH',
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        success: function (response) {
            if (response.status_link) {
                // Update button UI
                const newStatus = response.status_link;
                button.data('status', newStatus);
                button.text(newStatus.charAt(0).toUpperCase() + newStatus.slice(1));
                button.css('background-color', newStatus === 'aktif' ? 'green' : 'red');
            } else {
                alert('Gagal mendapatkan status baru');
            }
        },
        error: function (xhr) {
            console.error(xhr.responseText);
            alert('Gagal mengubah status');
        }
    });
});


    </script>
    
  
</body>
</html>
