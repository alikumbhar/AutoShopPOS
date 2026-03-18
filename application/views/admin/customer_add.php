<?php $this->load->view('admin/common/header'); 
$path = $this->extra_lib->path;
$user = $this->session->userdata('userVal'); 
$gP =  $this->permissions->getPermissions();
$userPermission = $gP[12]; 

if($userPermission->can_view == 'yes'){
}else{
    redirect('admin/dashboard');
}

?>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css' />
 <link rel="stylesheet" href="<?php echo base_url().'assets/css/new_style.css'; ?>">

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
    <div class="main-content maindiv">
    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1" >


    </div>
        <!--left-fixed -navigation-->
        

    <div class="container-fluid maindiv2">
        <div class="row">
            <div class="col-md-3">
                <img class="logo" src="<?php echo base_url().'auto_assets/';?>pics/logo.png">
            </div>
            <div class="col-md-5"></div>
            <div class="col-md-4">
                <div class="row ">
                    <div class="col-md-4"></div>
                    <div class="col-md-8 anchor">
                        <a class="a1" href="#"><i class="fa fa-user red"></i>  <?php echo $user['fullname'];?></a>
                        <a class="a1" href="<?php echo base_url().'logout'; ?>"><i class="fa fa-sign-out red"></i>  Logout</a>
                    </div>
                </div>
                <img class="autotalk imgScs"  src="<?php echo base_url().'auto_assets/';?>pics/autotalk.png">
            </div>
        </div>      
 <div class="clearfix"> </div>
    </div>


<?php $this->view('admin/common/left-sidebar.php');?>
        <!-- main content start-->

		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<?php $msg = $this->session->flashdata('msg'); ?>
					<?php $remove = $this->session->flashdata('remove'); ?>
					<div class="row">
					<div class="form-three widget-shadow" style="height: 90px;">
					<h2 class="title1">Add Customer </h2>
					</div>

				<div class="form-three widget-shadow">
					
							<form action="<?php echo base_url().$path.'/Customers/insertCustomer';?>" method="post" class="form-horizontal">
<?php if($msg){	?>
					<div class="alert alert-success">
  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>								
							     <?=  $msg; ?><strong>!</strong>
							  </div>
						<?php	
							unset($_SESSION['msg']); 
						} 
							if($remove){ ?>
							<div class="alert alert-danger">
  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>									    
							     <?=  $remove; ?><strong>!</strong>
							  </div>
							  <?php unset( $_SESSION['remove'] ); } ?>									
												
								<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">First Name *</label>
								<div class="col-sm-8">
									<input type="text" required="" name="firstname" class="form-control1">
								</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Last Name *</label>
									<div class="col-sm-8">
										<input type="text" required="" name="lastname" class="form-control1">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Email </label>
									<div class="col-sm-8">
									<input class="form-control" required="" type="text" name="email" placeholder="">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Mobile * </label>
									<div class="col-sm-8">
									<input class="form-control" required="" type="text" name="mobile" placeholder="">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Address * </label>
									<div class="col-sm-8">
									<input class="form-control" type="text" name="address" required="" placeholder="">
									</div>

								</div>										
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> postal code </label>
									<div class="col-sm-8">
									<input class="form-control" type="text" name="postal_code" placeholder="">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Country </label>
									<div class="col-sm-8">
									<input class="form-control"  type="text" name="country" placeholder="">
									</div>

								</div>								
<!-- 								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Status </label>
									<div class="col-sm-8">
									<select  name="status" class="form-control" >
									<option value="yes">Active</option>
									<option value="no">Inactive</option>
									</select>
								</div>

								</div> -->																																																										


								<div class="form-group mb-n" style="color:red">
									<label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp</label>
<?php if($userPermission->can_view == 'yes'){ ?>									
									<div class="col-sm-4">
										<input type="submit" class="btn btn-info form-control1 " id="largeinput" value="Add Customer">
									</div>
								<?php } else { ?>
									<div class="col-sm-4">
										<span onclick="failedRec()" class="btn btn-info form-control1 "  >Add Customer</span>
									</div>
								<?php } ?>
									<div class="col-sm-4">
										<input type="reset" onclick="if(confirm('do you really want to reset')){ return true;} else{ return false;}" class="btn btn-danger1 form-control1 " id="largeinput" value="Reset">

									</div>									
								</div>
							</form>
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
<?php if($userPermission->can_edit =='yes'){ ?>
								<td><a href="<?= base_url().$path.'/Customers/edit_customer/'.$cus->id ?>"><button class="btn btn-info">Edit</button></a></td>
							<?php } else {?>
<td><button onclick="failedRec()" class="btn btn-info">Edit</button></td>
							<?php }
							if($cus->id == 1){ ?>
								<td><button onclick="failedRec()" class="btn btn-danger">Delete</button></td>					

						<?php
							}else{ 
							if($userPermission->can_delete =='yes'){ ?>
								<td><a onclick="if(confirm('Do you want to delete this customer?')){ return true; } else {return false;} " href="<?= base_url().$path."/Customers/delete_customer/".$cus->id;?>"><button class="btn btn-danger">Delete</button></a></td>											<?php } else { ?>
								<td><button onclick="failedRec()" class="btn btn-danger">Delete</button></td>
								<?php } } ?>																					
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
		   <p><?= $this->footer->getSettingFooter(); ?>
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
			function failedRec(){
				alert("Sorry! you can't perform this operation")
			}
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