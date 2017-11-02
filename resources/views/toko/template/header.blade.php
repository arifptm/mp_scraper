            <!-- start Navbar (Header) -->
            <nav class="navbar navbar-primary navbar-fixed-top navbar-sticky-function">

                <div class="container">
                
                    <div class="flex-row flex-align-middle">
                        
                        <div class="flex-shrink flex-columns">
                        
                            <a class="navbar-logo" href="/">
                                <img src="http://static.99toko.com/99-logo.png" alt="99toko - Katalog Produk Online Shop" />
                            </a>
                            
                        </div>
                        
                        <div class="flex-columns">
                        
                            <div class="pull-right">
                            
                                <div id="navbar" class="collapse navbar-collapse navbar-arrow pull-left">
                                    <ul class="nav navbar-nav" id="responsive-menu">
                                        <li><a href="/ls/marketplace">Marketplace</a>
                                            <ul>
                                                @foreach ($marketplaces as $marketplace)
                                                    <li><a href="/itm/mk/{{ $marketplace->slug }}">{{ $marketplace->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/ls/product">Produk</a>
                                        </li>
                                        <li>
                                            <a href="/ls/seller/all">Seller</a>
                                        </li>
                                        <li>
                                            <a href="/ls/city">Area</a>
                                        </li>
                                        <li>
                                            <a href="/artikel/all">Artikel</a>
                                        </li>

                                    </ul>
                                </div><!--/.nav-collapse -->
                                
                                <div class="navbar-mini pull-left">
                                
                                    <ul class="clearfix">
                                        
                                        <li class="add-list">
                                            <a href="/pg/kontak"> Kontak kami <i class="fa fa-phone"></i></a>
                                        </li>

                                    </ul>
                                    
                                </div>
                    
                            </div>
                            
                        </div>
                        
                    </div>
                        
                </div>

                <div id="slicknav-mobile"></div>
                
            </nav>
            <!-- end Navbar (Header) -->