@extends('public.theme.master_layout')

@section('meta')
	<title>Daftar marketplace yang ada di Indonesia</title>
    <meta name="language" content="id" />
    <meta name="description" content="Daftar Marketplace yang ada di Indonesia, Tokopedia, Bukalapak, Lazada, Blibli, MatahariMall,Elevenia, Shopee, dan sebagainya."/>
    <meta name="keywords" content="Marketplace Indonesia, Tokopedia, Bukalapak, Lazada, Blibli, MatahariMall, Elevenia, Shopee"/>
@endsection


@section('main')
	<h1 class="pagetitle">
		Daftar Marketplace
	</h1>
	
	<div class="row">	
		@foreach($marketplaces as $marketplace)
			<div class="col-md-4">
				<div class="card-mk">
					<div class="card-mk-image">
						<a href="/itm/mk/{{ $marketplace->slug }}"><img src="{{ $marketplace->logo_url }}" alt="{{ $marketplace->name }}"></a> 
					</div>
								
					<div class="card-mk-name">
						<i class="fa fa-shopping-cart"></i> <a href="/itm/mk/{{ $marketplace->slug }}">{{ $marketplace->name }}</a>
					</div>
				</div>
			</div>	
		@endforeach
	</div>
@endsection
