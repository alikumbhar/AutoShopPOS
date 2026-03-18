<?php
// require_once("dbcontroller.php");
// $db_handle = new DBController();
?>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="auto_complete.js" type="text/javascript" ></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
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

<style type="text/css">
  #invoice-POS{
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding:2mm;
  margin: 0 auto;
  width: 70mm;
  background: #FFF;
  
  
::selection {background: #f31544; color: #FFF;}
::moz-selection {background: #f31544; color: #FFF;}
h1{
  font-size: 1.5em;
  color: #222;
}
h2{font-size: .9em;}
h3{
  font-size: 1.2em;
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
#mid{min-height: 80px;} 
#bot{ min-height: 50px;}

#top .logo{
  //float: left;
  height: 60px;
  width: 60px;
  background: url(/images/dg7.gif) no-repeat;
  background-size: 60px 60px;
}
.clientlogo{
  float: left;
  height: 60px;
  width: 60px;
  background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
  background-size: 60px 60px;
  border-radius: 50px;
}
.info{
  font-size: 10px !important;
  line-height: 15px !important;
  display: block;
  //float:left;
  margin-left: 0;
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
  //padding: 5px 0 5px 15px;
  //border: 1px solid #EEE
}
.tabletitle{
  float: right;
  //padding: 5px;
  font-size: .5em;
  background: #EEE;
}
.service{border-bottom: 1px solid #EEE;}
.item{width: 24mm;}
.itemtext{font-size: .5em;}

#legalcopy{
  margin-top: 5mm;
}

</style>

<body>
<div class="as" style="font-family:Roboto Slab">

  <div class="row">
    <div class="col-lg-7 col-md-8 col-sm-12 a1" style="height:  auto">
<div class="row">
  <div style="">

    <div style="width: 100px;margin: 15px;width: 520px;">
      <select class="form-control" style="width: 490px;display: inline-block;"  id="customer" name="customer">
      <option value="walkin">walk in customer</option>
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
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-three widget-shadow">
          
              <form action="" method="post" class="form-horizontal">

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



$rand_keys = array_rand($color, 2);


 
  ?>
	
    <div class="col-lg-5 col-md-4 col-sm-12 a4" style="height:  640px" ><br>
<div class="row">
  <div style="">
    <div style="border: 1px solid;width: 100px;margin: 15px;width: 376px;background: black" class="btn btn-info"><span style="float: left">Categories</span></div>
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

<?php 
  //$category_array = $db_handle->runQuery("SELECT * FROM category ORDER BY category_id DESC");
$category_array = $this->sc_model->getCategroy();
;
  if (!empty($category_array)) { 
    foreach($category_array as $key=>$value){

$r = rand(0,1);    
?>

<button type="button" onclick="getCategoryItem('<?= $value->category_id; ?>')" class="<?php echo $color[$rand_keys[$r]];?>"><?= $value->category; ?></button>
<?php
    }
  }
  unset($rand_keys);
  unset($color)
  ?>



<hr class="style2">
<div class="categoryItem"></div>
</div>
<br>
</div>

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
function cartAction(action,product_code,barcode) {
  var url ="<?php echo base_url();?>admin/pos/getPos"
  var queryString = "";
  if(action != "") {
    switch(action) {
      case "add":
        queryString = 'action='+action+'&code='+ product_code+'&quantity='+$("#qty_"+product_code).val()+"&barcode="+barcode;
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
  url: url,
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

function cartActionQ(action,barcode,myquantity,product_code) {
 var url ="<?php echo base_url();?>admin/pos/getPos"

  var queryString = "";
  if(action != "") {
    switch(action) {
      case "add":
        queryString = 'action='+action+'&code='+ product_code+'&quantity='+myquantity+'&barcode='+barcode;
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
  url: url,
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
    
 var url ="<?php echo base_url();?>admin/pos/getPos"

 var barcode =  $('#barcode').val()
  var action = 'add'; 
  $.ajax({
  url: url,
  data:{barcode:barcode,action:action},
  type: "POST",
  success:function(data){
    $("#cart-item").html(data);
  
  }
})
}


function getCategoryItem(id) {
 var url ="<?php echo base_url();?>admin/pos/products"


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


</script>
<script type="text/javascript" src='js/main.js'></script> 	



<!-- Modal for opayment -->
<div class="modal fade" id="paymentAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <option>Payment Method</option>                  
                  <option value="cash">cash</option>
                  <option value="credit card">Credit Card</option>
                  <option value="Cheque">Cheque</option>                                    
                  option
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
    <button data-toggle="modal"  data-target="#print_invoice" type="button" class="btn btn-primary " aria-hidden="true">Submit</button>

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
<!-- Start invoic modal -->
<div class="modal fade" id="print_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h2 style="text-align: center">AutoTalk</h2></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-three widget-shadow">
  <div id="invoice-POS">
    
    <center id="top">
      <div class="logo"></div>

    </center><!--End InvoiceTop-->
    
    <div id="mid">
      <div class="info">
        <h2>Contact Info</h2>
        <p> 
            Address : Muslim Society,Khurram Colony</br>
            Email   : abc@gmail.com</br>
            Phone   : 555-555-5555</br>
        </p>
      </div>
    </div><!--End Invoice Mid-->
                
              <div id="bot">

          <div id="table">
            <table>
              <tr class="tabletitle">
                <td class="item"><h2>Item</h2></td>
                <td class="Hours"><h2>Qty</h2></td>
                <td class="Rate"><h2>Sub Total</h2></td>
              </tr>

              <tr class="service">
                <td class="tableitem"><p class="itemtext">Oil</p></td>
                <td class="tableitem"><p class="itemtext">5</p></td>
                <td class="tableitem"><p class="itemtext">$55</p></td>
              </tr>

              <tr class="service">
                <td class="tableitem"><p class="itemtext">Plug</p></td>
                <td class="tableitem"><p class="itemtext">2</p></td>
                <td class="tableitem"><p class="itemtext">$99</p></td>
              </tr>



              <tr class="tabletitle">
                <td></td>
                <td class="Rate"><h2>tax</h2></td>
                <td class="payment"><h2>$419.25</h2></td>
              </tr>

              <tr class="tabletitle">
                <td></td>
                <td class="Rate"><h2>Total</h2></td>
                <td class="payment"><h2>$3,644.25</h2></td>
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

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>