@extends('public.theme.master_layout')

@section('title')

@endsection


@section('main')
	<h1 class="pagetitle">Daftar Marketplace</h1>
	<div class="row">
	
		@foreach($marketplaces as $marketplace)
			<div class="col-md-4">
				<div class="card-mk">
					<div class="card-mk-image"><a href="/itm/mk/{{ $marketplace->slug }}"><img src="{{ $marketplace->logo_url }}" alt="{{ $marketplace->name }}"></a> 
					</div>
								
					<div class="card-mk-name"><a href="/itm/mk/{{ $marketplace->slug }}">{{ $marketplace->name }}</a></div>
				</div>
			</div>	
		@endforeach
	</div>
@endsection
