@extends('public.theme.master_layout')

@section('title')
	{{ $page->title }}
@endsection

@section('main')

<div class="col-md-12">

	<h1>{{ $page->title}}</h1>
	<hr>
	<div class="row">
	     <div class="col-md-12">
			{!! $page->body !!}
	 	</div>
	</div>
</div>

	

	

@endsection

@section('right')
	<h2>sadasdasd</h2>

	
@endsection