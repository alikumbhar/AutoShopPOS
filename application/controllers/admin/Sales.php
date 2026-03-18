<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sales extends CI_Controller {

	public function index()
	{
		
		$data['category'] = $this->sc_model->getItems();
		$data['title'] = "Items view";
		$this->load->view('admin/item_list',$data);

	}

	public function view_sale($id){
		$data['sale_reportz'] = $this->sc_model->getSaleBYID($id);	
		$data['title'] = "View sale";
		$this->load->view('admin/print_view',$data);		
	}

	public function delete_sale($id = null,$pm = null){ ?>
<div style="text-align:center"> 
<?php 

if ($pm=="confirm"){
?>
<span style="font-size: 25px;"><small> you want to delete this</small>
<br>
  <a href="<?php echo base_url().'admin/sales/delete_sale/'.$id.'/Yes';?>"><button style='width: 80px;'>Yes</button></a>
  	<a href="<?php echo base_url().'admin/sales/delete_sale/'.$id.'/No';?>"><button style='width: 80px;'>No</button></a>
  </span>
 <?php 
exit();
}
if($pm =="No"){
	echo "no select";
	redirect('admin/sales/sale_history');
}
//delete sale will be reinitiated
		// $this->sc_model->delete_sale($id);
			$this->session->set_flashdata('remove','sale invoice deleted');			
			$red = base_url().$this->extra_lib->path."/sales/sale_history";
			redirect($red);				
	}

 public function update_return()
 {
	$invoice_id = $this->input->post('invoice_id');			
	$item_ids = $this->input->post('ids');
	$quantity = $this->input->post('quantity');
	if($quantity < 1){
					$this->session->set_flashdata('msg',' something went wrong please check again');
		redirect('admin/sales/sale_invoice/');
	}	
	$sale_price = $this->input->post('sale_price');	
	$pro_name = $this->input->post('pro_name');
	$totalPrice = $sale_price * $quantity;
	$sale_refund = array(
					'return_date' => date('Y-m-d'),
					'return_product'=>$pro_name,
					'refund_amount'=>$totalPrice,
					'return_notes'=>strip_tags($this->input->post('note')),
					'psi_id'=>	$invoice_id 
				);
	 $cdiscount = $this->input->post('discount');
	 $available_discount = $this->input->post('available_discount');
	 $availableQ = $this->input->post('availableQ');
	 $paidz = $this->input->post('paid');
	 $totalz = $this->input->post('total');
 	 $pro_sale_id = $this->input->post('pro_sale_id');
	 $newQ = (int) $availableQ - (int) $quantity;
	 $discount = (int) $available_discount - (int) $cdiscount; 
	 $total = (int) $totalz - (int) $totalPrice;  
	 $paid  = (int) $paidz  - (int) $totalPrice;
	if($discount)
	{
		$data =  array('item_ids' =>$item_ids , 'quantity' =>$newQ , 'sale_price'=>$sale_price,'total_price' =>$totalPrice, 'already_paid' =>$paid ,'already_total' =>$total,'pro_sale_id'=>$pro_sale_id, 'discount' => $discount );
	}
	else
	{
		$data =  array('item_ids' =>$item_ids , 'quantity' =>$newQ , 'sale_price'=>$sale_price,'total_price' =>$totalPrice,'already_paid' =>$paid ,'already_total' =>$total,'pro_sale_id'=>$pro_sale_id );
	}

	$currency = $this->footer->getSettingFooter('co');
	$return = $this->sc_model->update_sale_return($data,$invoice_id,$sale_refund);

	if($return == true)
	{
			$this->session->set_flashdata('msg','the sale of <strong>'.$totalPrice.' '.$currency.'</strong> has been returned successfully');

			redirect('admin/sales/sale_invoice');
	}
	else
	{
			echo "returned failed";
	}
 }
 public function sale_invoice()
 {
		//$data['reports'] = $this->sc_model->getSaleReports();
		$data['reports'] = $this->sc_model->get_sale_returnWIID();
		$data ['title'] = 'Sale Reports'; 
		$this->load->view('admin/sale_invoice',$data);
 }
 public function getReturnSingleItem()
 {
	$id = $this->input->post('id');
	$quan = $this->input->post('quan');
	$item_id = $this->input->post('item_id'); 
	$getSold='';
	$soldItem  = $this->sc_model->get_sale_return_by_single($id,$item_id); 
	foreach($soldItem as $getSold):
	$myRecord = $getSold; 
	endforeach; 
	?>			
	<form id="form" action="<?php echo base_url().'admin/sales/update_return'; ?>" method="post" onkeydown="return event.key != 'Enter';" >
	<table class="table table-bordered table-condensed">
     	<thead>
            <tr class="bg-gray">
	            <th class="w-20">Product Names</th>
	            <th style="width: 20px;">Purchase Quantity</th>
	            <th class="text-center w-70">Return Quantity</th>
            </tr>
        </thead>
         <tbody>
         <?php foreach($soldItem as $pDetail): ?>
                            <!-- ngRepeat: items in order.items -->
             <tr ng-repeat="items in order.items" class="ng-scope">
                <td class="w-70 ng-binding">
                     <?php print_r($pDetail->product_name);?></td>
                <td>  
                     <input class="text-center" style="width: 48px;" id="in_db_q_<?php echo $pDetail->pro_id ?>" type="text" disabled="" name="" value="<?= $pDetail->quantity; ?>" >
                 </td>
                  <td class="text-center w-20">
						<input onkeypress="return isNumber(event)" onkeyup="quantityTest('<?= $pDetail->pro_id; ?>',this.value);" class="text-center quantity" type="text" name="quantity" id="getQ_<?= $pDetail->pro_id; ?>" value="" >
			            <input  class="text-center quantity" type="hidden" name="ids"  value="<?= $pDetail->pro_id; ?>" >
                        <input  class="text-center quantity" type="hidden" name="sale_price"  value="<?= $pDetail->sale_price; ?>" >
                        <input  class="text-center quantity" type="hidden" name="paid"  value="<?= $pDetail->paid; ?>" >
                        <input  class="text-center quantity" type="hidden" name="total"  value="<?= $pDetail->total; ?>" >
                        <input  class="text-center quantity" type="hidden" name="pro_sale_id"  value="<?= $pDetail->pro_sale_id; ?>" >

                       <input  class="text-center quantity" type="hidden" name="available_discount"  value="<?= $pDetail->discount; ?>" >
                       <input  class="text-center quantity" type="hidden" name="pro_name"  value="<?= $pDetail->product_name; ?>" >
                       <input  class="text-center quantity" type="hidden" name="availableQ"  value="<?= $quan; ?>" >
                       <input  class="text-center quantity" type="hidden" name="invoice_id"  value="<?= $myRecord->id_inv; ?>" >                  
                   </td>
            </tr><!-- end ngRepeat: items in order.items -->
               <?php endforeach;?>
             <tr>
                	<td colspan="3">
                    	<input type="text" class="form-control no-resize" name="note" placeholder="Type Note">
                	</td>
            </tr>
            <?php if($pDetail->discount > 0){  ?>
            <tr>
            		<td>
            			<span style="text-align: center;color:red">Please Add or Set discount for items</span>
            		</td>
            		<td>
            			<span style="text-align: center;color:red">The Given Disount is <?= $pDetail->discount; ?> 
            		</span>
            		</td>                            	
            </tr>

            <tr>
            	<td>Discount</td>
            	<td>
            		<input  class="text-center quantity" type="" name="discount" id="dis" onkeypress="return isNumber(event)" onkeyup="discountChecker('<?= $pDetail->discount; ?>',this.value);"   placeholder="Enter Dicsount">
            	</td>
            </tr>
        <?php } ?>
            <tr>
                <td colspan="3">
                	<span id="ret">	 
                    
                    </span>
                </td>
            </tr>                            
       </tbody>
    </table>
</form>
<?php			
 }
 public function edit($id)
 {
   $data['id'] = $id;
 	$data['title'] ="Edit Sale Page";
 	$this->load->view('admin/pos_edit',$data);
 }
  public function edit_invoice($id)
 {

    $data['id'] = $id;
 	$data['title'] ="Edit Sale Page";
 	$this->load->view('admin/pos_edit_invoice',$data);
 }
 public function edit_redirect($id){ ?>

   <script src="<?php echo base_url().'assets/js/jquery-2.2.3.min.js'?>"></script>

<script type="">

 var dropMe = 'delete';
 url ='<?php echo base_url().'pos/'?>ajax_action.php';
 $.ajax({
   type: 'POST',
   url: url,
   data: {dropMe:dropMe},
   success: function(data) { 
	window.location ="<?php echo base_url().'admin/sales/edit/'.$id;?>"
}
      });

</script>
 <?php 


}
 public function sale_history_ajax()
 {

	$data = $this->sc_model->getSaleReportsByLast30DAys();
	$sr =1;
	foreach ($data as $rep) 
	{

		

	if($rep->discount){
		$discount = $rep->discount;
	}
	else
	{
		$discount =  "N/A";
	}
	$button ='
	<div class="btn-group">
  	<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item b_btm" href="'.base_url()."admin/sales/view_sale/".$rep->id_inv.'">View Sales</a>
    <a class="dropdown-item" href="'.base_url()."admin/sales/edit_redirect/".$rep->id_inv.'">Edit</a>
    <a class="dropdown-item" href="'.base_url()."admin/sales/edit_invoice/".$rep->id_inv.'">Print Reciept</a>';
if($rep->pay_method=="credit"){
	$button.='<a class="dropdown-item" href="'.base_url()."admin/sales/sale_receiveable/".$rep->id_inv.'">Pay Now</a>';
}else{
	$button .= '<a class="dropdown-item">Paid</a>';
}
    $button .= '           
    <a class="dropdown-item" href="'.base_url()."admin/sales/sale_invoice/".$rep->id_inv.'">Sale Return</a>  
    <a class="dropdown-item" href="'.base_url()."admin/sales/delete_sale/".$rep->id_inv.'/confirm">Delete</a>        
</div>';
	$finalRevenue = (int) $rep->total+ (int) $rep->discount;
	$jso[] =  array(
	$sr++,
	$rep->sale_date, 
	 $rep->customer_name,
	$rep->item_name,
	 $rep->total,
	 $discount,
	 $finalRevenue,
	 $rep->pay_method,
	$rep->sale_agent,
	$button  
	);


}
 $dc = json_encode($jso);
 $sC1 = str_replace('{', '[', $dc);
$sC2 = str_replace('}', ']', $sC1);
$dataB = '{ "data":'.$sC2." }";
$abc= json_decode( $dc,  true );
print_r($dataB);
}
 public function sale_history()
 {
 		//$data['reports'] = $this->sc_model->getSaleReports();
		$data['reports'] = $this->sc_model->getSaleReportsByLast30DAys();
		$data ['title'] = 'Sale Reports'; 
		$this->load->view('admin/sale_history',$data); 
 }
 public function sale_receiveable_insert()
 {

	$data = array(
	'note' => $this ->input->post('note'),

	'paid' => $this ->input->post('amount'),
	
	'discount' => $this ->input->post('discount'),

	'dues' => $this ->input->post('amount')

);

$invoice_id  = 	 $this ->input->post('invoice');


$this->sc_model->update_receiveable_invoice($invoice_id,$data);

		$this->session->set_flashdata('msg','sale has been updated successfully');
		redirect('admin/sales/sale_receiveable');

	}

//sale receiveable function 
public function sale_receiveable(){
			//$data['reports'] = $this->sc_model->getSaleReports();
			$data['reports'] = $this->sc_model->get_sale_receiveableWIID();
			$data ['title'] = 'Sale Reports'; 
			$this->load->view('admin/sale_receiveable',$data);
		}

public function update_receiveable(){

		$this->session->set_flashdata('msg','sale has been updated successfully');
		redirect('admin/sales/sale_receiveable');
}


	public function add_sale(){
		$data['title'] = "Add new sale";
		$this->load->view('admin/sale_add',$data);
	}

	public function sale_report(){
			$data['reports'] = $this->sc_model->getSaleReports();
			$data ['title'] = 'Sale Reports'; 
			$this->load->view('admin/sale_reports',$data);
	}

	public function getCustomer(){
			$customer = $this->sc_model->getCustomer();	
?>
			<div class="form-group">
			<label for="focusedinput" class="col-sm-2 control-label">Customer Name</label>
			<div class="col-sm-8">

			<select class="selectpicker form-control" name="customer_name" id="supplier_id"  data-live-search="true" style="width: 317px;margin-left: 10px;">
			<option>Select Customer</option>		
			<?php foreach($customer as $cus): print_r($cus); ?>

			<option  value="<?= $cus->id;?>"><?= $cus->firstname." ".$cus->lastname;?></option>
			<?php endforeach; ?>
			</select>
			<a href="<?= base_url().'admin/Customers/add_customer'?>" style="margin-left: 11px;">New Customer</a>
			</div>
			<input type="hidden" name="customer_address" value="<?= $cus->address?>" id="customer_address">
			</div>	

<?php	}
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

public function add_service_invoice(){


$Query1 =   $this->input->post('Query');
// $ID =   $this->input->post('getproductID');
// $namez1 = explode(' ', $Qu);


 $Query = explode('^', $Query1);
 $proQuery = explode('^', $this->input->post('proQuery'));


date_default_timezone_set("Asia/karachi");
$user = $this->session->userdata('userVal');

$data = array ( 
	'pay_method' =>$this->input->post('PayM')
	,'paid' =>$this->input->post('paid')
	,'service_name' => $this->input->post('service_name')
	,'customer_id'=>$this->input->post('customer')
	,'customer_name'=>$this->input->post('customerName')
	,'total'=>$this->input->post('total')
	,'discount' =>$this->input->post('discount')
	,'sale_agent' =>$user['fullname']
	,'sale_date'=> date('Y-m-d ')
	,'sale_time' => date('H:i A',time())
);

	$insertSaleItemList = array(
				'service_name' 	=> $this->input->post('service_name'),
				'product_ids' 	=>$this->input->post('service_id'),
				'quantity_list' =>$this->input->post('QuantityList')
			);



	$this->sc_model->insert_service_sale_invoice($data,$insertSaleItemList,$Query,$proQuery);



}	

public function add_sale_invoice_edit(){

 $Query1 =   $this->input->post('Query');
 $cartIDS =   $this->input->post('fullCartID');
  $quantityCheck =   $this->input->post('quantityCheck');
 

 $proQuery = explode('^', $this->input->post('proQuery'));
 $updateInsert = $this->input->post('updateInsert');
// $updateInsert = explode('^', $this->input->post('updateInsert'));




 $Query = explode('^', $Query1);
 $sale_invoice_id = $this->input->post('invoice_id');
 date_default_timezone_set("Asia/karachi");
 $user = $this->session->userdata('userVal');

$data = array ( 
	 'pay_method' =>$this->input->post('PayM')
	,'paid' =>$this->input->post('paid')
	,'product_id' =>$this->input->post('pro_id')
	,'quantity' =>$this->input->post('quantity')
	,'customer_id'=>$this->input->post('customer')
	,'customer_name'=>$this->input->post('customerName')
	,'total'=>$this->input->post('total')
	,'discount' =>$this->input->post('discount')
	,'user_id' =>$this->input->post('user_id')
	,'sale_agent' =>$user['fullname']
	,'sale_date'=> date('Y-m-d ')
	,'sale_time' => date('H:i A',time())
);


$insertSaleItemList = array(
			'item_name' => $this->input->post('product_names')
		);
	$insertSaleNamesList = array(
				'customer_id' 	=> $this->input->post('customer'),
				'customer_name' 	=>$this->input->post('customerName'),
				'count_date' =>date('Y-m-d ')
			);


	$this->sc_model->insert_ad_sale_invoice_edit($data,$insertSaleItemList,$Query,$proQuery,$insertSaleNamesList,$sale_invoice_id,$cartIDS,$updateInsert,$quantityCheck);

}

public function add_sale_invoice(){

$Query1 =   $this->input->post('Query');
// $ID =   $this->input->post('getproductID');
// $namez1 = explode(' ', $Qu);
 $proQuery = explode('^', $this->input->post('proQuery'));
 	
 $Query = explode('^', $Query1);
 //print_r($namez2);


date_default_timezone_set("Asia/karachi");
$user = $this->session->userdata('userVal');

$data = array ( 
	 'pay_method' =>$this->input->post('PayM')
	,'paid' =>$this->input->post('paid')
	,'product_id' =>$this->input->post('pro_id')
	,'quantity' =>$this->input->post('quantity')
	,'customer_id'=>$this->input->post('customer')
	,'customer_name'=>$this->input->post('customerName')
	,'total'=>$this->input->post('total')
	,'discount' =>$this->input->post('discount')
	,'user_id' =>$this->input->post('user_id')
	,'sale_agent' =>$user['fullname']
	,'sale_date'=> date('Y-m-d ')
	,'sale_time' => date('H:i A',time())
);


$insertSaleItemList = array(
			'item_name' => $this->input->post('product_names')
		);
	$insertSaleNamesList = array(
				'customer_id' 	=> $this->input->post('customer'),
				'customer_name' 	=>$this->input->post('customerName'),
				'count_date' =>date('Y-m-d ')
			);



	$this->sc_model->insert_ad_sale_invoice($data,$insertSaleItemList,$Query,$proQuery,$insertSaleNamesList);

}

public function add_inovice(){
$data = array(
	'invoice_no' => strip_tags($this->input->post('invoice_no')),
	'customer_id' => strip_tags($this->input->post('supplier_id')),
    'item_id' => strip_tags($this->input->post('item_id')),
    'remaining_stock' => strip_tags($this->input->post('remaining_stock')),
    'discount_item_price' => strip_tags($this->input->post('discount_item_price')),
    'selling_price' => strip_tags($this->input->post('selling_price')),
    'total_price' => strip_tags($this->input->post('total_price')),
    'stock_quantity' => strip_tags($this->input->post('quantity')),
    'delivery_charges' => strip_tags($this->input->post('delivery_charges')),
    'net_price' => strip_tags($this->input->post('net_price')),    
    'total_paid' => strip_tags($this->input->post('total_paid')),
    'total_due' => strip_tags($this->input->post('total_due')),
    'payment_method' => strip_tags($this->input->post('payment_method')),
    'dated_created'=> date('m/d/Y h:i:s', time())
	);
	$in_no = strip_tags($this->input->post('invoice_no'));
	$ret = $this->sc_model->addSale($data);
	if($ret){
		$path = $this->extra_lib->path;
		$red = base_url().$path."/sales/print_invoice/".$in_no;
		redirect($red);
	}
}

public function print_invoice($id = null){
	$data['sale_reports'] = $this->sc_model->getSaleBYID($id);
	
	$data['title'] =  "print invoice";
	$this->load->view('admin/sale_add_print',$data);
}

	public function addsale(){
	$data = array(
		  'supplier_name'	=> $this->input->post('supplier_name'),
		  'remaining_stock'	=> $this->input->post('remaining_stock'),
		  'stock_quantity'	=> $this->input->post('stock_quantityitem_price'),
 		  'item_price'	=> $this->input->post('item_price'),		  
 		  'total_price'	=> $this->input->post('total_price'),
 		  'discount'	=> $this->input->post('discount')
	);
	$data['title'] = "print sale";
	$this->load->view('admin/sale_add_print',$data);
	}



	public function total_sale(){
		$item_price = $this->input->post('item_price');
		$quantity = $this->input->post('quantity');
		$total =  $item_price * $quantity;
		echo $total; 
	}	
	public function discount(){
		$fig = $this->input->post('discount');
		$price = $this->input->post('t_price');
	// $percentage = $fig;
	// $totalWidth = $price;
	// // $new_width = ($percentage / 100) * $totalWidth;
	// $neMo = $price - $new_width;
	// echo $neMo;
		$total = $price - $fig; 
		echo $total;
	}	

	public function insertItem(){

		$data = array(

	"item_name" 		=> strip_tags($this->input->post('item_name')),
	"item_detail" 		=> strip_tags($this->input->post('item_detail')),
	"category_id" 		=> strip_tags($this->input->post('category_id')),
	"item_type" 		=> strip_tags($this->input->post('item_type')),
	"company_name" 		=> strip_tags($this->input->post('company_name')),
	"supplier_id" 	=> strip_tags($this->input->post('supplier_id')),
	"unit_price" 		=> strip_tags($this->input->post('unit_price')),
	"selling_price" 	=> strip_tags($this->input->post('selling_price')),
	"stock_item" 		=> strip_tags($this->input->post('stock_item')),
	"expire_date" 	=> strip_tags($this->input->post('expiration_date'))				
		);
$dtype = array(
	"spec" 		=> strip_tags($this->input->post('Specification'))
);
	
		$ret  = $this->sc_model->insertItem($data,$dtype);		
		if($ret){
			$red = base_url().$this->extra_lib->path."/items/add_item";
			redirect($red);		
		}
	}	

}
	?>