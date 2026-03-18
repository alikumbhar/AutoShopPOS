<?php $this->load->view('admin/common/header'); ?>

<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css' />

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style type="text/css">
.btn-info{	 background: #5bc0de; }
.btn-danger1{
	background: gray;
	color: white;
}
</style>
<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">

<?php $this->view('admin/common/left-sidebar.php');?>
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
			<?php $path = $this->extra_lib->path; ?>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		<!-- main content start-->

		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<?php $msg = $this->session->flashdata('msg'); ?>
					<?php $remove = $this->session->flashdata('remove'); ?>
					<div class="row">
					<div class="form-three widget-shadow" style="height: 90px;">
					<h2 class="title1">Manage Customer </h2>
					</div>
					<div class="form-three widget-shadow table-responsive">	
						<table class="table table-bordered" id="employee_id">
							<thead>
							<tr>
								<th>Sr.No</th>
								<th> Name</th>
								<th> Last Name</th>						
								<th> Email</th>
								<th> phone</th>
								<th> Address</th>
								<th> postal</th>
<!-- 								<th> Country</th> -->
								<!-- <td>Status</td> -->				
								<th>Action</th>
								<th>Delete</th>																			
							</tr>
						</thead>
						<?php $sr = 1; foreach($customer as $cus): ?>
						<tr>		
								<td><?= $sr ?></td>
								<td><?= $cus->firstname;?></td>
								<td><?= $cus->lastname;?></td>
								<td><?= $cus->email;?></td>
								<td><?= $cus->mobile;?></td>
								<td><?= $cus->address;?></td>
								<td><?= $cus->postal_code;?></td>
								<!-- <td><?= $cus->country;?></td> -->								
<!-- <td><?php if($cus->supplier_status =='yes'){ ?> 
								<a title="restrict user from access this site" onclick="if(confirm('do you really want to block <?= $cus->supplier_name; ?>')){ return true;} else{ return false;}" href="<?= base_url().$path."/users/block_users/".$cus->supplier_id."/no";?>"> <button class="btn btn-danger">Block User</button></a>
							<?php } else{ ?>
								<a title="Allow user to access this site" onclick="if(confirm('do you really want to unblock <?= $cus->supplier_name; ?>')){ return true;} else{ return false;}" href="<?= base_url().$path."/users/block_users/".$cus->supplier_id."/yes";?>"> <button class="btn btn-info">Unblock User</button></a>
								<?php } ?>			 -->					

									</td>

								<td><a href="<?= base_url().$path.'/Customers/edit_customer/'.$cus->id ?>"><button class="btn btn-info">Edit</button></a></td>
								<td><a onclick="if(confirm('Do you want to delete this customer?')){ return true; } else {return false;} " href="<?= base_url().$path."/Customers/delete_customer/".$cus->id;?>"><button class="btn btn-danger">Delete</button></a></td>																																
							</tr>
						<?php endforeach; ?>
						</table>

						</div>						
					<?php //endif; ?>						
					
					</div>

				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer" style="margin-left: 116px;">
		   <p>	<?= $this->footer->getSettingFooter();?>
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
$(document).ready(function(){
	$('#state').change(function(){
	var v = $('#state').val();
		if(v =="1"){
		$('#sol').hide();
		$('#liq').show();
	$('#liq').html(
			'<div class="form-group"><label for="focusedinput" class="col-sm-2 control-label">Enter Ml</label><div class="col-sm-8"><input type="text" name="Specification" class="form-control1" ></div></div> '
		)
	}
	else if(v =="2"){
	$('#liq').hide();
	$('#sol').show();
	$('#sol').html(
			'<div class="form-group"><label for="focusedinput" class="col-sm-2 control-label">Enter Specification</label><div class="col-sm-8"><input type="text" name="Specification" class="form-control1" ></div></div> '
		)	
	}
	else if(v =="3"){
	$('#liq').hide();
	$('#sol').hide();
	
	}	
	})
})			
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
   

<script type="text/javascript">
	$(document).ready(function(){
		$('#employee_id').DataTable();
	})
</script>

</body>
</html>