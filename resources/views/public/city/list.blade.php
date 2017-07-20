@extends('public.theme.master_layout')

@section('meta')
	<title>Daftar lokasi kota seller / penjual olshop di seluruh marketplace yang ada di Indonesia</title>
    <meta name="language" content="id" />
    <meta name="description" content="Daftar lokasi kota seller/penjual olshop di seluruh Marketplace yang ada di Indonesia, Tokopedia, Bukalapak, Lazada, Blibli, MatahariMall, Elevenia, Shopee, dan sebagainya."/>
    <meta name="keywords" content="Daftar lokasi seller, daftar kota penjual, lokasi olshop, Marketplace Indonesia, Tokopedia, Bukalapak, Lazada, Blibli, MatahariMall, Elevenia, Shopee"/>
@endsection

@section('main')
	<h1 class="pagetitle">Daftar lokasi seller</h1>
	<div class="row">
		@foreach ($cities->chunk(15) as $chunks)		
			<div class="col-md-3 border-right"> 
				@foreach($chunks as $city)			
					<div class="line-height-2"><i class="fa fa-map-marker"></i> <a href="/itm/ct/{{ $city->slug }}"> {{ $city->name }} </a></div>	
				@endforeach	
			</div>
		@endforeach
	</div>
	<div class="row">
		<div class="pagination">
			{{ $cities->links() }}
		</div>	
	</div>	
@endsection
