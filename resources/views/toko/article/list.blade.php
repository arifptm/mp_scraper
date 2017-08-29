@extends('toko.template.blog_layout')

@section('meta')
	<title>Kumpulan artikel seputar marketplace Indonesia</title>
    <meta name="language" content="id" />
    <meta name="description" content="Kumpulan artikel seputar marketplace Indonesia, promo, diskon, info terbaru Tokopedia, Bukalapak, Lazada, Blibli, MatahariMall, Elevenia, Shopee, dan sebagainya."/>
@endsection

@section('content-top')
	<div class="image-bg-breadcrumb" style="background-image:url('http://static.99toko.com/seller-head.jpg');">			
		<div class="breadcrumb-inner">				
			<div class="container">
				<h1 class="subtitle">Kumpulan artikel seputar marketplace Indonesia</h1>
				<ol class="breadcrumb-list">
					<li><a href="/">Beranda</a></li>
					<li><span>Kumpulan artikel</span></li>
				</ol>
			</div>				
		</div>
	</div>
@endsection

@section('content-main')
	<div class="blog-wrapper">
		@foreach($articles as $article)	
			<div class="blog-item">										
				<div class="blog-media">
					<div class="overlay-box">
						<a class="blog-image" href="/artikel/{{ $article->slug }}">
							<img class="img-responsive b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ $article->image }}" alt="">
							<div class="image-overlay">
								<div class="overlay-content">
									<div class="overlay-icon"><i class="fa fa-link"></i></div>
								</div>
							</div>
						</a>
					</div>
				</div>						
			
				<div class="blog-content">
					<h3><a href="/artikel/{{ $article->slug }}" class="inverse">{{ $article->title }}</a></h3>
					<ul class="blog-meta">
						<li>by <strong>99toko</strong></li>
						<li>{{ $article->created_at->format('d M Y') }}</li>
						<li>in 
							@foreach($article->term as $key=>$term)
							<a href="/term/{{ $term->slug }}">{{ $term->name }}</a>{{ (count($article->term) > $key+1) ? ',' : '' }}
							@endforeach
						</li>						
					</ul>
					<div class="blog-entry">  
						{!! str_limit(strip_tags($article->body,'<p>'),350) !!}
					</div>
					<a href="/artikel/{{ $article->slug }}" class="btn-blog">Read More <i class="fa fa-long-arrow-right"></i></a>
				</div>			
			</div>
		@endforeach
	
		<div class="pager-wrapper bt mt-50 pt-30 clearfix">			
			<nav class="pull-right">
				{{ $articles->links() }}
			</nav>
		</div>			
	</div>
@endsection

@section('content-side')
	<aside class="sidebar-wrapper for-blog">
		
		<div class="sidebar-module clearfix">
			<h6 class="sidebar-title">Artikel Terbaru</h6>
			<ul class="sidebar-post">							
				@foreach($populars as $popular)
				<li class="clearfix">
					<a href="/artikel/{{ $popular->slug }}">
						<div class="image">
							<img src="{{ $popular->image }}" alt="Artikel terbaru" class="img-responsive">
						</div>
						<div class="content">
							<h6>{{ $popular->title }}</h6>
							<p class="recent-post-sm-meta"><i class="fa fa-clock-o mr-5"></i>{{ $popular->created_at->format('d-m-Y') }}</p>
						</div>
					</a>				
				</li>
				@endforeach	
			</ul>			
		</div>							
		
		@if (isset($terms))
		<div class="sidebar-module clearfix">		
			<h6 class="sidebar-title">Tags</h6>			
			<div class="tag-cloud clearfix">
				@foreach($terms as $term)
					<a href="/term/{{ $term }}" class="tag-item">{{ $term->name }}</a>				
				@endforeach
			</div>			
		</div>			
		@endif	
	</aside>
@endsection