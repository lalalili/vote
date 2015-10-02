@extends('admin.index')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <button class="btn btn-info" type="button" style="float: right;"
                                onclick="location.href='/admin/votes/download'">下載
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