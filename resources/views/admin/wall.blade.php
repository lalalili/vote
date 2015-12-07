@extends('admin.index')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <br>
                <select onChange="location = this.options[this.selectedIndex].value;">
                    <option value="#">請選擇</option>
                    <option value="1">銷售經理</option>
                    <option value="5">服務廠長</option>
                </select>
                <br>
                <br>
            </div>
        </div>

        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                @if(count($lists) > 3)
                    @foreach(array_chunk($lists, 200)  as $list3)
                        <div class="row">
                            @foreach($list3 as $list)
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div style="display:table-cell; vertical-align:middle; text-align:center">
                                        <i><a href="/choose/{{ $list->id }}"><img
                                                        class="img-circle img-responsive"
                                                        align="top"
                                                        src="/uploads/images/user/{{ $list->path }}"
                                                        alt=""></a></i>

                                        <h3>{{ $list->album }}</h3>
                                        <h4>{{ $list->name }}</h4>
                                        <BR>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                @else
                    <div class="row">
                        @foreach($lists as $list)
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div style="display:table-cell; vertical-align:middle; text-align:center">
                                    <i><a href="/choose/{{ $list->id }}"><img
                                                    class="img-circle img-responsive"
                                                    src="/uploads/images/user/{{ $list->path }}"
                                                    alt=""></a></i>

                                    <h3>{{ $list->album }}</h3>
                                    <p>{{ $list->name }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection