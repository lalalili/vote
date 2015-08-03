<div class="row"><!--- Name Field --->
<div class="form-group col-sm-4 col-lg-4">
    {!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Order Field --->
<div class="form-group col-sm-1 col-lg-1">
    {!! Form::label('seq', 'Order:') !!}
	{!! Form::number('seq', null, ['class' => 'form-control']) !!}
</div>

<!--- Page Id Field --->
<div class="form-group col-sm-1 col-lg-1">
    {!! Form::label('page_id', 'Page Id:') !!}
	{!! Form::number('page_id', null, ['class' => 'form-control']) !!}
</div>

<!--- Album Id Field --->
<div class="form-group col-sm-1 col-lg-1">
    {!! Form::label('album_id', 'Album Id:') !!}
	{!! Form::number('album_id', null, ['class' => 'form-control']) !!}
</div>

<!--- Title Id Field --->
<div class="form-group col-sm-1 col-lg-1">
    {!! Form::label('title_id', 'Title Id:') !!}
	{!! Form::number('title_id', null, ['class' => 'form-control']) !!}
</div>
</div>
<!--- Is Display Field --->
<div class="form-group col-sm-2 col-lg-2">
    {!! Form::label('', 'Is Display:') !!}
    <div class="checkbox">
        <label>{!! Form::checkbox('is_display', 1, true) !!}</label>
    </div>
</div>

<!--- Path Field --->
<div class="form-group col-sm-2 col-lg-2">
    {!! Form::label('upload', 'File:') !!}
    {!! Form::file('upload') !!}
</div>
<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
