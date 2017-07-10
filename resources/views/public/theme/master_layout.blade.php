
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('bootclas/bootstrap.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}"> -->

    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    @yield('head_script')



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="../../assets/js/html5shiv.js"></script>
        <script src="../../assets/js/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    @include('public.theme.navbar')

    @if(\Request::is('/'))  
        @include('public.theme.home_layout')
    @elseif(\Request::is('/ct'))    
        @include('public.theme.home_layout')
    @else
        @include('public.theme.node_layout')        
    @endif
    
    @include('public.theme.footer')

    <script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('bootclas/bootstrap.js') }}"></script>
    <script src="{{ asset('js/global.js') }}"></script>

    @yield('footer_script')
</body>
</html>