<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pages extends CI_Controller {

	public function index()
	{
		$path =  $this->extra_lib->path;
		$data['pages'] = $this->sc_model->get_page();
		$data['title'] = "Admin Panel - Add Pages";
		$this->load->view($path.'/pages',$data);
	}

	public function add_page(){

		$data = array(
			'menu' => $this->input->post('menu'),
			'page_url' => $this->input->post('page_url'),
			'seo_title' => $this->input->post('seo_title'),
			'seo_description' => $this->input->post('seo_description')			
		);

		$retV = $this->sc_model->add_page($data);
		if($retV){
				$this->session->set_flashdata('msg','page has been added');
				$p = $this->extra_lib->path."/pages";
				redirect($p);
			}	
	}
	 public function delete_page($id = null){

	 	$del = $this->sc_model->delete_page($id);
		if($del){
				$this->session->set_flashdata('remove','package has been removed');
				$p = $this->extra_lib->path."/pages";
				redirect($p);
			}		
	}

	 public function edit_page($id = null){
		$data['pageID'] = $this->sc_model->get_page_with_id($id);

 		$data['title'] = "Admin panel - Edit Page";
		$this->load->view('admin/edit_page.php',$data); 	

	}
public function update_page($id=null){

		$id = $this->input->post('menu_id');

		$data = array(
			'menu' => $this->input->post('menu'),
			'page_url' => $this->input->post('page_url'),
			'seo_title' => $this->input->post('seo_title'),
			'seo_description' => $this->input->post('seo_description')			
		);
	
			$retV = $this->sc_model->update_page($id,$data);
			if($retV){
				$this->session->set_flashdata('msg','page has been updated');
				$p = $this->extra_lib->path."/pages";
				redirect($p);
 			}	
	}	 
}
	?>