<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class deposit extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	public function index()
	{
		$users = $this->session->userdata('userVal');

       	$data['balance'] = $this->crypto_model->getTotalavailableBalance($users['id']);
	     $data['allInvest'] = $this->crypto_model->totalinvestByUser($users['id']);   
	     $data['totalwithdraw'] = $this->crypto_model->gettotalwithdraw($users['id']);
//totalinvest
		$data['title'] = "Home Deposit";
		$this->load->view('users/open_deposit',$data);
	}


	public function confirm_deposit()
	{



$plan = $this->input->post('h_id');
$percent = "";
$min = "";
if($plan == 1){
$percent = 180;
$min = 0.3;
}if($plan == 2){
$percent = 260;
$min = 10;
}if($plan == 3){
$percent = 340;
$min = 50;
}
	
		$now = date("G:i:s");
		$currentDateTime = date("Y-m-d H:i:s");
		$newTime = $now;
		$newDate = date('Y-m-d', strtotime($currentDateTime));

		$methods = $this->input->post("type");		


		$GW = explode('-', $methods);
		$testIF  = 	  $GW[0];
		$account_no = $GW[1];

	$amount = 	$this->input->post('amount');
	$users = $this->session->userdata('userVal');
	$data['sendData'] = array(
		'user_id' =>$users['id'],
		'balance_deposit' =>$amount,
		'dep_date'=>$newDate,
		'dep_time'=>$newTime,
		'status'	=>'yes',
		'e_wallet_no'=>$testIF,
		'plan'=>$percent,
		'min'=>$min
	);
		$this->load->view('users/confirm_deposit',$data);
	}

	public function addTransaction(){
		$now = date("G:i:s");
		$currentDateTime = date("Y-m-d H:i:s");
		$newTime = $now;
		$newDate = date('Y-m-d', strtotime($currentDateTime));

	
		$TrX = array(
		'transaction_id' => $this->input->post('transaction_id'), 
		'user_id' => $this->input->post('user_id'),
		'walletid' => $this->input->post('walletid'),
		'method' => $this->input->post('method'),
		'status'=>'yes',
		'daters'=>$newDate,
		'timers'=>$newTime,
		'action'=>'unconfirmed'

	);
		$trx1 = $this->crypto_model->insertTrx($TrX);
		
		if($trx1 ==0){
			$this->session->set_flashdata('msg','Failed to update transactionID please try again'); ?>
			<script type="text/javascript">
				window.location = "<?php echo base_url().'deposit/';?>"
			</script>
		<?php }else{
			$this->session->set_flashdata('msg','your transaction ID waiting for confimation'); ?>
			<script type="text/javascript">
				window.location = "<?php echo base_url().'deposit/';?>";
			</script>			
		<?php 
	}
	}
}



