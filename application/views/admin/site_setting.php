<?php $this->load->view('admin/common/header'); 
$path = $this->extra_lib->path;
$user = $this->session->userdata('userVal'); 
 

 $gP =  $this->permissions->getPermissions();




$userPermission = $gP[15]; 



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
.btn-danger{
	background: gray;
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
				<div class="forms">


					<div class="row">
						<div class="form-three widget-shadow" style="height: 90px;">
						<h2 class="title1">Site Setting</h2>
				</div>
					<?php $msg = $this->session->flashdata('msg'); ?>
					<?php $removed = $this->session->flashdata('removed');  ?>				
				<div class="form-three widget-shadow">
					
							<form action="<?= base_url().$path.'/settings/set_thumbs';?>" method="post" class="form-horizontal" enctype="multipart/form-data">
<?php if($msg){	?>
					<div class="alert alert-success">
  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>								
							     <?=  $msg; ?><strong>!</strong>
							  </div>
						<?php	
						 unset($_SESSION['msg']);	} if($removed){ ?>
							<div class="alert alert-danger">
  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>									    
							     <?php  print_r($removed['error']); unset($_SESSION['removed']); ?><strong>!</strong>
							  </div>
							  <?php }
 ?>									
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"></label>
									<div class="col-md-4">
										

									<img style="width: 120px;height: 120px;margin-bottom: 10px;" src="<?php echo base_url().'assets/uploads/'.$setting->site_logo;?>" alt="">
									<input type="file" name="userfile" style="" >
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Company Name</label>
									<div class="col-sm-8">
										<input type="text" required="" name="company_name" value="<?= $setting->site_name ?>" class="form-control1">
										<input type="hidden" value="<?= $setting->id ?>" name="id">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Address</label>
									<div class="col-sm-8">
										<textarea name="address" style="height: 80px; width: 660px"  class="form-control1"><?= $setting->address ?></textarea>  
									</div>

								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Fax</label>
									<div class="col-sm-8">
										<input type="text" value="<?= $setting->fax ?>" required="" name="fax" class="form-control1">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Telephone</label>
									<div class="col-sm-8">
										<input type="text" value="<?= $setting->telephone ?>" required="" name="telephone" class="form-control1">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Footer text - copy right</label>
									<div class="col-sm-8">
										<input type="text" value="<?= $setting->footer_text ?>" required="" name="footer_text" class="form-control1">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Currency</label>

									<div class="col-sm-8">
										<select name="currency" class="form-control" >
										<?php foreach($currency as $cr):
											if($setting->currency == $cr->c_code ){ ?>
											<option selected="" value="<?php echo $cr->c_code; ?>">
												<?php echo $cr->c_code.' - '.$cr->c_name;?></option>
											<?php } else{  ?>
										<option value="<?php echo $cr->c_code;?>">
												<?php echo $cr->c_code.' - '.$cr->c_name;?>
												
										</option>						<?php } endforeach; ?>	
									</select>

									</div>

								</div>																
								<div class="form-group mb-n" style="color:red">
									<label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp</label>
<?php if($userPermission->can_add == 'yes'){ ?>
									<div class="col-sm-8">
										<input type="submit" class="btn btn-info form-control1 " id="add-btn" value="Update Site Settings">
									</div>
<?php 
	} 
	else 
		{ ?> 
									<div class="col-sm-8">
										<span onclick="failedREc()" class="btn btn-danger form-control1">Update Site Settings
										</span>
									</div>		
		<?php } 
?>									

								</div>	


								</div>									
							</form>
</div>
		<!--footer-->
		<div class="footer" style="">
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
	function failedREc(){
		alert("Sorry! you can't perform this operation.")
		return false;
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
   
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){


		$('#employee_id').DataTable();
	})
</script>