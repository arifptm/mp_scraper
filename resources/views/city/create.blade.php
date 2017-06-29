@extends('template.master')

@section('pagetitle')
	Create City
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::open(['url'=> '/cities', 'role' => 'form']) !!}
        @include('city/field')
    {!! Form::close() !!}
</div>
@endsection	
