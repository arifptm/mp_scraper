@extends('template.master')

@section('pagetitle')
	Edit Marketplace
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::model($marketplace, ['action'=> ['MarketplaceController@update', $marketplace->id], 'method'=>'patch', 'role' => 'form']) !!}
        @include('marketplace/field')
    {!! Form::close() !!}
</div>
@endsection	
