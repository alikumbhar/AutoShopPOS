
<?php
session_start();
require_once("dbcontroller.php");
// $currency = "PKR";
 

if(isset($_POST['edit_invoice']) =="edit_invoice"){  
	?>
<script>
	$(document).ready(function(){
		$('.text-md-left').hide();
	})
</script>
	<?php } 
 if(isset($_POST['id_inv'])){
  $_SESSION["id_inv"] = $_POST['id_inv'];
}
if(isset($_POST['cut'])){
  $_SESSION["tax_cut"] = $_POST['cut'];
}
if(isset($_POST['discount'])){ 
	$_SESSION['discount'] = $_POST['discount'];
}


if(isset($_POST['dropMe']) =='delete'){
	unset($_SESSION["cart_item_edit"]);
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
		   'opening_balance'=>$productByCode['opening_balance'],
		   'stock_level' =>	 $productByCode['stock_level']	
				));
	
}else{

				$itemArray = array($productByCode["barcode"]=>array(
				'product_name'=>$productByCode["product_name"],
				 'barcode'=>$productByCode["barcode"],
				  'quantity'=>$_POST["quantity"], 
				  'sale_price'=>$productByCode["sale_price"],
				  'pro_id'=>$productByCode["pro_id"],
				   'opening_balance'=>$productByCode['opening_balance'],
				   'stock_level' =>	 $productByCode['stock_level']
				));
}
		}


			if(!empty($_SESSION["cart_item_edit"])) {
if(!empty($productByCode["barcode"])){ 
				if(in_array($productByCode["barcode"],$_SESSION["cart_item_edit"])) { 

					foreach($_SESSION["cart_item_edit"] as $k => $v) {
							if($productByCode["barcode"] == $k)
								$_SESSION["cart_item_edit"][$k]["quantity"] = $_POST["quantity"];
					}
				} else {

				
					$_SESSION["cart_item_edit"] = array_merge($_SESSION["cart_item_edit"],$itemArray);
				}
			//check empty
			}else{
			$productByCode["barcode"] ="dummy"; 
if(in_array($productByCode["barcode"],$_SESSION["cart_item_edit"])) { 

					foreach($_SESSION["cart_item_edit"] as $k => $v) {
							if($productByCode["barcode"] == $k)
								$_SESSION["cart_item_edit"][$k]["quantity"] = $_POST["quantity"];
					}
				} else {

				
					$_SESSION["cart_item_edit"] = array_merge($_SESSION["cart_item_edit"],$itemArray);
				}
			}	//end of check else
			} else {

				$_SESSION["cart_item_edit"] = $itemArray;
			}

		}


	break;
	case "remove":
		if(!empty($_SESSION["cart_item_edit"])) {
			foreach($_SESSION["cart_item_edit"] as $k => $v) {
					if($_POST["barcode"] == $k)
					unset($_SESSION["cart_item_edit"][$k]);
					if(empty($_SESSION["cart_item_edit"]))
						unset($_SESSION["cart_item_edit"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item_edit"]);
	break;		
}
}
?>
<?php
if(isset($_SESSION["cart_item_edit"])){

    $item_total = 0;
	
	$query = "SELECT * FROM site_setting";
		$row = mysqli_query($conn,$query);
		 while($ca = mysqli_fetch_assoc($row)){
		 	$currency = $ca['currency'];

	$tax_info = "SELECT * FROM tax_info";
		$row_tax = mysqli_query($conn,$tax_info);
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
			$productQueryInsert = array();
			$fullCart = array();
			$i =1;
    foreach ($_SESSION["cart_item_edit"] as $item){

    $fullCart[] = $item['pro_id'];
	$query1 = "SELECT quantity FROM product_sale_list where psi_id=".$_SESSION['id_inv']." AND product_ids =".$item['pro_id'];
		$row1 = mysqli_query($conn,$query1);
  $consume="";
  $check=null;
  $stock = $item['stock_level']; 
  $mQ ="";
		$iid = $item["pro_id"];
  while($c2 = mysqli_fetch_assoc($row1))
  {

 	if($item["quantity"] > $c2['quantity']  )
	{
		$d = $c2['quantity'] - $item["quantity"];
		$increasedQ = abs($d);
		$stock-=$increasedQ;
		$c = $c2['quantity'] - $item["quantity"];
		$increasedC = abs($c);
		$check = (int) $check + (int) $increasedC;		
			 $query[] = 'UPDATE products SET stock_level='.$stock.',stock_consume=stock_consume+ '.$check.' WHERE pro_id = '.$iid.'^';		
	        continue;

	} 
	if($item["quantity"] < $c2['quantity']  )
	{

		$d = $c2['quantity'] - $item["quantity"];
		$increasedQ = abs($d);
		$stock+=$increasedQ;
		$c = $c2['quantity'] - $item["quantity"];
		 $check-=$c;		 
				  $query[] = 'UPDATE products SET stock_level='.$stock.',stock_consume=stock_consume'.$check.' WHERE pro_id = '.$iid.'^';		

        continue;
	}

	}
?>
				<tr>
				
				<?php 


					  $quantityCheck[] = " ".$item["quantity"];
					  $productCheck[]  = " ".$item["pro_id"]; 
					  $name[] = "".$item["product_name"];
				 	  
		
		$productQueryInsert[] = "INSERT INTO product_sale_list(total_stock,sale_entry_date,quantity,psi_id,product_name,product_ids)values('".$item['opening_balance']."','".date('Y-m-d')."','".$item['quantity']."','".$_SESSION['id_inv']."','".$item['product_name']."','@','".$item['pro_id']."')^";

		$productQuery[]  = "UPDATE product_sale_list SET total_stock ='".$item['opening_balance']."',updated_date='".date('Y-m-d')."',quantity='".$item['quantity']."' 
		WHERE product_ids  = '".$item['pro_id']."'
		AND psi_id = '".$_SESSION['id_inv']."'^";
				 	
        $item_total += ($item["sale_price"]*$item["quantity"]);


				 ?>

				<td id="name_<?php echo $item["product_name"]; ?>"><strong><?php echo $item["product_name"]; ?></strong></td>
				
				<td>
					<input type="text" onkeyup="cartActionQ('add','<?php echo $item["barcode"]; ?>',document.getElementById('quantity<?php echo $item["barcode"]; ?>').value,'','<?php echo $item["pro_id"]; ?>','<?php if(!empty($_POST["discount"])){  echo $_POST["discount"]; } else{ echo ""; } ?>')" id="quantity<?php echo $item["barcode"]; ?>" style="width: 50px;" name="quantity" value="<?php echo $item["quantity"]; ?>">
				</td>
				<td align=left><?php echo "".$item["sale_price"]; ?></td>

				<td><a onClick="cartActionEdit('remove','','<?php echo $item["barcode"]; ?>','<?php echo $_SESSION["id_inv"]; ?>')" class="btnRemoveAction cart-action"><i class="fa fa-trash" style="color:red;"></i>
</a></td>
				</tr>
				<?php
		}
		?>

<td>
<?php 

if(isset($_SESSION['tax_cut'])){ 
	$price = $item_total;
	$dc = $price;
	$percentage =  (int) $_SESSION['tax_cut'];
 	 $d = $price;
 	 $d += $d*($percentage/100);

 	 $only_tax =  $d - $price; 
?>
				<?php if(isset($d)){ ?>
					<b>Amount:</b> <?php echo $item_total; ?><br>
					<b>Tax <?php echo $_SESSION['tax_cut']."%";?>:</b><span id="taxCut"><?php echo ceil( 	 $only_tax); ?></span><?php } ?>




</td>

<td colspan="5" align="right"><strong>Sub Total:</strong><span id="sub_total"><?php echo $d."</span> - $currency"; ?></td>
<?php  }else{ 

	        ?>
<td colspan="5" align="right"><strong>Sub Total:</strong><span id="sub_total"><?php echo $item_total."</span> - $currency"; ?></td>
<?php } ?>
</tr>
</tbody>
</table>		
  <?php
}
if(isset($name)):
$namez = implode('<br>',$name);
$namez1 = implode('',$quantityCheck);
$namez2 = implode('',$productCheck);
$namez3 = implode('',$query);
$namez5 = implode('',$productQuery);
$namez6 =  implode(',',$fullCart);
$namez7 = implode('',$productQueryInsert);


?>
<input type="hidden" id="invoice_id" value="<?php print_r( $_SESSION['id_inv'] );?>">
<input type="hidden" id="quantityCheck" value="<?php print_r( $namez1 );?>">
<input type="hidden"  id="updateInsert" value="<?php print_r( $namez7 );?>">
<input type="hidden" id="fullCart" value="<?php print_r( $namez6 );?>">
<input type="hidden" id="getproductNamesList" value="<?php echo $namez;?>">
<input type="hidden" id="productIDQuery" name="InPro" value="<?php echo $namez5;?>">
<input type="hidden" id="Query" value="<?php print_r($namez3); ?>">

<?php endif; ?>

<div onClick="cartAction('empty','');"><button style="display: none" class="btn-sm btn btn-danger">Empty Cart</button></a></div>
	<!-- Footer -->
	<br>
   <?php  if(!empty($_SESSION["cart_item_edit"])) { ?>


  <footer class="page-footer font-small navbar1 pt-4">
	<!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">
	<!-- Grid row -->
    <div class="row">
		<div class="col-md-12 mt-md-0 mt-3">
        <!-- Content -->
		<div class=" col-md-9 mb-md-0 mb-8 float-left">
			<p class=" d-inline"></p>
		</div>

		<div class="float-left col-md-3 mb-md-0 mb-3">
						<p class=" d-inline"><b><u>Discount</u></b></p>
			<input type="" id="in_discount" size="6" name="" value="<?php if($_SESSION['discount']): echo $_SESSION['discount']; endif; ?>">
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

		<button data-toggle="modal"  data-target="#paymentAdd" type="button" class="btn btn-primary col-md-4" aria-hidden="true">Update Payment</button>
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
		var disc = $('#in_discount').val()
		var t = subs - disc; 
		
		$('#total').text(t);

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

    	$('#paid').val(t);
    	$('#total').text(t);		
	    
	    $('input[id^="in_discount"]').keypress(validateNumber);
		
		$.ajax({
			url: '../../../pos/getPrint_edit.php',
			type: 'post',
			data: {total:subs,gt:t,discount:disc,company_name:company_name,address:address,p_type:ct},
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
					url: '../../../pos/getPrint_edit.php',
					type: 'post',
				data: {total:subs,gt:t,discount:disc,company_name:company_name,address:address,p_type:ct},
					success: function(data) { }
			  });
			})
		})
  </script>