@extends('admin.template.master')

@section('pagetitle')
    Sub Categories - {{ $main->id }}. {{ $main->name }} <small><a href="/admin/categories">Index</a></small>
@stop

@section('content')
	
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="box">
            <div class="box-body">
                <ul>
                @foreach($subcategories as $sc)
                    <li style='padding:4px 0;'>
                        {{ $sc->id }}. {{ $sc->name }} 
                        <div class="pull-right">
                            {!! Form::open(['url' => '/admin/categories/'.$sc->id, 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="/admin/categories/{{$sc->id}}/edit" class=''>Edit</a> |
                                    <button type='submit' style='padding:0;margin:0' class='btn-link'  onclick="return confirm('Are you sure?')">Delete</button>
                                </div>
                            {!! Form::close() !!}
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