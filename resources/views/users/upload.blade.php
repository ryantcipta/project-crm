<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-container {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        }
        .btn-primary {
            background: #007bff;
            border: none;
            transition: background 0.3s;
        }
        .btn-primary:hover {
            background: #0056b3;
        }
        footer {
            margin-top: 5rem;
            padding: 1rem;
            text-align: center;
            background: #343a40;
            color: #fff;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Dashboard Users</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="form-container mx-auto" style="max-width: 600px;">
            <!-- Tombol Home -->
            <div class="mb-3 text-start">
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Home</a>
            </div>

            <h1 class="mb-4 text-center text-primary">Upload Project</h1>

            <!-- Flash Message -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                <!-- Departemen Label -->
                <div class="mb-3">
                    <label for="departemen" class="form-label">Departemen</label>
                    <select id="departments" class="form-control custom-select" name="department_id">
                        <option selected disabled>Pilih Departments</option>
                        @foreach ($departments as $item)
                        <option value="{{$item->id}}">{{$item->name_departments}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nama_project" class="form-label">Nama Project</label>
                    <input type="text" name="nama_project" id="nama_project" class="form-control" placeholder="Masukkan nama project" required>
                </div>

                <div class="mb-3">
                    <label for="link" class="form-label">Link</label>
                    <input type="url" name="link" id="link" class="form-control" placeholder="Masukkan link project">
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" rows="3" placeholder="Masukkan keterangan project"></textarea>
                </div>

                <div class="mb-3">
                    <label for="video_tutorial" class="form-label">Video Tutorial (Link)</label>
                    <input type="url" name="video_tutorial" id="video_tutorial" class="form-control" placeholder="Masukkan link video tutorial">
                </div>

                <button type="submit" class="btn btn-primary w-100">Upload Project</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        &copy; 2024 CRM
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function showLoginFields() {
            document.getElementById("login-fields").style.display = "block";
        }

        function hideLoginFields() {
            document.getElementById("login-fields").style.display = "none";
        }
    </script>

</body>
</html>
