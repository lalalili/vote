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
                    <a class="navbar-brand">
                        <img src="{{url('/images/freeze/logo.png')}}" alt="" class="logo">
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{url('/store')}}/{{$storeId}}">活動首頁</a>
                        </li>
                        <li><a href="#abouts">活動辦法</a>
                        </li>
                        <li><a href="#prize">獎品一覽</a>
                        </li>
                        {{--<li><a href="#lists">得獎名單</a>--}}
                        {{--</li>--}}
                        <li><a href="{{url('/show')}}/{{$storeId}}">投票去</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-->
        </nav>
        <!--RevSlider-->
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                    <!-- SLIDE  -->
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1500">
                        <!-- MAIN IMAGE -->
                        <img src="{{url('/images/transparent.png')}}" alt="slidebg1" data-bgfit="cover"
                             data-bgposition="left top" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption lfl fadeout hidden-xs"
                             data-x="left"
                             data-y="bottom"
                             data-hoffset="30"
                             data-voffset="0"
                             data-speed="500"
                             data-start="700"
                             data-easing="Power4.easeOut">
                            <img src="{{url('/images/freeze/Slides/thumb.png')}}" alt="">
                        </div>
                        <div class="tp-caption lfl fadeout visible-xs"
                             data-x="left"
                             data-y="center"
                             data-hoffset="700"
                             data-voffset="0"
                             data-speed="500"
                             data-start="700"
                             data-easing="Power4.easeOut">
                            <img src="{{url('/images/freeze/Slides/thumb_s.png')}}" alt="">
                        </div>
                        <div class="tp-caption large_white_bold sft" data-x="550" data-y="center" data-hoffset="0"
                             data-voffset="-80" data-speed="500" data-start="1200" data-easing="Power4.easeOut">
                            2015 Luxgen
                        </div>
                        <div class="tp-caption large_white_light sfb" data-x="550" data-y="center" data-hoffset="0"
                             data-voffset="0" data-speed="1000" data-start="1500" data-easing="Power4.easeOut">
                            禮貌大使票選活動
                        </div>
                        <div class="tp-caption sfb hidden-xs" data-x="550" data-y="center" data-hoffset="0"
                             data-voffset="185" data-speed="1000" data-start="1700" data-easing="Power4.easeOut">
                            <a href="#abouts" class="btn btn-primary inverse btn-lg">活動辦法</a>
                        </div>
                        <div class="tp-caption sfr" data-x="750" data-y="center" data-hoffset="0"
                             data-voffset="185" data-speed="1500" data-start="1900" data-easing="Power4.easeOut">
                            <a href="{{url('/show')}}/{{$storeId}}" class="btn btn-default btn-lg">投票去</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="wrapper">
        <section id="abouts">
            <div class="container">
                <div class="section-heading inverse scrollpoint sp-effect3">
                    <h1>活動辦法</h1>

                    <div class="divider"></div>
                    <h3>票選期間：2015/12/1 ~ 2016/01/31</h3>
                    <h4>本活動如有任何未盡事宜，<BR>LUXGEN保有修改活動內容、變更、暫停及解釋活動內容之權利，<BR>不另行書面通知參加此活動者與中獎者。</h4>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-push-1 scrollpoint sp-effect3">
                        <div class="about-filtering">
                            <div class="about">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="about-comment">
                                            <h4>1. 欲參加本活動之消費者，必須至生活館賞車並填寫客戶資料卡，或是返回服務廠有消費的客戶才具有抽獎資格</h4>
                                            <h4>2.
                                                參加本活動之消費者保證填寫或其提供之資料均為真實且正確，且未冒用或盜用任何第三人之資料。如有資料不實、不正確之情事或資料不全導致聯絡不上均將被取消參加資格。所有抽獎及中獎資格，須經LUXGEN驗證合格方為有效。</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="about rollitin">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="about-comment">
                                            <h4>3.
                                                本活動將由LUXGEN以電話通知得獎訊息，中獎者必須在領獎期間返回原投票之生活館/服務廠，填妥所有的領獎資料並提供相關證件(身份證正反面影本)方能領取獎品。如逾期或有造假情事，LUXGEN有權取消得獎人資格。抽獎券若有遺失、塗改、偽造、無法辨識或損毀之情況，均無法補發及不得參與抽獎活動。</h4>
                                            <h4>4.
                                                本活動贈品限中獎者本人兌換，恕不得要求折換現金或轉換其他等值商品。若中獎者不收受活動贈品時，視同放棄得獎權利，亦不得變更或折換現金。</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="about rollitin">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="about-comment">
                                            <h4>5. 參加者須同意接受本活動之活動辦法與注意事項之規範，如有違反，LUXGEN得取消其參加或得獎資格。</h4>
                                            <h4>6.
                                                依中華民國稅法規定，主辦單位將依法開具扣繳憑單給中獎者，贈與物品的價值將併入中獎人個人綜合所得稅申報。若所得總額超過NT1,001元，將於隔年寄發機會中獎扣繳憑單(得獎人須提供身分證影印本)若中獎者不願意提供資料，則視同放棄中獎資格，不另行通知，亦不進行候補。</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="prize">
            <div class="container">
                <div class="section-heading scrollpoint sp-effect3">
                    <h1>獎品一覽</h1>

                    <div class="divider"></div>
                    <h4>第一輪抽獎時間：2016/01/13，於2016/01/14起，電話通知得獎人</h4>
                    <h4>第二輪抽獎時間：2016/02/17，於2016/02/18起，電話通知得獎人</h4>
                    <h4>誠摯地邀請您給予表現最佳的服務人員/銷售人員一個鼓勵，</h4>
                    <h4>請立即掃描QR Code，投下您寶貴的一票，即可參加獎活動。</h4>
                    <h4>獎品內容/每月名額(每月抽出148名幸運兒)：</h4><br>
                    {{--</div>--}}
                    {{--<div class="row">--}}
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="about-item scrollpoint sp-effect2" style="display:table-cell; vertical-align:middle; text-align:center">
                            <i><img class="img-responsive" src="{{url('/images/prize/p1.png')}}" alt=""></i>
                            <h4>LUXGEN 5 Sedan 1:18模型車一個<br>(市值9,999元)<br>3名 / 月</h4>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="about-item scrollpoint sp-effect2" style="display:table-cell; vertical-align:middle; text-align:center">
                            <i><img class="img-responsive" src="{{url('/images/prize/p2.png')}}" alt=""></i>
                            <h4>LUXGEN 4G USB 隨身碟一個<br>(市值500元)<br>10名 / 月</h4>
                        </div>
                    </div>
                    <h4> - </h4>

                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="about-item scrollpoint sp-effect2" style="display:table-cell; vertical-align:middle; text-align:center">
                            <i><img class="img-responsive" src="{{url('/images/prize/p3.png')}}" alt=""></i>
                            <h4>7-11禮卷 <br>200元<br>15名 / 月</h4>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="about-item scrollpoint sp-effect2" style="display:table-cell; vertical-align:middle; text-align:center">
                            <i><img class="img-responsive" src="{{url('/images/prize/p4.png')}}" alt=""></i>
                            <h4>LUXGEN掛耳式咖啡一盒<br>(市值250元)<br>120名 / 月</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{--<section id="lists">--}}
        {{--<div class="container">--}}
        {{--<div class="section-heading scrollpoint sp-effect3">--}}
        {{--<h1>得獎名單</h1>--}}
        {{--</div>--}}
        {{--<div class="one">--}}
        {{--<div class="panel panel-default">--}}
        {{--<div class="panel-heading"> 第一輪</div>--}}
        {{--<div class="panel-body">--}}
        {{--<div class="table-responsive">--}}
        {{--<table class="table table-hover">--}}
        {{--<thead>--}}
        {{--<tr>--}}
        {{--<th>#</th>--}}
        {{--<th>姓名</th>--}}
        {{--<th>獎項</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}
        {{--<tr>--}}
        {{--<td>1</td>--}}
        {{--<td>張馬克</td>--}}
        {{--<td>LUXGEN耳掛式咖啡十盒 (市價2500元)</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
        {{--<td>2</td>--}}
        {{--<td>陳大文</td>--}}
        {{--<td>LUXGEN耳掛式咖啡十盒 (市價2500元)</td>--}}
        {{--</tr>--}}
        {{--</tbody>--}}
        {{--</table>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="two">--}}
        {{--<div class="panel panel-default">--}}
        {{--<div class="panel-heading"> 第二輪</div>--}}
        {{--<div class="panel-body">--}}
        {{--<div class="table-responsive">--}}
        {{--<table class="table table-hover">--}}
        {{--<thead>--}}
        {{--<tr>--}}
        {{--<th>#</th>--}}
        {{--<th>姓名</th>--}}
        {{--<th>獎項</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}
        {{--<tr>--}}
        {{--<td>1</td>--}}
        {{--<td>李瀅瀅</td>--}}
        {{--<td>LUXGEN耳掛式咖啡十盒 (市價2500元)</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
        {{--<td>2</td>--}}
        {{--<td>王美麗</td>--}}
        {{--<td>LUXGEN耳掛式咖啡十盒 (市價2500元)</td>--}}
        {{--</tr>--}}
        {{--</tbody>--}}
        {{--</table>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</section>--}}
    </div>
@endsection