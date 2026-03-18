<?php $this->load->view('admin/common/header');

	  $user = $this->session->userdata('userVal');
	   $path = $this->extra_lib->path; 
$gP = $this->permissions->getPermissions();
$inventory_permission  = $gP[5];

if($inventory_permission->can_view =='yes'){

}else{
	redirect('admin/dashboard');
}
	   ?>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="<?php echo base_url().'assets/css/new_style.css'; ?>">
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style type="text/css">
.widget-shadow{ margin-left: 200px; }
.btn-info{   background: #5bc0de; }
.body{
	cbp-spmenu-push cbp-spmenu-push-toright
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
                        <a class="a1" href="#"><i class="fa fa-user red"></i>  <?php echo $user['fullname']; ?></a>
                        <a class="a1" href="<?php echo base_url().'logout';?>"><i class="fa fa-sign-out red"></i>  Logout</a>
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
					<?php $msg = $this->session->flashdata('msg');
					 $msg1 = $this->session->flashdata('msg1');					 ?>
					<?php $remove = $this->session->flashdata('remove');
            			 ?>

					<div class="row">
					<div class="form-three widget-shadow" style="height: 90px;">
					<h4 class="title1">Inventory Reports  </h4>
					</div>

						<?php if($inventory): ?>
						<div class="form-three widget-shadow table-responsive">	
						<?php if($msg): ?>
						<div class="alert alert-danger" role="alert">
  						<?php	echo $msg; ?>
						</div>	
					<?php unset($_SESSION['msg']); 
						endif;?>
						<?php if($msg1): ?>
						<div class="alert alert-success" role="alert">
  						<?php	echo $msg1; ?>
						</div>	
					<?php unset($_SESSION['msg1']); endif;?>									
					<?php 

					if($this->input->server('QUERY_STRING') == "msg"):
					?>
					<div class="alert alert-success">
					  Product has been succesfully added.
					</div>					
					<?php 
		            endif; ?>
		            <a href="<?php echo base_url()?>admin/items/add_item"/><button class="btn btn-success" style="float: right;margin: 5px;margin-top: -15px;">Add New Product</button></a>					
						<table class="dataTable table table-striped table-bordered" id="employee_id">
							<thead style="background:white">
							<tr>
								<th>Sr</th>
								<th>Barcode</th>
								<th>product Name</th>
								<th>Logo</th>
								<th>Detail</th>
								<th>Location</th>
								<th>Category</th>
								<th>Brand</th>
								<th>Promo Code</th>					
								<th>Sale price</th>
								<th>Cost</th>
								<th>Unit</th>
								<th>Stock limit</th>
								<th>Stock product</th>	
								<th>Gross weight</th>
								<th>Net Weight</th>
								<th>Entry Date</th>
								<th>Expire Date</th>
								<th>Status</th>
								<th>Edit</th>
								<th>Delete</th>							</tr>
						</thead>
						<tbody>
							<?php $sr =1; foreach($inventory as $sel):  

							?>
							<tr>
								<td><?= $sr++; ?></td>
								<td><?php if($sel->barcode =="s"){ echo "N/A"; }else{
									echo substr($sel->barcode,1,100);
								} ?></td>
								<td><?= $sel->product_name; ?></td>
								<td><img src="<?php echo base_url().'assets/uploads/item_images/'.$sel->photo; ?>" alt="" style="width: 50px;height: 50px;"></td>								
								<td><?php if( $sel->comments){echo $sel->comments; } else{ echo "N/A";} ?></td>
								<td><?= $sel->location;?></td>
								<td><?= $sel->cat;?></td>
								<td><?= $sel->brandC;?></td>
								<td><?php if($sel->promo_code){ echo $sel->promo_code; }else{ echo "N/A";}?></td>

								<td><?= $sel->sale_price;?></td>
								<td><?= $sel->cost;?></td>



								<td><?= $sel->unit;?></td>
								<td><?= $sel->stock_limits;?></td>
								<td><?= $sel->stock_level;?></td>
								<td><?php if($sel->gross_weight){ echo $sel->gross_weight; } else{ echo "N/A";} ?></td>
								<td><?php if( $sel->net_weight ){ echo $sel->net_weight; } else{ echo "N/A"; } ?></td>

<td><?= $sel->entry_date; ?></td>
<td><?php if( $sel->expire_date ){ echo $sel->expire_date; } else{ echo "N/A"; } ?></td>
<td><?php if( $sel->status =='yes' ){ echo 'Active'; } else{ echo "disabled"; } ?></td>

<?php if($inventory_permission->can_edit =='yes'){ ?>
								<td><a href="<?= base_url().$path.'/inventory/edit_product/'.$sel->pro_id; ?>"><button class="btn btn-info">Edit</button></a></td>
<?php 
} else{ ?>
								<td><button onclick="failedRec(<?php echo $sel->pro_id; ?>)" class="btn btn-info">Edit</button></td>
<?php } 
		if($inventory_permission->can_delete =='yes'){ ?>
								<td><a onclick="if(confirm('Do you want to delete this product?')){ return true; } else {return false;} " href="<?= base_url().$path."/inventory/delete_product/".$sel->pro_id?>"><button class="btn btn-danger">Delete</button></a></td>	
		<?php }else{  ?>
											<td><button onclick="failedRec(<?php echo $sel->pro_id; ?>)" class="btn btn-danger">Delete</button></td>	

							<?php } ?>																													
							</tr>
						<?php endforeach; ?>
</tbody>
						</table>

						</div>						
					<?php endif; ?>
					</div>

				</div>
			</div>
		</div>
		<!--footer-->
				<div class="footer" style="margin-left: 116px;">
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
   <script type="text/javascript">
function failedRec(){
	alert('Sorry! you cant perform this operation');
}
	$(document).ready(function(){
var dataTable = $('#employee_id').dataTable({
   
   sScrollX: true, 
   aoColumns : [
    { sWidth: '100px' },
    { sWidth: '15px' },
    { sWidth: '150px' },
    { sWidth: '150px' },
    { sWidth: '50px' },    
    { sWidth: '15px' },
    { sWidth: '15px' },
    { sWidth: '15px' },
    { sWidth: '15px' },
    { sWidth: '15px' },    
    { sWidth: '15px' },
    { sWidth: '15px' },
    { sWidth: '15px' },
    { sWidth: '15px' },
    { sWidth: '15px' },
    { sWidth: '15px' },
    { sWidth: '15px' },
    { sWidth: '15px' },
    { sWidth: '15px' },
    { sWidth: '15px' },
    { sWidth: '15px' }    
  ],
              "fnInitComplete": function(){
                // Disable TBODY scoll bars
                $('.dataTables_scrollBody').css({
                    'overflow': 'hidden',
                    'border': '0'
                });
                
                // Enable TFOOT scoll bars
				 $('.dataTables_filter').css('margin-bottom','15px');                
                $('.dataTables_scrollHead').css('overflow', 'auto');
                
                // Sync TFOOT scrolling with TBODY
    
                
                $('.dataTables_scrollHead').on('scroll', function () {
                    $('.dataTables_scrollBody').scrollLeft($(this).scrollLeft());
                });
            },


});

	
	$('#cbp-spmenu-s1').addClass('cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left cbp-spmenu-open')
	$('body').addClass('cbp-spmenu-push cbp-spmenu-push-toright')
	})

</script>

</body>
</html>