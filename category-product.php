<?php include_once 'inc/header.php' ;?>

<?php
    if (!isset($_GET['category_product']) || $_GET['category_product'] == NULL) {
        echo "<script>window.location = '404.php' ;</script>";
    }
    else{
        $cat_id = $_GET['category_product'];
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
                                  <span class="breadcrumb-item active">Products</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">                       
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <h2 class="text-center">Latest products from Category</h2>
                        <div class="htc__product__rightidebar">
                            <!-- Start Product View -->
                            <div class="row">
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                        <!-- Start Single Product -->                                        
                                    <?php
                                        $result = $productObj->getProductByCategoryId($cat_id);
                                        if($result){
                                            while ($value = $result->fetch_assoc()) { ?>
                                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                            <div class="category">
                                                <div class="ht__cat__thumb">
                                                    <a href="product-details.php?product_id=<?php echo $value['id'];?>">
                                                        <img src="admin/<?php echo $value['image'];?>" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="fr__hover__info">
                                                    <ul class="product__action">
                                                        <li><a href="wishlist.php"><i class="icon-heart icons"></i></a></li>

                                                        <li><a href="cart.php"><i class="icon-handbag icons"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="fr__product__inner">
                                                    <h4><a href="product-details.php?product_id=<?php echo $value['id'];?>"><?php echo $value['product_name'];?></a></h4>
                                                    <ul class="fr__pro__prize">
                                                        <del><li class="old__prize">$30.3</li></del>
                                                        <li><?php echo $value['price'];?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <?php

                                            }
                                        }
                                        else{
                                            echo "<br><br><h5 class='error text-center'>No products found under this Category!</h5>";
                                        }
                                    ?>
                                    <!-- End Single Product -->
                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product View -->

                            <!-- Product Category  -->
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="category">
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
                </div>
            </div>
        </section>
        <!-- End Product Grid -->
        <!-- Start Brand Area -->
        <div class="htc__brand__area bg__cat--4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ht__brand__inner">
                            <ul class="brand__list owl-carousel clearfix">
                                <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/3.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/4.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Brand Area -->
        <!-- Start Banner Area -->
        <div class="htc__banner__area">
            <ul class="banner__list owl-carousel owl-theme clearfix">
                <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/3.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/4.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/5.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/6.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
            </ul>
        </div>
        <!-- End Banner Area -->
        <!-- End Banner Area -->

   <?php include_once 'inc/footer.php' ;?>