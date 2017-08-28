@extends('toko.template.layout')

@section('meta')
    <title>{{ config('site_title') }}</title>
    <meta name="language" content="id" />
    <meta name="description" content="{{ config('site_description') }}"/>
    <meta name="keywords" content="{{ config('site_keywords') }}"/>
        
    <meta property="og:type" content="catalog"/>
    <meta property="og:site_name" content="{{ config('site_name') }}"/>
    <meta property="og:title" content="{{ config('site_title') }}"/>
    <meta property="og:description" content="{{ config('site_description') }}"/>
    <meta property="og:url" content="//{{ config('site_domain') }}"/>
    <meta property="og:image" content="{{ config('site_image') }}"/>
@endsection

@section('content-top')
            <div class="hero-header" style="background-image:url('themes/images/01bg.jpg');">                
                <div class="hero-header-texting">                
                    <div class="container">
                        <h1>Katalog Produk Terlengkap</h1>
                        <p>Temukan barang yang sama dengan harga termurah secepat kilat !</p>
                    </div>                
                </div>
                
                <div class="main-search-form-wrapper-01">        
                    <div class="container">                    
                        <div class="main-search-form-inner bg-change-focus-addclass-wrapper">                        
                            {!! Form::open([ 'url' => '/q/search', 'id'=>'searchform']  ) !!}
                                <div class="form-holder">                        
                                    <div class="row gap-1">                                    
                                        <div class="col-xss-12 col-xs-12 col-sm-8 col-md-8">
                                        
                                            <div class="form-group bg-change-focus-addclass mb-1-xs">
                                                <label>Kata kunci</label>
                                                {!! Form::text('search', null, [ 'placeholder'=> 'coba tulis "sa" untuk melihat autocomplete', 'class'=>'form-control col-sm-3', 'id'=>'EasyAutocompleteCategories']) !!}
                                            </div>                                            
                                        </div>                                        
                                        <div class="col-xss-12 col-xs-12 col-sm-4 col-md-4">                                        
                                            <div class="row gap-1">                                            
                                                <div class="col-xss-12 col-xs-12 col-sm-12">                                        
                                                    <div class="form-group bg-change-focus-addclass  mb-1-xss">
                                                        <label>Kategori</label>                                                        
                                                        {!! Form::select('category', $categories->pluck('name', 'id'), null, [
                                                                'class'=> 'form-control selectpicker', 
                                                                'data-live-search' => 'true',
                                                                'data-live-search-placeholder'=> 'Cari',
                                                                'data-none-selected-text'=>'Pilih Kategori',
                                                                'data-done-button' =>  'true',
                                                                'data-done-button-text'=>'OK',
                                                                'data-selected-text-format'=>'count > 3',
                                                                'multiple'
                                                            ]) 
                                                        !!}                                                        
                                                    </div>                                                    
                                                </div>
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

                <div class="container">
        
                    <div class="top-search-wrapper text-center">
                        <ul class="top-search-list" id="submit_top_search">
                            <li><span class="texting">Rekomendasi:</span></li>                            
                            @foreach($datas['top_search'] as $top)                                        
                                <li><a href="#">{{ $top->keyword }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>                
            </div>
@endsection

@section('content-main')
    <section class="bg-light">            
        <div class="container">                
            <div class="row">                
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">                        
                    <div class="section-title">                            
                        <h2>Produk terbaru</h2>                        
                        <p>Daftar produk update setiap menit. Untuk melihat semua produk terbaru <a href="#">klik di sini!</a></p>                        
                    </div>                            
                </div>                        
            </div>

            <div class="listing-grid-wrapper GridLex-gap-20">            
                <div class="GridLex-grid-noGutter-equalHeight">
                    @foreach ($items as $item)
                    <div class="GridLex-col-3_sm-4_xs-12_xss-12">                            
                        <div class="listing-grid-item">
                            <div class="content">                                    
                                <div data-toggle="tooltip" data-placement="top" title="{{ ucwords($item->seller->name) }} menjual {{ $item->title }} seharga {{ $item->sell_price }} di {{ $item->seller->city->name }} ({{ $item->feed->marketplace->name }})">
                                <a href="/{{ $item->slug }}">                                                                                
                                    <div class="image centro" >                                            
                                        <img class="b-lazy teaser landscape" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ Scraper::getImage($item->images, $item->feed->marketplace->slug)['teaser'][0] }}" alt="{{ $item->title }}" />                                            
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
                                        <a href="/itm/ct/{{ $item->seller->city->slug }}" class="fav-like">{{ $item->seller->city->name }}</a>                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach                            
                </div>
            </div>
        </div>                
    </section>
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="section-title">
                        <h2>Semua Kategori</h2>
                    </div>
                </div>
            </div>

            <div class="category-item-02-wrapper GridLex-gap-10">            
                <div class="GridLex-grid-noGutter-equalHeight">                                    
                    @foreach($categories as $category)
                    <div class="GridLex-col-2_mdd-3_sm-3_xs-4_xss-6">                            
                        <div class="category-item-01">
                            <a href="/itm/ca/{{ $category->slug}}" class="clearfix">
                                <div class="icon">
                                    <i class="{{ $category->icon}}"></i>
                                </div>
                                <div class="content">
                                    <h6>{{ $category->name }}</h6>
                                    <span> {{ number_format($category->counter->count,0,',','.') }} item</span>
                                </div>
                            </a>
                        </div>                                
                    </div>
                    @endforeach                         
                </div>                       
            </div>                   
        </div>
    </section> 
@endsection

@section('footer-scripts')
@endsection


