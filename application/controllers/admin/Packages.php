<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class packages extends CI_Controller {

	public function index()
	{


		$data['packages'] = $this->sc_model->get_packages();
 		$path = $this->extra_lib->path."/packages.php";
 		$data['title'] = "Admin panel - Set Packages";
		$this->load->view($path,$data);
	}

	public function add_package($pkg =  null){
		$data = array (
			'package_name' 	=> $this->input->post('package_name'),
			'package_price' => $this->input->post('package_price'),
			'package_detail'=> $this->input->post('package_detail')
		);
	
			$retV = $this->sc_model->add_package($data);
			if($retV){
				$this->session->set_flashdata('msg','package has been added');
				$p = $this->extra_lib->path."/packages";
				redirect($p);
			}

	}
	 public function delete_package($id = null){

	 	$del = $this->sc_model->delete_package($id);
		if($del){
				$this->session->set_flashdata('remove','package has been removed');
				$p = $this->extra_lib->path."/packages";
				redirect($p);
			}		
	}
	 public function package_edit($id = null){
		$data['packages'] = $this->sc_model->get_packages();
		$data['packagesID'] = $this->sc_model->get_package_with_id($id);

 		$data['title'] = "Admin panel - Set Packages";
		$this->load->view('admin/edit_package.php',$data); 	

}
public function update_package($id){

		$id = $this->input->post('id');
		$data = array (
			'package_name' 	=> $this->input->post('package_name'),
			'package_price' => $this->input->post('package_price'),
			'package_detail'=> $this->input->post('package_detail')
		);
	
			$retV = $this->sc_model->update_package($id,$data);
			if($retV){
				$this->session->set_flashdata('msg','package has been updated');
				$p = $this->extra_lib->path."/packages";
				redirect($p);
 			}	
	}	
}