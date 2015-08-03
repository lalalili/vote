@extends('admin.index')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Photos</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.photos.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($photos->isEmpty())
                <div class="well text-center">No Photos found.</div>
            @else
                @include('photos.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $photos])


    </div>
@endsection