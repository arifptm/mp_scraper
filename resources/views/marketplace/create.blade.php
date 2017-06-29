@extends('template.master')

@section('pagetitle')
	Create Marketplace
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::open(['url'=> '/marketplaces', 'role' => 'form']) !!}
        @include('marketplace/field')
    {!! Form::close() !!}
</div>
@endsection	
