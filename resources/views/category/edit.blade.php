@extends('template.master')

@section('pagetitle')
	Edit Category
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::model($category, ['action'=> ['CategoryController@update', $category->id], 'method'=>'patch', 'role' => 'form']) !!}
        @include('category/field')
    {!! Form::close() !!}
</div>
@endsection	
