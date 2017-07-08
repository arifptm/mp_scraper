
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"
        <link rel="shortcut icon" href="../../assets/ico/favicon.png">

        <title>99 Toko</title>

        <link rel="stylesheet" href="../../css/bootstrap.css">
        
        <link rel="stylesheet" href="../../css/theme.css">
        
        
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="../../assets/js/html5shiv.js"></script>
        <script src="../../assets/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>



        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.html" class="navbar-brand ">
                        <h1 class="logo">99<strong>Toko</strong></h1>
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
                <p class="main_description">Temukan barang yang sama dengan harga termurah secepat kilat !</p>

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
           @yield('main')
        </div>

        <div class="col-xs-12 col-md-4 " >
            @yield('right')
        </div>
    </div>
</div>



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
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>


</body>
</html>