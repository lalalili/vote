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
    <!-- /.container-->
    <section id="show">
        <div class="wrapper">
            <section id="vote" class="doublediagonal">
                <div class="container">
                    <div class="section-heading scrollpoint sp-effect3">
                        <br/><br/>
                        <h2>請點選最佳微笑大使照片開始投票</h2>
                    </div>
                    @if($lists->count() > 3)
                        @foreach($lists->chunk(3) as $list3)
                            <div class="row">
                                @foreach($list3 as $list)
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <div class="about-item scrollpoint sp-effect2"
                                             style="display:table-cell; vertical-align:middle; text-align:center">
                                            <i><a href="/choose/{{ $list->id }}"><img class="img-circle img-responsive"
                                                                                      align="top"
                                                                                      src="/uploads/demo/user/{{ $list->path }}"
                                                                                      alt=""></a></i>
                                            <h3>{{ $list->title->name }}</h3>
                                            <h4>{{ $list->name }}</h4>
                                            <BR>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    @else
                        <div class="row">
                            @foreach($lists as $list)
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="about-item scrollpoint sp-effect2"
                                         style="display:table-cell; vertical-align:middle; text-align:center">
                                        <i><a href="/choose/{{ $list->id }}"><img
                                                        class="img-circle img-responsive"
                                                        src="/uploads/demo/user/{{ $list->path }}"
                                                        alt=""></a></i>
                                        <h3>{{ $list->title->name }}</h3>
                                        <p>{{ $list->name }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </section>
        </div>
    </section>
@endsection