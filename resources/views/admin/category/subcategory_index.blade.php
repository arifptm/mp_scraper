@extends('admin.template.master')

@section('pagetitle')
    Sub Categories - {{ $main->id }}. {{ $main->name }}
@stop

@section('content')
	
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="box">
            <div class="box-body">
                <ul>
                @foreach($subcategories as $sc)
                    <li>
                        {{ $sc->id }}. {{ $sc->name }} 
                        <div class="pull-right">
                            ({!! link_to('/admin/categories/'.$sc->id.'/edit', 'Edit') !!})
                        </div>
                        @if(count($sc->child) > 0 )
                                @include('admin.category.childs',['childs' => $sc->child])
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