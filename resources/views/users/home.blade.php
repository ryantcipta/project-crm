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
                                <span class="badge badge-status {{ $item->link ? 'badge-success' : 'badge-danger' }}" 
                                      data-status="{{ $item->link ? 'aktif' : 'nonaktif' }}">
                                    {{ $item->link ? 'Aktif' : 'Nonaktif' }}
                                </span>
                                
                                <button type="button" class="btn btn-sm btn-warning toggle-status" style="margin-left: 10px;">
                                    {{ $item->link ? 'Nonaktifkan' : 'Aktifkan' }}
                                </button>
                                
                                <a href="{{route('project.edit', $item->id)}}" class="btn btn-sm btn-primary" title="Edit" style="margin-left: 10px;">
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

    <script>
        // Handle toggle button click
        document.querySelectorAll('.toggle-status').forEach(button => {
            button.addEventListener('click', function() {
                var row = this.closest('tr');
                var projectId = row.getAttribute('data-id');
                var currentStatus = row.querySelector('.badge-status').dataset.status;
                var newStatus = (currentStatus === 'aktif') ? 'nonaktif' : 'aktif';
                
                // Send AJAX request to toggle the status
                fetch(`/project/${projectId}/toggle-status`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        status: newStatus
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // Update the badge and button text
                    if (data.status === 'aktif') {
                        row.querySelector('.badge-status').classList.replace('badge-danger', 'badge-success');
                        row.querySelector('.badge-status').textContent = 'Aktif';
                        row.querySelector('.toggle-status').textContent = 'Nonaktifkan';
                    } else {
                        row.querySelector('.badge-status').classList.replace('badge-success', 'badge-danger');
                        row.querySelector('.badge-status').textContent = 'Nonaktif';
                        row.querySelector('.toggle-status').textContent = 'Aktifkan';
                    }
                })
                .catch(error => console.error('Error toggling status:', error));
            });
        });
    </script>
</body>
</html>
