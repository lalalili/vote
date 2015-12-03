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
    <link rel="stylesheet" href="{{ asset('/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/dataTables.responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/select2.min.css') }}">
    {{--<link href="{{ url('css/sb-admin-2.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ elixir('css/admin.css') }}">

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
            <a class="navbar-brand" href="{{ url('/') }}">禮貌大使管理</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            @if(Auth::check())
                歡迎登入： {{Auth::getUser()['name']}}
            @else
                Guest
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
        <!-- /.navbar-top-links -->
        @if(Auth::check())
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="active">
                            <a href="#"><i class="fa fa-child fa-fw"></i> 員工管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('admin/photo/list') }}"> 員工列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @if(Auth::user()->hasRole('admin'))
                            <li class="active">
                                <a href="#"><i class="fa fa-envelope-o fa-fw"></i> 投票管理<span
                                            class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ url('admin/vote/list') }}"> 投票列表</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/summary') }}"> 總攬</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/vote/postlist') }}"> 投票列表(已處理)</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/post_summary') }}"> 總攬(已處理)</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/vote/whitelist') }}"> 白名單投票列表</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li class="active">
                                <a href="#"><i class="fa fa-wrench fa-fw"></i> 系統設定<span
                                            class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ url('admin/album/list') }}"> 據點管理</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/title/list') }}"> 職稱管理</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/admin/photo/delete') }}"> 員工管理</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/whitelist/list') }}"> 白名單管理</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/admin/adv') }}"> 進階功能</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/admin/wall/1') }}"> 相片牆</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-envelope-o fa-fw"></i> 報名管理<span
                                            class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ url('admin/signup/yearlist') }}"> 菁訓班年度</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/signup/grouplist') }}"> 菁訓班梯次</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/signup/projectlist') }}"> 課程項目</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/signup/courselist') }}"> 課別</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/signup/eventlist') }}"> 課程日期/場次</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/signup/list') }}"> 報名列表</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/signup/step1') }}"> 報名</a>
                                    </li>
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
    <script src="{{ asset('/js/jquery-1.11.1.min.js') }}"></script>
    @yield('content')
            <!-- /.row -->
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/plugins/metisMenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/select2.min.js') }}"></script>

<!-- Custom Theme JavaScript -->
{{--<script src="{{ url('js/sb-admin-2.js') }}"></script>--}}
<script src="{{ elixir('js/admin.js') }}"></script>

<!-- This is only necessary if you do Flash::overlay('...') -->
<script>
    $('#flash-overlay-modal').modal();
</script>

</body>

</html>