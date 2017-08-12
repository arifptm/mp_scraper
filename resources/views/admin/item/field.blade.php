<div class="box-body">

	<div class="form-group">
		{!! Form::label('item_url', 'URL',['class'=>'control-label']) !!}
		{!! Form::text('item_url', null, ['class' => 'form-control']) !!}
		@if ($errors->has('item_url'))
		    <div class="label label-danger">
		        {{ $errors->first('item_url') }}
		    </div>
		@endif
	</div>

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
		{!! Form::label('sell_price', 'Sell Price',['class'=>'control-label']) !!}
		{!! Form::text('sell_price', null, ['class' => 'form-control']) !!}
		@if ($errors->has('sell_price'))
		    <div class="label label-danger">
		        {{ $errors->first('sell_price') }}
		    </div>
		@endif
	</div>

	<div class="well">
		<div class="form-group">
			<div class="col-md-3">   
			    <div class="icheck"><label>        
			        {!! Form::checkbox('published') !!}<span style="margin-right:50px;"> Published ?</span></label>            
			    </div>
			</div>

			<div class="col-md-3">   
			    <div class="icheck"><label>        
			        {!! Form::checkbox('processed') !!}<span style="margin-right:50px;"> Processed ?</span></label>            
			    </div>
			</div>
			<div class="col-md-3">   
			    <div class="icheck"><label>        
			        {!! Form::checkbox('sold_out') !!}<span style="margin-right:50px;"> Sold Out ?</span></label>            
			    </div>
			</div>

			<div class="col-md-3">   
			    <div class="icheck"><label>        
			        {!! Form::checkbox('checked') !!}<span style="margin-right:50px;"> Checked ?</span></label>            
			    </div>
			</div>			
		</div>
	</div>

	<div class="row">
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


</div>

<div class="box-footer">
	<div class="form-group">
		{!! Form::submit('Simpan',  ['class' => 'btn btn-primary']) !!}
	</div>
</div>	