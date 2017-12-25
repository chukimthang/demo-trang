@extends('admin.layout.index')

@section('content')
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-dt/css/jquery.dataTables.min.css') }}">

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row" id="bill">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách hóa đơn</h1>
            </div>
            <div class="clear:both"></div>
            
            <div class="col-lg-12">
                @include('shared.flash_message')
            </div>
            
            <table class="table table-striped table-bordered table-hover" 
                id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th class="col-sm-1">Mã</th>
                        <th>Khách hàng</th>
                        <th>Tổng giá (đồng)</th>
                        <th>Trạng thái</th>
                        <th>Thời gian tạo</th>
                        <th width="12%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($bills as $key => $bill)
                    <tr class="odd gradeX" align="center">
                        <td>{!! $bill->id !!}</td>
                        <td>{!! $bill->user->full_name !!}</td>
                        <td>{!! number_format($bill->total) !!}</td>
                        <td>
                            <div id="bill-status-{!! $bill->id !!}">
                                <p align="center">
                                    {!! config('common.status_bill')[$bill->status] !!}
                                </p>
                                <a href="javascript:void(0)" align="center" 
                                    class="update-status"
                                    data-id="{!! $bill->id !!}">Cập nhật</a>
                            </div>
                        </td>

                        <td align="left">
                            @if ($bill->created_at != null)
                                {!! Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $bill->created_at)->format('H:i:s d/m/Y') !!}
                            @else
                                {!! "" !!}
                            @endif
                        </td>
                        <td>
                            <div class="pull-left">
                                <a href="{!! route('admin.bills.show', $bill->id) !!}" 
                                    class="btn btn-info btn-xs">Chi tiết</a>
                            </div>
                            <div class="col-lg-pull-1">
                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.bills.destroy',
                                    $bill->id] ]) !!}
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
<script src="{!! asset('admin_asset/js/bill.js') !!}"></script>
<script>
    var db = new datatable;
    db.init('#dataTables-example');
    var bill = new bill;
    bill.init();
</script>
@endsection
