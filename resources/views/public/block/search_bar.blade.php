<div class="jumbotron home-tron-search well ">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="home-tron-search-inner">
					<div class="row">
						{!! Form::open([ 'url' => '/q/search']) !!}
							<div class="col-sm-8 col-xs-9" style="text-align: center">
								<div class="row">
									<div class="col-sm-12 col-sm-offset-1">
										<div class="input-group">
											<span class="input-group-addon input-group-addon-text hidden-xs">Cari produk</span>
											{!! Form::text('search', null, [ 'placeholder'=> 'misal: iphone, toyota', 'class'=>'form-control col-sm-3', 'id'=>'autocomplete']) !!}
											<div class=" input-group-addon hidden-xs">
												{!! Form::select('category', $categories->pluck('name', 'id'), null, ['placeholder' => 'Pilih kategori']) !!}
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-sm-4 col-xs-3" style="text-align: center">
			                    <div class="row">
			                        <div class="col-sm-11" pull-right">
			                            {!! Form::submit('Cari',  ['class' => 'btn btn-primary search-btn']) !!}
			                        </div>
			                    </div>     								
							</div>
						{!! Form::close() !!} 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
