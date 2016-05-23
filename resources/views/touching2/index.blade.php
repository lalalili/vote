<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>感動服務</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ url('/touching/css/bootstrap.css') }}">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ url('/touching/css/main.css') }}">
    <link rel="stylesheet" href="{{ url('/touching/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ url('/touching/css/animate-custom.css') }}">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet'
          type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="{{ url('/touching/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/touching/js/modernizr.custom.js') }}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ url('/touching/js/html5shiv.js') }}"></script>
    <script src="{{ url('/touching/js/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body data-spy="scroll" data-offset="0" data-target="#navbar-main">


<div id="navbar-main">
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <ul class="nav navbar-nav">
                    {{--<li><a href="#about" class="smoothScroll"> 北智捷</a></li>--}}
                    {{--<li><a href="#services" class="smoothScroll"> 桃智捷</a></li>--}}
                    {{--<li><a href="#team" class="smoothScroll"> 中智捷</a></li>--}}
                    {{--<li><a href="#portfolio" class="smoothScroll"> 南智捷</a></li>--}}
                    {{--<li><a href="#blog" class="smoothScroll"> 高智捷</a></li>--}}
                    <li><a href="#poll">投票</a>
                    </li>
                    <li><a href="#">感動服務</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container" id="home" name="home" style="margin-top: 50px">
    <div class="row">
        <div class="col-lg-12">
            <img class="img-responsive" src="{{ url('/touching/img/header_bg.jpg') }}" alt="">
            <h2 class="centered">{{ $title[0]->title1 }}</h2>
            <h2 class="centered">{{ $title[0]->title2 }}</h2>
            <h2 class="centered">{{ $title[0]->title3 }}</h2>
            <hr>
            <br>
        </div>
    </div>
</div>

@foreach($stories as $story)
    <div class="container" id="{{ $story->id.'_'.$story->area }}" name="{{ $story->id.'_'.$story->area }}">
        <!-- ==== SECTION DIVIDER1 -->
        {{--<section class="section-divider textdivider divider1">--}}
        {{--<div class="container">--}}
        {{--<h1>北智捷感動服務</h1>--}}
        {{--<hr>--}}
        {{--<h1>LUXGEN ! 使命必達 !</h1>--}}
        {{--</div><!-- container -->--}}
        {{--</section><!-- section -->--}}


        <div class="row">
            <h2 class="centered">{{$story->area}}</h2>
            <h3 class="centered">{{$story->slogn}}</h3>
            <hr>
            <h3 class="centered">執行據點：{{$story->store1}}</h3>
            @if( ! empty($story->store2))
                <h3 class="centered">執行據點：{{$story->store2}}</h3>
            @endif
            @if( ! empty($story->store3))
                <h3 class="centered">執行據點：{{$story->store3}}</h3>
            @endif
            <h3 class="centered">執行同仁：{{$story->employee1}}</h3>
            @if( ! empty($story->employee2))
                <h3 class="centered">執行同仁：{{$story->employee2}}</h3>
            @endif
            @if( ! empty($story->employee3))
                <h3 class="centered">執行同仁：{{$story->employee3}}</h3>
            @endif
            @if( ! empty($story->employee4))
                <h3 class="centered">執行同仁：{{$story->employee4}}</h3>
            @endif
            @if( ! empty($story->employee5))
                <h3 class="centered">執行同仁：{{$story->employee5}}</h3>
            @endif
            <h3 class="centered">車主姓名：{{$story->customer1}}</h3>
            @if( ! empty($story->customer2))
                <h3 class="centered">車主姓名：{{$story->customer2}}</h3>
            @endif
            @if( ! empty($story->customer3))
                <h3 class="centered">車主姓名：{{$story->customer3}}</h3>
            @endif
            @if( ! empty($story->customer4))
                <h3 class="centered">車主姓名：{{$story->customer4}}</h3>
            @endif
            @if( ! empty($story->customer5))
                <h3 class="centered">車主姓名：{{$story->customer5}}</h3>
            @endif
            {{--<h3 class="centered">執行日期：{{$story->date1}}</h3>--}}
            {{--@if( ! empty($story->date2))--}}
                {{--<h3 class="centered">執行日期：{{$story->date2}}</h3>--}}
            {{--@endif--}}
            {{--@if( ! empty($story->date3))--}}
                {{--<h3 class="centered">執行日期：{{$story->date3}}</h3>--}}
            {{--@endif--}}
            <br>
            <br>
        </div><!-- row -->

        <div class="row">
            <h3 class="centered">感動案例經過</h3>
            <hr>
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
                <h3>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$story->story1}}
                    <br>
                </h3>
                @if( ! empty($story->story2))
                    <h3>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$story->story2}}
                        <br>
                    </h3>
                @endif
                @if( ! empty($story->story3))
                    <h3>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$story->story3}}
                        <br>
                    </h3>
                @endif
                @if( ! empty($story->story4))
                    <h3>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$story->story4}}
                        <br>
                    </h3>
                @endif
                @if( ! empty($story->story5))
                    <h3>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$story->story5}}
                        <br>
                    </h3>
                @endif
                @if( ! empty($story->story6))
                    <h3>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$story->story6}}
                        <br>
                    </h3>
                @endif
                @if( ! empty($story->story7))
                    <h3>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$story->story7}}
                        <br>
                    </h3>
                @endif
                @if( ! empty($story->story8))
                    <h3>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$story->story8}}
                        <br>
                    </h3>
                @endif
                @if( ! empty($story->story9))
                    <h3>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$story->story9}}
                        <br>
                    </h3>
                @endif
                @if( ! empty($story->story10))
                    <h3>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$story->story10}}
                        <br>
                    </h3>
                @endif
                <br>
            </div>
            <div class="col-lg-2">
            </div>
        </div><!-- row -->

        <div class="row">
            <h3 class="centered">感動案例4T說明</h3>
            <hr>
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
                <ul>
                    <li><h3>預先設想Thinking</h3></li>
                    <h3>{{$story->thinking}}</h3>
                    <br>
                    <li><h3>超越期待Touching</h3></li>
                    <h3>{{$story->touching}}</h3>
                    <br>

                    <li><h3>同理心Treating</h3></li>
                    <h3>{{$story->treating}}</h3>
                    <br>
                    <li><h3>感動關鍵時刻Timing</h3></li>
                    <h3>{{$story->timing}}</h3>
                    <br><br>
                </ul>
            </div>
            <div class="col-lg-2">
            </div>
        </div><!-- row -->

        <div class="row">
            <h2 class="centered">感動服務照片</h2>
            <hr>
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
                <div class="grid mask">
                    <figure>
                        <img class="img-responsive" src="{{ url('/uploads/images/story/'.$story->pic1) }}" alt="">
                        {{--<figcaption>--}}
                        {{--<h5>原始圖片</h5>--}}
                        {{--<a data-toggle="modal" href="#myModal" class="btn btn-primary btn-lg">檢視</a>--}}
                        {{--</figcaption><!-- /figcaption -->--}}
                    </figure><!-- /figure -->
                </div><!-- /grid-mask -->
                @if( ! empty($story->pic1_note))
                    <h3>
                        <h3 class="centered">{{$story->pic1_note}}</h3>
                    </h3>
                @endif
            </div>
            <div class="col-lg-2">
            </div>
            <br>
        </div>
        @if( ! empty($story->pic2))
            <div class="row">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8">
                    <div class="grid mask">
                        <figure>
                            <img class="img-responsive" src="{{ url('/uploads/images/story/'.$story->pic2) }}" alt="">
                        </figure><!-- /figure -->
                    </div><!-- /grid-mask -->
                    @if( ! empty($story->pic2_note))
                        <h3>
                            <h3 class="centered">{{$story->pic2_note}}</h3>
                        </h3>
                    @endif
                </div>
                <div class="col-lg-2">
                </div>
                <br>
                <br>
            </div>
        @endif
        @if( ! empty($story->pic3))
            <div class="row">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8">
                    <div class="grid mask">
                        <figure>
                            <img class="img-responsive" src="{{ url('/uploads/images/story/'.$story->pic3) }}" alt="">
                        </figure><!-- /figure -->
                    </div><!-- /grid-mask -->
                    @if( ! empty($story->pic3_note))
                        <h3>
                            <h3 class="centered">{{$story->pic3_note}}</h3>
                        </h3>
                    @endif
                </div>
                <div class="col-lg-2">
                </div>
                <br>
            </div>
        @endif
        @if( ! empty($story->pic4))
            <div class="row">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8">
                    <div class="grid mask">
                        <figure>
                            <img class="img-responsive" src="{{ url('/uploads/images/story/'.$story->pic4) }}" alt="">
                        </figure><!-- /figure -->
                    </div><!-- /grid-mask -->
                    @if( ! empty($story->pic1_note))
                        <h3>
                            <h3 class="centered">{{$story->pic4_note}}</h3>
                        </h3>
                    @endif
                </div>
                <div class="col-lg-2">
                </div>
                <br>
            </div>
        @endif
        @if( ! empty($story->pic5))
            <div class="row">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8">
                    <div class="grid mask">
                        <figure>
                            <img class="img-responsive" src="{{ url('/uploads/images/story/'.$story->pic5) }}" alt="">
                        </figure><!-- /figure -->
                    </div><!-- /grid-mask -->
                    @if( ! empty($story->pic1_note))
                        <h3>
                            <h3 class="centered">{{$story->pic5_note}}</h3>
                        </h3>
                    @endif
                </div>
                <div class="col-lg-2">
                </div>
                <br>
            </div>
        @endif
        <br>
        <hr>
    </div>
@endforeach
<section id="poll">
    <div class="wrapper">
        <section id="support" class="doublediagonal">
            <div class="container">
                <div class="section-heading scrollpoint sp-effect3">
                    <br/><br/>
                    <h2>感動服務票選活動</h2>
                    <h3>請選出最觸動您心的真實感動故事，您寶貴的意見，將是對第一線同仁最好的鼓勵!!</h3>
                    <div class="container">
                        <table class="table table-bordered">
                            <thead>
                            <tr><h3>{{ $title[0]->title1.$title[0]->title2.$title[0]->title3 }}</h3></tr>
                            <tr>
                                <th style="text-align:center; width:10%">經銷商</th>
                                <th style="text-align:center; width:15%">據點</th>
                                <th style="text-align:center; width:15%">人員</th>
                                <th style="text-align:center; width:20%">主題</th>
                                <th style="text-align:center; width:40%">內容</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stories as $story)
                                <tr>
                                    <td>{{ $story->area }}</td>
                                    <td>{{ $story->store1}}
                                        @if( ! empty($story->store2))
                                            <br>
                                            {{ $story->store2}}
                                        @endif
                                        @if( ! empty($story->store3))
                                            <br>
                                            {{ $story->store3}}
                                        @endif
                                    </td>
                                    <td>{{ $story->employee1 }}
                                        @if( ! empty($story->employee2))
                                            <br>
                                            {{ $story->employee2}}
                                        @endif
                                        @if( ! empty($story->employee3))
                                            <br>
                                            {{ $story->employee3}}
                                        @endif
                                        @if( ! empty($story->employee4))
                                            <br>
                                            {{ $story->employee4}}
                                        @endif
                                        @if( ! empty($story->employee5))
                                            <br>
                                            {{ $story->employee5}}
                                        @endif
                                    </td>
                                    <td>{{ $story->slogn }}</td>
                                    <td>{{ $story->summary }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="row">
                    @include('flash::message')
                </div>
                <div class="row" style="margin-top: -15px">
                    <form role="form" action="{{url('/touching/poll')}}" method="post">
                        <div class="panel-body">
                            <label>
                                <b style="color: red">*</b> 請排序您心目中的第一到第五名 :
                            </label>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                    <tr>
                                        @if ($count < 6)
                                            <th style="text-align:center; width:10%"> 名次</th>
                                            @foreach($stories as $story)
                                                <th style="text-align:center; width:18%">{{ $story->note1 }}
                                                    <br>{{ $story->area }}<br>{{ $story->store1 }}
                                            @endforeach
                                        @else
                                            <th style="text-align:center; width:4%"> 名次</th>
                                            @foreach($stories as $story)
                                                <th style="text-align:center; width:8%">{{ $story->note1 }}
                                                    <br>{{ $story->area }}<br>{{ $story->store1 }}
                                            @endforeach
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <div class="form-group">
                                        <tr style="vertical-align:middle; text-align:center">
                                            <td>第一名</td>
                                            @foreach($stories as $story)
                                                <td><input class="{{$story->id}}"
                                                           value="{{$story->area}}_{{$story->store1}}"
                                                           type="checkbox" name="r1[]"></td>
                                            @endforeach
                                        </tr>
                                    </div>
                                    <div class="form-group">
                                        <tr style="vertical-align:middle; text-align:center">
                                            <td>第二名</td>
                                            @foreach($stories as $story)
                                                <td><input class="{{$story->id}}"
                                                           value="{{$story->area}}_{{$story->store1}}"
                                                           type="checkbox" name="r2[]"></td>
                                            @endforeach
                                        </tr>
                                    </div>
                                    <div class="form-group">
                                        <tr style="vertical-align:middle; text-align:center">
                                            <td>第三名</td>
                                            @foreach($stories as $story)
                                                <td><input class="{{$story->id}}"
                                                           value="{{$story->area}}_{{$story->store1}}"
                                                           type="checkbox" name="r3[]"></td>
                                            @endforeach
                                        </tr>
                                    </div>
                                    <div class="form-group">
                                        <tr style="vertical-align:middle; text-align:center">
                                            <td>第四名</td>
                                            @foreach($stories as $story)
                                                <td><input class="{{$story->id}}"
                                                           alue="{{$story->area}}_{{$story->store1}}"
                                                           type="checkbox" name="r4[]"></td>
                                            @endforeach
                                        </tr>
                                    </div>
                                    <div class="form-group">
                                        <tr style="vertical-align:middle; text-align:center">
                                            <td>第五名</td>
                                            @foreach($stories as $story)
                                                <td><input class="{{$story->id}}"
                                                           value="{{$story->area}}_{{$story->store1}}"
                                                           type="checkbox" name="r5[]"></td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>

                        <div class="form-group">
                            <label>
                                <b style="color: red">*</b> 請選擇您的部門 :
                            </label>
                            <select class="form-control" name="dep" style="height: 50px; width:50%">
                                <option value="">---請選擇---</option>
                                <option value="銷售部">銷售部</option>
                                <option value="財務部">財務部</option>
                                <option value="零件服務部">零件服務部</option>
                                <option value="顧客滿意部">顧客滿意部</option>
                                <option value="行政企劃部">行政企劃部</option>
                                <option value="外銷業務部">外銷業務部</option>
                                <option value="品牌企劃部">品牌企劃部</option>
                                <option value="電動車部">電動車部</option>
                                <option value="公關暨品牌推廣部">公關暨品牌推廣部</option>
                                <option value="總經理室">總經理室</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>
                                <b style="color: red">*</b> 請填寫您的姓名 :
                            </label>
                            <input class="form-control" name="name" value="{{old('name')}}"
                                   style="height: 50px; width:50%">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">送出</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</section>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->


<script type="text/javascript" src="{{ url('/touching/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ url('/touching/js/retina.js') }}"></script>
<script type="text/javascript" src="{{ url('/touching/js/jquery.easing.1.3.js') }}"></script>
<script type="text/javascript" src="{{ url('/touching/js/smoothscroll.js') }}"></script>
<script type="text/javascript" src="{{ url('/touching/js/jquery-func.js') }}"></script>
<script>
    $("input:checkbox").click(function () {
        var group = "input:checkbox[class='" + $(this).attr("class") + "']";
        $(group).prop("checked", false);
        $(this).prop("checked", true);
    });
</script>
</body>
</html>
