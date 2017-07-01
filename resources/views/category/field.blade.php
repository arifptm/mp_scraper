<div class="box-body">
	<div class="form-group">
		{!! Form::label('names', 'Category Name',['class'=>'control-label']) !!}
		{!! Form::text('names', null, ['class' => 'form-control']) !!}
		@if ($errors->has('name'))
		    <div class="label label-danger">
		        {{ $errors->first('name') }}
		    </div>
		@endif
	</div>
	
</div>

<div class="box-footer">
	<div class="form-group">
		{!! Form::submit('Simpan',  ['class' => 'btn btn-primary']) !!}
	</div>
</div>	