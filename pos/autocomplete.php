<?php 
session_start();
require_once("dbcontroller.php");
$currency = "PKR";
$keyword='s'.trim($_POST['keyword']);
if(trim($_POST['keyword']) ==''){ }
	else{
$productByCode = mysqli_query($conn,"SELECT * FROM products where barcode ='".$keyword."' OR product_name  like '%".$_POST['keyword']."%'");
?>
	<ul id="country-list">
<?php
if($productByCode){
foreach($productByCode as $country) {
if($country["product_name"] && $country["sale_price"] && $country["stock_level"]):
?>
<li style="list-style: none" onClick="selectCountry('<?php echo $country["product_name"]; ?>','<?php echo $country["barcode"]; ?>','<?php echo $country["stock_level"] ?>');"><?php echo $country["product_name"]; ?>
	
</li>

<?php  endif; } }else{ } ?>
</ul>
<?php } ?>
