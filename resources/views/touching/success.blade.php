<!DOCTYPE html>
<html lang="utf8">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Cover Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ url('/touching/css/bootstrap.css') }}">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" href="{{ url('/touching/css/ie10-viewport-bug-workaround.css') }}">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ url('/touching/css/cover.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="site-wrapper">

    <div class="site-wrapper-inner">

        <div class="cover-container">

            <div class="masthead clearfix">
                <div class="inner">
                    <div class="masthead-brand">
                        <img src="{{url('/images/freeze/logo.png')}}" alt="" class="logo">
                    </div>

                    {{--<h3 class="masthead-brand"></h3>--}}
                    {{--<nav>--}}
                    {{--<ul class="nav masthead-nav">--}}
                    {{--<li class="active"><a href="#">Home</a></li>--}}
                    {{--<li><a href="#">Features</a></li>--}}
                    {{--<li><a href="#">Contact</a></li>--}}
                    {{--</ul>--}}
                    {{--</nav>--}}
                </div>
            </div>

            <div class="inner cover">
                <h1 class="cover-heading">投票完成</h1>
                <h1 class="cover-heading">感謝您的寶貴時間</h1>
                {{--<p class="lead">感謝您的寶貴時間</p>--}}
                {{--<p class="lead">--}}
                {{--<a href="#" class="btn btn-lg btn-default">Learn more</a>--}}
                {{--</p>--}}
            </div>

            {{--<div class="mastfoot">--}}
            {{--<div class="inner">--}}
            {{--<p>Cover template for <a href="http://getbootstrap.com">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>--}}
            {{--</div>--}}
            {{--</div>--}}

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ url('/touching/js/jquery.min.js') }}"></script>
<script>window.jQuery || document.write('<script src="{{ url('/touching/js/jquery.min.js') }}"><\/script>')</script>
<script type="text/javascript" src="{{ url('/touching/js/bootstrap.min.js') }}"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script type="text/javascript" src="{{ url('/touching/js/ie10-viewport-bug-workaround.js') }}"></script>
</body>
</html>
