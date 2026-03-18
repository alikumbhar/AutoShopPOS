<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class services extends CI_Controller {

	public function index()
	{
		

		$data['services'] = $this->sc_model->get_service(); 
		$data['title'] = 'Admin panel - add service category';
		$this->load->view('admin/services',$data);
	}

	public function add_service(){

$userID = $this->session->userdata('userVal');

$data = array(
				'service'=> strip_tags($this->input->post('service')),
				'service_type'=> strip_tags($this->input->post('service_type')),
				'price'=> strip_tags($this->input->post('price')),
				'discount_allowed'=> strip_tags($this->input->post('discount')),
				'service_detail'=> strip_tags($this->input->post('detail')),
				'vehicle_type'=> strip_tags($this->input->post('vehicle_type')),	
				'user_id' =>$userID['id']								
			);
		$retV = $this->sc_model->add_service($data);
		if($retV){
				$this->session->set_flashdata('msg','service has been added');
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
			'service' => $this->input->post('service'),
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