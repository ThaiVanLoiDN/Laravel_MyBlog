@extends('backend.layouts.master')
@section('main-content')
<section class="content-header">
    <h1>
        Mạng xã hội
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
                <form method="POST" action="{{ route('backend.info.create') }}" accept-charset="UTF-8" id="info">
                	{{ csrf_field() }}

                    <div class="form-group">
                        <!-- Name Field -->
                        <div class="col-sm-6">
                            <label for="name">Tên:</label>
                            <input class="form-control" name="name" type="text" id="name">
                        </div>

                        <!-- Name Field -->
                        <div class="col-sm-6">
                            <label for="value">Link</label>
                            <input class="form-control" name="value" type="text" id="value">
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-group">
                        <!-- Submit Field -->
                        <div class="col-sm-12">
                            <input class="btn btn-primary" type="submit" value="Lưu">
                            <a href="{{ route('backend.info.index') }}" class="btn btn-default">Quay về</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@stop