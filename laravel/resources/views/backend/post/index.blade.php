@extends('backend.layout.main')
@section('content')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Post</h2>

                    @if(session('message'))
                        <p class="alert alert-danger">{{session('message')}}</p>
                    @endif



                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i> DataTable Example
                            <a href="{{url('admin/post/create')}}" class="float-end btn btn-sm btn-dark">Add Data</a>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Thumb Image</th>
                                        <th>Full Image</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Thumb Image</th>
                                        <th>Full Image</th>

                                        <th>Action</th>

                                    </tr>
                                </tfoot>
                                <tbody>

                                    @foreach ($datas as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->cat_id}}</td>
                                        <td>{{$data->title}}</td>
                                        <td><img src="{{asset('images/post/thumb')."/".$data->thumb}}" alt="" width="50"></td>
                                        <td><img src="{{asset('images/post')."/".$data->full_img}}" width="50" alt=""></td>
                                        <td>
                                            <a class="btn btn-info"href="{{url('admin/post/'.$data->id.'/edit')}}">Edit</a>
                                            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')"href="{{url('admin/post/'.$data->id.'/delete')}}">Delete</a>
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
