@extends('public.theme.home_layout')

@section('main')

@foreach($items as $item)
	{{ $item->title }}<br>as
@endforeach

@endsection