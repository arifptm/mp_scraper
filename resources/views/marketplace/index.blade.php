@extends('template.master')

@section('pagetitle')
Marketplace {!! link_to('/marketplaces/create', '+') !!}
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
                            <th>Child</th>
                            <th></th>
                        </tr>
                    </thead>        
                    <tbody>
                        @foreach($marketplaces as $marketplace)
                        <tr>    
				            <td>{{ $marketplace->id }}</td>
                            <td>{{ $marketplace->name }}</td>
                            <td><img src="{{ $marketplace->logo_url }}" alt="" width="100" /></td>
                            <td>{{ $marketplace->feed->count() }} </td>
                            <td>
                                <div class="inline-block">
                                {!! link_to('/marketplaces/'.$marketplace->id.'/edit', 'Edit', ['class' => 'btn btn-default']) !!}
                                
                                {!! Form::open(['route' => ['marketplaces.destroy', $marketplace->id], 'method' => 'delete']) !!}
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
                {{ $marketplaces->links() }}
            </div>

        </div>
    </div>
</div>

@stop