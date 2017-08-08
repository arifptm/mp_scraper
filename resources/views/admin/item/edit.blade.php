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

<script src="{{ asset('/bower_components/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-red',
      increaseArea: '0%' // optional
    });
  });
</script>    
@endsection

@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('/bower_components/iCheck/skins/square/red.css') }}">
@endsection


