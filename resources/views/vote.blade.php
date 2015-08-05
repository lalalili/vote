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
    <!-- /.container-->

    <div class="wrapper">
        <section id="vote" class="doublediagonal">
            <div class="container">
                <div class="section-heading scrollpoint sp-effect3">
                    <p>請點選最佳服務人員照片開始投票</p>

                    <div class="divider"></div>
                </div>
                @foreach($lists->chunk(3) as $list3)
                    <div class="row">
                        @foreach($list3 as $list)
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <div class="about-item scrollpoint sp-effect2">
                                    <i><a href="/vote/{{ $list->id }}"><img class="img-circle img-responsive" src="uploads/demo/{{ $list->filename }}" alt="" ></a></i>

                                    <h3>{{ $list->album->name }}</h3>

                                    <p>{{ $list->name }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection