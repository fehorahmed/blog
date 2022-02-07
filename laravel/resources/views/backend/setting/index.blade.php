@extends('backend.layout.main')
@section('content')
    <div id="layoutSidenav_content">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Setting</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>


            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i> Update Setting
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        @if ($errors)
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach
                        @endif

                        @if (Session::has('message'))
                            <p class="alert alert-info">{{ session('message') }}</p>
                        @endif

                        <form method="post" action="{{ route('admin.setting') }}" enctype="multipart/form-data">
                            @csrf
                            <table class="table table-bordered">
                                <tr>
                                    <th>Comment Auto Approve</th>
                                    <td><input type="number" value="{{isset($data->comment_a_a) ? $data->comment_a_a : ''}}"  name="comment_a_a"
                                            class="form-control" /></td>
                                </tr>

                                <tr>
                                    <th>User Auto Approve</th>
                                    <td><input type="number" value="{{ isset($data->user_a_a) ? $data->user_a_a : '' }}" name="user_a_a" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <th>Recent Post Limit</th>
                                    <td><input type="number" value="{{ isset($data->recent_p_l) ? $data->recent_p_l : '' }}" name="recent_p_l" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <th>Popular Post Limit</th>
                                    <td><input type="number" value="{{ isset($data->popular_p_l) ? $data->popular_p_l : '' }}" name="popular_p_l" class="form-control"/></td>
                                </tr>
                                <tr>
                                    <th>Recent Comment Limit</th>
                                    <td><input type="number" value="{{ isset($data->recent_c_l) ? $data->recent_c_l : '' }}" name="recent_c_l" class="form-control"/></td>
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

            </div>

        </div>
        <!-- /.container-fluid -->
    @endsection
