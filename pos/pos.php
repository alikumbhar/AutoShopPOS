<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("dbcontroller.php"); ?>
<head>
  <title>Automanic POS </title>
<?php 
session_start();
if(isset($_POST['email'])){

  $userLog = mysqli_query($conn,"SELECT * FROM users where email='".strip_tags($_POST['email'])."' AND user_password ='".$_POST['password']."' ");
  if (!empty($userLog)) {
    $data =array();
    foreach($userLog as $key=>$value){
    $data = $value;
    }
}

$testdata = array('id' => $data['id'],'fullname' => $data['fullname'],'email' => $data['email'], 'role_id'=>$data['role_id'],'status'=>$data['status']);

    $_SESSION['userSession'] = $testdata;
}
    $user = $_SESSION['userSession']; 

// if($user['id'] == 1 OR $user['id'] == 1){ }else{
//     header('location:../admin'); }
//  if($user['role_id'] == 2){
//   header('location:../admin/dashboard');
//  }

 ?>





<link rel="stylesheet" type="text/css" href="main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="auto_complete.js" type="text/javascript" ></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
  <script src="<?php echo '../assets/dist/sweetalert.js'; ?>" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="<?php echo '../assets/dist/sweetalert.css'; ?>">

<style type="text/css" media="screen">
 svg {
  width: 60px;
  display: block;
  margin: -6px auto 0;
}



.path {
  stroke-dasharray: 1000;
  stroke-dashoffset: 0;
  &.circle {
    -webkit-animation: dash .9s ease-in-out;
    animation: dash .9s ease-in-out;
  }
  &.line {
    stroke-dashoffset: 1000;
    -webkit-animation: dash .9s .35s ease-in-out forwards;
    animation: dash .9s .35s ease-in-out forwards;
  }
  &.check {
    stroke-dashoffset: -100;
    -webkit-animation: dash-check .9s .35s ease-in-out forwards;
    animation: dash-check .9s .35s ease-in-out forwards;
  }
}

p {
  text-align: center;
  margin: 20px 0 60px;
  font-size: 1.25em;
  &.success {
    color: #73AF55;
  }
  &.error {
    color: #D06079;
  }
}


@-webkit-keyframes dash {
  0% {
    stroke-dashoffset: 1000;
  }
  100% {
    stroke-dashoffset: 0;
  }
}

@keyframes dash {
  0% {
    stroke-dashoffset: 1000;
  }
  100% {
    stroke-dashoffset: 0;
  }
}

@-webkit-keyframes dash-check {
  0% {
    stroke-dashoffset: -100;
  }
  100% {
    stroke-dashoffset: 900;
  }
}

@keyframes dash-check {
  0% {
    stroke-dashoffset: -100;
  }
  100% {
    stroke-dashoffset: 900;
  }
}
 
</style>
</head>
<!-- navbar   
 <nav class="navbar navbar-expand-lg asdasdasd">  
 <a class="navbar-brand d-none d-xl-block d-lg-block" href="#">Home</a>
 
 
  <div class="navbar-brand dropdown d-lg-none d-xl-none">
 <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown link
  </a>
  <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
<ul class="">	
 <li class="nav-item">
     <a class="nav-link dropdown-item"  href="#">POS</a>        </li>  
	  <div class="dropdown-divider"></div>
<li class="nav-item">
    <a class="nav-link  dropdown-item" href="#">Categories</a>    
 </li>
  <div class="dropdown-divider"></div>
 <li class="nav-item"> 
    <a class="nav-link dropdown-item"  href="#">Product</a>         </li>   
	 <div class="dropdown-divider"></div>
<li class="nav-item">  
   <a class="nav-link dropdown-item"  href="#">Customer</a>       </li>  
    <div class="dropdown-divider"></div>
<li class="nav-item"> 
 <a class="nav-link dropdown-item"  href="#">Sales</a>       </li> 
  <div class="dropdown-divider"></div>
 <li class="nav-item"> 
 <a class="nav-link dropdown-item	"  href="#">Report</a>       </li> 

</ul>
  </div>
</div>
<div class="nav-link">Quick-Sale</div>
<div class="nav-link">Walk-In</div>
<div class=" d-none d-xl-block d-lg-block d-md-block"><div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"></span>
  </div>
  <input  type="text" class="form-control" placeholder="Search for item" aria-label="Search" aria-describedby="basic-addon1">
</div>
</div>
 
 
<div class="collapse navbar-collapse " id="navbarSupportedContent" style="font-family:Roboto Slab">     <ul class="navbar-nav mr-4">
 <li class="nav-item">
     <a class="nav-link"  href="#">POS</a>        </li>  
<li class="nav-item">
    <a class="nav-link " href="#">Categories</a>    
 </li>
 <li class="nav-item"> 
    <a class="nav-link "  href="#">Product</a>         </li>   
<li class="nav-item">  
   <a class="nav-link "  href="#">Customer</a>       </li>  
<li class="nav-item"> 
 <a class="nav-link "  href="#">Sales</a>       </li> 
 <li class="nav-item"> 
 <a class="nav-link "  href="#">Report</a>       </li> 
</ul> 
</div></nav>-->
<style type="text/css">
 

#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}


/* invoice css */


  #invoice-POS{
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding:2mm;
  margin: 0 auto;
  width: auto;
  background: #FFF;
  }
  
::selection {background: #f31544; color: #FFF;}
::moz-selection {background: #f31544; color: #FFF;}
h1{
  font-size: 1.5em;
  color: #222;
}
h2{font-size: 1.9em;}
h3{
  font-size: 1.9em;
  font-weight: 300;
  line-height: 2em;
}
p{
  font-size: .7em;
  color: #666;
  line-height: 1.2em;
}
 
#top, #mid,#bot{ /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
}

#top{min-height: 100px;}
#mid{min-height: 114px;} 
#bot{ min-height: 50px;}

#top .logo{
  float: left;
  height: 60px;
  width: 60px;
  background: url(./images/comp.jpg) no-repeat;
  background-size: 60px 60px;
} 
.clientlogo{
  float: left;
  height: 60px;
  width: 60px;
  background: url(./images/comp.jpg) no-repeat;
  background-size: 60px 60px;
  border-radius: 50px;
}
.info{
  font-size: 10px !important;
  line-height: 15px !important;
  display: block;
  float:left;
  margin-left: 0;
}
.info p{
  font-size: 12px;
  line-height: 1.5em;
  margin-left: 86px;
}
.info h2{
  margin-left: 99px;
  line-height: 1em;
  font-size: 21px;
} 
.title{
  float: right;
}
.title p{text-align: right;} 
table{
  width: 100%;
  border-collapse: collapse;
}
td{
/*   padding: 5px 0 5px 15px;
  border: 1px solid #EEE */
}
.modal .super-content{
overflow:hidden;
height: 90%;
}
.super-body{
height: 80%;
overflow-y:scroll; // to get scrollbar only for y axis
}
.tabletitle{
  float: right;

  background: #EEE;
}
.service{border-bottom: 1px solid #EEE;}
.item{width: auto;}
.item { font-size: 1.5em;  }
.itemtext{font-size: 12px;margin-left: -45px;}

#legalcopy{
  margin-top: 5mm;
}

</style>

<body id="test">
<div class="as" style="font-family:Roboto Slab">

  <div class="row">
    <div class="col-lg-7 col-md-8 col-sm-12 a1" style="height:  auto">
<div class="row">
  <div style="">

<?php      $customer= mysqli_query($conn,"SELECT * FROM customers");
  ?>
    <div style="width: 100px;margin: 15px;width: 520px;">
      <select class="form-control" style="width: 490px;display: inline-block;"  id="customer" name="customer">
      <option value="1">walk in customer</option>
      <?php foreach($customer as $c):
 if($c['firstname']): ?>
    <option value="<?= $c['id']; ?> "><?= $c['firstname']." ".$c['lastname']; ?></option>
      <?php endif; endforeach; ?>
      </select>

      <i data-toggle="modal"  data-target="#exampleModal" class="fa fa-user-plus" style="font-size: 20px; cursor: pointer;" aria-hidden="true"></i>

    <br>

<div class="frmSearch">
  <input style="margin-top: 10px;width: 490" type="text" id="search-box" placeholder="Enter Barcode Scanner" />
  

  <div id="suggesstion-box"></div>
</div>

    </div>
  </div>
</div>
 <div class="clear-float"></div>
<div id="shopping-cart">

<div id="cart-item"></div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-sb">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-three widget-shadow">
          
              <form action="<?php echo "../admin/customers/insertCustomerModal"?>" method="post" class="form-horizontal">

                <div class="form-group">

                <div class="col-sm-8">
                  <input type="text" required="" name="firstname" class="form-control" placeholder="First Name">
                </div>

                </div>
                <div class="form-group">
                  <div class="col-sm-8">
                    <input type="text" required="" name="lastname" class="form-control" placeholder="Last Name">
                  </div>

                </div>
                <div class="form-group">
                  <div class="col-sm-8">
                  <input class="form-control" required="" type="text" name="email" placeholder="Email">
                  </div>

                </div>
                <div class="form-group">
                  <div class="col-sm-8">
                  <input class="form-control" required="" type="text" name="mobile" placeholder="Mobile">
                  </div>

                </div>
                <div class="form-group">

                  <div class="col-sm-8">
                  <input class="form-control" type="text" name="address" required="" placeholder="Address">
                  </div>

                </div>                    
                <div class="form-group">

                  <div class="col-sm-8">
                <input class="form-control" type="text" name="postal_code" placeholder="postal">
                  </div>

                </div>
                <div class="form-group">

                  <div class="col-sm-8">
                  <input class="form-control"  type="text" name="country" placeholder="Country">
                  </div>

                </div>                



                <div class="form-group mb-n" style="color:red">
                  <label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp</label>
                  <div class="col-sm-4">
                    <input type="submit" class="btn btn-info form-control1 " id="largeinput" value="Add Customer">
                  </div>
                  
                </div>
              </form>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function () {
  cartAction('','');
})
</script>
<div style="height:15px;"></div>
	
	
	
	
	
	
	
	</div>
	
	
	<?php 
$color = array ("btn btn-md btn-outline-primary","btn btn-md btn-outline-success","btn btn-md btn-outline-danger","btn btn-md btn-outline-warning"
       );

$colorS = array ("btn btn-md btn-primary","btn btn-md btn-success","btn btn-md btn-danger","btn btn-md btn-warning"
       );



$rand_keys = array_rand($color, 2);


 
  ?>
	
    <div class="col-lg-5 col-md-4 col-sm-12 a4" style="height:  640px" ><br>
      <div>
      <a href="../admin/items/add_item"><button class="input-group-btn btn-info">Add Proucts</button></a>                    
      <button class="input-group-btn btn-success" id="sl-btn">Load Services</button>
      <button class="input-group-btn btn-primary" id="productBtn">Load Product</button>
 <a href="../admin/sales/sale_invoice"><button class="input-group-btn btn-primary" id="retrun-sale" >Return sale</button></a>      

      
      </div>
      
                          
                  
<div class="row">
  <div style="">
    <div id="categoryS" style="border: 1px solid;width: 100px;margin: 15px;width: 376px;background: black" class="btn btn-info"><span style="float: left">Categories     <i class="fa fa-desktop" id="go-button" style="float: right;margin-top: 6px;margin-left: 15px;" aria-hidden="true"></i><div id="element">
  </div></span>
</div>
    <div id="servicesS" style="border: 1px solid;width: 100px;margin: 15px;width: 376px;background: black" class="btn btn-info"><span style="float: left">Services     <i class="fa fa-desktop" id="go-button" style="float: right;margin-top: 6px;margin-left: 15px;" aria-hidden="true"></i><div id="element">
  </div></span>
</div>
     <span style="float: right;margin-top: 20px;">

<div>

<span style="background:#000;">
<img src="images/times/dg8.gif" name="hr1"><img 
src="images/times/dg8.gif" name="hr2"><img 
src="images/times/dgc.gif"><img 
src="images/times/dg8.gif" name="mn1"><img 
src="images/times/dg8.gif" name="mn2"><img 
src="images/times/dgc.gif"><img 
src="images/times/dg8.gif" name="se1"><img 
src="images/times/dg8.gif" name="se2"><img 
src="images/times/dgam.gif" name="ampm"></span>
</div>
  
    </span>
  </div>
</div>
<div id="loadCategory"> 
<?php 
  $category_array = mysqli_query($conn,"SELECT * FROM category ORDER BY category_id DESC");
  if (!empty($category_array)) { 
    foreach($category_array as $key=>$value){

$r = rand(0,1);    
?>

<button type="button" onclick="getCategoryItem('<?= $value['category_id']; ?>')" class="<?php echo $color[$rand_keys[$r]];?>"><?= $value['category']; ?></button>
<?php
    }
  }


  ?>
</div>


<div id="loadServices">
<?php 
  $category_array = mysqli_query($conn,"SELECT * FROM services ORDER BY service_id DESC");
  if (!empty($category_array)) { 
    foreach($category_array as $key=>$value){
$r = rand(0,1); 

?>



  <button type="button" class="<?php echo $colorS[$rand_keys[$r]];?>" onclick="cartActionService('add','<?php echo $value['service_id']; ?>','<?php echo $value['sp_rand']; ?>','<?php echo $value['service']; ?>','<?php echo $value['price']; ?>','<?php echo $value['discount_service']; ?>')" class="<?php echo $color[$rand_keys[$r]];?>"><?= $value['service']; ?></button>
<?php
    }
  }

  unset($rand_keys);
  unset($color)
  ?>
</div>

<hr class="style2">
    <div id="productsShow" style="border: 1px solid;width: 100px;width: 100%;background: #f70914e0" class="btn btn-info"><span title="Click here for full screen" style="float: left">Products  
</span>
</div>
<div class="categoryItem"></div>
</div>
<br>
</div>
<script>

function findTotal(){

}

/* Get into full screen */
// function GoInFullscreen(element) {
//   if(element.requestFullscreen)
//     element.requestFullscreen();
//   else if(element.mozRequestFullScreen)
//     element.mozRequestFullScreen();
//   else if(element.webkitRequestFullscreen)
//     element.webkitRequestFullscreen();
//   else if(element.msRequestFullscreen)
//     element.msRequestFullscreen();
// }

// /* Get out of full screen */
// function GoOutFullscreen() {
//   if(document.exitFullscreen)
//     document.exitFullscreen();
//   else if(document.mozCancelFullScreen)
//     document.mozCancelFullScreen();
//   else if(document.webkitExitFullscreen)
//     document.webkitExitFullscreen();
//   else if(document.msExitFullscreen)
//     document.msExitFullscreen();
// }

// /* Is currently in full screen or not */
// function IsFullScreenCurrently() {
//   var full_screen_element = document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement || null;
  
//   // If no element is in full-screen
//   if(full_screen_element === null)
//     return false;
//   else
//     return true;
// }

// $("#go-button").on('click', function() {
//   if(IsFullScreenCurrently())
//     GoOutFullscreen();
//   else
//     GoInFullscreen($("#element").get(0));
// });

// $(document).on('fullscreenchange webkitfullscreenchange mozfullscreenchange MSFullscreenChange', function() {
//   if(IsFullScreenCurrently()) {

//   }
//   else {
//     $('.a1').css('color','white');
//     $("#element span").text('Full Screen Mode Disabled');
//     $("#go-button").text('Enable Full Screen');
//   }
// });

</script>


<script>
function showEditBox(editobj,id) {
  $('#frmAdd').hide();
  $(editobj).prop('disabled','true');
  var currentMessage = $("#message_" + id + " .message-content").html();

  var editMarkUp = '<textarea rows="5" cols="80" id="txtmessage_'+id+'">'+currentMessage+'</textarea><button name="ok" onClick="callCrudAction(\'edit\','+id+')">Save</button><button name="cancel" onClick="cancelEdit(\''+currentMessage+'\','+id+')">Cancel</button>';
  $("#message_" + id + " .message-content").html(editMarkUp);
}
function cancelEdit(message,id) {
  $("#message_" + id + " .message-content").html(message);
  $('#frmAdd').show();
}

function cartActionService(action,service_id,sp_rand,service,service_price,discount) {
  $('.categoryItem').hide();
  $('#productsShow').hide();
    var queryString = "";
  if(action != "") {
    switch(action) {
      case "add":
        queryString = 'action='+action+'&service_id='+ service_id+'&sp_rand='+ sp_rand+'&service='+ service+'&service_price='+ service_price+'&discount='+ discount;
      break;
      case "remove":

        queryString = 'action='+action+'&service_id='+ service_id+'&sp_rand='+ sp_rand;
      break;
      case "empty":
        queryString = 'action='+action;
      break;
    } 
  }
  jQuery.ajax({
  url: "action_services.php",
  data:queryString,
  type: "POST",
  success:function(data){
    $("#cart-item").html(data);
    if(action != "") {
      switch(action) {
        case "add":
//          $("#add_"+product_code).hide();
//          $("#added_"+product_code).show();
        break;
        case "remove":
          $("#add_"+service).show();
          $("#added_"+service).hide();
        break;
        case "empty":
          $(".btnAddAction").show();
          $(".btnAdded").hide();
        break;
      }  
    }
  },
  error:function (){}
  });
}

function cartActionServiceQ(action,myquantity,product_code) {
  var bCode = String(barcode)
  //var pCode = String(pro_id)
  var queryString = "";
  if(action != "") {
    switch(action) {
      case "add":
        queryString = 'action='+action+'&code='+ product_code+'&quantity='+myquantity;
      break;
      case "remove":
        queryString = 'action='+action+'&code='+ product_code;
      break;
      case "empty":
        queryString = 'action='+action;
      break;
    }  
  }
  jQuery.ajax({
  url: "action_services.php",
  data:queryString,
  type: "POST",
  success:function(data){
    $("#cart-item").html(data);
    if(action != "") {
      switch(action) {
        case "add":
//          $("#add_"+product_code).hide();
//          $("#added_"+product_code).show();
        break;
        case "remove":
          $("#add_"+barcode).show();
          $("#added_"+barcode).hide();
        break;
        case "empty":
          $(".btnAddAction").show();
          $(".btnAdded").hide();
        break;
      }  
    }
  },
  error:function (){}
  });
}


function deleteSaleReturn(action,empt,invoice_id) {
  var queryString = "";
  if(action != "") {
    switch(action) {

      case "remove":
        queryString = 'action='+action+'&inv_id='+ invoice_id;
      break;
      case "empty":
        queryString = 'action='+action;
      break;
    } 
  }
  jQuery.ajax({
  url: "<?php echo '../admin/sales/get_sale_return'; ?>",
  data:queryString,
  type: "POST",
  success:function(data){
     $("#cart-item").html(data);
      $("#cartMessage").hide()
     if(action != "") {
      switch(action) {
        case "add":
//          $("#add_"+product_code).hide();
//          $("#added_"+product_code).show();
        break;
        case "remove":
          $("#add_"+barcode).show();
          $("#added_"+barcode).hide();
        break;
        case "empty":
          $(".btnAddAction").show();
          $(".btnAdded").hide();
        break;
      }  
    }
  },
  error:function (){}
  });
}



function cartAction(action,product_code,barcode,pro_id) {
  

var a =10
if(a == 10){
  var checQuantity =   $('body').find('input[id="pro_stock' + pro_id + '"]').val();
    if(parseInt(checQuantity) < 1 ){
      $('.error').text('Sorry! This item is out of stock')
      //$('#messageStock').modal('show');
      swal(
  'Sorry!',
  'This item is out of stock',
  'error'
);
      return false;
      }
}
  var queryString = "";
  if(action != "") {
    switch(action) {
      case "add":
        queryString = 'action='+action+'&code='+ product_code+'&quantity='+$("#qty_"+product_code).val()+"&barcode="+barcode+"&pro_id="+pro_id;
      break;
      case "remove":
        queryString = 'action='+action+'&barcode='+ barcode;
      break;
      case "empty":
        queryString = 'action='+action;
      break;
    } 
  }
  jQuery.ajax({
  url: "ajax_action.php",
  data:queryString,
  type: "POST",
  success:function(data){
    $("#cart-item").html(data);
    if(action != "") {
      switch(action) {
        case "add":
//          $("#add_"+product_code).hide();
//          $("#added_"+product_code).show();
        break;
        case "remove":
          $("#add_"+barcode).show();
          $("#added_"+barcode).hide();
        break;
        case "empty":
          $(".btnAddAction").show();
          $(".btnAdded").hide();
        break;
      }  
    }
  },
  error:function (){}
  });
}

function cartActionQ(action,barcode,myquantity,product_code,pro_id) {
  var bCode = String(barcode)
  //var pCode = String(pro_id)
var a =10
if(a == 10){
  var checQuantity =   $('body').find('input[id="stock_limits' + pro_id + '"]').val();

    if(parseInt(myquantity) > parseInt(checQuantity) ){
       
      $('.error').html('Quantity Exceed. <br /> you have '+ checQuantity+' quantity left for this  item');
      //$('#messageStock').modal('show');

swal(
  'Quantity Exceed!',
  'You have only '+ checQuantity+' quantity left for this  item.',
  'error'
);
      $('#quantity'+bCode).val('1'); 



      return false;
      }
}

  var queryString = "";
  if(action != "") {
    switch(action) {
      case "add":
        queryString = 'action='+action+'&code='+ product_code+'&quantity='+myquantity+'&barcode='+barcode+'&pro_id='+pro_id;
      break;
      case "remove":
        queryString = 'action='+action+'&code='+ product_code;
      break;
      case "empty":
        queryString = 'action='+action;
      break;
    }  
  }
  jQuery.ajax({
  url: "ajax_action.php",
  data:queryString,
  type: "POST",
  success:function(data){
    $("#cart-item").html(data);
    if(action != "") {
      switch(action) {
        case "add":
//          $("#add_"+product_code).hide();
//          $("#added_"+product_code).show();
        break;
        case "remove":
          $("#add_"+barcode).show();
          $("#added_"+barcode).hide();
        break;
        case "empty":
          $(".btnAddAction").show();
          $(".btnAdded").hide();
        break;
      }  
    }
  },
  error:function (){}
  });
}

function cartActionBarcode(action,product_code,barcode) {
    

 var barcode =  $('#barcode').val()
  var action = 'add'; 
  $.ajax({
  url: "ajax_action.php",
  data:{barcode:barcode,action:action},
  type: "POST",
  success:function(data){
    $("#cart-item").html(data);
  
  }
})
}


function getCategoryItem(id) {

url ='products.php';
$.ajax({
  type: 'POST',
  url: url,
  data: {id:id},
  success: function(data) {

$('.categoryItem').html(data);
}

});
}
function getServiceItem(id) {

url ='services.php';
$.ajax({
  type: 'POST',
  url: url,
  data: {id:id},
  success: function(data) {

$('.categoryItem').html(data);
}

});
}

function cartActionBarcode(action,product_code,barcode) {
  var action = 'add'; 
  quantity = "1"
  $.ajax({
  url: "ajax_action.php",
  data:{barcode:barcode,action:action,quantity:quantity},
  type: "POST",
  success:function(data){
    $("#cart-item").html(data);
  
  }
})
}

$(document).ready(function(){
  
$('#searchSale').keyup(function(){

    $.ajax({
    type: "POST",
    url: "<?php echo '../admin/sales/get_sale_return'; ?>",
    data:'keyword='+$(this).val(),
    beforeSend: function(){
      $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
    },
    success: function(data){
      $("#suggesstion-box").html(data);
      $('#cartMessage').hide();
      
      $("#search-box").css("background","#FFF");
    }
    }); 
  })
  $("#search-box").keyup(function(){
    $.ajax({
    type: "POST",
    url: "autocomplete.php",
    data:'keyword='+$(this).val(),
    beforeSend: function(){
      $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
    },
    success: function(data){
      $("#suggesstion-box").show();
      $("#suggesstion-box").html(data);
      $("#search-box").css("background","#FFF");
    }
    });
  });
});
//To select country name
function selectCountry(val,barcode) {
  var action='add';
  var product_code ='';
  cartActionBarcode(action,product_code,barcode)
$("#search-box").val(val);
$("#suggesstion-box").hide();
}

tzOffset = 5;

dg = new Array();
dg[0]=new Image();dg[0].src="images/times/dg0.gif";
dg[1]=new Image();dg[1].src="images/times/dg1.gif";
dg[2]=new Image();dg[2].src="images/times/dg2.gif";
dg[3]=new Image();dg[3].src="images/times/dg3.gif";
dg[4]=new Image();dg[4].src="images/times/dg4.gif";
dg[5]=new Image();dg[5].src="images/times/dg5.gif";
dg[6]=new Image();dg[6].src="images/times/dg6.gif";
dg[7]=new Image();dg[7].src="images/times/dg7.gif";
dg[8]=new Image();dg[8].src="images/times/dg8.gif";
dg[9]=new Image();dg[9].src="images/times/dg9.gif";
dgam=new Image();dgam.src="images/times/dgam.gif";
dgpm=new Image();dgpm.src="images/times/dgpm.gif";

function dotime(){ 
  var d=new Date();
  var dx = d.toGMTString();
  dx = dx.substr(0,dx.length -3);
  d.setTime(Date.parse(dx))
  d.setHours(d.getHours() + tzOffset);

  var hr=d.getHours(),mn=d.getMinutes(),se=d.getSeconds();

  // set AM or PM
  document.ampm.src=((hr<12)?dgam.src:dgpm.src);

  // adjust from 24hr clock
  if(hr==0){hr=12;}
  else if(hr>12){hr-=12;}

  document.hr1.src = getSrc(hr,10);
  document.hr2.src = getSrc(hr,1);
  document.mn1.src = getSrc(mn,10);
  document.mn2.src = getSrc(mn,1);
  document.se1.src = getSrc(se,10);
  document.se2.src = getSrc(se,1);
}

function getSrc(digit,index){
  return dg[(Math.floor(digit/index)%10)].src;
}

window.onload=function(){
  dotime();
  setInterval(dotime,1000);
}


  $(document).ready(function(){
   
    $('#sb').click(function(){ 
    
   var url = "../admin/sales/add_sale_invoice";   
      var Query = $('#Query').val();    
      var QuantityList = $('#getQuantityList').val();
      var proID = $('#getproductIDList').val();
      var productIDQuery = $('#productIDQuery').val();
      var proNames = $('#getproductNamesList').val();
      var PayM = $('#payment_method').val()
      var paid = $('#paid').val();
      var pro_id = $('#pro_id').val();
      
      var customer  = $('#customer').val();
      var customerName  =      $( "#customer option:selected" ).text();
      var total = $('#total').text();
      var discount = $('#in_discount').val();
    
    var arr = document.getElementsByName('quantity');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);

    }
    var quantity =  tot - 4;
    	
  $.ajax({
    type: "POST",
    url: url,
    data:{PayM:PayM,paid:paid,pro_id:pro_id,quantity:quantity,customer:customer,total:total,discount:discount,product_names:proNames,customerName:customerName,Query:Query,proID:proID,QuantityList:QuantityList,proQuery:productIDQuery},
    beforeSend: function(){
      $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
    },
    success: function(data){

     $('#paymentAdd').modal('hide');
  $('#myModal').modal({
    backdrop: 'static',
    keyboard: false
    })

   cartActionQ('empty','');
      $("#suggesstion-box").show();
      $("#suggesstion-box").html(data);
      $("#search-box").css("background","#FFF");
    
    }
    });

    })
//another methods for ajax with sevrice

    $('#sb-service').click(function(){ 
    
      var url = "../admin/sales/add_service_invoice";   
      var productIDQuery = $('#productIDQuery').val();
      var PayM = $('#payment_method').val()
      var paid = $('#paidService').val();
      var customer  = $('#customer').val();
      var customerName  =      $( "#customer option:selected" ).text();
      var total = $('#total').text();
      var discount = $('#in_discount').val();
    
      
  $.ajax({
    type: "POST",
    url: url,
    data:{PayM:PayM,paid:paid,customer:customer,total:total,discount:discount,customerName:customerName,proQuery:productIDQuery},
    beforeSend: function(){
      $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
    },
    success: function(data){
    cartActionService('empty','')
    $('#myModal').modal('hide');
    $('#paymentAdd').modal('hide');
    
   cartActionQ('empty','');
      $("#suggesstion-box").show();
      $("#suggesstion-box").html(data);
      $("#search-box").css("background","#FFF");
    
    }
    });

    })
    //end of service method    
  })


function PrintElem(elem)
    {

        Popup($(elem).html());
    
    }

    function Popup(data)
    {
        // var mywindow = window.open('', 'new div', 'height=400,width=600');
        // mywindow.document.write('<html><head><title>Print PAySlip</title>');
        // mywindow.document.write('<link rel="stylesheet" href="../assets/admin/css/print.css" type="text/css" media=\"print\"/> ');
        // mywindow.document.write('</head><body >');
        // mywindow.document.write(cdata);
        // mywindow.document.write('</body></html>');

        // mywindow.print();
        // mywindow.close();

        // return true;


var mywindow = window.open('', 'new div', 'height=400,width=600');
      mywindow.document.write('<html><head><title></title>');
      mywindow.document.write("<link rel=\"stylesheet\" type=\"text/css\"  href=\"print.css\">");
      mywindow.document.write('</head><body >');
      mywindow.document.write(data);
      mywindow.document.write('</body></html>');
      mywindow.document.close();
      mywindow.focus();
      setTimeout(function(){mywindow.print();},2000);
      mywindow.print();
      mywindow.close();

      return true;

    }




$(document).ready(function(){
  // Fill modal with content from link href
$("#myModal").on("show.bs.modal", function(e) {
    var link = $(e.relatedTarget);
    $(this).find(".modal-body").load(link.attr("href"));
});

$('#servicesS').hide();
$('#loadServices').hide();
$('#productBtn').hide();
$('#sl-btn').click(function(){
    cartActionService();
  $('.categoryItem').hide();
  $('#productsShow').hide();
$('#servicesS').show();
$('#categoryS').hide();
$('#loadCategory').hide();
$('#productBtn').show();
$('#loadServices').show();
$('#sl-btn').hide();
})

// $('#loadreturn').hide();
// $('#retrun-sale').click(function(){
// $('#categoryS').show();
// $('#servicesS').hide();
// $('#loadCategory').hide();
// $('#loadreturn').show();
// $('#productBtn').show();
// $('#loadServices').hide();
// $('#sl-btn').show();
// $('#retrun-sale').show();
// })

$('#productBtn').click(function(){
  
  cartAction();
  $('.categoryItem').show();
  $('#productsShow').show();
$('#categoryS').show();
$('#servicesS').hide();
$('#loadCategory').show();
$('#productBtn').hide();
$('#loadServices').hide();
$('#sl-btn').show();

})



})


</script>
<script>
$(document).ready(function(){ 

  var elem = document.getElementById("test");

    elem.onclick = function() {
        req = elem.requestFullScreen || elem.webkitRequestFullScreen || elem.mozRequestFullScreen;
$('#go-button').click(function(){
        req.call(elem);
  })
    }






})
    </script>


<!-- Link trigger modal -->


<!-- Default bootstrap modal example -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content super-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
      <div class="modal-body super-body">
    
        ...
      </div>
      <div class="modal-footer">
                    <button type="button" onclick="PrintElem('#invoice-POS')"  name="button" class="btn btn-primary pull-right print_btn" style="margin-top: -2%;font-size: 50px;">
                  <span class="fa fa-print"></span>
                </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal for opayment -->
<div class="modal fade" id="paymentAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-three widget-shadow">
          

                <div class="form-group">

                <div class="col-sm-8">
                <select name="payment_method" class="form-control" id="payment_method">
                  
                  <option value="cash">cash</option>
                  <option value="credit card">Credit Card</option>
                  <option value="Cheque">Cheque</option>         
                </select>
                </div>

                </div>
                <div class="form-group">
                  <div class="col-sm-8">
                    <input type="text" id="paid"  name="paid" class="form-control" placeholder="Paid ">
                  </div>

                </div>
                

                </div>                    
 


                <div class="form-group mb-n" style="color:red">
                  <label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp</label>
                  <div class="col-sm-4">
               <button class="btn-xs btn-info" id="sb"> <a href='getPrint.php' data-toggle="modal" data-target="#myModal" data-remote="false" class="btn btn-default">
            Submit</a></button>


                  </div>
                  
                </div>
              
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- end modal payment -->




<!-- Modal for start payment service sale -->
<div class="modal fade" id="paymentAddService" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Service Payment </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-three widget-shadow">
          

                <div class="form-group">

                <div class="col-sm-8">
                <select name="payment_method" class="form-control" id="payment_method">
                  
                  <option value="cash">cash</option>
                  <option value="credit card">Credit Card</option>
                  <option value="Cheque">Cheque</option>         
                </select>
                </div>

                </div>
                <div class="form-group">
                  <div class="col-sm-8">
                    <input type="text" id="paidService"  name="paid" class="form-control" placeholder="Paid ">
                  </div>

                </div>
                

                </div>                    
 


                <div class="form-group mb-n" style="color:red">
                  <label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp</label>
                  <div class="col-sm-4">
               

               <button class="btn-xs btn-info" id="sb-service"> <a href='getPrint_service.php' data-toggle="modal" data-target="#myModal" data-remote="false" class="btn btn-default">
            Submit</a></button>            

                  </div>
                  
                </div>
              
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- end modal payment for service sale -->


<!-- Modal for messageStockAlert -->
<div class="modal fade" id="messageStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" >
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-sm">
      <div class="modal-header" style="background: blue;">
        <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-three widget-shadow">
       


<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
  <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
  <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
  <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
</svg>
<p class="error"></p>
            </div>

      </div>

    </div>
  </div>
</div>


<!-- end modal message stock alert -->



<!-- Modal for stock exceed -->
<div class="modal fade" id="messageQuantity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: blue;">
        <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-three widget-shadow">
       


<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
  <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
  <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
  <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
</svg>
<p class="error"> </p>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- end modal message stock exceed -->


<!-- Start invoic modal -->
<div class="modal fade" id="print_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h2 style="text-align: center"></h2></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<div id="invoice-POS" style="text-align: center;">
    
    <center id="top">
      <div class="logo"></div>

    </center><!--End InvoiceTop-->
<!--    runQuery('SELECT psv.*,p.pro_id,p.product_name,ci.firstname FROM products p,customers ci,product_sale_invoice psv 
   WHERE psv.product_id = p.pro_id
   ORDER  BY id_inv DESC
   LIMIT 0,1
   ');
    ?> -->
    <div id="mid">
      <div class="info">

        <h2>AutoManic</h2>

        <p> 

            Address : Gulberg Green ISB</br>
            Email   : abc@gmail.com</br>
            Phone   : 555-555-5555</br>
        </p>
      </div>
    </div><!--End Invoice Mid-->
                
              <div id="bot">
          <div id="table">
            <table>
              <tr class="tabletitle">

        <tr>


<!--                 <td class="item"><h5>Product Name</h5></td>
 -->            <td class="item"><h5>ITEM</h5></td>
                <td class="Hours"><h5>QTY</h5></td>
                <td class="Hours"><h5>Discount</h5></td>

              </tr>


  <?php
    foreach ($_SESSION["cart_item"] as $item){

?>
              <tr class="service">
                             <td class="tableitem"><p class="itemtext" id="product_name"><?php echo $item["product_name"]; ?></p></td>
                <td class="tableitem"><p class="itemtext" id="pro_quantity"><?php echo $item["quantity"]; ?></p></td>

<?php } ?>                            

                     <td class="Hours"><h5>10</h5></td>
                   </tr>



              <tr class="tabletitle">
                <td></td>
                <td class="Rate"><h2>Total</h2></td>
                <td class="tableitem"><p class="itemtext"></p></td>    
              </tr>

            </table>
          </div><!--End Table-->

          <div id="legalcopy">
            <p class="legal">
              <strong>Powered By </strong>Techobites islamabad</p>
          </div>

        </div><!--End InvoiceBot-->
  </div><!--End Invoice-->

            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


</body>