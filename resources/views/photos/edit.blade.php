@extends('admin.index')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($photo, ['route' => ['admin.photos.update', $photo->id], 'method' => 'patch']) !!}

        @include('photos.fields')

    {!! Form::close() !!}
</div>
@endsection
