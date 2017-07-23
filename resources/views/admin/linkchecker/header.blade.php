<div class="">
	<div class="col col-md-4">
		<h2>Total Item = {{ count($all) }} </h2>
	</div>
	<div class="col-md-4">
		<h2>Belum dicek = {{ count($yet) }}</h2>
	</div>
	<div class="col-md-3 h2">
	{!! link_to('admin/linkcheck/'.'tokopedia'.'/run', 'Check now!', ['class'=> 'btn btn-primary']) !!}
	</div>
</div>	