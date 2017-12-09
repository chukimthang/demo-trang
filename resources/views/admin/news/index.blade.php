@extends('admin.layout.index')

@section('content')
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-dt/css/jquery.dataTables.min.css') }}">

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách tin tức</h1>
            </div>
            <div class="clear:both"></div>
            
            <div class="col-lg-12">
                @include('admin.shared.flash_message')
            </div>
            
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th width="8%">STT</th>
                        <th width="60%">Tiêu đề</th>
                        <th width="10%">Ảnh</th>
                        <th width="12%">Ngày tạo</th>
                        <th width="10%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($news as $key => $item)
                    <tr class="odd gradeX" align="center">
                        <td>{!! $key + 1 !!}</td>
                        <td align="left">{!! $item->title !!}</td>
                        <td><img src="upload/images/{!! $item->image !!}" alt="" 
                            width="50px" height="50px"></td>
                        <td align="left">{!! Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('d/m/Y') !!}</td>
                        <td>
                            <div style="float: left;">
                                <a href="{!! route('news.edit', $item->id) !!}" 
                                    class="btn btn-success btn-xs">Edit</a> 
                            </div>
                            <div>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['news.destroy',
                                    $item->id] ]) !!}
                                {!! Form::submit("Delete", ['class' => 'btn btn-danger btn-xs']) !!}
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
<script>
    var db = new datatable;
    db.init('#dataTables-example');
</script>

@endsection
