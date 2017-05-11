@extends('backend.layouts.master')
@section('main-content')
<section class="content-header">
    <h1 class="pull-left">
        Slider
        <small>Trang chủ</small>
    </h1>
    <h1 class="pull-right">
        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('backend.slider.create') }}">Thêm</a>
    </h1>
</section>

<section class="content">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('success'))
                <div class="alert alert-success"><p><strong>{{ Session::get('success') }}</strong></p></div>
            @endif
            @if (Session::has('danger'))
                <div class="alert alert-danger"><p><strong>{{ Session::get('danger') }}</strong></p></div>
            @endif
            <div class="clearfix"></div>
            <div class="box box-primary">
                <div class="box-body table-responsive">
                    <table class="table table-responsive table-bordered" id="tours-table">
                        <thead>
                            <tr>
                                <th>Slider</th>
                                <th>Link</th>
                                <th class="text-center hidden-sm hidden-xs">Hình ảnh</th>
                                <th class="text-center hidden-sm hidden-xs">Ngày tạo</th>
                                <th class="text-center" colspan="3">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listSlider as $slider)
                            <tr>
                                <td>{{ $slider->name }}</td>
                                <td>{{ $slider->link }}</td>
                                <td class="text-center hidden-sm hidden-xs">
                                    @if ($slider->image != '')
                                        <img id="image" src="{{ url('upload') . '/' . $slider->image}}" alt="avatar"  class="img-responsive center-block" width="300px">
                                    @else
                                        Không có hình ảnh
                                    @endif
                                </td>
                                <td class="text-center hidden-sm hidden-xs">{{ date('d-m-Y', strtotime($slider->created_at)) }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('backend.slider.show', $slider->id) }}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>

                                        <a href="{{ route('backend.slider.update', $slider->id) }}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>

                                        <a href="{{ route('backend.slider.destroy', $slider->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="glyphicon glyphicon-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>
@stop