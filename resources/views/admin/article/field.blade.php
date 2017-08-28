<div class="box-body">
	
	<div class="form-group">
		{!! Form::label('title', 'Title',['class'=>'control-label']) !!}
		{!! Form::text('title', null, ['class' => 'form-control']) !!}
		@if ($errors->has('title'))
		    <div class="label label-danger">
		        {{ $errors->first('title') }}
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
		{!! Form::label('terms', 'Terms',['class'=>'control-label']) !!}
		{!! Form::text('terms', ($article->term) ? $terms : null ,['class' => 'form-control']) !!}
		@if ($errors->has('terms'))
		    <div class="label label-danger">
		        {{ $errors->first('terms') }}
		    </div>
		@endif
	</div>	

	<div class="form-group">
		{!! Form::label('marketplace', 'Marketplace',['class'=>'control-label']) !!}
		{!! Form::text('marketplace', null ,['class' => 'form-control']) !!}
		@if ($errors->has('marketplace'))
		    <div class="label label-danger">
		        {{ $errors->first('marketplace') }}
		    </div>
		@endif
	</div>

	<div class="form-group">
		{!! Form::label('image', 'Image URL',['class'=>'control-label']) !!}
		{!! Form::text('image', null, ['class' => 'form-control']) !!}
		@if ($errors->has('image'))
		    <div class="label label-danger">
		        {{ $errors->first('image') }}
		    </div>
		@endif
	</div>	

	<div class="form-group">
		{!! Form::label('body', 'Body',['class'=>'control-label']) !!}
		{!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '8']) !!}
		@if ($errors->has('body'))
		    <div class="label label-danger">
		        {{ $errors->first('body') }}
		    </div>
		@endif
	</div>


	
</div>

<div class="box-footer">
	<div class="form-group">
		{!! Form::submit('Simpan',  ['class' => 'btn btn-primary']) !!}
	</div>
</div>	