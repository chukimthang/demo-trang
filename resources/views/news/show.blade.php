@extends('master')

@section('content')

    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">{{ $news->name }}</h6>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">
            <div class="row">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-4">
                            @if (strpos($news->image, 'https://lorempixel.com', 0) == false)
                                <img src="{!! $news->image !!}" alt="" height="250px">
                            @else
                                <img src="upload/images/{!! $news->image !!}" alt="" height="250px">
                            @endif
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <p class="single-item-title"><h2>{{ $news->name }}</h2></p>
                            </div>

                            <div class="clearfix"></div>
                            <div class="space20">&nbsp;</div>

                            <div class="single-item-desc">
                                <p>{!! $news->description !!}</p>
                            </div>
                            <br>
                            <div class="single-item-desc">
                                <p>{!! $news->content !!}</p>
                            </div>
                            <div class="space20">&nbsp;</div>
                        </div>
                    </div>

                    <div class="space40">&nbsp;</div>
                </div>

                <div class="col-sm-3 aside">
                    <div class="widget">
                        <h3 class="widget-title">Bài viết mới nhất</h3>
                        <div class="widget-body">
                            <div class="beta-sales beta-lists">
                                @foreach($news_lastest as $item)
                                    <div class="media beta-sales-item">
                                        <a href="{!! route('news.show', $item->id) !!}">
                                            <img src="upload/images/{{ $item->image}}" alt="" height="150px"></a>
                                        <div class="media-body">
                                            {{ $item->title }}
                                        </div>
                                    </div>  
                                @endforeach                              
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
