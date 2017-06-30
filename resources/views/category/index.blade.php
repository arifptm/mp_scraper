@extends('template.master')

@section('pagetitle')
Categories {!! link_to('/categories/create', '+') !!}
@stop

@section('content')
	
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <ul>
                @foreach($roots as $root)
                    <li>
                        {{ $root->name }}
                        @if(count($root->child))
                            @include('category.childs',['childs' => $root->child])
                        @endif
                    </li>    
                @endforeach
                </ul>    
            </div>   

            <div class="box-footer">
                
            </div>
        </div>
    </div>
</div>

@stop