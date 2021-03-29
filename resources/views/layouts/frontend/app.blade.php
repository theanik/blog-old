
<!--Template Name: BlogsCloud
File Name: index.html
Author Name: Anik Anwar
Author URI: http://www.theanik.me/-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Anik's Blog</title>
        <meta name="description" content="BlogsCloud - Blog Template">
        <meta name="keywords" content="">
        <meta name="author" content="ThemeVault">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="{{url('/favicon.ico')}}">

        <!--styles-->
        <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.css')}}"/>
        <!--plugin css-->
        <link rel="stylesheet" href="{{asset('assets/frontend/css/swiper.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/frontend/css/slick.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/frontend/css/gridrotator-custom.css')}}"/>


        <!--custom css-->
        <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/frontend/css/responsive.css')}}"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">

        <!--script-->
        <script src="{{asset('assets/frontend/js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/frontend/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/frontend/js/swiper.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/frontend/js/slick.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/frontend/js/modernizr_custom.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/frontend/js/jquery.gridrotator.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/frontend/js/custom.js')}}" type="text/javascript"></script>
        
    </head>
    <body>

        <div id="page">
            <!-----------Header Section----------------->
            @include('layouts.frontend.partial.header')
            <!-----------End----------------->

                @yield('content')
            <!-----------End----------------->

            <!-----------Footer----------------->
            @include('layouts.frontend.partial.footer')
            <!-----------End----------------->
        </div>
        <div id="back-to-top" class="back-to-top"> <i class="fa fa-angle-up"></i></div>
    </body>
    @stack('js')
    <script id="dsq-count-scr" src="//aniks-blog.disqus.com/count.js" async></script>
</html>