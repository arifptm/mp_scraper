@extends('admin.template.master')

@section('pagetitle')
    Vocabulary <a href="/admin/vocabularies/create"><i class="fa fa-plus-circle"></i></a>
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
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Weight</th>                            
                            <th>Action</th>
                        </tr>
                    </thead>        
                    <tbody>
                        @foreach($vocabularies as $vocabulary)
                        <tr>    
                            <td>{{ $vocabulary->id }}</td>
                            <td>{{ $vocabulary->name }}</td>
                            <td>{{ $vocabulary->slug }}</td>
                            <td>{{ $vocabulary->sort }} </td>                        
                            <td>
                                {!! Form::open(['url' => '/admin/vocabularies/'.$vocabulary->id, 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="/admin/vocabularies/{{$vocabulary->id}}/edit" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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