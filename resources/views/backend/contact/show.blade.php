@extends('backend.layouts.master')
@section('main-content')
<section class="content-header">
    <h1>
        Liên hệ
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
                    <p>{{ $contact->id }}</p>
                </div>

                <!-- Name Field -->
                <div class="form-group col-sm-6">
                    <label for="name">Tên:</label>
                    <p>{{ $contact->fullname }}</p>
                </div>
                <div class="clearfix"></div>

                <!-- Name Field -->
                <div class="form-group col-sm-6">
                    <label for="email">Email:</label>
                    <p>{{ $contact->email }}</p>
                </div>
                <!-- Name Field -->
                <div class="form-group col-sm-6">
                    <label for="phone">Số điện thoại:</label>
                    <p>{{ $contact->phone }}</p>
                </div>
                <div class="clearfix"></div>

                <!-- Name Field -->
                <div class="form-group col-sm-12">
                    <label for="message">Nội dung:</label>
                    <p>{{ $contact->message }}</p>
                </div>
                <div class="clearfix"></div>

                <!-- Created At Field -->
                <div class="form-group col-sm-6">
                    <label for="created_at">Ngày tạo:</label>
                    <p>{{ date('d-m-Y', strtotime($contact->created_at)) }}</p>
                </div>

                <!-- Updated At Field -->
                <div class="form-group col-sm-6">
                    <label for="updated_at">Ngày sửa:</label>
                    <p>{{ date('d-m-Y', strtotime($contact->updated_at)) }}</p>
                </div>

                <div class="col-sm-12">
                    <a href="{{ route('backend.contact.index') }}" class="btn btn-default">Quay về</a>
                </div>
            </div>
        </div>
    </div>

</section>
@stop