@extends('admin.template.master')

@section('pagetitle')
	Edit Item
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::model($item, ['action'=> ['ItemController@update', $item->id], 'method'=>'patch', 'role' => 'form']) !!}
        @include('admin/item/field')
    {!! Form::close() !!}
</div>
@endsection	

@section('footer_scripts')
	<script src="{{ asset('/bower_components/ckeditor/ckeditor.js') }}"></script>
	    <script>
        	CKEDITOR.replace('body');
        	CKEDITOR.replace('se');
    	</script>
@endsection


