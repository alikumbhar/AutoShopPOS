<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class suppliers extends CI_Controller {

	public function index()
	{
		
		$data['category'] = $this->sc_model->getItems();
		$data['title'] = "Items view";
		$this->load->view('admin/suppliers_list',$data);

	}

	public function add_supplier(){
			$data['supplier'] = $this->sc_model->getSupplier();
		$data['title'] = "Add new supplier";
		$this->load->view('admin/supplier_add',$data);
	}

	public function getSupplierBySelect(){ 
			$supplier = $this->sc_model->getSupplier();		?>

			                        <div class="form-group" id="getSupplierRefresh">
                        <select id="supplier_id" required=""  class="selectpicker form-control" data-live-search="true" >          
                        <option>Select Supplier</option>
                        <?php foreach($supplier as $sup): ?>
                        <option value="<?= $sup->supplier_id; ?>"><?= $sup->supplier_name?></option>
                        <?php endforeach; ?>
                        </select>

<a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#supplierModal" data-backdrop="false">Add Supplier</a>
</div>
<?php 
	}
	public function insertSupplier(){

$data = array(
"supplier_name" 		=> strip_tags($this->input->post('supplier_name')),
"supplier_email" 		=> strip_tags($this->input->post('supplier_email')),
"supplier_phone" 		=> strip_tags($this->input->post('supplier_phone')),
"supplier_fax" 		=> strip_tags($this->input->post('supplier_fax')),
"supplier_address" 		=> strip_tags($this->input->post('supplier_address')),
"supplier_tax" 	=> strip_tags($this->input->post('supplier_tax')),
"supplier_status" 		=> strip_tags($this->input->post('supplier_status')),
"created_user_id"		=>strip_tags($this->input->post('created_user_id')),
"created_datetime"		=>date('m/d/Y h:i:s', time())
);

		$ret  = $this->sc_model->insertSupplier($data);		
		if($ret){
			$red = base_url().$this->extra_lib->path."/suppliers/add_supplier";
			redirect($red);		
		}
	}	

	public function insertSupplierModal(){

$data = array(
"supplier_name" 		=> strip_tags($this->input->post('supplier_name')),
"supplier_email" 		=> strip_tags($this->input->post('email')),
"supplier_phone" 		=> strip_tags($this->input->post('phone')),
"supplier_address" 		=> strip_tags($this->input->post('address')),
"comments" 		=> strip_tags($this->input->post('sup_comments')),
"created_user_id"		=>strip_tags($this->input->post('created_user_id')),
"created_datetime"		=>date('m/d/Y h:i:s', time())
);

		$ret  = $this->sc_model->insertSupplier($data);		
	if($ret){
		echo "Supplier has been Added";		
		}
	}	


	 public function edit_supplier($id = null){
		$data['supplierID'] = $this->sc_model->get_supplier_with_id($id);

 		$data['title'] = "Admin panel - Edit Supplier";
		$this->load->view('admin/edit_supplier.php',$data); 	

	}	


	public function update_supplier($id=null){

		$id = $this->input->post('supplier_id');

$data = array(
"supplier_name" 		=> strip_tags($this->input->post('supplier_name')),
"supplier_email" 		=> strip_tags($this->input->post('supplier_email')),
"supplier_phone" 		=> strip_tags($this->input->post('supplier_phone')),
"supplier_fax" 		=> strip_tags($this->input->post('supplier_fax')),
"supplier_address" 		=> strip_tags($this->input->post('supplier_address')),
"supplier_tax" 	=> strip_tags($this->input->post('supplier_tax')),
"supplier_status" 		=> strip_tags($this->input->post('supplier_status')),
"created_user_id"		=>strip_tags($this->input->post('created_user_id')),
"updated_datetime"		=> date('m/d/Y h:i:s', time())
);



			$retV = $this->sc_model->update_supplier($id,$data);
			if($retV){
				$this->session->set_flashdata('msg','Supplier has been updated');
				$p = $this->extra_lib->path."/suppliers/add_supplier";
				redirect($p);
 			}	
	}

	 public function delete_supplier($id = null){

	 	$del = $this->sc_model->delete_supplier($id);
		if($del){
				$this->session->set_flashdata('remove','supplier has been deleted');
				$p = $this->extra_lib->path."/suppliers/add_supplier";
				redirect($p);
			}		
	}	

}
	?>