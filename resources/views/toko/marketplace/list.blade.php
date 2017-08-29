@extends('toko.template.layout')

@section('meta')
	<title>Daftar marketplace yang ada di Indonesia</title>
    <meta name="language" content="id" />
    <meta name="description" content="Daftar Marketplace yang ada di Indonesia, Tokopedia, Bukalapak, Lazada, Blibli, MatahariMall,Elevenia, Shopee, dan sebagainya."/>
    <meta name="keywords" content="Marketplace Indonesia, Tokopedia, Bukalapak, Lazada, Blibli, MatahariMall, Elevenia, Shopee"/>
@endsection

@section('content-top')
	<div class="image-bg-breadcrumb" style="background-image:url('http://static.99toko.com/marketplace-head.jpg');">			
		<div class="breadcrumb-inner">				
			<div class="container">
				<h2>Daftar Marketplace Indonesia</h2>
				<ol class="breadcrumb-list">
					<li><a href="/">Beranda</a></li>
					<li><span>Marketplace</span></li>
				</ol>
			</div>				
		</div>
	</div>
@endsection


@section('content-main')

	<section class="pv-60">			
		<div class="container">	
			<div class="category-item-02-wrapper GridLex-gap-10">			
				<div class="GridLex-grid-noGutter-equalHeight">
					@foreach($marketplaces as $marketplace)								
						<div class="GridLex-col-4_mdd-4_sm-4_xs-6_xss-6 ">	
							<div class="category-item-01">									
								<a href="/itm/mk/{{ $marketplace->slug}}">
									<div class="marketplace-card-img">
										<img src="{{ $marketplace->logo_url }}" alt="{{ $marketplace->name }}">
									</div>
								</a>
								<h6 class="card-marketplace-name">
									<a href="/itm/mk/{{ $marketplace->slug}}">{{ $marketplace->name }}</a>
								</h6>
							</div>													
						</div>					
					@endforeach							
				</div>						
			</div>
			<div class="clear mb-30">	
		</div>
	</section>
@endsection
						