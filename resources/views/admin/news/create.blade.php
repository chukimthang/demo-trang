@extends("admin.layout.index")

@section("content")
    <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm bài viết</h1>
            </div>

            <div class="col-lg-7">
                @include("shared.error_message")

                {!! Form::open(["route" => "admin.news.store", "files" => true]) !!}
                    <div class="form-group">
                        {!! Form::label("title", "Tiêu đề") !!}
                        {!! Form::text("title", null, ["class" => "form-control", "placeholder" =>  "Tiêu đề"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label("image", "Ảnh") !!}
                        {!! Form::file("image", ["class" => "form-control"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label("description", "Mô tả") !!}
                        {!! Form::textarea("description", null, ["class" => "form-control", 
                            'size' => '30x5']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label("content", "Nội dung") !!}
                        {!! Form::textarea("content") !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::submit("Thêm", ["class" => "btn btn-primary"]) !!}
                        <a href="{!! route("admin.news.index") !!}" class="btn btn-default">Thoát</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{!! asset('bower_components/ckeditor/ckeditor.js') !!}"></script>
<script>
    CKEDITOR.replace("content",  {
      toolbar: [
        [ 'Bold', 'Italic', 'Format' ],
        [ 'FontSize', 'TextColor', 'BGColor' ],
        [ 'Cut', 'Copy', 'Paste', '-'],
        [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ]
      ]
    });
</script>
@endsection
