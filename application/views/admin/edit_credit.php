
<style type="text/css">
.btn-info{	 background: #5bc0de !important; }
</style>
<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">

<?php $this->view('admin/common/left-sidebar.php');?>
	</div>
		<!--left-fixed -navigation-->
<?php $this->load->view('admin/common/header'); ?>		
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
				
				
			
				
		
				<?php 	  $user = $this->session->userdata('userVal'); ?>
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
				</div>	
			</div>
				<div class="clearfix"> </div>
			</div>
			<?php $path = $this->extra_lib->path; ?>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
				<?php $ser = $credit[0];  ?> 
					<div class="row">
					<div class="form-three widget-shadow" style="height: 90px;">
					<h2 class="title1">Edit Customer  </h2>
					</div>
<div class="form-three widget-shadow">
							<form action="<?= base_url().$path.'/customers/update_credit';?>" method="post" class="form-horizontal">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Credit</label>
									<div class="col-sm-8">
										<input type="text" name="firstname" class="form-control1" value="<?= $ser->credit ?>" id="category">
										<input type="hidden" value="<?= $ser->id ?>" name="id">
									</div>

								</div>
								<?php $customer = $this->sc_model->getCustomer();?>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Customer Name</label>
									<div class="col-sm-8">

								      <select class="selectpicker form-control" name="customer_name" id="supplier_id"  data-live-search="true">
								      <option>Select Customer</option>		
									<?php foreach($customer as $cus): print_r($cus); ?>
										
									<option  value="<?= $cus->id;?>"><?= $cus->firstname." ".$cus->lastname;?></option>
									<?php endforeach; ?>
									</select>
									<input type="hidden" name="customer_address" value="<?= $cus->address?>" id="customer_address">
									</div>
								</div>									



								<div class="form-group mb-n" style="color:red">
									<label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp</label>
									<div class="col-sm-8">
										<input type="submit" class="btn btn-info form-control1 " id="largeinput" value="Update Customer">
									</div>
								</div>
							</form>
						</div>						
					</div>

				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p><?= $this->footer->getSettingFooter();?></p>
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