 <?php $this->load->view('admin/common/header'); 
 $user = $this->session->userdata('userVal');     
 $path = $this->extra_lib->path; 

$gP =  $this->permissions->getPermissions();




$userPermission = $gP[2]; 


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
.btn-dangers{ background: gray; }
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
                        <a class="a1" href="#"><i class="fa fa-user red"></i>  <?php echo $user['fullname']; ?></a>
                        <a class="a1" href="<?php echo base_url().'logout';?>"><i class="fa fa-sign-out red"></i>  Logout</a>
                    </div>
                </div>
                <img class="autotalk imgScs"  src="<?php echo base_url().'auto_assets/';?>pics/autotalk.png">
            </div>
        </div>      
    </div>
<div class="clearfix"> </div>
<?php $this->view('admin/common/left-sidebar.php');?>
        <!-- main content start-->

		<!-- main content start-->

		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<?php $msg = $this->session->flashdata('msg'); ?>
					<?php $remove = $this->session->flashdata('remove'); ?>
					<div class="row">
					<div class="form-three widget-shadow" style="height: 90px;">
					<h2 class="title1">Add Vendor </h2>
					</div>

				<div class="form-three widget-shadow">
					
							<form action="<?= base_url().$path.'/suppliers/insertSupplier';?>" method="post" class="form-horizontal">
<?php if($msg){	?>
					<div class="alert alert-success">
  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>								
							     <?=  $msg; ?><strong>!</strong>
							  </div>
						<?php	
                            unset($_SESSION['msg']);			
                            } if($remove){ ?>
							<div class="alert alert-danger">
  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>									    
							     <?=  $remove; ?><strong>!</strong>
							  </div>
							  <?php                             unset($_SESSION['remove']); 
							} ?>									
												
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Name *</label>
									<div class="col-sm-8">
										<input type="text" required="" name="supplier_name" class="form-control1">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Email</label>
									<div class="col-sm-8">
										<input type="text"  name="supplier_email" class="form-control1">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Phone* </label>
									<div class="col-sm-8">
									<input class="form-control" required="" type="text" name="supplier_phone" placeholder="">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Fax * </label>
									<div class="col-sm-8">
									<input class="form-control"  type="text" name="supplier_fax" placeholder="">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Address * </label>
									<div class="col-sm-8">
									<input class="form-control" type="text" name="supplier_address" required="" placeholder="">
									</div>

								</div>										
<!-- 								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Tax </label>
									<div class="col-sm-8">
									<input class="form-control" required="" type="text" name="supplier_tax" placeholder="">
									</div>

								</div> 
								 						<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Status </label>
									<div class="col-sm-8">
									<select  name="supplier_status" class="form-control" >
									<option value="yes">Active</option>
									<option value="no">Inactive</option>
									</select>
								</div>

								</div> -->																																																										


								<div class="form-group mb-n" style="color:red">
									<label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp</label>
<?php
if($userPermission->can_add == 'yes'){ ?>
									<div class="col-sm-4">
										<input type="submit" class="btn btn-info form-control1 " id="largeinput" value="Add vendor">
									</div>
<?php }else{ ?>
									<div class="col-sm-4">
										<input type="button"  class="btn btn-info form-control1 " onclick="failedRec();" value="Add Vendor">
									</div>
<?php 
}									
?>
									<div class="col-sm-4">
										<input type="reset" onclick="if(confirm('do you really want to reset')){ return true;} else{ return false;}" class="btn btn-dangers form-control1 " id="largeinput" value="Reset">

									</div>									
								</div>
							</form>
						</div>
						<div class="form-three widget-shadow table-responsive">	
						<table class="table table-bordered" id="employee_id">
							<thead>
							<tr>
								<th>Sr.No</th>
								<th>Vendor Name</th>
								<th>Vendor Email</th>
								<th>Vendor phone</th>
								<th>Vendor Address</th>
								<th>Vendor Fax</th>
								<th>Vendor tax</th>
								<!-- <td>Status</td> -->				
								<th>Edit</th>
								<th>Delete</th>																			
							</tr>
						</thead>
						<?php $sr = 1; foreach($supplier as $sup): ?>
						<tr>		
								<td><?= $sr ?></td>
								<td><?= $sup->supplier_name;?></td>
								<td><?= $sup->supplier_email;?></td>
								<td><?= $sup->supplier_phone;?></td>
								<td><?= $sup->supplier_address;?></td>
								<td><?= $sup->supplier_fax;?></td>
								<td><?= $sup->supplier_tax;?></td>
<!-- <td><?php if($sup->supplier_status =='yes'){ ?> 
								<a title="restrict user from access this site" onclick="if(confirm('do you really want to block <?= $sup->supplier_name; ?>')){ return true;} else{ return false;}" href="<?= base_url().$path."/users/block_users/".$sup->supplier_id."/no";?>"> <button class="btn btn-danger">Block User</button></a>
							<?php } else{ ?>
								<a title="Allow user to access this site" onclick="if(confirm('do you really want to unblock <?= $sup->supplier_name; ?>')){ return true;} else{ return false;}" href="<?= base_url().$path."/users/block_users/".$sup->supplier_id."/yes";?>"> <button class="btn btn-info">Unblock User</button></a>
								<?php } ?>			 -->					

									</td>

<?php
if($userPermission->can_edit == 'yes'){ ?>
								<td><a href="<?= base_url().$path.'/suppliers/edit_supplier/'.$sup->supplier_id ?>"><button class="btn btn-info">Edit</button></a></td>
<?php } else{  ?>
<td><button onclick="failedRec()" class="btn btn-info">Edit</button></td>
<?php } ?>
<?php
if($userPermission->can_delete == 'yes'){ ?>
								<td><a onclick="if(confirm('Do you want to delete this Supplier?')){ return true; } else {return false;} " href="<?= base_url().$path."/suppliers/delete_supplier/".$sup->supplier_id;?>"><button class="btn btn-danger">Delete</button></a></td>
								<?php } else{ ?>
								<td><button onclick="failedRec()" class="btn btn-danger">Delete</button></td>																							<?php } ?>																	
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
			function failedRec(){
				alert("Sorry! you can't perform this operation");
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