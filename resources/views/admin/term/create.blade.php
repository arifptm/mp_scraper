@extends('admin.template.master')

@section('pagetitle')
	Create Term
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::open(['url'=> '/admin/terms', 'role' => 'form']) !!}
        @include('admin.term.field')
    {!! Form::close() !!}
</div>
@endsection	
