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
                @if (count($category->child))
                    
                    @include('public.category.childs', ['childs' => $category->child ])
                    
                @endif
 
                    <div class="col-sm-3">
                        <i class="fa fa-{{ $category->icon }}"></i>
                    </div>
                    <div class="col-sm-9">
                        <h4>{{ $category->name }}</h4>
                    </div>        
                <!-- </a> -->
            </div>
        </div>
@endforeach
    </div>
</div>

@include('public.city.list_footer')
@endsection
