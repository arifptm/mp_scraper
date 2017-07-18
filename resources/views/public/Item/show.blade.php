@extends('public.theme.master_layout')


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
    <meta property="og:image" content="{{ $item->images['node'][0] }}"/>
        
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

@section('footer_script')
	<script src="{{ asset('/plugins/blazy/blazy.min.js') }}"></script>
	
    @if ($item->feed->marketplace->slug == 'bukalapak')
    <script>
        $('#thumbs').delegate('img','click', function(){
			var bLazy = new Blazy();
			    $('#largeImage').attr('class', 'b-lazy img-responsive').attr('src', 'https://cdn4.iconfinder.com/data/icons/black-icon-social-media/128/099317-google-g-logo.png').attr('data-src', $(this).attr('src').replace('/s-50-50/','/s-300-300/'));		
		});

        ;(function() {
            var bLazy = new Blazy();
        })();
    </script>
    @endif
@endsection	


@section('main')

            

{{--breadcrumb--}}
<div class="row">
    <div class="col-sm-12">	
        <ol class="breadcrumb">
            <li><a href="/itm/mk/{{ $item->feed->marketplace->slug }}" class="link-info"><i class="fa fa-chevron-left"></i> {{ $item->feed->marketplace->name }}</a></li>
            <li><a href="/">Beranda</a></li>
            @if ($item->category->parent()->first()->parent()->first())	
            	<li><a href="/itm/ca/{{ $item->category->parent()->first()->parent()->first()->slug }}">{{ $item->category->parent()->first()->parent()->first()->name }}</a></li>
            @endif
            @if ($item->category->parent()->first())	
            	<li><a href="/itm/subca/{{ $item->category->parent()->first()->slug }}">{{ $item->category->parent()->first()->name }}</a></li>
            @endif	
            <li class="active">{{ $item->category->name }}</li>                       
        </ol>
    </div>
</div>

{{--title/top--}}
<div class="row">
    <div class="col-sm-8">	
        <h1 class="nodetitle">{{ str_limit($item->title,120) }}</h1>
        <p><i class="fa fa-map-marker"></i> <a href="/itm/ct/{{ $item->seller->city->slug }}">{{ $item->seller->city->name }}</a> |  <i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</p>
    </div>
    <div class="col-sm-4">
        <div class="node-price">
            @if ($item->raw_price != null)
                <span class="h4 coret">{{ $item->raw_price }}</span>
                <span class="h4"><i class="fa fa-ellipsis-v"></i></span> 
                <span class="h6"><strong>Discount {{ $item->discount }}%</strong></span>
            @endif
            <div class="node-sellprice"><small>Rp.</small><strong>{{ $item->sell_price }}</strong></div>
        </div>    
    </div>
</div>		

<div class="row">
    <div class="col-sm-7">	
    <!-- container fb -->
    </div>
</div>

{{--start body--}}
<hr>
<div class="row marbot30">
    <div class="col-sm-7">                
        <div class="detail">{!! $item->details !!}</div>                
        <div class="body marbot30">{!! $item->body !!}</div>
        <div>
            @if (count($item->tags) != 0)
            Tags: @foreach($item->tags as $key=>$tag) {{ $tag->name }}@if(count($item->tags) != $key+1),@endif @endforeach
            @endif
        </div>
        <div class="setitle">Situs yang berhubungan dengan {{ $item -> title }}</div>
        <div class="se">{!! $item->se !!}</div>
    </div>

    <div class="col-sm-5 center zoom-gallery">
        <div class="row center marbot15">
            <div class="col-sm-12">	
				<div class="marbot15" style="text-align:center;max-height:300px;width: 100%;">
					<div class="nodeimg_bg">
						<img  id="largeImage" class="b-lazy img-responsive" src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="{{ $item->images['node'][0] }}" alt="" style="margin:auto;"/>
					</div>
				</div>
                            
                @if(count($item->images['thumb']) > '1')
                    <div class="row" id="gallery">
                        <div id="thumbs" style="text-align:center;width:100%">
                            @foreach($item->images['thumb'] as $thumb)
                                <div class="col-xs-4" style="margin-bottom: 10px;">	
                                    <div class="thumbnail">
                                        <img class="b-lazy" src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="{{ $thumb }}" alt=""  />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif    
                        
                <div class="col-sm-12" style="text-align: center; margin: 0 auto">	
                    <a  href="{{ $item->item_url}}" rel="no-follow" class="btn @if($item->sold_out == '1') disabled btn-danger @else btn-warning @endif" style="text-align: center;width: 180px;" role="button">Kunjungi toko</a>
                    <br>
                    <p>@if($item->sold_out == '0')di {{ $item->feed->marketplace->name }} @else SOLD OUT ! @endif</p>
                </div>
                
                <div class=""></div>
                
                @if (count($relateds) > 0)  
                <div class="panel panel-default">
                    <div class="panel-heading">Premium listings</div>
                    <div class="panel-body">
                        <div class="featured-gallery">
                            <div class="row">
                                 @foreach($relateds as $related)
                                    <div class="col-xs-6">
                                        <div class="">
                                            <img class="b-lazy img-responsive" src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="{{ $related->images['teaser'][0] }}" alt=""  />
                                        </div>    
                                        <div class=""><a href="/{{ $related->slug }}">{{ $related->title }}</a></div>
                                    </div> 
                                @endforeach                                       
 
                             </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>         
        </div>    
    </div>
</div>






<div class="row">
    <div class="col-sm-12 listings">            	
	   <div class="row">
		    <div class="panel panel-default recent-listings hidden-xs">
		  	   <div class="panel-heading">Produk terbaru dari {{ $item->seller->city->name }}</div>
               <div class="panel-body">
                                    @foreach($others as $other)
                                    <div class="col-xs-2" style="margin-bottom: 10px;"> 
                                        <div class="thumbnail">
                                            <a href="/{{ $other->slug }}">
                                            <img class="b-lazy" src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="{{ $other->images['teaser'][0] }}" alt=""  />
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
               </div>
		    </div>
	   </div>
     </div>	
</div>    

@endsection