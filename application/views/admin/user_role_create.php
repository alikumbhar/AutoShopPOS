<?php $this->load->view('admin/common/header'); 
$path = $this->extra_lib->path;
$user = $this->session->userdata('userVal'); 
$gP =  $this->permissions->getPermissions();
//$userPermission = $gP[19]; 
    if($user['role_name'] =='Administrator' || $user['role_id'] == 1 ){

    } else{
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
                        <a class="a1" href=""><i class="fa fa-user red"></i>  <?php echo $user['fullname']; ?></a>
                        <a class="a1" href="<?php echo base_url('logout');?>"><i class="fa fa-sign-out red"></i>  Logout</a>
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
						<h2 class="title1">Users Groups</h2>
				</div>
				
				<div class="form-three widget-shadow">
					<div class="modal-body ng-scope" id="modal-body"><div bind-html-compile="rawHtml">	

<form class="form-horizontal ng-pristine ng-valid ng-scope ng-valid-required" id="user-group-form" action="<?php echo base_url('admin/users/add_role') ?>" method="post">
  

  
  <div class="box-body">
    <div class="form-group">
      <label for="name" class="col-sm-3 control-label">Role Name      </label>
      <div class="col-sm-7">
        <input type="text" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-required" id="name" ng-model="usergroupName" ng-init="usergroupName='admin1'" value="" name="role_name" required="">
      </div>
    </div>


    <hr>



    <hr>

    

  </div>
  <div class="box-footer">
    <div class="form-group">
      <div class="col-sm-12 text-center">
        <button data-form="#user-group-form" data-datatable="#user-group-list" class="btn btn-lg btn-info user-group-update"  data-loading-text="Updating...">
          <span class="fa fa-fw fa-pencil"></span>
          Create Role        </button>
      </div>
    </div>
  </div>
</form></div></div>

						</div>

						
					</div>

				</div>
                    <div class="form-three widget-shadow table-responsive">

              <br>              

            <table class="table table-striped table-bordered" id="employee_id">
              <thead>
              <tr>
                <td>Sr.No</td>
                <td>Full Name</td>
                          
                <td>Action</td>
                <td>Edit Permissions</td> 
                <td>Delete</td>   
                                      
              </tr>
</thead>              
        <?php 

        $num = 1; 
        foreach ($roles as $userR ):  
         
         ?>
              <tr>
                <td><?php echo $num++; ?></td>          
                <td><?= $userR->name; ?></td>

                <td><a  href="<?= base_url().$path."/users/user_roles_edit/".$userR->role_id;?>"><span id="edit">Edit Roles</span></a></td>
                <td><a class="btn btn-info"  href="<?= base_url().$path."/users/user_roles/".$userR->role_id.'/'.$userR->name;;?>"><span id="edit">Set Permissions</span></a></td>                
                <td><a onclick="if(confirm('do you really want to delete this Role')){ return true;} else{ return false;}" href="<?= base_url().$path."/users/delete_roles/".$userR->role_id;?>"><button  class="btn btn-danger">Delete</button></a></td>

              </tr>
              <?php endforeach ?>         
            </table>
            </div>  
			</div>
		</div>
		<!--footer-->
		<div class="footer" style="margin-left: 116px;">
		   <p>	&copy; 2019 - Techobites - All Rights Reserved Techobites.com
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