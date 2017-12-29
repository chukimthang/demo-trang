@extends("admin.layout.index")

@section("content")
    <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa sản phẩm</h1>
            </div>

            <div class="col-lg-7">
                @include("shared.error_message")

                 {!! Form::model($product, ['method' => 'PUT', "files" => true, 
                    'route' => ['admin.products.update', $product->id]]) !!}
                    <div class="form-group">
                        {!! Form::label("name", "Tên") !!}
                        {!! Form::text("name", null, ["class" => "form-control", "placeholder" =>  "Tên sản phẩm"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label("unit_price", "Giá") !!}
                        {!! Form::text("unit_price", null, ["class" => "form-control", "placeholder" =>  "Giá sản phẩm"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label("discount", "Khuyến mại") !!}
                        {!! Form::text("discount", null, ["class" => "form-control", "placeholder" =>  "Giá khuyến mại"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label("quantity", "Số lượng") !!}
                        {!! Form::text("quantity", null, ["class" => "form-control", "placeholder" =>  "Số lượng"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label("image", "Ảnh") !!}
                        {!! Form::file("image", ["class" => "form-control"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label("type_product_id", "Loại sản phẩm") !!}
                        {!! Form::select('type_product_id', $type_products, null, [
                            'class' => 'form-control',
                            'placeholder' => '-- Chọn loại sản phẩm --'
                        ]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label("unit", "Đơn vị") !!}
                        {!! Form::select('unit', $units, null, [
                            'class' => 'form-control',
                            'placeholder' => '-- Chọn đơn vị --'
                        ]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label("status", "Trạng thái") !!}
                        {!! Form::select('status', $status, null, [
                            'class' => 'form-control'
                        ]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label("description", "Mô tả") !!}
                        {!! Form::textarea("description", null, ["class" => "form-control", 
                            'size' => '30x5']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::submit("Sửa", ["class" => "btn btn-primary"]) !!}
                        <a href="{!! route("admin.products.index") !!}" class="btn btn-default">Thoát</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
