@extends('admin.index')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"> 據點上傳</div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" action="{{url('/admin/album/batch')}}" method="POST"
                                  enctype="multipart/form-data"
                                  accept-charset="UTF-8">
                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <input type="file" name="upload">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="btn btn-default" type="submit">Upload</button>
                                        <button class="btn btn-default" type="reset">Reset</button>
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
                    <div class="panel-heading">測試資料處理</div>
                    <div class="panel-body">
                        <button class="btn btn-info" type="button"
                                onclick="seed_confirm()">建立測試資料
                        </button>
                    </div>
                    <div class="panel-body">
                        <button class="btn btn-danger" type="button"
                                onclick="reset_photo_confirm()">清空員工資料
                        </button>
                        <button class="btn btn-danger" type="button"
                                onclick="reset_vote_confirm()">清空投票資料
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection