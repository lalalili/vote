@extends('admin.index')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! $filter !!}
                        {!! $grid !!}
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
@endsection