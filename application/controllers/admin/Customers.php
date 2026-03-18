<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

	public function index()
	{
		
		// $data['category'] = $this->sc_model->getItems();
		// $data['title'] = "Items view";
		// $this->load->view('admin/suppliers_list',$data);
			$red = base_url().$this->extra_lib->path."/Customer/add_customer";
			redirect($red);		
	}

	public function add_customer(){
			$data['customer'] = $this->sc_model->getCustomer();
		$data['title'] = "Add new Customer";
		$this->load->view('admin/customer_add',$data);
	}

	public function insertCustomer(){

$data = array(
"firstname" 		=> strip_tags($this->input->post('firstname')),
"lastname" 		=> strip_tags($this->input->post('lastname')),
"email" 		=> strip_tags($this->input->post('email')),
"mobile" 		=> strip_tags($this->input->post('mobile')),
"address" 		=> strip_tags($this->input->post('address')),
"postal_code" 	=> strip_tags($this->input->post('postal_code')),
"country" 		=> strip_tags($this->input->post('country')),
"status" 		=> strip_tags($this->input->post('status')),
"created_user_id"		=>strip_tags($this->input->post('created_user_id')),
"created_datetime"		=>date('m/d/Y h:i:s', time())
);

		$ret  = $this->sc_model->insertCustomer($data);		
		if($ret){
				$this->session->set_flashdata('msg','Customer has been updated');
				$p = $this->extra_lib->path."/Customers/add_customer";
				redirect($p);
		}
	}	


	 public function edit_customer($id = null){

		$data['supplierID'] = $this->sc_model->get_customer_with_id($id);

 		$data['title'] = "Edit Customer";
		$this->load->view('admin/edit_customer.php',$data); 	

	}	


	public function update_customer($id=null){

		$id = $this->input->post('id');

$data = array(
"firstname" 		=> strip_tags($this->input->post('firstname')),
"lastname" 		=> strip_tags($this->input->post('lastname')),
"email" 		=> strip_tags($this->input->post('email')),
"mobile" 		=> strip_tags($this->input->post('mobile')),
"address" 		=> strip_tags($this->input->post('address')),
"postal_code" 	=> strip_tags($this->input->post('postal_code')),
"country" 		=> strip_tags($this->input->post('country')),
"status" 		=> strip_tags($this->input->post('status')),
"updated_user_id"		=>strip_tags($this->input->post('created_user_id')),
"updated_datetime"		=>date('m/d/Y h:i:s', time())
);



			$retV = $this->sc_model->update_customer($id,$data);
			if($retV){
				$this->session->set_flashdata('msg','customer has been updated');
				$p = $this->extra_lib->path."/Customers/add_customer";
				redirect($p);
 			}	
	}

	 public function delete_customer($id = null){

	 	$del = $this->sc_model->delete_customer($id);
		if($del){
				$this->session->set_flashdata('remove','customer has been deleted');
				$p = $this->extra_lib->path."/Customers/add_customer";
				redirect($p);
			}		
	}	

}
	?>