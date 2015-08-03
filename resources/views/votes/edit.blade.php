@extends('admin.index')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($vote, ['route' => ['admin.votes.update', $vote->id], 'method' => 'patch']) !!}

        @include('votes.fields')

    {!! Form::close() !!}
</div>
@endsection
