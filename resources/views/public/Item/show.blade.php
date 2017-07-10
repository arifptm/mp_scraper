@extends('public.theme.master_layout')


@section('title')
	{{ $item->title }}
@endsection	

@section('footer_script')
	<script src="{{ asset('/plugins/blazy/blazy.min.js') }}"></script>
	<script>
        $('#thumbs').delegate('img','click', function(){
			var bLazy = new Blazy();
			$('#largeImage').attr('class', 'b-lazy').attr('src', 'https://cdn4.iconfinder.com/data/icons/black-icon-social-media/128/099317-google-g-logo.png').attr('data-src', $(this).attr('src').replace('/s-98-65/','/m-4000-{{ config("node_image_vsize") }}/'));		
		});

        ;(function() {
            var bLazy = new Blazy();
        })();
    </script>
@endsection	
