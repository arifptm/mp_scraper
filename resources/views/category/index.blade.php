@extends('template.master')

@section('pagetitle')
Categories {!! link_to('/categories/create', '+') !!}
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
                            <th>Parent</th>
                        </tr>
                    </thead>        
                    <tbody>
                        @foreach($categories as $category)
                        <tr>    
				            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->parent }}</td>
                            <td>
                                <div class="inline-block">
                                {!! link_to('/categories/'.$category->id.'/edit', 'Edit', ['class' => 'btn btn-default']) !!}
                                
                                {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
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
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>

@stop