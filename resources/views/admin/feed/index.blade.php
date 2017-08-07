@extends('admin.template.master')

@section('pagetitle')
Feeds <span class="pull-right"><a href="/admin/feeds/create" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah feeds</a></span>
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
                            <th>Marketplace</th>
                            <th>URL</th>
                            <th>Processed</th>                            
                            <th>Enabled</th>                            
                            <th></th>
                        </tr>
                    </thead>        
                    <tbody>
                        @foreach($feeds as $feed)
                        <tr>    
				            <td>{{ $feed->id }}</td>
                            <td>{{ $feed->marketplace->name }}</td>
                            <td>{{ $feed->url }}</td>                           
                            <td>{!! $feed->processed == 1 ? '<div class="label label-primary">YES</div>' : '<div class="label label-warning">NO</div>' !!}</td>
                            <td>{!! $feed->enabled == 1 ? '<div class="label label-primary">YES</div>' : '<div class="label label-warning">NO</div>' !!}</td>
                            <td>
                                {!! Form::open(['url' => '/admin/feeds/'.$feed->id, 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="/admin/feeds/{{$feed->id}}/edit" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
                {{ $feeds->links() }}
            </div>

        </div>
    </div>
</div>

@stop