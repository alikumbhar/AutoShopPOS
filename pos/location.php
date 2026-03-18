<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class location extends CI_Controller {

	public function index()
	{
		

		$data['location'] = $this->sc_model->get_location();
		$data['title'] = 'Admin panel - Set location';
		$this->load->view('admin/location',$data);
	}

	public function add_location(){

		$data = array(
			'postal_city' => $this->input->post('postal_city'),
			'postal_code' => $this->input->post('postal_code')		
			);
		$retV = $this->sc_model->add_location($data);
		if($retV){
				$this->session->set_flashdata('msg','location has been added');
				$p = $this->extra_lib->path."/location";
				redirect($p);
			}	
	}
	 public function delete_location($id = null){

	 	$del = $this->sc_model->delete_location($id);
		if($del){
				$this->session->set_flashdata('remove','location has been removed');
				$p = $this->extra_lib->path."/location";
				redirect($p);
			}		
	}

	 public function edit_location($id = null){
		$data['locationID'] = $this->sc_model->get_location_with_id($id);

 		$data['title'] = "Admin panel - Edit location";
		$this->load->view('admin/edit_location.php',$data); 	

	}
	public function update_location($ids=null){

		$id = $this->input->post('postal_id');

		$data = array(
			'postal_city' => $this->input->post('postal_city'),
			'postal_code' => $this->input->post('postal_code')		
			);
	
			$retV = $this->sc_model->update_location($id,$data);
			if($retV){
				$this->session->set_flashdata('msg','location has been updated');
				$p = $this->extra_lib->path."/location";
				redirect($p);
 			}	
	}	
}
	?>