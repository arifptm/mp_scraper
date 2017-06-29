@extends('theme.master')

@section('pagetitle')
	Create Product
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::open(['url'=> '/products', 'role' => 'form']) !!}
        @include('product/field')
    {!! Form::close() !!}
</div>
@endsection	
