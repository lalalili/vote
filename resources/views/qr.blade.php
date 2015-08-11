@extends('app')

@section('content')
    {{--<div class="pre-loader">--}}
        {{--<div class="load-con">--}}
            {{--<img src="{{url('/img/freeze/logo.png')}}" class="animated fadeInDown" alt="">--}}

            {{--<div class="spinner">--}}
                {{--<div class="bounce1"></div>--}}
                {{--<div class="bounce2"></div>--}}
                {{--<div class="bounce3"></div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<header>--}}

        {{--<nav class="navbar navbar-default navbar-fixed-top" role="navigation">--}}
            {{--<div class="container">--}}
                {{--<!-- Brand and toggle get grouped for better mobile display -->--}}
                {{--<div class="navbar-header">--}}
                    {{--<button type="button" class="navbar-toggle" data-toggle="collapse"--}}
                            {{--data-target="#bs-example-navbar-collapse-1">--}}
                        {{--<span class="fa fa-bars fa-lg"></span>--}}
                    {{--</button>--}}
                    {{--<a class="navbar-brand" href="index.html">--}}
                        {{--<img src="{{url('/img/freeze/logo.png')}}" alt="" class="logo">--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<!-- /.navbar-collapse -->--}}
            {{--</div>--}}
            {{--<!-- /.container-->--}}
        {{--</nav>--}}

    {{--</header>--}}
    <!-- /.container-->

    <ul id="menu">
        <li data-menuanchor="firstPage" class="active"><a href="#firstPage">北智捷</a></li>
        <li data-menuanchor="secondPage"><a href="#secondPage">桃智捷</a></li>
        <li data-menuanchor="3rdPage"><a href="#3rdPage">中智捷</a></li>
        <li data-menuanchor="4thpage"><a href="#4thpage">南智捷</a></li>
        <li data-menuanchor="5thpage"><a href="#5thpage">高智捷</a></li>

    </ul>

    <div id="fullpage">

        <div class="section active" id="section0">
            <section id="show">
                <div class="wrapper">
                    <section id="vote" class="doublediagonal">
                        <div class="container">
                            <div class="section-heading scrollpoint sp-effect3">
                                <br/><br/>

                                <h2>北智捷</h2>
                            </div>
                                @foreach($lists1->chunk(3) as $list3)
                                    <div class="row">
                                        @foreach($list3 as $list)
                                            <div class="col-md-4 col-sm-4 col-xs-4">
                                                <div class="about-item scrollpoint sp-effect2"
                                                     style="display:table-cell; vertical-align:middle; text-align:center">
                                                    <i><a href="/store/{{ $list->id }}"><img class="img-circle img-responsive"
                                                                                              align="top"
                                                                                              src="/uploads/demo/{{ $list->path }}"
                                                                                              alt=""></a></i>
                                                    <h3>{{ $list->name }}</h3>
                                                    <BR>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                        </div>
                    </section>
                </div>
            </section>
        </div>
        <div class="section" id="section1">
            <h1>桃智捷</h1>
        </div>
        <div class="section" id="section2">
            <h1>中智捷</h1>
        </div>
        <div class="section" id="section3">
            <h1>南智捷</h1>
        </div>
        <div class="section" id="section4">
            <h1>高智捷</h1>
        </div>
    </div>

@endsection