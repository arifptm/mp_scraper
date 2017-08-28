@extends('admin.template.master')

@section('pagetitle')
	Create Pages
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::open(['url'=> '/admin/pages', 'role' => 'form']) !!}
        @include('admin.page.field')
    {!! Form::close() !!}
</div>
@endsection	

@section('footer_scripts')
	<script src="{{ asset('/bower_components/ckeditor/ckeditor.js') }}"></script>
	    <script>
        	CKEDITOR.replace('body');
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
