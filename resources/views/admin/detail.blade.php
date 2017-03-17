@extends('admin.index')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                {!! $edit !!}
            </div>
        </div>
    </div>


    <script language="javascript" type="text/javascript">
        $(document).ready(function () {
            $('#duty_date').datepicker({
                format: 'yyyy-mm-dd',
                language: 'zh-TW',
                todayBtn: 'linked',
                autoclose: true
            });

        });
    </script>
@endsection