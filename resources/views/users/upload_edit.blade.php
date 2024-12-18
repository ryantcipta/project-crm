<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Project</title>

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
    .btn-success {
      background: #28a745;
      border: none;
      transition: background 0.3s;
    }
    .btn-success:hover {
      background: #218838;
    }
    footer {
      margin-top: auto;
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
      <h1 class="mb-4 text-center text-primary">Edit Project</h1>

      <!-- Notifikasi Error -->
      @if ($errors->any())
        <div class="alert alert-danger">
          <strong>Error!</strong>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- Notifikasi Sukses -->
      @if ($sukses = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ $sukses }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      <!-- Form -->
      <form action="{{ route('project.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="nama_project" class="form-label">Nama Project</label>
          <input value="{{ old('nama_project', $project->nama_project) }}" type="text" id="nama_project" class="form-control" placeholder="Masukkan Nama Project" name="nama_project">
        </div>

        <div class="mb-3">
          <label for="keterangan" class="form-label">Keterangan</label>
          <textarea id="keterangan" class="form-control" rows="3" placeholder="Masukkan Keterangan" name="keterangan">{{ old('keterangan', $project->keterangan) }}</textarea>
        </div>

        <div class="mb-3">
          <label for="departments" class="form-label">Departments</label>
          <select id="departments" class="form-control" name="department_id">
            <option selected disabled>Pilih Departments</option>
            @foreach ($departments as $item)
              <option value="{{ $item->id }}" {{ $item->id == $project->department_id ? 'selected' : '' }}>
                {{ $item->name_departments }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="link" class="form-label">Link</label>
          <input value="{{ old('link', $project->link) }}" type="url" id="link" class="form-control" placeholder="Masukkan Link Project" name="link">
        </div>

        <div class="mb-3">
          <label for="video_tutorial" class="form-label">Video Tutorial (Link)</label>
          <input value="{{ old('video_tutorial', $project->video_tutorial) }}" type="url" id="video_tutorial" class="form-control" placeholder="Masukkan Link Video Tutorial" name="video_tutorial">
        </div>

        <div class="d-grid gap-2">
          <a href="{{ route('users.home') }}" class="btn btn-secondary">Cancel</a>
          <button type="submit" class="btn btn-success">Update Project</button>
        </div>
      </form>
    </div>
  </div>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
