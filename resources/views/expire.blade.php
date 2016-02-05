@extends('app')

@section('content')
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
                    <a class="navbar-brand" href="{{ URL::previous() }}">
                        <img src="{{url('/images/freeze/logo.png')}}" alt="" class="logo">
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="getApp" href="{{ URL::previous() }}">回上一頁</a>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-->
        </nav>
    </header>
    <section id="pull">
        <div class="wrapper">
            <section id="support" class="doublediagonal">
                <div class="container">
                    <div class="section-heading scrollpoint sp-effect3">
                        <br/><br/>

                        <h2>禮貌大使票選</h2>

                        <div class="divider"></div>
                    </div>
                    <div class="row">
                        <div class="container">
                            @include('flash::message')
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <h1>活動已截止，感謝您的參與</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection