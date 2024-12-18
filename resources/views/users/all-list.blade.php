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
    <link rel="stylesheet" href="{{url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Dashboard Users</a>
            <!-- Add Home Button -->
           
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <!-- Flash Message -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Add Home Button Above Table -->
        <div class="mb-3">
            <a href="/" class="btn btn-primary">Home</a>
        </div>

        <!-- Dealer Information -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Departments</th>
                        <th>Nama Project</th>
                        <th>Link</th>
                        <th>Keterangan</th>
                        <th>Video Tutorial</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project as $item)
                    <tr data-id="{{ $item->id }}">
                        <td>{{$item->user->username ?? 'Tidak ada'}}</td>
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
                            <span class="badge badge-status {{ $item->link ? 'badge-success' : 'badge-danger' }}" 
                                  data-status="{{ $item->link ? 'aktif' : 'nonaktif' }}">
                                {{ $item->link ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-warning toggle-status" data-id="{{ $item->id }}">
                                {{ $item->link ? 'Nonaktifkan' : 'Aktifkan' }}
                            </button>
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
                var projectId = this.getAttribute('data-id');
                var row = this.closest('tr');
                var currentStatus = row.querySelector('.badge-status').dataset.status;
                var newStatus = (currentStatus === 'aktif') ? 'nonaktif' : 'aktif';

                // Send AJAX request to toggle the status
                fetch(`/project/${projectId}/toggle-status`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ status: newStatus })
                })
                .then(response => response.json())
                .then(data => {
                    // Update the badge and button text based on the new status
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
