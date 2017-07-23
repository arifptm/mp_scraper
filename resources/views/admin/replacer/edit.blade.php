@extends('admin.template.master')

@section('pagetitle')
	Edit Replacer
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::model($replacer, ['action'=> ['ReplacerController@update', $replacer->id], 'method'=>'patch', 'role' => 'form']) !!}
        @include('/admin/replacer/field')
    {!! Form::close() !!}
</div>
@endsection	
