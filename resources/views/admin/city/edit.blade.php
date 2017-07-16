@extends('admin.template.master')

@section('pagetitle')
	Edit City
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::model($city, ['action'=> ['CityController@update', $city->id], 'method'=>'patch', 'role' => 'form']) !!}
        @include('/admin/city/field')
    {!! Form::close() !!}
</div>
@endsection	
