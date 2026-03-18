<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class get_password extends CI_Controller {

	public function index()
	{
		$this->load->view('get_password');
	}


		
	public function forget(){
		
		$data['title'] = ' Forgot';
		$data['msg'] = '';
		
		$this->form_validation->set_rules('email', 'email address', 'trim|required|secure|valid_email');
		if ($this->form_validation->run() === FALSE) {
		
			$this->session->set_flashdata('msg2','please enter email address');
			redirect(base_url());
			return;
		}
		
		$verification_code=$this->sc_model->get_member_by_email($this->input->post('email'));
		
		if($verification_code){
//		$row_email = $this->email_templates_model->get_record_by_id(10);
			// 	$config = array();
			 
			
   //       //Load email library 
	  //  		$config['protocol']    = 'smtp';
	  //       $config['smtp_host']    = 'ssl://smtp.gmail.com';
	  //       $config['smtp_port']    = '465';
	  //       $config['smtp_timeout'] = '7';
	  //       $config['smtp_user']    = 'imaijoo@gmail.com';
	  //       $config['smtp_pass']    = 'alialiali123';
	  //       $config['charset']    = 'utf-8';
	  //       $config['newline']    = "\r\n";
			// $config['wordwrap'] = TRUE;
			// $config['mailtype'] = 'html';
	  //       $config['validation'] = TRUE; // bool whether to validate email or not      


			// 	$this->email->initialize($config);
			// 	$this->email->clear(TRUE);
			// 	$this->email->from('info@techobites.com', 'Techobites');
			// 	$this->email->to($this->input->post('email'));
			// 	$this->email->subject('Password Recover Email');
			
	//	$row_email = $this->email_templates_model->get_record_by_id(10);
		$this->load->library('email');

		$config = array();

		$config['wordwrap'] = TRUE;

		$config['mailtype'] = 'html';

	

		$this->email->initialize($config);

        $this->email->clear(TRUE);

        $this->email->from('alikumbharr@gmail.com');

        $this->email->to('yasirrrali@gmail.com');

        $sub = "Update Forget password ";

        $this->email->subject($sub);			
			
	$email_content =' 
        <div style="background:#ab0505; width:100%; height: auto; padding: 10px; color:#374953; font-family: arial,sans-serif;">
        <a href="http://automanic.techobites.com">
        
        </a>
        </div>
        <div style="padding:10px; background:white;  width:100%;  color:#374953; font-family: arial,sans-serif;">
        <pre>


        <b>Our Team recently received a request for a forgotten password.</b>


To change your Automanic password, please click on this <a href="http://automanic.techobites.com/verification/'.$verification_code.'">link</a>.

If you did not request this change, you do not need to do anything.



Thanks,
Techobites Support


if link is broken then Copy this URL to your address bar 
http://automanic.techobites.com/verification/'.$verification_code.'


        


        <div align="center"></div>
        <div style="padding:10px; margin-top:25px; background:#F1F2F6; width:100%;  color:#374953; font-family: arial,sans-serif;">
        
        

        </div>
        ';



        		$mail_message = $email_content;
				$this->email->message($mail_message);					
				$this->email->send();		

			$this->session->set_flashdata('msg2','An email has been sent to you');
		//	redirect(base_url());
 if (! $this->email->send())
  {
    echo 'Failed';

    // Loop through the debugger messages.
    foreach ($this->email->get_debugger_messages() as $debugger_message)
      echo $debugger_message;

    // Remove the debugger messages as they're not necessary for the next attempt.
    $this->email->clear_debugger_messages();
  }
  else {
    echo 'Sent';
}

		} 
		else
		{
		echo "here";
				$data['msg'] = 'Sorry your email is not registered please sign up.';
			$this->session->set_flashdata('msg','Sorry your email is not registered please sign up');
		//	redirect(base_url('get_password'));
			}


		
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
		
			$row = $this->sc_model->authenticate_by_verification_code2($vcode);
			
			
			
			$pass=md5($this->input->post('pass'));
			if($row){
				$this->sc_model->update_member($row->id,array('password'=>$pass));
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
	
}	
