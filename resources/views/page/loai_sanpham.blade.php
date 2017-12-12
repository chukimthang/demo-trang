@extends('master')

@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Sản phẩm {{$loap_sp->name}}</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Loại sản phẩm</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-3">
					<ul class="aside-menu">
					@foreach($loai as $l)
						<li><a href="{{route('loaisanpham',$l->id)}}">{{$l->name}}</a></li>
					@endforeach
					</ul>
				</div>
				<div class="col-sm-9">
					<div class="beta-products-list">
						<h4>Sản phẩm mới</h4>
						<div class="row">
						@foreach($sp_theoloai as $sp)
							<div class="col-sm-4">
								<div class="single-item">
									@if($sp->discount!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$sp->id)}}">
											@if (strpos($sp->image, 'https://lorempixel.com', 0) == false)
												<img src="{!! $sp->image !!}" alt="" height="250px">
											@else
												<img src="source/image/product/{{$sp->image}}" alt="" height="250px">
											@endif
										</a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sp->name}}</p>
										<p class="single-item-price" style="font-size: 18px">
										@if($sp->discount==0)
											<span class="flash-sale">{{number_format($sp->unit_price)}} đồng</span>
										@else
											<span class="flash-del">{{number_format($sp->unit_price)}} đồng</span>
											<span class="flash-sale">{{number_format($sp->unit_price - $sp->unit_price * $sp->discount/100)}} đồng</span>
										@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a href="javascript:void(0)" class="add-to-cart pull-left"
											data-id="{{ $sp->id }}">
											<i class="fa fa-shopping-cart"></i>
										</a>
										<a class="beta-btn primary" href="{{route('chitietsanpham', $sp->id)}}">
											Chi tiết <i class="fa fa-chevron-right"></i>
										</a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
						</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<h4>Sản phẩm khác</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm thấy {{count($sp_khac)}} sản phẩm tương tự</p>
							<div class="clearfix"></div>
						</div>
						<div class="row">
						@foreach($sp_khac as $sp_k)
							<div class="col-sm-4">
								<div class="single-item">
									@if($sp_k->discount!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="#">
											@if (strpos($sp_k->image, 'https://lorempixel.com', 0) == false)
												<img src="{!! $sp_k->image !!}" alt="" height="250px">
											@else
												<img src="source/image/product/{{$sp->image}}" alt="" height="250px">
											@endif
										</a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sp_k->name}}</p>
										<p class="single-item-price" style="font-size: 18px">
											@if($sp_k->discount==0)
												<span class="flash-sale">{{number_format($sp_k->unit_price)}} đồng</span>
											@else
												<span class="flash-del">{{number_format($sp_k->unit_price)}} đồng</span>
												<span class="flash-sale">{{number_format($sp_k->unit_price - $sp_k->unit_price * $sp_k->discount/100)}} đồng</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
						</div>
						<div class="row">{{$sp_khac->links()}}</div>
						<div class="space40">&nbsp;</div>
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->
		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->

<script src="{!! asset("source/assets/dest/js/jquery.js") !!}"></script>
<script type="text/javascript" src="{!! asset('js/cart.js') !!}"></script>
<script type="text/javascript">
    var cart = new cart;
    cart.init();
</script>
@endsection
