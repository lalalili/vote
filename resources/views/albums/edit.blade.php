@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($album, ['route' => ['admin.albums.update', $album->id], 'method' => 'patch']) !!}

        @include('albums.fields')

    {!! Form::close() !!}
</div>
@endsection
