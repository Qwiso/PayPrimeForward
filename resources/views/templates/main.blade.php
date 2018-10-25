<!DOCTYPE html>
<html>
<head>
    <title>{{env('APP_NAME')}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    @yield('html-head')
    <link rel="shortcut icon" href="/favicon.ico"/>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="/adminlte/dist/css/AdminLTE.min.css">
    <link rel="stylesheet=" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .walkthrough-card {
            width: 100%;
            height: 90vh;
            border-radius: 20px;
        }
        .btn-facebook:hover {
            background-color: #3b5998;
        }
        .btn-twitch {
            color: #fff;
            background-color: #6441A4;
            border-color: rgba(0,0,0,0.2);
        }
        .btn-amazon {
            color: #fff;
            background-color: #ff9900;
            border-color: rgba(0,0,0,0.2);
        }
        .btn-patreon {
            color: #fff;
            background-color: #F96854;
            border-color: rgba(0,0,0,0.2);
        }
    </style>
</head>
<body class="skin-black-light layout-top-nav" cz-shortcut-listen="true" style="height: auto; min-height: 100%;">
<div class="wrapper" style="height: auto; min-height: 100%;">
    {{--@if(auth()->check())--}}
    {{--@include('lte.main-header')--}}
    {{--@else--}}
    {{--@include('lte.main-header-guest')--}}
    {{--@endif--}}
    <div class="content-wrapper bg-white">
        @yield('content-header')
        <section class="content">
            @yield('content')
        </section>
        @yield('content-footer')
    </div>
</div>
<script defer src="//use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="/adminlte/dist/js/adminlte.min.js"></script>
@yield('post-script')
</body>
</html>
