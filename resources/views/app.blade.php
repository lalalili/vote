<!doctype html>
<!--[if lt IE 7]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <title>微笑大使票選活動</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="shortcut icon" href="favicon.png">

    <!-- Bootstrap 3.3.2 -->
    <link rel="stylesheet" href="{{url('/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{url('/css/animate.css')}}">
    <link rel="stylesheet" href="{{url('/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('/css/slick.css')}}">
    <link rel="stylesheet" href="{{url('/js/rs-plugin/css/settings.css')}}">

    <link rel="stylesheet" href="{{url('/css/styles.css')}}">


    <script type="text/javascript" src="{{url('/js/modernizr.custom.32033.js')}}"></script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    {!! Rapyd::styles() !!}
</head>

<body>

<script src="{{url('/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{url('/js/bootstrap.min.js')}}"></script>
<script src="{{url('/js/slick.min.js')}}"></script>
<script src="{{url('/js/placeholdem.min.js')}}"></script>
<script src="{{url('/js/rs-plugin/js/jquery.themepunch.plugins.min.js')}}"></script>
<script src="{{url('/js/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{url('/js/waypoints.min.js')}}"></script>
<script src="{{url('/js/scripts.js')}}"></script>
<script>
    $(document).ready(function() {
        appMaster.preLoader();
    });
</script>
{!! Rapyd::scripts() !!}
@yield('content')
</body>

</html>
