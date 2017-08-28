@extends('toko.template.layout')

@section('meta')
	<title>{{ $meta['title'] }}</title>
    <meta name="description" content="{{ $meta['description'] }}"/>
    @if (isset($meta['keywords']))
    <meta name="keywords" content="{{ $meta['keywords'] }} "/> 
    @endif
@endsection

@section('footer-scripts')
<script src="{{ asset('plugins/blazy/blazy.min.js') }}"></script>
<script>  
        var bLazy = new Blazy();
</script>
@endsection

@section('content-top')	
	<div class="image-bg-breadcrumb" style="background-image:url('/themes/images/produk-head.jpg');">	
                <div class="second-search-form-wrapper-01">        
                    <div class="container">                    
                        <div class="second-search-form-inner bg-change-focus-addclass-wrapper">                        
                            {!! Form::open([ 'url' => '/q/search', 'id'=>'searchform']  ) !!}
                                <div class="form-holder">                        
                                    <div class="row gap-1">                                    
                                        <div class="col-xss-12 col-xs-12 col-sm-12 col-md-12">                                        
                                            <div class="form-group bg-change-focus-addclass mb-1-xs">
                                                {!! Form::text('search', null, [ 'placeholder'=> 'coba tulis "sa" untuk melihat autocomplete', 'class'=>'form-control col-sm-3', 'id'=>'EasyAutocompleteCategories']) !!}
                                            </div>                                            
                                        </div>                                        
                                       
                                    </div>                                    
                                </div>                                
                                <div class="btn-holder">    
                                    {!! Form::submit('Cari',  ['class' => 'btn btn-primary btn-block']) !!}                            
                                </div>                            
                            {!! Form::close() !!}
                        </div>                    
                    </div>                    
                </div>

        <div class="clearfix mb-20"></div>
		<div class="breadcrumb-inner">				
			<div class="container">
				<h2>{{ $meta['pagetitle'] }}</h2>
				<ol class="breadcrumb-list">
					<li><a href="/">Beranda</a></li>
					<li><span>{{ $meta['breadcrumb'] }}</span></li>
				</ol>
			</div>				
		</div>
	</div>
@endsection

@section('content-main')
    <section class="bg-light">            
        <div class="container"> 
			<div class="listing-grid-wrapper GridLex-gap-20">			
				<div class="GridLex-grid-noGutter-equalHeight">
                    @foreach ($items as $item)
	                    <div class="GridLex-col-3_sm-4_xs-6_xss-12">                            
	                        <div class="listing-grid-item">
	                            <div class="content">                                    
	                                <div data-toggle="tooltip" data-placement="top" title="{{ ucwords($item->seller->name) }} menjual {{ $item->title }} seharga {{ $item->sell_price }} di {{ $item->seller->city->name }} ({{ $item->feed->marketplace->name }})">
	                                <a href="/{{ $item->slug }}">                                                                                
	                                    <div class="image centro" >                                            
	                                        <img class="teaser landscape b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ Scraper::getImage($item->images, $item->feed->marketplace->slug)['teaser'][0] }}" alt="{{ $item->title }}" />                                            
	                                    </div>                                            
	                                    <div class="listing-grid-featured">
	                                        @if($item->discount != 0)
	                                        	{{ $item->discount }}% OFF
	                                        @endif
	                                    </div>                                            
	                                    <div class="absolute-top width75">
	                                        <div class="listing-grid-category">{{ $item->category->name}}</div>
	                                    </div>                                            
	                                    <div class="listing-grid-info">
	                                        <h5>Rp.{{ $item->sell_price }}</h5>
	                                        <p class="location">{{ $item->title }}</p>
	                                    </div>
	                                </a></div>
	                            </div>
	                            <div class="content-bottom">
	                                <div class="{{ $item->feed->marketplace->slug }}-bg">
	                                    <div class="review clearfix">
											<span class="marleft26">{{ $item->feed->marketplace->name }}</span>
	                                        <a href="/itm/ct/{{ $item->seller->city->slug}}" class="fav-like">{{ $item->seller->city->name }}</a>                                            
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                    @endforeach 							
                </div>
			</div>
			
			<div class="clear mb-30">				
			</div>
			<div class="pager-wrapper">	
				<div class="simple-pagination pull-right">
					{{ $items->links() }}
				</div>
			</div>				
		</div>
	</section>
@endsection