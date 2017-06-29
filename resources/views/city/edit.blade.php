@extends('theme.master')

@section('pagetitle')
	Edit Role
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::model($role, ['action'=> ['RoleController@update', $role->id], 'method'=>'patch', 'role' => 'form']) !!}
        @include('role/role-field')
    {!! Form::close() !!}
</div>
@endsection	
