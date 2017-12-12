@extends('master')

@section('content')
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Giỏ hàng của bạn</h4>
                        <div class="beta-products-details">
                           {{--  <p class="pull-left">Có 0 sản phẩm trong giỏ</p> --}}
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <section class="cart-section">
                    <div class="auto-container">
                        <div id="cart">
                            @include('cart.list')
                        </div>

                        <div align="center">
                            <a href="javascript:void(0)" data-toggle="modal" id="confirm-auth" 
                                data-auth="{!! Auth::id() !!}">
                                <button class="btn btn-primary">Xác nhận</button>
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

@include('bill.create')

<script src="{!! asset("source/assets/dest/js/jquery.js") !!}"></script>
<script type="text/javascript" src="{!! asset('js/cart.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/order.js') !!}"></script>
<script type="text/javascript">
    $('#confirm-auth').on('click', function(event) {
        var auth = $(this).data('auth');
        if (auth) {
            $('#confirm-auth').attr('data-target','#order-create');
        } else {
            alert('Bạn cần đăng nhập để thực hiện đặt hàng');
        }
    });

    var cart = new cart;
    cart.init();
    var order = new order;
    order.init();
</script>
@endsection
