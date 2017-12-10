@extends('admin.layout.index')

@section('content')

<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-dt/css/jquery.dataTables.min.css') }}">
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
                        <th class="col-sm-1">ID</th>
                        <th class="col-sm-3">Tên</th>
                        <th>Mô tả</th>
                        <th width="12%">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($type_products as $product_item)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $product_item->id}}</td>
                        <td align="left">{{ $product_item->name}}</td>
                        <td align="left">{{ $product_item->description}}</td>
                        <td class="center">
                            <div style="float: left;">
                                <a href="{!! route('admin.type_products.edit', 
                                    $product_item->id) !!}" 
                                    class="btn btn-success btn-xs">Sửa</a> 
                            </div>
                            <div>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.type_products.destroy',
                                    $product_item->id] ]) !!}
                                {!! Form::submit("Xóa", ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable.js') }}"></script>
<script>
    var db = new datatable;
    db.init('#dataTables-example');
</script>
@endsection
