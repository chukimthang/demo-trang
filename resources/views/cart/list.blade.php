<table class="cart-table table table-striped table-bordered table-hover">
    <thead class="cart-header">
        <tr>
            <th>Sản phẩm</th>
            <th>Ảnh</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th class="col-sm-1">Xóa</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($cart))
            @foreach ($cart as $key => $item)
                <tr>
                    <td>{!! $item->name !!}</td>
                    <td>
                        <div class="column-box">
                            <a href="#">
                                @if (strpos($item->options->image, 'lorempixel.com'))
                                    <img src="{!! $item->options->image !!}" alt="" height="50px">
                                @else
                                    <img src="upload/images/product/{{ $item->options->image}}" alt="" height="50px">
                                @endif
                            </a>
                        </div>
                    </td>
                    <td>{!! number_format($item->price) !!}
                    </td>
                    <td class="cart-quantity" style="font-size: 14px;">
                        <a class="cart-quantity-up" data-id="{{ $item->rowId }}" 
                            data-qty="{{ $item->qty }}" href="javascript:void(0)"
                            style="margin-left: 30%; font-size: 18px; font-weight: bold;"> + </a>
                        <label class="cart_quantity_input" name="quantity" 
                            value="{{ $item->qty }}" width="30px">{{ $item->qty }}</label>
                        <a class="cart-quantity-down" data-id="{{ $item->rowId }}" href="javascript:void(0)" 
                            style="font-size: 18px; font-weight: bold;"> - </a>
                    </td>
                    <td class="sub-total">{!! number_format($item->subtotal) !!}</td>

                    <td class="cart_delete">
                        <a href="javascript:void(0)" class="delete" data-id="{{ $item->rowId }}">
                            <i class="fa fa-times" style="font-size: 16px;"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

<div class="row clearfix">
    <p style="font-size: 20px; font-weight: bold;" align="right">
        <span>Tổng tiền: {!! Cart::subtotal() !!}</span>
    </p>
</div>
