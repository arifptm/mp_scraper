@extends('admin.template.master')

@section('pagetitle')
Cities
@stop

@section('content')
	
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>City</th>
                            <th>Seller Name</th>                           
                            <th></th>
                        </tr>
                    </thead>        
                    <tbody>
                        @foreach($cities as $city)
                        <tr>    
				            <td>{{ $city->id }}</td>
                            <td>{{ $city->name }}</td>
                            <td>
                            <ul>
                            @foreach($city->seller as $d)
                                <li>{{ $d->name }}</li>
                            @endforeach 
                            </ul>
                            </td>
                            <td>
                                {!! Form::open(['url' => '/admin/cities/'.$city->id, 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="/admin/cities/{{$city->id}}/edit" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
                {{ $cities->links() }}
            </div>
        </div>
    </div>
</div>

@stop