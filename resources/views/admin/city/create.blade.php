@extends('admin.template.master')

@section('pagetitle')
	Create City
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::open(['url'=> '/admin/cities', 'role' => 'form']) !!}
        @include('/admin/city/field')
    {!! Form::close() !!}
</div>
@endsection	
