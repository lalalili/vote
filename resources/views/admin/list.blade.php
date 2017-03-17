@extends('admin.index')

@section('content')
    {!! Rapyd::styles() !!}
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                {!! $filter !!}
                {!! $grid !!}
            </div>
        </div>
    </div>
    {!! Rapyd::scripts() !!}
@endsection