@extends('admin.template.master')

@section('pagetitle')
	Edit Page
@endsection	
 
@section('content')
<div class="box box-primary">
    {!! Form::model($page, ['action'=> ['PageController@update', $page->id], 'method'=>'patch', 'role' => 'form']) !!}
        @include('/admin/page/field')
    {!! Form::close() !!}
</div>
@endsection	

@section('footer_scripts')
	<script src="{{ asset('/bower_components/ckeditor/ckeditor.js') }}"></script>
	    <script>
        	CKEDITOR.replace('body');
    	</script>
@endsection