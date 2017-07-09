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
                <a href="/items/ct/{{ $category->id}}">
                    <div class="col-sm-3">
                        <i class="fa fa-{{ $category->icon }}"></i>
                    </div>
                    <div class="col-sm-9">
                        <h4>{{ $category->name }}</h4>
                    </div>        
                </a>
            </div>
        </div>
@endforeach
    </div>
</div>

@include('public.city.list_footer')
@endsection


@section('right')
<div class="row">
    <div class="col-xs-12 col-sm-4 col-md-12  col-lg-11 pull-right" >
        <div class="panel panel-default">
            <div class="panel-heading">Premium listings</div>
            <div class="panel-body">
                <div class="featured-gallery">
                    <div class="row">
                        <div class="col-sm-6 col-xs-4 featured-thumbnail"  data-toggle="tooltip" data-placement="top" title="Programmer jobavailiable at Uber in London">
                            <a href="details.html" class="">
                                <img alt="" src="css/images/logos/uberlogo_large_verge_medium_landscape.png" >
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection