@extends('toko.template.layout')

@section('meta')
	<title>{{ $meta['pagetitle'] }}</title>
    <meta name="language" content="id" />
    <meta name="description" content="{{ $meta['description'] }}"/>
    @if (isset($keyword))
    	<meta name="keywords" content="{{ $meta['keyword'] }}"/>
    @endif
@endsection

@section('content-top')
	<div class="image-bg-breadcrumb" style="background-image:url('http://static.99toko.com/seller-head.jpg');">			
		<div class="breadcrumb-inner">				
			<div class="container">
				<h1 class="subtitle">{{ $title }}</h1>
				<ol class="breadcrumb-list">
					<li><a href="/">Beranda</a></li>
					<li><span>Toko - Seller</span></li> 
				</ol>
			</div>				
		</div>
	</div>
@endsection

@section('content-main')
	<section class="pv-60">			
		<div class="container">				
			
			<div class="sorting-wrappper">								
				<div class="sorting-content">							
					<div class="row">							
						<div class="col-xss-12 col-xs-12 col-sm-12">
							<div class="sort-by-wrapper">
								<div class="sorting-middle-holder">
								{!! Form::open(['url'=> '/ls/seller/cari' ,'class'=>'form-inline']) !!}																				
									{!! Form::text('key', null,['class'=>'form-control']) !!}
									{!! Form::button('CARI', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
									<span class="marleft26 hidden-xs hidden-sm">
									@foreach(range('a', 'z') as $alpha)
										<a href="/ls/seller/{{ $alpha }}">{{ strtoupper($alpha) }}</a> |
									@endforeach
									<a href="/ls/seller/other">OTHER</a>
									</span>

								{!! Form::close() !!}
								</div>
							</div>
						</div>								
					</div>						
				</div>
			</div>
			

			<div class="category-item-02-wrapper GridLex-gap-10">			
				<div class="GridLex-grid-noGutter-equalHeight">
					@if(count($sellers) > 0)
					@foreach($sellers as $seller)								
						<div class="GridLex-col-2_mdd-3_sm-3_xs-4_xss-6">	
							<div class="category-item-01">									
								<a href="/itm/sl/{{ $seller->slug}}">
									<div class="image">
										<img class="responsive-image b-lazy" width="100px" height="100px" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ $seller->image_url }}" alt="">
									</div>
								</a>
								<h6 class="card-seller-name">
									<a href="/itm/sl/{{ $seller->slug}}">{{ $seller->name }}</a>
								</h6>
								<div class="card-seller-city">
									<a href="/itm/ct/{{ $seller->city->slug}}">{{ str_limit($seller->city->name,20) }}</a>
								</div>
							</div>													
						</div>					
					@endforeach
					@endif							
				</div>						
			</div>
			<div class="clear mb-30">				
			</div>
			<div class="pager-wrapper">			
				<div class="simple-pagination pull-right">
					@if(count($sellers) > 0) {{ $sellers->links() }} @endif
				</div>
			</div>				
		</div>			
	</section>
	
@endsection
