<div class="jumbotron home-tron-search well ">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="home-tron-search-inner">
					<div class="row">
						<div class="col-sm-8 col-xs-9" style="text-align: center">
							<div class="row">
								<div class="col-sm-12 col-sm-offset-1">
									<div class="input-group">
										<span class="input-group-addon input-group-addon-text hidden-xs">Find me a</span>
										<input type="text" class="form-control col-sm-3" placeholder="e.g. BMW, 2 bed flat, sofa ">
										<div class=" input-group-addon hidden-xs">
											<div class="btn-group">
												<button type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
													All categories <span class="caret"></span>
												</button>
												<ul class="dropdown-menu" role="menu">
													<li><a href="#">Cars, Vans &amp; Motorbikes</a></li>
													<li><a href="#">Community</a></li>
													<li><a href="#">Flats &amp; Houses</a></li>
													<li><a href="#">For Sale</a></li>
													<li><a href="#">Jobs</a></li>
													<li><a href="#">Pets</a></li>
													<li><a href="#">Services</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-4 col-xs-3" style="text-align: center">
							<div class="row">
								<div class="col-sm-11 pull-right">
									<button class="btn btn-primary search-btn"><i class="icon-search"></i>&nbsp;&nbsp;&nbsp;&nbsp;Search</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

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
                <div class="col-sm-9">	
                    <h1 class="nodetitle">{{ str_limit($item->title,110) }}</h1>
                    <p>Lokasi: {{ $item->seller->city->name }}</p>
                </div>
                <div class="col-sm-3">
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
                {{ $item->item_url }}
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
							<div style="text-align:center;max-height:280px;width: 100%;">
								<div class="nodeimg_bg">
									<img  id="largeImage" class="b-lazy img-responsive" src=data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw== data-src="{{ $full_image }}" alt="" style="margin:auto;"/>
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
                        <a  href="{{ $item->item_url}}" rel="no-follow" class="btn @if($item->sold_out == '1') disabled btn-danger @else btn-warning @endif" style="text-align: center;width: 180px;" role="button">Kunjungi toko</a>
                        <br>
                        <p>@if($item->sold_out == '0')di {{ $item->feed->marketplace->name }} @else SOLD OUT ! @endif</p>
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
