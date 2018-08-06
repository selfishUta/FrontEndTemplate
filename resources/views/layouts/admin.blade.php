<!DOCTYPE html>
<html>

<head>
    <title>后台管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href="{{asset('admin')}}/css/lato.css" rel='stylesheet' type='text/css'>
    <link href="{{asset('admin')}}/css/roboto.css" rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/lib/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/lib/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/lib/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/lib/css/bootstrap-switch.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/lib/css/checkbox3.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/lib/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/lib/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/lib/css/select2.min.css">
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/css/themes/flat-blue.css">
</head>

<body class="flat-blue">
    <div class="app-container">
        <div class="row content-container">
        <!-- topnav -->
        @include('public/admin_topnav')
        <!-- sidemenu -->
        @include('public/admin_sidemenu')
        <!-- container -->
        @yield('container')
        </div>
        <div>
            <!-- Javascript Libs -->
            <script type="text/javascript" src="{{asset('admin')}}/lib/js/jquery.min.js"></script>
            <script type="text/javascript" src="{{asset('admin')}}/lib/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="{{asset('admin')}}/lib/js/Chart.min.js"></script>
            <script type="text/javascript" src="{{asset('admin')}}/lib/js/bootstrap-switch.min.js"></script>
            <script type="text/javascript" src="{{asset('admin')}}/lib/js/jquery.matchHeight-min.js"></script>
            <script type="text/javascript" src="{{asset('admin')}}/lib/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="{{asset('admin')}}/lib/js/dataTables.bootstrap.min.js"></script>
            <script type="text/javascript" src="{{asset('admin')}}/lib/js/select2.full.min.js"></script>
            <script type="text/javascript" src="{{asset('admin')}}/lib/js/ace/ace.js"></script>
            <script type="text/javascript" src="{{asset('admin')}}/lib/js/ace/mode-html.js"></script>
            <script type="text/javascript" src="{{asset('admin')}}/lib/js/ace/theme-github.js"></script>
            <!-- Javascript -->
            <script type="text/javascript" src="{{asset('admin')}}/js/app.js"></script>
            
            @yield('js')
        </div>
    </div>
</body>

</html>