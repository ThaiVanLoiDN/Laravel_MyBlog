@extends('backend.layouts.master')
@section('main-content')
<section class="content-header">
    <h1>
        Slider
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
                    <p>{{ $slider->id }}</p>
                </div>

                <!-- Name Field -->
                <div class="form-group col-sm-6">
                    <label for="author">Tên:</label>
                    <p>{{ $slider->name }}</p>
                </div>
                <div class="clearfix"></div>

                <!-- Image Field -->
                <div class="form-group col-sm-6">
                    <label for="image">Hình ảnh:</label>
                    @if ($slider->image != '')
                    <p><img id="image" src="{{ url('upload') . '/' . $slider->image}}" alt="avatar" class="img-responsive" ></p>
                    @else
                    <p>Không có hình ảnh</p>
                    @endif
                </div>
                <div class="clearfix"></div>

                <!-- Content Field -->
                <div class="form-group col-sm-12">
                    <label for="link">Link:</label>
                    <p>{{ $slider->link }}</p>
                </div>
                <div class="clearfix"></div>

                <!-- Created At Field -->
                <div class="form-group col-sm-6">
                    <label for="created_at">Ngày tạo:</label>
                    <p>{{ date('d-m-Y', strtotime($slider->created_at)) }}</p>
                </div>

                <!-- Updated At Field -->
                <div class="form-group col-sm-6">
                    <label for="updated_at">Ngày sửa:</label>
                    <p>{{ date('d-m-Y', strtotime($slider->updated_at)) }}</p>
                </div>
                <div class="clearfix"></div>

                <div class="col-sm-12">
                    <a href="{{ route('backend.slider.index') }}" class="btn btn-default">Quay về</a>
                </div>
            </div>
        </div>
    </div>

</section>
@stop