@extends('template.master')

@section('pagetitle')
	{{ $item->title }}
@endsection	

@section('footer_script')
	<script src="{{ asset('/plugins/blazy/blazy.min.js') }}"></script>
	 <script>
        ;(function() {
            // Initialize
            var bLazy = new Blazy();
        })();
    </script>
@endsection	

@section('content')


@foreach ($images as $image)
	<img class="b-lazy" src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="{{ $image }}" alt="tes"  />
@endforeach	

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
