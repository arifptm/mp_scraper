@extends('admin.template.master')

@section('pagetitle')
Items
@stop

@section('content')
	
<div class="row">
    <div class="col-xs-12">
        <div class="box">

          <div class="box-header">        
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <form method="POST" id="search-form" class="form-inline" role="form">


    
                              <label for='title'>Title</label>  
                              <input type='text' name='title' id='title' class='form-control'><span style="margin-right:20px;"> Title</span></label>            
                              <input type='text' name='processed' id='processed' class='form-control'><span style="margin-right:20px;"> Processed</span></label>            
                          
  
                       
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
          </div>

            <div class="box-body">
                 <table class="table table-bordered" id="item-table">
                    <thead>
                       <tr>
                          <th>Id</th>
                          <th>URL</th>
                          <th>Title</th>
                          <th>Price</th> 
                          <th>Seller</th> 
                          <th>Pr/Pu/Ch/SO</th> 
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
<link rel="stylesheet" href="{{ asset('/bower_components/iCheck/skins/square/red.css') }}">
@endsection

@section('footer_scripts')
<script src="{{ asset('/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('/bower_components/iCheck/icheck.min.js') }}"></script>
<script>

    $('input').iCheck({
      checkboxClass: 'icheckbox_square-red',
      increaseArea: '0%' // optional
    });

    var oTable = $('#item-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth   : false,
        order: [ 0, "desc" ],
        ajax: {
          url : '{!! route('item.data') !!}',
          data: function (d) {
                d.checked = $('input[name=checked]').val();
                d.processed = $('input[name=processed]').val();
                d.sold_out = $('input[name=sold_out]').val();
                d.published = $('input[name=published]').val();
                d.title = $('input[name=title]').val();
            }
        },

       columns: [
           { data: 'id', name: 'id' },
           { data: 'item_url', name: 'item_url' },
           { data: 'title', name: 'title' },
           { data: 'sell_price', name: 'sell_price', orderable: false, searchable: false },
           { data: 'seller', name: 'seller',orderable: false, searchable: false },
           { data: 'state', name: 'state' },
           { data: 'updated', name: 'updated_at' },
           { data: 'action', name: 'action', orderable: false, searchable: false }
       ]
    });

    $('#search-form').on('submit', function(e) {        
        oTable.draw();
        e.preventDefault();
    });


  
</script>   

 
@endsection