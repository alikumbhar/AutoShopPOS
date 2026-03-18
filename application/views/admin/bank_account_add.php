<?php $this->load->view('admin/common/header'); 
$path = $this->extra_lib->path;
$user = $this->session->userdata('userVal'); 
$gP =  $this->permissions->getPermissions();
$userPermission = $gP[13]; 

if($userPermission->can_view == 'yes'){
}else{
    redirect('admin/dashboard');
}
?>

<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css' />

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

 <link rel="stylesheet" href="<?php echo base_url().'assets/css/new_style.css'; ?>">  	 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


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
						<h2 class="title1">Add Bank Account</h2>
				</div>
					<?php $msg = $this->session->flashdata('msg'); ?>
					<?php $remove = $this->session->flashdata('remove');  ?>				
				<div class="form-three widget-shadow">
					
							<form action="<?= base_url().$path.'/banking/insertBank';?>" method="post" class="form-horizontal" enctype="multipart/form-data">
<?php if($msg){	?>
					<div class="alert alert-success">
  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>								
							     <?=  $msg; ?><strong>!</strong>
							  </div>
						<?php	
							unset($_SESSION['msg']);							} if($remove){ ?>
							<div class="alert alert-danger">
  						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>									    
							     <?php  print_r($remove); ?><strong>!</strong>
							  </div>
							  <?php 							unset($_SESSION['remove']); }
 ?>									


								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Account Name</label>
									<div class="col-sm-8">
										<input type="text" required="" name="payee_name" value="" class="form-control1">

									</div>

								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Account No</label>
									<div class="col-sm-8">
										<input type="text" required=""  name="account_no" value="" class="form-control1">

									</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Bank Name</label>
									<div class="col-sm-8">
										<input type="text" required="" name="bank_name" value="" class="form-control1">

									</div>

								</div>								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Date</label>
									<div class="col-sm-8">
										<input type="text" id="datepicker" required="" name="account_created_date" value="" class="form-control1">

									</div>

								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Discription</label>
									<div class="col-sm-8">
										<input type="text" required="" name="bank_detail" value="" class="form-control1">

									</div>

								</div>																
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Amount</label>
									<div class="col-sm-8">
										<input type="text" id="amount" required="" name="amount" value="" class="form-control1">

									</div>

								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Payment Method</label>
									<div class="col-sm-8">
									<select name="payment_method" class="form-control">
										<option value="card">Card</option>
										<option value="bank">Bank</option>
															
									</select>

									</div>

								</div>										
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Reference</label>
									<div class="col-sm-8">
										<input type="text" required="" name="reference" value="" class="form-control1">

									</div>

								</div>
<!-- 								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Attachment</label>
									<div class="col-sm-8">
										<input type="file">

									</div>

								</div> -->


								<?php if($userPermission->can_add == 'yes'){ ?>
								<div class="form-group mb-n" style="color:red">
									<label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp</label>
									<div class="col-sm-8">
										<input type="submit" class="btn btn-info form-control1 " id="add-btn" value="Add BANK">
									</div>
								</div>	
								<?php } else{ ?>
								<div class="form-group mb-n" style="color:red">
									<label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp</label>
									<div class="col-sm-8">
										<button class="btn btn-info form-control1 " onclick="failedRec()">Add Bank</button>
									</div>
								</div>								  
							<?php } ?>
								</div>									
							</form>

								<?php if($bank):  ?>
						<div class="form-three widget-shadow table-responsive">	
						<table class="table table-bordered" id="employee_id">
							<thead>
								<tr>
								<th>Sr.No</th>
								<th>Account Name</th>								
								<th>Bank Name</th>
								<th>Bank Account</th>
								<th>Bank Detail</th>				
								<th>Edit</th>
								<th>Delete</th>										
							</tr>	
							</thead>
							<?php  $sr =1; foreach($bank as $b): ?>
							<tr>
								<td><?= $sr++; ?></td>
								<td><?= $b->payee_name; ?></td>													
								<td><?= $b->bank_name; ?></td>
								<td><?= $b->account_no; ?></td>

								<td><?= $b->bank_detail; ?></td>
							<?php if($userPermission->can_edit =='yes'){ ?> 
								<td><a href="<?= base_url().$path.'/banking/edit_bank/'.$b->id; ?>"><button class="btn btn-info">Edit</button></a></td>
							<?php } else { ?>
								<td><button onclick="failedRec()" class="btn btn-info">Edit</button></td>
								<?php } ?>
							<?php if($userPermission->can_delete =='yes'){ ?> 																
								<td><a onclick="if(confirm('Do you want to delete this ?')){ return true; } else {return false;} " href="<?= base_url().$path."/settings/delete_bank/".$b->id?>"><button class="btn btn-danger">Delete</button></a></td>
								<?php } else { ?>
<td><button onclick="failedRec()" class="btn btn-danger">Delete</button></td>									
								<?php } ?>																																
							</tr>

						<?php endforeach; ?>
						</table>

						</div>						
					<?php endif; ?>
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
	function failedRec(){
		alert('Sorry! you cant perform this operation');
	}	
	$(document).ready(function(){
	$('#employee_id').DataTable();



$('input[id^="amount"]').keypress(validateNumber);

function validateNumber(event) {

    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
        return true;
    }
};

	})
</script>