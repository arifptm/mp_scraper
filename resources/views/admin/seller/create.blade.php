@extends('template.master')

@section('pagetitle')
	Create Seller
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::open(['url'=> '/admin/sellers', 'role' => 'form']) !!}
        @include('/admin/seller/field')
    {!! Form::close() !!}
</div>
@endsection	
