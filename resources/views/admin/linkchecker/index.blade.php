@extends('admin.template.master')

@section('pagetitle')
Link Checker
@stop

@section('content')
	
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            @include('admin.linkchecker.header')
            <!-- /.box-header -->
            
            @if (isset($s404))
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Logo</th>

                            <th></th>
                        </tr>
                    </thead>        
                    <tbody>
                        @foreach($s404 as $s40)
                        <tr>    
				            <td>{{ $s40->id }}</td>
                            <td>{{ $s40->title }}</td>
                            <td></td>
                        </tr>                
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            
            <div class="box-footer">
                
            </div>

        </div>
    </div>
</div>

@stop