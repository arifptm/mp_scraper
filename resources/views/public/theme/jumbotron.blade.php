@if (\Request::routeIs('frontpage'))

<div class="jumbotron home-search" style="">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <br />
                <p class="main_description">Temukan barang yang sama dengan harga termurah secepat kilat !</p>

                <br /><br />
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2" style="text-align: center">
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-text">Find me a</span>
                                    <input type="text" class="form-control col-sm-3" placeholder="e.g. BMW, 2 bed flat, sofa ">
                                    <div class=" input-group-addon hidden-xs">
                                        <div class="btn-group" >
                                            <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
                                            All categories <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Cars, Vans & Motorbikes</a></li>
                                                <li><a href="#">Community</a></li>
                                                <li><a href="#">Flats & Houses</a></li>
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
                </div>
                <br />
                <br />
                <div class="row">
                    <div class="col-sm-12" style="text-align: center">
                        <a href="listings.html" class="btn btn-primary search-btn">Search</a>
                    </div>
                </div>                
                <br />
                <br />
                <div class="row">
                    <div class="col-sm-12" style="text-align: center">
                        <div id="quotes">
                            @foreach ($rotators as $k=>$rotator)
                            <div>
                                {{ $random[$k][0] }}
                                <strong>{{ $rotator->seller->name }}</strong> 
                                {{ $random[$k][1] }} 
                                {{ str_limit($rotator->title,35) }}
                                {{ $random[$k][2] }}
                                <strong>{{ $rotator->seller->city->name }}</strong>
                            </div>
                            @endforeach
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@else

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

@endif