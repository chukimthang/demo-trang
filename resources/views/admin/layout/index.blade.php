<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Thực phẩm thực dưỡng">
    <meta name="author" content="">
    <title>Thực phẩm thực dưỡng</title>

    <base href="{{asset('')}}">
    <link href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css"
         rel="stylesheet">
    <link href="admin_asset/bower_components/metisMenu/dist/metisMenu.min.css" 
        rel="stylesheet">
    <link href="admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css" 
        rel="stylesheet" type="text/css">
</head>

<body>
    <div id="wrapper">
        @include('admin.layout.header')
        @yield('content')
    </div>
    
    <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="admin_asset/dist/js/sb-admin-2.js"></script>
    @yield('script')
</body>
</html>
