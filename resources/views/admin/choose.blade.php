@extends('admin.index')

@section('content')
    <div id="page-wrapper">
        <div class="row">

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>員工列表</h3>

                        <div class="table-responsive">
                            <table id="example" class="display" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>類型</th>
                                    <th>據點</th>
                                    <th>職稱</th>
                                    <th>姓名</th>
                                    <th>報名</th>
                                </tr>
                                </thead>
                                {{--<tfoot>--}}
                                {{--<tr>--}}
                                {{--<th>type</th>--}}
                                {{--<th>album</th>--}}
                                {{--<th>title</th>--}}
                                {{--<th>name</th>--}}
                                {{--<th>id</th>--}}
                                {{--</tr>--}}
                                {{--</tfoot>--}}
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
            var type = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);
            $('#example').DataTable({
                responsive: true,
                language: {
                    url: '/locales/zh_TW.json'
                },
                "ajax": {
                    "url": "/admin/signup/data/" + type,
                    "dataSrc": function (data) {
                        //console.log(data[0]['id']);
                        for (var i = 0, ien = data.length; i < ien; i++) {
                            data[i]['id'] = '<a href="/admin/signup/step1/' + data[i]['identity'] + '">開始報名</a>';
                        }
                        //console.log(data);
                        return data;

                    },
                    "error": function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("資料庫連線錯誤，請洽系統管理員 !");
                    }
                },
                "columns": [
                    {"data": "type"},
                    {"data": "location"},
                    {"data": "title"},
                    {"data": "name"},
                    {"data": "id"}
                ]
            });
        });
    </script>
@endsection
