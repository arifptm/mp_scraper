<div class="box-body">
	<div class="form-group">
		{!! Form::label('department', 'Department',['class'=>'control-label']) !!}
		{!! Form::text('department', null, ['class' => 'form-control']) !!}
		@if ($errors->has('department'))
		    <div class="label label-danger">
		        {{ $errors->first('department') }}
		    </div>
		@endif
	</div>

	<div class="form-group">
		{!! Form::label('replacer', 'Replacer',['class'=>'control-label']) !!}
		{!! Form::text('replacer', null, ['class' => 'form-control']) !!}
		@if ($errors->has('replacer'))
		    <div class="label label-danger">
		        {{ $errors->first('replacer') }}
		    </div>
		@endif
	</div>

	<div class="form-group">
		{!! Form::label('level', 'Level',['class'=>'control-label']) !!}
		{!! Form::number('level', null, ['class' => 'form-control']) !!}
		@if ($errors->has('level'))
		    <div class="label label-danger">
		        {{ $errors->first('level') }}
		    </div>
		@endif
	</div>
	
</div>

<div class="box-footer">
	<div class="form-group">
		{!! Form::submit('Simpan',  ['class' => 'btn btn-primary']) !!}
	</div>
</div>	