<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pm extends CI_Controller {

	public function index()
	{
	$t = base_url()."deposit";
	redirect($t);
	}

	public function status(){
	$t = base_url()."deposit";
	redirect($t);
	}

	public function success(){

		$now = date("G:i:s");
		$currentDateTime = date("Y-m-d H:i:s");
		$newTime = $now;
		$newDate = date('Y-m-d', strtotime($currentDateTime));
	if(!empty($this->input->get('PAYER_ACCOUNT'))){ }else{  ?>
				<script type="text/javascript">
					window.location="<?php echo base_url().'deposit';?>";
				</script>
	<?php }
	$am_gonce = $this->session->userdata('gonce');
	$gonce_user = $this->session->userdata('gonce_user');	
	
	$data = array(
		'user_id' =>$gonce_user,
		'plan_id' =>1,
		'account_no' =>$this->input->get('PAYER_ACCOUNT'),
		'balance_deposit' =>$am_gonce,
		'dep_date'=>$newDate,
		'dep_time'=>$newTime,
		'status'	=>$this->input->get('status'),
		'e_wallet_no'=>$this->input->get('walletid'),
		'operation_id' =>"325448544".rand(150,350)
	);
  
$batch = $this->input->get('PAYMENT_BATCH_NUM');
if($this->input->get('PAYMENT_BATCH_NUM') > 0){
	if ($this->session->userdata('nonce') != $this->input->get('status')) 
		{
			$this->session->set_flashdata('msg','your deposit amount have been added in our database  ID - '.$batch);
			$t = base_url()."deposit";
			redirect($t);			
		}else{	
		$r = $this->crypto_model->set_deposit_payeer_pm($data);	
			 $this->session->set_userdata('nonce',null);
		unset($data);
		if($r == 1 ){ 
			$this->session->set_flashdata('msg','your deposit amount have been added in our database ID - '.$batch);
			$t = base_url()."deposit";
			redirect($t);
		}
		}



	}
}	

	public function fail(){

		 if($this->input->get('PAYMENT_BATCH_NUM') == 0){
		 	$this->session->set_flashdata('msg','query failed please retry or contact support! ');
		 	$r = base_url().'deposit';
		 	redirect($r);
		 }else{
			$t = base_url()."deposit";
			redirect($t);
		 }		
	}		
}