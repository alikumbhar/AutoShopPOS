<?php 
 $this->load->view('admin/common/header'); 
 $path = $this->extra_lib->path;
 $user = $this->session->userdata('userVal'); 
$gP =  $this->permissions->getPermissions();
$userPermission = $gP[16]; 

if( $user['role_id'] == 1 ){

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
.btn-info{   background: #5bc0de; }
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

					<div class="row">
						<div class="form-three widget-shadow" style="height: 90px;">
						<h2 class="title1">Users List</h2>
				</div>
					<?php $msg = $this->session->flashdata('msg'); ?>
					<?php $remove = $this->session->flashdata('remove'); ?>				
				<div class="form-three widget-shadow">
					
							<form action="<?= base_url().$path.'/users/add_users';?>" method="post" class="form-horizontal">
<?php if($msg){	?>
					<div class="alert alert-success">
  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>								
							     <?=  $msg; ?><strong>!</strong>
							  </div>
						<?php	
					unset( $_SESSION['msg'] );

					} if($remove){ ?>
							<div class="alert alert-danger">
  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>									    
							     <?=  $remove; ?><strong>!</strong>
							  </div>
							  <?php unset( $_SESSION['remove'] ); } ?>									
												
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Full Name</label>
									<div class="col-sm-8">
										<input type="text" required="" name="fullname" class="form-control1">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Email</label>
									<div class="col-sm-8">
										<input type="text" required="" name="email" class="form-control1">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Password </label>
									<div class="col-sm-8">
									<input class="form-control" id="password" required="" type="password" name="password" placeholder="">
									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Confirm password </label>
									<div class="col-sm-8">
									<input class="form-control" required="" type="password" id="confirm_password"  placeholder="">
									</div>

								</div>
								<?php $rQ = $this->sc_model->getRole();?>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> User Role </label>
									<div class="col-sm-8">
									<select name="user_role" class="form-control" required="">
								<option selected="" value="">Select User Role</option>
							<?php foreach($rQ as $Q):?>
								<option value="<?= $Q->id;?>">
									<?= $Q->name;?></option>
<?php endforeach; ?>
									</select>
									<a href="<?php echo base_url().'admin/users/add_user_role';?>"><span style="margin-top:5px;" class="btn btn-sm btn-success">Add New Role</span></span></a>
									</div>

								</div>										


								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Status </label>
									<div class="col-sm-8">
									<select  name="status" class="form-control" >
									<option value="yes">Active</option>
									<option value="no">Inactive</option>
									</select>
								</div>

								</div>																																																										


								<div class="form-group mb-n" style="color:red">
									<label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp</label>
									<div class="col-sm-8">
										<input type="submit" class="btn btn-info form-control1 " id="add-btn" value="Add Users">
									</div>
								</div>
							</form>
						</div>

						<div class="form-three widget-shadow table-responsive">

							<br>							

						<table class="table table-striped table-bordered" id="employee_id">
							<thead>
							<tr>
								<td>Sr.No</td>
								<td>Full Name</td>
								<td>Email</td>
								<td>Role</td>
													
								<td>Action</td>	
								<td>Delete</td>		
																			
							</tr>
</thead>							
				<?php $num = 1; foreach ($users as $user):   ?>
							<tr>
								<td><?php echo $num++; ?></td>					
								<td><?= $user->fullname; ?></td>
								<td><?= $user->email; ?></td>
								<td><?= $user->role_name; ?></td>

								<td><a  href="<?= base_url().$path."/users/edit_users/".$user->id;?>"><span id="edit">Edit</span></a></td>
								<td><a onclick="if(confirm('do you really want to delete this users')){ return true;} else{ return false;}" href="<?= base_url().$path."/users/delete_user/".$user->id;?>"><button  class="btn btn-danger">Delete</button></a></td>

							</tr>
							<?php endforeach ?>					
						</table>
						</div>						
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
   
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){


		$('#employee_id').DataTable();
	})
</script>

  <script>

var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
        
        </script>		  