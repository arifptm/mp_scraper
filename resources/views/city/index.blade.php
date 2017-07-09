@extends('template.master')

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
                            <th>Name</th>
                            <th>Items</th>                           
                            <th></th>
                        </tr>
                    </thead>        
                    <tbody>
                        @foreach($cities as $city)
                        <tr>    
				            <td>{{ $city->id }}</td>
                            <td>{!! link_to ('/items/ct/'.$city->id, $city->name) !!}</td>
                            <td>
                            @foreach($city->seller as $d)
                            {{ $d->name }} <br>
                            @endforeach 
                            </td>
                            <td>
                                <div class="inline-block">
                                {!! link_to('/cities/'.$city->id.'/edit', 'Edit', ['class' => 'btn btn-default']) !!}
                                
                                {!! Form::open(['route' => ['cities.destroy', $city->id], 'method' => 'delete']) !!}
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
                {{ $cities->links() }}
            </div>
        </div>
    </div>
</div>

@stop