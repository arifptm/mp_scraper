
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="language" content="id" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link http-equiv="x-dns-prefetch-control" content="on"/>
    <link rel="dns-prefetch" href="//{{ config('site_domain') }}"/>

    @yield('meta')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <script src="//code.jquery.com/jquery-2.2.4.min.js"</script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js" ></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ asset('plugins/jQuery-autocomplete/jQuery-autocomplete.min.js') }}"></script>
    <script src="{{ asset('js/global.js') }}"></script>
    @yield('footer_script')
     <!-- Histats.com  START  (aync)-->
    <script type="text/javascript">var _Hasync= _Hasync|| [];
    _Hasync.push(['Histats.start', '1,3875491,4,0,0,0,00010000']);
    _Hasync.push(['Histats.fasi', '1']);
    _Hasync.push(['Histats.track_hits', '']);
    (function() {
    var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
    hs.src = ('//s10.histats.com/js15_as.js');
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
    })();</script>
    <noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?3875491&101" alt="" border="0"></a></noscript>
    <!-- Histats.com  END  -->
    Histats.com © 2005-2014 Privacy Policy - Terms Of Use - Check/do opt-out - Powered By Histats   
</body>
</html>