@extends('admin.index')

@section('content')
    <div id="page-wrapper">
        <div class="row">

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>員工列表</h3>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="list">
                                <thead>
                                <tr>
                                    <th>類型</th>
                                    <th>據點</th>
                                    <th>職稱</th>
                                    <th>姓名</th>
                                    <th>報名</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $lists as $list)
                                    <tr>
                                        <td>{{$list->type}}
                                        </td>
                                        <td>{{$list->album}}
                                        </td>
                                        <td>{{$list->title}}
                                        </td>
                                        <td>{{$list->name}}
                                        </td>
                                        <td><a href="/admin/signup/step1/{{$list->id}}">開始報名</a>
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

    <script>
        $(document).ready(function () {
            $('#list').DataTable({
                responsive: true,
                language: {
                    url: '/locales/zh_TW.json'
                }
            });
        });
    </script>
@endsection
