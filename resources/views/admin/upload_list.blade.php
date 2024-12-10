@extends('layout.app')

@section('title','List Upload')

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Upload</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Upload</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Project</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama Project</th>
                    <th>Link</th>
                    <th>Keterangan</th>
                    <th>Tugas Pending</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    {{-- @php
                        $i = 1
                    @endphp --}}

                    @foreach ($project as $item)
                    <tr>
                      <td>{{$item->nama_project}}</td>
                      <td>{{$item->link}}</td>
                      <td>{{$item->keterangan}}</td>
                      <td>{{$item->tugas_pending}}</td>
                     
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection