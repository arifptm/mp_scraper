@extends('public.theme.master_layout')

@section('footer_script')
<script src="{{ asset('plugins/blazy/blazy.min.js') }}"></script>
<script>
    
        var bLazy = new Blazy();

</script>
@endsection

@section('main')
	<div class="row">
	<h1 class="pagetitle col-sm-12">{{ $pagetitle }}</h1>
	@foreach ($items as $item)
		<div class="col-xs-6 col-sm-4 col-md-3">
		
			<div class="card">
				<div class="card-image">				
					<a href="/{{ $item->slug }}"><img class="b-lazy img-responsive marginauto" src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="{{ str_replace('/rawimage/','/s-280-200/', explode('|', $item->images)[0]) }}" alt="gambar {{ $item->title }}"  /></a>
				</div>


				<div class="card-title"><a href="/{{ $item->slug }}">{{ $item->title}}</a></div>

				@if ($item->discount != 0)<div class="card-discount"><div>Diskon</div><div><span  class="percent">{{ $item->discount }}</span>%</div> </div>@endif

				<div class="card-price">
					
					<div class="card-rawprice coret">{{ $item->raw_price }}</div>
					<div class="card-sellprice">{{ $item->sell_price }}</div>
				</div>	
				<div class="text-center">{{ $item->feed->marketplace->name }}</div>
				<div class="text-center">{{ $item->seller->city->name }}</div>

			</div>
		</div>	
			
	@endforeach
	</div>
@endsection