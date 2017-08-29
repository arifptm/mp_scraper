@extends('toko.template.layout')

@section('meta')
<title>{{ $item->title }}</title>
    <meta name="description" content="{!! str_limit($item->title,60) .'. '. strip_tags(str_limit($item->body,60)) !!}"/>
    <meta name="keywords" content=""/>
    <meta name="language" content="id" />
    <link http-equiv="x-dns-prefetch-control" content="on"/>
    <link rel="dns-prefetch" href="//99toko.com"/>
        
    <meta property="og:type" content="product"/>
    <meta property="og:site_name" content="{{ config('site_name') }}"/>
    <meta property="og:title" content="{{ $item->title }}"/>
    <meta property="og:description" content="{!! str_limit($item->title,60) .'. '. strip_tags(str_limit($item->body,60)) !!}"/>
    <meta property="og:url" content="{{ $item->item_url }}"/>
    <meta property="og:image" content="{{ App\Services\Scraper::getImage($item->images, $item->feed->marketplace->slug)['node'][0] }}"/>
        
    <meta name="twitter:title" content="{{ $item->title }}"/>
    <meta name="twitter:site" content="@arifptm"/>
    <meta name="twitter:card" content="product"/>
    <meta name="twitter:label1" content="Category"/>
    <meta name="twitter:data1" content="{{ $item->category->name }}"/>
    <meta name="twitter:label2" content="Harga"/>
    <meta name="twitter:data2" content="{{ 'Rp.'.$item->sell_price }}"/>
    <meta name="twitter:label3" content="Lokasi"/>
    <meta name="twitter:data3" content="{{ $item->seller->city->name }}"/>       
@endsection 

@section('content-top')
    <div class="image-bg-breadcrumb" style="background-image:url('http://static.99toko.com/main-head.jpg');">        
        <div class="breadcrumb-inner text-left">        
            <div class="container">            
                <div class="GridLex-gap-30">            
                    <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-bottom">                    
                        <div class="GridLex-col-8_mdd-12_sm-12_xs-12_xss-12">                        
                            <div class="GridLex-inner">
                                <div class="clearfix cats">
                                    <span class="label label-danger"><a href="/itm/mk/{{ $item->feed->marketplace->slug }}" class="white-link"><i class="fa fa-chevron-left"></i> {{ $item->feed->marketplace->name }}</a></span>
                                    @if ($item->category->parent()->count())    
                                        @if ($item->category->parent()->first()->parent()->count()) 
                                           <span class="label label-primary"><a class="white-link" href="/itm/ca/{{ $item->category->parent()->first()->parent()->first()->slug }}">{{ $item->category->parent()->first()->parent()->first()->name }}</a></span>
                                        @endif   
                                    @endif
                                    @if ($item->category->parent()->count())    
                                        <span class="label label-primary"><a class="white-link" href="/itm/subca/{{ $item->category->parent()->first()->slug }}">{{ $item->category->parent()->first()->name }}</a></span>
                                    @endif 
                                    <span class="label label-primary"><a class="white-link" href='{{ $item->category->slug }}'>{{ $item->category->name }}</a></span> 
                                    <span><a href="/admin/items/{{$item->id}}/edit" >Edit</a></span>                                        
                                </div>
                                <p class="detail-heading-location"><i class="fa fa-map-marker text-primary"></i> {{ $item->seller->city->name }} &nbsp; <small><i class="fa fa-calendar text-primary"></i> {{ \Carbon\Carbon::parse($item->updated_at)->format('d-m-Y h:i') }}</small></p>
                                <h1 class="detail-heading-name">{{ $item->title }}</h1>
                            </div>
                        </div>
                        
                        <div class="GridLex-col-4_md-5_sm-6_xs-12_xss-12">                        
                            <div class="GridLex-inner breadcrumb-slider-bottom">                                
                                <div class="pull-right pull-left-mdd mb-10 clearfix">            
                                    <div class="rating-style-2 text-white">                                    
                                        <div class="rating-inner clearfix">
                                            <div class="rating-score">
                                                Rp.{{ $item->sell_price }}
                                            </div>
                                            @if ($item->raw_price)                                              
                                                <div class="rating-content">
                                                    <span class="out-of">Rp.{{ $item->raw_price }}</span>
                                                    <span>Diskon {{ $item->discount }}%</span>
                                                </div>
                                            @endif                                          
                                        </div>                                        
                                    </div>                                  
                                </div>
                                
                                <div class="clear"></div>
                                
                                <div class="detail-heading-action">
                                    <div class="detail-heading-action-inner">
                                        <div class="row gap-2">
                                            <div class="col-xs-12 col-sm-12">

                                                @if($item->sold_out == 0)
                                                    <div class="on-sale" data-toggle="modal" data-target="#gotopage" ref="{{ $item->slug }}"><i class="fa fa-shopping-cart"></i> KUNJUNGI TOKO</div>
                                                @else
                                                    <div class="sold-out">.:: SOLD OUT ::.</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>                            
                            </div>                            
                        </div>                        
                    </div>                    
                </div>                
            </div>        
        </div>        
    </div>
@endsection

@section('content-main')   
    <section class="pv-60">    
        <div class="container">        
            <div class="GridLex-gap-30">                
                <div class="GridLex-grid-noGutter-equalHeight">                
                    <div class="GridLex-col-8_sm-12_xs-12_xss-12">                            
                        <div class="GridLex-inner mt-30-xss">                                
                            <div class="detail-content detail-content-with-slick-gallery">
                                <div class="slick-gallery-slideshow-wrapper">  
                                    <div class="slider slick-gallery-slideshow slick-slider">
                                        @foreach(Scraper::getImage($item->images, $item->feed->marketplace->slug)['node'] as $node)
                                            <div>
                                                <div class="centro">
                                                    <img class="node b-lazy" src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="{{ $node }}" alt=""  />
                                                </div>
                                            </div>
                                        @endforeach                                                    
                                    </div>
                                    <div class="slider slick-gallery-nav slick-slider">
                                        @if(count(Scraper::getImage($item->images, $item->feed->marketplace->slug)['thumb']) > 0 )
                                            @foreach(Scraper::getImage($item->images, $item->feed->marketplace->slug)['thumb'] as $thumb)
                                                <div>
                                                    <div class="image centro">
                                                        <img class="tiny" src="{{ $thumb }}" alt=""  />         
                                                    </div>
                                                </div>
                                            @endforeach                                                    
                                        @endif
                                    </div>                                            
                                </div>

                                <div class="clear mb-20"></div>
                                
                                <div class="tab-style-02-wrapper">                                        
                                    <ul id="mapInTab" class="tab-nav clearfix tab-for-detail-page">
                                        <li class="active"><a href="#tab_2-01" data-toggle="tab">Deskripsi</a></li>
                                        <li><a href="#tab_2-02" data-toggle="tab">Detil</a></li>                                                
                                        <li><a href="#tab_2-03" data-toggle="tab">Info tambahan</a></li>  
                                    </ul>
                                    
                                    <div id="myTabContent" class="tab-content">
                                        <div class="tab-pane fade in active" id="tab_2-01">                                                
                                            <div class="tab-content-inner">                                                    
                                                {!! $item->body !!}
                                            </div>                                                    
                                        </div>
                                        <div class="tab-pane fade" id="tab_2-02">                                                
                                            <div class="tab-content-inner">                                                    
                                            {!! $item->details !!}
                                            </div>                                                    
                                        </div>
                                        <div class="tab-pane fade pane-se" id="tab_2-03">                                                
                                            <div class="tab-content-inner">                                                    
                                            {!! $item->se !!}
                                            </div>                                                    
                                        </div>
                                    </div>                                                
                                </div> 
                                <div class="clear mb-20">               
                                </div>
                                        
                                <div class="blog-extra">
                                    <div class="row">                                        
                                            <div class="tag-cloud clearfix mt-0">
                                                <span><i class="fa fa-tags"></i> Tags: </span>
                                                    @if (count($item->tags) != 0)
                                                    @foreach($item->tags as $key=>$tag) <a href="#" class="tag-item">{{ $tag->name }}</a>  @endforeach
                                                    @endif
                                            </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>                                   
                            </div>                                    
                        </div>                                
                    </div>
                    
                    <div class="GridLex-col-4_sm-12_xs-12_xss-12">                    
                        <div class="GridLex-inner">
                            @if (count($relateds) > 0)     
                                <!-- Start ROW1 -->
                                <div class="row">                            
                                    <div class="col-xs-12 col-sm-6 col-md-12">                                
                                        <div class="sidebar-box">                                
                                            <h5 class="heading no-bg"><span>Produk Serupa</span></h5>
                                            <div class="sidebar-box-inner">                                        
                                                <div class="sumi-gallery-wrapper clearfix">   
                                                     @foreach($relateds as $related)
                                                        <div class="sumi-gallery-item">
                                                            <div class="sumi-gallery-inner">
                                                                <a href="/{{ $related->slug }}">
                                                                    <div class="centro teaser related">
                                                                        <img class="b-lazy img-responsive" src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="{{ Scraper::getImage($related->images, $item->feed->marketplace->slug)['teaser'][0] }}" alt=""  />
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endforeach                                       
                                                </div>                                            
                                            </div>                                        
                                        </div>                                
                                    </div>                            
                                </div>
                                <!-- End ROW1 -->
                            @endif
                        </div>                        
                    </div>                    
                </div>  
            </div>
        </div>
    </section>

    <div id="gotopage" class="modal fade" role="dialog">    
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="counter"></div>
                <div>Produk <span class="h4"><strong>{{ $item->title }}</strong></span> dijual oleh <strong>{{ $item->seller->name }}</strong></div>
                <div class="clear mb-20"> </div>
                <div>99toko hanya sebagai penyedia layanan informasi. Proses jual beli menjadi tanggungjawab masing-masing pihak. Kami tidak bertanggung jawab pada proses transaksi jual beli barang yang tersebut.</div>
                <div class="clear mb-30"> </div>
                <div class="h4">Selamat berbelanja...</div>
            </div>    
        </div>  
    </div> 

    @if (count($others) > 0)
        <section class="pv-60 bg-light">    
            <div class="container">
                <div class="section-title text-left">
                    <h3 class="bb">Produk lain di {{ $item->seller->city->name }}</h3>
                </div>                          
                <div class="GridLex-gap-30">                    
                    <div class="GridLex-grid-noGutter-equalHeight">
                        @foreach ($others as $other)
                            <div class="GridLex-col-4_sm-6_xs-12">                    
                                <div class="listing-list-sm-item">            
                                    <a class="black-bold-link" href="/{{ $other->slug }}">
                                        <div class="image-bg leftro">                                        
                                            <img class="b-lazy thumb" data-src="{{ Scraper::getImage($other->images,$other->feed->marketplace->slug)['teaser'][0] }}">
                                        </div> 
                                    </a>
                                    <div class="content">
                                        <span class="label"><a class="white-link" href="#">{{ $other->category->name }}</a></span>
                                        <h6 class="twolines"><a class="black-bold-link" href="/{{ $other->slug }}">{{ $other->title }}</a></h6>
                                        <div class="review clearfix">                                        
                                            <div class="other-sell_price">
                                                <small>Rp.</small>{{ trim($other->sell_price) }}
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
    @endif
@endsection

@section('header-scripts')
        
@endsection

@section('footer-scripts')
@endsection	
                        
                
                
