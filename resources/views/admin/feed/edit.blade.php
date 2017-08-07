@extends('admin.template.master')

@section('pagetitle')
	Edit Feed
@endsection	

@section('content')
<div class="box box-primary">
    {!! Form::model($feed, ['action'=> ['FeedController@update', $feed->id], 'method'=>'patch', 'role' => 'form']) !!}
        @include('/admin/feed/field')
    {!! Form::close() !!}
</div>
@endsection	

@section('footer_scripts')
<script src="{{ asset('/bower_components/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-red',
      increaseArea: '0%' // optional
    });
  });
</script>    
@endsection

@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('/bower_components/iCheck/skins/square/red.css') }}">
@endsection
