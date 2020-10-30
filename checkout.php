<?php include_once 'inc/header.php' ;?>

<?php
    $customerId = Session::get('customerId');
    $logger = Session::get("customerLogin");
    if($logger == false){
        echo "<script>window.location = 'login.php';</script>";
    }
?>
<?php
    if (!isset($_GET['offline_payment']) || $_GET['offline_payment'] == NULL) {
        echo "<script>window.location = 'cart.php';</script>";
    }

?>

<?php
    // Update profile process

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
        $getData = $_POST;
        $profileUpdate = $customerObj->updateCustomerInfo($getData, $customerId);
    }

?>

<?php
    // Get cart info
    $getCartData = $cartObj->getCartInfo();
    if($getCartData != true){
        echo "<script>window.location = 'cart.php';</script>";
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
                                  <span class="breadcrumb-item active">checkout</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="checkout__inner">
                            <div class="accordion-list">
                                <div class="accordion">                                    
                                    <div class="accordion__title">
                                        Product Shipping Address Information
                                    </div>
                                <!-- Get customer profile data -->
                                <?php
                                    $getCustomerInfo = $customerObj->getCustomerInfo($customerId);
                                    if($getCustomerInfo){
                                        while ($row = $getCustomerInfo->fetch_assoc()) { ?> 
                                        
                                    <div class="accordion__body">
                                        <div class="bilinfo">                                            
                                            <form action="#" method="post">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <?php if(isset($profileUpdate)){echo $profileUpdate;} ?>
                                                        <div class="single-input">
                                                            <label >Full Name</label>
                                                            <input type="text" name="name" value="<?php echo $row['name'] ;?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <label >Address </label>
                                                            <input type="text" name="address" value="<?php echo $row['address'] ;?>">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="contact-box">
                                                            <input type="hidden" name="gender" value="<?php echo $row['gender'] ;?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <label >City </label>
                                                            <input type="text" name="city" value="<?php echo $row['city'] ;?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <label >Zip </label>
                                                            <input type="text" name="zip" value="<?php echo $row['zip'] ;?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <label >Phone </label>
                                                            <input type="text" name="contact" value="<?php echo $row['contact'] ;?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <label >Country </label>
                                                            <input type="text" name="country" value="<?php echo $row['country'] ;?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <br>
                                                            <input type="submit" name="update" value="Update" class="btn btn-info">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <?php

                                        }
                                    }

                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="order-details">
                            <h5 class="order-details__title">Your Order</h5>
                            <div class="order-details__item">
                                <div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="images/cart/1.png" alt="ordered item">
                                    </div>
                                    <div class="single-item__content">
                                        <a href="#">Santa fe jacket for men</a>
                                        <span class="price">$128</span>
                                    </div>
                                    <div class="single-item__remove">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </div>
                                </div>
                                <div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="images/cart/2.png" alt="ordered item">
                                    </div>
                                    <div class="single-item__content">
                                        <a href="#">Santa fe jacket for men</a>
                                        <span class="price">$128</span>
                                    </div>
                                    <div class="single-item__remove">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="order-details__count">
                                <div class="order-details__count__single">
                                    <h5>sub total</h5>
                                    <span class="price">$909.00</span>
                                </div>
                                <div class="order-details__count__single">
                                    <h5>Tax</h5>
                                    <span class="price">$9.00</span>
                                </div>
                            </div>
                            <div class="ordre-details__total">
                                <h5>Order total</h5>
                                <span class="price">$918.00</span>
                            </div>
                            <div class="ordre-details__total">                                
                                <button class="btn btn-lg btn-block btn-success">Confirm Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->

        <!-- Start Footer Area -->

<?php include_once 'inc/footer.php' ;?>