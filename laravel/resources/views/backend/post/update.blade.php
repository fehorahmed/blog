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
                    <i class="fas fa-table"></i> Update Post
                    <a href="{{ url('admin/post') }}" class="float-end btn btn-sm btn-dark">All Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        @if ($errors)
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach
                        @endif

                        @if (Session::has('message'))
                            <p class="text-success">{{ session('message') }}</p>
                        @endif

                        <form method="post" action="{{ url('admin/post/' . $data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <table class="table table-bordered">
                                <tr>
                                    <th>Category</th>
                                    <td> <select name="cat_id" class="form-control" id="">
                                            <option value="">select one</option>
                                            @foreach ($cats as $cat)
                                                @if ($cat->id == $data->cat_id)
                                                    <option selected value="{{ $cat->id }}">{{ $cat->title }}
                                                    </option>
                                                @else
                                                    <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <td><input type="text" value="{{ old('title',$data->title) }}" name="title"
                                            class="form-control" /></td>
                                </tr>

                                <tr>
                                    <th>Thumb Image</th>
                                    <td>
                                        <img src="{{asset('images/post/thumb')."/".$data->thumb}}" alt="" width="50">
                                        <input type="file" name="thumb" value="{{$data->thumb}}" class="form-control" />
                                        <input type="hidden" value="{{$data->thumb}}" name="thumb_image" class="form-control" />
                                    </td>
                                </tr>
                                <tr>
                                    <th>Full Image</th>
                                    <td>
                                        <img src="{{asset('images/post')."/".$data->full_img}}" alt="" width="50">
                                        <input type="file" name="full_img" value="{{$data->full_img}}" class="form-control" />
                                        <input type="hidden" name="full_image" value="{{$data->full_img}}" class="form-control" />
                                    </td>
                                </tr>
                                <tr>
                                    <th>Detail</th>
                                    <td><textarea name="detail" class="form-control" id="" cols="" rows="">{{old('detail',$data->detail)}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tags </th>
                                    <td><textarea name="tags" class="form-control" id="" cols="" rows="">{{old('tags',$data->tags)}}</textarea></td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <input type="submit" class="btn btn-primary" value="Update" />
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
