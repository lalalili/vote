@extends('admin.index')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'admin.albums.store']) !!}

        @include('albums.fields')

    {!! Form::close() !!}
</div>
@endsection
