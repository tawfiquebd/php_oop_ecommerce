<?php include_once 'inc/header.php' ;?>
<?php include_once 'inc/slider.php' ;?>
<?php
    // echo "<pre>";
    // print_r(Session::get("custSessionId"));
    // echo "</pre>";
    // exit();
?>

        <!-- Start Category Area -->
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Featured Products</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
                        <!-- Get Featured Products-->
                        <?php 
                            $get_products = $productObj->getFeaturedProduct();
                            if($get_products){
                                while ($product = $get_products->fetch_assoc()) { ?>
                                        
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product-details.php?product_id=<?php echo $product['id'];?>">
                                            <img src="admin/<?php echo $product['image'];?>" alt="product images">
                                        </a>
                                    </div>
                                    <div class="fr__hover__info">
                                        <ul class="product__action">
                                            <li><a href="wishlist.php"><i class="icon-heart icons"></i></a></li>

                                            <li><a href="cart.php"><i class="icon-handbag icons"></i></a></li>

                                            <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="fr__product__inner">
                                        <h4><a href="product-details.php?product_id=<?php echo $product['id'];?>"><?php echo $product['product_name'];?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize">$30.3</li>
                                            <li>$ <?php echo $product['price'];?> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>  
                            <?php } } ?>                          
                            <!-- End Single Category -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Category Area -->
        <!-- Start Product Area -->
        <section class="ftr__product__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Products</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__wrap clearfix">                        
                    <!-- Start Single Category -->
                    <!-- Get New Products-->
                    <?php 
                        $get_products = $productObj->getNewProduct();
                        if($get_products){
                            while ($product = $get_products->fetch_assoc()) { ?>
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product-details.php?product_id=<?php echo $product['id'];?>">
                                        <img src="admin/<?php echo $product['image'];?>" alt="product images">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="wishlist.php"><i class="icon-heart icons"></i></a></li>

                                        <li><a href="cart.php"><i class="icon-handbag icons"></i></a></li>

                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product-details.php?product_id=<?php echo $product['id'];?>"><?php echo $product['product_name'];?></a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">$30.3</li>
                                        <li>$ <?php echo $product['price'];?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Area -->

<?php include_once 'inc/footer.php' ;?>