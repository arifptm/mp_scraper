
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title Of Site -->
    @yield('meta')

    <link rel="shortcut icon" href="/themes/toko/images/favicon.ico">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/appp.css') }}" rel="stylesheet">    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('header-scripts')
</head>


<body class="transparent-header">
    <div id="introLoader" class="introLoading">        
    </div>    

    <div class="container-wrapper">
        <header id="header">
            @include('toko.template.header')
        </header>

        <div class="clear"></div>
        
        <div class="main-wrapper scrollspy-container">            
            @yield('content-top')
            <section class="pv-60">
                <div class="container">
                    <div class="row gap-40">
                        <div class="col-xs-12 col-sm-8 col-md-9">
                            @yield('content-main')
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3 mt-30-xs">
                            @yield('content-side')
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="scrollspy-footer">        
            @include('toko.template.footer')            
        </div>           
    </div> 

    <div id="back-to-top">
       <a href="#"><i class="fa fa-angle-up"></i></a>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('/js/appp.js') }}"></script>
    @yield('footer-scripts')
</body>

</html>