@extends('admin.index')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading"> 據點上傳</div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" action="{{url('/admin/album/batch')}}" method="POST"
                                  enctype="multipart/form-data"
                                  accept-charset="UTF-8">
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <input type="file" name="upload">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="btn btn-default" type="submit">上傳</button>
                                        {{--<button class="btn btn-default" type="reset">Reset</button>--}}
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('flash::message')
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading"> 職稱上傳</div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" action="{{url('/admin/title/batch')}}" method="POST"
                                  enctype="multipart/form-data"
                                  accept-charset="UTF-8">
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <input type="file" name="upload">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="btn btn-default" type="submit">上傳</button>
                                        {{--<button class="btn btn-default" type="reset">Reset</button>--}}
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('flash::message')
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading"> 白名單上傳</div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" action="{{url('/admin/whitelist/batch')}}" method="POST"
                                  enctype="multipart/form-data"
                                  accept-charset="UTF-8">
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <input type="file" name="upload">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="btn btn-default" type="submit">上傳</button>
                                        {{--<button class="btn btn-default" type="reset">Reset</button>--}}
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('flash::message')
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading"> 課程報名上傳(!! 只新增new工作表內的資料)</div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" action="{{url('/admin/signup/batch')}}" method="POST"
                                  enctype="multipart/form-data"
                                  accept-charset="UTF-8">
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <input type="file" name="upload">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="btn btn-default" type="submit">上傳</button>
                                        {{--<button class="btn btn-default" type="reset">Reset</button>--}}
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('flash::message')
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading"> 員工基本資料上傳 (!! 只新增new工作表內的資料)</div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" action="{{url('/admin/photo/batch')}}" method="POST"
                                  enctype="multipart/form-data"
                                  accept-charset="UTF-8">
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <input type="file" name="upload">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="btn btn-default" type="submit">上傳</button>
                                        {{--<button class="btn btn-default" type="reset">Reset</button>--}}
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('flash::message')
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading"> 員工個資上傳</div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" action="{{url('/admin/employee/batch')}}" method="POST"
                                  enctype="multipart/form-data"
                                  accept-charset="UTF-8">
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <input type="file" name="upload">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="btn btn-default" type="submit">上傳</button>
                                        {{--<button class="btn btn-default" type="reset">Reset</button>--}}
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('flash::message')
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading"> 課別</div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" action="{{url('/admin/course/batch')}}" method="POST"
                                  enctype="multipart/form-data"
                                  accept-charset="UTF-8">
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <input type="file" name="upload">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="btn btn-default" type="submit">上傳</button>
                                        {{--<button class="btn btn-default" type="reset">Reset</button>--}}
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('flash::message')
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading"> 場次</div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" action="{{url('/admin/event/batch')}}" method="POST"
                                  enctype="multipart/form-data"
                                  accept-charset="UTF-8">
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <input type="file" name="upload">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="btn btn-default" type="submit">上傳</button>
                                        {{--<button class="btn btn-default" type="reset">Reset</button>--}}
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('flash::message')
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">下載</div>
                    <div class="panel-body">
                        <button class="btn btn-info" type="button" onclick="location.href='/admin/album/download'">據點
                        </button>
                        <button class="btn btn-info" type="button" onclick="location.href='/admin/title/download'">職稱
                        </button>
                        <button class="btn btn-info" type="button" onclick="location.href='/admin/photo/download'">
                            員工基本資料
                        </button>
                        <button class="btn btn-info" type="button" onclick="location.href='/admin/employee/download'">
                            員工個資
                        </button>
                        <button class="btn btn-info" type="button" onclick="location.href='/admin/whitelist/download'">
                            白名單
                        </button>
                    </div>
                    <div class="panel-body">
                        <button class="btn btn-info" type="button" onclick="location.href='/admin/project/download'">
                            課程項目
                        </button>
                        <button class="btn btn-info" type="button" onclick="location.href='/admin/course/download'">課別
                        </button>
                        <button class="btn btn-info" type="button" onclick="location.href='/admin/event/download'">場次
                        </button>
                        <button class="btn btn-info" type="button" onclick="location.href='/admin/signup/download'">
                            報名資料下載
                        </button>
                        <button class="btn btn-info" type="button" onclick="location.href='/admin/signup/downloadAll'">
                            報名資料完整欄位下載
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading"> 感動服務上傳</div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" action="{{url('/admin/touch/batch')}}" method="POST"
                                  enctype="multipart/form-data"
                                  accept-charset="UTF-8">
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <input type="file" name="upload[]" multiple>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="btn btn-default" type="submit">上傳</button>
                                        {{--<button class="btn btn-default" type="reset">Reset</button>--}}
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('flash::message')
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="row">--}}
        {{--<div class="col-lg-12">--}}
        {{--<div class="panel panel-default">--}}
        {{--<div class="panel-heading">測試資料處理</div>--}}
        {{--<div class="panel-body">--}}
        {{--<button class="btn btn-info" type="button"--}}
        {{--onclick="seed_confirm()">建立測試資料--}}
        {{--</button>--}}
        {{--</div>--}}
        <div class="panel-body">
            {{--<button class="btn btn-danger" type="button"--}}
            {{--onclick="reset_photo_confirm()">清空員工資料--}}
            {{--</button>--}}
            {{--<button class="btn btn-danger" type="button"--}}
            {{--onclick="reset_vote_confirm()">清空投票資料--}}
            {{--</button>--}}
            <button class="btn btn-danger" type="button"
                    onclick="reset_signup_confirm()">清空報名資料
            </button>
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
@endsection