@extends('layout.app')

@section('title','Upload')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Upload Project</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Upload Projects</li>
            </ol>
        </div>
        
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{route("project.store")}}" method="POST">
          @csrf

          {{-- notifikasi error --}}
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

          {{-- notifikasi sukses --}}
        @if ($sukses = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $sukses }}</strong>
        </div>
        @endif

        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Input Project</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="nama_project">Nama Project</label>
                  <input type="text" id="nama_project" class="form-control" placeholder="Masukkan Nama Project" name="nama_project">
                </div>
                <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <textarea id="keterangan" class="form-control" rows="4" placeholder="Masukkan Keterangan" name="keterangan"></textarea>
                </div>
                <div class="form-group">
                  <label for="departments">Departments</label>
                  <select id="departments" class="form-control custom-select" name="department_id">
                    <option selected disabled>Pilih Departments</option>
                    @foreach ($departments as $item)
                    <option value="{{$item->id}}">{{$item->name_departments}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="link">Link</label>
                  <input type="url" id="link" class="form-control" placeholder="Masukkan Link Project" name="link">
                </div>
                <div class="form-group">
                  <label for="video_tutorial">Video Tutorial (Link)</label>
                  <input type="url" id="video_tutorial" class="form-control" placeholder="Masukkan Link Video Tutorial" name="video_tutorial">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <a href="{{ url()->previous() }}" class="btn btn-secondary" style="margin-right: 10px;">Cancel</a>
            <input type="submit" value="Submit" class="btn btn-success">
          </div>
        </div>

      </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
