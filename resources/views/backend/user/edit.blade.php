@extends('backend.layouts.master')
@section('main-content')
<section class="content-header">
    <h1>
        Quản trị viên
        <small>Sửa</small>
    </h1>
</section>

<section class="content">
    @if (count($errors) > 0)
        <ul class="alert alert-danger" style="list-style-type: none">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="box box-primary">

        <div class="box-body">
            <div class="row">
                <form method="post" action="{{ route('backend.user.update', $user->id) }}" accept-charset="UTF-8" id="userEdit" enctype="multipart/form-data">
                	{{ csrf_field() }}

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="username">Tên đăng nhập:</label>
                            <input class="form-control" name="username" type="text" id="username" value="{{ $user->username }}" @if (Auth::user()->role == 2) readonly @endif >
                        </div>

                        <div class="col-sm-6">
                            <label for="fullname">Tên đầy đủ:</label>
                            <input class="form-control" name="fullname" type="text" id="fullname" value="{{ $user->fullname }}">
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="email">Email:</label>
                            <input class="form-control" name="email" type="email" id="email" value="{{ $user->email }}">
                        </div>
                        <div class="col-sm-6">
                            <label for="email">Cấp:</label>
                            <select class="form-control select2" style="width: 100%" name="role" @if (Auth::user()->role == 2) disabled @endif >
                                <option value="3" @if ($user->role == 3) @php echo 'selected' @endphp @endif>Admin</option>
                                <option value="2" @if ($user->role == 2) @php echo 'selected' @endphp @endif>Smod</option>
                                <option value="1" @if ($user->role == 1) @php echo 'selected' @endphp @endif>Mod</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="password">Mật khẩu:</label>
                            <input class="form-control" name="password" type="password" id="password">
                        </div>
                        <div class="col-sm-6">
                            <label for="repassword">Nhập lại mật khẩu:</label>
                            <input class="form-control" name="repassword" type="password" id="repassword">
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="image">Hình ảnh</label>
                            <input type="file" id="image" name="image" />
                            <br>
                            @if ($user->image != '')
                            <p><img id="image" src="{{ url('upload') . '/' . $user->image}}" alt="avatar" class="img-responsive" ></p>
                            @else
                            <p>Không có hình ảnh</p>
                            @endif
                        </div>
                        @if ($user->image != '')
                            {{-- expr --}}
                        <div class="col-md-6">
                            <label for="delete_picture">Xóa hình ảnh</label>
                            <p><input type="checkbox" id="delete_picture" name="delete_picture">Xóa</p>
                        </div>
                        @endif
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-group">
                        <!-- Submit Field -->
                        <div class="col-sm-12">
                            <input class="btn btn-primary" type="submit" value="Lưu">
                            <a href="{{ route('backend.user.index') }}" class="btn btn-default">Quay về</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@stop