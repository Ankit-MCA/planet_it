<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>User Login</title>
  <!-- loader-->
  <link href="<?php echo base_url()?>/dashbord/assets/css/pace.min.css" rel="stylesheet"/>
  <script src="<?php echo base_url();?>/dashbord/assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="<?php echo base_url()?>/dashbord/planet.png" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url()?>/dashbord/assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="<?php echo base_url();?>/dashbord/assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="<?php echo base_url();?>/dashbord/assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="<?php echo base_url();?>/dashbord/assets/css/app-style.css" rel="stylesheet"/>
</head>

<body class="bg-theme bg-theme1">

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">
 	<?php 
        if($this->session->flashdata('logmsg')){?>
            <alert class="alert alert-success col-md-12 text-center categ">
                <?php echo $this->session->flashdata('logmsg')?></alert>
                    <?php   } ?>

 <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
	<div class="card card-authentication1 mx-auto my-5">
		<div class="card-body">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 			<img src="<?=base_url()?>dashbord/planet.png" height="80" width="80" alt="logo icon">
		 	</div>

		  <div class="card-title text-uppercase text-center py-3">User Sign In</div>
		    <form class="login100-form validate-form" action="<?php echo base_url('User/index') ?>" method="post">
			  <div class="form-group">
			  	<?php echo form_error('email','<div class="text-danger">','</div>'); ?>
			  <label for="exampleInputUsername" class="sr-only">Username</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="exampleInputUsername" name="email" class="form-control input-shadow" placeholder="Enter Username">
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>

			  <div class="form-group">
			  	<?php echo form_error('password','<div class="text-danger">','</div>'); ?>
			  <label for="exampleInputPassword" class="sr-only">Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" id="exampleInputPassword" name="password" class="form-control input-shadow" placeholder="Enter Password">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			 <div class="form-row">
			 <div class="form-group col-6">
			   <div class="form-group col-9 text-right">
			  <a href="">Forgot Name</a>
			 </div>
			 </div>
			 <div class="form-group col-6 text-right">
			  <a href="">Forgot Password</a>
			 </div>
			</div>
            <button type="submit" class="btn btn-light px-5"><i class=""></i>Submit</button>
            <button type="submit" class="btn btn-light px-5"><i class=""></i>Reset</button></center>
			  
			<!--  <div class="form-row mt-4">
			  <div class="form-group mb-0 col-6">
			   <button type="button" class="btn btn-light btn-block"><i class="fa fa-user"></i><a href="<?php echo base_url() ?> user/register">Register</a> </button>
			 </div>
			<!--  <div class="form-group mb-0 col-6 text-right">
			  <button type="button" class="btn btn-light btn-block"><i class="fa fa-twitter-square"></i> Twitter</button>
			 </div> -->
			<!--</div>  -->
			 
			 </form>
		   </div>
		  </div>
		  
	     </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	
	
	</div><!--wrapper-->
	 <!-- Bootstrap core JavaScript-->
  <script src="<?php echo basr_url();?>/dashbord/assets/js/jquery.min.js"></script>
  <script src="<?php echo basr_url();?>/dashbord/assets/js/popper.min.js"></script>
  <script src="<?php echo basr_url();?>/dashbord/assets/js/bootstrap.min.js"></script>
	
  <!-- sidebar-menu js -->
  <script src="<?php echo basr_url();?>/dashbord/assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="<?php echo basr_url();?>/dashbord/assets/js/app-script.js"></script>
  
</body>
</html>

	
 