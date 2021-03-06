@extends('backend.layout.main')
@section('content')
        <div id="layoutSidenav_content">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Overview</li>
                </ol>


                <!-- DataTables Example -->
                <div class="card mb-3">
                  <div class="card-header">
                    <i class="fas fa-table"></i> Add Category
                    <a href="{{url('admin/category')}}" class="float-end btn btn-sm btn-dark">All Data</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">

                      @if($errors)
                        @foreach($errors->all() as $error)
                          <p class="alert alert-danger">{{$error}}</p>
                        @endforeach
                      @endif

                      @if(Session::has('message'))
                      <p class="alert alert-info">{{session('message')}}</p>
                      @endif

                      <form method="post" action="{{url('admin/category')}}" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-bordered">
                            <tr>
                                <th>Title</th>
                                <td><input type="text" value="{{old('title')}}" name="title" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Detail</th>
                                <td><input type="text" value="{{old('detail')}}" name="detail" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td><input type="file" name="image" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" class="btn btn-primary" />
                                </td>
                            </tr>
                        </table>
                      </form>
                    </div>
                  </div>
                  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>

              </div>
              <!-- /.container-fluid -->
@endsection
