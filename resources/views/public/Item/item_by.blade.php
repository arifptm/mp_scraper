@extends('public.theme.master_layout')

<div class="container" id="listings-page">
    <div class="row">
        <div class="col-sm-12 listing-wrapper listings-top listings-bottom">
            <br>
            <br>
            
            <div class="row">
                <div class="col-sm-12">	
                    <ol class="breadcrumb">
                        <li><a href="listings.html" class="link-info"><i class="fa fa-chevron-left"></i> Back to listings</a></li>
                        <li><a href="/">Beranda</a></li>
                        @if ($item->category->parent()->first()->parent()->first())	
                        	<li><a href="#">{{ $item->category->parent()->first()->parent()->first()->name }}</a></li>
                        @endif
                        @if ($item->category->parent()->first())	
                        	<li><a href="#">{{ $item->category->parent()->first()->name }}</a></li>
                        @endif	
                        <li class="active">{{ $item->category->name }}</li>                       
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-7">	
                    <h1 class="nodetitle">{{ $item->title }}</h1>
                    <p>Lokasi: {{ $item->seller->city->name }}</p>
                </div>
                <div class="col-sm-5">
                    <p class="price"><span class="h6"">Rp.30.000</span> <span class="h6"><strong>diskon 50%</strong></span><br>{{ $item->sell_price }}</p>
                </div>
            </div>		

            <div class="row">

            <div class="col-sm-7">	
            <!-- container fb -->
            </div>
            </div>
            <hr>


            <div class="row">

                <div class="col-sm-7">
                   {!! $item->body !!}
                    <p>
                        <span class="classified_links ">
                            <a class="link-info" href="#"><i class="fa fa-share"></i> Share</a>&nbsp;
                            <a class="link-info " href="#"><i class="fa fa-star"></i> Add to favorites</a>
                            &nbsp;<a class="link-info " href="#"><i class="fa fa-envelope-o"></i> Contact</a>
                            &nbsp;<a class="link-info fancybox-media" href="http://maps.google.com/?ll=48.85796,2.295231&amp;spn=0.003833,0.010568&amp;t=h&amp;z=17"><i class="fa fa-map-marker"></i> Map</a></span>
                    </p>
                </div>

                <div class="col-sm-5 center zoom-gallery">
                    <div class="row center">
                        <div class="col-sm-12">	
							<div id="panel" style="text-align:center;width:100%;max-height:350px;">
								<div class="nodeimg_bg">
									<img  id="largeImage" class="b-lazy" src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="{{ $full_image }}" alt="" />
								</div>
							</div>
                            <br>
                            
                            <div class="row" id="gallery">
                                <div id="thumbs" style="text-align:center;width:100%">
                                @foreach($thumbs as $thumb)
                                <div class="col-xs-4" style="margin-bottom: 10px;">	
                                    <div class="thumbnail">
                                        <img class="b-lazy" src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="{{ $thumb }}" alt=""  />
                                    </div>
                                </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>	
                    <br>	
                    <div class="col-sm-12" style="text-align: center; margin: 0 auto">	
                        <button data-toggle="modal" data-target="#myModal" class="btn btn-warning" style="text-align: center;width: 180px; " type="button">Reply to ad</button>
                        <br>
                        <p>or call Alan on 9824614705</p>
                    </div>
                    <br>
                </div>				

            </div>	














            <div class="col-sm-12 listings">
            	<br>
            	<div class="row">

            		<div class="panel panel-default recent-listings hidden-xs">

            			<div class="panel-heading">Recent Cars, Vans &amp; Motorbikes ads in London</div>





            				</div>
            			</div>
					</div>	
            	</div>


@section('main')
	@foreach ($items as $item)
		{{ $item->title }}<br>
		{{ $item->seller->name }}<br>
	@endforeach
@endsection