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
    <link rel="stylesheet" href="{{url('/css/jquery.fullPage.css')}}">




    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    {!! Rapyd::styles() !!}
</head>

<body>
<script src="{{url('/js/modernizr.custom.32033.js')}}"></script>
<script src="{{url('/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{url('/js/bootstrap.min.js')}}"></script>
<script src="{{url('/js/slick.min.js')}}"></script>
<script src="{{url('/js/placeholdem.min.js')}}"></script>
<script src="{{url('/js/rs-plugin/js/jquery.themepunch.plugins.min.js')}}"></script>
<script src="{{url('/js/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{url('/js/waypoints.min.js')}}"></script>
<script src="{{url('/js/jquery.fullPage.min.js')}}"></script>
<script src="{{url('/js/scripts.js')}}"></script>

<script>
    $(document).ready(function() {
        appMaster.preLoader();
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#fullpage').fullpage({
            sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'],
            anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage', '5thpage', 'lastPage'],
            menu: '#menu',
            css3: true,
            scrollingSpeed: 1000,
            scrollBar: true
        });
    });
</script>
{!! Rapyd::scripts() !!}
@yield('content')
</body>

</html>
