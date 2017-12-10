@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm loại sản phẩm</h1>
            </div>

            <div class="col-lg-7" style="padding-bottom:120px">
                @include("shared.error_message")

                {!! Form::open(["route" => "admin.type_products.store"]) !!}
                    <div class="form-group">
                        {!! Form::label("name", "Loại sản phẩm") !!}
                        {!! Form::text("name", null, ["class" => "form-control", 
                            "placeholder" =>  "Tên loại sản phẩm"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label("description", "Mô tả") !!}
                        {!! Form::textarea("description", null, ["class" => "form-control"]) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::submit("Thêm", ["class" => "btn btn-primary"]) !!}
                        <a href="{!! route("admin.type_products.index") !!}" 
                            class="btn btn-default">Thoát</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
