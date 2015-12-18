@extends('admin.index')

@section('content')
    <div id="page-wrapper" style="min-height: 696px;">
        {{--<div class="row">--}}
        {{--<div class="col-lg-12">--}}
        {{--<h1 class="page-header">報名</h1>--}}
        {{--</div>--}}
        {{--<!-- /.col-lg-12 -->--}}
        {{--</div>--}}
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Step1 - 填寫員工資料
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            @include('common.errors')
                            <form role="form" method="POST" action="/admin/signup/step1/save">
                                {{ csrf_field() }}
                                <div class="col-lg-6">
                                    <input type="hidden" name="photo_id" value="{{ $employee->id }}">
                                    <input type="hidden" name="emp" value="{{ $employee->emp }}">

                                    <div class="form-group">
                                        <label>經銷商：</label> {{ $employee->area }}
                                    </div>
                                    <div class="form-group">
                                        <label>據點：</label> {{ $employee->album }}
                                    </div>
                                    <div class="form-group">
                                        <label>職稱：</label> {{ $employee->title }}
                                    </div>
                                    <div class="form-group">
                                        <label>學員姓名：</label> {{ $employee->name }}
                                    </div>
                                    <div class="form-group">
                                        <label>身分證號 (必填)</label>
                                        <input class="form-control" name="identity"
                                               @if ($employee->identity <> '') value="{{ $employee->identity }}"
                                               @else value="{{old("identity")}}" @endif>

                                        <p class=" help-block">範例：A123456789</p>
                                    </div>
                                    <div class="form-group">
                                        <label>出生年 (必填)</label>
                                        <input class="form-control" name="birth_year"
                                               @if ($employee->birth_year <> '') value="{{ $employee->birth_year }}"
                                               @else value="{{old("birth_year")}}" @endif>

                                        <p class="help-block">範例：1980</p>
                                    </div>
                                    <div class="form-group">
                                        <label>手機號碼 (必填)</label>
                                        <input class="form-control" name="mobile"
                                               @if ($employee->mobile <> '') value="{{ $employee->mobile }}"
                                               @else value="{{old("mobile")}}" @endif>

                                        <p class="help-block">範例：0920123456</p>
                                    </div>
                                    <div class="form-group">
                                        <label>工號 (必填)</label>
                                        <input class="form-control" name="emp_id"
                                               @if ($employee->emp_id <> '') value="{{ $employee->emp_id }}"
                                               @else value="{{old("emp_id")}}" @endif>

                                        <p class="help-block">範例：LA1234</p>
                                    </div>
                                    <div class="form-group">
                                        <label>菁英班梯次 (必填)</label>
                                        <input class="form-control" name="group"
                                               @if ($employee->group <> '') value="{{ $employee->group }}"
                                               @else value="{{old("group")}}" @endif>

                                        <p class="help-block">範例：152</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>性別 (必填)</label>
                                        <select class="form-control" name="gender">
                                            <option value="">--請選擇--</option>
                                            @if ($employee->gender == '男')
                                                <option value="男" selected>男</option>
                                                <option value="女">女</option>
                                            @elseif ($employee->gender == '女')
                                                <option value="男">男</option>
                                                <option value="女" selected>女</option>
                                            @else
                                                <option value="男">男</option>
                                                <option value="女">女</option>
                                            @endif

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>飲食習慣 (必填)</label>
                                        <select class="form-control" name="food">
                                            <option value="">--請選擇--</option>
                                            @if ($employee->food == '葷')
                                                <option value="葷" selected>葷</option>
                                                <option value="素">素</option>
                                            @elseif ($employee->food == '素')
                                                <option value="葷">葷</option>
                                                <option value="素" selected>素</option>
                                            @else
                                                <option value="葷">葷</option>
                                                <option value="素">素</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>人員別 (必填)</label>
                                        <select class="form-control" name="type">
                                            <option value="">--請選擇--</option>
                                            @if ($employee->type == '本國職工')
                                                <option value="本國職工" selected>本國職工</option>
                                                <option value="適用就保之大陸或外籍配偶">適用就保之大陸或外籍配偶</option>
                                            @elseif ($employee->type == '適用就保之大陸或外籍配偶')
                                                <option value="本國職工">本國職工</option>
                                                <option value="適用就保之大陸或外籍配偶" selected>適用就保之大陸或外籍配偶</option>
                                            @else
                                                <option value="本國職工">本國職工</option>
                                                <option value="適用就保之大陸或外籍配偶">適用就保之大陸或外籍配偶</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>階層別 (必填)</label>
                                        <select class="form-control" name="level">
                                            <option value="">--請選擇--</option>
                                            @if ($employee->level == '基層員工')
                                                <option value="基層員工" selected>基層員工</option>
                                                <option value="基層管理者">基層管理者</option>
                                                <option value="中階管理者">中階管理者</option>
                                                <option value="高階管理者">高階管理者</option>
                                                <option value="其他">其他</option>
                                            @elseif ($employee->level == '基層管理者')
                                                <option value="基層員工">基層員工</option>
                                                <option value="基層管理者" selected>基層管理者</option>
                                                <option value="基層管理者">基層管理者</option>
                                                <option value="中階管理者">中階管理者</option>
                                                <option value="高階管理者">高階管理者</option>
                                                <option value="其他">其他</option>
                                            @elseif ($employee->level == '中階管理者')
                                                <option value="基層員工">基層員工</option>
                                                <option value="基層管理者">基層管理者</option>
                                                <option value="中階管理者" selected>中階管理者</option>
                                                <option value="高階管理者">高階管理者</option>
                                                <option value="其他">其他</option>
                                            @elseif ($employee->level == '高階管理者')
                                                <option value="基層員工">基層員工</option>
                                                <option value="基層管理者">基層管理者</option>
                                                <option value="中階管理者">中階管理者</option>
                                                <option value="高階管理者" selected>高階管理者</option>
                                                <option value="其他">其他</option>
                                            @elseif ($employee->level == '其他')
                                                <option value="基層員工">基層員工</option>
                                                <option value="基層管理者">基層管理者</option>
                                                <option value="中階管理者">中階管理者</option>
                                                <option value="高階管理者">高階管理者</option>
                                                <option value="其他" selected>其他</option>
                                            @else
                                                <option value="基層員工">基層員工</option>
                                                <option value="基層管理者">基層管理者</option>
                                                <option value="基層管理者">基層管理者</option>
                                                <option value="中階管理者">中階管理者</option>
                                                <option value="高階管理者">高階管理者</option>
                                                <option value="其他">其他</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>最高學歷 (必填)</label>
                                        <select class="form-control" name="background">
                                            <option value="">--請選擇--</option>
                                            @if ($employee->background == '國小')
                                                <option value="國小" selected>國小</option>
                                                <option value="國中">國中</option>
                                                <option value="高中職">高中職</option>
                                                <option value="專科">專科</option>
                                                <option value="大學">大學</option>
                                                <option value="碩士">碩士</option>
                                                <option value="博士">博士</option>
                                            @elseif ($employee->background == '國中')
                                                <option value="國小">國小</option>
                                                <option value="國中" selected>國中</option>
                                                <option value="高中職">高中職</option>
                                                <option value="專科">專科</option>
                                                <option value="大學">大學</option>
                                                <option value="碩士">碩士</option>
                                                <option value="博士">博士</option>
                                            @elseif ($employee->background == '高中職')
                                                <option value="國小">國小</option>
                                                <option value="國中">國中</option>
                                                <option value="高中職" selected>高中職</option>
                                                <option value="專科">專科</option>
                                                <option value="大學">大學</option>
                                                <option value="碩士">碩士</option>
                                                <option value="博士">博士</option>
                                            @elseif ($employee->background == '專科')
                                                <option value="國小">國小</option>
                                                <option value="國中">國中</option>
                                                <option value="高中職">高中職</option>
                                                <option value="專科" selected>專科</option>
                                                <option value="大學">大學</option>
                                                <option value="碩士">碩士</option>
                                                <option value="博士">博士</option>
                                            @elseif ($employee->background == '大學')
                                                <option value="國小">國小</option>
                                                <option value="國中">國中</option>
                                                <option value="高中職">高中職</option>
                                                <option value="專科">專科</option>
                                                <option value="大學" selected>大學</option>
                                                <option value="碩士">碩士</option>
                                                <option value="博士">博士</option>
                                            @elseif ($employee->background == '碩士')
                                                <option value="國小">國小</option>
                                                <option value="國中">國中</option>
                                                <option value="高中職">高中職</option>
                                                <option value="專科">專科</option>
                                                <option value="大學">大學</option>
                                                <option value="碩士" selected>碩士</option>
                                                <option value="博士">博士</option>
                                            @elseif ($employee->background == '博士')
                                                <option value="國小">國小</option>
                                                <option value="國中">國中</option>
                                                <option value="高中職">高中職</option>
                                                <option value="專科">專科</option>
                                                <option value="大學">大學</option>
                                                <option value="碩士">碩士</option>
                                                <option value="博士" selected>博士</option>
                                            @else
                                                <option value="國小">國小</option>
                                                <option value="國中">國中</option>
                                                <option value="高中職">高中職</option>
                                                <option value="專科">專科</option>
                                                <option value="大學">大學</option>
                                                <option value="碩士">碩士</option>
                                                <option value="博士">博士</option>
                                            @endif
                                        </select>
                                    </div>
                                    <button class="btn btn-default" type="submit">下一步</button>
                                </div>
                            </form>
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
@endsection