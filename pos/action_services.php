<?php
session_start();
require_once("dbcontroller.php");

$currency = "PKR";

if(!empty($_POST["action"])) {

switch($_POST["action"]) {
	case "add":

		if(!empty($_POST["service_id"])) {
		$ts =  str_replace("s","",$_POST["service_id"]);

			

			$query = "SELECT * FROM services WHERE service_id='" . strip_tags($ts) . "'";
		$row = mysqli_query($conn,$query);


		 while($productByCode = mysqli_fetch_assoc($row)){

?>
<?php 

//unset($_SESSION["cart_service"]);
			$itemArray = array($productByCode["sp_rand"]=>array(
				 'service'=>$productByCode["service"],
				 'price'=>$productByCode["price"],
				 'service_id'=>$productByCode["service_id"],
				 'sp_rand'=>$productByCode["sp_rand"]
				));
		}

			if(!empty($_SESSION["cart_service"])) {

				if(in_array($productByCode["sp_rand"],$_SESSION["cart_service"])) {
					
				} else {
					$_SESSION["cart_service"] = array_merge($_SESSION["cart_service"],$itemArray);
				}
			} else {
				$_SESSION["cart_service"] = $itemArray;
			}

		}


	break;
	case "remove":

		if(!empty($_SESSION["cart_service"])) {
			foreach($_SESSION["cart_service"] as $k => $v) {
					if($_POST["sp_rand"] == $k)
						unset($_SESSION["cart_service"][$k]);
					if(empty($_SESSION["cart_service"]))
						unset($_SESSION["cart_service"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_service"]);
	break;		
}
}
?>
<?php
if(isset($_SESSION["cart_service"])){
    $item_total = 0;
$query = "SELECT * FROM site_setting";
		$row = mysqli_query($conn,$query);
		 while($ca = mysqli_fetch_assoc($row)){
		 	?>
<input type="hidden" id="address" value="<?php echo $ca['address']; ?>" >
<input type="hidden" id="company_name" value="<?php echo $ca['site_name']; ?>" >

<?php }  	
	?>

<table cellpadding="10" cellspacing="1" class="table table-striped" id="showme">
<tbody>
<tr>
<th><strong>Service Name</strong></th>
<th><strong>Service Price</strong></th>
<th><strong>Action</strong></th>
</tr>	
<?php		$name = array();
			$quantityCheck=array();
			$productCheck=array();
			$query = array();
			$productQuery = array();
    foreach ($_SESSION["cart_service"] as $item){

			?>
				<tr>
				<?php 

					  $name[] = 	 $item["service"];

					  $productCheck[]  = " ".$item["service_id"]; 
					  $productQuery[]  = "INSERT INTO service_sale_list 	(service_name,service_ids,service_sale_id) values('".$item['service']."','".$item['service_id']."','Rumor')^";;


				 ?>

				<td id="name_<?php echo $item["service"]; ?>"><strong><?php echo $item["service"]; ?></strong></td>


				<td align=left><?php echo "".$item["price"]; ?></td>
				<td><a onClick="cartActionService('remove','<?php echo $item["sp_rand"]; ?>','<?php echo $item["sp_rand"]; ?>')" class="btnRemoveAction cart-action"><i class="fa fa-trash" style="color:red;"></i>
</a></td>
				</tr>
				<?php
       $item_total += $item["price"];
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

$namez2 = implode('',$productCheck);

$namez5 = implode('',$productQuery);

//$namez3 = implode('',$query);

//$ae = explode(' ', $namez1);
$aed = explode(' ', $namez2);

?>
<!-- <input type="" id="getserviceNamesList" value="<?php //echo $namez;?>"> -->
<input type="hidden" id="productIDQuery" value="<?php echo $namez5;?>">

<?php endif; ?>
<!-- <?php //endif; ?> -->
<div onClick="cartAction('empty','');"><button style="display: none" class="btn-sm btn btn-danger">Empty Cart</button></a></div>
	<!-- Footer -->
	<br>
   <?php  if(!empty($_SESSION["cart_service"])) { ?>
<footer class="page-footer font-small navbar1 pt-4">

  <!-- Footer Links -->

  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">




<!-- 	   <div class="col-md-12 mt-md-0 mt-3">
			<div class=" col-md-9 mb-md-0 mb-8 float-left"><p class=" d-inline">Discount:</p></div>
		<div class="float-left col-md-3 mb-md-0 mb-3"><input type="" id="in_discount" size="6" name="" value=""></div>
     </div>
	  --> 	    
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
<button style="margin-left: 65px;" type="button" onclick="cartActionService('empty','');" class="btn btn-danger col-md-4">Cancel</button>&nbsp;

		<button data-toggle="modal"  data-target="#paymentAddService" type="button" class="btn btn-primary col-md-4" aria-hidden="true">Payment</button>

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
<?php } else{
	echo "<div id='cartMessage'>Cart is empty - please select any service for sale</div>";
}?>

<script>

	$(document).ready(function(){
		var total = $('#total').val()
		var subs = $('#sub_total').text()

    	$('#paidService').val(subs);
    	$('#total').text(subs);
    	var getTotal = $('#total').text();
       	var address = $('#address').val();
    	var company_name = $('#company_name').val();

    	// $('#discount').text(disc)
    	// $('#total').text(total)
var discount = "";

$.ajax({
			url: 'getPrint_service.php',
			type: 'post',
			data: {total:getTotal,discount:discount,address:address,company_name:company_name},
			success: function(data) {
			
			}

			});


	})

</script>