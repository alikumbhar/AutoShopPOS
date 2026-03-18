<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class purchases extends CI_Controller {

	public function index()
	{
		
		$data['category'] = $this->sc_model->getItems();
		$data['title'] = "Items view";
		$this->load->view('admin/item_list',$data);

	}
	public function view_purchased($id){
		$data['sale_reportz'] = $this->sc_model->getPurchasedBYID($id);	

		$data['title'] = "View Purchases";
		$this->load->view('admin/print_purchase',$data);		
	}
	public function getItems(){

		 $search = $this->input->post('keyword');
		$res = $this->sc_model->getItembynameSearch($search);
		if($res):
		$data = array();
		?>
		<ul id="country-list" class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content ui-corner-all">

		<?php
		foreach($res as $names): 
			?>
		<li class="ui-menu-item" style=" top: 356px; left: 512px; width: 320px;" onclick="selectCountry('<?php echo $names->product_name; ?>','<?php echo $names->pro_id; ?>','<?php echo $names->barcode; ?>')"><?php echo $names->product_name; ?></li>
<?php
		endforeach;
?>
</ul>
<?php		
		endif;
	}

public function addcartPurchase(){

$item = $this->input->post('keyword');
if($item):
$data = $this->sc_model->getItembynameSearch($item);
foreach ($data as $value) {
	 $purchase_price = $value->purchase_price;
	 $product_name = $value->product_name;	
	 $sale_price = $value->sale_price;
	 $barcodes = $value->barcode;
}
endif;

//$this->session->unset_userdata('purchase_cart');
//die;
$currency = "PKR";
$barcode = $this->input->post('barcode');

if(!empty($this->input->post("action"))) {
switch($this->input->post("action")) {
	case "add":

		if(!empty($this->input->post("quantity"))) {

			$query = "SELECT * FROM products WHERE barcode='" . strip_tags($barcode) . "'";
		
$queries = $this->sc_model->getdatabybarcodeforpurchaseAdd($query);
		 foreach($queries as $productByCode){

?>


<?php

$PCART = $this->session->userdata('purchase_cart');


	
if($this->input->post("quantity") >  $productByCode["stock_level"]){

			$itemArray = array($productByCode["barcode"]=>array(
				'product_name'=>$productByCode["product_name"],
				 'barcode'=>$productByCode["barcode"],
				  'quantity'=>$this->input->post("quantity"), 
				  'sale_price'=>$productByCode["sale_price"],
				  'pro_id'=>$productByCode["pro_id"],
				));	
}else{

				$itemArray = array($productByCode["barcode"]=>array(
				'product_name'=>$productByCode["product_name"],
				 'barcode'=>$productByCode["barcode"],
				  'quantity'=>$this->input->post("quantity"), 
				  'sale_price'=>$productByCode["sale_price"],
				  'pro_id'=>$productByCode["pro_id"],
				   'opening_balance'=>$productByCode['opening_balance']
				));

}

		}


			if(!empty($this->session->userdata('purchase_cart'))) {
				if(in_array($productByCode["barcode"],$this->session->userdata('purchase_cart'))) {
					foreach($this->session->userdata('purchase_cart') as $k => $v) {
							if($productByCode["barcode"] == $k)
								$PCART[$k]["quantity"] = $_POST["quantity"];
					}
				} else {
					
//					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				
					$this->session->set_userdata('purchase_cart',array_merge($this->session->userdata('purchase_cart'),$itemArray));
				}
			} else {
					$this->session->set_userdata('purchase_cart',$itemArray);
//				$_SESSION["cart_item"] = $itemArray;
			}

		}


	break;
	case "remove":
		$bc = $this->input->post('barcode');
		$PCART = $this->session->userdata('purchase_cart');
		if(!empty($this->session->userdata('purchase_cart'))) {
			foreach($this->session->userdata('purchase_cart') as $k => $v) {
				if($bc == $k)
					unset($PCART[$k]);
					$this->session->set_userdata('purchase_cart',$PCART);
					if(empty($this->session->userdata('purchase_cart')))
					$this->session->unset_userdata($this->session->userdata('purchase_cart'));
//						echo $bc;
//						print_r($PCART[$k]);
//						$this->session->unset_userdata($PCART[$k]);
//				    	unset($array[$key]);
	}
		}
	break;
	case "empty":
	$this->session->unset_userdata('purchase_cart');
	break;
	case "delete":
?>	
	<script type="">
	cartAction('empty','');
	</script>
<?php
	break;
}
}
?>



<?php
$PCART = $this->session->userdata('purchase_cart');

if($this->session->userdata('purchase_cart')){
    $item_total = 0;
	
?>
<script type="">
	$(document).ready(function(){
		var sT = $('#sub_total').text();
		$('#re_stock').val(sT);
		$('#checkCart').val(sT);
		
		})
</script>
<table cellpadding="10" cellspacing="1" class="table table-striped" id="showme">
<tbody>
<tr>
<th><strong>ITEM Name</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Price</strong></th>
<th><strong>Action</strong></th>
</tr>	
<?php

			$name = array();
			$quantityCheck= array();
			$productCheck= array();
			$query= array();
			$productQuery = array();		
    foreach ($this->session->userdata('purchase_cart') as $item){

					  $quantityCheck[] = " ".$item["quantity"];
					  $pro_id[]  = " ".$item["pro_id"]; 
					  $pro_name[] = "".$item["product_name"];
					  $pro_price[] = "".$item["sale_price"];
						$name[] = "".$item["product_name"];				 	  

				 	   $productQuery[]  = "INSERT INTO purchase_final_inv(pro_id,pro_name,pro_price,quantity,purchase_id) 
				 	   values('".$item['pro_id']."','".$item['product_name']."','".$item['sale_price']."','".$item['quantity']."','Rumor')^";
			?>
			<tr>
				<td id="name_<?php echo $item["product_name"]; ?>">
					<strong>
						<?php echo $item["product_name"]; ?>
					</strong>
				</td>
				<td>
					<input type="text" name="quantity" onkeyup="cartActionQ('add','<?php echo $item["barcode"]; ?>',document.getElementById('quantity<?php echo $item["barcode"]; ?>').value,'','<?php echo $item["pro_id"]; ?>')" 
						id="quantity<?php echo $item["barcode"]; ?>" style="width: 50px;" name="quantity" value="<?php echo $item["quantity"]; ?>">
				</td>
				<td align=left>
					<?php echo "".$item["sale_price"]; ?></td>
				<td>
				<a onClick="cartAction('remove','','<?php echo $item["barcode"]; ?>')" class="btnRemoveAction cart-action">
				<i class="fa fa-trash" style="color:red;"></i>
				</a>
				</td>
				</tr>
		<?php
        	$item_total += ($item["sale_price"]*$item["quantity"]);
		}
		if($name){
			$namez5 = implode('',$productQuery);
			?>
<input type="hidden" name="addQuery" id="productIDQuery" value="<?php echo $namez5;?>">
<?php } ?>
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
   <?php  if(!empty($this->session->userdata('purchase_cart'))) { ?>
<?php } else{?>
<script>
	$(document).ready(function(){

		$('#re_stock').val('');
	})
</script>
<?php
	echo "Purchase cart is empty - Please select any items";
}
 }

	public function add_purchase(){
		$data['title'] = "Add New Purchase";
		$data['purchase_inv'] = $this->sc_model->getPurchaseInvoice();
		$this->load->view('admin/purchase-add',$data);

	}

public function sale_history_purchase()
 {

	$data = $this->sc_model->getViewPurchaseReports();
	$sr =1;
	foreach ($data as $rep) 
	{

	$button ='
	<div class="btn-group">
  	<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="'.base_url()."admin/purchases/view_purchased/".$rep->purchase_id.'">view purchase</a>
    <a class="dropdown-item" href="'.base_url()."admin/purchases/delete_purchase/".$rep->purchase_id.'/confirm">Delete</a>    
   </div>';

	$jso[] =  array(
	$sr++,
	$rep->invoice_no,
	$rep->entry_date, 
	$rep->supplier_name,
	$rep->add_payment,
	$rep->amount_paid,	
	$rep->pay_type,
	$button  
	);

$dataCount = count($data);

}

$json_data = array('draw' => (isset($_REQUEST["draw"]) ? $_REQUEST["draw"] : 0), 'recordsTotal' =>  $dataCount, 'recordsFiltered' =>  $dataCount, 'data' =>  $jso );

echo json_encode($json_data);
//  $sC1 = str_replace('{', '[', $dc);
// $sC2 = str_replace('}', ']', $sC1);
// $dataB = '{ "data":'.$sC2." }";
// $abc= json_decode( $dc,  true );
}


	public function view_purchase(){
 		//$data['reports'] = $this->sc_model->getSaleReports();
		$data['reports'] = $this->sc_model->getViewPurchaseReports();

		$data ['title'] = 'View Purchased Reports'; 
		$this->load->view('admin/view_purchase',$data); 
 }
public function delete_purchase($id = null,$pm = null)
{ 
	?>
		<div style="text-align:center"> 
		<?php 

		if ($pm=="confirm"){
		?>
		<span style="font-size: 25px;"><small> you want to delete this</small>
		<br>
		  <a href="<?php echo base_url().'admin/purchases/delete_purchase/'.$id.'/Yes';?>"><button style='width: 80px;'>Yes</button></a>
		  	<a href="<?php echo base_url().'admin/purchases/delete_purchase/'.$id.'/No';?>"><button style='width: 80px;'>No</button></a>
		  </span>
		 <?php 
		exit();
		}
		if($pm =="No"){
			echo "no select";
			redirect('admin/purchases/view_purchase');
		}

		$this->sc_model->delete_purchases($id);
			$this->session->set_flashdata('remove','purchases invoice deleted');			
			$red = base_url().$this->extra_lib->path."/purchases/view_purchase";
			redirect($red);				
	}
	public function getSupplier(){
		$id = $this->input->post('id');
		$items = $this->sc_model->getItemswithSupplier_id($id);	
		 if($items){
		?><select id="add_item" name="item_id" class="form-control"><?php foreach($items as $sup):  ?><option value="<?=  $sup->pro_id;?>"><?= $sup->product_name; ?></option><?php  endforeach; ?></select><?php
	}
	}
	public function getQ(){
		$id = $this->input->post('val');
		$r = $this->sc_model->getQuanitiy($id);
	echo json_encode($r);
	}

	public function item_price(){
		$item_price = $this->input->post('item_price');
		$quantity = $this->input->post('quantity');
		$total =  $item_price * $quantity;
		echo $total; 
	}
	public function discount(){
		$fig = $this->input->post('discount');
		$price = $this->input->post('t_price');
	$percentage = $fig;
	$totalWidth = $price;
	$new_width = ($percentage / 100) * $totalWidth;
	$neMo = $price - $new_width;
	echo $neMo;

	}	

	public function insertPurchase(){

		$inv = strip_tags($this->input->post('invoice_no'));
		$resp = $this->sc_model->checkInvoice($inv);

		if($resp =="1"){
			echo "0";
			exit();
		}

		 $proQuery = explode('^', $this->input->post('addQuery'));
 		 $data = array(
				'invoice_no' => strip_tags($this->input->post('invoice_no')),
				'supplier_id' => strip_tags($this->input->post('supplier_id')),
				 'item_id' => strip_tags($this->input->post('item_id')),
				 'add_payment' => strip_tags($this->input->post('add_payment')),
				 'pay_type' => strip_tags($this->input->post('pay_type')),
				 'amount_paid'=> strip_tags($this->input->post('amount_paid')),
				 'created_date'=>date('m/d/Y h:i:s', time()),
				 'entry_date' =>date('Y-m-d')
		);	

		$ret  = $this->sc_model->insertPurchase($data, $proQuery);		
		if($ret){
			$this->session->set_flashdata('msg','Add Purchase Invoice Has been added');
			$red = base_url().$this->extra_lib->path."/purchases/add_purchase";
			redirect($red);		
		}
	}	
	public function checkInvoice(){
		
		$inv = $this->input->post('invoice');
		$resp = $this->sc_model->checkInvoice($inv);

		print_r($resp);
	
		}
}
	?>