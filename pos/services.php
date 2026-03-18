  <?php
  require_once("dbcontroller.php");

$color = array ("btn btn-md btn-primary","btn btn-md btn-success","btn btn-md btn-danger","btn btn-md btn-warning"
       );
$rand_keys = array_rand($color, 2);
$r = rand(0,1);    
   $product_array = mysqli_query($conn,"SELECT * FROM products where category_id='".$_POST['id']."'");
  if (!empty($product_array)) { 
    foreach($product_array as $value){

  ?>
  

       <input type="button" style="margin: 1px;" class="<?php echo $color[$rand_keys[$r]]; ?>" id="add_<?php echo $value["barcode"]; ?>" value="<?php echo $value["product_name"];?>" class="btnAddAction cart-action" onclick ="cartAction('add','<?php echo $value["barcode"]; ?>','<?php echo $value['barcode']; ?>','<?php echo $value['pro_id']; ?>')" /></button>
    <input type="hidden" id="qty_<?php echo $value["barcode"]; ?>" name="quantity" value="1" size="2" />
      </form>

  <?php
      }
  }
  ?>
