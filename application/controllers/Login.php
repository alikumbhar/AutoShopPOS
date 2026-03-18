<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
	
function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model("sc_model");
    }
	public function index(){
		


		$data['title'] = "login";
		$data['msg'] = '';

		
		$rare = strip_tags($this->input->post('password'));
 		
 		//$password = sha1($rare);

		$userRow = $this->sc_model->authenticate_users($this->input->post('email'), $rare);

		if(!$userRow){

			$this->session->set_flashdata('msg','Wrong email or password provided');
			redirect('/');
			return;
		}
			
		if($userRow->status=='0'){

			$this->session->set_flashdata('msg','you are blocked by admin.');
			redirect('/');
			return;
		exit();
		}

		$getRole = $this->sc_model->getAdminrole($userRow->role_id);

		$user_data = array(
				'id' => $userRow->id,
				 'fullname' => $userRow->fullname,
				 'email' => $userRow->email,
				 'role_id' => $userRow->role_id,				 		
				 'status'  => $userRow->status,
				 'role_name'=>$getRole->name
				);
		if($user_data['role_id'] == 3 ){
			$this->load->library('session');
			$this->session->sess_expiration = '14400';
			$this->session->set_userdata('userVal',$user_data);
			
			redirect('pos');
		}
		else{
			$this->load->library('session');
			$this->session->sess_expiration = '14400';					
			$this->session->set_userdata('userVal',$user_data);
			
			redirect('admin/dashboard');	
		}

	}	
}