<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>My Application</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
  <link rel="stylesheet" href="{{ asset('/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- <link rel="stylesheet" href="{{ asset('/bower_components/ionicons/css/ionicons.min.css') }}"> -->
  <link rel="stylesheet" href="{{ asset('/bower_components/AdminLTE/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/bower_components/AdminLTE/dist/css/skins/skin-green.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('/css/app.css') }} ">
  @yield('header_scripts')
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-green sidebar-mini ">

<div class="wrapper">

  <header class="main-header">
  @include('admin.template.header')
  </header>

  <aside class="main-sidebar">
  @include('admin.template.sidebar')
  </aside>

  <div class="content-wrapper">

    <section class="content-header">
      <h1>
        @yield('pagetitle')

      </h1>

    </section>


    <section class="content">
      @yield('content')
    </section>

  </div>


  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.1
    </div>
    <strong>Copyright &copy; 2018 <a href="http://goried.com">Goried Studio</a>.</strong> All rights
    reserved.
  </footer>

</div>

<script src="{{ asset('/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/bower_components/AdminLTE/dist/js/app.min.js') }}"></script>
  @yield('footer_scripts')
</body>
</html>
