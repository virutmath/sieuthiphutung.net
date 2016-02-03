<!DOCTYPE HTML>
<html>
<head>
    <title>Công ty Cổ Phần Đầu Tư Phát Triển Kỹ Thuật Công Nghệ Và Thương Mại Hồng Phát</title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="keywords" content="Phụ tùng ô tô"/>
    <meta name="description" content="Phụ tùng ô tô Hồng Phát">
    <meta name="author" content="virutmath">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Roboto:500,300,700,400italic,400' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('thebox/web/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('thebox/web/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('thebox/web/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('thebox/web/css/mystyles.css')}}">
</head>
<body>
<div class="global-wrapper clearfix" id="global-wrapper">
    @include('thebox.web.includes.header-top')
    @include('thebox.web.includes.popup-login')
    @include('thebox.web.includes.popup-register')
    @include('thebox.web.includes.popup-password')
    @include('thebox.web.includes.header')
    @yield('main')
    <div class="gap"></div>
    @include('thebox.web.includes.footer')
</div>
<script src="{{asset('thebox/web/js/jquery.js')}}"></script>
<script src="{{asset('thebox/web/js/bootstrap.js')}}"></script>
<script src="{{asset('thebox/web/js/icheck.js')}}"></script>
<script src="{{asset('thebox/web/js/ionrangeslider.js')}}"></script>
<script src="{{asset('thebox/web/js/jqzoom.js')}}"></script>
<script src="{{asset('thebox/web/js/card-payment.js')}}"></script>
<script src="{{asset('thebox/web/js/owl-carousel.js')}}"></script>
<script src="{{asset('thebox/web/js/magnific.js')}}"></script>
<script src="{{asset('thebox/web/js/custom.js')}}"></script>
</body>
</html>
