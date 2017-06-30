<div class="box-body">

	<div class="form-group">
		{!! Form::label('marketplace_id', 'Marketplace', ['class'=>'control-label']) !!}
		{!! Form::select('marketplace_id', $marketplaces, null, ['class' => 'form-control']) !!}
		@if ($errors->has('marketplace_id'))
		    <div class="label label-danger">
		        {{ $errors->first('marketplace_id') }}
		    </div>
		@endif
	</div>

	<div class="form-group">
		{!! Form::label('url', 'Feed URL',['class'=>'control-label']) !!}
		{!! Form::url('url', null, ['class' => 'form-control']) !!}
		@if ($errors->has('url'))
		    <div class="label label-danger">
		        {{ $errors->first('url') }}
		    </div>
		@endif
	</div>

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
		{!! Form::label('replacer', 'Dept. Replace with',['class'=>'control-label']) !!}
		{!! Form::text('replacer', null, ['class' => 'form-control']) !!}
		@if ($errors->has('replacer'))
		    <div class="label label-danger">
		        {{ $errors->first('replacer') }}
		    </div>
		@endif
	</div>	

</div>

<div class="box-footer">
	<div class="form-group">
		{!! Form::submit('Simpan',  ['class' => 'btn btn-primary']) !!}
	</div>
</div>	