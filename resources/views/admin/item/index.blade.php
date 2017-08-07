@extends('admin.template.master')

@section('pagetitle')
Items
@stop

@section('content')
	
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                 <table class="table table-bordered" id="item-table">
                    <thead>
                       <tr>
                          <th>Id</th>
                          <th>URL</th>
                          <th>Title</th>
                          <th>Price</th> 
                          <th>Seller</th> 
                          <th>Updated</th> 
                          <th>Action</th>
                       </tr>
                    </thead>
                 </table>
        </div>
    </div>
</div>

@stop

@section('header_scripts')
<link rel="stylesheet" href="{{ asset('/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('footer_scripts')
<script src="{{ asset('/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script>
$(function() {
    $('#item-table').DataTable({
       processing: true,
       serverSide: true,
       responsive: true,
       autoWidth   : false,
       order: [ 0, "desc" ],
       ajax: '{!! route('item.data') !!}',
       columns: [
           { data: 'id', name: 'id' },
           { data: 'item_url', name: 'item_url' },
           { data: 'title', name: 'title' },
           { data: 'sell_price', name: 'sell_price', orderable: false, searchable: false },
           { data: 'seller', name: 'seller',orderable: false, searchable: false },
           { data: 'updated', name: 'updated_at' },
           { data: 'action', name: 'action', orderable: false, searchable: false }
       ]
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

</script>
@endsection