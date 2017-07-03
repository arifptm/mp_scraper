@extends('template.master')

@section('pagetitle')
	{{ $item->title }}
@endsection	

@section('content')


{!! unserialize($item->images) !!}
<br>
Marketplace: {{ $item->feed->marketplace->name }}
<br>
Category: {{ $item->category->name }}
<br>
Seller Name: {{ $item->seller->name }}
<br>
Seller City: {{ $item->seller->city->name }}
<br>
Seller Image: <img src="{{ $item->seller->image_url }}" alt="" />
<br>
Price: {{ $item-> sell_price }}
<br>
Body: {!! $item-> body !!}
<br>
Details: {!! $item-> details !!}
<br>
SE: {!! $item-> se !!}


@endsection	
