<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $photo->name !!}</p>
</div>

<!-- Filename Field -->
<div class="form-group">
    {!! Form::label('filename', 'Filename:') !!}
    <p>{!! $photo->filename !!}</p>
</div>

<!-- Utf8 Filename Field -->
<div class="form-group">
    {!! Form::label('utf8_filename', 'Utf8 Filename:') !!}
    <p>{!! $photo->utf8_filename !!}</p>
</div>

<!-- Order Field -->
<div class="form-group">
    {!! Form::label('order', 'Order:') !!}
    <p>{!! $photo->order !!}</p>
</div>

<!-- Path Field -->
<div class="form-group">
    {!! Form::label('path', 'Path:') !!}
    <p>{!! $photo->path !!}</p>
</div>

<!-- Is Display Field -->
<div class="form-group">
    {!! Form::label('is_display', 'Is Display:') !!}
    <p>{!! $photo->is_display !!}</p>
</div>

<!-- Page Id Field -->
<div class="form-group">
    {!! Form::label('page_id', 'Page Id:') !!}
    <p>{!! $photo->page_id !!}</p>
</div>

<!-- Album Id Field -->
<div class="form-group">
    {!! Form::label('album_id', 'Album Id:') !!}
    <p>{!! $photo->album_id !!}</p>
</div>

<!-- Title Id Field -->
<div class="form-group">
    {!! Form::label('title_id', 'Title Id:') !!}
    <p>{!! $photo->title_id !!}</p>
</div>

