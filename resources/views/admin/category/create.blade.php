@extends('template.master')

@section('pagetitle')
	Create Category
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::open(['url'=> '/categories', 'role' => 'form']) !!}
        @include('category/field')
    {!! Form::close() !!}
</div>
@endsection	
