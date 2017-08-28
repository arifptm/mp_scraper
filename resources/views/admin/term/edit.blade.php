@extends('admin.template.master')

@section('pagetitle')
	Edit Term
@endsection	
 
@section('content')
<div class="box box-primary">
    {!! Form::model($term, ['action'=> ['TermController@update', $term->id], 'method'=>'patch', 'role' => 'form']) !!}
        @include('/admin/term/field')
    {!! Form::close() !!}
</div>
@endsection	
