<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class users extends CI_Controller {

	public function index(){
		
		redirect(base_url().'user/login');
		
	}
	
	public function login(){

		
		$data['title'] = SITE_NAME.': Login';
		$data['msg'] = '';

		 sha1($this->input->post('password')).'<br>';
		$rare = strip_tags($this->input->post('password'));
 		 $password = sha1($rare);
		
		$userRow = $this->member_model->authenticate_member($this->input->post('email'), $password);
		
		if(!$userRow){

			$data['msg'] = 'Wrong email or password provided';
			$this->load->view('login', $data);
			return;
		}
			
		if($userRow->status=='inactive'){

			$data['msg'] = 'You have not yet verified your email address.';
			$this->load->view('login', $data);
			return;
		exit();
		}
		if($userRow->status=='blocked'){
			$data['msg'] = 'Your profile has been blocked.';
			$this->load->view('login', $data);
			return;
		}
			$data['msg'] = 'Login Failed, Sorry, we\'re having some technical issues.';
			$this->load->view('login', $data);
			return;
		exit;			
//temprorily account locked test the code for more		

		$user_data = array(
				'member_id' => $userRow->id,
				 'username' => $userRow->username,
				 'email' => $userRow->email,
				 'is_user_login' => TRUE);
		
		$this->session->set_userdata('userVal',$user_data);
		
		
		$login_back = substr($this->input->post('session_url'), 0,19);
		$login_back2 =substr($this->input->post('session_url'),19,100); 
		

		if($login_back == '/subkuchsell/login?'){
		redirect(base_url().$login_back2);
}
else{
		redirect(base_url().'profile/'.$userRow->username, '');

	$data['msg'] = "Login Failed, Sorry, we're having some technical issues "; 
	$this->load->view('login',$data);
	}
	}	
		
	public function forgot(){
		
		$data['title'] = SITE_NAME.': Forgot';
		$data['msg'] = '';
		
		$this->form_validation->set_rules('email', 'email address', 'trim|required|secure|valid_email');
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('forgot', $data);
			return;
		}
		
		$verification_code=$this->member_model->get_member_by_email($this->input->post('email'));
		
		if($verification_code){
				$row_email = $this->email_templates_model->get_record_by_id(10);
				$config = array();
			 
			
         //Load email library 
	   		$config['protocol']    = 'smtp';
	        $config['smtp_host']    = 'ssl://smtp.gmail.com';
	        $config['smtp_port']    = '465';
	        $config['smtp_timeout'] = '7';
	        $config['smtp_user']    = 'imaijoo@gmail.com';
	        $config['smtp_pass']    = 'alialiali123';
	        $config['charset']    = 'utf-8';
	        $config['newline']    = "\r\n";
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';
	        $config['validation'] = TRUE; // bool whether to validate email or not      


				$this->email->initialize($config);
				$this->email->clear(TRUE);
				$this->email->from($row_email->from_email, $row_email->from_name);
				$this->email->to($this->input->post('email'));
				$this->email->subject($row_email->email_subject);
			
			
		$email_content =' 
            <div style="background:#ab0505; width:100%; height: auto; padding: 10px; color:#374953; font-family: arial,sans-serif;">
            <a href="https://www.subkuchsell.com">
            
            </a>
            </div>
            <div style="padding:10px; background:white;  width:100%;  color:#374953; font-family: arial,sans-serif;">
            <pre>
            Dear User,

            Hi Dear User here is password reset link kindly click on <a href="https://www.subkuchsell.com/verification/'.$verification_code.'">Reset</a> and reset your password now.  

if link is broken then Copy this URL to your address bar 
https://www.subkuchsell.com/verification/'.$verification_code.'

            



            Best wishes,
            The Subkuchsell Team
            

            
            <div align="center">
            <img src="https://www.subkuchsell.com/kumbharPro/images/subkuchsell.jpg">
            </div>


            <div align="center"></div>
            <div style="padding:10px; margin-top:25px; background:#F1F2F6; width:100%;  color:#374953; font-family: arial,sans-serif;">
            <hr color="#CCCCCC">

            

            </div>
            ';



        		$mail_message = $email_content;
				$this->email->message($mail_message);					
				$this->email->send();		

				$data['msg'] = 'An email has been sent to you.';
				$this->load->view('login', $data);

		} 
		else
		{
				$data['msg'] = 'Sorry your email is not registered please sign up.';
				$this->load->view('forgot', $data);		}


		
	}

	public function verifyUser($vCode){
		
		$data['msg'] = '';
		
				
		$verification_code=$this->member_model->get_member_by_VCode($vCode);
		
		if($verification_code){
				 $member_array = array(

										'verification_code' => $verification_code,
	 	);		

		$rowUpd = $this->member_model->updateUsersV($member_array);

				$data['msg'] = 'your account is verified now.';
				$this->load->view('login', $data);

		} 
		else
		{
				$data['msg'] = 'Sorry your email is not registered please sign up.';
				$this->load->view('forgot', $data);		}
}

	public function report_user(){


		$member_array = array(
								'username' => $this->input->post('username'),
								'userID' => $this->input->post('userID'),
								'user_report' => $this->input->post('user_report'),
								'requested_user' => $this->input->post('requested_user'),
								);
	
	
		$this->member_model->add_user_report($member_array);

		redirect(base_url().'profile/'.$this->session->userdata('username'));
	}
	
	public function reset($vcode){
		$data['title'] = SITE_NAME.': Reset Password';
		$data['msg'] = '';
		if($vcode){
			
			$this->form_validation->set_rules('pass', 'Password', 'trim|required|secure');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('reset_view', $data);
				return;
			}
		
			$row = $this->member_model->authenticate_by_verification_code2($vcode);
			
			
			
			$pass=md5($this->input->post('pass'));
			if($row){
				$this->member_model->update_member($row->id,array('password'=>$pass));
				$data['title'] = SITE_NAME.': Login';
				$data['msg'] = 'Password has been changed successfully.';
				$this->load->view('login_view', $data);
				return;
			}else{
				redirect(base_url('user/login/?err'));
			}
		}
		else
			redirect(base_url('user/login?err1'));
	}
	
	
	public function logout() {
						
		$user_data = array(
		 'member_id' => '',
		 'username' => '',
		 'photo' => '',
		 'name' => '',
		 'is_user_login' => FALSE);
		  
		$this->session->set_userdata($user_data);
		$this->session->unset_userdata($user_data);
		redirect(base_url(), 'refresh'); 
	}
}