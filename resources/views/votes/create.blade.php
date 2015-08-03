@extends('admin.index')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'admin.votes.store']) !!}

        @include('votes.fields')

    {!! Form::close() !!}
</div>
@endsection
