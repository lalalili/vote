<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>管理系統</title>

    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/plugins/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/dt/dt-1.10.10/datatables.min.css"/>
    <link rel="stylesheet" href="{{ asset('/css/select2.min.css') }}">
    {{--<link href="{{ url('css/sb-admin-2.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ elixir('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/jquery-ui-timepicker-addon.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}">管理系統</a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-top-links navbar-right">
            @if (Auth::check())
                歡迎登入： {{Auth::getUser()['email']}}
            @endif
            <li class="dropdown">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                    <i class="fa fa-user fa-fw"></i>
                    <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    @if (Auth::check())
                        <li>
                            <a href="{{ url('/auth/logout' )}}">
                                <i class="fa fa-sign-out fa-fw"></i>
                                Logout
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ url('/auth/login') }}">
                                <i class="fa fa-sign-in fa-fw"></i>
                                Login
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        </ul>
        @if (Auth::check())
                <!-- /.navbar-top-links -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="active">
                        <a href="#"><i class="fa fa-child fa-fw"></i> 禮貌大使<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>

                                <a href="{{ url('/admin/photo/list') }}"> 員工管理</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope-o fa-fw"></i> 課程報名<span
                                    class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                @if(Auth::user()->hasRole('la-owner'))
                                    <a href="{{ url('/admin/signup/la_choose') }}"> 北智捷報名</a>
                                @elseif(Auth::user()->hasRole('lb-owner'))
                                    <a href="{{ url('/admin/signup/lb_choose') }}"> 桃智捷報名</a>
                                @elseif(Auth::user()->hasRole('lc-owner'))
                                    <a href="{{ url('/admin/signup/lc_choose') }}"> 中智捷報名</a>
                                @elseif(Auth::user()->hasRole('ld-owner'))
                                    <a href="{{ url('/admin/signup/ld_choose') }}"> 南智捷報名</a>
                                @elseif(Auth::user()->hasRole('le-owner'))
                                    <a href="{{ url('/admin/signup/le_choose') }}"> 高智捷報名</a>
                                @elseif(Auth::user()->hasRole('luxgen-owner'))
                                    <a href="{{ url('/admin/signup/luxgen_choose') }}"> 總公司報名</a>
                                @else
                                    <a href="{{ url('/admin/signup/choose') }}"> 報名</a>
                                @endif
                            </li>
                            <li>
                                <a href="{{ url('/admin/signup/list') }}"> 報名列表</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    @if(Auth::user()->hasRole('admin'))
                        <li class="active">
                            <a href="#"><i class="fa fa-thumbs-o-up fa-fw"></i> 投票管理<span
                                        class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/admin/vote/list') }}"> 投票列表</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/summary') }}"> 總攬</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/vote/postlist') }}"> 投票列表(已處理)</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/post_summary') }}"> 總攬(已處理)</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/vote/whitelist') }}"> 白名單投票列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li class="active">
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> 系統設定<span
                                        class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/admin/signup/list') }}"> 報名列表</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/adv') }}"> 進階功能</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/wall/1') }}"> 相片牆</a>
                                </li>
                                <li>
                                    <a href="{{ url('/lottery') }}" target="_blank"> 抽獎</a>
                                </li>
                                <li>
                                    <a href="#">投票資料管理<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="{{ url('/admin/album/list') }}"> 據點管理</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/admin/title/list') }}"> 職稱管理</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/admin/photo/delete') }}"> 員工管理</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/admin/whitelist/list') }}"> 白名單管理</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#">報名資料管理<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="{{ url('/admin/project/list') }}"> 課程項目</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/admin/course/list') }}"> 課別</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/admin/event/list') }}"> 場次</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/admin/employee/list') }}"> 員工個資</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#">感動服務管理<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="{{ url('/admin/touching/edit') }}"> 編輯內容</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/admin/touching/poll/list') }}"> 投票檢視</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/touching/show') }}" target="_blank"> 檢視內容</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                {{--<li>--}}
                                {{--<a href="#">帳號管理<span class="fa arrow"></span></a>--}}
                                {{--<ul class="nav nav-third-level">--}}
                                {{--<li>--}}
                                {{--<a href="{{ url('/admin/album/list') }}"> 使用者管理</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                {{--<a href="{{ url('/admin/title/list') }}"> 群組管理</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                {{--<a href="{{ url('/admin/photo/delete') }}"> 權限管理</a>--}}
                                {{--</li>--}}
                                {{--</ul>--}}
                                {{--<!-- /.nav-third-level -->--}}
                                {{--</li>--}}
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    @endif
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
        @endif
    </nav>

    <!-- Page Content -->
    <script src="{{ asset('/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/js/jquery-ui-timepicker-addon.min.js') }}"></script>
    <script src="{{ asset('/js/jquery-ui-sliderAccess.js') }}"></script>

    @yield('content')
            <!-- /.row -->
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/plugins/metisMenu/metisMenu.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/s/dt/dt-1.10.10/datatables.min.js"></script>
<script src="{{ asset('/js/select2.min.js') }}"></script>
<script src="{{ asset('/locales/jquery.ui.datepicker-zh-TW.js') }}"></script>
<script src="{{ asset('/locales/jquery-ui-timepicker-zh-TW.js') }}"></script>

<!-- Custom Theme JavaScript -->
{{--<script src="{{ url('js/sb-admin-2.js') }}"></script>--}}
<script src="{{ elixir('js/admin.js') }}"></script>

<script>
    $('#flash-overlay-modal').modal();
</script>

</body>
</html>