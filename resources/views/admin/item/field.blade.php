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
		<div class='col-md-6'>
		{!! Form::label('body', 'Body',['class'=>'control-label']) !!}
		{!! Form::textarea('body', null, ['class' => 'form-control', 'rows'=>'8', 'id'=>'body']) !!}
		@if ($errors->has('body'))
		    <div class="label label-danger">
		        {{ $errors->first('se') }}
		    </div>
		@endif
		</div>
		<div class='col-md-6'>
		{!! Form::label('se', 'Search Result',['class'=>'control-label']) !!}
		{!! Form::textarea('se', null, ['class' => 'form-control', 'rows'=>'8', 'id'=>'se']) !!}
		@if ($errors->has('se'))
		    <div class="label label-danger">
		        {{ $errors->first('se') }}
		    </div>
		@endif
		</div>
	</div>


</div>

<div class="box-footer">
	<div class="form-group">
		{!! Form::submit('Simpan',  ['class' => 'btn btn-primary']) !!}
	</div>
</div>	