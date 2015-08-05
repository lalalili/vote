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

    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="fa fa-bars fa-lg"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{url('/img/freeze/logo.png')}}" alt="" class="logo">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="/">活動首頁</a>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <div class="wrapper">

        <section id="support" class="doublediagonal">
            <div class="container">
                <div class="section-heading scrollpoint sp-effect3">
                    {{--<h1>Support</h1>--}}

                    {{--<div class="divider"></div>--}}
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8 col-sm-8 scrollpoint sp-effect1">
                                <form role="form">
                                    <div class="form-group">
                                        <h5>你選擇的最佳服務人員：</h5>
                                        <input type="text" class="form-control"  readonly value="{{ $to->name }}" name="voteTo">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="請填姓名" name="name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="請填入電話" name="phone">
                                    </div>
                                    {{--<div class="form-group">--}}
                                        {{--<input type="checkbox" class="form-control" name="q1">進入生活館/服務廠時，服務人員能夠主動服務 立即接待--}}
                                    {{--</div>--}}
                                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                </form>
                            </div>
                            <div class="col-md-4 col-sm-4 contact-details scrollpoint sp-effect2">
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <i class="fa fa-map-marker fa-2x"></i>
                                    </a>

                                    <div class="media-body">
                                        <h4 class="media-heading">4, Some street, California, USA</h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <i class="fa fa-envelope fa-2x"></i>
                                    </a>

                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <a href="mailto:support@oleose.com">support@oleose.com</a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <i class="fa fa-phone fa-2x"></i>
                                    </a>

                                    <div class="media-body">
                                        <h4 class="media-heading">+1 234 567890</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection