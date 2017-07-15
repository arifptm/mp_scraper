
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">     -->

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('bootclas/theme.css') }}">
    @yield('head_script')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    @include('public.theme.navbar')

    @if (Route::currentRouteName() == 'frontpage')
        @include('public.block.search_home')
    @else    
        @include('public.block.search_bar')
    @endif
   

    <div class="container">    
        <div class="row">    
            @hasSection('right')
                <div class="col-sm-12 col-md-8">
                    @yield('main')
                </div>    

                <div class="col-xs-12 col-md-4 " >
                    @yield('right')
                </div>
            @else
                 <div class="col-sm-12">
                    @yield('main')
                </div>
            @endif
        </div>
    </div>                        
    
    @include('public.theme.footer')

    <script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('bootclas/bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/jQuery-autocomplete/jQuery-autocomplete.min.js') }}"></script>
    <script src="{{ asset('js/global.js') }}"></script>

    @yield('footer_script')
</body>
</html>