@extends('toko.template.layout')

@section('meta')
	<title>Daftar lokasi kota seller / penjual olshop di seluruh marketplace yang ada di Indonesia</title>
    <meta name="language" content="id" />
    <meta name="description" content="Daftar lokasi kota seller/penjual olshop di seluruh Marketplace yang ada di Indonesia, Tokopedia, Bukalapak, Lazada, Blibli, MatahariMall, Elevenia, Shopee, dan sebagainya."/>
    <meta name="keywords" content="Daftar lokasi seller, daftar kota penjual, lokasi olshop, Marketplace Indonesia, Tokopedia, Bukalapak, Lazada, Blibli, MatahariMall, Elevenia, Shopee"/>
@endsection

@section('content-top')
	<div class="image-bg-breadcrumb" style="background-image:url('/themes/images/city-head.jpg');">			
		<div class="breadcrumb-inner">				
			<div class="container">
				<h2>Daftar kota lokasi seller</h2>
				<ol class="breadcrumb-list">
					<li><a href="/">Beranda</a></li>
					<li><span>Kota Seller</span></li>
				</ol>
			</div>				
		</div>
	</div>
@endsection

@section('content-main')
<section class="pv-60">			
	<div class="container">
		<div class="category-item-03-wrapper GridLex-gap-20 no-mb">			
			<div class="GridLex-grid-noGutter-equalHeight">
				@foreach ($cities as $city)		
					<div class="GridLex-col-3_mdd-4_sm-6_xs-6_xss-12">							
							<div class="category-item-03 card-city-list">
								<a href="/itm/ct/{{ $city->slug }}" class="clearfix">
									<div class="icon"><i class="fa fa-map-marker"></i></div>
									<div class="content">										
										<h6>{{ str_limit($city->name,22,'') }}</h6>										
									</div>
								</a>
							</div>
						</div>
				@endforeach		
			</div>
		</div>
		<div class="clear mb-30">				
		</div>
		<div class="pager-wrapper">		
			<div class="simple-pagination pull-right">	
				{{ $cities->links() }}
			</div>
		</div>	
	</div>

</section>
@endsection
