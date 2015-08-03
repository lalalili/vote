@extends('admin.index')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Votes</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.votes.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($votes->isEmpty())
                <div class="well text-center">No Votes found.</div>
            @else
                @include('votes.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $votes])


    </div>
@endsection