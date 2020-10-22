<?php include_once 'inc/header.php' ;?>

<?php

    $loggerCheck = Session::get("customerLogin");
    $customerId = Session::get("customerId");
    if($loggerCheck == false){
        echo "<script>window.location = 'profile.php';</script>";
    }

    if(!isset($_GET['customer_id']) || $_GET['customer_id'] == NULL || $_GET['customer_id'] != $customerId ) {
        echo "<script>window.location = 'profile.php';</script>";
    }
    else{
        $customerId = $_GET['customer_id'];
    }
    
?>

<?php
    // Update profile process
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
        $getData = $_POST;
        $profileUpdate = $customerObj->updateCustomerInfo($getData, $customerId);
    }

?>

        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <br><h2 align="center">Update Profile Information</h2> <br>
                        <?php if(isset($profileUpdate)){ echo $profileUpdate; }?>

                        <!-- Get profile information -->

                        <?php 
                            $profileInfo = $customerObj->getCustomerInfo($customerId);
                            if($profileInfo){
                                while ($value = $profileInfo->fetch_assoc()) { ?>
                                              
                        <div class="accordion__body">
                            <div class="bilinfo">
                                <form action="#" method="post">
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="name" name="name" value="<?php echo $value['name'];?>" style="width:100%">
                                        </div>
                                    </div> <br>

                                    <div class="form-group">
                                        <div class="contact-box">
                                            <select class="form-control" required="" name="gender" style="width:100%">
                                                <option class="form-control" value="">-- Select Gender --</option>
                                                
                                                <?php 
                                                    if($value['gender'] == 'Male'){ ?>
                                                     <option selected="selected" class="form-control" value="Male">Male</option>
                                                    <option class="form-control" value="Female">Female</option>
                                                    <option class="form-control" value="Other">Other</option>
                                                <?php } ?>
                                                <?php 
                                                    if($value['gender'] == 'Female'){ ?>
                                                     <option selected="selected" class="form-control" value="Female">Female</option>
                                                     <option class="form-control" value="Male">Male</option> 
                                                     <option class="form-control" value="Other">Other</option> 
                                                <?php } ?>
                                                <?php 
                                                    if($value['gender'] == 'Other'){ ?>
                                                     <option selected="selected" class="form-control" value="Other">Other</option>   
                                                     <option class="form-control" value="Male">Male</option>
                                                     <option class="form-control" value="Female">Female</option>
                                                <?php } ?>
                                                
                                            </select> 
                                        </div>
                                    </div>

                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input readonly="" type="email" name="email" value="<?php echo $value['email']; ?>" style="width:100%">
                                        </div>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input readonly="" type="password" name="password" value="<?php echo $value['password']; ?>" style="width:100%">
                                        </div>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="text" name="contact" value="<?php echo $value['contact']; ?>" style="width:100%">
                                        </div>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="text" name="address" value="<?php echo $value['address']; ?>" style="width:100%">
                                        </div>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="text" name="city" value="<?php echo $value['city']; ?>" style="width:100%">
                                        </div>
                                    </div><div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="text" name="zip" value="<?php echo $value['zip']; ?>" style="width:100%">
                                        </div>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="text" name="country" value="<?php echo $value['country']; ?>" style="width:100%">
                                        </div>
                                    </div>
                                    <?php } } ?>
                                    
                                    <div class="contact-btn">
                                        <button type="submit" name="update" class="fv-btn btn btn-block">Update Profile</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php include_once 'inc/footer.php' ;?>