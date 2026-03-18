 <?php $this->load->view('admin/common/header'); 
 $user = $this->session->userdata('userVal');     
 $path = $this->extra_lib->path; 

$gP =  $this->permissions->getPermissions();




$userPermission = $gP[2]; 


if($userPermission->can_view == 'yes'){
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

.btn-info{	 background: #5bc0de; }
.btn-dangers{ background: gray; }
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

		<!-- main content start-->

		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<?php $msg = $this->session->flashdata('msg'); ?>
					<?php $remove = $this->session->flashdata('remove'); ?>
					<div class="row">



						<div class="form-three widget-shadow table-responsive">	
        <div class="col-md-12">
<nav aria-label="breadcrumb" >
  <ol class="breadcrumb" style="background: red !important;">
    <li  class="breadcrumb-item active" ><span class="fa fa-warning blink_me" style="color:white"></span> <a href="<?php echo base_url('admin').'/inventory/alerts';?>"><span class="text-bold text-uppercase">Stock Alerts</span></a></li>
  </ol>
</nav>
            <div class="table-responsive">
            <table class="table table-bordered table-striped " id="employee_id">
              <thead>
                <tr>
                <th style="background: #bb0f0f;color:white">Category Name</th>
                <th style="background: #bb0f0f;color:white">Product Name</th>
                <th style="background: #bb0f0f;color:white">Stock</th>
                <th style="background: #bb0f0f;color:white">Action</th>                
                </tr>
              </thead>

                
                <tbody>
                <?php foreach($stockLimits as $stock):


                      ?>

                <tr>
                    <td class="bold"><?= $stock->category; ?></td>
                    <td class="bold"><?= $stock->product_name; ?></td>
                    <td class="bold blink_me"><?= $stock->stock_level; ?></td>

				<td>
					<a href="<?php echo base_url('admin/inventory/edit_product').'/'.$stock->pro_id; ?>">Edit</a>
				</td>
                </tr>

            <?php endforeach; ?>
              </tbody>


            </table>
            </div>
            <br>
        </div>        
         
		
						</div>						
					<?php //endif; ?>						
					
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
			function failedRec(){
				alert("Sorry! you can't perform this operation");
			}

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
</script>

</body>
</html>