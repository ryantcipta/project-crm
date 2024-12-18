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
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">List Upload</li>
            </ol>
        </div>
        
        </div>
      </div><!-- /.container-fluid -->
    </section>

 

    <!-- Main content -->
    <section class="content">
      {{-- notifikasi sukses --}}
     @if ($sukses = Session::get('success'))
     <div class="alert alert-success alert-block">
       <button type="button" class="close" data-dismiss="alert">×</button>
       <strong>{{ $sukses }}</strong>
     </div>
     @endif
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
                    <th>Username</th>
                    <th>Departments</th>
                    <th>Nama Project</th>
                    <th>Link</th>
                    <th>Keterangan</th>
                    <th>Video Tutorial</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    {{-- @php
                        $i = 1
                    @endphp --}}

                    @foreach ($project as $item)
                    <tr>
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
                    
                    </td>
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