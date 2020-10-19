<?php include_once 'inc/header.php' ;?>

<?php
    // delete product from cart
    if(isset($_GET['delete_product']) ){
        $del_id = $_GET['delete_product'];
        $deleted_product = $cartObj->deleteProductFromCart($del_id);        
    }
    
?>

<?php
    // update product quantity
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cart_id = $_POST['cartId'];
        $quantity = $_POST['quantity'];
        if($quantity <= 0){
            $deleted_product = $cartObj->deleteProductFromCart($cart_id);    
        }
        else{
            $updateCart = $cartObj->updateCartData($cart_id, $quantity);
        }
    }
?>


        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">shopping cart</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php if(isset($updateCart)){echo $updateCart;}?>
                        <?php if(isset($deleted_product)){echo $deleted_product;}?>
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">SL.</th>
                                            <th class="product-thumbnail">Product Name</th>
                                            <th class="product-name">Product Image</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total Price</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <!-- Get product from cart -->
                                    <?php
                                        $getCartData = $cartObj->getCartData();
                                        if($getCartData){
                                            $i = 1;
                                            $grandTotal = 0;
                                            while ($value = $getCartData->fetch_assoc()) { ?>
                                                
                                        <tr>
                                            <td class="product-price"><span class="amount"><?php echo $i++ ;?></span></td>
                                            <td class="product-name"><a href="#"><?php echo $value['productName'] ;?></a></td>
                                            <td class="product-thumbnail"><a href="#"><img width="100" height="100" src="admin/<?php echo $value['image'] ;?>" alt="product img" /></a></td>
                                            <td class="product-price"><span class="amount">$ <?php echo $value['price'] ;?></span></td>
                                            <td class="product-quantity">
                                                <form action="cart.php" method="POST">
                                                    <input type="hidden" name="cartId" value="<?php echo $value['cartId'] ;?>" />
                                                    <input required="" type="number" name="quantity"  value="<?php echo $value['quantity'] ;?>" />
                                                    <button type="submit" name="update" class="btn btn-warning">Update</button>
                                                </form>
                                            </td>
                                            <td class="product-subtotal">$ 
                                                <?php 
                                                    $total_price = $value['quantity'] * $value['price'];
                                                    echo $total_price ;
                                                    $grandTotal += $total_price;
                                                ?>
                                                
                                            </td>
                                            <td class="product-remove"><a onclick="return confirm('Are You Sure to Delete this Product From Cart?')" href="?delete_product=<?php echo $value['cartId']?>"><i class="icon-trash icons"></i></a></td>
                                        </tr>

                                        <?php } } ?>

                                    </tbody>
                                </table>
                            </div>
                                                                     
                            <div class="row">
                                <div class="col-md-4 col-xs-4 col-xs-offset-8">
                                    <table class="table table-content table-bordered">
                                        <tbody>   
                                            <tr>
                                                <th><h5>Sub Total </h5></th>
                                                <td class="product-price"><h5 align="center">Tk. <?php echo $grandTotal; ?></h5></td>
                                            </tr>
                                            <tr>
                                                <th><h5>VAT Total </h5></th>
                                                <td class="product-price"><h5 align="center"> 5% </h5></td>
                                            </tr>
                                            <tr>
                                                <th><h5>Grand Total </h5></th>
                                                <td class="product-price">
                                                    <h5 align="center">Tk. 
                                                    <?php
                                                        $vat = 5;
                                                        $grandTotal = $grandTotal + ($grandTotal * $vat / 100);
                                                        echo $grandTotal;
                                                    ?>
                                                    </h5>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a href="#">Continue Shopping</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            <a href="#">checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <!-- End Banner Area -->


<?php include_once 'inc/footer.php' ;?>