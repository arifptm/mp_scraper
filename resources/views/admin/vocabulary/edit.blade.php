@extends('admin.template.master')

@section('pagetitle')
	Edit Vocabulary
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::model($vocabulary, ['action'=> ['VocabularyController@update', $vocabulary->id], 'method'=>'patch', 'role' => 'form']) !!}
        @include('/admin/vocabulary/field')
    {!! Form::close() !!}
</div>
@endsection	
