@extends('template.master')

@section('pagetitle')
	Create Feed
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::open(['url'=> '/feeds', 'role' => 'form']) !!}
        @include('feed/field')
    {!! Form::close() !!}
</div>
@endsection	
