@extends('admin.index')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        分數排名
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>區域</th>
                                    <th>分數</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $scores as $score)
                                <tr>
                                    <td>{{ $score->name }}</td>
                                    <td>{{ $score->total}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <button class="btn btn-info" type="button" style="float: left; position: relative; left: 50%;"
                        onclick="window.open('/admin/touching/poll/draw')">抽獎
                </button>
                {!! $filter !!}
                {!! $grid !!}
            </div>
        </div>
    </div>
@endsection