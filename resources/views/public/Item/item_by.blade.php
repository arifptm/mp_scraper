@extends('public.theme.master_layout')

@section('footer_script')
<script src="{{ asset('plugins/blazy/blazy.min.js') }}"></script>
<script>
    
        var bLazy = new Blazy();

</script>
@endsection

@section('main')
<br>
	@foreach ($items as $item)
		<div class="col-xs-12 col-sm-6 col-md-4">
			<div class="card" style='height:300px'>
				<img class="b-lazy img-responsive" src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="{{ str_replace('/rawimage/','/s-200-150/', explode('|', $item->images)[0]) }}" alt=""  />
			
			
				<div><a href="/{{ $item->slug }}">{{ $item->title}}</a></div>
				<div>{{ $item->sell_price }}</div>
				<div>{{ $item->seller->name }}</div>
				<div>{{ $item->seller->city->name }}</div>

			</div>
		</div>	
	@endforeach
@endsection