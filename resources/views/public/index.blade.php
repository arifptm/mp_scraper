@extends('public.theme.master_layout')

@section('meta')
    <title>{{ config('site_name') }}</title>
    <meta name="language" content="id" />
    <meta name="description" content="{{ config('site_description') }}"/>
    <meta name="keywords" content="{{ config('site_keywords') }}"/>

    <link http-equiv="x-dns-prefetch-control" content="on"/>
    <link rel="dns-prefetch" href="//{{ config('site_domain') }}"/>
        
    <meta property="og:type" content="catalog"/>
    <meta property="og:site_name" content="{{ config('site_name') }}"/>
    <meta property="og:title" content="{{ config('site_title') }}"/>
    <meta property="og:description" content="{{ config('site_description') }}"/>
    <meta property="og:url" content="//{{ config('site_domain') }}"/>
    <meta property="og:image" content="{{ config('site_image') }}"/>
@endsection


@section('main')
<div class="row directory">
    <div class="col-sm-12 ">
        <h2><span>Daftar Kategori</span></h2>
    </div>
</div>

<div class="row directory">
    <div class="col-xs-12">
        @foreach($categories as $category)
            <div class="directory-block col-sm-4 col-xs-6">
                <div class="row">
                    <a href="/itm/ca/{{ $category->slug}}">
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

@include('public.block.listing')
@endsection


@section('right')
<div class="hidden-sm hidden-xs spacer50"></div>
<div class="row">
    <div class="col-xs-12 col-sm-3 col-md-12  col-lg-11 pull-right" >
        <div class="marbot30">
            <img class="img-responsive" src="{{ config('sidebar-ads') }}" alt=""/>
        </div>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-12  col-lg-11 pull-right" >
        <div class="panel panel-default">
            <div class="panel-heading">Produk pilihan</div>
            <div class="panel-body">
                <div class="featured-gallery">
                    <div class="row">
                        @foreach ($items as $item)                       
                        <div class="col-sm-6 col-xs-4 featured-thumbnail"  data-toggle="tooltip" data-placement="top" title="Jual {{ $item->title }} seharga {{ $item->sell_price }} di {{ $item->seller->city->name }}">
                            <a href="/{{ $item->slug }}" class="">
                                <img alt="{{ $item->title }}" src="{{ $item->images['teaser'][0] }}" >
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

@section('footer_script')
<script>
    $('#autocomplete').autocomplete({
        serviceUrl: 'suggest.json'
    });
</script>
@endsection                                    