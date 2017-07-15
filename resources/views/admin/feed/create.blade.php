@extends('admin.template.master')

@section('pagetitle')
	Create Feed
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::open(['url'=> '/admin/feeds', 'role' => 'form']) !!}
        @include('/admin/feed/field')
    {!! Form::close() !!}
</div>
@endsection	
