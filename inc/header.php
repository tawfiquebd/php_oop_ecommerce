<?php
    include_once 'lib/Session.php';
    Session::init();

    include_once 'lib/Database.php';
    include_once 'helpers/Format.php';

    spl_autoload_register(function($class){
        include_once "classes/".$class.".php";
    });

    $dbObj = new Database();
    $formatObj = new Format();
    $productObj = new Product();
    $cartObj = new Cart();
    $categoryObj = new Category();
    $customerObj = new Customer();

?>


<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Asbab - eCommerce HTML5 Templatee</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="index.php"><img src="images/logo/4.png" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php">Home</a></li>
                                        <li class="drop"><a href="#">women</a>
                                            <ul class="dropdown mega_dropdown">
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="product-grid.php">Shop Pages</a>
                                                    <ul class="mega__item">
                                                        <li><a href="product-grid.php">Product Grid</a></li>
                                                        <li><a href="cart.php">cart</a></li>
                                                        <li><a href="checkout.php">checkout</a></li>
                                                        <li><a href="wishlist.php">wishlist</a></li>
                                                    </ul>
                                                </li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="product-grid.php">Variable Product</a>
                                                    <ul class="mega__item">
                                                        <li><a href="#">Category</a></li>
                                                        <li><a href="#">My Account</a></li>
                                                        <li><a href="wishlist.php">Wishlist</a></li>
                                                        <li><a href="cart.php">Shopping Cart</a></li>
                                                        <li><a href="checkout.php">Checkout</a></li>
                                                    </ul>
                                                </li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="product-grid.php">Product Types</a>
                                                    <ul class="mega__item">
                                                        <li><a href="#">Simple Product</a></li>
                                                        <li><a href="#">Variable Product</a></li>
                                                        <li><a href="#">Grouped Product</a></li>
                                                        <li><a href="#">Downloadable Product</a></li>
                                                        <li><a href="#">Simple Product</a></li>
                                                    </ul>
                                                </li>
                                                <!-- End Single Mega MEnu -->
                                            </ul>
                                        </li>
                                        <li class="drop"><a href="#">men</a>
                                            <ul class="dropdown mega_dropdown">
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="product-grid.php">Shop Pages</a>
                                                    <ul class="mega__item">
                                                        <li><a href="product-grid.php">Product Grid</a></li>
                                                        <li><a href="cart.php">cart</a></li>
                                                        <li><a href="checkout.php">checkout</a></li>
                                                        <li><a href="wishlist.php">wishlist</a></li>
                                                    </ul>
                                                </li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="product-grid.php">Variable Product</a>
                                                    <ul class="mega__item">
                                                        <li><a href="#">Category</a></li>
                                                        <li><a href="#">My Account</a></li>
                                                        <li><a href="wishlist.php">Wishlist</a></li>
                                                        <li><a href="cart.php">Shopping Cart</a></li>
                                                        <li><a href="checkout.php">Checkout</a></li>
                                                    </ul>
                                                </li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="product-grid.php">Product Types</a>
                                                    <ul class="mega__item">
                                                        <li><a href="#">Simple Product</a></li>
                                                        <li><a href="#">Variable Product</a></li>
                                                        <li><a href="#">Grouped Product</a></li>
                                                        <li><a href="#">Downloadable Product</a></li>
                                                        <li><a href="#">Simple Product</a></li>
                                                    </ul>
                                                </li>
                                                <!-- End Single Mega MEnu -->
                                            </ul>
                                        </li>
                                        <li class="drop"><a href="#">Product</a>
                                            <ul class="dropdown">
                                                <li><a href="product-grid.php">Product Grid</a></li>
                                                <li><a href="product-details.php">Product Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="drop"><a href="blog.php">blog</a>
                                            <ul class="dropdown">
                                                <li><a href="blog.php">Blog Grid</a></li>
                                                <li><a href="blog-details.php">Blog Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="drop"><a href="#">Pages</a>
                                            <ul class="dropdown">
                                                <li><a href="blog.php">Blog</a></li>
                                                <li><a href="blog-details.php">Blog Details</a></li>
                                                <li><a href="cart.php">Cart page</a></li>
                                                <li><a href="checkout.php">checkout</a></li>
                                                <li><a href="contact.php">contact</a></li>
                                                <li><a href="product-grid.php">product grid</a></li>
                                                <li><a href="product-details.php">product details</a></li>
                                                <li><a href="wishlist.php">wishlist</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.php">contact</a></li>
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="blog.php">blog</a></li>
                                            <li><a href="#">pages</a>
                                                <ul>
                                                    <li><a href="blog.php">Blog</a></li>
                                                    <li><a href="blog-details.php">Blog Details</a></li>
                                                    <li><a href="cart.php">Cart page</a></li>
                                                    <li><a href="checkout.php">checkout</a></li>
                                                    <li><a href="contact.php">contact</a></li>
                                                    <li><a href="product-grid.php">product grid</a></li>
                                                    <li><a href="product-details.php">product details</a></li>
                                                    <li><a href="wishlist.php">wishlist</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.php">contact</a></li>
                                        </ul>
                                    </nav>
                                </div>  
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <div class="header__search search search__open">
                                        <a href="#"><i class="icon-magnifier icons"></i></a>
                                    </div>

                                    <!-- User log out process -->
                                    <?php
                                        if(isset($_GET['logout_id'])){
                                            Session::destroy();
                                        }
                                    ?>
                                    
                                <?php
                                    $logChecker = Session::get("customerLogin");
                                    if($logChecker == false) { ?>

                                    <div class="header__account">
                                        <a title="Login" href="login.php"><i class="icon-login icons"></i></a>
                                    </div>

                                <?php } else{ ?> 
                                       
                                    <div class="header__account">
                                        <a title="Profile" href="profile.php"><i class="icon-user icons"></i></a>
                                    </div>

                                     <div class="header__account">   
                                        <a title="Logout" href="?logout_id=<?php echo Session::get('customerId');?>"><i class="icon-logout icons"></i></a>
                                    </div>

                                <?php } ?>
                                    

                                    <div class="htc__shopping__cart">
                                        <a class="cart__menu" href="cart.php"><i class="icon-handbag icons"></i></a>
                                        <a href="cart.php">
                                            <span class="htc__qua">
                                                <?php
                                                    $getData = $cartObj->getCartInfo();
                                                    if($getData){
                                                        $totalProduct = $getData->num_rows;
                                                        echo $totalProduct ;
                                                        // $totalQty = Session::get("getQty");
                                                        // echo $totalQty;
                                                    }
                                                    else{
                                                        echo "0";
                                                    }
                                                ?>    
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->

        <!-- End Offset Wrapper -->