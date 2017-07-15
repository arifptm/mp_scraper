<div class="jumbotron home-search" style="">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">               
                <div class="main_description">Temukan barang yang sama dengan harga termurah secepat kilat !</div>
                {!! Form::open([ 'url' => '/q/search']) !!}
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2" style="text-align: center">
                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-1">
                                    <div class="input-group">
                                        <span class="input-group-addon input-group-addon-text">Find me a</span>
                                        {!! Form::text('search', null, [ 'placeholder'=> 'misal: iphone, toyota', 'class'=>'form-control col-sm-3', 'id'=>'autocomplete']) !!}
                                        <div class=" input-group-addon hidden-xs">
                                            {!! Form::select('category', $categories->pluck('name', 'id'), null, ['placeholder' => 'Pilih kategori']) !!}
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
                            {!! Form::submit('Cari',  ['class' => 'btn btn-primary search-btn']) !!}
                        </div>
                    </div>     
                {!! Form::close() !!}           
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