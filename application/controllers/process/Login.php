<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
	
function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model("crypto_model");
    }
	public function index(){
		


		$data['title'] = "login";
		$data['msg'] = '';

		
		$rare = strip_tags($this->input->post('password'));
 		
 		//$password = sha1($rare);

		$userRow = $this->crypto_model->authenticate_users($this->input->post('username'), $rare);

		if(!$userRow){

			$this->session->set_flashdata('msg','Wrong username or password provided');
			redirect('login');
			return;
		}
			
		if($userRow->status=='0'){

			$this->session->set_flashdata('msg','you are blocked by admin.');
			redirect('login');
			return;
		exit();
		}


		$user_data = array(

				 'id' => $userRow->id,
				 'user_name' => $userRow->user_name,
				 'fullname' => $userRow->fullname,
				 'user_email'  => $userRow->user_email,
				 'user_status'=>$userRow->user_status,
				 'reg_date' => $userRow->reg_date,
				 'reg_time' => $userRow->reg_time, 
				 'perfect_money'=>$userRow->perfect_money,
				 'payeer'=>$userRow->payeer,
				 'bitcoin'=>$userRow->bitcoin				 				 
				);

		
			$this->session->set_userdata('userVal',$user_data);
						$r = base_url()."deposit";
						redirect($r);	
		

	}	
}