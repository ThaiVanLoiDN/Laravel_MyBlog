@extends('backend.layouts.master')
@section('main-content')
<section class="content-header">
    <h1>
        Link
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
                    <p>{{ $info->id }}</p>
                </div>
                <div class="clearfix"></div>

                <!-- Name Field -->
                <div class="form-group col-sm-6">
                    <label for="name">Tên:</label>
                    <p>{{ $info->name }}</p>
                </div>

                <!-- Name Field -->
                <div class="form-group col-sm-6">
                    <label for="value">Link:</label>
                    <p>{{ $info->value }}</p>
                </div>
                <div class="clearfix"></div>

                <!-- Created At Field -->
                <div class="form-group col-sm-6">
                    <label for="created_at">Ngày tạo:</label>
                    <p>{{ date('d-m-Y', strtotime($info->created_at)) }}</p>
                </div>

                <!-- Updated At Field -->
                <div class="form-group col-sm-6">
                    <label for="updated_at">Ngày sửa:</label>
                    <p>{{ date('d-m-Y', strtotime($info->updated_at)) }}</p>
                </div>

                <div class="col-sm-12">
                    <a href="{{ route('backend.info.index') }}" class="btn btn-default">Quay về</a>
                </div>
            </div>
        </div>
    </div>

</section>
@stop