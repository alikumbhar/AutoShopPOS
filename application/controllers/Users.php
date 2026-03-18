 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Controller {

	public function index()
	{
		redirect('/');
	}

	public function add_users(){
		


		$arr = array(
					'wallet_id'=>$this->input->post('method'),
					'account_no'=>$this->input->post('account_no'),
					'u_type' =>'primary'
		);
		$currentDateTime = date("Y-m-d H:i:s");
		$newTime = date('h:i A', strtotime($currentDateTime));
		$newDate = date('Y-m-d', strtotime($currentDateTime));
		$ip = $this->input->ip_address();
		$data = array(
			'fullname' => strip_tags($this->input->post('fullname')),
			'user_name' => strip_tags($this->input->post('username')),			
			'user_email' => $this->input->post('email'),
			'user_password' => $this->input->post('password'),
			'wallet'=>$this->input->post('type'),
			'user_status'			=> 'yes',					
			'reg_date' =>$newDate,
			'reg_time' =>$newTime,
			'user_ip'  =>$ip
		);



    	$retV = $this->crypto_model->add_users($data,$arr);

		if($retV ==1){  
				$p = base_url()."page=deposit";
				redirect($p);
			exit();
			}

				
	}


		
	
		}
	?>