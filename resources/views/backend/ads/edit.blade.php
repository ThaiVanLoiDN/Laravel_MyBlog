@extends('backend.layouts.master')
@section('main-content')
<section class="content-header">
    <h1>
        Quảng cáo
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
                <form method="post" action="{{ route('backend.ads.update', $ads->id) }}" accept-charset="UTF-8" id="ads" enctype="multipart/form-data">
                	{{ csrf_field() }}

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="name">Tên:</label>
                            <input class="form-control" name="name" value="{{ $ads->name }}" type="text" id="name">
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="link">Link:</label>
                            <input class="form-control" name="link" type="text" id="link" value="{{ $ads->link }}">
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="image">Hình ảnh</label>
                            <input type="file" id="image" name="image" />
                            <br>
                            @if ($ads->image != '')
                            <p><img id="image" src="{{ url('upload') . '/' . $ads->image}}" alt="avatar" class="img-responsive" ></p>
                            @else
                            <p>Không có hình ảnh</p>
                            @endif
                        </div>
                        @if ($ads->image != '')
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
                            <a href="{{ route('backend.ads.index') }}" class="btn btn-default">Quay về</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@stop