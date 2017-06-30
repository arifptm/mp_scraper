<ul>
@foreach($childs as $child)
	<li>
	    {{ $child->name }}
		@if(count($child->child))
        	@include('category.childs',['childs' => $child->child])
        @endif
	</li>
@endforeach
</ul>