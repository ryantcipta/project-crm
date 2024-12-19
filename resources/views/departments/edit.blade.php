@extends('layout.app')

@section('title','Edit Departments')
    

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Departments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Departments</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

       
    <!-- Main content -->
    <section class="content">
        <form action="{{route("update.departments",$departments->id)}}" method="POST">
          @csrf
          @method('PUT')
 
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Departments</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="name_departments">Nama Departments</label>
                <input value="{{old('name_departments', $departments->name_departments)}}" type="text" id="name_departments" class="form-control"placeholder="Masukkan Nama Departments" name="name_departments">
              </div>
            </div>
           
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="{{route('departments')}}" class="btn btn-secondary" style="margin-right: 10px">Cancel</a>
          <input type="submit" value="Update" class="btn btn-success">
        </div>
      </div>
    </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection