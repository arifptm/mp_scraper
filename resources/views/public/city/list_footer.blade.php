<div class="row directory-counties hidden-xs">
	<div class="col-sm-12">
		<ul class="nav nav-tabs" id="myTab">
			<li class="active"><a data-toggle="tab" href="#cities">Cities</a></li>
			<li class=""><a data-toggle="tab" href="#sellers">Sellers</a></li>
			<li class=""><a data-toggle="tab" href="#populars">Populars</a></li>
		</ul>

		<div class="tab-content " id="myTabContent">
			<div id="cities" class="tab-pane active in counties-pane">
				@foreach ($cities->chunk(8) as $chunk)
				<div class="col-sm-3">
				    <div class="row directory-block">      
				        <div class="col-sm-12">				            
				            @foreach ($chunk as $city)       
				                <a href="#">{{ str_limit($city->name,15)}}</a><br/>
				            @endforeach 
				        </div>
				    </div>
				</div>
				@endforeach
			</div>	


			<div id="sellers" class="tab-pane counties-pane fade">
				@foreach ($sellers->chunk(8) as $chunk)
				<div class="col-sm-3">
				    <div class="row directory-block">      
				        <div class="col-sm-12">				            
				            @foreach ($chunk as $seller)       
				                <a href="#">{{ str_limit($seller->name,15) }}</a><br/>
				            @endforeach 
				        </div>
				    </div>
				</div>
				@endforeach				
			</div>	
			
			<div id="populars" class="tab-pane counties-pane fade">
				@foreach ($categories_lv2->chunk(8) as $chunk)
				<div class="col-sm-3">
				    <div class="row directory-block">      
				        <div class="col-sm-12">				            
				            @foreach ($chunk as $category)       
				                <a href="#">{{ str_limit($category->name,15) }}</a><br/>
				            @endforeach 
				        </div>
				    </div>
				</div>
				@endforeach	
			</div>	
		</div>
	</div>
</div>
