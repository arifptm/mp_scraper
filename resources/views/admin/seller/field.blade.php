<div class="box-body">
	<div class="form-group">
		{!! Form::label('name', 'Seller Name',['class'=>'control-label']) !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
		@if ($errors->has('name'))
		    <div class="label label-danger">
		        {{ $errors->first('name') }}
		    </div>
		@endif
	</div>

	<div class="form-group">
		{!! Form::label('city', 'Seller City',['class'=>'control-label']) !!}
		{!! Form::text('city', $seller->city->name , ['class' => 'form-control']) !!}
		@if ($errors->has('city'))
		    <div class="label label-danger">
		        {{ $errors->first('city') }}
		    </div>
		@endif
	</div>	

	<div class="form-group">
		{!! Form::label('image_url', 'Image',['class'=>'control-label']) !!}
		{!! Form::text('image_url', null, ['class' => 'form-control']) !!}
		@if ($errors->has('image_url'))
		    <div class="label label-danger">
		        {{ $errors->first('image_url') }}
		    </div>
		@endif
	</div>		
	
</div>

<div class="box-footer">
	<div class="form-group">
		{!! Form::submit('Simpan',  ['class' => 'btn btn-primary']) !!}
	</div>
</div>	