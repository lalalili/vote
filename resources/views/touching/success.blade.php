<!doctype html>
<!--[if lt IE 7]>
<html class="no-js ie6"><![endif]-->
<!--[if IE 7]>
<html class="no-js ie7"><![endif]-->
<!--[if IE 8]>
<html class="no-js ie8"><![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <title>感動服務票選活動</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <!-- Bootstrap 3.3.2 -->
    <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{ url('/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ url('/css/slick.min.css')}}">
    <link rel="stylesheet" href="{{ url('/css/jquery.fullPage.min.css')}}">

    {{--<link rel="stylesheet" href="{{url('/css/styles.css')}}">--}}
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">

    <link rel="stylesheet" href="{{ url('/js/rs-plugin/css/settings.css')}}">
</head>

<body>

<script src="{{ url('/js/jquery-1.11.3.min.js')}}"></script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<div class="pre-loader">
    <div class="load-con">
        <img src="{{url('/images/freeze/logo.png')}}" class="animated fadeInDown" alt="">

        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
</div>
<header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="fa fa-bars fa-lg"></span>
                </button>
                <a class="navbar-brand">
                    <img src="{{url('/images/freeze/logo.png')}}" alt="" class="logo">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            {{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
            {{--<ul class="nav navbar-nav navbar-right">--}}
            {{--<li><a href="#abouts">活動辦法</a>--}}
            {{--</li>--}}
            {{--<li><a href="#prize">獎品一覽</a>--}}
            {{--</li>--}}
            {{--<li><a href="#lists">得獎名單</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</div>--}}
                    <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-->
    </nav>
</header>
<!--RevSlider-->
<div class="tp-banner-container">
    <div class="tp-banner">
        <ul>
            <!-- SLIDE  -->
            <li data-transition="fade" data-slotamount="7" data-masterspeed="1500">
                <!-- MAIN IMAGE -->
                <img src="{{url('/images/transparent.png')}}" alt="slidebg1" data-bgfit="cover"
                     data-bgposition="left top" data-bgrepeat="no-repeat">
                <!-- LAYERS -->
                <!-- LAYER NR. 1 -->
                {{--<div class="tp-caption lfl fadeout hidden-xs"--}}
                {{--data-x="left"--}}
                {{--data-y="bottom"--}}
                {{--data-hoffset="30"--}}
                {{--data-voffset="0"--}}
                {{--data-speed="500"--}}
                {{--data-start="700"--}}
                {{--data-easing="Power4.easeOut">--}}
                {{--<img src="{{url('/images/freeze/Slides/thumb.png')}}" alt="">--}}
                {{--</div>--}}
                {{--<div class="tp-caption lfl fadeout visible-xs"--}}
                {{--data-x="left"--}}
                {{--data-y="center"--}}
                {{--data-hoffset="700"--}}
                {{--data-voffset="0"--}}
                {{--data-speed="500"--}}
                {{--data-start="700"--}}
                {{--data-easing="Power4.easeOut">--}}
                {{--<img src="{{url('/images/freeze/Slides/thumb_s.png')}}" alt="">--}}
                {{--</div>--}}
                <div class="tp-caption large_white_bold sft" data-x="550" data-y="center" data-hoffset="0"
                     data-voffset="-80" data-speed="500" data-start="1200" data-easing="Power4.easeOut">
                    投票完成
                </div>
                <div class="tp-caption large_white_light sfb" data-x="550" data-y="center" data-hoffset="0"
                     data-voffset="0" data-speed="1000" data-start="1500" data-easing="Power4.easeOut">
                    感謝您的寶貴時間
                </div>
            </li>
        </ul>
    </div>
</div>

<script src="{{ url('/js/bootstrap.min.js') }}"></script>
<script src="{{ url('/js/slick.min.js') }}"></script>
<script src="{{ url('/js/placeholdem.min.js') }}"></script>
<script src="{{ url('/js/rs-plugin/js/jquery.themepunch.plugins.min.js') }}"></script>
<script src="{{ url('/js/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ url('/js/waypoints.min.js') }}"></script>
<script src="{{ url('/js/modernizr.custom.32033.min.js')}}"></script>
{{--<script src="{{url('/js/scripts.js')}}"></script>--}}
<script src="{{ elixir('js/app.js') }}"></script>

<script>
    $(document).ready(function () {
        appMaster.preLoader();
    });
</script>

</body>
</html>