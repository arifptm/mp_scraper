@extends('admin.template.master')

@section('pagetitle')
	Create Replacer
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::open(['url'=> '/admin/replacers', 'role' => 'form']) !!}
        @include('/admin/replacer/field')
    {!! Form::close() !!}
</div>
@endsection	
