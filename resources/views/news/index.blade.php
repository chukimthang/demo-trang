@extends('master')
@section('content')

<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Bài viết</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {!! $count !!} bài viết</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-lg-12">
                            @include('shared.flash_message')
                        </div>

                        <div class="row">
                            @foreach($news as $item)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <a href="{{route('chitietsanpham', $item->id)}}">
                                                @if (strpos($item->image, 'lorempixel.com'))
                                                    <img src="{!! $item->image !!}" alt="" height="250px">
                                                @else
                                                    <img src="upload/images/news/{!! $item->image !!}" alt="" height="250px">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{!! $item->title !!}</p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="beta-btn primary" href="{{route('news.show', $item->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">{{$news->links()}}</div>
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->
        </div>
    </div> <!-- .main-content -->
</div> <!-- #content -->
@endsection
