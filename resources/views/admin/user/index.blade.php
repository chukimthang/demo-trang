@extends('admin.layout.index')

@section('content')
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-dt/css/jquery.dataTables.min.css') }}">

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách tài khoản</h1>
            </div>
            <div class="clear:both"></div>
            
            <div class="col-lg-12">
                @include('shared.flash_message')
            </div>
            
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Ngày tạo</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $user)
                    <tr class="odd gradeX" align="center">
                        <td>{!! ++$key !!}</td>
                        <td>{!! $user->full_name !!}</td>
                        <td>{!! $user->email !!}</td>
                        <td>{!! $user->phone !!}</td>
                        <td>{!! $user->created_at !!}</td>
                        <td>
                            @if ($user->is_admin == 0)
                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.users.destroy',
                                    $user->id] ]) !!}
                                {!! Form::submit("Xóa", ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                            @endif
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

