
@foreach($childs as $child)	
		 
		@if (count(App\Item::whereCategory_id($child->id)->get()) != null )
		 	 
		 	 {{ App\Item::whereCategory_id($child->id) }}
		
		@endif
		 

		@if(count($child->child) != 0)

        	@include('public.category.childs',['childs' => $child->child])

        @endif
@endforeach
