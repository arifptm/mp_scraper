@extends('admin.template.master')

@section('pagetitle')
    Pages <a href="/admin/pages/create"><i class="fa fa-plus-circle"></i></a>
@stop

@section('content')
	
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="box">       
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Term</th>
                            <th>Title/Slug</th>
                            <th width="50%">Body</th>

                            <th>Action</th>
                        </tr>
                    </thead>        
                    <tbody>
                        @foreach($pages as $page)
                        <tr>    
                            <td>{{ $page->id }}</td>
                            <td><img src=" {{ $page->image }}" height="60" alt=""></td>
                            <td>
                                @foreach($page->term as $key=>$term)
                                    {{ $term->name }}{{ count($page->term) > $key+1 ? ',' : '' }}
                                @endforeach

                            </td>
                            <td>{{ $page->title }}<br>{{ $page->slug }}</td>
                            <td>{!! str_limit($page->body,100) !!}</td>
                            
                            <td>
                                {!! Form::open(['url' => '/admin/pages/'.$page->id, 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="/admin/pages/{{$page->id}}/edit" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>                
                        @endforeach
                    </tbody>
                </table>
            </div>  

            <div class="box-footer">
                
            </div>
        </div>
    </div>
</div>
 
@stop