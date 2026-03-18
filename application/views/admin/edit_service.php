<?php $this->load->view('admin/common/header'); 
$path = $this->extra_lib->path;
$user = $this->session->userdata('userVal'); 
 

 $gP =  $this->permissions->getPermissions();




$userPermission = $gP[9]; 


if($userPermission->can_view == 'yes'){
}else{
    redirect('admin/dashboard');
}
if($userPermission->can_edit == 'yes'){
}else{
    redirect('admin/dashboard');
}

 ?>



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
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
				<?php $ser = $serviceID[0];  ?> 
					<div class="row">
					<div class="form-three widget-shadow" style="height: 90px;">
					<h2 class="title1">Edit Service  </h2>
					</div>
		
				<div class="form-three widget-shadow">
					
							<form action="<?php echo base_url().$path.'/services/update_service/'.$ser->service_id;?>" method="post" class="form-horizontal">
									
<!-- add code for load the systme popup -->								
<?php 
	$costingPrice = $this->session->userdata('totalPrice');
 ?>


<!-- system popup code ended -->
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Service Name</label>
									<div class="col-sm-8">
										<input type="text"  value="<?php echo $ser->service; ?>" name="service" class="form-control1" id="service_name">
									</div>

								</div>
								<?php $service_type = $this->sc_model->get_service_type();
								$vehicle_type = $this->sc_model->get_vehicle_type();
								?>
								<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Service Type</label>									
<!-- <a href="<?php echo base_url().'admin/services/add_service_type';?>"><span class="btn btn-success btn-sm">Add New Service type</span></a> -->									<div class="col-sm-8">
									<?php foreach($service_type as $st): 									if($st->service_type == $ser->service_type){ ?>
	<input type="radio"  style="margin: 5px;tex-align:justify" name="service_type" checked="" value="<?= $ser->service_type; ?>"  id="service_name"><?= $ser->service_type; ?>										
									<?php }else{
										?>
										<input type="radio"  style="margin: 5px;tex-align:justify" name="service_type" value="<?= $st->service_type; ?>"  id="service_name"><?= $st->service_type; ?>
<?php } ?>
										<br>
									
									<?php endforeach; ?>
									</div>


								</div>							
								<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Vehicles Type</label>								

<!-- <a href="<?php echo base_url().'admin/services/add_service_type';?>"><span class="btn btn-success btn-sm">Add New Vehicle type</span></a> -->									<div class="col-sm-8">
									<?php foreach($vehicle_type as $vt)
									:  
	if($vt->vehicle_type == $ser->vehicle_type){ ?>

	<input type="radio" checked="" style="margin: 5px;tex-align:justify" name="vehicle_type" value="<?= $ser->vehicle_type; ?>"  id="service_name"><?= $vt->vehicle_type; ?><br>
	<?php } else { ?>									
										<input type="radio"  style="margin: 5px;tex-align:justify" name="vehicle_type" value="<?= $vt->vehicle_type; ?>"  id="service_name"><?= $vt->vehicle_type; ?><br>
<?php } ?>										
									<?php endforeach; ?>
									</div>



								</div>							

								<div class="form-group">
									<label for="focusedinput"  class="col-sm-2 control-label">Price</label>
									<input type="hidden" name="service_id" value="<?= $ser->service_id ?>">
									<div class="col-sm-8">
										<input type="hidden" name="costing_price" id="costing_price" value="<?= $costingPrice; ?>" placeholder="">
										<input id="price" type="text"   name="price" class="form-control" value="<?php echo $ser->price ?>" >
									
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

										<textarea  rows="7" type="text" name="detail" class="form-control" ><?php echo $ser->service_detail; ?></textarea>
									</div>

								</div>								

								<div class="form-group mb-n" style="color:red">
									<label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp</label>
									<div class="col-sm-8">
										<input type="submit" class="btn btn-info form-control " id="largeinput" value="update">
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
	<select class="selectpicker form-control" id="product_name" name="product_name"   data-live-search="true">								<option value="">Select Products</option>
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
										<input type="text" style="width:300px;"  name="service" class="form-control1" id="getQuantity">
									<input type="text" style="width:100px;" disabled=""  id="unit" name="service" class="form-control1" id="getQuantity">					
								</div>

								</div>
					<div class="clearfix"> </div>
			<br>	
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Cost & products</label>
									<div class="col-sm-8">
										<input type="text"  name="cost"  class="form-control1" id="cost_products">
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