<?php $this->load->view('admin/common/header'); ?>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

<style type="text/css">
@media (max-width:1130px){
.panel-body {
  min-height: 10;
  max-height: 10;
  overflow-y: scroll;
}
}

@media (max-width:991px){
.panel-body {
  min-height: 10;
  max-height: 10;
  overflow-y: scroll;
}
}


@media (max-width:768px){
.panel-body {
  min-height: 10;
  max-height: 10;
  overflow-y: scroll;
}
}

@media (max-width:640px){
.panel-body {
  min-height: 10;
  max-height: 10;
  overflow-y: scroll;
}
}	
.btn-info{	 background: #5bc0de; }
 .customerName,.customerAddress,.invoiceNo,.invoiceDate
  {
    background: transparent;
    border: none;
    border-bottom: 1px dashed #83A4C5;
    width: 50%;
    outline: none;
    padding: 0px 0px 0px 0px;
    margin:2%;
    font-style: italic;
  }
  .table-input {
    border:0px;
  }
  .invoiceFooter{
    display: none;
  }

  .logo {
    display:inline-block;
    vertical-align:top;
    margin-top:6px;

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
					<?php 
					$inv_id = $this->sc_model->getSaleInvID();
					$Invoice_id_plus = $inv_id->invoice_id+1;			
					$msg = $this->session->flashdata('msg'); ?>
					<?php $remove = $this->session->flashdata('remove'); ?>
					<div class="row">
					<div class="form-three widget-shadow" style="height: 90px;">
					<h2 class="title1">Add Sale</h2>
					</div>

				<div class="form-three widget-shadow">
					
							<form action="<?= base_url().$path.'/sales/addSale';?>" method="post" class="form-horizontal">
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
							  $customer = $this->sc_model->getCustomer();
							  $product = $this->sc_model->getItems();
?>
							<div class="form-group" id="invoice_no">
									<label for="focusedinput" class="col-sm-2 control-label">Invoice No</label>
									<div class="col-sm-4">
										<input type="text" id="invoice_no_id" name="invoice_no" value="<?= $Invoice_id_plus ?>" class="form-control1" readonly>
										<a href="javascript:void()" id="add_customer">Add Customer</a>

									</div>

								</div>									<div class="form-group" id="addCustomer">
								</div>											
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Item Name</label>
									<div class="col-sm-4">
								      <select id="item_id" class="selectpicker form-control" name="item_name"  data-live-search="true">		<option>Select ITEM</option>		
									<?php foreach($product as $pro):
										?>

									<option  value="<?= $pro->item_id;?>"><?= $pro->item_name?></option>
									<?php endforeach; ?>
									</select>

									</div>


								</div>
								

								
<!-- 								<div class="form-group">
									<div id=""></div>-->

								<div class="form-group" id="remaining_stock1"><label for="focusedinput" class="col-sm-2 control-label">Available Quantity</label><div class="col-sm-4"><input id="re_stock" type="text"  value="" id="remaining_stock"  name="remaining_stock" readonly="" class="form-control"/></div></div>
								<div id="remaining_stock"></div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Quantity</label>
									<div class="col-sm-4">
										<input type="text" id="quantity" name="stock_quantity" class="form-control1">
									</div>
									</div>									
								<div id="item_price_1"></div>
								<div class="form-group" id="item_price_hide">
									<label for="focusedinput" class="col-sm-2 control-label">Item Price</label>
									<div class="col-sm-4">
										<input type="text" id="item_price" name="item_price" class="form-control1">
									</div>

								</div>
								<div id="total"></div>
								<div class="form-group" id="total1">
									<label for="focusedinput" class="col-sm-2 control-label">Total Price</label>
									<div class="col-sm-4">
										<input type="text" id="t_price" name="total_price" value="" class="form-control1">
									</div>

								</div>
<!-- 								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Discount </label>
									<div class="col-sm-4">
										<input type="text" name="discount" id="discount" class="form-control1">
									</div>

								</div> -->
								<div id="net_price"></div>																																													


								<div class="form-group mb-n" style="color:red">
									<label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp</label>
									<div class="col-sm-4">
										<input type="button" class="btn btn-info form-control1 " id="btn-click" value="Add Sale">
									</div>
								</div>
							</form>
						</div>

				<div class="col-md-12 invoice_print">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3>Invoice</h3> 
								<span type="button"   name="button" class="btn btn-primary pull-right print_btn" style="margin-top: -5%;">
									<span class="fa fa-print fa-3x "></span>
								</button>
								</div> 
								<div id="div1" class="panel-body">
									<span class="pull-left left">Invoice No:<input type="text" name="" required="required" readonly="readonly" value="" class="invoiceNo">
									</span> 
									<span class="pull-right right">Date:<input type="text" name="" required="required" readonly="readonly" value="<?= date('d/y/m') ?>" class="invoiceDate">
									</span> 
									<div class="text-center company_info"><div class="logo" style="display: inline-block; vertical-align: top; margin-top: 6px;margin-left:147px;  ">
								<img src="<?= base_url()?>/assets/images/company.png" alt="logo not found" width="160" height="60">
								</div>
								<br>
								<div class="info" style="display: inline-block;">
									<span class="companyName" style="font-size: 30px; font-weight: bold;">
									</span>
								</div>
								<br> 
								<span style="font-size: 20px; font-weight: bold;"></span><br>
								 <span style="font-size: 15px; font-weight: bold;">

          </span>
      </div>
       <div class="text-center company_info">
       	<input type="hidden" name="customerID" value="" class="customerID_text"> 
       	<span>Customer Name:</span>
       	<input type="text" name="customerName" required="required" readonly="readonly" class="customerName"> 
       	<span class="customer_name"></span>
       	<br> <span>Customer Address:</span>
       	<input type="text" name="customerAddress" required="required" readonly="readonly" class="customerAddress"> 
       	<span class="customer_address"></span>
       </div> 
       <table id="invoiceTable" class="table table-bordered">
       	<tbody>
       		<tr>
       			<th>Invoice No</th>
       			 <th>Quantity</th>
       			  <th>Product Name</th>
       			   <th>Price(unit)</th>
       			   <th>Total Price</th>
 
       			 
       			 </tr>

				<tr>
					<td><input id="in_invoiceID" class="invoiceNo" style="width: 120px;border: 0px solid;" type="text" value="" readonly=""></td>					
					<td><input style="width: 120px;border: 0px solid;" type="text" id="in_quantity" value="" readonly=""></td>
					<td><input id="in_item_name" style="width: 120px;border: 0px solid;" type="text" value="" readonly=""></td>
					<td><input style="width: 120px;border: 0px solid;" type="text" id="in_selling_price" value="" readonly=""></td>
					<td><input style="width: 120px;border: 0px solid;" type="text" id="in_total_price" value="" readonly=""></td>
					
       			</tbody><tfoot><tr>
       			 	<td colspan="5" style="text-align: right;"><h4>Delivery Charge:</h4></td> 
       			 	<td>
       			 		<input type="text" id="delivery" name="delivery" value="0" class="form-control delivery"> 
       			 		<span id="deliveryCharge" class="deliveryCharge"></span>
       			 	</td>
       			 </tr>
       			  <tr>
       			  	<td colspan="5" style="text-align: right;">
       			  		<h4>Total amount</h4>
       			  	</td> 
       			  	<td>
       			  		<span class="total_Amount">0</span>
       			  	</td></tr> <tr>
       			  		<td colspan="5" style="text-align: right;"><h4>Discount:</h4></td> 
       			  		<td>
       			  			<input type="text" name="reduced" id="reduce" value="0" class="form-control reduce">
       			  			 <span class="reducedAmount"></span>
       			  			</td>
       			  		</tr> 
<!--        			  		<tr><td colspan="5" style="text-align: right;"><h4>Tax:</h4></td>
       			  		 <td><div class="input-group"><input type="text" name="tax" value="0" class="form-control tax">
       			  		  <span class="input-group-addon"><i class="fa fa-percent"></i></span>
       			  		   <span class="taxAmount"></span>
       			  		</div>
       			  	</td>
       			  </tr> -->
       			   <tr>
       			   	<td colspan="5" style="text-align: right;"><h4>Net Amount:</h4></td>
       			   	 <td><span id="netAmount" class="netAmount">0</span></td></tr>
       			   	  <tr><td colspan="3" style="text-align: right;"><h4>Payment Mode</h4>
       			   	  </td> 
       			   	  <td><select name="payment_method" id="payment_method" class="form-control payment_method"><option value="">-Select-</option> <option value="paid">PAID</option> <option value="partial">PARTIAL</option> <option value="unpaid">UNPAID</option></select> <span class="payment_methodText"></span></td> 
       			   	  <td>
       			   	  	<h4>Paid amount</h4>
       			   	  </td> 
       			   	  <td><input type="number" id="paidamounts" name="paid_amount" min="0" class="form-control paid_amount"> 
       			   	  	<span class="paid_amountText"></span>
       			   	  </td>
       			   	</tr> 
       			   	<tr><td colspan="5" style="text-align: right;"><h4>Amount Due:</h4>
       			   	</td> 
       			   	<td>
       			   		<span class="due">0</span>
       			   	</td>
       			   </tr>
       			   	<tr><td colspan="5" style="text-align: right;"><h4></h4>
       			   	</td> 
       			   	<td>
       			   		<span class="submit"><button id="submit" type="" class="btn btn-info">Submit</button></span>
       			   	</td>
       			   </tr>       			   
       			</tfoot>
       		</table> 
       		<div class="invoiceFooter text-center">
       			<span>TechoBytes</span></div>
       		</div>
       	</div>
   </div>							

					<br>

				</div>					
				</div>

				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p style="text-align: center">	<?= $this->footer->getSettingFooter();?>
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

<script type="text/javascript">
$(document).ready(function(){




$('#add_customer').click(function(){
   var path = "<?= base_url().$path.'/sales/getCustomer';?>"
   val = "1";
   $.ajax({
	url: path,
	type: 'post',
	data: {val:val},
	success: function(data) {
			$('#addCustomer').html(data);
		}
	})
})


$('#delivery').on('keyup keypress click change', function(e) {
	var delivery = parseInt($('#delivery').val(),10)

var net_prices = parseInt($('#in_total_price').val(),10)
var reduce = parseInt($('#reduce').val(),10)
var ND = net_prices+delivery;
var tm = $('.total_Amount').text(ND)
var T = ND - reduce;
$('#netAmount').text(T)
})

$('#reduce').on('keyup keypress click change', function(e) {
var delivery = parseInt($('#delivery').val(),10)
var net_prices = parseInt($('#in_total_price').val(),10)
var reduce = parseInt($('#reduce').val(),10)
var ND = net_prices+delivery;

var tm = $('.total_Amount').text(ND)
var T = ND - reduce;

$('#netAmount').text(T)

})

$('#paidamounts').on('keyup keypress click change', function(e) {

var delivery = parseInt($('#delivery').val(),10)
var net_prices = parseInt($('#in_total_price').val(),10)
var reduce = parseInt($('#reduce').val(),10)
var paidamount = parseInt($('#paidamounts').val(),10);
var ND = net_prices+delivery;
var tm = $('.total_Amount').text(ND)
var T = ND - reduce;
$('#netAmount').text(T)
var gT = T - paidamount;

$('.due').text(gT)


})

$('#btn-click').click(function(){
	var idS = $("#supplier_id").val()
	var idSITM = $("#item_id").val()
	var name = $("#supplier_id option[value='"+idS+"']").text();
	var ITemname = $("#item_id option[value='"+idSITM+"']").text();
	var address = $('#customer_address').val();
	var remaining_stock = $('#remaining_stock').val();
	var stock_quantity = $('#stock_quantity').val();
	var discount = $('#discount').val();
	var item_price = $('#item_price').val();
	var i_net_price= $('#i_net_price').val();
	var total_price = $('#t_price').val();
	var quantity  = $('#quantity').val();
	var invoice_no  = $('#invoice_no_id').val();

	if(!total_price ){
		alert('please fill all fields ');
		return false;
	}
	if(!item_price){
		alert('please fill all  fields ');
		return false;
	}
	if(!quantity){
		alert('please fill  all fields ');
		return false;
	}	

	$('#in_selling_price').val(item_price);
	$('#in_discount').val(discount);
	$('#in_quantity').val(quantity);
	$('#in_item_name').val(ITemname);
	$('#in_total_price').val(total_price);
	$('#in_net_price').val(i_net_price);	
	$('.customerName').val(name);
	$('.customerAddress').val(address);
	$('.invoiceNo').val(invoice_no);

})


	$('#item_id').change(function(){
	$('#remaining_stock1').hide();
	$('#item_price_hide').hide();	
	var q =$('#quantity').val('');
	val = $('#item_id').val();

   var path = "<?= base_url().$path.'/sales/getQ';?>"

   $.ajax({
	url: path,

			type: 'post',

			data: {val:val},

			success: function(data) {
var obj = JSON.parse(data)
var remaining = obj.remaining_stock
var selling_price = obj.selling_price

                $('#remaining_stock').html('<div class="form-group"><label for="focusedinput" class="col-sm-2 control-label">Available Quantity</label><div class="col-sm-4"><input type="text" value="'+remaining+'" name="remaining_stock" id="remaining_stock" readonly=""  class="form-control re_stock"/></div></div>');
                $('#item_price_1').html('<div class="form-group"><label for="focusedinput" class="col-sm-2 control-label">Item Price</label><div class="col-sm-4"><input type="text" value="'+selling_price+'" id="item_price" name="item_price"   class="form-control"/></div></div>');                
            }
        });
	})



// $('#discount').keyup(function(){
// alert('goes her e')
// var url ="<?php //echo base_url().$path."/sales/discount/"?>";

// var discount = $('#discount').val();
// var t_price = $('#t_price').val();

// $.ajax({ url: url,type: 'post',data: {discount:discount,t_price:t_price},success: function(data2) { 
// 		        $('#net_price').html('<div class="form-group"><label for="focusedinput" class="col-sm-2 control-label">net price</label><div class="col-sm-4"><input type="text" value="'+data2+'" id="i_net_price" name="net_price" readonly="" class="form-control"/></div></div>');
// 		}
// 		})

// })

$('#item_price').keyup(function(){

var url ="<?php echo base_url().$path."/sales/item_price/"?>";

var item_price = $('#item_price').val();
var quantity = $('#quantity').val();

$.ajax({ url: url,type: 'post',data: {item_price:item_price,quantity:quantity},success: function(data3) { 

		        $('#total').html('<div class="form-group"><label for="focusedinput" class="col-sm-2 control-label">total Price</label><div class="col-sm-4"><input type="text" value="'+data3+'" id="t_price" name="total_price" readonly="" class="form-control"/></div></div>');
		}
		})

})		


$('#quantity').on('keyup keypress click change', function(e) {

var  q = parseInt($('#quantity').val(),10);
var  re_stock = parseInt($('.re_stock').val(),10);
//var integer = text, 10);
//alert(re_stock)
if(re_stock < q){
	alert('your selected Quantity is less than Stock quantity');
	$('#quantity').val('');
	//return false;
}
if(q < 1){ 
	$('#btn-click').attr('disabled','true');
}else{
	$('#btn-click').removeAttr("disabled");

}
var item_price = $('#item_price').val();
var quantity = $('#quantity').val();
var url ="<?php echo base_url().$path."/sales/item_price/"?>";
$('#total1').hide();
$.ajax({ url: url,type: 'post',data: {item_price:item_price,quantity:quantity},success: function(data3) { 

		        $('#total').html('<div class="form-group"><label for="focusedinput" class="col-sm-2 control-label">total Price</label><div class="col-sm-4"><input type="text" value="'+data3+'" id="t_price" name="total_price" readonly="" class="form-control"/></div></div>');
		}
		})
})

$('#submit').click(function(){
	
	var idS = $("#supplier_id").val()
	var idSITM = $("#item_id").val()
	var name = $("#supplier_id option[value='"+idS+"']").text();
	var ITemname = $("#item_id option[value='"+idSITM+"']").text();
	var address = $('.customerAddress').val();
	var remaining_stock = $('#remaining_stock').val();
	var item_price = $('#item_price').val();
	var quantity  = $('#quantity').val();
	var total_price  = $('#in_total_price').val();	
	var paidamount = parseInt($('#paidamounts').val(),10);
	var invoice_no  = $('#invoice_no_id').val();	
	var payment_method = $('#payment_method').val();
	var delivery = parseInt($('#delivery').val(),10)
	var total_Amount  =  $('.total_Amount').val();
	var reduce = parseInt($('#reduce').val(),10)
	var netAmount = parseInt($('.netAmount').text(),10)
	var paidamounts = parseInt($('#paidamounts').val(),10)
	var due 		= parseInt($('.due').text(),10)
if(delivery ==''){
	alert('please enter Delivery Charges')
	return false
	}	
	if(paidamounts ==''){
	alert('Please enter paid amount')
	return false
	}
	if(payment_method ==''){
	alert('Please select payment mood')
	return false
	}	


	var path ="<?php echo base_url().$path.'/sales/add_inovice/';?>";
	var path2 =   "<?php echo base_url().$path.'/sales/print_invoice/';
	?>"+invoice_no;


	   $.ajax({
		url: path,
		type: 'post',
		data: {supplier_id:idS,item_id:idSITM,remaining_stock:remaining_stock,discount_item_price:reduce,selling_price:item_price,total_price:total_price,quantity:quantity,net_price:netAmount,delivery_charges:delivery,total_paid:paidamounts,total_due:due,payment_method:payment_method,invoice_no:invoice_no},

			success: function(data) {
			window.location =path2;  
            }
        });

	})

})			



</script>


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