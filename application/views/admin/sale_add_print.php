<?php $this->load->view('admin/common/header'); ?>

<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css' />

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

  	 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">

<?php $this->view('admin/common/left-sidebar.php');?>
	</div>
		<!--left-fixed -navigation-->
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
					<?php $remove = $this->session->flashdata('remove');
					?>
					<div class="row">
					<div class="form-three widget-shadow" style="height: 90px;">
					<h2 class="title1" style="margin-bottom:50px ">sale invoice  </h2>
					</div>



				<div class="col-md-12 invoice_print" id="yourdiv" style="margin-top: 50px;">

						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3>Invoice</h3> 
								<span type="button" onclick="PrintElem('#yourdiv')"  name="button" class="btn btn-primary pull-right print_btn" style="margin-top: -5%;">
									<span class="fa fa-print fa-3x "></span>
								</button>
								</div> 
								<?php $dateIn = date('Y-m-d', strtotime($sale_reports->dated_created)); ?>
								<div id="div1" class="panel-body">
									<span class="pull-left left">Invoice No:<input type="text" name="" required="required" readonly="readonly" value="<?= $sale_reports->invoice_no; ?>" class="invoiceNo">
									</span> 
									<span class="pull-right right">Date:<input type="text" name="" required="required" readonly="readonly" value="<?= $dateIn ?>" class="invoiceDate">
									</span> 
									<div class="text-center company_info"><div class="logo" style="display: inline-block; vertical-align: top; margin-top: 6px;margin-left:200px;">
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
       	<input type="text" name="customerName" required="required" readonly="readonly" value="<?= $sale_reports->firstname." ".$sale_reports->lastname;?>" class="customerName"> 
       	<span class="customer_name"></span>
       	<br> <span>Customer Address:</span>
       	<input type="text" name="customerAddress" required="required" readonly="readonly" value="<?= $sale_reports->address; ?>" class="customerAddress"> 
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
				<td><input style="width: 120px;border: 0px solid;" type="text" id="invoice_no" value="<?= $sale_reports->invoice_no; ?>" readonly=""></td>					
					<td><input style="width: 120px;border: 0px solid;" type="text" id="in_quantity" value="<?= $sale_reports->stock_quantity; ?>" readonly=""></td>
					<td><input id="in_item_name" style="width: 120px;border: 0px solid;" type="text" value="<?= $sale_reports->item_name ?>" readonly=""></td>
					<td><input style="width: 120px;border: 0px solid;" type="text" id="in_selling_price" value="<?= $sale_reports->selling_price; ?>" readonly=""></td>
					<td><input style="width: 120px;border: 0px solid;" type="text" id="in_total_price" value="<?= $sale_reports->total_price;?>" readonly=""></td>
					
				</tr>
       			</tbody><tfoot><tr>
       			 	<td colspan="5" style="text-align: right;"><h4>Delivery Charge:</h4></td> 
       			 	<td>
       			 		<input type="text" id="delivery" name="delivery" value="<?= $sale_reports->delivery_charges ?>" class="form-control delivery"> 
       			 		<span id="deliveryCharge" class="deliveryCharge"></span>
       			 	</td>
       			 </tr>
       			  <tr>
       			  	<td colspan="5" style="text-align: right;">
       			  		<h4>Total amount</h4>
       			  	</td> 
       			  	<?php $t  =  $sale_reports->delivery_charges + $sale_reports->total_price;
       			  	   ?>
       			  	<td>
       			  		<span class="total_Amount"><?= $t ?></span>
       			  	</td></tr> <tr>
       			  		<td colspan="5" style="text-align: right;"><h4>Discount:</h4></td> 
       			  		<td>
       			  			<input type="text" name="reduced" id="reduce" value="<?= $sale_reports->discount_item_price; ?>" readonly="" class="form-control reduce">
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
       			   	 <td><span id="netAmount" class="netAmount"><?= $sale_reports->net_price; ?></span></td></tr>
       			   	  <tr><td colspan="3" style="text-align: right;"><h4>Payment method</h4>
       			   	  </td> 
       			   	  <td><select name="payment_method" id="payment_method" class="form-control payment_method">
       			   	  	<option value="paid"><?= $sale_reports->payment_method;?></option>
       			   	  </select> <span class="payment_methodText"></span></td> 
       			   	  <td>
       			   	  	<h4>Paid amount</h4>
       			   	  </td> 
       			   	  <td><input type="number" id="paidamounts" name="paid_amount" value="<?= $sale_reports->total_paid; ?>" readonly="" class="form-control paid_amount"> 
       			   	  	<span class="paid_amountText"></span>
       			   	  </td>
       			   	</tr> 
       			   	<tr><td colspan="5" style="text-align: right;"><h4>Amount Due:</h4>
       			   	</td> 
       			   	<td>
       			   		<span class="due"><?= $sale_reports->total_due; ?></span>
       			   	</td>
       			   </tr>
       			   	<tr><td colspan="5" style="text-align: right;"><h4></h4>
       			   	</td> 
       			   	<td>
       			   	</td>
       			   </tr>       			   
       			</tfoot>
       		</table> 
       		<div class="invoiceFooter text-center">
       			<span>TechoBytes</span></div>
       		</div>
       	</div>
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
	
	
		<script src='<?php echo base_url()."assets/admin/js/"?>SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="<?php echo base_url()."assets/admin/js/"?>classie.js"></script>
<script type="text/javascript">
    function PrintElem(elem)
    {

        Popup($(elem).html());
    
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'new div', 'height=400,width=600');
        mywindow.document.write('<html><head><title></title>');
        mywindow.document.write('<link rel="stylesheet" href="<?= base_url();?>assets/admin/css/style.css" type="text/css" media=\"print\"/> ');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;


    }

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