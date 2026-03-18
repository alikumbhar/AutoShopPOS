<?php 
$this->load->view('admin/common/header'); 
$user = $this->session->userdata('userVal'); 
$path =  $this->extra_lib->path; 
$gP =  $this->permissions->getPermissions();
$userPermission = $gP[11]; 

if($userPermission->can_view == 'yes'){
}else{
    redirect('admin/dashboard');
}





?>

<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css' />

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <link rel="stylesheet" href="<?php echo base_url().'assets/css/new_style.css'; ?>">

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style type="text/css">
.btn-info{	 background: #5bc0de; }
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 2px; background: #e02727; border-bottom: #bbb9b9 1px solid;font-size:13px;}
#country-list li:hover{background:#7d0707;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
#country-list{
	margin-top: 76px;
	margin-left: 10px;
}
th{
	background: #f3073e;
	text-transform: uppercase;
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
				<div required="" class="forms">
					<?php $msg = $this->session->flashdata('msg');
        			 $NFMsg =$this->uri->segment(4);           

	
					?>
					<?php $remove = $this->session->flashdata('remove'); ?>
					<div class="row">
					<div required="" class="form-three widget-shadow" style="height: 90px;">
					<h2 class="title1">Add Purchased </h2>
					</div>

				<div required="" class="form-three widget-shadow">
					
							<div class="form-horizontal">
		<?php if($NFMsg =='msg'){ 				?>
					<div class="alert alert-success">
  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>								
							     <?php echo "Add Purchase Invoice Has been added"; ?><strong>!</strong>
							  </div>
						<?php	
							} if($remove){ ?>
							<div class="alert alert-danger">
  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>									    
							     <?=  $remove; ?><strong>!</strong>
							  </div>
							  <?php unset($_SESSION['remove']); }
                if($NFMsg =='inv_msg'){ ?>
          <div class="alert alert-danger">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>               
                   <?php echo "Sorry this invoice number is already exists"; ?><strong>!</strong>
                </div>
                <?php 
                }     
							  $supplier = $this->sc_model->getSupplier();
							  							  ?>
								<div required="" class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Invoice No</label>
									<div class="col-sm-4">
										<input id="invoice_no" type="text"  name="invoice_no" required="" class="form-control1">
									</div>
									<label id="invoice-box"></label>

								</div>							  						
								<div required="" class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Vendor Name</label>
									<div class="col-sm-4">

								      <select class="selectpicker form-control" id="supplier_ids" name="supplier_id"  data-live-search="true">		
								      	<option value="">Select Vendor</option>
									<?php foreach($supplier as $sup):?>
									<option  value="<?= $sup->supplier_id;?>"><?= $sup->supplier_name?></option>
									<?php endforeach; ?>
									</select>
									</div>
								</div>										
								<div required="" class="form-group">
								<div id="itemadd"></div>
								<!-- <div class="col-sm-4" id="btn-hide"><a href="javascript:void(0)" id="addmore">add item (+)</a></div>
								</div> -->
								</div>					
								<div required="" class="form-group" id="dummItem">
									<label for="focusedinput" class="col-sm-2 control-label">Item Name</label>
									<div class="col-sm-4">
								      <select id="item_id" disabled="" class="selectpicker form-control" name="item_id"  data-live-search="true">		
									<option value="">Select Item</option>
									
									</select>

			<input type="text" class="form-control" id="search-box" name="" value="" placeholder="please enter to search item ">



          <div id="suggesstion-box"></div>
          <div id="cart-item"></div>

									</div>

								</div>
								<div id="textboxDiv"></div>								
								<div required="" class="form-group" id="remaining_stock1">
									<label for="focusedinput" class="col-sm-2 control-label">Add payment</label>
									<div class="col-sm-4">
										<input id="re_stock" type="text"  value=""  name="add_payment"  required="" class="form-control"/>
										<input id="checkCart" type="hidden"  value="">										
									</div>
								</div>
								<div required="" class="form-group" id="remaining_stock1"><label for="focusedinput" class="col-sm-2 control-label">Purchase Date</label><div class="col-sm-4"><input id="datepicker" type="text"  value=""  name="purchase_date"  required="" class="form-control"/></div></div>								
								<div id="remaining_stock"></div>
								<div required="" class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Payment Type</label>
									<div class="col-sm-4">
										<select name="pay_type" required="" id="pay_type" class="form-control" >
											<option value="cash">From Cash</option>
											<option value="hand">From Hand</option>										
										</select>
									</div>
									</div>
									<div required="" class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Amount Paid</label>
									<div class="col-sm-4">
									<input type="text" name="amount_paid" id="amount" value="" required="" class="form-control" >
									<label id="amount_error"></label>
									</div>
									</div>																


								<div required="" class="form-group mb-n" style="color:red">
									<label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp</label>
<?php if($userPermission->can_add == 'yes'){ ?>									
									<div class="col-sm-4">
										<input id="clickPurchased"  type="submit" class="btn btn-info form-control1 " id="largeinput" value="Add Purchased">
									</div>
								<?php } else { ?>
									<div class="col-sm-4">
										<span onclick="failedRec();"  class="btn btn-info form-control1 " id="largeinput" >Add Purchased</span>
									</div>
									<?php } ?>									
								</div>
							</div>
						</div>
					
					</div>

				</div>
			</div>
		</div>
		<?php unset($supplier);?>
		<!--footer-->
		<div class="footer">
		   <p style="text-align: center">	&copy; 2019 - Techobites - All Rights Reserved Techobites.com
			</p>
	   </div>
        <!--//footer-->
	</div>
	
	
		<script src='<?php echo base_url()."assets/admin/js/"?>SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>

		<script src="<?php echo base_url()."assets/admin/js/"?>classie.js"></script>

<script type="text/javascript">
	$( function() {
  	
    $( "#datepicker" ).datepicker();
  } );
function SomeDeleteRowFunction(){
	$("#textboxDiv").children().last().remove();  
}		
$(document).ready(function()
{
  $('#clickPurchased').click(function(){
	var invoice_no = $('#invoice_no').val()
	var supplier_id = $('#supplier_ids').val()
	var item_id = $('#item_id').val()
	//var search_box = $('#search-box').val()
	var productIDQuery = $('#productIDQuery').val();

	var re_stock = $('#re_stock').val()
	var datepicker = $('#datepicker').val()
	var pay_type = $('#pay_type').val()
	var amount = $('#amount').val()
	var checkCart = $('#checkCart').val()

	if(invoice_no ==''){
		alert('please enter invoice no');
		return false
	}
	if(supplier_id ==''){
		alert('please select Vendor name from the list');
		return false
	}	
	if(checkCart ==''){
		alert('Cart is empty please select any product.');
		return false
	}
	
	if(datepicker ==''){
		alert('Please Enter the date.');
		return false
	}
	if(amount ==''){
		alert('please enter amount you want to pay');
		return false
	}
	if(re_stock < amount ){
		confirm('the amount you are paying for is less the total amount');
		return true	
	}


  var path   = "<?= base_url().$path.'/purchases/insertPurchase';?>"; 
  var pathD  = "<?php echo base_url().'admin/purchases/addcartPurchase';?>";
  var deleteC = 'delete'; 
    $.ajax({
    type: "POST",
    url: path,
    data:{invoice_no:invoice_no,supplier_id:supplier_id,item_id:item_id,add_payment:re_stock,datepicker:datepicker,pay_type:pay_type,amount_paid:amount,addQuery:productIDQuery},
    beforeSend: function(){
      $("#suggesstion-box").css("background","#FFF url(comp-2.gif) no-repeat 165px");
    },
    success: function(data1){

  $.ajax({
    type: "POST",
    url: pathD,
    data:{delete:deleteC},
    beforeSend: function(){
    },
    success: function(data){
  if(data1 =="0")
      {
        window.location ='<?php echo base_url()."admin/purchases/add_purchase/inv_msg"?>';
         }else
         { 
    		cartAction('empty','');
    		window.location ='<?php echo base_url()."admin/purchases/add_purchase/msg"?>';
            } 
          }
       });
      }
    });
  })
  $('#amount').keyup(function()
  {
  	var re_stock = $('#re_stock').val();
  	var amount   = $('#amount').val();
  	if(parseInt(amount) < parseInt(re_stock) )
    {
    	$('#amount_error').show();
  	  $('#amount_error').html('the amount you have set is less than total');
  	  $('#amount_error').css('color','red');
    }else
    {
  	 $('#amount_error').hide();
    }
  })
$('#invoice_no').keyup(function(){
var path  = "<?php echo base_url().'admin/purchases/checkInvoice';?>"; 

    $.ajax({
    type: "POST",
    url: path,
    data:'invoice='+$(this).val(),
    beforeSend: function(){
    },
    success: function(data){
    	
    if(data ==1)
    {
	    $("#invoice-box").show()
      $("#invoice-box").html('invoice no already exists');
      $("#invoice-box").css("color","red");
      $('#clickPurchased').hide()
    } else
      {
  	   $('#clickPurchased').show()
        $("#invoice-box").hide()
      }
    }
  });	
})

$("#search-box").keyup(function(){
var path  = "<?php echo base_url().'admin/purchases/getItems';?>"; 
    $.ajax({
    type: "POST",
    url: path,
    data:'keyword='+$(this).val(),
    beforeSend: function(){
      $("#suggesstion-box").css("background","#FFF url(comp-2.gif) no-repeat 165px");
    },
    success: function(data){
      
      $("#suggesstion-box").show();
      $("#suggesstion-box").html(data);
       $('.searchLoading').hide();
      $("#search-box").css("background","#FFF");

         }
    });
  });

//To select country name
selectCountry = function (val,pro_id,barcode) {
  var action='add';
  var product_code =pro_id;
  cartActionBarcode(action,product_code,barcode)
$("#search-box").val('');

$("#suggesstion-box").hide();
}

 cartActionBarcode = function(action,product_code,barcode) {
   var action = 'add'; 
  quantity = "1"
  var url = "<?php echo base_url().'/admin/addcartPurchase';?>"
  $.ajax({
  url: url,
  data:{barcode:barcode,action:action,quantity:quantity},
  type: "POST",
  success:function(data){
    $("#cart-item").html(data);
  
  }
})
}

 cartActionQ = function(action,barcode,myquantity,product_code,pro_id) {
  var url = "<?php echo base_url().'admin/purchases/addcartPurchase';?>"
  var bCode = String(barcode)
  //var pCode = String(pro_id)
  if(myquantity ==''){
   
  return false;
}

  var queryString = "";
  if(action != "") {
    switch(action) {
      case "add":
        queryString = 'action='+action+'&code='+ product_code+'&quantity='+myquantity+'&barcode='+barcode+'&pro_id='+pro_id;
      break;
      case "remove":
        queryString = 'action='+action+'&code='+ product_code;
      break;
      case "empty":
        queryString = 'action='+action;
      break;
    }  
  }
     clearTimeout( $(this).data('timer') );

     var timer = setTimeout(function() {  
  jQuery.ajax({
  url: url,
  data:queryString,
  type: "POST",
  success:function(data){
    $("#cart-item").html(data);
    if(action != "") {
var temp = $('input[id^="quantity'+bCode+'"]').val();
$('input[id^="quantity'+bCode+'"]').val('');
$('input[id^="quantity'+bCode+'"]').val(temp);
$('input[id^="quantity'+bCode+'"]').focus();      
  $('input[id^="quantity'+bCode+'"]').keypress(validateNumber);      
      switch(action) {
        case "add":
//          $("#add_"+product_code).hide();
//          $("#added_"+product_code).show();
        break;
        case "remove":
          $("#add_"+barcode).show();
          $("#added_"+barcode).hide();
        break;
        case "empty":
          $(".btnAddAction").show();
          $(".btnAdded").hide();
        break;
      }  
    }
  },
  error:function (){}
  });
}, 1000);
}



 cartAction = function(action,product_code,barcode,pro_id) {
    var url = "<?php echo base_url().'admin/purchases/addcartPurchase';?>"
var a =10

  var queryString = "";
  if(action != "") {
    switch(action) {
      case "add":
        queryString = 'action='+action+'&code='+ product_code+'&quantity='+$("#qty_"+product_code).val()+"&barcode="+barcode+"&pro_id="+pro_id;
      break;
      case "remove":
        queryString = 'action='+action+'&barcode='+ barcode;
      break;
      case "empty":
        queryString = 'action='+action;
      break;
    } 
  }
  jQuery.ajax({
  url: url,
  data:queryString,
  type: "POST",
  success:function(data){
    $("#cart-item").html(data);
$('input[id^="quantity'+barcode+'"]').keypress(validateNumber);     
    
    if(action != "") {
      switch(action) {
        case "add":
//          $("#add_"+product_code).hide();
//          $("#added_"+product_code).show();
        break;
        case "remove":

          $("#add_"+barcode).show();
          $("#added_"+barcode).hide();
        break;
        case "empty":
          $(".btnAddAction").show();
          $(".btnAdded").hide();
        break;
      }  
    }
  },
  error:function (){}
  });
  //  var obj = document.createElement("audio");
  //       obj.src = "../auto_assets/sound/button-3.wav"; 
  //       obj.play(); 
  // document.getElementById('play').play();
}

 cartActionBarcode = function(action,product_code,barcode) {
    

 
 //var barcode =  $('#barcode').val()
  var action = 'add'; 
  var quantity = '1';
  var url = "<?php echo base_url().'admin/purchases/addcartPurchase';?>"
  $.ajax({
  url: url,
  data:{barcode:barcode,action:action,quantity:quantity,pro_id:product_code},
  type: "POST",
  success:function(data){
    $("#cart-item").html(data);
    var proCode = $('#productIDQuery').val()
    
    $('#addQuery').val(proCode)
  
  }
})
}

 $("#btn-hide").hide()
 $("#addmore").on("click", function() {  
 $('#supplier_id').attr("disabled", "disabled");
 	   var path = "<?= base_url().$path.'/purchases/getSupplier';?>"
	var val = $('#supplier_id').val();
   

   $.ajax({
	url: path,

			type: 'post',

			data: {id:val},

			success: function(data) {
 var add = $("#add_item").val()
 if(add ==null){  
 	return false;
 }
 $("#textboxDiv").append('<div required="" class="form-group"><label for="focusedinput" class="col-sm-2 control-label"></label><div class="col-sm-2">'+data+'</div><div class="col-sm-4"><input type="text" id="quantity" name="quantity[]" placeholder="Add Quantity" required="" class="form-control"><div class="col-sm-2"><a href="javascript:void(0)" onclick="SomeDeleteRowFunction(this)" id="remove">remove</a></div></div></div>');  
            }
            });  
			
		});


	$('#supplier_id').change(function(){
		$("#btn-hide").show()
	var getSup = $('#supplier_id').val()
	
   var path = "<?= base_url().$path.'/purchases/getSupplier';?>"

   $.ajax({
	url: path,

			type: 'post',

			data: {id:getSup},

			success: function(data) {
				

		$('#dummItem').hide()
		$("#itemadd").html('<label for="focusedinput" class="col-sm-2 control-label"></label><div class="col-sm-4">'+data+'</div><div class="col-sm-4"><input type="text" id="quantity" name="quantity" placeholder="Add Quantity" required="" class="form-control"></div>');                
            
        }
       });
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
                $('#remaining_stock').html('<div required="" class="form-group"><label for="focusedinput" class="col-sm-2 control-label">Available Quantity</label><div class="col-sm-4"><input type="text" value="'+remaining+'" name="remaining_stock" readonly=""  required="" class="form-control re_stock"/></div></div>');
                $('#item_price_1').html('<div required="" class="form-group"><label for="focusedinput" class="col-sm-2 control-label">Item Price</label><div class="col-sm-4"><input type="text" value="'+selling_price+'" name="remaining_stock"   required="" class="form-control re_stock"/></div></div>');                
            }
        });
	})



$('#discount').keyup(function(){

var url ="<?php echo base_url().$path."/sales/discount/"?>";

var discount = $('#discount').val();
var t_price = $('#t_price').val();

$.ajax({ url: url,type: 'post',data: {discount:discount,t_price:t_price},success: function(data2) { 
		        $('#net_price').html('<div required="" class="form-group"><label for="focusedinput" class="col-sm-2 control-label">net price</label><div class="col-sm-4"><input type="text" value="'+data2+'" name="net_price" readonly="" required="" class="form-control"/></div></div>');
		}
		})

})

$('#item_price').keyup(function(){
$('#total1').hide();
var url ="<?php echo base_url().$path."/sales/item_price/"?>";

var item_price = $('#item_price').val();
var quantity = $('#quantity').val();

$.ajax({ url: url,type: 'post',data: {item_price:item_price,quantity:quantity},success: function(data3) { 

		        $('#total').html('<div required="" class="form-group"><label for="focusedinput" class="col-sm-2 control-label">total Price</label><div class="col-sm-4"><input type="text" value="'+data3+'" id="t_price" name="total_price" readonly="" required="" class="form-control"/></div></div>');
		}
		})

})		


$('#quantity').keyup(function(){
var  q = $('#quantity').val();
var  re_stock = $('.re_stock').val();
var item_price = $('#item_price').val();
var quantity = $('#quantity').val();



$.ajax({ url: url,type: 'post',data: {item_price:item_price,quantity:quantity},success: function(data3) { 

		        $('#total').html('<div required="" class="form-group"><label for="focusedinput" class="col-sm-2 control-label">total Price</label><div class="col-sm-4"><input type="text" value="'+data3+'" id="t_price" name="total_price" readonly="" required="" class="form-control"/></div></div>');
		}
		})
})
})			

</script>


		<script>
			function failedRec(){
				alert("Sorry! You can't perform this operation")
			}
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
   <script type="">
   	$(document).ready(function () {
  	cartAction('','');
})

   </script>
</body>
</html>