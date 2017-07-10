@extends('template.master')

@section('pagetitle')
	Create Feed
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::open(['url'=> '/items', 'role' => 'form']) !!}
        @include('item/field')
    {!! Form::close() !!}
</div>
@endsection	
