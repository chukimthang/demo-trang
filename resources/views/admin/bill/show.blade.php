@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chi tiết hóa đơn</h1>
            </div>

            <table class="col-lg-12">
                <tr>
                    <td width="50%">
                        <p><label>Khách hàng:</label>
                        {!! $bill->user->full_name !!}</p>
                    </td>
                    <td>
                        <p><label>Địa chỉ nhận:</label>
                        {!! $bill->receiver_info->address_receive !!}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><label>Số điện thoại:</label> 
                        {!! $bill->receiver_info->phone !!}</p>
                    </td>
                    <td>
                        <p><label>Ngày đặt hàng:</label>
                        {!! $bill->created_at !!}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><label>Email:</label>
                        {!! $bill->user->email !!}</p>
                    </td>
                    <td>
                       <p><label>Trạng thái:</label>
                        {!! config('common.status_bill')[$bill->status] !!}</p> 
                    </td>
                </tr>
            </table>
         
            <table class="table-show table table-striped table-bordered 
                table-hover col-lg-12">
                <thead>
                    <tr>
                        <th class="colum" width="10%">STT</th>
                        <th class="colum">Sản phẩm</th>
                        <th class="colum">Giá (VNĐ)</th>
                        <th class="colum">Số lượng</th>
                        <th class="colum">Thành tiền (VNĐ)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($billDetails as $key => $billDetail)
                        <tr>
                            <td align="center">{!! ++$key !!}</td>
                            <td align="center"><a href="#">
                                {!! $billDetail->product->name !!}</a></td>
                            <td align="center">
                                {!! number_format($billDetail->product->unit_price) !!}
                            </td>
                            <td align="center">
                                {!! $billDetail->quantity !!}</td>
                            <td align="center">{!! number_format($billDetail->product
                                ->unit_price * $billDetail->quantity) !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="col-lg-12" align="center">
                <h4>Tổng giá: <span>{!! number_format($bill->total) !!}</span>VNĐ</h4>
            </div>
           
            <div align="center" class="col-lg-12">
                <a href="{!! route('admin.bills.index') !!}" class="back"></a>
            </div>
        </div>
    </div>
</div>
@endsection
