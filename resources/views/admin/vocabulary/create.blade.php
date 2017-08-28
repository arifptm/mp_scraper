@extends('admin.template.master')

@section('pagetitle')
	Create Vocabulary
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::open(['url'=> '/admin/vocabularies', 'role' => 'form']) !!}
        @include('admin.vocabulary.field')
    {!! Form::close() !!}
</div>
@endsection	
