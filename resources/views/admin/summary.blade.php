@extends('admin.index')

@section('content')
    <div id="page-wrapper">
        <div class="row">

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>生活館</h3>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>據點</th>
                                    <th>姓名</th>
                                    <th>票數</th>
                                    <th>名次</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="4" align="center">北智捷</td>
                                </tr>
                                @foreach( $r1s as $r1)
                                    <tr>
                                        <td>{{$r1->album_name}}
                                        </td>
                                        <td>{{$r1->photo_name}}
                                        </td>
                                        <td>{{$r1->count}}
                                        </td>
                                        <td>{{$r1->rank}}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" align="center">桃智捷</td>
                                </tr>
                                @foreach( $r2s as $r2)
                                    <tr>
                                        <td>{{$r2->album_name}}
                                        </td>
                                        <td>{{$r2->photo_name}}
                                        </td>
                                        <td>{{$r2->count}}
                                        </td>
                                        <td>{{$r2->rank}}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" align="center">中智捷</td>
                                </tr>
                                @foreach( $r3s as $r3)
                                    <tr>
                                        <td>{{$r3->album_name}}
                                        </td>
                                        <td>{{$r3->photo_name}}
                                        </td>
                                        <td>{{$r3->count}}
                                        </td>
                                        <td>{{$r3->rank}}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" align="center">南智捷</td>
                                </tr>
                                @foreach( $r4s as $r4)
                                    <tr>
                                        <td>{{$r4->album_name}}
                                        </td>
                                        <td>{{$r4->photo_name}}
                                        </td>
                                        <td>{{$r4->count}}
                                        </td>
                                        <td>{{$r4->rank}}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" align="center">高智捷</td>
                                </tr>
                                @foreach( $r5s as $r5)
                                    <tr>
                                        <td>{{$r5->album_name}}
                                        </td>
                                        <td>{{$r5->photo_name}}
                                        </td>
                                        <td>{{$r5->count}}
                                        </td>
                                        <td>{{$r5->rank}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->

        </div>
    </div>
@endsection
