@extends('backend.layouts.master')
@section('main-content')
<section class="content-header">
    <h1>
        Dự án
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
                <form method="POST" action="{{ route('backend.project.create') }}" accept-charset="UTF-8" id="project" enctype="multipart/form-data">
                	{{ csrf_field() }}

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="name">Dự án:</label>
                            <input class="form-control" name="name" type="text" id="name">
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="link">Link:</label>
                            <input class="form-control" name="link" type="text" id="link">
                        </div>
                        <div class="col-sm-6">
                            <label for="time">Thời gian:</label>
                            <input class="form-control" name="time" type="text" id="time">
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
                        <div class="col-sm-12">
                            <label for="description">Mô tả:</label>
                            <textarea class="form-control" name="description" rows="3" id="description"></textarea>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-group">
                        <!-- Submit Field -->
                        <div class="col-sm-12">
                            <input class="btn btn-primary" type="submit" value="Lưu">
                            <a href="{{ route('backend.project.index') }}" class="btn btn-default">Quay về</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@stop