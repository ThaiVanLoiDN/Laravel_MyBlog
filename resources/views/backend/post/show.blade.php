@extends('backend.layouts.master')
@section('main-content')
<section class="content-header">
    <h1>
        Bài viết
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
                    <p>{{ $post->id }}</p>
                </div>
                <div class="clearfix"></div>

                <!-- Id Field -->
                <div class="form-group col-sm-6">
                    <label for="read_count">Lượt đọc:</label>
                    <p>{{ $post->read_count }}</p>
                </div>

                <!-- Id Field -->
                <div class="form-group col-sm-6">
                    <label for="id">Tiêu đề:</label>
                    <p>{{ $post->title }}</p>
                </div>
                <div class="clearfix"></div>

                <!-- Name Field -->
                <div class="form-group col-sm-6">
                    <label for="category">Chuyên mục:</label>
                    <p>{{ $post->category->name }}</p>
                </div>

                <!-- Name Field -->
                <div class="form-group col-sm-6">
                    <label for="user">Người đăng:</label>
                    <p>{{ $post->user->fullname }}</p>
                </div>
                <div class="clearfix"></div>

                <!-- Image Field -->
                <div class="form-group col-sm-6">
                    <label for="image">Hình ảnh:</label>
                    @if ($post->image != '')
                    <p><img id="image" src="{{ url('upload') . '/' . $post->image}}" alt="avatar" class="img-responsive" ></p>
                    @else
                    <p>Không có hình ảnh</p>
                    @endif
                </div>
                <div class="clearfix"></div>

                <!-- Content Field -->
                <div class="form-group col-sm-12">
                    <label for="description">Mô tả:</label>
                    <p>{!! $post->description !!}</p>
                </div>
                <div class="clearfix"></div>

                <!-- Content Field -->
                <div class="form-group col-sm-12">
                    <label for="content">Nội dung:</label>
                    <div class="content thumbnail">{!! $post->content !!}</div>
                </div>
                <div class="clearfix"></div>

                <!-- Created At Field -->
                <div class="form-group col-sm-6">
                    <label for="created_at">Ngày tạo:</label>
                    <p>{{ date('d-m-Y', strtotime($post->created_at)) }}</p>
                </div>

                <!-- Updated At Field -->
                <div class="form-group col-sm-6">
                    <label for="updated_at">Ngày sửa:</label>
                    <p>{{ date('d-m-Y', strtotime($post->updated_at)) }}</p>
                </div>
                <div class="clearfix"></div>

                <div class="col-sm-12">
                    <a href="{{ route('backend.post.index') }}" class="btn btn-default">Quay về</a>
                </div>
            </div>
        </div>
    </div>

</section>
@stop

@section('css')
<style type="text/css">
    div.form-group > div.content img{
    display: block;
    max-width: 100%;
    height: auto;
    width: 100%;
}
</style>
@stop