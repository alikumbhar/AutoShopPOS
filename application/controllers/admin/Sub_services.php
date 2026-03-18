<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sub_services extends CI_Controller {

	public function index()
	{
		
		$data['services'] = $this->sc_model->get_service();
		$data['sub_services'] = $this->sc_model->get_sub_services_with_service();
		
		$data['title'] = 'Admin panel - Add Sub Category Service';
		$this->load->view('admin/sub_services',$data);
	}

public function add_sub_service(){


		      	$config['upload_path']          = 'assets/uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 2048;
                $config['max_height']           = 1080;
				$this->upload->initialize($config);
                $this->load->library('upload', $config);
			$files           = $_FILES;;
		$filename  = basename($files['userfile']['name']);
		$extension = pathinfo($filename, PATHINFO_EXTENSION);
		$str1 = str_replace('.jpg','',$filename);
		$title = $this->input->post('sub_service_name');
		$new     = $title.'-'.rand(100,1000).'.'.$extension;

				$_FILES['userfile']['name'] = $new; //$files['files']['name'][$i];

				$_FILES['userfile']['type'] = $files['userfile']['type'];

				$_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'];

				$_FILES['userfile']['error'] = $files['userfile']['error'];

				$_FILES['userfile']['size'] = $files['userfile']['size'];

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $err = array('error' => $this->upload->display_errors());

                        $data['title'] = "Set Episeode";
                        $this->session->set_flashdata('errors',$err);
                        redirect('admin/sub_services');
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

		$EppArr = array(
					'sub_service_name' => $this->input->post('sub_service_name'),
					'sub_service_price' => $this->input->post('sub_service_price'),
					'images' => $_FILES['userfile']['name'],
					'service_id' => $this->input->post('service_id')												
				);


		$retV = $this->sc_model->add_sub_service($EppArr);
		if($retV){
				$this->session->set_flashdata('msg','sub service has been added');
				$p = $this->extra_lib->path."/sub_services";
				redirect($p);
			}
                }





	
	}
	 public function delete_sub_service($id = null,$photo){

	 	$del = $this->sc_model->delete_sub_service($id);
		if($del){
			$directory = "assets/uploads/".$photo;
			unlink($directory);
				$this->session->set_flashdata('remove','service has been removed');
				$p = $this->extra_lib->path."/sub_services";
				redirect($p);
			}		
	}

	 public function edit_sub_service($id = null){
	 	$data['services'] = $this->sc_model->get_service();
		$data['edit_serviceID'] = $this->sc_model->get_sub_service_with_id($id);

 		$data['title'] = "Admin panel - Edit Service";
		$this->load->view('admin/edit_sub_services.php',$data); 	

	}
	public function update_sub_service($id=null){


		      	$config['upload_path']          = 'assets/uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 2048;
                $config['max_height']           = 1080;
				$this->upload->initialize($config);
                $this->load->library('upload', $config);
			$files           = $_FILES;;
		$filename  = basename($files['userfile']['name']);
		$extension = pathinfo($filename, PATHINFO_EXTENSION);
		$str1 = str_replace('.jpg','',$filename);
		$title = $this->input->post('sub_service_name');
		$new     = $title.'-'.rand(100,1000).'.'.$extension;

				$_FILES['userfile']['name'] = $new; //$files['files']['name'][$i];

				$_FILES['userfile']['type'] = $files['userfile']['type'];

				$_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'];

				$_FILES['userfile']['error'] = $files['userfile']['error'];

				$_FILES['userfile']['size'] = $files['userfile']['size'];

                if ( ! $this->upload->do_upload('userfile'))
                {
                        


                        //$this->session->set_flashdata('errors',$err);
                        redirect('admin/sub_services');
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

		$pho = $this->input->post('photo');
		$directory = './assets/uploads/'.$pho;
		unlink($directory);

		$id = $this->input->post('sub_id');
		
		$data = array(
			'sub_service_name' => $this->input->post('sub_service_name'),
			'sub_service_price' => $this->input->post('sub_service_price'),
			'images' => $_FILES['userfile']['name'],
			'service_id' => $this->input->post('service_id')												
		);

			$retV = $this->sc_model->update_sub_service($id,$data);
			if($retV){
				$this->session->set_flashdata('msg','Sub service has been updated');
				$p = $this->extra_lib->path."/sub_services";
				redirect($p);
 			}	

                }


	}	 	


}
	?>