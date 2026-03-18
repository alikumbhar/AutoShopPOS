<style type="text/css">
  .btns{
    overflow-y: scroll;min-height: 100px;height: 500px;
  }
.text-centers{
  font-weight: bold;font-family: sans-serif;
  font-size: 12px;
  display: block;
  text-align: center;
}
.overlays{
  border: 0;
  position: absolute;
  top:  15px;
  right:  10px;
}
img{
    opacity: 1;

}
img:hover{
  opacity: 0.5;
}
</style>
  <?php
  $url =  $_POST['url'];
  require_once("dbcontroller.php");

$color = array ("btn btn-md btn-primary","btn btn-md btn-success","btn btn-md btn-danger","btn btn-md btn-warning"
       );
$rand_keys = array_rand($color, 2);
$r = rand(0,1);    
  if(isset($_POST['C_action']) == 'empty'){
   $product_array = mysqli_query($conn,"SELECT * FROM products 
    WHERE status ='yes' 
");    
  }




if($product_array->num_rows > 0){ 
  if (!empty($product_array)) { 
    foreach($product_array as $value){
// echo "<pre>";
// print_r($value);
if($value["stock_level"] == 0 OR $value["stock_level"] < 1){
  ?>
<div class="col-md-3 col-xs-6 " id="item_parent_0" disabled="disabled" title="" onclick ="cartMsg()"  data-original-title="<?php echo $value["product_name"];?>">
            <div class="box box-default item_box" style="max-height: 150px;min-height: 150px;cursor: pointer;background-color:#ffffff;color:black">
             <span class="label label-danger push-right" style="font-weight: bold;font-family: sans-serif;margin-top: 10px;"  title="<?php echo $value["stock_level"];?>.00 Quantity in Stock">                <?php if($value["stock_level"] ==""): echo $value["stock_level"];?>.00 <?php else: echo "<small>Quantity out of stock</small>"; endif; ?></span>
              <div class="box-body box-profile">
                 <center>
                <?php if($value["photo"] ==""): ?>
                <img class="item_image img-thumbnail" style="border: 1px solid white;width: 120px;height: 100px;" src="../../../pos/images/noproduct.png" alt="Item picture">
                
              <?php else: ?>                  
                <img class="item_image img-thumbnail" style="border: 1px solid white;width: 120px;height: 100px;" src="../../../assets/uploads/item_images/<?php echo $value["photo"]; ?>" alt="Item picture">

                <?php endif; ?>
                 </center>
                <?php if(strlen($value["product_name"]) > 15){   ?>
              <label class="text-centers"><?php echo substr($value["product_name"], 0,15).'..';?>
              </lable><?php }else{ ?>
                <label class="text-centers"><?php echo substr($value["product_name"], 0,15);?>
              </lable>
              <?php  } ?><br>
                     <lable class="text-centers label label-danger push-right"><b><small>Price:</small><?php echo $value["sale_price"];?></b>
              </lable>            
            </div>
            </div>
          </div>  
<?php 
}
 else{

?>

<div class="col-md-3 col-xs-6 " id="item_parent_0" disabled="disabled" data-toggle="tooltip" title="" onclick ="cartActionEdit('add','<?php echo $value["barcode"]; ?>','<?php echo $value['barcode']; ?>','<?php echo $value['pro_id']; ?>')"  data-original-title="<?php echo $value["product_name"];?>">
            <div class="box box-default item_box" style="max-height: 150px;min-height: 150px;cursor: pointer;background-color:#ffffff;color:black">
              <span class="label label-primary push-right" style="font-weight: bold;font-family: sans-serif;margin-top: 10px;" title="<?php echo $value["stock_level"];?>.00 Quantity in Stock"><?php echo $value["stock_level"];?>.00 <small>Quantity in Stock</small></span>
              <div class="box-body box-profile">
                <center>
                <?php if($value["photo"] ==""): ?>
                <img class="item_image img-thumbnail" style="border: 1px solid white;width: 120px;height: 100px;" src="../../../pos/images/noproduct.png" alt="Item picture">
              <?php else: ?>                  
                <img class="item_image img-thumbnail" style="border: 1px solid white;width: 120px;height: 100px;" src="../../../assets/uploads/item_images/<?php echo $value["photo"]; ?>" alt="Item picture">
                <?php endif; ?>
                 </center>
                <?php if(strlen($value["product_name"]) > 15){   ?>
              <label class="text-centers"><?php echo substr($value["product_name"], 0,15).'..';?>
              </lable>
              <?php } else{  ?>
              <label class="text-centers"><?php echo substr($value["product_name"], 0,15);?>
              </lable>
            <?php } ?><br>
                     <lable class="text-centers label label-success push-right"><b><small>Price:</small><?php echo $value["sale_price"];?></b>
              </lable>            
</div>
            </div>
          </div>
<?php 
}

?>


    <input type="hidden" id="qty_<?php echo $value["barcode"]; ?>" name="quantity" value="1" size="2" />
   
   
  <?php

      }
  }
}
  else{ echo "No record found";}



  ?>

