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
                                <div class="col-md-8 col-sm-8 scrollpoint sp-effect1">
                                    <form role="form" action="{{url('poll')}}" method="post">
                                        <div class="form-group">
                                            <h4><b style="color: red">*</b> 本據點最有禮的服務人員姓名：</h4>
                                            <input type="text" class="form-control" readonly value="{{ $to->name }}"
                                                   name="voteTo">
                                        </div>
                                        <div class="form-group">
                                            <h4><b style="color: red">*</b> 請填寫您的大名 :</h4>
                                            <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                        </div>
                                        <div class="form-group">
                                            <h4><b style="color: red">*</b> 請填寫您的電話 <br>( 攸關中獎權益，請提供您的真實電話。範例 手機 :
                                                0912345678 市話 :
                                                0212345678 ):</h4>
                                            <input type="text" class="form-control" name="phone"
                                                   value="{{old('phone')}}">
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label style="font-size: 20px">
                                                    <input type="checkbox" name="q1" value="1">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                    進入生活館/服務廠時，服務人員能夠主動服務並立即接待
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label style="font-size: 20px">
                                                    <input type="checkbox" name="q2" value="1">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                    我能感受到服務人員具有熱情與熱誠的服務態度
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label style="font-size: 20px">
                                                    <input type="checkbox" name="q3" value="1">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                    全程溝通中服務人員的傾聽及表達都能深得我心
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label style="font-size: 20px">
                                                    <input type="checkbox" name="q4" value="1">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                    <b style="color: red">*</b> 我已經閱讀並了解活動內容說明，並同意提供個人資料於符合<a
                                                            href="{{url('/pdpa')}}">個資聲明</a>範圍內被蒐集處理與利用
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="voteToID" value="{{ $to->id }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-lg">送出</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection