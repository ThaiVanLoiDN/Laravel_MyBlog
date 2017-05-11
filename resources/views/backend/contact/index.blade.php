@extends('backend.layouts.master')
@section('main-content')
<section class="content-header">
    <h1 class="pull-left">
        Liên hệ
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
                                <th>Email</th>
                                <th>Nội dung</th>
                                <th class="text-center">Ngày tạo</th>
                                <th class="text-center" colspan="3">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listContact as $contact)
                            <tr>
                                <td>{{ $contact->fullname }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ str_limit($contact->message, 200) }}</td>
                                <td class="text-center">{{ date('d-m-Y', strtotime($contact->created_at)) }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('backend.contact.show', $contact->id) }}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>

                                        <a href="{{ route('backend.contact.destroy', $contact->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="glyphicon glyphicon-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    <div class="pagination-sm no-margin pull-right">
                        {{ $listContact->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop