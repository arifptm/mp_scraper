<div class="box-body">
	<div class="form-group">
		{!! Form::label('name', 'Product Name',['class'=>'control-label']) !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
		@if ($errors->has('name'))
		    <div class="label label-danger">
		        {{ $errors->first('name') }}
		    </div>
		@endif
	</div>

	<div class="form-group">
		{!! Form::label('url', 'Product URL',['class'=>'control-label']) !!}
		{!! Form::url('url', null, ['class' => 'form-control']) !!}
		@if ($errors->has('url'))
		    <div class="label label-danger">
		        {{ $errors->first('url') }}
		    </div>
		@endif
	</div>	

	<div class="form-group">
		{!! Form::label('placed', 'Placed',['class'=>'control-label']) !!}
		{!! Form::text('placed', null, ['class' => 'form-control']) !!}
		@if ($errors->has('placed'))
		    <div class="label label-danger">
		        {{ $errors->first('placed') }}
		    </div>
		@endif
	</div>

	<div class="form-group">
		{!! Form::label('price', 'Price',['class'=>'control-label']) !!}
		{!! Form::text('price', null, ['class' => 'form-control']) !!}
		@if ($errors->has('price'))
		    <div class="label label-danger">
		        {{ $errors->first('price') }}
		    </div>
		@endif
	</div>

	<div class="form-group">
		{!! Form::label('disposable', 'Disposable',['class'=>'control-label']) !!}
		{!! Form::checkbox('disposable', null, false, ['class' => 'form-control']) !!}
		@if ($errors->has('disposable'))
		    <div class="label label-danger">
		        {{ $errors->first('disposable') }}
		    </div>
		@endif
	</div>

	<div class="form-group">
		{!! Form::label('image', 'Image',['class'=>'control-label']) !!}
		{!! Form::file('image', null, ['class' => 'form-control']) !!}
		@if ($errors->has('image'))
		    <div class="label label-danger">
		        {{ $errors->first('image') }}
		    </div>
		@endif
	</div>
</div>

<div class="box-footer">
	<div class="form-group">
		{!! Form::submit('Simpan',  ['class' => 'btn btn-primary']) !!}
	</div>
</div>	