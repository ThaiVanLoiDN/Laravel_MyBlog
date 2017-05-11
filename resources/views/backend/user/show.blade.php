@extends('backend.layouts.master')
@section('main-content')
<section class="content-header">
    <h1>
        Quản trị viên
        <small>Thông tin</small>
    </h1>
</section>

<section class="content">

    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <!-- Id Field -->
                <div class="form-group col-sm-6">
                    <label for="id">Id:</label>
                    <p>{{ $user->id }}</p>
                </div>

                <!-- Name Field -->
                <div class="form-group col-sm-6">
                    <label for="author">Tên đăng nhập:</label>
                    <p>{{ $user->username }}</p>
                </div>
                <div class="clearfix"></div>
				
				<!-- Fullname Field -->
                <div class="form-group col-sm-6">
                    <label for="fullname">Tên đầy đủ:</label>
                    <p>{{ $user->fullname }}</p>
                </div>

                <!-- Role Field -->
                <div class="form-group col-sm-6">
                    <label for="role">Cấp bậc:</label>
                    <p>
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
					</p>
                </div>
                <div class="clearfix"></div>
				
				<!-- Email Field -->
                <div class="form-group col-sm-12">
                    <label for="email">Email:</label>
                    <p>{{ $user->email }}</p>
                </div>
                <div class="clearfix"></div>

                <!-- Image Field -->
                <div class="form-group col-sm-6">
                    <label for="image">Hình ảnh:</label>
                    @if ($user->image != '')
                    <p><img id="image" src="{{ url('upload') . '/' . $user->image}}" alt="avatar" class="img-responsive" ></p>
                    @else
                    <p>Không có hình ảnh</p>
                    @endif
                </div>
                <div class="clearfix"></div>

                <!-- Created At Field -->
                <div class="form-group col-sm-6">
                    <label for="created_at">Ngày tạo:</label>
                    <p>{{ date('d-m-Y', strtotime($user->created_at)) }}</p>
                </div>

                <!-- Updated At Field -->
                <div class="form-group col-sm-6">
                    <label for="updated_at">Ngày sửa:</label>
                    <p>{{ date('d-m-Y', strtotime($user->updated_at)) }}</p>
                </div>
                <div class="clearfix"></div>

                <div class="col-sm-12">
                    <a href="{{ route('backend.user.index') }}" class="btn btn-default">Quay về</a>
                </div>
            </div>
        </div>
    </div>

</section>
@stop