<div class="box-body">
	<div class="form-group">
		{!! Form::label('vocabulary_id', 'Vocabulary',['class'=>'control-label']) !!}
		{!! Form::select('vocabulary_id', $vocabularies , null ,['class' => 'form-control']) !!}
		@if ($errors->has('vocabulary_id'))
		    <div class="label label-danger">
		        {{ $errors->first('vocabulary_id') }}
		    </div>
		@endif
	</div>
	<div class="form-group">
		{!! Form::label('name', 'Term Name',['class'=>'control-label']) !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
		@if ($errors->has('name'))
		    <div class="label label-danger">
		        {{ $errors->first('name') }}
		    </div>
		@endif
	</div>

	<div class="form-group">
		{!! Form::label('slug', 'Slug',['class'=>'control-label']) !!}
		{!! Form::text('slug', null, ['class' => 'form-control']) !!}
		@if ($errors->has('slug'))
		    <div class="label label-danger">
		        {{ $errors->first('slug') }}
		    </div>
		@endif
	</div>
	<div class="form-group">
		{!! Form::label('sort', 'Sort',['class'=>'control-label']) !!}
		{!! Form::number('sort', null, ['class' => 'form-control']) !!}
		@if ($errors->has('sort'))
		    <div class="label label-danger">
		        {{ $errors->first('sort') }}
		    </div>
		@endif
	</div>	
	
</div>

<div class="box-footer">
	<div class="form-group">
		{!! Form::submit('Simpan',  ['class' => 'btn btn-primary']) !!}
	</div>
</div>	