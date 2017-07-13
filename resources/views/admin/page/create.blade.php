@extends('admin.template.master')

@section('pagetitle')
	Create Pages
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::open(['url'=> '/admin/pages', 'role' => 'form']) !!}
        @include('admin/page/field')
    {!! Form::close() !!}
</div>
@endsection

@section('header_script')
	<script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
@endsection	
