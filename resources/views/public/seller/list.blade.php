@extends('public.theme.master_layout')

@section('title')
	Daftar seller / penjual olshop Indonesia
@endsection


@section('main')
	<h1 class="pagetitle">Daftar seller / penjual olshop Indonesia</h1>
	<div class="row ">	
		@foreach($sellers->chunk(5) as $chunks)	
			<div class="col-xs-6 col-sm-4 col-md-3 "> 				
				@foreach($chunks as $seller)	
					<div class="card">	
						<div class="card-seller">
							<div class="text-right">
								<a href="/itm/sl/{{ $seller->slug}}"><img src="{{ $seller->image_url }}"></a>
							</div>
							<div class="seller-data">
								<div class="seller-city"><i class="fa fa-map-marker"></i> {{ $seller->city->name }}</div>
							</div>	
							<div class="seller-name bg-info">{{ str_limit($seller->name,20) }}</div>
						</div>
					</div>	
				@endforeach
				
			</div>
		@endforeach	
	</div>
	<div class="row">		
		<div class="pagination">
				{{ $sellers->links() }}
		</div>	
	</div>		
@endsection