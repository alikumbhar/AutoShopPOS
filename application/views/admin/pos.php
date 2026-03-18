<?php $user = $this->session->userdata('userVal'); 
      $currency = $this->footer->getSettingFooter('co');
if(!empty($user)){

}else{
  redirect('logout');
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Auto-Talk - Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'pos/'?>css/stylesheet.css">
  <link rel="icon" href="<?php echo base_url().'pos/'?>pics/logo.png" type="image/x-icon"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!--   <script src="../assets/js/jquery-2.2.3.min.js" type="text/javascript" charset="utf-8" async defer></script> -->
<script src="https://suite.ultimatekode.com/focus/js/printThis.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'pos/'; ?>main.css">  
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/js/'; ?>chosen.css?<?php echo rand(1000,5005632); ?>">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url().'assets/js/choosen.js';?>"></script>  
  <link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
  <script src="<?php echo base_url().'assets/dist/sweetalert.js'; ?>" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/dist/sweetalert.css'; ?>">  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <link rel="stylesheet" href="<?php echo base_url().'assets/css/'?>SimpleCalculadorajQuery.css">
   <script src="<?php echo base_url().'assets/js/'?>SimpleCalculadorajQuery.js"></script>

<style>
@font-face {
font-family: "CustomFont";
src: url("/fonts/MYRIADPRO-BOLD.OTF");
}

.imgScs{
  margin-bottom:10px; 
} 
.select-div{
  margin-left: 25px;
  margin-top: 25px;
}
.select_box{
  width: 250px;
  overflow: hidden;
  position: relative;
  padding: 10px 0;
  
}
.inputm { margin-top: 10px; }
.select_box:after{
  width: 0; 
  height: 0; 
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-top: 6px solid #f00;
  position: absolute;
  top: 40%;
  right: 15px;
  content: "";
  z-index: 98;
 }
.select_box select{
  width: 220px;
  border : 0px;
  position: relative;
  z-index: 99;
  background: none;
}
.selectOp {
    background: red;
}
.clearboth{
  clear: both
}


.box{
  width: auto;
  height: 100px;

  margin-top: 10px;
}
.category_box{
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 100%;
  height:  auto;
  margin-top: 10px;
  border-left: 6px solid transparent;
  background: white;  
}



.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 100px;
  height: 100px;
  margin-top: 10px;
  border-left: 6px solid transparent;
  background: #C62828;

}
.c_hour{
  width: 80px;
  padding: 0px;
  margin-left: -5px;
  border-bottom: 1px solid white;
  color: white;
  font-weight: bold;
  text-align: center;
  background: #ab1515;
}


.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* .btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  margin-left: 5px;
  margin-top: 5px;
  cursor: pointer;
}

/* Darker background on mouse-over 
.btn:hover {
  background-color: RoyalBlue;
} */
.cart_class{
  padding: 0px;
  margin:  0px;
  margin-top: 10px; 
  color: red;
}
.items{
  color: black;
}
.footer{
  height: 40px;
  background: red;

}
.setC{
  font-family: CustomFont;
  margin-top: 10px;
  float: right;
  color: black;
  margin-right: 150px;
  font-size: 12px;
  font-weight: bold
}
.t-image{ width:20px;margin-top: 10px; }
h1 {
  font-weight: normal;
}

li {
  display: inline-block;
  font-size: 1.5em;
  list-style-type: none;
  padding: 1em;
  text-transform: uppercase;
  background: red;
}
#hours{ height: 90px;   }
#minutes{ height: 75px; }
#seconds{ height: 50px; }
li span {
  display: block;
  font-size: 4.5rem;
}
.searchLoading {
    background: url('images/loader.gif') no-repeat ;
    position: absolute;
    top: 82px;
    left: 230px;
    height: 10%;
    width: 10%;
}
.thisC{
  overflow-y: scroll;min-height: 100px;height: 500px;
}
</style>
</head>
<body>



  <!-- Modal -->
  <div class="modal fade" id="myModals" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Calculator</h4>
        </div>
        <div class="modal-body">
            <div id="idCalculadora"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>  
<div class="container-fluid maindiv">
  <!-----header---->
  <div class="container-fluid maindiv2">
    <div class="row">
      <div class="col-md-3">
        <img class="logo" src="<?php echo base_url().'pos/'?>pics/logo.png">
      </div>
      <div class="col-md-5"></div>
      <div class="col-md-4">
        <div class="row ">
          <div class="col-md-4"></div>
          <div class="col-md-8 anchor">
            <a class="" href="#"><i class="fa fa-user"></i>  <?php echo $user['fullname']; ?></a>
            <a class="" href="logout.php"><i class="fa fa-sign-out"></i>  Log Out</a>
          </div>
        </div>
        <img class="autotalk imgScs" src="<?php echo base_url().'pos/'?>pics/autotalk.png">
      </div>
    </div>    
  </div>
  <!-----header---->

<!----dashboard----->
<!-- <div class="container-fluid showcase" >
<div class="row dashboard" >
  <div class="col-md-12">
    <h1>Dashboard</h1>
    <ul>
      <li><i class="fa fa-file"></i> POS</li>
      <li><i class="fa fa-star"></i> Product</li>
      <li><i class="fa fa-wrench"></i> Service</li>
      <li><i class="fa fa-file"></i> Report</li>
    </ul>

    <p>Contact Information
    <br>email@mydomain.com<br>
    +92 51 2225-6632</p>

  </div>
  
</div> -->
<!----dashboard----->
  <?php 
$color = array ("btn btn-md btn-outline-primary","btn btn-md btn-outline-success","btn btn-md btn-outline-danger","btn btn-md btn-outline-warning"
       );
$colorS = array ("btn btn-md btn-primary","btn btn-md btn-success","btn btn-md btn-danger","btn btn-md btn-warning"
       );
$rand_keys = array_rand($color, 2);
  ?>
  <div class="row">
    <div class=" col-md-4 ">
           
            <div id="idCalculadora"></div>
    </div>



  </div>
  <div class="container white">
    <div class="row ">
      <div class="col-md-6" style="padding: 5px;">

        <select class="form-control" name="customer" id="customer" style="width: 500px;margin-top: 0px">
          
      <option value="1">walk in customers</option>
      <?php $userCustomer = $this->sc_model->runQuery4POSCustomer(); ?>
      <?php foreach($userCustomer as $c):
     if($c['firstname']): ?>
    <option value="<?= $c['id']; ?> "><?= $c['firstname']." ".$c['lastname']; ?></option>
      <?php endif; endforeach; ?>
        </select>
        <i data-toggle="modal" data-target="#exampleModal" class="fa fa-user-plus" style="font-size: 20px; cursor: pointer;margin-top: 10px;" aria-hidden="true"></i>
        <div class="">
        <div class="searchLoading"></div>
        <input type="text" id="search-box" placeholder="Enter Barcode Scanner or product name" class="form-control"  style="width: 500px;margin-top: 10px;">
          <div id="suggesstion-box"></div>
        </div>
        
      <div class="cart_class">
        <div class="items">
  <div id="cart-item"></div>
        
        </div>
      </div>
      </div>
      <div class="col-md-6">
  <a href="<?php echo base_url()?>admin/items/add_item"><button class="btn btn-info" style="margin-left: -10px;margin-top: 10px;width: 110px;">Add Products</button></a> 
  <a href="<?php echo base_url()?>admin/inventory"><button class="btn btn-info" style="margin-left: -10px;margin-top: 10px;width: 110px;">Inventory</button></a>              
          <a href="<?php echo base_url()?>admin/dashboard"><button class="btn btn-info" style="float:left;width: 110px;margin-left: 14px;margin-top: 10px;">Home</button></a>
   <button class="btn btn-info" data-toggle="modal" data-target="#myModals" style="margin-top: 10px;margin-right: 15px;margin-left: -12px;">Calculator</button>
          <a href="<?php echo base_url()?>admin/sales/sale_history"><button class="btn btn-info" style="width: 110px;margin-left: -24px;margin-top: 10px;">Sale Reports</button></a>   
<!--       <div class="box"> -->

<!-- <ul>

    <li>Hours<span id="hours"></span></li>
    <li>Mins<span id="minutes"></span></li>
    <li>Sec<span id="seconds"></span></li>
  </ul>    -->        
      <?php
  $queryC ='SELECT * FROM category ORDER BY category_id DESC';
  $category_array = $this->sc_model->runQuery4POSCategory($queryC);
  ?>    
    <div class="clearboth"></div>
        <div class="col-md-3" style="margin-top: 5px"> 
        <select id="getCategoryItem" style="width: 500px;" class="form-control chosen"  name="">
      <option value="">Select Products</option>
<?php    foreach($category_array as $key=>$value){ ?>
          <option value="<?php echo $value['category_id']; ?>"><?= $value['category']; ?></option>
<?php } ?>
        </select>

</div>

<br><br>

<div class="col-md-3">  

        <input type="" class="form-control" style="width: 501px;" id="filter" value="" placeholder="filter items">
        </div>

    <div class="clearboth"></div>
    <div class="row" style="margin:0px;">
      

<!--     load service -->
<div id="loadServices">

<?php
  unset($rand_keys);
  unset($color)
  ?>
</div>
<!-- load service end -->

        
    </div>
<hr>
    <div class="category_box">
      <div class="btns">
      </div>
    </div>        
  </div>      
</div>
</div>
</div>
</div>

</div>
  <div class="main-container footer">
    <div class="col-md-2"></div>
    <div class="col-md-6"><img src="<?php echo base_url().'pos/';?>pics/fb.png" class="t-image">   &nbsp&nbsp<img src="<?php echo base_url().'pos/';?>pics/tw.png" class="t-image"> &nbsp&nbsp  <img src="<?php echo base_url().'pos/';?>pics/in.png" class="t-image" ></div>
    <div class="col-md-4"><p class="setC">Copyright &#169; 2019 AutoTalk</p></div>    
  </div>
</body>
</html>
<script>
  function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}

var today = new Date(); 
function startTime(){
var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
    var s = today.getSeconds();
  // add a zero in front of numbers<10
  m = checkTime(m);
  s = checkTime(s);
        document.getElementById('hours').innerText = h,
        document.getElementById('minutes').innerText = m,
        document.getElementById('seconds').innerText = s;
      

  t = setTimeout(function() {
    startTime();
  }, 500);
}
startTime();

</script>

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
  $(".chosen").chosen();


  $("#customer").click(function() {
     $(".chosen").chosen("destroy");
    $("#customer").chosen();
    });
$(".chosen").click(function() {
   $("#customer").chosen("destroy");
   $(".chosen").chosen();

 })


$(document).ready(function(){
   $('.category_box').show();
  $('#pro_services').change(function(){
    var pro_service = $('#pro_services').val()
    if(pro_service =='category'){
        $('.category_box').show();
      $('#loadCategory').show();
      $('#loadServices').hide();
    }
    if(pro_service =='Services'){
      $('.category_box').hide();
      $('#loadCategory').hide();
      $('#loadServices').show();
      
    }
  })
})


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
  url: "<?php echo base_url().'pos/';?>action_services.php",
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
  url: "<?php echo base_url().'pos/'?>ajax_action.php",
  data:queryString,
  type: "POST",
  success:function(data){
    $("#cart-item").html(data);
$('input[id^="quantity'+barcode+'"]').keypress(validateNumber);     

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
  //  var obj = document.createElement("audio");
  //       obj.src = "../auto_assets/sound/button-3.wav"; 
  //       obj.play(); 
  // document.getElementById('play').play();
}
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
function cartActionQ(action,barcode,myquantity,product_code,pro_id) {
  var bCode = String(barcode)
  //var pCode = String(pro_id)
  if(myquantity ==''){
   
  return false;
}
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


        var obj = document.createElement("audio");
        obj.src = "../auto_assets/sound/beep-03.wav"; 
        obj.play(); 
  document.getElementById('play').play();
      return false;

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
     clearTimeout( $(this).data('timer') );

     var timer = setTimeout(function() {  
  jQuery.ajax({
  url: "<?php echo base_url().'pos/'?>ajax_action.php",
  data:queryString,
  type: "POST",
  success:function(data){
    $("#cart-item").html(data);
    if(action != "") {
var temp = $('input[id^="quantity'+bCode+'"]').val();
$('input[id^="quantity'+bCode+'"]').val('');
$('input[id^="quantity'+bCode+'"]').val(temp);
$('input[id^="quantity'+bCode+'"]').focus();      
  $('input[id^="quantity'+bCode+'"]').keypress(validateNumber);      
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
}, 1000);
}

function cartActionBarcode(action,product_code,barcode) {
    

 var barcode =  $('#barcode').val()
  var action = 'add'; 
  $.ajax({
  url: "<?php echo base_url().'pos/'?>ajax_action.php",
  data:{barcode:barcode,action:action},
  type: "POST",
  success:function(data){
    $("#cart-item").html(data);
  
  }
})
}


function getCategoryItem(id) {

url ='<?php echo base_url().'pos/'?>products.php';
$.ajax({
  type: 'POST',
  url: url,
  data: {id:id},
  success: function(data) {

$('.btns').html(data);

}

});
}
function getServiceItem(id) {

url ='<?php echo base_url().'pos/'?>services.php';
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
  url: "<?php echo base_url().'pos/'?>ajax_action.php",
  data:{barcode:barcode,action:action,quantity:quantity},
  type: "POST",
  success:function(data){
    $("#cart-item").html(data);
  
  }
})
}

$(document).ready(function(){
$("#filter").on("keyup", function() {
 var id = $('#getCategoryItem').val();
 var keyword = $('#filter').val(); 
 var action  = 'findMe' 
  url ='<?php echo base_url().'pos/'?>products.php';
$.ajax({
  type: 'POST',
  url: url,
  data: {id:id,keyword:keyword,action:action},
  beforeSend: function(){
    $("#filter").css("background","#fff url(<?php echo base_url(),'assets/';?>/wait_loader.gif) no-repeat 465px");
    },
  success: function(data) {
  $('.btns').html(data);
  $("#filter").css("background","#FFF");
}

});
});

$('#getCategoryItem').change(function(){
  var id = $('#getCategoryItem').val();
  url ='<?php echo base_url().'pos/'?>products.php';
$.ajax({
  type: 'POST',
  url: url,
  data: {id:id},
  success: function(data) {

$('.btns').html(data);

}

});
})

        $('.searchLoading').hide(); 
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
     $('.searchLoading').show();
    $.ajax({
    type: "POST",
    url: "<?php echo base_url().'pos/'?>autocomplete.php",
    data:'keyword='+$(this).val(),
    beforeSend: function(){
      $("#search-box").css("background","#FFF url(<?php echo base_url().'assets/wait_loader.gif'?>) no-repeat 205px");
    },
    success: function(data){
      
      $("#suggesstion-box").show();
      $("#suggesstion-box").html(data);
       $('.searchLoading').hide();
      $("#search-box").css("background","#FFF");

      
    }
    });
  });
});
//To select country name
function selectCountry(val,barcode,Stock) {
  if(Stock ==0  || Stock < 1){
  $('.error').text('Sorry! This item is out of stock')
      //$('#messageStock').modal('show');
      swal(
  'Sorry!',
  'This item is out of stock',
  'error'
);
    $("#search-box").val('');
    return false;
  }
  var action='add';
  var product_code ='';
  cartActionBarcode(action,product_code,barcode)
$("#search-box").val('');
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
    
  var url = "<?php echo base_url().'admin/sales/add_sale_invoice'; ?>";   
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
      if(PayM ==''){
        alert('please select payment method');
        return false;
      }

      if(customer ==1 && PayM =='credit'){
          $('.error').text('Sorry! This item is out of stock')
      //$('#messageStock').modal('show');
      swal(
  'Sorry!',
  'Walk in Customer is not allowed to purchased any thing on credit',
  'error'
);
        return false;
      } 

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
  cartAction('empty','');
  // $('#myModal').modal({
  //   backdrop: 'static',
  //   keyboard: false
  //   })


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
    $('#paymentAdd').modal('hide');
    $('#paymentAddService').modal('hide');
    $('#myModal').modal('show');
   
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

cartMsg = function(){
    $('.error').text('Sorry! This item is out of stock')
      //$('#messageStock').modal('show');
      swal(
  'Sorry!',
  'This item is out of stock',
  'error'
);
}

autoCartLoad = function(){
  var c_action ='empty';
  url ='<?php echo base_url().'pos/'?>autoCat.php';
$.ajax({
  type: 'POST',
  url: url,
  data: {C_action:c_action},
  success: function(data) {

$('.btns').html(data);

}

});
}
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
<style>
#myModal .modal-content{
  width: 70mm;
}  
</style>


<!-- Default bootstrap modal example -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: -30px !important;height: 700px;" >
  <div class="modal-dialog">
    <div class="modal-content super-content">

      <div class="modal-header" style="height: 40px;">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
      <div class="modal-body super-body thisC">
    
        ...
      </div>
      <div class="modal-footer">
                    <button type="button" onclick="PrintElem('#invoice-POS')"  name="button" class="btn btn-primary pull-right print_btn" style="margin-top: 0px;margin-left:10px;font-size: 15px;width: 65px;">
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
    <div class="modal-content" style="height: 400px;width: 280px;">
      <div class="modal-header" style="background: #E8EAF6">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h2 class="modal-title" id="exampleModalLabel" style="font-size: 15px;">Payment Confirmation (<?php echo $currency; ?>)</h2>

      </div>
      <div class="modal-body">

        <div class="form-three widget-shadow">
          

                <div class="form-group">

                <div class="col-sm-8">
                <select name="payment_method" class="form-control inputm" id="payment_method">
                  <option value="">Select Payment</option>
                  <option value="cash">Cash</option>
                  <option value="credit">Credit</option>       
                </select>
                </div>

                </div>
                <div class="form-group">
                  <div class="col-sm-8">
                    <input type="text" id="paid" disabled=""  name="paid" class="form-control inputm" placeholder="Paid ">
                  </div>

                </div>
                <div class="form-group">
                  <div class="col-sm-8">
               <a href='<?php echo base_url().'pos/'?>getPrint.php' data-toggle="modal" data-target="#myModal" data-remote="false" ><button class="btn btn-info" id="sb" style="margin-right:100px;margin-top:10px"> 
            Submit</button></a>
                  </div>

                </div>                
                

                </div>                    
 


                <div class="form-group mb-n" style="color:red">
                  <label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp</label>


        <button type="button" style="margin-top: 125px;" class="btn btn-primary" data-dismiss="modal">Close</button>
                  
                </div>
              
            </div>

      </div>
    </div>
  </div>
</div>


<!-- end modal payment -->




<!-- Modal for start payment service sale -->
<div class="modal fade" id="paymentAddService" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="height: 500px;">
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
 

                    

            <div class="form-group">
                  <div class="col-sm-8">
               <a href='<?php echo base_url().'pos/'?>getPrint_service.php' data-toggle="modal" data-target="#myModal" data-remote="false" ><button class="btn btn-info" id="sb-service" style="margin-right:100px;margin-top:10px"> 
            Submit</button></a>
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
  if(isset($_SESSION["cart_item"])) {
    foreach ($_SESSION["cart_item"] as $item){

?>
              <tr class="service">
                             <td class="tableitem"><p class="itemtext" id="product_name"><?php echo $item["product_name"]; ?></p></td>
                <td class="tableitem"><p class="itemtext" id="pro_quantity"><?php echo $item["quantity"]; ?></p></td>

<?php } } ?>                            

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
<style >
  .modal-title  {
  font-size: 26px;
  margin: 15px 0px 5px 0px;
  border-bottom: 5px solid black;
  width:auto; /*Change this to whatever value that you want*/
  color:#2e5c2e ;
}
</style>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h2 class="modal-title" id="exampleModalLabel">Add New Customer</h2><hr>

      </div>
      <div class="modal-body">

        <div class="form-three widget-shadow">
          
              <form action="<?php echo base_url()."admin/customers/insertCustomer"?>" method="post" class="form-horizontal">

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

function print_it() {
                    $("#print_section").printThis({
                        printDelay: 333,
                        afterPrint: null,
                    });

$("#invoice-POS").printThis({
                        //  beforePrint: function (e) {$('#pos_print').modal('hide');},
                        printDelay: 500,
                        afterPrint: null
                    });                    
                }

$(document).ready(function () {

  cartAction('','');
  autoCartLoad()
})




         $("#idCalculadora").Calculadora();
         $("#micalc").Calculadora({'EtiquetaBorrar':'Clear',TituloHTML:''});
        
        $("#CalcOptoins").Calculadora({
            EtiquetaBorrar:'Clear',
            ClaseBtns1: 'warning', /* Color Numbers*/
            ClaseBtns2: 'success', /* Color Operators*/
            ClaseBtns3: 'primary', /* Color Clear*/
            TituloHTML:'',
            Botones:["+","-","*","/","0","1","2","3","4","5","6","7","8","9",".","="]
        });
         
        
    </script>
