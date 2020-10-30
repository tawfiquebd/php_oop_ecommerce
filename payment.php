<?php include_once 'inc/header.php' ;?>
<?php
	// Check user logged or not
    $customerId = Session::get('customerId');
    $logger = Session::get("customerLogin");
    if($logger == false){
        echo "<script>window.location = 'login.php';</script>";
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
                	<div class="col-sm-12">
                		<div class="row">
	                		<div class="col-sm-4 col-sm-offset-4">
	                			<div class="form-group">
	                				<a href="checkout.php?offline_payment=process" class="btn btn-lg btn-primary">Offline Payment</a>

	                				<a href="#" class="btn btn-lg btn-warning">Online Payment</a>
	                			</div>
	                			
	                		</div>
                		</div>
                		<br>
                		<div class="row">
	                		<div class="col-sm-4 col-sm-offset-5">
	                			<div class="form-group">
	                				<a href="cart.php" class="btn btn-lg btn-info">Previous Page</a>
                				</div>
	                		</div>
                		</div>
                	</div>
                </div>
            </div>
        </div>





<?php include_once 'inc/footer.php' ;?>