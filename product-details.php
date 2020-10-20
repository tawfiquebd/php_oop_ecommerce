<?php include_once 'inc/header.php' ;?>

<?php
    if (!isset($_GET['product_id']) || $_GET['product_id'] == NULL) {
        echo "<script>window.location = '404.php' ;</script>";
    }
    else{
        $product_id = $_GET['product_id'];
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $quantity = $_POST['quantity'];
        $addCart = $cartObj->addToCart($quantity, $product_id);
    }

?>
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <a class="breadcrumb-item" href="product-grid.html">Products</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">ean shirt</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Details Area -->
        <section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <!-- Get single product details by id -->
                    <?php
                        $get_product = $productObj->getProductById($product_id);
                        if($get_product){
                            while ($value = $get_product->fetch_assoc()) { ?>

                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                            <img src="admin/<?php echo $value['image'];?>" alt="full-image">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                                
                            </div>
                        </div>
                             
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2><?php echo $value['product_name']; ?></h2>
                                <ul  class="pro__prize">
                                    <div class="sin__desc">
                                        <p><span>Price: </span> &nbsp; </p>
                                    </div>
                                    <li class="old__prize">  &nbsp; <s> $82.5 </s> </li>
                                    <li>$<?php echo $value['price']; ?></li>
                                </ul>
                                <div class="ht__pro__desc">
                                    <div class="sin__desc">
                                        <p><span>Availability: </span> In Stock</p>
                                    </div>
                                    <div class="sin__desc align--left">
                                        <p><span>Category: </span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href="#"><?php echo $value['category_name']; ?></a></li>
                                        </ul>
                                    </div>
                                    <div class="sin__desc align--left">
                                        <p><span>Brand: </span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href="#"><?php echo $value['brand_name']; ?></a></li>
                                        </ul>
                                    </div>
                                    <div class="sin__desc align--left">
                                        <div class="cart">
                                            <form method="POST" action="">
                                                <p><span>Quantity: </span></p>
                                                
                                                <input required="" type="number" class="form-control" value="1" min="1" name="quantity">
                                                <br>
                                            
                                                <input class="btn btn-primary" type="submit" value="Buy Now" name="buy"/>
                                                
                                            </form> <br>
                                            <?php
                                                if(isset($addCart)){
                                                    echo $addCart;
                                                }
                                            ?>
                                        </div>
                                    </div>                                        
                                </div>
                            </div>
                                    
                        </div>

                        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">    
                              <h5>Product Category</h5>
                              <hr>
                              <ul class="nav">
                                <?php
                                    $getCategory = $categoryObj->getProductCategory();
                                    if($getCategory){
                                        while($result = $getCategory->fetch_assoc()){ ?>

                                <li><a href="category-product.php?category_product=<?php echo $result['id']; ?>"><?php echo $result['category_name']; ?></a></li>

                                <?php
                                        }
                                    }
                                ?>
                              </ul>                               
                        </div>

                    </div>
                </div>
                    
            </div>
                   
            <!-- End Product Details Top -->
        </section>
        <!-- End Product Details Area -->
        <!-- Start Product Description -->
        <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Start List And Grid View -->
                        <ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                    <?php echo $value['body']; ?>
                                </div>
                            </div>
                            <!-- End Single Content -->
                            <?php } } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- End Product Description -->
        <!-- Start Product Area -->
        <section class="htc__product__area--2 pb--100 product-details-res">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__wrap clearfix">
                        <!-- Start Single Product -->
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product-details.html">
                                        <img src="images/product/1.jpg" alt="product images">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product-details.html">Product Title Here </a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">$30.3</li>
                                        <li>$25.9</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                        <!-- Start Single Product -->
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product-details.html">
                                        <img src="images/product/2.jpg" alt="product images">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product-details.html">Product Title Here </a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">$30.3</li>
                                        <li>$25.9</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                        <!-- Start Single Product -->
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product-details.html">
                                        <img src="images/product/3.jpg" alt="product images">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product-details.html">Product Title Here </a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">$30.3</li>
                                        <li>$25.9</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                        <!-- Start Single Product -->
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product-details.html">
                                        <img src="images/product/4.jpg" alt="product images">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product-details.html">Product Title Here </a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">$30.3</li>
                                        <li>$25.9</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Area -->
        <!-- End Banner Area -->

<?php include_once 'inc/footer.php' ;?>