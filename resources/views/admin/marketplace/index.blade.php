@extends('admin.template.master')

@section('pagetitle')
Marketplaces <span class="pull-right"><a href="/admin/marketplaces/create" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Marketplace</a></span>
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
                            <th>Logo</th>
                            <th>Feed</th>
                            
                            <th>Action</th>
                        </tr>
                    </thead>        
                    <tbody>
                        @foreach($marketplaces as $marketplace)
                        <tr>    
				            <td>{{ $marketplace->id }}</td>
                            <td>{{ $marketplace->name }} - {{ $marketplace->slug }}</td>
                            <td><img src="{{ $marketplace->logo_url }}" alt="" width="100" /></td>
                            <td>{{ $marketplace->feed->count() }} </td>

                            
                        <td>
                            {!! Form::open(['url' => '/admin/marketplaces/'.$marketplace->id, 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="/admin/marketplaces/{{$marketplace->id}}/edit" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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