@extends('public.theme.home_layout')

@section('main')
<div class="row directory">
    <div class="col-sm-12 ">
        <h2><span>Directory listings</span></h2>
    </div>
</div>


<div class="row directory">
    <div class="col-xs-12">
@foreach($categories as $category)
        <div class="directory-block col-sm-4 col-xs-6">
            <div class="row">
                <div class="col-sm-3">
                    <i class="fa fa-home"></i>
                </div>
                <div class="col-sm-9">
                    <h4>{{ $category->name }}</h4>
                    <p>
                    	@foreach ($category->child as $child)
                    		<a href="/c/{{ $child->slug }}" >{{ $child->name }}</a>@if(!$loop->last),@endif
                    	@endforeach

                    
                    </p>
                </div>
            </div>
        </div>
@endforeach
        

        <div class="directory-block col-sm-4 col-xs-6">
            <div class="row">
                <div class="col-sm-3">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="col-sm-9">
                    <h4>Shopping</h4>
                    <p><a href="listings.html" >Cars</a>, <a href="listings.html" >Car Parts</a>, <a href="listings.html" >Campervans</a>, <a href="listings.html">Motobikes</a>, <a href="listings.html" >Scooters</a>, <a href="listings.html" >Vans</a>, <a href="listings.html" >Trucks</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
