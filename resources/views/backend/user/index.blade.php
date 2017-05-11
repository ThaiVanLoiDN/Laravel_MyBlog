@extends('backend.layouts.master')
@section('main-content')
<section class="content-header">
    <h1 class="pull-left">
        Quản trị viên
        <small>Trang chủ</small>
    </h1>
    <h1 class="pull-right">
        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('backend.user.create') }}">Thêm</a>
    </h1>
</section>

<section class="content">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('success'))
                <div class="alert alert-success"><p><strong>{{ Session::get('success') }}</strong></p></div>
            @endif
            @if (Session::has('danger'))
                <div class="alert alert-danger"><p><strong>{{ Session::get('danger') }}</strong></p></div>
            @endif
            <div class="clearfix"></div>
            <div class="box box-primary">
                <div class="box-body table-responsive">
                    <table class="table table-responsive table-bordered" id="tours-table">
                        <thead>
                            <tr>
                                <th>Tên đăng nhập</th>
                                <th>Tên đầy đủ</th>
                                <th>Email</th>
                                <th>Cấp</th>
                                <th class="text-center hidden-sm hidden-xs">Hình ảnh</th>
                                <th class="text-center hidden-sm hidden-xs">Ngày tạo</th>
                                <th class="text-center" colspan="3">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listUser as $user)
                            <tr>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->fullname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @php
                                        switch ($user->role) {
                                            case '3':
                                                echo 'Admin';
                                                break;
                                            case '2':
                                                echo 'Smod';
                                                break;
                                            case '1':
                                                echo 'Mod';
                                                break;
                                            default:
                                                # code...
                                                break;
                                        }
                                    @endphp
                                </td>
                                <td class="text-center hidden-sm hidden-xs">
                                    @if ($user->image != '')
                                        <img id="image" src="{{ url('upload') . '/' . $user->image}}" alt="image"  class="img-responsive center-block" width="300px">
                                    @else
                                        Không có hình ảnh
                                    @endif
                                </td>
                                <td class="text-center hidden-sm hidden-xs">{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                                <td class="text-center" >
                                    <div class="btn-group" >
                                        <a href="{{ route('backend.user.show', $user->id) }}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>

                                        <a href="{{ route('backend.user.update', $user->id) }}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>

                                        <a href="{{ route('backend.user.destroy', $user->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="glyphicon glyphicon-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>
@stop