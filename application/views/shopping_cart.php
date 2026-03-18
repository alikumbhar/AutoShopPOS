<!DOCTYPE html>
<html>
<head>
  <title>Auto-Talk - Home</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'auto_assets/'?>css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'auto_assets/'?>css/stylesheet.css">
  <script src="<?php echo base_url().'assets/js/';?>jquery-2.2.3.min.js"></script>
  <link rel="icon" href="<?php echo base_url().'auto_assets/pics/'?>logo.png" type="image/x-icon"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

  width: 300px;
  height: 100px;
  margin-top: 10px;

}
.category_box{
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 100%;
  height: 100%;
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

.butns {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  margin-left: 5px;
  margin-top: 5px;
  cursor: pointer;
}

/* Darker background on mouse-over */
.butns:hover {
  background-color: RoyalBlue;
}
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
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  width: auto;
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}

.button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}

.button3:hover {
  background-color: #f44336;
  color: white;
}

.button4 {
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
}

.button4:hover {background-color: #e7e7e7;}

.button5 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}

.button5:hover {
  background-color: #555555;
  color: white;
}
.countdown {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
      -ms-flex-flow: row nowrap;
          flex-flow: row nowrap;
  position: relative;
  width: 100%;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  font-size: 1.5rem;
}
.countdown .part {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
      -ms-flex-flow: row nowrap;
          flex-flow: row nowrap;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  padding: 0.5rem 0.5rem 0.5em;
  -ms-flex-negative: 0;
      flex-shrink: 0;
  -webkit-box-flex: 0;
      -ms-flex-positive: 0;
          flex-grow: 0;
}
.countdown .digit {
  display: block;
  position: relative;
  padding: 0;
  line-height: 1;
  overflow: hidden;
}
.countdown .digit .digit-placeholder {
  visibility: hidden;
}
.countdown .digit .digit-value {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  font: inherit;
}
.countdown .part + .part::before {
  top: 10px;
  left: 0;
  content: "";
  display: block;
  position: absolute;
  height: calc(100% - 8px);
  width: 1px;
  background: radial-gradient(at left, #dfdfdf, transparent);
}
.countdown .part.d-none + .part::before {
  display: none;
}
.countdown .part.no-divider::before {
  display: none;
}
.countdown .part.days::after,
.countdown .part.hours::after,
.countdown .part.minutes::after,
.countdown .part.seconds::after {
  position: absolute;
  content: attr(data-label);
  text-align: center;
  bottom: 0;
  left: 0;
  width: 100%;
  font-size: 0.3em;
  color: inherit;
  background-color: inherit;
  z-index: 1;
}
.countdown .days {
  -webkit-box-ordinal-group: 2;
      -ms-flex-order: 1;
          order: 1;
}
.countdown .hours {
  -webkit-box-ordinal-group: 3;
      -ms-flex-order: 2;
          order: 2;
}
.countdown .minutes {
  -webkit-box-ordinal-group: 4;
      -ms-flex-order: 3;
          order: 3;
}
.countdown .seconds {
  -webkit-box-ordinal-group: 5;
      -ms-flex-order: 4;
          order: 4;
}
.hint {
  display: block;
  position: fixed;
  z-index: 1070;
  background-color: #fffcc0;
  color: #1d1d1d;
  font-size: 0.75rem;
  max-width: 13.75rem;
  padding: 0.625rem;
}
.timer1{background: red;width: 100px;}
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
.quantity{
    margin-bottom: -32px;
    width: 60px;
    float: left;
    margin-left: -20px;
    
}
.add_cart{ margin-left:50px;}

</style>
</head>
<body>
<div class="container-fluid maindiv">
  <!-----header---->
  <div class="container-fluid maindiv2">
    <div class="row">
      <div class="col-md-3">
        <img class="logo" src="<?php echo base_url().'auto_assets/pics/'?>logo.png">
      </div>
      <div class="col-md-5"></div>
      <div class="col-md-4">
        <div class="row ">
          <div class="col-md-4"></div>
          <div class="col-md-8 anchor">
            <a class="a1" href="#"><i class="fa fa-user"></i>  Profile Name</a>
            <a class="a1" href="#"><i class="fa fa-sign-out"></i>  Log Out</a>
          </div>
        </div>
        <img class="autotalk imgScs" src="<?php echo base_url().'auto_assets/pics/'?>autotalk.png">
      </div>
    </div>    
  </div>
  <!-----header---->
  <div class="container white">
    <div class="row ">
      <div class="col-md-6">
        <div class="select_box">
        <select class="form-control" name="" style="width: 300px;">
          <option value="">Walk-in-customer</option>
          <option value="">Ali</option>
          <option value="">Hayat khan</option>
        </select>
        </div>
        <div class="">
        <input type="" name="" class="form-control" placeholder="Enter Barcode Scanner" style="width: 250px;">
        </div>        
      <div class="cart_class">

        <div class="items">
  <div id="cart_details">
   <h3 align="center"> Cart is empty - please select any product for sale</h3>
  </div>
 
        <!-- Grid row -->
    <div class="row">




          <div class="col-md-12 mt-md-0 mt-3">

        <!-- Content -->

    <div class=" col-md-9 mb-md-0 mb-8 float-left"><p class=" d-inline">Discount:</p></div>
    <div class="float-left col-md-3 mb-md-0 mb-3"><input type="" id="in_discount" size="6" name="" value=""></div>
      </div>
          
    <div class="col-md-12 mt-md-0 mt-3">

        <!-- Content -->

<!--    <div class=" col-md-9 mb-md-0 mb-3 float-left"><p class=" d-inline">Tax:</p></div>
    <div class="float-left col-md-3 mb-md-0 mb-3"><p class="d-inline" id="tax"></p></div> -->
      </div>
          
      <div class="col-md-4 mt-md-0 mt-3"></div>
      <div class="col-md-8 mt-md-0 mt-3"> 

        <!-- Content -->

  <button type="button" class="btn-md btn btn-success">Total: <span id="total"></span></button>


      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100  pb-3">

   <!-- Grid column -->

&nbsp;&nbsp;&nbsp;    
<button style="margin-left: 65px;" type="button" onclick="cartAction('empty','');" class="btn btn-danger col-md-4">Cancel</button>&nbsp;

    <button data-toggle="modal"  data-target="#paymentAdd" type="button" class="btn btn-primary col-md-4" aria-hidden="true">Payment</button>

      <!-- Grid column -->

    </div>
        </div>
      </div>
      </div>
      <div class="col-md-6">
                 
<div class="box">

<ul>

    <li>Hours<span id="hours"></span></li>
    <li>Mins<span id="minutes"></span></li>
    <li>Sec<span id="seconds"></span></li>
  </ul>           
      </div>
                   <?php
                   
 $category  = $this->shopping_cart_model->getCategroy();  ?>
    <button class="btn btn-success" style="float:right;">Add Products</button>
    <div class="clearboth"></div>
    <div class="row" style="margin:0px;">
        <select class="form-control" id="getCategoryItem"  name="" style="margin-top: 10px;">
          <option value="">categories</option>
          <?php foreach($category as $cat): ?>
                      <option value="<?php echo $cat->category_id; ?>" ><?php print_r($cat->category); ?></option>
          <?php endforeach?>

          <option value="">Hayat khan</option>
        </select>
        
    </div>

    <div class="category_box">
      <div class="btns">
<?php
$color = array ("btn btn-md btn-outline-primary","btn btn-md btn-outline-success","btn btn-md btn-outline-danger","btn btn-md btn-outline-warning"
       );
$colorS = array ("btn btn-md btn-primary","btn btn-md btn-success","btn btn-md btn-danger","btn btn-md btn-warning"
       );

$rand_keys = array_rand($colorS, 2);

   foreach($product as $row)
   {
    $r = rand(0,1);    
    echo '
    <div class="col-md-5" style="" align="center">
    <br />
     <input type="text" name="quantity" placeholder="Enter quantity" value="1" class="form-control quantity" id="'.$row->product_id.'" />
     <button type="button" name="add_cart" class=" btn btn-sm '.$colorS[$rand_keys[$r]].' add_cart" data-productname="'.$row->product_name.'" data-price="'.$row->product_price.'" data-productid="'.$row->product_id.'"  >'.$row->product_name.'   &nbsp &nbsp</button><br />


<!--      <button type="button" name="add_cart" class="btn btn-success add_cart" data-productname="'.$row->product_name.'" data-price="'.$row->product_price.'" data-productid="'.$row->product_id.'" />Add to Cart</button> -->
    </div>
    ';
   }
   ?>


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
    <div class="col-md-6"><img src="../fb.png" class="t-image">   &nbsp&nbsp<img src="../tw.png" class="t-image"> &nbsp&nbsp  <img src="../in.png" class="t-image" ></div>
    <div class="col-md-4"><p class="setC">Copyright &#169; 2019 AutoTalk</p></div>    
  </div>

<script>
$(document).ready(function(){
 
 $('.add_cart').click(function(){
  var product_id = $(this).data("productid");
  var product_name = $(this).data("productname");
  var product_price = $(this).data("price");
  var quantity = $('#' + product_id).val();
  if(quantity != '' && quantity > 0)
  {
   $.ajax({
    url:"<?php echo base_url(); ?>shopping_cart/add",
    method:"POST",
    data:{product_id:product_id, product_name:product_name, product_price:product_price, quantity:quantity},
    success:function(data)
    {
     alert("Product Added into Cart");
     $('#cart_details').html(data);
     $('#' + product_id).val('');
    }
   });
  }
  else
  {
   alert("Please Enter quantity");
  }
 });

 $('#cart_details').load("<?php echo base_url(); ?>shopping_cart/load");

 $(document).on('click', '.remove_inventory', function(){
  var row_id = $(this).attr("id");
  if(confirm("Are you sure you want to remove this?"))
  {
   $.ajax({
    url:"<?php echo base_url(); ?>shopping_cart/remove",
    method:"POST",
    data:{row_id:row_id},
    success:function(data)
    {
     alert("Product removed from Cart");
     $('#cart_details').html(data);
    }
   });
  }
  else
  {
   return false;
  }
 });

 $(document).on('click', '#clear_cart', function(){
  if(confirm("Are you sure you want to clear cart?"))
  {
   $.ajax({
    url:"<?php echo base_url(); ?>shopping_cart/clear",
    success:function(data)
    {
     alert("Your cart has been clear...");
     $('#cart_details').html(data);
    }
   });
  }
  else
  {
   return false;
  }
 });

});
$( document ).ready(function() {
  setInterval(function time(){
  var d = new Date();
  var hours = 24 - d.getHours();
  var min = 60 - d.getMinutes();
  if((min + '').length == 1){
    min = '0' + min;
  }
  var sec = 60 - d.getSeconds();
  if((sec + '').length == 1){
        sec = '0' + sec;
  }
  jQuery('.wells #hour').html(hours);
  jQuery('.wells #min').html(min);
  jQuery('.wells #sec').html(sec);
}, 1000); });

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

$(document).ready(function(){ 
  $('#getCategoryItem').change(function(){
var id  = $('#getCategoryItem').val();

url ='<?php echo base_url()."shopping_cart/products";?>';

$.ajax({
  type: 'POST',
  url: url,
  data: {id:id},
  success: function(data) {

$('.categoryItem').html(data);
}

});

  })
})

</script>

