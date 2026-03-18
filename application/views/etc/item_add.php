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
.btn-info{	 background: #5bc0de; }
.btn-danger{
	background: gray;
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
					<div class="row" style="margin-top: -20px;">
					<!-- <div class="form-three widget-shadow" style="height: 90px;">
					<h2 class="title1">Add Product  </h2>
					</div> -->

	<div class="form-three widget-shadow" >

   <br>
  <ul class="nav nav-tabs">
    <li class="active"><a  data-toggle="tab" aria-expanded="true" href="#menu1">Data</a></li>
    <li><a data-toggle="tab" href="#menu2">Bundle</a></li>
    <li><a data-toggle	="tab" href="#menu3">Tax</a></li>
    <li><a data-toggle="tab" href="#menu4">Suppliers</a></li>
    <li><a data-toggle="tab" href="#menu5">Options</a></li>
    <li><a data-toggle="tab" href="#menu6">Expiration</a></li>        
  </ul>
<?php 	$supplier = $this->sc_model->getSupplier(); ?>
  <div class="tab-content">
    <div id="menu2" class="tab-pane fade in ">
    	<div class="row" style="margin:50px;">
    		<a href="">Add Bundles</a>
    	</div>
    </div>
    <div id="menu3" class="tab-pane fade in">
    	<div class="row" style="margin:50px;">
    		<a href="">Add Options</a>
    	</div>
    </div>
    <div id="menu4" class="tab-pane fade in ">
    								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Vendor Name *</label>
									<div class="col-sm-8">
      <select class="selectpicker form-control" required=""  data-live-search="true" name="supplier_id">			<option data-subtext="Select Supplier">Select Vendor</option>
									<?php foreach($supplier as $sup): print_r($sup); ?>
									<option  value="<?= $sup->supplier_id;?>"><?= $sup->supplier_name?></option>
									<?php endforeach; ?>
									</select>
									</div>

								</div><br>
								<div class="form-group">
									<br><a href="javascript:void();" style="margin-left: 183px;">Add Supplier</a>
								</div>
							</br>
    </div>
    <div id="menu5" class="tab-pane fade in">
    	<div class="row" style="margin:50px;">
    		<a href="">Add Options</a>
    	</div>
    </div>
    <div id="menu6" class="tab-pane fade in ">
    	<div class="row" style="margin:50px;">
    		<a href="">Add Expiration</a>
    	</div>
    </div>                   

    <div id="menu1" class="tab-pane fade in active">
							<form action="<?= base_url().$path.'/items/insertItem';?>" method="post" class="form-horizontal">
<?php if($msg){
						?>
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
							  <a href="<?php  echo base_url().'admin/items/export';?>"><span id="ex" class="btn btn-info btn-sm" style="float: right;margin-left: 5px;">Export</span></a>
							  <a href="<?php echo base_url().'admin/items/importItems';?>"><span id="im" class="btn btn-success btn-sm" style="float: right">Import CSV</span></a>
							  <br>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Item Name * </label>
									<div class="col-sm-8">
										<input type="text" required="" name="item_name" class="form-control1">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Item Detail</label>
									<div class="col-sm-8">
										<input type="text" name="item_detail" class="form-control1">
									</div>

								</div>
								<?php 

									 $categorys = $this->sc_model->getCategroy();
									 $supplier = $this->sc_model->getSupplier();
									    ?>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Item Category *</label>
									<div class="col-sm-8">
      		<select class="selectpicker form-control" name="category_id" required=""  data-live-search="true">										
										<option>Select Category</option>
									<?php foreach($categorys as $cat):   ?>
									
										<option value="<?= $cat->category_id; ?>"><?= $cat->category; ?>
											
										</option>
										<?php endforeach; ?>
									</select>
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Item Type * </label>
									<div class="col-sm-8">
									<select name="item_type" required="" id="state" class="form-control">
									<option>Select Item Type</option>
									<option id="liquid" value="1">Liquid</option>
									<option id="solid" value="2">Solid</option>
									<option id="other" value="3">other</option>
									</select>
									</div>
								</div>
								<div id="liq"></div>
								<div id="sol"></div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Company Name</label>
									<div class="col-sm-8">
									<input class="form-control"  type="text" name="company_name" placeholder="">
									</div>

								</div>					
								<div class="form-group">

									<label for="focusedinput" class="col-sm-2 control-label">unit price * </label>
									<div class="col-sm-8">
									<input required="" class="form-control" type="text" name="unit_price" placeholder="">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Selling price *</label>
									<div class="col-sm-8">
									<input type="text" required="" name="selling_price" class="form-control" placeholder="">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Quantity *</label>
									<div class="col-sm-8">
									<input class="form-control" required="" type="text" name="stock_item" placeholder="">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Expiration Date</label>
									<div class="col-sm-8">

									<input class="form-control" type="text" id="datepicker" name="expiration_date" placeholder="">
									</div>

								</div>																					
														


								<div class="form-group mb-n" style="color:red">
									<label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp</label>
									<div class="col-sm-4">
										<input type="submit" class="btn btn-info form-control1 " id="largeinput" value="Add Item">
									</div>
									<div class="col-sm-4">
										<input type="reset" onclick="if(confirm('do you really want to reset')){ return true;} else{ return false;}" class="btn btn-danger form-control1 " id="largeinput" value="Reset">

									</div>
								</div>
							</form>
						</div>
 <div id="menu6" class="tab-pane fade in active">
      <h3>Expiration Last</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>						
    </div>

  </div>
</div>

			
	

				
					</div>

				</div>
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

			$( function() {
  	
    $( "#datepicker" ).datepicker();
  } );
			
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
</script>
</body>
</html>