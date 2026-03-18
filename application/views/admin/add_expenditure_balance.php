<?php $this->load->view('admin/common/header'); 
  $path = $this->extra_lib->path; 
$copyRight = $this->footer->getSettingFooter();
 ?>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css' />

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<style type="text/css">
.btn-info{	 background: #5bc0de; }
</style>
<body class="cbp-spmenu-push">
<div class="main-content">
<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
	<!--left-fixed -navigation-->
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
			
			
		
			
			<div class="profile_details">		
				<ul>
					<li class="dropdown profile_details_drop">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							<div class="profile_img">	
								<span class="prfil-img"><img src="images/2.jpg" alt=""> </span> 
								<div class="user-name">
									<p>Admin Name</p>
									<span>Administrator</span>
								</div>
								<i class="fa fa-angle-down lnr"></i>
								<i class="fa fa-angle-up lnr"></i>
								<div class="clearfix"></div>	
							</div>	
						</a>
						<ul class="dropdown-menu drp-mnu">
							<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
							<li> <a href="#"><i class="fa fa-user"></i> My Account</a> </li>
							<li> <a href="#"><i class="fa fa-suitcase"></i> Profile</a> </li> 
							<li> <a href="#"><i class="fa fa-sign-out"></i> Logout</a> </li>
						</ul>
					</li>
				</ul>
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
					<h2 class="title1">Add Bank Account</h2>
			</div>
				<?php $msg = $this->session->flashdata('msg'); ?>
				<?php $remove = $this->session->flashdata('remove');  ?>				
			<div class="form-three widget-shadow">
				
						<form action="<?= base_url().$path.'/banking/insertExpenditure';?>" method="post" class="form-horizontal" enctype="multipart/form-data">
<?php if($msg){	?>
				<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>								
						     <?=  $msg; ?><strong>!</strong>
						  </div>
					<?php	
						} if($remove){ ?>
						<div class="alert alert-danger">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>									    
						     <?php  print_r($remove); ?><strong>!</strong>
						  </div>
						  <?php }
?>									
							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Opening Balance</label>
								<div class="col-sm-8">
									<input type="number"  name="opening_balance" value="" class="form-control1">

								</div>

							</div>

							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Expenditure Amount</label>
								<div class="col-sm-8">
									<input type="text"  name="expenditure_amount" value="" class="form-control1">

								</div>

							</div>
							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Detail Of Expenditures</label>
								<div class="col-sm-8">
									<input type="text"  name="detail_expenditure" value="" class="form-control1">

								</div>

							</div>								



							<div class="form-group mb-n" style="color:red">
								<label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp</label>
								<div class="col-sm-8">
									<input type="submit" class="btn btn-info form-control1 " id="add-btn" value="Add EXPENDITURE">
								</div>
							</div>	


							</div>									
						</form>
	
							<?php $bank = false; if($bank):  ?>
					<div class="form-three widget-shadow table-responsive">	
					<table class="table table-bordered" id="employee_id">
						<thead>
							<tr>
							<th>Sr.No</th>
							<th>Bank Name</th>
							<th>Bank Account</th>
							<th>Bank Location</th>
							<th>Bank Detail</th>					
							<th>Edit</th>
							<th>Delete</th>																		</tr>	
						</thead>
						<?php  $sr =1; foreach($bank as $b): ?>
						<tr>
							<td><?= $sr++; ?></td>					
							<td><?= $b->bank_name; ?></td>
							<td><?= $b->account_no; ?></td>
							<td><?= $b->bank_location; ?></td>
							<td><?= $b->bank_detail; ?></td>

							<td><a href="<?= base_url().$path.'/settings/edit_bank/'.$b->id; ?>"><button class="btn btn-info">Edit</button></a></td>
							<td><a onclick="if(confirm('Do you want to delete this category?')){ return true; } else {return false;} " href="<?= base_url().$path."/settings/delete_bank/".$b->id?>"><button class="btn btn-danger">Delete</button></a></td>																																
						</tr>
					<?php endforeach; ?>
					</table>

					</div>						
				<?php endif; ?>
</div>
	<!--footer-->
	<div class="footer">
	   <p> <?= $this->footer->getSettingFooter();?></p>
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


	$('#employee_id').DataTable();
})
</script>