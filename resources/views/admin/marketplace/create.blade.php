@extends('admin.template.master')

@section('pagetitle')
	Create Marketplace
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::open(['url'=> '/admin/marketplaces', 'role' => 'form']) !!}
        @include('/admin/marketplace/field')
    {!! Form::close() !!}
</div>
@endsection	
