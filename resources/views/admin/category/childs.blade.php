<ul>
@foreach($childs as $child)
	<li>
	    {{ $child->id }}. {{ $child->name }} 
	    <div class="pull-right">
	    
		    ({!! link_to('/categories/'.$child->id.'/edit', 'Edit') !!})
	    </div>
	    
		@if(count($child->child))
        	@include('admin.category.childs',['childs' => $child->child])
        @endif
	</li>
@endforeach
</ul>