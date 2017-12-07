@extends('admin.layout.index')

@section('content')


 <!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa sản phẩm
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{$err}}
                        @endforeach
                    </div>
                @endif
                @if(Session::has('thanhcong'))
                    <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                @endif
                <form action="admin/product/edit/{{$product->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="name" placeholder="Sửa tên sản phẩm" value="{{$product->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Loại sản phẩm</label>
                        <input class="form-control" name="id_type" placeholder="Sửa loại sản phẩm" type="text" value="{{$product->id_type}}" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="3" value="{{$product->name}}" name="txtDes" placeholder="Sửa mô tả"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control" rows="3" name="txtContent" placeholder="Sửa nội dung sản phẩm"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input class="form-control" value="{{$product->unit_price}}" name="txtPrice" placeholder="Giá" />
                    </div>
                    <div class="form-group">
                        <label>Giá khuyến mại</label>
                        <input class="form-control" value="{{$product->promotion_price}}" name="txtPricePromotion" placeholder="Giá khuyến mại" />
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <input type="file" name="fImages">
                    </div>
                    <div class="form-group">
                        <label>Đơn vị</label>
                        <input class="form-control" value="{{$product->unit}}" name="txtUnit" placeholder="Kg" />
                    </div>
                    <div class="form-group">
                        <label>Còn tồn</label>
                        <input class="form-control" value="{{$product->new}}" name="txtNew" placeholder="0" />
                    </div>
                   <div class="form-group">
                        <label>Ngày tạo</label>
                        <input class="form-control" value="{{$product->created_at}}" name="txtCreated" placeholder="0" />
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection