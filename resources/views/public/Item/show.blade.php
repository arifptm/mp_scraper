@extends('public.theme.master_layout')


@section('pagetitle')
	{{ $item->title }}
@endsection	

@section('footer_script')
	<script src="{{ asset('/plugins/blazy/blazy.min.js') }}"></script>
	<script>
        $('#thumbs').delegate('img','click', function(){
			var bLazy = new Blazy();
			$('#largeImage').attr('class', 'b-lazy').attr('src', 'https://cdn4.iconfinder.com/data/icons/black-icon-social-media/128/099317-google-g-logo.png').attr('data-src', $(this).attr('src').replace('/s-60-60/','/m-{{ config("node_image_hsize") }}-{{ config("node_image_vsize") }}/'));		
		});

        ;(function() {
            var bLazy = new Blazy();
        })();
    </script>
@endsection	

@section('main')

	<div id="panel" style="text-align:center;width:100%;max-height:350px;">
		<div style="height:350px;">
		<img  id="largeImage" class="b-lazy" src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="{{ $full_image }}" alt="" />
		</div>
	</div>

<div id="thumbs" style="text-align:center;width:100%">
@foreach ($thumbs as $thumb)
	<img class="b-lazy" src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="{{ $thumb }}" alt=""  />
@endforeach	
</div>

<br>
Marketplace: {{ $item->feed->marketplace->name }}
<br>
URL: {{ $item->item_url }}
<br>
Category: {{ $item->category->name }}
<br>
Seller Name: {{ $item->seller->name }}
<br>
Seller City: {{ $item->seller->city->name }}
<br>
Seller Image: <img src="{{ $item->seller->image_url }}" alt="" />
<br>
Price: {{ $item-> sell_price }}
<br>
Body: {!! $item-> body !!}
<br>
Details: {!! $item-> details !!}
<br>
SE: {!! $item-> se !!}


@endsection	
