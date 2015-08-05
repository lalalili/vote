@extends('app')

@section('content')
    <div class="pre-loader">
        <div class="load-con">
            <img src="{{url('/img/freeze/logo.png')}}" class="animated fadeInDown" alt="">

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
                    <a class="navbar-brand" href="index.html">
                        <img src="{{url('/img/freeze/logo.png')}}" alt="" class="logo">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="getApp" href="/">回到首頁</a>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-->
        </nav>

    </header>
    <div class="wrapper">

        <section id="support" class="doublediagonal">
            <div class="container">
                <div class="section-heading scrollpoint sp-effect3">
                    <h1>微笑大使票選</h1>

                    <div class="divider"></div>
                </div>
                <div class="row">
                    <div class="container">
                        @include('flash::message')
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8 col-sm-8 scrollpoint sp-effect1">
                                <form role="form" action="pull" method="post">
                                    <div class="form-group">
                                        <h5>您選擇的最佳微笑大使：</h5>
                                        <input type="text" class="form-control"  readonly value="{{ $to->name }}" name="voteTo">
                                    </div>
                                    <div class="form-group">
                                        <h5>姓名 * :</h5>
                                        <input type="text" class="form-control"  name="name">
                                    </div>
                                    <div class="form-group">
                                        <h5>電話 * :</h5>
                                        <input type="text" class="form-control" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label style="font-size: 2em">
                                                <input type="checkbox" name="q1">
                                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                我已經閱讀並了解活動內容說明，並提供個人資料於符合個資聲明知範圍內被蒐集處理與利用。
                                            </label>
                                        </div>
                                        {{--<input type="checkbox" class="form-control" name="q1">進入生活館/服務廠時，服務人員能夠主動服務 立即接待--}}
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg">送出</button>
                                </form>
                            </div>
                            {{--<div class="col-md-4 col-sm-4 contact-details scrollpoint sp-effect2">--}}
                                {{--<div class="media">--}}
                                    {{--<a class="pull-left" href="#">--}}
                                        {{--<i class="fa fa-map-marker fa-2x"></i>--}}
                                    {{--</a>--}}

                                    {{--<div class="media-body">--}}
                                        {{--<h4 class="media-heading">--}}
                                        {{--</h4>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="media">--}}
                                    {{--<a class="pull-left" href="#">--}}
                                        {{--<i class="fa fa-envelope fa-2x"></i>--}}
                                    {{--</a>--}}

                                    {{--<div class="media-body">--}}
                                        {{--<h4 class="media-heading">--}}
                                            {{--<a href="mailto:support@oleose.com">support@oleose.com</a>--}}
                                        {{--</h4>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="media">--}}
                                    {{--<a class="pull-left" href="#">--}}
                                        {{--<i class="fa fa-phone fa-2x"></i>--}}
                                    {{--</a>--}}

                                    {{--<div class="media-body">--}}
                                        {{--<h4 class="media-heading">+1 234 567890</h4>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection