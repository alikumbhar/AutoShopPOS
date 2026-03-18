<?php $this->load->view('admin/common/header'); 
$path = $this->extra_lib->path;
?>

<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css' />

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style type="text/css">
.btn-info{   background: #5bc0de; }
</style>
<body class="cbp-spmenu-push">
    <div class="main-content">
    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">

<?php //$this->view('admin/common/left-sidebar.php');?>
    </div>
        <!--left-fixed -navigation-->
        

		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<div class="profile_details_left"><!--notifications of menu start -->
			<?php $this->load->view('admin/common/notification')?>
					<div class="clearfix"> </div>
				</div>
				<!--notification menu end -->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				
				
			
				
				<?php $user = $this->session->userdata('userVal'); ?>
          <div class="profile_details">     
                    <ul>
                        <li class="dropdown profile_details_drop">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <div class="profile_img">   
                                    <span class="prfil-img"><img src="images/2.jpg" alt=""> </span> 
                                    <div class="user-name">
                                        <p><?= $user['fullname']; ?></p>
                                        <span><?= $user['role_name']; ?></span>
                                    </div>
                                    <i class="fa fa-angle-down lnr"></i>
                                    <i class="fa fa-angle-up lnr"></i>
                                    <div class="clearfix"></div>    
                                </div>  
                            </a>
                            <ul class="dropdown-menu drp-mnu">
                                <li> <a href="<?php echo base_url().'/admin/settings';?>"><i class="fa fa-cog"></i> Settings</a> </li> 
                                <li> <a href="<?= base_url().'admin/users'; ?>"><i class="fa fa-suitcase"></i> Profile</a> </li> 
                                <li> <a href="<?php echo base_url().'Logout';?>"><i class="fa fa-sign-out"></i> Logout</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>      <div class="clearfix"> </div>               
            </div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">

					<div class="row">
						<div class="form-three widget-shadow" style="height: 90px;">
						<h2 class="title1">Change Password</h2>
				</div>
					<?php $msg = $this->session->flashdata('msg'); ?>
					<?php $remove = $this->session->flashdata('remove'); ?>				
				<div class="form-three widget-shadow">
					
							<form action="<?= base_url().$path.'/users/update_users_pass';?>" method="post" class="form-horizontal">
<?php if($msg){	?>
					<div class="alert alert-success">
  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>								
							     <?=  $msg; ?><strong>!</strong>
							  </div>
						<?php	
							} if($remove){ ?>
							<div class="alert alert-danger">
  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>									    
							     <?=  $remove; ?><strong>!</strong>
							  </div>
							  <?php } ?>									
												
								<div class="form-group">
									<input type="hidden" name="id" value="<?= $user['id']; ?>" placeholder="">
									<label for="focusedinput" class="col-sm-2 control-label"> Password </label>
									<div class="col-sm-8">
									<input class="form-control" id="password" required="" type="password" name="user_password" placeholder="">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Confirm password </label>
									<div class="col-sm-8">
									<input class="form-control" required="" type="password" id="confirm_password"  placeholder="">
									</div>

								</div>
								<?php $rQ = $this->sc_model->getRole()?>
																		


																																																										


								<div class="form-group mb-n" style="color:red">
									<label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp</label>
									<div class="col-sm-8">
										<input type="submit" class="btn btn-info form-control1 " id="add-btn" value="Update Password">
									</div>
								</div>
							</form>
						</div>

		
					</div>

				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer" style="margin-left: 116px;">
		   <p>	&copy; 2019 - Techobites - All Rights Reserved Techobites.com
			</p>
	   </div>
        <!--//footer-->
	</div>
	
	
		<script src='<?php echo base_url()."assets/admin/js/"?>SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="<?php echo base_url()."assets/admin/js/"?>classie.js"></script>
		<script>

			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
	
	<!-- Bootstrap Core JavaScript -->
   <script src="<?php echo base_url()."assets/admin/js/"?>bootstrap.js"> </script>
   
</body>
</html>
<script type="text/javascript">

	$(document).ready(function(){
$('#cbp-spmenu-s1').addClass('cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left cbp-spmenu-open')
	$('body').addClass('cbp-spmenu-push cbp-spmenu-push-toright')


		$('#employee_id').DataTable();
	})
</script>

  <script>

var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
        

        </script>		  