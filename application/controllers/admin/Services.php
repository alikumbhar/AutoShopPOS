<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class services extends CI_Controller {

	public function index()
	{
		

		$data['services'] = $this->sc_model->get_service(); 
		$data['title'] = 'Admin panel - add service category';
		$this->load->view('admin/services',$data);
	}

	public function getCalculatedService(){
	
  $data = $this->sc_model->getUnit($this->input->post('val'));
  $strL =  $this->input->post('unit');
  $setQ = $this->input->post('getQuantity');

if(strcmp(trim($strL),'ml') == 0){
	 $p = $data[0]->sale_price / 1000;
	 echo $cz  = $p * $setQ ;
	 
} else{
	echo $cz = $data[0]->sale_price * $setQ;
}
}

	public function getUnit(){
		if($this->input->post('cal') == 1 ){
			$productCost = $this->input->post('productCost');
			$extraCost = $this->input->post('extraCost');	
			$resultAdd = $extraCost + $productCost; 		
			$this->session->set_userdata('totalPrice',$resultAdd);	
			$this->session->unset_userdata('serviceSession');
		}
			$pro_id = $this->input->post('val');
			$Unit = $this->sc_model->getUnit($pro_id);
				foreach($Unit as $getID):
				if($getID->unit =="liter"){
						echo "ml";
					}else{					
					echo $getID->unit; 
				}
				endforeach;
	
			}
public function setSessionService(){
 



   	$arrayNameService = array(
	'product_id' => $this->input->post('product_id'),
	'product_name' => $this->input->post('product_name'),
	'setunit' => $this->input->post('unit'),
	'cost_products' => $this->input->post('cost_products'),
	'getQuantity' => $this->input->post('getQuantity')				
//	'sale_price' => $cz
);

//  $this->session->set_userdata('serviceSession',$arrayNameService);
  //$this->session->unset_userdata('serviceSession');
  $sess = $this->session->userdata('serviceSession');

//$sess=$this->session->userdata('sesse');

 $covr_wrap_mil=array();
 $covr_wrp['']=$this->session->userdata('bar');              
 //$mil=array('miluna_products'=>$milunaid,'total_price'=>$totalprice);            
 $covr_wrap_mil[]=array_merge($covr_wrp,$arrayNameService);

 if(!empty($sess)):   
     $oldses=$sess;                      
     $oldses=array_merge($oldses,$covr_wrap_mil);                            
     $this->session->set_userdata('serviceSession',$oldses);   
 else:
     $this->session->set_userdata('serviceSession',$covr_wrap_mil);   
 endif;

	$mySession=$this->session->userdata('serviceSession');
   	

?>							  	
<table class="table">
  		<tr>
  			<td>Product Name</th>
  			<td>&nbsp</td>
  			<td>Quantity</td>
  			<td>Unit</td>
  			<!-- <td>Cost</td>-->

  			<td>Sale Price</td>  			
  			 <td>Action</td>
  			  			
  		</tr>
  		<?php 
$totalpriceC =0;   	
   	foreach ($mySession as  $value) {
  	 $totalpriceC+=$value['cost_products']; 
  	 ?>

  		<tr>

  		<td><?= $value['product_name']."  "; ?></td>
  		<td>X</td>
  		<td><?= " " .$value['getQuantity']." "; ?></td>
  		<td><?php if(trim($value['setunit']) == 'liter'){ 	echo "ml"; } else{ echo $value['setunit']; } ?></td>
  		<!-- <td><?= " " .$value['cost_products']." "; ?></td>-->
  		
  		<td><?= " @ " .$value['cost_products']." "; ?></td> 
  		<td><i class="fa fa-times" aria-hidden="true"></i>
</td>
  		</tr>		
  	

  	<?php 
	}
	
//	$productCost = $this->session->userdata('totalPrice');
?>
</table>
<input type="" id="productCost" value="<?= $totalpriceC; ?>" class="form-control" disabled="" >
<input type="" id="extra_cost" value="" class="form-control" placeholder="Extra Cost">

<br>
<br>
<button class="btn btn-success" onclick="together()"> Calculate </button>
<button class="btn btn-danger"  onclick="cancel()" > Cancel </button>
<?php
}			
public function add_service(){

if($this->input->post('submit')){ 
$userID = $this->session->userdata('userVal');
 $disc = strip_tags($this->input->post('discount'));
  $ser_pr =  strip_tags($this->input->post('price'));
 $td = $ser_pr / 100 * $disc;

  $after_discount_price = $ser_pr - $td;


 if($disc){
		$price = $after_discount_price;
 }else{
 	$price = strip_tags($this->input->post('price'));
  }

$data = array(
				'service'=> strip_tags($this->input->post('service')),
				'service_type'=> strip_tags($this->input->post('service_type')),
				'price'=> $price,
				'discount_allowed'=> strip_tags($this->input->post('discount')),
				'discount_service'=> $td,				
				'service_detail'=> strip_tags($this->input->post('detail')),
				'vehicle_type'=> strip_tags($this->input->post('vehicle_type')),
				'sp_rand' =>$this->input->post('service').'_'.rand(10,2000),
				'user_id' =>$userID['id'],								
				'entry_date'=>date('Y-m-d')
			);
		$retV = $this->sc_model->add_service($data);
		if($retV){
			$this->session->unset_userdata('totalPrice'); 
				$this->session->set_flashdata('msg','service has been added');
				$p = $this->extra_lib->path."/services";
				redirect($p);
			}	
		}else{
$p = $this->extra_lib->path."/services";
				redirect($p);
		}
	}

	 public function delete_service($id = null){

	 	$del = $this->sc_model->delete_service($id);
		if($del){
				$this->session->set_flashdata('remove','service has been removed');
				$p = $this->extra_lib->path."/services";
				redirect($p);
			}		
	}

	 public function edit_service($id = null){
		$data['serviceID'] = $this->sc_model->get_service_with_id($id);

 		$data['title'] = "Admin panel - Edit Service";
		$this->load->view('admin/edit_service.php',$data); 	

	}
	public function update_service($id=null){

		$id = $this->input->post('service_id');

		$data = array(
				'service'=> strip_tags($this->input->post('service')),
				'service_type'=> strip_tags($this->input->post('service_type')),
				'price'=> strip_tags($this->input->post('price')),
				'discount_allowed'=> strip_tags($this->input->post('discount')),
				'service_detail'=> strip_tags($this->input->post('detail')),
				'vehicle_type'=> strip_tags($this->input->post('vehicle_type')),	
				'user_id' =>$userID['id']								
			);
	
			$retV = $this->sc_model->update_service($id,$data);
			if($retV){
				$this->session->set_flashdata('msg','service has been updated');
				$p = $this->extra_lib->path."/services";
				redirect($p);
 			}	
	}

//add service type
	public function add_service_type($id=null){
		$data['service_types'] = $this->sc_model->get_service_type(); 
		$data['title'] = 'Admin panel - add service Types';
		$this->load->view('admin/services_add',$data);
}	


	 public function edit_service_type($id = null){
		$data['categoryID'] = $this->sc_model->get_service_with_id_type($id);

 		$data['title'] = "Admin panel - Edit Service Type";
		$this->load->view('admin/edit_service_type.php',$data); 	

	}	


	public function update_service_type($id=null){

		$id = $this->input->post('st_id');

		$data = array(
			'service_type' => $this->input->post('service_type'),
		);


			$retV = $this->sc_model->update_service_type($id,$data);
			if($retV){
				$this->session->set_flashdata('msg','Service Type has been updated');
				$p = $this->extra_lib->path."/services/add_service_type/";
				redirect($p);
 			}	
	}

	public function insertServiceType(){
	
		$data = array(
				"service_type" => strip_tags($this->input->post('service_type_name'))
				);
	
		$ret  = $this->sc_model->insertServiceType($data);		
		if($ret){
				$this->session->set_flashdata('msg','category has been Added');
			$red = base_url().$this->extra_lib->path."/services/add_service_type";
			redirect($red);		
		}
	}





	 public function delete_service_type($id = null){

	 	$del = $this->sc_model->delete_service_type($id);
		if($del){
				$this->session->set_flashdata('remove','Service type has been deleted');
				$p = $this->extra_lib->path."/services/add_service_type";
				redirect($p);
			}		
	}	


}
	?>