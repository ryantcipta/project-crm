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
            <a class="navbar-brand" href="#">Aplikasi Laravel</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="form-container mx-auto" style="max-width: 600px;">
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
                <div class="mb-3">
                    <label for="departemen" class="form-label">Departemen</label>
                    <select name="departemen" id="departemen" class="form-select" required>
                        <option value="" disabled selected>Pilih Departemen</option>
                        <option value="Marketing (H1)">Marketing (H1)</option>
                        <option value="HC3">HC3</option>
                        <option value="TSD (H2)">TSD (H2)</option>
                        <option value="Sparepart (H2)">Sparepart (H2)</option>
                        <option value="Administrasi & Finance">Administrasi & Finance</option>
                        <option value="Retail">Retail</option>
                        <option value="Dealer/SO">Dealer/SO</option>
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

                <div class="mb-3">
                <label for="must_login" class="form-label">Harus Login</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"
                    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="must_login" id="must_login_yes" value="1" onclick="showLoginFields()">
    <label class="form-check-label" for="must_login_yes">Ya</label>
</div>
<div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="must_login" id="must_login_no" value="0" onclick="hideLoginFields()">
    <label class="form-check-label" for="must_login_no">Tidak</label>
</div>

<div id="login-fields" style="display: none;">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password">
    </div>
</div>

<button type="submit" class="btn btn-primary w-100">Upload Project</button>
</form>
</div>
</div>

<!-- Footer -->
<footer>
    &copy; 2024 Aplikasi Laravel. All Rights Reserved.
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