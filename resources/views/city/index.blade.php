@extends('theme.master')

@section('pagetitle')
Products {!! link_to('/products/create', '+') !!}
@stop

@section('content')
	

	
<div class="row">


	<div class="col-xs-12">
          <div class="box">

            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>URL</th>
                  <th></th>

@foreach($products as $product)

                </tr>
				        <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->url }}</td>
                <td>
                {!! link_to('/products/'.$product->id.'/edit', 'Edit') !!}

                </td>
                <td>
                {!! Form::open(['url' => '/line-items']) !!}

                {!! Form::hidden('product_id', $product->id ) !!}
                {!! Form::hidden('user_id', Auth::user()->id ) !!}
                {!! Form::submit('Order')  !!}

                {!! Form::close() !!}

                </td>
                <tr>
                
@endforeach
                </tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

</div>


@stop