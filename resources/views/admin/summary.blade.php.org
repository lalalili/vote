@extends('admin.index')

@section('content')
    <script src="{{ url('js/jquery.dataTables.min.js') }}"></script>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-6">
                <table id="count" class="display">
                    <thead>
                    <tr>
                        <th>據點</th>
                        <th>員工姓名</th>
                        <th>票數</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($counts as $count)
                    <tr>
                        <td>{{$count->store}}</td>
                        <td>{{$count->name}}</td>
                        <td>{{$count->count}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
    $(document).ready( function () {
    $('#count').DataTable();
    } );
    </script>
@endsection
