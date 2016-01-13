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
    <nav class="navbar navbar-default2 navbar-fixed-top" role="navigation">
        <div class="container2">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="fa fa-bars fa-lg"></span>
                </button>
                {{--<a class="navbar-brand">--}}
                {{--<img src="{{url('/images/freeze/logo.png')}}" alt="" class="logo">--}}
                {{--</a>--}}
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav2 navbar-left">
                    <li><a href="#poll">投票</a>
                    </li>
                    <li><a href="#">感動服務</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-->
    </nav>
</header>
<div class="wrapper">
    <section id="touching">
        <div class="container">
            {{--<div class="section-heading inverse scrollpoint sp-effect3">--}}
            {{--<br>--}}
            {{--</div>--}}
            <br>
            @foreach($lists as $list)
                <div class="row">
                    <img class="img-responsive" src="/uploads/touch/{{ $list->name }}">
                </div>
                <br>
            @endforeach
        </div>
    </section>
    <section id="poll">
        <div class="wrapper">
            <section id="support" class="doublediagonal">
                <div class="container">
                    <div class="section-heading scrollpoint sp-effect3">
                        <br/><br/>

                        <h2>感動服務票選活動</h2>

                        <h3>請選出最觸動您心的真實感動故事，您寶貴的意見，將是對第一線同仁最好的鼓勵!!</h3>
                        {{--<div class="divider"></div>--}}
                        <div class="row">
                            <img class="img-responsive" src="/uploads/touch/topic.png">
                        </div>
                    </div>
                    <div class="container" style="margin-top: -45px">
                        @include('flash::message')
                    </div>
                    <div class="row" style="margin-top: -15px">
                        <div class="scrollpoint sp-effect1" style="font-size: 18px">
                            <form role="form" action="{{url('/touching/poll_yearly')}}" method="post">
                                <div class="panel-body">
                                    <label>
                                        <b style="color: red">*</b> 請排序您心目中的第一到第五名 :
                                    </label>

                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover"
                                               style="display:table-cell; vertical-align:middle; text-align:center">
                                            <thead>
                                            <tr>
                                                <th> 名次</th>
                                                <th>1月<br>北智捷<br>新店廠</th>
                                                <th>2月<br>北智捷<br>土城廠</th>
                                                <th>3月<br>高智捷<br>博愛廠</th>
                                                <th>4月<br>南智捷<br>中華館</th>
                                                <th>5月<br>北智捷<br>花蓮廠<br>土城廠</th>
                                                <th>6月<br>高智捷<br>鳳山廠</th>
                                                <th>7月<br>桃智捷<br>桃鶯廠</th>
                                                <th>8月<br>北智捷<br>北投廠</th>
                                                <th>9月<br>高智捷<br>大中館</th>
                                                <th>10月<br>中智捷<br>南台中館</th>
                                                <th>11月<br>北智捷<br>濱江廠</th>
                                                <th>11月<br>高智捷<br>屏東館</th>
                                                <th>12月<br>中智捷<br>豐原館</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <div class="form-group">
                                                <tr>
                                                    <td>第一名</td>
                                                    <td><input value="1月特優-北智捷-新店廠" type="radio" class="s1" name="r1">
                                                    </td>
                                                    <td><input value="2月特優-北智捷-土城廠" type="radio" class="s2" name="r1">
                                                    </td>
                                                    <td><input value="3月特優-高智捷-博愛廠" type="radio" class="s3" name="r1">
                                                    </td>
                                                    <td><input value="4月特優-南智捷-中華館" type="radio" class="s4" name="r1">
                                                    </td>
                                                    <td><input value="5月特優-北智捷-花蓮廠 土城廠" type="radio" class="s5"
                                                               name="r1"></td>
                                                    <td><input value="6月特優-高智捷-鳳山廠" type="radio" class="s6" name="r1">
                                                    </td>
                                                    <td><input value="7月特優-桃智捷-桃鶯廠" type="radio" class="s7" name="r1">
                                                    </td>
                                                    <td><input value="8月特優-北智捷-北投廠" type="radio" class="s8" name="r1">
                                                    </td>
                                                    <td><input value="9月特優-高智捷-大中館" type="radio" class="s9" name="r1">
                                                    </td>
                                                    <td><input value="10月特優-中智捷-南台中館" type="radio" class="s10" name="r1">
                                                    </td>
                                                    <td><input value="11月特優-北智捷-濱江廠" type="radio" class="s11" name="r1">
                                                    </td>
                                                    <td><input value="11月特優-高智捷-屏東館" type="radio" class="s12" name="r1">
                                                    </td>
                                                    <td><input value="12月特優-中智捷-豐原館" type="radio" class="s13" name="r1">
                                                    </td>
                                                </tr>
                                            </div>
                                            <div class="form-group">
                                                <tr>
                                                    <td>第二名</td>
                                                    <td><input value="1月特優-北智捷-新店廠" type="radio" class="s1" name="r2">
                                                    </td>
                                                    <td><input value="2月特優-北智捷-土城廠" type="radio" class="ts2" name="r2">
                                                    </td>
                                                    <td><input value="3月特優-高智捷-博愛廠" type="radio" class="s3" name="r2">
                                                    </td>
                                                    <td><input value="4月特優-南智捷-中華館" type="radio" class="s4" name="r2">
                                                    </td>
                                                    <td><input value="5月特優-北智捷-花蓮廠 土城廠" type="radio" class="s5"
                                                               name="r2"></td>
                                                    <td><input value="6月特優-高智捷-鳳山廠" type="radio" class="s6" name="r2">
                                                    </td>
                                                    <td><input value="7月特優-桃智捷-桃鶯廠" type="radio" class="s7" name="r2">
                                                    </td>
                                                    <td><input value="8月特優-北智捷-北投廠" type="radio" class="s8" name="r2">
                                                    </td>
                                                    <td><input value="9月特優-高智捷-大中館" type="radio" class="s9" name="r2">
                                                    </td>
                                                    <td><input value="10月特優-中智捷-南台中館" type="radio" class="s10" name="r2">
                                                    </td>
                                                    <td><input value="11月特優-北智捷-濱江廠" type="radio" class="s11" name="r2">
                                                    </td>
                                                    <td><input value="11月特優-高智捷-屏東館" type="radio" class="s12" name="r2">
                                                    </td>
                                                    <td><input value="12月特優-中智捷-豐原館" type="radio" class="s13" name="r2">
                                                    </td>
                                                </tr>
                                            </div>
                                            <div class="form-group">
                                                <tr>
                                                    <td>第三名</td>
                                                    <td><input value="1月特優-北智捷-新店廠" type="radio" class="s1" name="r3">
                                                    </td>
                                                    <td><input value="2月特優-北智捷-土城廠" type="radio" class="s2" name="r3">
                                                    </td>
                                                    <td><input value="3月特優-高智捷-博愛廠" type="radio" class="s3" name="r3">
                                                    </td>
                                                    <td><input value="4月特優-南智捷-中華館" type="radio" class="s4" name="r3">
                                                    </td>
                                                    <td><input value="5月特優-北智捷-花蓮廠 土城廠" type="radio" class="s5"
                                                               name="r3"></td>
                                                    <td><input value="6月特優-高智捷-鳳山廠" type="radio" class="s6" name="r3">
                                                    </td>
                                                    <td><input value="7月特優-桃智捷-桃鶯廠" type="radio" class="s7" name="r3">
                                                    </td>
                                                    <td><input value="8月特優-北智捷-北投廠" type="radio" class="s8" name="r3">
                                                    </td>
                                                    <td><input value="9月特優-高智捷-大中館" type="radio" class="s9" name="r3">
                                                    </td>
                                                    <td><input value="10月特優-中智捷-南台中館" type="radio" class="s10" name="r3">
                                                    </td>
                                                    <td><input value="11月特優-北智捷-濱江廠" type="radio" class="s11" name="r3">
                                                    </td>
                                                    <td><input value="11月特優-高智捷-屏東館" type="radio" class="s12" name="r3">
                                                    </td>
                                                    <td><input value="12月特優-中智捷-豐原館" type="radio" class="s13" name="r3">
                                                    </td>
                                                </tr>
                                            </div>
                                            <div class="form-group">
                                                <tr>
                                                    <td>第四名</td>
                                                    <td><input value="1月特優-北智捷-新店廠" type="radio" class="s1" name="r4">
                                                    </td>
                                                    <td><input value="2月特優-北智捷-土城廠" type="radio" class="s2" name="r4">
                                                    </td>
                                                    <td><input value="3月特優-高智捷-博愛廠" type="radio" class="s3" name="r4">
                                                    </td>
                                                    <td><input value="4月特優-南智捷-中華館" type="radio" class="s4" name="r4">
                                                    </td>
                                                    <td><input value="5月特優-北智捷-花蓮廠 土城廠" type="radio" class="s5"
                                                               name="r4"></td>
                                                    <td><input value="6月特優-高智捷-鳳山廠" type="radio" class="s6" name="r4">
                                                    </td>
                                                    <td><input value="7月特優-桃智捷-桃鶯廠" type="radio" class="s7" name="r4">
                                                    </td>
                                                    <td><input value="8月特優-北智捷-北投廠" type="radio" class="s8" name="r4">
                                                    </td>
                                                    <td><input value="9月特優-高智捷-大中館" type="radio" class="s9" name="r4">
                                                    </td>
                                                    <td><input value="10月特優-中智捷-南台中館" type="radio" class="s10" name="r4">
                                                    </td>
                                                    <td><input value="11月特優-北智捷-濱江廠" type="radio" class="s11" name="r4">
                                                    </td>
                                                    <td><input value="11月特優-高智捷-屏東館" type="radio" class="s12" name="r4">
                                                    </td>
                                                    <td><input value="12月特優-中智捷-豐原館" type="radio" class="s13" name="r4">
                                                    </td>
                                                </tr>
                                            </div>
                                            <div class="form-group">
                                                <tr>
                                                    <td>第五名</td>
                                                    <td><input value="1月特優-北智捷-新店廠" type="radio" class="s1" name="r5">
                                                    </td>
                                                    <td><input value="2月特優-北智捷-土城廠" type="radio" class="s2" name="r5">
                                                    </td>
                                                    <td><input value="3月特優-高智捷-博愛廠" type="radio" class="s3" name="r5">
                                                    </td>
                                                    <td><input value="4月特優-南智捷-中華館" type="radio" class="s4" name="r5">
                                                    </td>
                                                    <td><input value="5月特優-北智捷-花蓮廠 土城廠" type="radio" class="s5"
                                                               name="r5"></td>
                                                    <td><input value="6月特優-高智捷-鳳山廠" type="radio" class="s6" name="r5">
                                                    </td>
                                                    <td><input value="7月特優-桃智捷-桃鶯廠" type="radio" class="s7" name="r5">
                                                    </td>
                                                    <td><input value="8月特優-北智捷-北投廠" type="radio" class="s8" name="r5">
                                                    </td>
                                                    <td><input value="9月特優-高智捷-大中館" type="radio" class="s9" name="r5">
                                                    </td>
                                                    <td><input value="10月特優-中智捷-南台中館" type="radio" class="s10" name="r5">
                                                    </td>
                                                    <td><input value="11月特優-北智捷-濱江廠" type="radio" class="s11" name="r5">
                                                    </td>
                                                    <td><input value="11月特優-高智捷-屏東館" type="radio" class="s12" name="r5">
                                                    </td>
                                                    <td><input value="12月特優-中智捷-豐原館" type="radio" class="s13" name="r5">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <label>
                                    <b style="color: red">*</b> 請填寫您的大名 :
                                </label>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg">送出</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
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
