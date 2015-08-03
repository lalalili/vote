<!--- Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Phone Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('phone', 'Phone:') !!}
	{!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>

<!--- Q1 Field --->
<div class="form-group col-sm-6 col-lg-4">
    <div class="checkbox">
		<label>{!! Form::checkbox('q1', 1, true) !!}Q1</label>
	</div>
</div>

<!--- Q2 Field --->
<div class="form-group col-sm-6 col-lg-4">
    <div class="checkbox">
		<label>{!! Form::checkbox('q2', 1, true) !!}Q2</label>
	</div>
</div>

<!--- Q3 Field --->
<div class="form-group col-sm-6 col-lg-4">
    <div class="checkbox">
		<label>{!! Form::checkbox('q3', 1, true) !!}Q3</label>
	</div>
</div>

<!--- Note1 Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('note1', 'Note1:') !!}
	{!! Form::text('note1', null, ['class' => 'form-control']) !!}
</div>

<!--- Note2 Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('note2', 'Note2:') !!}
	{!! Form::text('note2', null, ['class' => 'form-control']) !!}
</div>

<!--- Photo Id Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('photo_id', 'Photo Id:') !!}
	{!! Form::number('photo_id', null, ['class' => 'form-control']) !!}
</div>

<!--- Album Id Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('album_id', 'Album Id:') !!}
	{!! Form::number('album_id', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
