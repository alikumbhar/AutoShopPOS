<?php $this->load->view('admin/common/header'); 
$path = $this->extra_lib->path;
?>

<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css' />
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">



<style type="text/css">
.aestric{
    position:absolute;color:red;font-size: 50px;margin-left: -20px;margin-top: -5px;
}
.btn-info{	 background: #5bc0de; }
.btn-danger{
	background: gray;
}t{
	width: 480px !important;
}
select{
	width: 480px !important;

}
.mg-b-10{
	margin-left: 5px;
}
.selectpicker{margin-left: 5px !important;}
.forms button.btn.btn-default{
	width: 480px !important;
}
textarea.form-control {
	width: 475px !important;
}
.ins{ margin-left: 5px; }
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
					<div class="row">
					<div class="form-three widget-shadow" style="height: 90px;">
					<h2 class="title1">Add Product  </h2>
					</div>

			
				<div class="form-three widget-shadow">
					

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
				                 $brand = $this->sc_model->getbrand();
				                 $categorys = $this->sc_model->getCategroy();
				                 $supplier = $this->sc_model->getSupplier();
				                 ?>							
<!-- 							  <a href="<?php  echo base_url().'admin/items/export';?>"><span id="ex" class="btn btn-info btn-sm" style="float: right;margin-left: 5px;">Export</span></a>
							  <a href="<?php echo base_url().'admin/items/importItems';?>"><span id="im" class="btn btn-success btn-sm" style="float: right">Import CSV</span></a> -->
							  <br>
<?php $ser = $productID[0]; ?>
           <div class="row">
<?php if($ser->status=='no'):?>
<div class="alert alert-danger" role="alert">
  This product is disabled!
</div>
<?php endif; ?>
            <?php $msg = $this->session->flashdata('msg'); 
            echo $msg; 
            ?>
            <?php  
            $barcoder =  substr($ser->barcode,1,300 );
                        ?>     
          <form  action="<?php echo base_url().'admin/inventory/update_product';?>" method="post">  
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input name="barcode" type="text" value="<?= $barcoder ?>" class="form-control" required="" placeholder="Barcode">
                                                </div>

                                                <div class="form-group">
                                                    <span class="aestric
                                                    ">*</span>
                                                    <input id="description" name="description"  type="text" value="<?= $ser->product_name; ?>" class="form-control" placeholder="Product Name" required="">
                                                </div>  
                                                 <hr>                                
                <div class="form-group" id="refreshCat">
                    <span class="aestric
                                                    ">*</span>
      		<select class="selectpicker form-control" id="category_id" name="category_id" required=""  data-live-search="true">			                                      
                            <option value="">Select Category</option>
                            <option selected="" value="<?= $ser->category ?>"><?= $ser->category ?></option>
                        <?php foreach($categorys as $cat):   ?>
                        
                            <option value="<?= $cat->category_id; ?>"><?= $cat->category; ?>
                                
                            </option>
                            <?php endforeach; ?>
                        </select>

                                                <a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#categoryModal" data-backdrop="false">New Category</a>

                                                </div>
                                                <div class="form-group" id="getBrandID">
      		<select class="selectpicker form-control" id="brand_id" name="brand_id" required=""  data-live-search="true" id="brand_id_div">			                                                	

                            <option>Select Brand</option>
                            <option selected="" value="<?= $ser->brand; ?>"><?= $ser->brand ?></option>
                        <?php foreach($brand as $bran):   ?>
                            
                            <option value="<?= $bran->brand_id; ?>"><?= $bran->brand; ?>
                                
                            </option>
                            <?php endforeach; ?>
                        </select>
                                         <a class="Primary mg-b-10"  data-toggle="modal" data-target="#getBrand" data-backdrop="false">New Brand</a>
                                                </div>

                                                <div class="form-group">
                                                    <input id="location" value="<?= $ser->location; ?>" name="location" type="text" class="form-control" placeholder="Location">
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                   <span class="aestric
                                                    ">*</span>
                                                    <input id="sale_price" value="<?= $ser->sale_price; ?>" name="sale_price" type="text" class="form-control" placeholder="sale price">
                                                </div>           
                                                <div class="form-group">
                                                    <span class="aestric
                                                    ">*</span>
                                                    <input value="<?= $ser->cost; ?>" id="cost" name="Cost" type="text" class="form-control" placeholder="Cost">
                                                </div>                       
                                                <hr>  
                                                <div class="form-group">
                                                    <span class="aestric
                                                    ">*</span>
                                                    <input value="<?= $ser->stock_level; ?>" id="stock_level" name="stock_level" type="text" class="form-control" placeholder="Stock Level">
                                                </div>   
                                                <div class="form-group">
												<select class="form-control selectpicker" data-live-search="true" name="unit" id="unit">
                                                    <option selected="" value="<?= $ser->unit; ?>"><?= $ser->unit; ?></option>
													<option>Unit</option>	
													<option value="Can">Can</option>
													<option value="Kg">Kg</option>
													<option value="meter">Meter</option>
													<option value="Piece">Piece</option>
												</select>
                                                </div>
                                                <div class="form-group">
                                                    <input value="<?= $ser->stock_limits; ?>" id="stock_limits" name="stock_limits" type="text" class="form-control" placeholder="Stock alert">
                                                </div>
                                                <div class="form-group">
                                                    <textarea id="comments"
                                                    name="comments" class="form-control" placeholder="comments"><?= $ser->comments; ?></textarea>
                                                </div>                                                                                                               </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: -15px">
                                                <div class="form-group res-mg-t-15">
                                                    <input name="department" type="hidden" class="form-control" placeholder="Department">
                                                    <input name="product_id" value="<?= $ser->pro_id; ?>" type="hidden" class="form-control" placeholder="Department">
                                                </div>
                                                <div class="form-group">
                                                    <input value="<?= $ser->promo_code; ?>" id="promo_code" name="promo_code" type="text" class="form-control ins" placeholder="Promo Code">
                                                </div>
                                                
                                                
                                                <br>
                                                <br>
                                                <hr style="margin-top: 7px;">
                                                <div class="form-group">
                                                    <input value="<?= $ser->net_weight; ?>" id="net_weight" name="net_weight" type="text" class="form-control ins" placeholder="Net Weight">
                                                </div>
                                                <div class="form-group">
                                                    <input value="<?= $ser->gross_weight; ?>" id="gross_weight" name="gross_weight" type="text" class="form-control ins" placeholder="Gross Weight">
                                                </div>
                                                <hr>                         
                        <div class="form-group" id="getSupplierRefresh">
                        <select id="supplier_id" required=""  class="selectpicker form-control" data-live-search="true" >          
                        <option>Select Supplier</option>
                        <?php foreach($supplier as $sup): ?>
                        <option value="<?= $sup->supplier_id; ?>"><?= $sup->supplier_name?></option>
                        <?php endforeach; ?>
                        </select>

<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#supplierModal" data-backdrop="false">Add Supplier</a>
</div>
<hr>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">&nbsp</label>
									<div class="col-sm-8">

                                <span class="input-group-addon">
                                	<i class="fa fa-calendar"></i>
                                </span>
									<input class="form-control" type="text" value="<?= $ser->expire_date; ?>" id="datepicker" name="expiration_date" placeholder="expiration date">
									</div>

								</div>

                                                </div>

                                            </div>
                                         <div class="row">
                                            <div class="col-lg-12">
                        <div class="payment-adress">
                <input type="submit"  class="btn btn-primary waves-effect waves-light" value="Update Product">
                <?php if( $ser->status =='yes'){ ?>
                <a href="<?php echo base_url().'admin/inventory/disable_product/'.$ser->pro_id.'/no';?>"><span type="submit"  class="btn btn-danger waves-effect waves-light" >Discontinue Product</span></a>          
            <?php } if( $ser->status =='no'){?>
                <a href="<?php echo base_url().'admin/inventory/disable_product/'.$ser->pro_id.'/yes';?>"><span type="submit"  class="btn btn-danger waves-effect waves-light" >Continue Product</span></a>
                <?php } ?>                
                                                </div>
                                            
                                            </div>
                                        </div>
										</form>				


								<div class="form-group mb-n" style="color:red">
									<label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp</label>
									
								</div>

						</div>

				
					</div>

				</div>
			</div>						
					
					</div>

				</div>
			</div>
		</div>

<!-- the bran modal here -->
    <div id="getBrand" class="modal modal-edu-general default-popup-PrimaryModal PrimaryModal-bgcolor fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
                <div class="modal-body">
                    <i class="educate-icon educate-checked modal-check-pro"></i>
                    <div class="brandAdded"></div>
                    <h2>Add Brand</h2>
                    <div class="brandAdded" style="color:black"></div>
                    <div class="form-group">
                    <input type="text" id="add_brand" name="brand" class="form-control" placeholder="Brand">
                    </div>
                    <a href="#" id="brand-btn" data-dismiss="modal" class="btn btn-primary waves-effect waves-light">Add Brand</a>
                </div>
                <div class="modal-footer footer-modal-admin">
                    <a data-dismiss="modal" href="#">Cancel</a>
                    
                </div>
            </div>
        </div>
    </div>


<!--     categroy modal -->
    <div id="categoryModal" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
                <div class="modal-body">
                    <span class="educate-icon educate-info modal-check-pro information-icon-pro"> </span>
                    <h2>Add Category</h2>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-content-section">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="categoryAdded"></div>
                                        <div class="devit-card-custom">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="category" id="add_category" placeholder="Category">
                                            </div>
                                                                                
                                            <a data-dismiss="modal" href="#" id="cat-btn" class="btn btn-primary waves-effect waves-light">Add Category</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                            
                </div>
                <div class="modal-footer info-md">
                    <a data-dismiss="modal" href="#">Cancel</a>
                    
                </div>
            </div>
        </div>
    </div>

<!-- 		category modal end -->



<!-- supplier modal -->
   <div id="supplierModal" class="modal modal-edu-general default-popup-PrimaryModal PrimaryModal-bgcolor fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
                <div class="modal-body">
                    <i class="educate-icon educate-checked modal-check-pro"></i>
                    <h2>Add Suppliers!</h2>
                                      <div class="form-group">
                                                
                                            <div class="form-group">
                                                <input type="text" name="supplier_name" id="supplier_name" class="form-control" placeholder="Supplier Name">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile">
                                            </div>

                                            <div class="form-group">
                                                <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="comments" class="form-control" id="sup_comments" placeholder="Comments">
                                            </div>                 
                                            <br>
                                            <button data-dismiss="modal"  class="btn btn-primary waves-effect waves-light" id="supplier-btn">Submit</button>                                                

                                                </div>
                </div>
                <div class="modal-footer">
                    <a data-dismiss="modal" href="#">Cancel</a>
                    
                </div>
            </div>
        </div>
    </div>
 
<!-- end supplier modal -->
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

   <script>
$('#reload').hide();
$(document).ready(function(){
$(document).keydown(function(evt){
if (evt.keyCode==114 && (evt.ctrlKey) ){
evt.preventDefault();
$('#PrimaryModalalert').modal('show');
}
});

$(document).keydown(function(evt){
if (evt.keyCode==113){
evt.preventDefault();
$('#sb-product').trigger("click")

}
});        


//     $('#supplier_id').change(function(){
//    var path = "<?= base_url().'admin/suppliers/get_supplier';?>"
//    val = "1";
//    $.ajax({
//     url: path,
//     type: 'post',
//     data: {val:val},
//     success: function(data) {
//             $('#supplier_id').html(data);
//         }
//     })
// })

$('#sku').keyup(function(){
    var sku = $('#sku').val();
var path = "<?= base_url().'admin/items/checkBarcode';?>"
$.ajax({
url: path,
type: 'post',
data: {sku:sku,},
success: function(data) {

    }
})

})
$('#sb-product').click(function(){

var sku = $('#sku').val();
var promo_code  = $('#promo_code').val();
var category_id = $('#category_id').val();
var brand_id   = $('#brand_id').val();
var location    = $('#location').val();
var sale_price  = $('#sale_price').val();
var cost        = $('#cost').val();
var stock_level = $('#stock_level').val();
var unit        = $('#unit').val();
var stock_limits= $('#stock_limits').val();
var comments    = $('#comments').val();
var description  = $('#description').val();
var net_weight  = $('#net_weight').val();
var gross_weight= $('#gross_weight').val();
var supplier_id = $('#supplier_id').val();
var expire_date = $('#datepicker').val();

// if(sku ==''){
//     alert('please enter Barcode')
//     return false
// }
if(description ==''){
    alert('please enter description')
    return false
}


if(category_id ==''){
    alert('please Select Category')
    return false
}

if(sale_price ==''){
    alert('please enter Sale Price')
    return false
}


if(cost ==''){
    alert('please enter Cost')
    return false
}
if(unit ==''){
    alert('please enter Unit')
    return false
}

if(stock_limits ==''){
    alert('please enter Stock limit')
    return false
}

var vsku= "s"+sku;
var itemurl = "<?= base_url().'admin/items/add_item';?>"
var path = "<?= base_url().'admin/items/addProducts';?>"
$.ajax({
url: path,
type: 'post',
data: {
sku:vsku,
description:description,
category_id:category_id,
brand_id:brand_id,
location:location,
sale_price:sale_price,
cost:cost,
stock_level:stock_level,
unit:unit,
stock_limits:stock_limits,
comments:comments,
promo_code:promo_code,
net_weight:net_weight,
gross_weight:gross_weight,
supplier_id:supplier_id,
expire_date:expire_date
},
success: function(data) {
window.location = itemurl;
//$('#supplier_id').html(data);
}
})
})

$('#cat-btn').click(function(){
$('#reload').show();

var ad_category = $('#add_category').val()    
if(ad_category ==''){
    alert('please enter category')
    return false;
}
var path = "<?= base_url().'admin/category/insertCategoryModal';?>"
$.ajax({
url: path,
type: 'post',
data: {
category:ad_category,
},
success: function(data) {
$('#reload').hide();
$('.categoryAdded').html(data);
$("#add_category").val('');
    $("#refreshCat").load("<?php echo base_url().'admin/category/getCategorySelect';?>");
}
})
})

$('#brand-btn').click(function(){


var ad_brand = $('#add_brand').val()    
if(ad_brand ==''){
    alert('please enter brand')
    return false;
}
var path = "<?= base_url().'admin/brand/insertBrandModal';?>"

$.ajax({
url: path,
type: 'post',
data: {
brand:ad_brand,
},
success: function(data) {
$("#add_brand").val('');
    $("#getBrandID").load("<?php echo base_url().'admin/brand/getBrandBySelect';?>");
}
})
})

$('#supplier-btn').click(function(){
$('#reload').show();

var supplier_name = $('#supplier_name').val()
var mobile  = $('#mobile').val()
var email = $('#email').val()
var address = $('#address').val()
var sup_comments = $('#sup_comments').val()
if(supplier_name ==''){
    alert('please enter supplier name')
    return false;
}
if(mobile ==''){
    alert('please enter supplier mobile  number')
    return false;
}
if(address ==''){
    alert('please enter supplier address')
    return false;
}
var path = "<?= base_url().'admin/suppliers/insertSupplierModal';?>"

$.ajax({
url: path,
type: 'post',
data: {
supplier_name:supplier_name,mobile:mobile,email:email,address:address,sup_comments:sup_comments
},
success: function(data) {
$('#reload').hide();
$('.brandAdded').html(data);
    $("#getSupplierRefresh").load("<?php echo base_url().'admin/suppliers/getSupplierBySelect';?>");
 $('#supplier_name').val('')
 $('#mobile').val('')
 $('#email').val('')
 $('#address').val('')
 $('#sup_comments').val('')
}
})
})




})
</script>

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
$(document).ready(function() {
    // show the alert
    setTimeout(function() {
        $("#PrimaryModalftblack").modal('close');
    }, 2000);


			$( function() {
  	
    $( "#datepicker" ).datepicker();
  } );
			
});

</script>


</body>
</html>