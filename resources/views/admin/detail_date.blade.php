@extends('admin.index')

@section('content')
    @include('common.date')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                {!! $edit !!}
                {!! $grid !!}
            </div>
        </div>
    </div>
@endsection