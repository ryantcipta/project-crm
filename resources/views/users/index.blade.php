<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
        <h1 class="mb-4 text-center">Daftar Pengguna</h1>

        <!-- Flash Message -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Add Button -->
        <div class="mb-3 text-end">
            <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah Pengguna</a>
        </div>

        <!-- Table -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Departemen</th>
                    <th>Nama Project</th>
                    <th>Link</th>
                    <th>Keterangan</th>
                    <th>Video Tutorial</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @isset($users)
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->departemen }}</td>
                            <td>{{ $user->nama_project }}</td>
                            <td>
                                <a href="{{ $user->link }}" target="_blank" class="text-decoration-none">{{ $user->link }}</a>
                            </td>
                            <td>{{ $user->keterangan }}</td>
                            <td>
                                @if($user->video_tutorial)
                                    <a href="{{ $user->video_tutorial }}" target="_blank" class="btn btn-sm btn-info">Lihat Video</a>
                                @else
                                    <span class="text-muted">Tidak tersedia</span>
                                @endif
                            </td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <!-- Delete Button -->
                                @if(!empty($user->id))
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus pengguna ini?')">Hapus</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data pengguna.</td>
                        </tr>
                    @endforelse
                @else
                    <tr>
                        <td colspan="7" class="text-center">Data tidak tersedia.</td>
                    </tr>
                @endisset
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
