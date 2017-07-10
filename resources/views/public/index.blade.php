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
<br class="hidden-sm hidden-xs">
<br class="hidden-sm hidden-xs">
<br class="hidden-sm hidden-xs">

<div class="row">
<div class="col-xs-12 col-sm-4 col-md-12  col-lg-11 pull-right" >
<p class="main_slogan" style="margin: 0 0 28px 0">
ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan ini iklan </p>
</div></div>

<div class="row">
    <div class="col-xs-12 col-sm-4 col-md-12  col-lg-11 pull-right" >
        <div class="panel panel-default">
            <div class="panel-heading">Premium listings</div>
            <div class="panel-body">
                <div class="featured-gallery">
                    <div class="row">
                        @foreach ($items as $item)
                        


                        <div class="col-sm-6 col-xs-4 featured-thumbnail"  data-toggle="tooltip" data-placement="top" title="Jual {{ $item->title }} seharga {{ $item->sell_price }}">
                            <a href="/{{ $item->slug }}" class="">
                                <img alt="" src="{{ str_replace('/rawimage/','/s-400-200/', explode('|', $item->images)[0]) }}" >
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection