<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>禮貌大使管理</title>

    <link rel="stylesheet" href="{{url('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ url('css/plugins/metisMenu/metisMenu.min.css') }}">
    <link href="{{ url('css/jquery.dataTables.min.css') }}" rel="stylesheet">
    {{--<link href="{{ url('css/sb-admin-2.css') }}" rel="stylesheet">--}}
    <link href="{{ elixir('css/admin.css') }}" rel="stylesheet">

    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet"/>


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
                            <a href="{{url('/auth/logout')}}">
                                <i class="fa fa-sign-out fa-fw"></i>
                                Logout
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{url('/auth/login')}}">
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
                                <a href="#"><i class="fa fa-pencil-square-o fa-fw"></i> 基本設定<span
                                            class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ url('admin/album/list') }}"> 據點管理</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/album/upload') }}"> 據點上傳</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/title/list') }}"> 職稱管理</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
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
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="/admin/adv"><i class="fa fa-wrench fa-fw"></i> 進階設定<span
                                            class="fa arrow"></span></a>
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
    <script src="{{url('/js/jquery-1.11.1.min.js')}}"></script>
    @yield('content')
            <!-- /.row -->
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<script src="{{url('/js/bootstrap.min.js')}}"></script>
<script src="{{ url('js/plugins/metisMenu/metisMenu.min.js') }}"></script>

<!-- Custom Theme JavaScript -->
{{--<script src="{{ url('js/sb-admin-2.js') }}"></script>--}}
<script src="{{ elixir('js/admin.js') }}"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

<!-- This is only necessary if you do Flash::overlay('...') -->
<script>
    $('#flash-overlay-modal').modal();
</script>

</body>

</html>