@extends('toko.template.blog_layout')

@section('content-top')
	<div class="image-bg-breadcrumb" style="background-image:url('http://static.99toko.com/seller-head.jpg');">			
		<div class="breadcrumb-inner">				
			<div class="container">
				<h1 class="subtitle">{{ $article->title }}</h1>
				<ol class="breadcrumb-list">
					<li><a href="/">Beranda</a></li>
					<li><a href="/artikel/all"><span>Kumpulan artikel</span></a></li>
					<li><span>Artikel</span></li>
				</ol>
			</div>				
		</div>
	</div>
@endsection

@section('content-main')
	<div class="blog-wrapper">
		<div class="blog-item single">								
			<div class="blog-media">
				<img src="{{ $article->image }}" alt="">
			</div>			
			<div class="blog-content">
				<h3>{{ $article->title}}</h3>
				<div class="blog-entry">  
					{!! $article->body !!} 
				</div>
			</div>
		</div>
		<div class="clear">
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