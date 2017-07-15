@extends('public.theme.master_layout')

@section('footer_script')
<script src="{{ asset('plugins/blazy/blazy.min.js') }}"></script>
<script>
    
        var bLazy = new Blazy();

</script>
@endsection

@section('main')
	<div class="row">
		<h1 class="pagetitle col-sm-12">{{ $pagetitle }} ({{ number_format( $items->total() ,0,",",".")}})</h1>
	</div>
	<div class="row">		
		@foreach ($items as $item)			
			<div class="col-xs-6 col-sm-4 col-md-3">		
				<div class="card">
					<div class="card-image">				
						<a href="/{{ $item->slug }}"><img class="b-lazy img-responsive marginauto" src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="{{ ($item->images['teaser'][0]) }}" alt="gambar {{ $item->title }}"  /></a>
					</div>

					<div class="card-title"><a href="/{{ $item->slug }}">{{ $item->title}}</a></div>





					@if ($item->discount != 0)<div class="card-discount"><div>Diskon</div><div><span  class="percent">{{ $item->discount }}</span>%</div> </div>@endif

					<div class="card-price">					
						<div class="card-rawprice coret">@if ( $item->raw_price != null )<small>Rp.</small>{{ $item->raw_price }}@endif</div>
						<div class="card-sellprice"><small>Rp.</small>{{ $item->sell_price }}</div>
					</div>	
					<div class="card-city {{ $item->feed->marketplace->slug }}-bg"><a href="/itm/ct/{{ $item->seller->city->slug }}">{{ $item->seller->city->name }}</a></div>
				</div>
			</div>				
		@endforeach
	</div>
	<div class="row">
		
			{{ $items->links() }}
		
	</div>	

			
@endsection