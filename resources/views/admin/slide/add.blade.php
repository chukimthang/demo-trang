@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm Sản phẩm
<!--                     <small>Add</small> -->
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
                <form action="admin/product/add" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="name" placeholder="Bột đậu đỏ" />
                    </div>
                    <div class="form-group">
                        <label>Loại sản phẩm</label>
                        <input class="form-control" name="id_type" placeholder="1" type="text" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="3" name="txtDes" placeholder="Bột đậu đỏ 100% tự nhiên"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control" rows="3" name="txtContent" placeholder="Bột đậu đỏ giàu vitamin C và E giúp da tăng cường sức đề kháng và chống lại ánh nắng mặt trời."></textarea>
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input class="form-control" name="txtPrice" placeholder="150000" />
                    </div>
                    <div class="form-group">
                        <label>Giá khuyến mại</label>
                        <input class="form-control" name="txtPricePromotion" placeholder="0" />
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <input type="file" name="fImages">
                    </div>
                    <div class="form-group">
                        <label>Đơn vị</label>
                        <input class="form-control" name="txtUnit" placeholder="Kg" />
                    </div>
                    <div class="form-group">
                        <label>Còn tồn</label>
                        <input class="form-control" name="txtNew" placeholder="0" />
                    </div>
                   <div class="form-group">
                        <label>Ngày tạo</label>
                        <input class="form-control" name="txtCreated" placeholder="0" />
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection