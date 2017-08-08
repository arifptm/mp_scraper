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

	<div class="row">
		<div class="form-group">
			<div class="col-md-3">   
			    <div class="icheck"><label>        
			        {!! Form::checkbox('enabled') !!}<span style="margin-right:50px;"> Enabled ?</span></label>            
			    </div>
			</div>

			<div class="col-md-3">   
			    <div class="icheck"><label>        
			        {!! Form::checkbox('processed') !!}<span style="margin-right:50px;"> Processed ?</span></label>            
			    </div>
			</div>
		</div>
	</div>


</div>

<div class="box-footer">
	<div class="form-group">
		{!! Form::submit('Simpan',  ['class' => 'btn btn-primary']) !!}
	</div>
</div>	