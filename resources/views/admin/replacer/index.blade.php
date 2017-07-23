@extends('admin.template.master')

@section('pagetitle')
Replacers <a href="/admin/replacers/create"><i class="fa fa-plus"></i></a>
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
                            <th>Department</th>
                            <th>Replacer</th>                           
                            <th></th>
                        </tr>
                    </thead>        
                    <tbody>
                        @foreach($replacers as $replacer)
                        <tr>    
				            <td>{{ $replacer->id }}</td>
                            <td>{!! link_to ('/admin/replacers/'.$replacer->id, $replacer->department) !!}</td>
                            <td>{{ $replacer->replacer }}</td>
                            <td>
                                <div class="inline-block">
                                {!! link_to('/admin/replacers/'.$replacer->id.'/edit', 'Edit', ['class' => 'btn btn-default']) !!}
                                
                                {!! Form::open(['route' => ['replacers.destroy', $replacer->id], 'method' => 'delete']) !!}
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
                {{ $replacers->links() }}
            </div>
        </div>
    </div>
</div>

@stop