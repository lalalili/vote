@extends('admin.index')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'admin.photos.store', 'files'=> true]) !!}

        @include('photos.fields')

    {!! Form::close() !!}
</div>
@endsection
