
<?php
session_start();
require_once("dbcontroller.php");
// $currency = "PKR";

if(isset($_POST['dropMe']) =='delete'){
	unset($_SESSION["cart_item"]);
	session_destroy();
}
if(!empty($_POST["action"])) { 
switch($_POST["action"]) {
	case "add":
?>
<?php 	
		if(!empty($_POST["quantity"])) {

			$query = "SELECT * FROM products WHERE barcode='" . strip_tags($_POST["barcode"]) . "'";
		$row = mysqli_query($conn,$query);
		 while($productByCode = mysqli_fetch_assoc($row)){


?>
<input type="hidden" id="stock_limits<?php echo $productByCode['pro_id'] ?>" value="<?php echo $productByCode['stock_level'] ?>" placeholder="">

<?php
if($_POST["quantity"] >  $productByCode["stock_level"]){
			$itemArray = array($productByCode["barcode"]=>array(
				'product_name'=>$productByCode["product_name"],
				 'barcode'=>$productByCode["barcode"],
				  'quantity'=>'1', 
				  'sale_price'=>$productByCode["sale_price"],
				  'pro_id'=>$productByCode["pro_id"],
		   'opening_balance'=>$productByCode['opening_balance']
				));
	
}else{

				$itemArray = array($productByCode["barcode"]=>array(
				'product_name'=>$productByCode["product_name"],
				 'barcode'=>$productByCode["barcode"],
				  'quantity'=>$_POST["quantity"], 
				  'sale_price'=>$productByCode["sale_price"],
				  'pro_id'=>$productByCode["pro_id"],
				   'opening_balance'=>$productByCode['opening_balance']
				));
}
		}


			if(!empty($_SESSION["cart_item"])) {

				if(in_array(!empty($productByCode["barcode"]),$_SESSION["cart_item"])) { 

					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode["barcode"] == $k)
								$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
					}
				} else {

				
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {

				$_SESSION["cart_item"] = $itemArray;
			}

		}


	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_POST["barcode"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;		
}
}
?>
<?php
if(isset($_SESSION["cart_item"])){

    $item_total = 0;
	
	$query = "SELECT * FROM site_setting";
		$row = mysqli_query($conn,$query);
		 while($ca = mysqli_fetch_assoc($row)){
		 	$currency = $ca['currency'];
		 	?>
<input type="hidden" id="address" value="<?php echo $ca['address']; ?>" >
<input type="hidden" id="company_name" value="<?php echo $ca['site_name']; ?>" >

<?php }  ?>
<table cellpadding="10" cellspacing="1" class="table table-striped" id="showme">
<tbody>
<tr>
<th><strong>Name</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Price</strong></th>
<th><strong>Action</strong></th>
</tr>	
<?php		$name = array();
			$quantityCheck= array();
			$productCheck= array();
			$query= array();
			$productQuery = array();
    foreach ($_SESSION["cart_item"] as $item){

			?>
				<tr>
				
				<?php 


					  $quantityCheck[] = " ".$item["quantity"];
					  $productCheck[]  = " ".$item["pro_id"]; 
					  $name[] = "".$item["product_name"];
				 	  $query[] = 'update products set stock_level= stock_level - '.$item["quantity"].',stock_consume=stock_consume + '.$item["quantity"].' WHERE pro_id = '.$item["pro_id"]."^";				  
				 	   $productQuery[]  = "INSERT INTO product_sale_list(total_stock,sale_entry_date,product_ids,quantity,product_name,psi_id) values('".$item['opening_balance']."','".date('Y-m-d')."','".$item['pro_id']."','".$item['quantity']."','".$item['product_name']."','Rumor')^";
				 ?>

				<td id="name_<?php echo $item["product_name"]; ?>"><strong><?php echo $item["product_name"]; ?></strong></td>
				
				<td><input type="text" onkeyup="cartActionQ('add','<?php echo $item["barcode"]; ?>',document.getElementById('quantity<?php echo $item["barcode"]; ?>').value,'','<?php echo $item["pro_id"]; ?>')" id="quantity<?php echo $item["barcode"]; ?>" style="width: 50px;" name="quantity" value="<?php echo $item["quantity"]; ?>"></td>
				<td align=left><?php echo "".$item["sale_price"]; ?></td>
				<td><a onClick="cartAction('remove','','<?php echo $item["barcode"]; ?>')" class="btnRemoveAction cart-action"><i class="fa fa-trash" style="color:red;"></i>
</a></td>
				</tr>
				<?php
        $item_total += ($item["sale_price"]*$item["quantity"]);
		}
		?>



<td colspan="5" align=right><strong>Sub Total:</strong><span id="sub_total"><?php echo $item_total."</span> - $currency"; ?></td>
</tr>
</tbody>
</table>		
  <?php
}
if(isset($name)):
$namez = implode('<br>',$name);
$namez1 = implode('',$quantityCheck);
$namez2 = implode('',$productCheck);
$namez5 = implode('',$productQuery);
$namez3 = implode('',$query);

// $ae = explode(' ', $namez1);
// $aed = explode(' ', $namez2);
?>
<input type="hidden" id="getproductNamesList" value="<?php echo $namez;?>">
<input type="hidden" id="productIDQuery" name="InPro" value="<?php echo $namez5;?>">
<input type="hidden" id="Query" value="<?php print_r($namez3); ?>">

<?php endif; ?>

<div onClick="cartAction('empty','');"><button style="display: none" class="btn-sm btn btn-danger">Empty Cart</button></a></div>
	<!-- Footer -->
	<br>
   <?php  if(!empty($_SESSION["cart_item"])) { ?>
  <footer class="page-footer font-small navbar1 pt-4">
	<!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">
	<!-- Grid row -->
    <div class="row">
		<div class="col-md-12 mt-md-0 mt-3">
        <!-- Content -->
		<div class=" col-md-9 mb-md-0 mb-8 float-left">
			<p class=" d-inline">Discount:</p>
		</div>

		<div class="float-left col-md-3 mb-md-0 mb-3">
			<input type="" id="in_discount" size="6" name="" value="">
		</div>
      </div>
	  <div class="col-md-12 mt-md-0 mt-3"></div>
	  <div class="col-md-4 mt-md-0 mt-3"></div>
	  <div class="col-md-8 mt-md-0 mt-3">	
		<!-- Content -->
		  <button id="btnsL" type="button" class="btn-md btn btn-success">Total: <span id="total"></span></button>
      </div>

      <!-- Grid column -->
      <hr class="clearfix w-100  pb-3">
   <!-- Grid column -->
   		&nbsp;&nbsp;&nbsp;		
		<button style="margin-left: 65px;" type="button" onclick="cartAction('empty','');" class="btn btn-danger col-md-4">Cancel</button>
		&nbsp;

		<button data-toggle="modal"  data-target="#paymentAdd" type="button" class="btn btn-primary col-md-4" aria-hidden="true">Payment</button>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->
<br>
  </div>
  <!-- Footer Links -->
      <hr class="clearfix w-100  pb-3">
	
  <!-- Copyright -->

</footer>
<!-- Footer -->
<?php 
	} 
	else{
		echo "Cart is empty - Please Select any product for sale";
		}
	?>

 <script>
	$(document).ready(function(){
		
		var total = $('#total').val()
		var subs = $('#sub_total').text()
    	var address = $('#address').val();
    	
    	var company_name = $('#company_name').val();
    	var p_type = $('#payment_method').val()
		var ct ='';
		if(p_type =='cash'){
			ct="paid";
		}if(p_type =='credit'){
			ct="unpaid";
		}
		var discount = "";
		var disc = $('#in_discount').val()
    	$('#paid').val(subs);
    	$('#total').text(subs);		
	    $('input[id^="in_discount"]').keypress(validateNumber);
		
		$.ajax({
			.$_SERVER['HTTP_HOST'];
			url: '<?php echo "https://".$_SERVER["REQUEST_URI"];?>/pos/getPrint.php',
			type: 'post',
			data: {total:subs,discount:disc,company_name:company_name,address:address,p_type:ct},
			success: function(data) {}
			  });


		$('#in_discount').on('keyup keypress click change', function(e) {
					var disc = $('#in_discount').val()
					var t = subs - disc; 
					if(parseInt(subs) < parseInt(disc) ){
					$('#in_discount').val('')
				swal(
					'Sorry!',
					'the amount you set is greater than total',
					'error'
					);
  			return false;
			return false;
		}
		$('#total').text(t);
		$('#paid').val(t)
    	var  p_type = $('#payment_method').val()
		var ct ='';
		if(p_type =='cash'){
			ct="paid";
		}if(p_type =='credit'){
			ct="unpaid";
		}		
		$.ajax({
			url: '<?php echo "https://".$_SERVER["REQUEST_URI"];?>/pos/getPrint.php',
					type: 'post',
				data: {total:subs,discount:disc,company_name:company_name,address:address,p_type:ct},
					success: function(data) { }
			  });
			})
		})
  </script>