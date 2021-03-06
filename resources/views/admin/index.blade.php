<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>管理系統</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/plugins/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/dt/dt-1.10.10/datatables.min.css"/>
    <link rel="stylesheet" href="{{ asset('/css/select2.min.css') }}">
    {{--<link href="{{ url('css/sb-admin-2.css') }}" rel="stylesheet">--}}
    <link media="all" type="text/css" rel="stylesheet" href="/packages/zofe/rapyd/assets/datepicker/datepicker3.css">
    <link media="all" type="text/css" rel="stylesheet" href="/packages/zofe/rapyd/assets/rapyd.css">
    <link rel="stylesheet" href="{{ elixir('css/admin.css') }}">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
            integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="/packages/zofe/rapyd/assets/datepicker/bootstrap-datepicker.js"></script>
    <script src="/packages/zofe/rapyd/assets/datepicker/locales/bootstrap-datepicker.zh-TW.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div id="wrapper">
@inject('roleMenu', 'Luxgen\Presenter\RolePresenter')
<!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">管理系統</a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-top-links navbar-right">
            @if (Auth::check())
                歡迎登入： {{Auth::getUser()['email']}}
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
    @if (Auth::check())
        <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> 員工管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/admin/employee/list') }}"> 員工基本資料</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li class="active">
                            <a href="#"><i class="fa fa-calculator fa-fw"></i> 課程報名<span
                                        class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/admin/signup/list') }}"> 已報名列表</a>
                                </li>
                                <li>
                                    {!! $roleMenu->pullupMenu() !!}
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        {!! $roleMenu->adminMenu() !!}
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        @endif
    </nav>

    <!-- Page Content -->
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
@yield('content')
<!-- /.row -->
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


<script src="{{ asset('/js/plugins/metisMenu/metisMenu.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/s/dt/dt-1.10.10/datatables.min.js"></script>
<script src="{{ asset('/js/select2.min.js') }}"></script>
<!-- Custom Theme JavaScript -->
{{--<script src="{{ url('js/sb-admin-2.js') }}"></script>--}}
<script src="{{ elixir('js/admin.js') }}"></script>
<script>
    $('#flash-overlay-modal').modal();
</script>
</body>
</html>