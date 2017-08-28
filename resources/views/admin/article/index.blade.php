@extends('admin.template.master')

@section('pagetitle')
    Articles <a href="/admin/articles/create"><i class="fa fa-plus-circle"></i></a>
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
                            <th>Title</th>
                            <th>Body</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>        
                    <tbody>
                        @foreach($articles as $article)
                        <tr>    
                            <td>{{ $article->id }}</td>
                            <td><img src=" {{ $article->image }}" height="60" alt=""></td>
                            <td>
                                @foreach($article->term as $key=>$term)
                                    {{ $term->name }}{{ count($article->term) > $key+1 ? ',' : '' }}
                                @endforeach

                            </td>
                            <td>{{ $article->title }}</td>
                            <td>{!! str_limit($article->body,100) !!}</td>
                            <td>{{ $article->status }}</td>
                            <td>
                                {!! Form::open(['url' => '/admin/articles/'.$article->id, 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="/admin/articles/{{$article->id}}/edit" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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