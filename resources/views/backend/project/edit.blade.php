@extends('backend.layouts.master')
@section('main-content')
<section class="content-header">
    <h1>
        Dự án
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
                <form method="post" action="{{ route('backend.project.update', $project->id) }}" accept-charset="UTF-8" id="project" enctype="multipart/form-data">
                	{{ csrf_field() }}

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="name">Dự án:</label>
                            <input class="form-control" name="name" value="{{ $project->name }}" type="text" id="name">
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="link">Link:</label>
                            <input class="form-control" name="link" value="{{ $project->link }}" type="text" id="link">
                        </div>
                        <div class="col-sm-6">
                            <label for="time">Thời gian:</label>
                            <input class="form-control" name="time" value="{{ $project->time }}" type="text" id="time">
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="image">Hình ảnh</label>
                            <input type="file" id="image" name="image" />
                            <br>
                            @if ($project->image != '')
                            <p><img id="image" src="{{ url('upload') . '/' . $project->image}}" alt="avatar" class="img-responsive" ></p>
                            @else
                            <p>Không có hình ảnh</p>
                            @endif
                        </div>
                        @if ($project->image != '')
                            {{-- expr --}}
                        <div class="col-md-6">
                            <label for="delete_picture">Xóa hình ảnh</label>
                            <p><input type="checkbox" id="delete_picture" name="delete_picture">Xóa</p>
                        </div>
                        @endif
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="description">Mô tả:</label>
                            <textarea class="form-control" name="description" rows="3" id="description">{{ $project->description }}</textarea>
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
                </form>
            </div>
        </div>
    </div>
</section>
@stop