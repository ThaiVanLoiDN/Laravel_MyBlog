@extends('backend.layouts.master')
@section('main-content')
<section class="content-header">
    <h1 class="pull-left">
        Mạng xã hội
        <small>Trang chủ</small>
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
                                <th>Tên</th>
                                <th>Link</th>
                                <th class="text-center">Ngày tạo</th>
                                <th class="text-center" colspan="2">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listInfo as $info)
                            <tr>
                                <td>{{ $info->name }}</td>
                                <td>{{ $info->value }}</td>
                                <td class="text-center">{{ date('d-m-Y', strtotime($info->created_at)) }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('backend.info.show', $info->id) }}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>

                                        <a href="{{ route('backend.info.update', $info->id) }}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
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