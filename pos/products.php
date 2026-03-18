<?php 
$path="";
if(!empty($_POST['url'])){ 
$url = $_POST['url']; 
$expo = explode('/', $url);
if($expo[6] == "edit"){
$path = "../../../assets/uploads/item_images";
}else{
  $path="assets/uploads/item_images";
 }
}else{
    $path="assets/uploads/item_images";
}
?>
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
label{
  color: green;
}

.overlays{
  border: 0;
  position: absolute;
  top:  15px;
  right:  10px;
}
</style>
  <?php
  require_once("dbcontroller.php");

$color = array ("btn btn-md btn-primary","btn btn-md btn-success","btn btn-md btn-danger","btn btn-md btn-warning"
       );
$rand_keys = array_rand($color, 2);
$r = rand(0,1);    


  if(isset($_POST['action']) =='findMe'){

    $query = "SELECT * FROM products";
    if($_POST['id'])
    {
      $query.= " where category_id='".$_POST['id']."' ";
    }
    if($_POST['keyword'] ){
      if($_POST['id']){
        $query.=" AND product_name like'%".$_POST['keyword']."%' ";
       }else{
        $query.=" WHERE product_name like'%".$_POST['keyword']."%' ";
       }
      
    }
   if($_POST['keyword'] OR $_POST['id'] ){
     $query.=   " AND status ='yes'";   
    }else{
      $query.=   " WHERE status ='yes'";  
    }
   
   $product_array = mysqli_query($conn,$query);   
    echo mysqli_error($conn); 

  }else{

    $Q2 = "SELECT * FROM products "; 
     if($_POST['id']){
      $Q2 .= " where category_id='".$_POST['id']."' AND status = 'yes'";
     }else{ 
          $Q2 .=" WHERE status = 'yes'";
       }
   $product_array = mysqli_query($conn,$Q2);
  echo mysqli_error($conn);
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
                <img class="item_image img-thumbnail" style="border: 1px solid white;width: 120px;height: 100px;" src="<?php echo $path; ?>/noproduct.png" alt="Item picture">
              <?php else: ?>                  
                <img class="item_image img-thumbnail" style="border: 1px solid white;width: 120px;height: 100px;" src="<?php echo $path."/".$value["photo"]; ?>" alt="Item picture">              
                <?php endif; ?>
                 </center>
                <?php if(strlen($value["product_name"]) > 15){   ?>
              <label class="text-centers"><?php echo substr($value["product_name"], 0,15).'..';?>
              </lable>
              <?php } else{  ?>
              <label class="text-centers"><?php echo substr($value["product_name"], 0,15);?>
              </lable>
            <?php } ?>
              <br>
          <label class="text-centers label label-danger push-right"><b><small>Price:</small><?php echo $value["sale_price"];?></b>
              </lable></div>
            </div>
          </div>  
<?php 
}
 else{

?>
<div class="col-md-3 col-xs-6 " id="item_parent_0" disabled="disabled" data-toggle="tooltip" title="" onclick ="cartAction('add','<?php echo $value["barcode"]; ?>','<?php echo $value['barcode']; ?>','<?php echo $value['pro_id']; ?>')"  data-original-title="<?php echo $value["product_name"];?>">
            <div class="box box-default item_box" style="max-height: 150px;min-height: 150px;cursor: pointer;background-color:#ffffff;color:black">
              <span class="label label-primary push-right" style="font-weight: bold;font-family: sans-serif;margin-top: 10px;" title="<?php echo $value["stock_level"];?>.00 Quantity in Stock"><?php echo $value["stock_level"];?>.00 <small>Quantity in Stock</small></span>
              <div class="box-body box-profile">
                <center>
                <?php if($value["photo"] ==""): ?>
                <img class="item_image img-thumbnail" style="border: 1px solid white;width: 120px;height: 100px;" src="<?php echo $path; ?>/noproduct.png" alt="Item picture">
              <?php else: ?>                  
                <img class="item_image img-thumbnail" style="border: 1px solid white;width: 120px;height: 100px;" src="<?php echo $path."/".$value["photo"]; ?>" alt="Item picture">
                <?php endif; ?>
                 </center>
                <?php if(strlen($value["product_name"]) > 15){   ?>
              <label class="text-centers"><?php echo substr($value["product_name"], 0,15).'..';?>
              </lable>
              <?php } else{  ?>
              <label class="text-centers"><?php echo substr($value["product_name"], 0,15);?>
              </lable>
            <?php } 
              $price = (int) $value['sale_price'];
            ?>
              <br>
                <label class="text-centers label label-success push-right"><small>Price:<b><?php echo $price; ?></b></small>
                  <span class="clear:both"></span>
              </lable> <br>
            </div>
            </div>
          </div>
<?php 
}

?>

<!--         <input type="button" style="margin: 1px;" class="<?php echo $color[$rand_keys[$r]]; ?>" id="add_<?php echo $value["barcode"]; ?>" value="<?php echo $value["product_name"];?>" class="btnAddAction cart-action" onclick ="cartAction('add','<?php echo $value["barcode"]; ?>','<?php echo $value['barcode']; ?>','<?php echo $value['pro_id']; ?>')" /></button> -->

    <input type="hidden" id="qty_<?php echo $value["barcode"]; ?>" name="quantity" value="1" size="2" />
   
   
  <?php

      }
  }
}
  else{ echo "No record found";}



  ?>

