@extends('admin.template.master')

@section('pagetitle')
    Categories
@stop

@section('content')
	
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="box">
            <div class="box-body">
                <ul>
                @foreach($roots as $root)
                    <li style='padding:5px 0;'>
                        <i class="fa fa-{{ $root->icon }}"></i> --- {{ $root->name }} 

                        <div class="pull-right">
                            
                            {!! Form::open(['url' => '/admin/categories/'.$root->id, 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="/admin/categories/{{$root->id}}/edit" class=''>Edit</a> | 
                                    <button type='submit' style='padding:0;margin:0' class='btn-link'  onclick="return confirm('Are you sure?')">Delete</button>
                                </div>
                            {!! Form::close() !!}
                        </div>  
                        
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