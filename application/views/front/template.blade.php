<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hà Thành Auto: Phụ tùng ô tô Mercedes, BMW, Audi giá tốt nhất </title>
    <meta name="description"
          content="Chuyên phụ tùng ô tô cao cấp giá tốt nhất tại Hà Nội, HCM. Phụ tùng xe ô tô, xe hơi tại Hà Thành được giao hàng toàn quốc, Hoàn tiền 100% nếu không đạt yêu cầu"/>
    <meta name="keywords"
          content="phụ t&ugrave;ng &ocirc; t&ocirc;, h&agrave; th&agrave;nh auto, phụ t&ugrave;ng xe &ocirc; t&ocirc;"/>
    <link rel="canonical" href="http://www.hathanhauto.com"/>
    <meta property="og:title" content="Hà Thành Auto: Phụ tùng ô tô Mercedes, BMW, Audi giá tốt nhất	"/>
    <meta property="og:image" content="/Areas/Desktop/Contents/img/logo.png"/>
    <meta property="og:url" content="http://www.hathanhauto.com"/>
    <meta property="og:description"
          content="Chuyên phụ tùng ô tô cao cấp giá tốt nhất tại Hà Nội, HCM. Phụ tùng xe ô tô, xe hơi tại Hà Thành được giao hàng toàn quốc, Hoàn tiền 100% nếu không đạt yêu cầu"/>
    <meta property="og:locale" content="vi_VN"/>
    <meta property="og:site_name"
          content="H&agrave; Th&agrave;nh Auto: Phụ t&ugrave;ng &ocirc; t&ocirc; Mercedes, BMW, Audi gi&aacute; tốt nhất"/>
    <meta http-equiv="content-language" content="vi"/>
    <link href="http://www.hathanhauto.com/images/favicon.png" rel="shortcut icon" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width"/>
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/Reset.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/HaThanh.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/bxNews.css') }}" rel="stylesheet"/>
    <!--[if IE 7]>
    <link href="{{ asset('css/ie7.css') }}" rel="stylesheet"/><![endif]-->
    <!--[if IE 8]>
    <link href="{{ asset('css/FixIE/ie8.css') }}" rel="stylesheet"/><![endif]-->
    <!--[if IE 9]>
    <link href="{{ asset('css/FixIE/ie9.css') }}" rel="stylesheet"/><![endif]-->
    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/skype-uri.js') }}"></script>
</head>
<body>
<div id="Wraper">
    <div id="wrapBody">
        @include('front.includes.header')

        <div id="top-navibar">
            <div class="pos-banner-left" id="pos-banner-left">

            </div>
            <div class="pos-banner-right" id="pos-banner-right">

            </div>
        </div>
        @yield('main_content')
        <script type="text/javascript">
            $('document').ready(function () {
                DockAvd('top-navibar', 'pos-banner-left', 'pos-banner-right');
            });
            function DockAvd(idContent, idLeft, idRight) {
                var marginLeft = ($(window).width() - $('#' + idContent).width()) / 2;
                var imgLeft = $("#" + idLeft).find('a:eq(0)').find('img:eq(0)').width();
                var imgRight = $("#" + idRight).find('a:eq(0)').find('img:eq(0)').width();
                $("#" + idLeft).find('a:eq(0)').find('img:eq(0)').load(function () {
                    imgLeft = $(this).width();
                    $("#" + idLeft).css({ "left": marginLeft - imgLeft - 5 });
                });
                $("#" + idRight).find('a:eq(0)').find('img:eq(0)').load(function () {
                    imgRight = $(this).width();
                    $("#" + idRight).css({ "right": marginLeft - imgRight - 5 });
                });
                if (imgLeft == 0) {
                    imgLeft = 184;
                }

                if (imgRight == 0) {
                    imgRight = 184;
                }
                var pY = document.body.scrollTop - 10;
                $("#" + idLeft).css({ "left": marginLeft - imgLeft - 5, 'top': pY });
                $("#" + idRight).css({ "right": marginLeft - imgRight - 5, 'top': pY });

                $(window).scroll(function () {
                    $("#" + idLeft).css({ "left": marginLeft - imgLeft - 5, 'top': pY });
                    $("#" + idRight).css({ "right": marginLeft - imgRight - 5, 'top': pY });
                });
            }
        </script>

        @include('front.includes.footer')
    </div>
    @include('front.includes.footer-info')
</div>
<script src="{{ asset('js/jquery.selectbox-0.1.3.min.js') }}"></script>
<script src="{{ asset('js/Common.js') }}"></script>
<script src="{{ asset('js/jquery.cookie.js') }}"></script>
<script src="{{ asset('js/jquery.unobtrusive-ajax.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.unobtrusive.min.js') }}"></script>
</body>
</html>