@extends('backend.layouts.master')
@section('main-content')
<section class="content-header">
    <h1>
        Dự án
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
                    <p>{{ $project->id }}</p>
                </div>

                <!-- Name Field -->
                <div class="form-group col-sm-6">
                    <label for="author">Tên:</label>
                    <p>{{ $project->name }}</p>
                </div>
                <div class="clearfix"></div>

                <!-- Image Field -->
                <div class="form-group col-sm-6">
                    <label for="image">Hình ảnh:</label>
                    @if ($project->image != '')
                    <p><img id="image" src="{{ url('upload') . '/' . $project->image}}" alt="avatar" class="img-responsive" ></p>
                    @else
                    <p>Không có hình ảnh</p>
                    @endif
                </div>
                <div class="clearfix"></div>

                <!-- Content Field -->
                <div class="form-group col-sm-6">
                    <label for="link">Link:</label>
                    <p>{{ $project->link }}</p>
                </div>

                <!-- Content Field -->
                <div class="form-group col-sm-6">
                    <label for="time">Thời gian:</label>
                    <p>{{ $project->time }}</p>
                </div>
                <div class="clearfix"></div>

                <!-- Created At Field -->
                <div class="form-group col-sm-6">
                    <label for="created_at">Ngày tạo:</label>
                    <p>{{ date('d-m-Y', strtotime($project->created_at)) }}</p>
                </div>

                <!-- Updated At Field -->
                <div class="form-group col-sm-6">
                    <label for="updated_at">Ngày sửa:</label>
                    <p>{{ date('d-m-Y', strtotime($project->updated_at)) }}</p>
                </div>
                <div class="clearfix"></div>

                <div class="col-sm-12">
                    <a href="{{ route('backend.project.index') }}" class="btn btn-default">Quay về</a>
                </div>
            </div>
        </div>
    </div>

</section>
@stop