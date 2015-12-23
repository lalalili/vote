@extends('admin.index')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <button class="btn btn-info" type="button" style="float: left; position: relative; left: 50%;"
                                onclick="location.href='/admin/post_vote/download'">下載
                        </button>
                        <button class="btn btn-danger" type="button" style="float: left; position: relative; left: 50%;"
                                onclick="location.href='/admin/vote/syncvote'">重新計算
                        </button>
                        {!! $filter !!}
                        {!! $grid !!}
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
@endsection