<?php 
	$this->load->view('admin/common/header'); 
 	$user = $this->session->userdata('userVal'); 
	$gP =  $this->permissions->getPermissions();
	$userPermission = $gP[6]; 

	if($userPermission->can_view == 'yes')
	{
	}else
	{
    redirect('admin/dashboard');
	}
	if($userPermission->can_edit == 'yes')
	{
	}else
	{
    redirect('admin/dashboard');
	}	
?>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css' />
 <link rel="stylesheet" href="<?php echo base_url().'assets/css/new_style.css'; ?>">
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url().'assets/dist/sweetalert.js'; ?>" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="<?php echo  base_url().'assets/dist/sweetalert.css'; ?>">                     	
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style type="text/css">
.btn-info{	 background: #5bc0de; }
.btn-danger1{
	background: gray;
	color: white;
}
.sy{ margin-top: 5px; }
</style>
					<?php $path = $this->extra_lib->path; ?>
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
                        <a class="a1" href="#"><i class="fa fa-user red"></i> <?php echo $user['fullname'];?></a>
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
				<?php if($expenseID){  $ser = $expenseID[0];
				  ?> 
					<div class="row">
					<div class="form-three widget-shadow" style="height: 90px;">
					<h2 class="title1">Edit Customer  </h2>
					</div>
<div class="form-three widget-shadow">
							<form action="<?= base_url().$path.'/expenditure/update_expense';?>" method="post" class="form-horizontal">
								
																<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Ref No *</label>
								<div class="col-sm-8">
							<input type="number" required="" value="<?php echo $ser->ref_no; ?>" name="ref_no" class="form-control1">
								</div>

								</div>
								<?php $ExpCat = $this->sc_model->getExpcategory();
								$sessMe = $this->session->userdata('userVal'); 
								?>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Expense Category *</label>
									<div class="col-sm-8">
									<input type="hidden" name="expn_id" value="<?= $ser->expn_id ?>">
									<select class="form-control" name="exp_category">
								<option value="">--Select Expense Category--</option>
									<?php  

									foreach ($ExpCat as $mCat): 
										if($ser->category == $mCat->category){
										?>
										<option selected="" value="<?= $mCat->category;?>"><?= ucfirst($mCat->category); ?></option>
										<?php } else{ ?>
										<option selected="" value="<?= $mCat->category;?>"><?= ucfirst($mCat->category); ?></option>					<?php						
										} endforeach; ?>
									</select>
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> What For* </label>
									<div class="col-sm-8">
									<input class="form-control" required="" type="text" value="<?php echo $ser->what_for; ?>" name="what_for" placeholder="">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Amount * </label>
									<div class="col-sm-8">
									<input class="form-control" required="" type="number" value="<?php echo $ser->amount; ?>" name="amount" placeholder="">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> is_returnable * </label>
									<div class="col-sm-8">
										<select name="is_returnable" class="form-control">
											<option>Please Select</option>
											<?php if($ser->is_returnable == 'yes'){ ?>
											<option selected="" value="yes">Yes</option>
										<option value="yes">No</option>											
											<?php } else{ ?>
											<option selected="" value="no">No</option>
										<option value="yes">Yes</option>													
											<?php } ?>			
										</select>
									</div>

								</div>										
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Notes </label>
									<div class="col-sm-8">
									<input class="form-control" type="text" value="<?php echo $ser->notes;?>" name="notes" placeholder="">
									</div>

								</div>																																																							

								<div class="form-group mb-n" style="color:red">
									<label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp</label>
									<div class="col-sm-8">
										<input type="submit" class="btn btn-info form-control1 " id="largeinput" value="Update Customer">
									</div>
								</div>
							</form>
			<?php } else{ redirect('admin/expenditure'); } ?>
						</div>						

					</div>

				</div>

			</div>
		</div>
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