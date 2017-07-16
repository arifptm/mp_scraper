@extends('admin.template.master')

@section('pagetitle')
Sellers {!! link_to('/sellers/create', '+') !!}
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
                            <th></th>
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
                                <div class="inline-block">
                                {!! link_to('/admin/sellers/'.$seller->id.'/edit', 'Edit', ['class' => 'btn btn-default']) !!}
                                
                                {!! Form::open(['route' => ['sellers.destroy', $seller->id], 'method' => 'delete']) !!}
                                {!! Form::button('Hapus',['type' => 'submit', 'class' => 'btn btn-default']) !!}
                                {!! Form::close() !!}
                                </div>
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