<div class="box-body">
	<div class="form-group">
		{!! Form::label('name', 'Marketplace Name',['class'=>'control-label']) !!}
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
		{!! Form::label('logo_url', 'Logo url',['class'=>'control-label']) !!}
		{!! Form::url('logo_url', null, ['class' => 'form-control']) !!}
		@if ($errors->has('logo_url'))
		    <div class="label label-danger">
		        {{ $errors->first('logo_url') }}
		    </div>
		@endif
	</div>	
</div>

<div class="box-footer">
	<div class="form-group">
		{!! Form::submit('Simpan',  ['class' => 'btn btn-primary']) !!}
	</div>
</div>	