<?php 
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
$currency = "PKR";

	$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct where barcode ='".$_POST['keyword']."' ");
?>
	<ul id="country-list">
<?php
if($productByCode){
foreach($productByCode as $country) {

?>
<li style="list-style: none" onClick="selectCountry('<?php echo $country["name"]; ?>','<?php echo $country["barcode"]; ?>');"><?php echo $country["name"]; ?>
	
</li>
<?php }}else{ } ?>
</ul>
