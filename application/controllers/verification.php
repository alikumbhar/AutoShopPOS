<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Verification extends CI_Controller {

	

	public function index($vcode=''){

		

		$data['msg'] = 'An email has been sent to you. Please verify it to activate your account. NOTE: Please also check your junk mail.';

		

		if($vcode){

			$userRow = $this->sc_model->authenticate_by_verification_code($vcode);	

			

		

		

			if($userRow){



		// $user_data = array(

		// 		'member_id' => $userRow->id,

		// 		 'username' => $userRow->username,

		// 		 'email' => $userRow->email,

		// 		 'is_user_login' => TRUE);
		
		$user_data = array(
				'id' => $userRow->id,
				 'fullname' => $userRow->fullname,
				 'email' => $userRow->email,
				 'role_id' => $userRow->role_id,				 		
				 'status'  => $userRow->status,
				 'role_name'=>$getRole->name
				);
		

		$this->session->set_userdata('userVal',$user_data);



		redirect(base_url().'update_passowrd');		

				 exit;

			}

			else

				$data['msg'] = 'There is something wrong with verification.';

		}

		

		$data['title'] = SITE_NAME.': Verification';



		$this->load->view('verification_view', $data);

		

	}	



}

