<?php include_once 'inc/header.php' ;?>

<?php $customerId = Session::get('customerId');?>

		<div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                    	<br><h2 align="center">Profile Information</h2> <br>
                            <div class="table-content table-responsive">
                            	<form action="edit-profile.php?customer_id=<?php echo Session::get('customerId');?>" method="post">
	                                <table>
                                	<?php 
                                		$profileInfo = $customerObj->getCustomerInfo($customerId);
                                		if($profileInfo){
                                			while ($value = $profileInfo->fetch_assoc()) { ?>
                                				
	                                    <tbody>
	                                    	<tr>
	                                            <th class="product-thumbnail">Name</th>
	                                            <th class="product-name"><?php echo $value['name'];?></th>
	                                        </tr>
	                                        <tr>
	                                            <th class="product-thumbnail">Gender</th>
	                                            <th class="product-name"><?php echo $value['gender'];?></th>
	                                        </tr>
	                                        <tr>
	                                            <th class="product-thumbnail">Email</th>
	                                            <th class="product-name"><?php echo $value['email'];?></th>
	                                        </tr>
	                                        <tr>
	                                            <th class="product-thumbnail">Contact</th>
	                                            <th class="product-name"><?php echo $value['contact'];?></th>
	                                        </tr>
	                                        <tr>
	                                            <th class="product-thumbnail">Address</th>
	                                            <th class="product-name"><?php echo $value['address'];?></th>
	                                        </tr>
	                                        <tr>
	                                            <th class="product-thumbnail">City</th>
	                                            <th class="product-name"><?php echo $value['city'];?></th>
	                                        </tr>
	                                        <tr>
	                                            <th class="product-thumbnail">Zip</th>
	                                            <th class="product-name"><?php echo $value['zip'];?></th>
	                                        </tr>
	                                        <tr>
	                                            <th class="product-thumbnail">Country</th>
	                                            <th class="product-name"><?php echo $value['country'];?></th>
	                                        </tr>
	                                        <?php
	                                        	}
		                                		}
		                                	?>
	                                        <tr>
	                                            <th colspan="2"><button class="fv-btn btn btn-block" type="submit">Edit Profile</button></th>
	                                        </tr>
	                                    </tbody>
	                                </table>
                                </form>
                            </div>
						</div>
					</div>
				</div>
			</div>


<?php include_once 'inc/footer.php' ;?>