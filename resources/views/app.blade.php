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
    <title>Luxgen CS</title>
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
@yield('content')

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
