<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link type="text/css" rel="stylesheet" href="{{asset('bootstrap-3.3.7/css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/signin.css')}}">
    @yield('css')
</head>

<body>
    <!-- 顶部导航栏 -->
    @include('public/index_header')
    <div class="container-fluid">
        <!-- 主体 -->
        @yield('main')
    </div>
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script type="text/javascript" src="{{asset('bootstrap-3.3.7/js/bootstrap.js')}}"></script>
    <script type="text/javascript">
        window.onload = function(){
        @if(session()->has('message'))
        alert('{{session()->get("message")}}');
        @endif
        };
    </script>
    @yield('js')
</body>

</html>