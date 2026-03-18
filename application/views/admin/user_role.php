<?php $this->load->view('admin/common/header'); 
$path = $this->extra_lib->path;
$user = $this->session->userdata('userVal');
$gP =  $this->permissions->getPermissions();
  

  if($this->uri->segment(5) =='Administrator' && $user['role_id'] == 1 ){
  ?> <script>
    $(document).ready(function(){
    $('.c1').attr('checked',true)
    $('.c1').attr('disabled',true)
    })
  </script>    
<?php   
  }     
?>
<style type="text/css">
  .alert-purple { border-color: #694D9F;background: #694D9F;color: #fff; }
.alert-info-alt { border-color: #B4E1E4;background: #81c7e1;color: #fff; }
.alert-danger-alt { border-color: #B63E5A;background: #E26868;color: #fff; }
.alert-warning-alt { border-color: #F3F3EB;background: #E9CEAC;color: #fff; }
.alert-success-alt { border-color: #19B99A;background: #20A286;color: #fff; }
.glyphicon { margin-right:10px; }
.alert a {color: gold;}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}
.add{ position:fixed; top:2%; right:2%; }

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
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
<?php $this->view('admin/common/left-sidebar.php');
    $role = $this->uri->segment(5);
    $role_id = $this->uri->segment(4);

    ?>
        <!-- main content start-->		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">

					<div class="row">
						<div class="form-three widget-shadow" style="height: 90px;">
						<h2 class="title1">Set User Role Permissions   </h2>
				</div>
				
				<div class="form-three widget-shadow">
					<div class="modal-body ng-scope" id="modal-body"><div bind-html-compile="rawHtml">	


  

  <div class="box-body">
    <div class="form-group">
      <label for="name" class="col-sm-3 control-label">
Role Name      </label>
      <div class="col-sm-7">
        <input type="text" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty ng-valid-required" id="name" ng-model="usergroupName" ng-init="usergroupName='admin1'" value="<?php echo $role; ?>" disabled='' name="name" required="">
      </div>

<a href="<?php echo base_url('admin/users/add_user_role');?>"><button class="btn btn-info" style="text-align: right">Go Back</button></a>
    </div>


    <hr>

        <h2 class="pull-left">
          <b>Set Permissions for All pages</b>
        </h2>
        <br>


    <hr>

  <div class="row">
  <div class="add"></div>
    <div class="col-md-12" style="margin-left: 50px;" >
   
    <?php

  
     $i =0;

     foreach($pages as $r1){  


       ?>

      <h2 class="alert-danger-alt" style="font-size: 30px; "><strong style="margin-left: 20px;color:#191b1a"><?php print_r(ucwords(str_replace('_', ' ', $r1->page))); ?></strong></h2>
      <div>
<div><br>
        <span class="margin-r">can view &nbsp&nbsp</span>
        <label class="switch">
          <?php if($r1->can_view== 'yes'){ ?>
          <input type="checkbox" id="can_view" class="c1" name="switch" value="<?php echo $r1->page.','.$role.','.$r1->page_id.','.$role_id; ?>" checked=''>
          <?php } else{ ?>
          <input type="checkbox" id="can_view" class="c1" name="switch" value="<?php echo $r1->page.','.$role.','.$r1->page_id.','.$role_id; ?>" >
          <?php } ?>            
          <span class="slider round"></span>
        </label>
     </div>
     <div>
      <br>
        <span class="margin-r">can add &nbsp&nbsp&nbsp</span>
        <label class="switch">
          <?php if($r1->can_add== 'yes'){ ?>          
          <input type="checkbox" id="can_add" class="c1" name="switch" value="<?php echo $r1->page.','.$role.','.$r1->page_id.','.$role_id; ?>" checked=''>
        <?php } else{ ?>
          <input type="checkbox" id="can_add" class="c1" name="switch" value="<?php echo $r1->page.','.$role.','.$r1->page_id.','.$role_id; ?>" >      <?php } ?>
        <span class="slider round"></span>
        </label>
        </div>
        <div>
          <br>
        <span class="margin-r">can edit &nbsp&nbsp&nbsp&nbsp</span>
        <label class="switch">
          <?php if($r1->can_edit== 'yes'){ ?>            
            <input type="checkbox" id="can_edit" class="c1" name="switch" value="<?php echo $r1->page.','.$role.','.$r1->page_id.','.$role_id; ?>" checked="">
          <?php } else { ?>
            <input type="checkbox" id="can_edit" class="c1" name="switch" value="<?php echo $r1->page.','.$role.','.$r1->page_id.','.$role_id; ?>" >
            <?php } ?>            
        <span class="slider round"></span>
        </label>
      </div>
      <div>
        <br><span class="margin-r">can delete </span> 
        <label class="switch">
          <?php if($r1->can_delete== 'yes'){ ?>          
            <input type="checkbox" id="can_delete" class="c1" name="switch" value="<?php echo $r1->page.','.$role.','.$r1->page_id.','.$role_id; ?>" checked="">
          <?php } else{ ?>
            <input type="checkbox" id="can_delete" class="c1" name="switch" value="<?php echo $r1->page.','.$role.','.$r1->page_id.','.$role_id; ?>" >
          <?php } ?>
        <span class="slider round"></span>
        </label>
       </div>
       <br> 
      </div>  
    
    <?php } ?>
    </div>
          
</div>    

						
					</div>

				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer" >
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

   <script src="<?php echo base_url()."assets/admin/js/"?>bootstrap.js"> </script>
   
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){


		$('#employee_id').DataTable();
	})
</script>

<script>
  $(document).ready(function(){ 
  function runEffect() {

                var selectedEffect = 'blind';

                var options = {};

                $(".add").hide(selectedEffect, options, 500);
            };

  $('.c1').change(function(){
         setTimeout(function() {
        $(".add").hide('blind', {}, 50)
    }, 5000);
var checkboxValue = $(this).prop('checked');
cb = checkboxValue.toString();

if(cb =='true'){
cb ='yes'
}else{
cb ='no'
}
var v = $(this).val()

var ids = $(this).attr('id');

let arr = v.split(',');
var pageName  =  arr[0];
var Role  =  arr[1];

var pageID  =  arr[2];
var roleID  =  arr[3];

var urls = '<?php echo base_url('admin/users/add_role_permission');?>'
    var ac = cb
if(ac =='yes'){
  ac = 'the desired accessibility has been enabled'
}else{
  ac = 'the desired accessibility has been <strong>disabled</strong>'
}

    $.ajax({
        type:"POST",
        url:urls,
        data:{cb:cb,pageName:pageName,Role:Role,ids:ids,pageID:pageID,roleID:roleID},
        success:function(response){   
            $('.add').html('<div class="alert alert-danger-alt alert-dismissable"><span class="glyphicon glyphicon-certificate"></span>                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> ×</button><strong> '+ac+'!</strong></div>');
        $('.add').show();
        }


    });


  })
});


</script>


