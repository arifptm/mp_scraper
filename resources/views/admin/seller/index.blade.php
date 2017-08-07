@extends('admin.template.master')

@section('pagetitle')
Sellers <small>(Auto created by Scraper)</small>
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
                            <th>Name</th>
                            <th>City</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>        
                    <tbody>
                        @foreach($sellers as $seller)
                        <tr>    
				            <td>{{ $seller->id }}</td>
                            <td>{{ $seller->name }}</td>
                            <td>{{ $seller->city->name }}</td>
                            <td><img src="{{ $seller->image_url }}" height="30" alt="" /></td>
                            <td>
                                {!! Form::open(['url' => '/admin/sellers/'.$seller->id, 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="/admin/sellers/{{$seller->id}}/edit" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
                {{ $sellers->links() }}
            </div>
        </div>
    </div>
</div>

@stop