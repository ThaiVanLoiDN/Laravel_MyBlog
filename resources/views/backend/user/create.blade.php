@extends('backend.layouts.master')
@section('main-content')
<section class="content-header">
    <h1>
        Quản trị viên
        <small>Thêm</small>
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
                <form method="POST" action="{{ route('backend.user.create') }}" accept-charset="UTF-8" id="user" enctype="multipart/form-data">
                	{{ csrf_field() }}

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="username">Tên đăng nhập:</label>
                            <input class="form-control" name="username" type="text" id="username">
                        </div>

                        <div class="col-sm-6">
                            <label for="fullname">Tên đầy đủ:</label>
                            <input class="form-control" name="fullname" type="text" id="fullname">
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="email">Email:</label>
                            <input class="form-control" name="email" type="email" id="email">
                        </div>
                        <div class="col-sm-6">
                            <label for="email">Cấp:</label>
                            <select class="form-control select2" style="width: 100%" name="role">
                                <option value="3">Admin</option>
                                <option value="2">Smod</option>
                                <option value="1">Mod</option>
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
                        </div>
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

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
  $('.select2').select2();
</script>
@stop