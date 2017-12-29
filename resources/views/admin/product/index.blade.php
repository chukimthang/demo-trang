@extends('admin.layout.index')

@section('content')
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-dt/css/jquery.dataTables.min.css') }}">

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách sản phẩm</h1>
            </div>
            <div class="clear:both"></div>
            
            <div class="col-lg-12">
                @include('shared.flash_message')
            </div>
            
            <table class="table table-striped table-bordered table-hover" 
                id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th class="col-sm-1">STT</th>
                        <th class="col-sm-2">Tên</th>
                        <th class="col-sm-1">Giá (VNĐ)</th>
                        <th class="col-sm-1">KM (%)</th>
                        <th class="col-sm-1">Ảnh</th>
                        <th class="col-sm-1">Đơn vị</th>
                        <th class="col-sm-1">SL</th>
                        <th class="col-sm-1">Loại</th>
                        <th class="col-sm-1">Trạng thái</th>
                        <th class="col-sm-1">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $key => $product)
                    <tr class="odd gradeX" align="center">
                        <td>{!! $key + 1 !!}</td>
                        <td align="left">{!! $product->name !!}</td>
                        <td>{!! number_format($product->unit_price) !!}</td>
                        <td>{!! $product->discount !!}</td>
                        <td>
                            @if (strpos($product->image, 'lorempixel.com'))
                                <img src="{!! $product->image !!}" alt="" height="50px"
                                    style="width: 60px !important">
                            @else
                                <img src="upload/images/product/{!! $product->image !!}" 
                                    alt="" height="50px" style="width: 60px !important">
                            @endif
                        </td>
                        <td>{!! config('common.product_unit')[$product->unit] !!}</td>
                        <td>{!! $product->quantity !!}</td>
                        <td>{!! $product->type_product->name !!}</td>
                        <td>{!! config('common.product_status')[$product->status] !!}</td>
                        <td>
                            <div style="float: left;">
                                <a href="{!! route('admin.products.edit', $product->id) !!}" 
                                    class="btn btn-success btn-xs">Sửa</a> 
                            </div>
                            <div>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.products.destroy',
                                    $product->id] ]) !!}
                                {!! Form::submit("Xóa", ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable.js') }}"></script>
<script>
    var db = new datatable;
    db.init('#dataTables-example');
</script>

@endsection
