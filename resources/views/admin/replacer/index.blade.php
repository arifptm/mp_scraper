@extends('admin.template.master')

@section('pagetitle')
Replacers <a href="/admin/replacers/create"><i class="fa fa-plus"></i></a>
@stop

@section('content')
	
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                 <table class="table table-bordered" id="replacer-table">
                    <thead>
                       <tr>
                          <th>Id</th>
                          <th>Department</th>
                          <th>Replacer</th> 
                          <th></th>
                       </tr>
                    </thead>
                 </table>
            </div>     
        </div>
    </div>
</div>

@stop


@section('header_scripts')
<link rel="stylesheet" href="{{ asset('/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css') }}">

@endsection

@section('footer_scripts')
<script src="{{ asset('/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script>
$(function() {
    $('#replacer-table').DataTable({
       processing: true,
       serverSide: true,
       responsive: true,
       autoWidth   : false,
       order: [ 0, "desc" ],
       ajax: '{!! route('replacer.data') !!}',
       columns: [
           { data: 'id', name: 'id' },
           { data: 'department', name: 'department' },
           { data: 'replacer', name: 'replacer' }, 
           { data: 'action', name: 'action', orderable: false, searchable: false }
       ]
    });
});

</script>
@endsection