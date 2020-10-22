<?php include_once 'inc/header.php' ;?>

        <!-- Check if user logged in or not -->
        <?php
            $logger = Session::get("customerLogin");
            if($logger == true){
                echo "<script>window.location = 'order.php' ;</script>";
            }
        ?>



        <!-- Start Contact Area -->
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                <!-- Customer login process -->

                <?php
                    if (isset($_POST['login']) ) {
                        $custLogin = $customerObj->customerLogin($_POST);

                        // echo "<pre>";
                        // echo print_r($custLogin);
                        // echo "</pre>";
                    }
                ?>
					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
                                    <?php if(isset($custLogin)){echo $custLogin;} ?>  
                                    <br>
									<h2 class="title__line--6">Login</h2>
								</div> 
							</div>
							<div class="col-xs-12">
								<form id="contact-form" action="login.php" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="email" name="email" placeholder="Your Email*" style="width:100%">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="password" placeholder="Your Password*" style="width:100%">
										</div>
									</div>
									
									<div class="contact-btn">
                                        <input type="submit" value="Login" name="login" class="fv-btn" />
									</div>
								</form>
							</div>
						</div> 
                
				</div>


				<!-- Customer registration process -->

                <?php
                    if (isset($_POST['register'])) {
                        $customerReg = $customerObj->customerRegistration($_POST);
                    }
                ?>

					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
                                <?php if(isset($customerReg)){echo $customerReg;} ?>
                                <br>
								<div class="contact-title">
									<h2 class="title__line--6">New Register</h2>
								</div>
							</div>

							<div class="col-xs-12">
								<form id="contact-form" action="#" method="post">
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="text" name="name" placeholder="Your Name*" style="width:100%">
                                        </div>
                                    </div>

                                    <br>
                                    <div class="form-group">
                                        <div class="contact-box">
                                            <select class="form-control" required="" name="gender" style="width:100%">
                                                <option class="form-control" value="">-- Select Gender --</option>
                                                <option class="form-control" value="Male">Male</option>
                                                <option class="form-control" value="Female">Female</option>
                                                <option class="form-control" value="Other">Other</option>
                                            </select> 
                                        </div>
                                    </div>

									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="email" name="email" placeholder="Your Email*" style="width:100%">
										</div>
									</div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="password" name="password" placeholder="Your Password*" style="width:100%">
                                        </div>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="text" name="contact" placeholder="Your Mobile*" style="width:100%">
                                        </div>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="text" name="address" placeholder="Your Address*" style="width:100%">
                                        </div>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="text" name="city" placeholder="Your City*" style="width:100%">
                                        </div>
                                    </div><div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="text" name="zip" placeholder="Zip Code*" style="width:100%">
                                        </div>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="text" name="country" placeholder="Your Country*" style="width:100%">
                                        </div>
                                    </div>
									
									
									<div class="contact-btn">
										<button type="submit" name="register" class="fv-btn">Register</button>
									</div>
								</form>
								<div class="form-output">
									<p class="form-messege"></p>
								</div>
							</div>
						</div> 
                
				</div>
					
            </div>
        </section>
        <!-- End Contact Area -->
        <!-- End Banner Area -->
        <!-- Start Footer Area -->
       
<?php include_once 'inc/footer.php' ;?>