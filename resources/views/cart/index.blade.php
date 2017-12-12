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
                            <button class="btn btn-primary">Xác nhận</button>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<script src="{!! asset("source/assets/dest/js/jquery.js") !!}"></script>
<script type="text/javascript" src="{!! asset('js/cart.js') !!}"></script>
<script type="text/javascript">
    var cart = new cart;
    cart.init();
</script>
@endsection
