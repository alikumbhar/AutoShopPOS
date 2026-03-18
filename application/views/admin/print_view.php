<?php 
        $this->load->view('admin/common/header'); 
          $path = $this->extra_lib->path;
          $user = $this->session->userdata('userVal'); 
$userPermission = $this->session->userdata('userPermission'); 
$permission     = $this->permissions->getPermissions();
?>
<link href="<?php echo base_url().'assets/admin/css/adminLTE.min.css';?>" rel='stylesheet' type='text/css' />
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css' />

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

 <link rel="stylesheet" href="<?php echo base_url().'assets/css/new_style.css'; ?>">


  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style type="text/css">
.container{ width: 1070px; }
.btn-info{   background: #5bc0de; }
h1{ width: 220px; }
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
            <!----dashboard----->
				<div class="forms">
					<?php $msg = $this->session->flashdata('msg'); ?>
					<?php $remove = $this->session->flashdata('remove');
					?>
					<div class="row">

<?php 



	  ?>


				<div class="col-md-12 invoice_print" id="yourdiv" style="margin-top: 50px;">

						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3>Invoice</h3> 
								<span type="button" onclick="PrintElem('#yourdiv')"  name="button" class="btn btn-primary pull-right print_btn" style="margin-top: -5%;">
									<span class="fa fa-print fa-3x "></span>
								</button>
								</div> 
								<?php 


                foreach ($sale_reportz as $sale_reports) {
                  $product_name[] = $sale_reports->product_name;
                  $quantity[] = $sale_reports->quantity;
                  $pro_price[] = $sale_reports->sale_price;
                  $paid = $sale_reports->paid;
                  $discount = $sale_reports->discount;
                  $invoice = $sale_reports->id_inv;
                  $dateIn = date('Y-m-d', strtotime($sale_reports->sale_date));
                } 


                ?>
								
                <div id="div1" class="panel-body">
									 
									<div class="text-center company_info">
    								<div class="info" style="display: inline-block;">
									<span class="companyName" style="font-size: 30px; font-weight: bold;"><?php echo $this->footer->getSettingFooter('name');?>
									</span>
								</div>
                <br><br>
<span class="pull-left left">
                    <b>Invoice No:</b>
                    <span><?= "#000".$invoice; ?></span>
                  </span> 
                  <span class="pull-right right"><b>Date: </b><?= $dateIn ?>
                  </span>                

								 
      </div>
       <div class="text-center company_info">
       	<input type="hidden" name="customerID" value="" class="customerID_text"> 
<br>
       	<span><b>Customer Name:</b></span>
       	<span><?= $sale_reports->firstname." ".$sale_reports->lastname;?></span> 
       	<span class="customer_name"></span>
       	<br> <span><b>Customer Address:</b></span>
       	<span><?php echo $sale_reports->address; ?></span> 
       	<span class="customer_address"></span>
       </div> 
       <table id="invoiceTable" class="table table-bordered">
       	<tbody>
       		<tr>
       			<th>Quantity</th>
       			 <th>Product Name</th>
       			  <th>Price(unit)</th>
       			   <th>Total Price</th>
       			    <th>Discount</th>
       			     <th>Net Price</th>
       			 
       			 </tr>
<?php $netP = 40;// =  $sale_reports->total_price -  $sale_reports->discount_item_price; ?>
				<tr>
					<td>
             <?php foreach($quantity as $q){ ?>
              <br />
              <input style="width: 120px;border: 0px solid;" type="text" id="in_quantity" value="<?= $q; ?>" readonly="">
            <?php } ?>
            </td>
              <td><?php foreach($product_name as $name){ ?>
              <br />
            <span ><?= $name; ?></span>
          <?php } ?>
        </td>
        
					<td>
            <?php foreach($pro_price as $pro_pric) {?>
            <br />
            <input style="width: 120px;border: 0px solid;" type="text" id="in_selling_price" value="<?= $pro_pric; ?>" readonly="">
            <?php } ?></td>
					<td><input style="width: 120px;border: 0px solid;" type="text" id="in_total_price" value="<?= (int) $paid+ (int) $discount;?>" readonly=""></td>
					<td><input id="in_discount" style="width: 120px;border: 0px solid;" type="text" value="<?= $discount; ?>" readonly=""></td>
					<td><input id="in_net_price" style="width: 120px;border: 0px solid;" type="text" value="<?=  $paid; ?>" readonly=""></td>
				</tr>
       			</tbody>
       		</table> 
       		<div class="invoiceFooter text-center">
       			<span>       <p>  <?= $this->footer->getSettingFooter();?>
      </p></span></div>
       		</div>
       	</div>
   </div>							

				
				
					</div>

				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		         <p>  <?= $this->footer->getSettingFooter();?>
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
        var mywindow = window.open('', 'Easy Point Of Sale View', 'height=400,width=600');
        mywindow.document.write('<html><head><title></title>');
        mywindow.document.write('<link rel="stylesheet" href="<?= base_url();?>assets/admin/css/style.css" type="text/css" media="print"  /> ');
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