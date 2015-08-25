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
                    <a class="navbar-brand" href="{{ URL::previous() }}">
                        <img src="{{url('/img/freeze/logo.png')}}" alt="" class="logo">
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
    <div class="wrapper">
        <section id="pull" class="doublediagonal">
            <div class="container">
                <div class="section-heading scrollpoint sp-effect3">
                    <br/><br/>
                    <h2>個資聲明</h2>
                    <div class="divider"></div>
                </div>
                <h4>
                    歡迎使用LUXGEN網站服務，本網站所提供之各項網路服務，部分需要您提供個人資料，為遵守個人資料保護法規定，<br/>
                    在您提供個人資料前，依法告知下列事項： <br/><br/>
                    <ul>
                        <li>1. 本網站獲取您的個人資料為識別類個人資料（中、英文姓名、聯絡電話號碼、）。</li><br/>
                        <li>2. 本網站將依個人資料保護法及相關法令之規定下，依隱私權保護政策，蒐集、處理及合理利用您的個人資料。</li><br/>
                        <li>3. 您可依個人資料保護法第3條規定，就您的個人資料向本網站行使之下列權利：</li>
                        <ul>
                            <li>1. 查詢或請求閱覽。</li>
                            <li>2. 請求製給複製本。</li>
                            <li>3. 請求補充或更正。</li>
                            <li>4. 請求停止蒐集、處理及利用。</li>
                            <li>5. 請求刪除。</li>
                        </ul><br/>
                        <li>4. 您因行使上述權利而導致對您的權益產生減損時，本網站不負相關賠償責任。<br/>另依個人資料保護法第14 條規定，本網站得酌收行政作業費用。</li><br/>
                        <li>5. 若您未提供正確之個人資料，本網站將無法為您提供特定目的之相關業務。</li><br/>
                        <li>6.若您不同意上述聲明內容，請勿於本網站內提供您的個人資料，<br/>另本網站多數服務無須提供您的資料也可進行瀏覽，並不影響您資訊瀏覽的權益，<br/>如需服務請洽網站管理單位之服務人員。
                        </li>
                    </ul>
                </h4>
            </div>
        </section>
    </div>
@endsection