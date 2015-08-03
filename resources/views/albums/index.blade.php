@extends('admin.index')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Albums</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.albums.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($albums->isEmpty())
                <div class="well text-center">No Albums found.</div>
            @else
                @include('albums.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $albums])


    </div>
@endsection