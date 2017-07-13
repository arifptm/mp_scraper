@extends('admin.template.master')

@section('pagetitle')
	Pages {!! link_to('/admin/pages/create','+') !!}
@endsection	

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
                            <th>Title</th>
                            <th>Slug</th>
                        </tr>
                    </thead>        
                    <tbody>
                        @foreach($pages as $page)
                        <tr>    
				            <td>{{ $page->id }}</td>
                            <td>{{ $page->title }}</td>
                            <td>{{ $page->slug }}</td>

                            <td>
                                <div class="inline-block">
                                {!! link_to('/admin/pages/'.$page->id.'/edit', 'Edit', ['class' => 'btn btn-default']) !!}
                                
                                {!! Form::open(['route' => ['pages.destroy', $page->id], 'method' => 'delete']) !!}
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
                {{ $pages->links() }}
            </div>
        </div>
    </div>
</div>


@endsection
