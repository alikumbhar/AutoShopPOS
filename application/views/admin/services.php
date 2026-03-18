<?php $this->load->view('admin/common/header'); 
$path = $this->extra_lib->path;
$user = $this->session->userdata('userVal'); 
 

 $gP =  $this->permissions->getPermissions();




$userPermission = $gP[9]; 


if($userPermission->can_view == 'yes'){
}else{
    redirect('admin/dashboard');
}

 ?>
<!--file running for the localserver -->

<!--   <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script> -->

<script src="<?php echo base_url()."/assets/js/bootstrap-select.min.js";?>"></script>
<!--end of file running for the local server -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <link rel="stylesheet" href="<?php echo base_url().'assets/css/new_style.css'; ?>">



<style type="text/css">
.btn-info{	 background: #5bc0de; }
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
    </div>
<div class="clearfix"> </div>
<?php $this->view('admin/common/left-sidebar.php');?>
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
							  <?php } 
							  ?>									
<!-- add code for load the systme popup -->								
<?php 
	$costingPrice = $this->session->userdata('totalPrice');
 ?>


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
										<input type="hidden" name="costing_price" id="costing_price" value="<?= $costingPrice; ?>" placeholder="">
										<input id="price" type="text" required=""  name="price" class="form-control" >
									<input type="radio" id="free" name="" value="" placeholder="">Free
									</div>
<span class="btn  btn-success" style="float: right;color:black" href="#" data-toggle="modal" data-target="#costingModal" data-backdrop="false">COSTING</span>
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
<!-- 
									<input type="text" name="discount" value="" id="discount" placeholder="discount" class="form-control"> -->
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
									<?php if($userPermission->can_add =='yes'){ ?>
									<div class="col-sm-4">
										<input type="submit" class="btn btn-info form-control " id="largeinput" value="Save">
									</div>
									<?php } else { ?>
									<div class="col-sm-4">
										<button onclick="failedRec()"  class="btn btn-info form-control " id="largeinput"> Save
										</button>
									</div>
										<?php } ?>
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
									<?php if($userPermission->can_edit =='yes'){ ?>								
								<td><a href="<?= base_url().$path.'/services/edit_service/'.$ser->service_id; ?>"><button class="btn btn-info">Edit</button></a></td>
								<?php } else{ ?>
								<td><button onclick="failedRec()" class="btn btn-info">Edit</button></td>
									<?php } 
								if($userPermission->can_delete =='yes'){
									?>
								<td><a onclick="if(confirm('Do you want to delete service?')){ return true; } else {return false;} " href="<?= base_url().$path."/services/delete_service/".$ser->service_id?>"><button class="btn btn-danger">Delete</button></a></td>		<?php } else{
									?>
								<td> <button onclick="failedRec()" class="btn btn-danger">Delete</button></td>																<?php } ?>																							
							</tr>
						<?php endforeach; ?>
						</table>

						</div>						
					<?php endif; 
					?>
					
					</div>

				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p>	<?= $this->footer->getSettingFooter();?>
			</p>
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
	<select class="selectpicker form-control" id="product_name" name="product_name" required=""  data-live-search="true">								<option value="">Select Products</option>
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
<button class="btn btn-success" onclick="calculate();"> Calculate </button>
<button class="btn btn-danger" data-dismiss="modal" onclick="cancel();"> Cancel </button>
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
				function failedRec(){
					alert("Sorry! you can't perfrom this operation");
				}

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
        $('#setSessionService').hide();
        
	$('#Addservice').click(function(){
		var product_id = $('#product_name').val()
		var cost_products = $('#cost_products').val()
		var getQuantity = $('#getQuantity').val()
		var product_name =$('#product_name').find(":selected").text();
		var unit = $('#unit').val() 

if(product_id ==""){
	alert('please select any product ');
	return false;
}
var  path = "<?php echo base_url().'admin/services/setSessionService'; ?>"
$.ajax({
    url: path,
    type: 'post',
    data: {product_name:product_name,product_id:product_id,cost_products:cost_products,getQuantity:getQuantity,unit:unit},
    success: function(data) {
    	$('#product_name').val('')
    	$('#cost_products').val('')
    	$('#getQuantity').val('')
    	$('#unit').val('')
    	$('#setSessionService').show();
        $('#hiddenSession').hide()    	
        $('#setSessionService').html(data);		        }
    })

})
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




$('#getQuantity').keyup(function(){
	var	val  = $('#product_name').val();
	var getQuantity = $('#getQuantity').val()
	var path = "<?php echo base_url().'admin/services/getCalculatedService'; ?>"; 
	var unit = $('#unit').val()
	var getPros = "1";
$.ajax({
    url: path,
    type: 'post',
    data: {val:val,getQuantity:getQuantity,getPros:getPros,unit:unit},
    success: function(data) {
        $('#cost_products').val(data);        }
    })
})


$('#product_name').change(function(){
	var	val  = $('#product_name').val();
	var path = "<?php echo base_url().'admin/services/getUnit'; ?>"; 

$.ajax({
    url: path,
    type: 'post',
    data: {val:val},
    success: function(data) {
        $('#unit').val(data);        }
    })
})

		})

function calculate(){
	var productCost = $('#productCost').val()
	var extraCost = $('#extra_cost').val()
	
	var path = "<?php echo base_url().'admin/services/getUnit'; ?>"; 
	var val = "1"
$.ajax({
    url: path,
    type: 'post',
    data: {cal:val,productCost:productCost,extraCost:extraCost},
    success: function(data) {
        $('#setSessionService').hide();
        $('#hiddenSession').hide() 
    	$('#costingModal').modal('hide')                
    	}
    })

}

function ConfirmCalculate()
{
var productCost = document.getElementById('productCost').value;	
var extra_cost  = document.getElementById('extra_cost').value;
if(extra_cost ==''){
	extra_cost+=0;
}
var extraResult = parseInt(productCost, 10) + parseInt(extra_cost, 10);   document.getElementById('price').value =extraResult;
  var x = confirm("The cost of products is "+extraResult+'.\nPress cancel if you want to add more products ');
  if (x){
    calculate();	
      return true;
  }
  else{
    return false;
	}
}
function together(){
ConfirmCalculate();
}



   </script>
</body>
</html>