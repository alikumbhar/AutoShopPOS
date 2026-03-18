<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
$currency = "PKR";

if(!empty($_POST["action"])) {
switch($_POST["action"]) {
	case "add":

		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM products WHERE barcode='" . $_POST["barcode"] . "'");
			print_r($productByCode);
			$itemArray = array($productByCode[0]["barcode"]=>array('name'=>$productByCode[0]["name"], 'barcode'=>$productByCode[0]["barcode"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));

			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["barcode"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["barcode"] == $k)
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
?>	
<table cellpadding="10" cellspacing="1" class="table table-striped" id="showme">
<tbody>
<tr>
<th><strong>Name</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Price</strong></th>
<th><strong>Action</strong></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){

			?>
				<tr>
				<td id="name_<?php echo $item["name"]; ?>"><strong><?php echo $item["name"]; ?></strong></td>

				<td><input type="text" onkeyup="cartActionQ('add','<?php echo $item["barcode"]; ?>',document.getElementById('quantity<?php echo $item["barcode"]; ?>').value,'')" id="quantity<?php echo $item["barcode"]; ?>" style="width: 50px;" name="quantity" value="<?php echo $item["quantity"]; ?>"></td>
				<td align=left><?php echo "".$item["price"]; ?></td>
				<td><a onClick="cartAction('remove','','<?php echo $item["barcode"]; ?>')" class="btnRemoveAction cart-action"><i class="fa fa-trash" style="color:red;"></i>
</a></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>



<td colspan="5" align=right><strong>Sub Total:</strong><span id="sub_total"><?php echo $item_total."</span> - $currency"; ?></td>
</tr>
</tbody>
</table>		
  <?php
}
?>
<div onClick="cartAction('empty','');"><button style="display: none" class="btn-sm btn btn-danger">Empty Cart</button></a></div>
	<!-- Footer -->
	<br>
<footer class="page-footer font-small navbar1 pt-4">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">




	        <div class="col-md-12 mt-md-0 mt-3">

        <!-- Content -->

		<div class=" col-md-9 mb-md-0 mb-8 float-left"><p class=" d-inline">Discount:</p></div>
		<div class="float-left col-md-3 mb-md-0 mb-3"><input type="" id="in_discount" size="6" name="" value=""></div>
      </div>
	  	    
	  <div class="col-md-12 mt-md-0 mt-3">

        <!-- Content -->

<!-- 		<div class=" col-md-9 mb-md-0 mb-3 float-left"><p class=" d-inline">Tax:</p></div>
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
    <!-- Grid row -->
<br>
  </div>
  <!-- Footer Links -->
      <hr class="clearfix w-100  pb-3">
	
  <!-- Copyright -->

</footer>
<!-- Footer -->


<script>

	$(document).ready(function(){
		var total = $('#total').val()
		var subs = $('#sub_total').text()

    	$('#paid').val(subs);
    	// $('#discount').text(disc)
    	// $('#total').text(total)

		$('#in_discount').on('keyup keypress click change', function(e) {
		
		var disc = $('#in_discount').val()
		var t = subs - disc;

		$('#total').text(t);
		$('#paid').val(t)


			})
	})

</script>