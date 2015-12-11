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
                        報名
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            @include('common.errors')
                            <form role="form" method="POST" action="/admin/signup/step3">
                                {{ csrf_field() }}
                                <div class="col-lg-6">
                                    <input type="hidden" name="photo_id" value="{{ $employee->id }}">

                                    <div class="form-group">
                                        <label>經銷商：</label> {{ $employee->album->area }}
                                    </div>
                                    <div class="form-group">
                                        <label>據點：</label> {{ $employee->album->name }}
                                    </div>
                                    <div class="form-group">
                                        <label>職稱：</label> {{ $employee->title->name }}
                                    </div>
                                    <div class="form-group">
                                        <label>學員姓名：</label> {{ $employee->name }}
                                    </div>
                                    <div class="form-group">
                                        <label>課程項目</label>
                                        <select class="form-control" name="project_id"
                                                onChange="location = '/admin/signup/step2/project/' + this.options[this.selectedIndex].value;">
                                            <option value="">--請選擇--</option>
                                            @foreach( $projects as $project )
                                                @if  ( $project->id == Session::get('project_id'))
                                                    <option value="{{ $project->id }}"
                                                            selected>{{ $project->name }}</option>
                                                @else
                                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>課別</label>
                                        <select class="form-control" name="course_id"
                                                onChange="location = '/admin/signup/step2/course/' + this.options[this.selectedIndex].value;">
                                            <option value="">--請選擇--</option>
                                            @if ( isset($courses) )
                                                @foreach( $courses as $course )
                                                    @if ( $course->id == Session::get('course_id'))
                                                        <option value="{{ $course->id }}"
                                                                selected>{{ $course->name }}</option>
                                                    @else
                                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>課程日期/場次</label>
                                        <select class="form-control" name="event_id"
                                                onChange="location = '/admin/signup/step2/event/' + this.options[this.selectedIndex].value;">
                                            <option value="">--請選擇--</option>
                                            @if ( isset($events) )
                                                @foreach( $events as $event )
                                                    @if ( $event->id == Session::get('event_id'))
                                                        <option value="{{ $event->id }}"
                                                                selected>{{ $event->name }}</option>
                                                    @else
                                                        <option value="{{ $event->id }}">{{ $event->name }}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>身分證號</label>
                                        <input class="form-control" name="identity" value="{{ old('identity') }}">

                                        <p class="help-block">範例：A123456789</p>
                                    </div>
                                    <div class="form-group">
                                        <label>出生年</label>
                                        <input class="form-control" name="birth_year" value="{{ old('birth_year') }}">

                                        <p class="help-block">範例：1980</p>
                                    </div>
                                    <div class="form-group">
                                        <label>手機號碼</label>
                                        <input class="form-control" name="mobile" value="{{ old('mobile') }}">

                                        <p class="help-block">範例：0920123456</p>
                                    </div>
                                    <div class="form-group">
                                        <label>工號</label>
                                        <input class="form-control" name="emp_id" value="{{ old('emp_id') }}">

                                        <p class="help-block">範例：LA1234</p>
                                    </div>
                                    <div class="form-group">
                                        <label>菁英班梯次</label>
                                        <input class="form-control" name="group" value="{{ old('group') }}">

                                        <p class="help-block">範例：152</p>
                                    </div>
                                    <div class="form-group">
                                        <label>性別</label>
                                        <select class="form-control" name="gender">
                                            <option value="">--請選擇--</option>
                                            <option value="男">男</option>
                                            <option value="女">女</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>人員別</label>
                                        <select class="form-control" name="type">
                                            <option value="">--請選擇--</option>
                                            <option value="本國職工">本國職工</option>
                                            <option value="適用就保之大陸或外籍配偶">適用就保之大陸或外籍配偶</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>階層別</label>
                                        <select class="form-control" name="level">
                                            <option value="">--請選擇--</option>
                                            <option value="基層員工">基層員工</option>
                                            <option value="基層管理者">基層管理者</option>
                                            <option value="基層管理者">基層管理者</option>
                                            <option value="中階管理者">中階管理者</option>
                                            <option value="高階管理者">高階管理者</option>
                                            <option value="其他">其他</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>最高學歷</label>
                                        <select class="form-control" name="background">
                                            <option value="">--請選擇--</option>
                                            <option value="國小">國小</option>
                                            <option value="國中">國中</option>
                                            <option value="高中職">高中職</option>
                                            <option value="專科">專科</option>
                                            <option value="大學">大學</option>
                                            <option value="碩士">碩士</option>
                                            <option value="博士">博士</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>飲食習慣</label>
                                        <select class="form-control" name="food">
                                            <option value="">--請選擇--</option>
                                            <option value="男">葷</option>
                                            <option value="女">素</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-default" type="submit">送出</button>
                                    <button class="btn btn-default" type="reset">重新選擇</button>
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