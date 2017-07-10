@extends('template.master')

@section('pagetitle')
	Create Seller
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::open(['url'=> '/sellers', 'role' => 'form']) !!}
        @include('seller/field')
    {!! Form::close() !!}
</div>
@endsection	
