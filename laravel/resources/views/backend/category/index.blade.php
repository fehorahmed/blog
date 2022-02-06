@extends('backend.layout.main')
@section('content')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Category</h2>

                    @if(session('message'))
                        <p class="alert alert-danger">{{session('message')}}</p>
                    @endif



                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i> DataTable Example
                            <a href="{{url('admin/category/create')}}" class="float-end btn btn-sm btn-dark">Add Data</a>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Detail</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Detail</th>
                                        <th>Image</th>
                                        <th>Action</th>

                                    </tr>
                                </tfoot>
                                <tbody>

                                    @foreach ($datas as $data)
                                    <tr>
                                        <td>{{$data->title}}</td>
                                        <td>{{$data->detail}}</td>
                                        <td><img src="{{asset('/images/category')."/".$data->image}}" width="50" alt=""></td>
                                        <td>
                                            <a class="btn btn-info"href="{{url('admin/category/'.$data->id.'/edit')}}">Edit</a>
                                            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')"href="{{url('admin/category/'.$data->id.'/delete')}}">Delete</a>
                                        </td>
                                    </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
     @endsection
