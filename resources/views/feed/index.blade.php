@extends('template.master')

@section('pagetitle')
Feeds {!! link_to('/feeds/create', '+') !!}
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
                            <th>Department</th>
                            <th>Processed</th>
                            <th>Enabled</th>
                            <th>Dept. Repaced with</th>
                            <th></th>
                        </tr>
                    </thead>        
                    <tbody>
                        @foreach($feeds as $feed)
                        <tr>    
				            <td>{{ $feed->id }}</td>
                            <td>{{ $feed->marketplace->name }}</td>
                            <td>{{ $feed->url }}</td>
                            <td>{{ $feed->department }}</td>
                            <td>{{ $feed->processed }}</td>
                            <td>{{ $feed->enabled }}</td>
                            <td>{{ $feed->replacer }}</td>
                            <td>
                                <div class="inline-block">
                                {!! link_to('/feeds/'.$feed->id.'/edit', 'Edit', ['class' => 'btn btn-default']) !!}
                                {!! Form::open(['route' => ['feeds.destroy', $feed->id], 'method' => 'delete']) !!}
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
                {{ $feeds->links() }}
            </div>

        </div>
    </div>
</div>

@stop