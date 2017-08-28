@extends('toko.template.blog_layout')

@section('content-top')
	<div class="image-bg-breadcrumb" style="background-image:url('/themes/images/seller-head.jpg');">			
		<div class="breadcrumb-inner">				
			<div class="container">
				<h1 class="subtitle">{{ $page->title }}</h1>
			</div>				
		</div>
	</div>
@endsection

@section('content-main')
	<div class="blog-wrapper">
		<div class="blog-item single">								
			<div class="blog-content">
				<h3>{{ $page->title}}</h3>
				<div class="blog-entry">  
					{!! $page->body !!} 
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
		
			<h6 class="sidebar-title">Menu</h6>
			
			<ul class="sidebar-category">
				<li><a href="/">Beranda</a></li>
				<li><a href="/pg/tentang-kami">Tentang Kami</a></li>
				<li><a href="/pg/ketentuan">Ketentuan</a></li>
				<li><a href="/pg/kontak">Kontak Kami</a></li>
				
			</ul>
									
		</div>
	
	</aside>
@endsection