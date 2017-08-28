@extends('admin.template.master')

@section('pagetitle')
	Edit Article
@endsection	
 
@section('content')
<div class="box box-primary">
    {!! Form::model($article, ['action'=> ['ArticleController@update', $article->id], 'method'=>'patch', 'role' => 'form']) !!}
        @include('/admin/article/field')
    {!! Form::close() !!}
</div>
@endsection	

@section('footer_scripts')
	<script src="{{ asset('/bower_components/ckeditor/ckeditor.js') }}"></script>
	    <script>
        	CKEDITOR.replace('body');
    	</script>
@endsection