<?php $this->load->view('admin/common/header'); ?>

<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css' />

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

  	 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style type="text/css">
.btn-info{	 background: #5bc0de; }
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
					<h2 class="title1">Add New Service  </h2>
					</div>

				<div class="form-three widget-shadow">
					
							<form action="<?= base_url().$path.'/services/add_service';?>" method="post" class="form-horizontal">
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
							  <?php } ?>								<!-- add code for load the systme popup -->												
<span class="btn  btn-success" style="float: right;color:black" href="#" data-toggle="modal" data-target="#costingModal" data-backdrop="false">COSTING</span>

<!-- system popup code ended -->	
												
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Service Name</label>
									<div class="col-sm-8">
										<input type="text" required="" name="service" class="form-control1" id="service_name">
									</div>

								</div>
								<?php $service_type = $this->sc_model->get_service_type();
								$vehicle_type = $this->sc_model->get_vehicle_type();
								?>
								<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Service Type</label>									
<!-- <a href="<?php echo base_url().'admin/services/add_service_type';?>"><span class="btn btn-success btn-sm">Add New Service type</span></a> -->									<div class="col-sm-8">
									<?php foreach($service_type as $st): ?>									
										<input type="radio" required="" style="margin: 5px;tex-align:justify" name="service_type" value="<?= $st->service_type; ?>"  id="service_name"><?= $st->service_type; ?><br>
									<?php endforeach; ?>
									</div>


								</div>							
								<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Vehicles Type</label>								

<!-- <a href="<?php echo base_url().'admin/services/add_service_type';?>"><span class="btn btn-success btn-sm">Add New Vehicle type</span></a> -->									<div class="col-sm-8">
									<?php foreach($vehicle_type as $vt)
									:  ?>									
										<input type="radio" required="" style="margin: 5px;tex-align:justify" name="vehicle_type" value="<?= $vt->vehicle_type; ?>"  id="service_name"><?= $vt->vehicle_type; ?><br>
									<?php endforeach; ?>
									</div>


								</div>							

								<div class="form-group">
									<label for="focusedinput"  class="col-sm-2 control-label">Price</label>
									<div class="col-sm-8">

										<input onkeypress="return isNumber(event)" data-toggle="tooltip" title="please enter only numbers" id="price" type="text" required=""  name="price" class="form-control" >
									<input type="radio" id="free" name="" value="" placeholder="">Free
									</div>

								</div>
								<div class="form-group" id="dhide">
									<label for="focusedinput" class="col-sm-2 control-label">Discount</label>
									<div class="col-sm-8"  style="margin: 10px;">

										<input type="radio" id="yes" style="margin-left: 10px;">Yes
										<input type="radio" checked="checked" id="no" value="No" style="margin-left: 10px;">No										
										

									</div>

								</div>																	
								<div class="form-group disc">
									<label for="focusedinput" class="col-sm-2 control-label"></label>
									<div class="col-sm-8">

<!-- 									<input type="text" name="discount" value="" onkeypress="return isNumber(event)" data-toggle="tooltip" title="please enter only numbers" id="discount" placeholder="discount" class="form-control"> -->
<select id="discount" class="form-control" name="discount" >
	<option value="">Discount</option>
	<option value="10">10%</option>
	<option value="15">15%</option>	
</select>									


									</div>

								</div>
								

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Description</label>
									<div class="col-sm-8">

										<textarea required="" rows="7" type="text" name="detail" class="form-control" ></textarea>
									</div>

								</div>								

								<div class="form-group mb-n" style="color:red">
									<label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp</label>
									<div class="col-sm-4">
										<input type="submit" class="btn btn-info form-control " id="largeinput" value="Save">
									</div>
									<div class="col-sm-4">
										<input type="reset" onclick="if(confirm('do you really want to reset')){ return true;} else{ return false;}" class="btn btn-danger form-control " id="largeinput" value="Reset">

									</div>
								</div>
							</form>
						</div>
						<?php if($services): ?>
						<div class="form-three widget-shadow table-responsive">	
						<table class="table table-bordered">
							<tr>
								<td>Sr.No</td>
								<td>Service Name</td>
								<td>Edit</td>
								<td>Delete</td>																			
							</tr>
							<?php  $sr =1; foreach($services as $ser):  ?>
							<tr>
								<td><?= $sr++; ?></td>					
								<td><?= $ser->service; ?></td>
								<td><a href="<?= base_url().$path.'/services/edit_service/'.$ser->service_id; ?>"><button class="btn btn-info">Edit</button></a></td>
								<td><a onclick="if(confirm('Do you want to delete service?')){ return true; } else {return false;} " href="<?= base_url().$path."/services/delete_service/".$ser->service_id?>"><button class="btn btn-danger">Delete</button></a></td>																																
							</tr>
						<?php endforeach; ?>
						</table>

						</div>						
					<?php endif; ?>
					</div>

				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p>Corbon</p>
	   </div>
        <!--//footer-->
	</div>
	
<!-- 	The service Form with costing module has been started -->

<!--     Reports By modal -->
    <div id="costingModal" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-body">
<span  data-dismiss="modal" style="float: right;color:red; "><i class="fa fa-times" aria-hidden="true"></i>
</span>                    
                    
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-content-section">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="categoryAdded"></div>
                                        <div class="devit-card-custom">
                                                            <div class="row">
                    <div class="form-three widget-shadow" style="height: 90px;">
                    <h2 class="title1">Costing calculation of sales module</h2>
                    </div>
<?php $getProducts = $this->sc_model->getInventory(); ?>
                        <div class="form-three widget-shadow table-responsive"> 
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Product Name</label>
									<div class="col-sm-8">
									<select name="product_name" id="product_name" class="form-control">
								<option value="">Select Products</option>
										<?php foreach($getProducts  as $pro):
											?>
											<option value="<?= $pro->pro_id; ?>"><?= $pro->product_name; ?></option>
											<?php endforeach; ?>

										
									</select>
									</div>

								</div>
							<div class="clearfix"> </div>
							<br>	
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Quantity</label>
									<div class="col-sm-8">
										<input type="text" style="width:300px;" required="" name="service" class="form-control1" id="getQuantity">
									<input type="text" style="width:100px;" disabled=""  id="unit" name="service" class="form-control1" id="getQuantity">					
								</div>

								</div>
					<div class="clearfix"> </div>
			<br>	
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Cost & products</label>
									<div class="col-sm-8">
										<input type="text" required="" name="cost"  class="form-control1" id="cost_products">
									</div>

								</div>										
							<div class="clearfix"> </div>
							<br>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"></label>
									<div class="col-sm-8">
										<button type="" id="Addservice" class="btn btn-success">Add Product</button>
									</div>

								</div>								
								<div class="clearfix"> </div>
								<?php $mySession = $this->session->userdata('serviceSession');

?>
								<div id="setSessionService"></div>
								<div id="hiddenSession">
		<?php if($mySession): ?>
									  	<table class="table table-responsive">
  		<tr>
  			<td>Product Name</th>
  			<td>Unit</td>
  			<td>Cost</td>
  			<td>Quantity</td>
  			<td>Action</td>
  			  			
  		</tr>
  		<?php 
   	foreach ($mySession as  $value) {
  	?>

  		<tr>

  		<td><?= $value['product_name']." "; ?></td>
  		<td><?= " " .$value['setunit']." "; ?></td>
  		<td><?= " " .$value['cost_products']." "; ?></td>
  		<td><?= " " .$value['getQuantity']." "; ?></td>
  		<td>&#10005;</td>
  		</tr>		
  	
  	<?php 
	}?>
</table>
<button class="btn btn-success" id="calculate" data-dismiss="modal" > Calculate </button>
<button class="btn btn-danger" data-dismiss="modal" id="cancel"> Cancel </button>
<?php endif; ?>
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
                <div class="modal-footer info-md">
                    <button class="btn btn-danger" style="color:white" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>

<!-- 		Reports by consuption modal end -->
<!-- 	The service Form with costing module has been Ended -->



	
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
   
   <script>
   	$(document).ready(function(){ 


	$('#dhide').hide();
	$('.disc').hide();
$('#yes').click(function(){
	$('.disc').show();
$('#no').prop('checked',false)	
})
$('#no').click(function(){

$('#yes').prop('checked',false)	
	$('.disc').hide();
})
$('#price').keyup(function(){
		var price = parseInt($('#price').val())
		if(price == 0){
			$('#dhide').hide()
		}
		else{
$('#free').removeAttr("checked");
		$('#dhide').show()	
		}

		})


$('#free').click(function(){
$('#dhide').hide()



		$('#price').val('')
		
		})

})

function isNumber(evt) {

		evt = (evt) ? evt : window.event;

		var charCode = (evt.which) ? evt.which : evt.keyCode;

		if (charCode > 31 && (charCode < 48 || charCode > 57)) {

		return false;

		}

		return true;

		}
	</script>
</body>
</html>