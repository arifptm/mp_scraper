@extends('template.master')

@section('pagetitle')
Items {!! link_to('/items/create', '+') !!}
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
                        
                            <th>Title</th>
                            <th>Category</th>
                            
                            <th></th>
                        </tr>
                    </thead>        
                    <tbody>

                        @foreach($items as $item)
                        <tr>    
				            <td>{{ $item->id }}</td>
                            <td>{{ $item->feed->marketplace->name }}</td>
                            
                           <td>{!! link_to('/items/'. $item->id, $item->title) !!}</td>
                            <td>
                                <div class="inline-block">
                                {!! link_to('/items/'.$item->id.'/edit', 'Edit', ['class' => 'btn btn-default']) !!}
                                {!! Form::open(['route' => ['items.destroy', $item->id], 'method' => 'delete']) !!}
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
                {{ $items->links() }}
            </div>

        </div>
    </div>
</div>

@stop