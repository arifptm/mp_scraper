<ul>
@foreach($childs as $child)
	<li style='padding:4px 0;'>
	    {{ $child->id }}. {{ $child->name }} 
        <div class="pull-right">
            {!! Form::open(['url' => '/admin/categories/'.$sc->id, 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="/admin/categories/{{$child->id}}/edit" class=''>Edit</a> | 
                    <button type='submit' style='padding:0;margin:0' class='btn-link'  onclick="return confirm('Are you sure?')">Delete</button>
                </div>
            {!! Form::close() !!}
        </div>	    
	    
		@if(count($child->child))
        	@include('admin.category.childs',['childs' => $child->child])
        @endif
	</li>
@endforeach
</ul>