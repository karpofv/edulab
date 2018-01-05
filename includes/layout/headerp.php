<header class="header-style-1">
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="icon fa fa-user"></i>Mi cuenta</a></li>
                        <li><a href="#"><i class="icon fa fa-heart"></i>Favoritos</a></li>
                        <li><a href="#"><i class="icon fa fa-shopping-cart"></i>Mi carrito</a></li>
                        <li><a href="#"><i class="icon fa fa-check"></i>Facturar</a></li>
                        <li><a href="login.php"><i class="icon fa fa-lock"></i>Ingresa</a></li>
                    </ul>
                </div>
                <!-- /.cnt-account -->
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo">
                        <a href="./"> <img src="<?php echo $ruta_base;?>/assets/images/ventas.jpg" alt="logo" width="200px;"> </a>
                    </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form>
                            <div class="control-group">
                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">Categorías <b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="menu-header">Computer</li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0)">- Ropa</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0)">- electrónicos</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0)">- Zapatos</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0)">- Relojes</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <input class="search-field" placeholder="Search here..." />
                                <a class="search-button" href="#"></a>
                            </div>
                        </form>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <div class="dropdown dropdown-cart">
                        <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="basket-item-count"><span class="count">2</span></div>
                                <div class="total-price-basket"> <span class="lbl"> -</span> <span class="total-price"> <span class="sign">$</span><span class="value">600.00</span> </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="cart-item product-summary">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="image">
                                                <a href="detail.html"><img src="<?php echo $ruta_base;?>/assets/images/cart.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <h3 class="name"><a href="index8a95.html?page-detail">Productos</a></h3>
                                            <div class="price">$600.00</div>
                                        </div>
                                        <div class="col-xs-1 action"> <a href="#"><i class="fa fa-trash"></i></a> </div>
                                    </div>
                                </div>
                                <!-- /.cart-item -->
                                <div class="clearfix"></div>
                                <hr>
                                <div class="clearfix cart-total">
                                    <div class="pull-right"> <span class="text">Sub Total :</span><span class='price'>$600.00</span> </div>
                                    <div class="clearfix"></div>
                                    <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Facturar</a> </div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw"> <a href="./" data-hover="dropdown">Inicio</a> </li>
                                <li class="dropdown yamm mega-menu"> <a href="javascript:void(0)" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Ropa</a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content ">
                                                <div class="row">                                                    
                                                    <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="<?php echo $ruta_base;?>/assets/images/banners/top-menu-banner.jpg" alt=""> </div>
                                                    <!-- /.yamm-content -->
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown mega-menu">
                                    <a href="javascript:void(0)" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Electronicos <span class="menu-label hot-menu hidden-xs">Ofertas</span> </a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content">
                                                <div class="row">                                                    
                                                    <!-- /.col -->
                                                    <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                                        <h2 class="title">Mobile Phones</h2>
                                                        <ul class="links">
                                                            <li><a href="#">Apple</a></li>
                                                            <li><a href="#">Samsung</a></li>
                                                            <li><a href="#">Lenovo</a></li>
                                                            <li><a href="#">Motorola</a></li>
                                                            <li><a href="#">LeEco</a></li>
                                                            <li><a href="#">Asus</a></li>
                                                            <li><a href="#">Acer</a></li>
                                                            <li><a href="#">Accesorios</a></li>
                                                            <li><a href="#">Auriculares</a></li>
                                                            <li><a href="#">Memorias</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-4 col-menu custom-banner">
                                                        <a href="#"><img alt="" src="<?php echo $ruta_base;?>/assets/images/banners/banner-side.png"></a>
                                                    </div>
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.yamm-content -->
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown hidden-sm"> <a href="javascript:void(0)">Belleza y Salud <span class="menu-label new-menu hidden-xs">nuevo</span> </a> </li>
                                <li class="dropdown hidden-sm"> <a href="javascript:void(0)">Relojes</a> </li>
                                <li class="dropdown"> <a href="javascript:void(0)">Joyería</a> </li>
                                <li class="dropdown"> <a href="javascript:void(0)">Zapatos</a> </li>
                                <li class="dropdown"> <a href="javascript:void(0)">Chicos y chicas</a> </li>
                                <li class="dropdown  navbar-right special-menu"> <a href="#">Ofertas del día</a> </li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>