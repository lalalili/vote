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
                        Step2 - 課程報名
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            @include('common.errors')
                            <form role="form" method="POST" action="/admin/signup/step3/">
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
                                        <label>課程日期 / 場次 </label><br>
                                        @if ( isset($number) )
                                            <label> - 本堂課預估上課人數：{{ $number }}</label><br>
                                            <label> - 本堂課已報名人數：{{ $signed }}</label>
                                        @endif
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
                                    <button class="btn btn-default" type="submit">報名</button>
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