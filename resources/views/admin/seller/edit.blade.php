@extends('template.master')

@section('pagetitle')
	Edit Seller
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::model($seller, ['action'=> ['SellerController@update', $seller->id], 'method'=>'patch', 'role' => 'form']) !!}
        @include('seller/field')
    {!! Form::close() !!}
</div>
@endsection	
