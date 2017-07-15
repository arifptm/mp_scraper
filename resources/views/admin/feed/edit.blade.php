@extends('admin.template.master')

@section('pagetitle')
	Edit Feed
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::model($feed, ['action'=> ['FeedController@update', $feed->id], 'method'=>'patch', 'role' => 'form']) !!}
        @include('admin/feed/field')
    {!! Form::close() !!}
</div>
@endsection	
