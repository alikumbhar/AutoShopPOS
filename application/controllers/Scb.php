<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scb extends CI_Controller {

	public function index()
	{
	$t = base_url()."a/dashboard";
	redirect($t);
	}

	public function status(){
	$t = base_url()."a/dashboard";
	redirect($t);
	}
	public function callback(){



	$a1 = $this->input->get();
	$a2 = $this->input->post(); 
	$im1 = implode('-', $a1);
	$im2 = implode('-', $a2);
 
	if(!empty($a1)){ 
	$dummy =  array(
					'dummy'=>$im1
						);
	}
	if(!empty($a2)){ 
	$dummy =  array(
					'dummy'=>$im2
						);
	}	

	$this->crypto_model->dummy($dummy);		
	}
  public function success(){

	if(!empty($this->input->post())){ }else{
	redirect('login');
	}
	$a2 = $this->input->post(); 
	$im2 = 	json_encode($a2); 

	if(!empty($a2)){ 
	$dummy =  array(
					'dummy'=>$im2
						);
	$this->crypto_model->dummy($dummy);

		
	}

	if($this->input->post('status') == 100 && $this->input->post('status_text')=="Complete"){


		$this->input->post('currency2');
		$this->input->post('email');
		$amount = $this->input->post('amount1');
		$amount2 = $this->input->post('amount2');		
		$received_confirms = $this->input->post('received_confirms');
		$txn_id = $this->input->post('txn_id');
		$email = explode('-',$this->input->post('email'));
		$userID = $email[1];
		$walletid = "";
		if($this->input->post('currency2') =="BTC"){  $walletid = 3;}
		if($this->input->post('currency2') =="ETH"){  $walletid = 4;}
		if($this->input->post('currency2') =="LTC"){  $walletid = 5;}
		if($this->input->post('currency2') =="BCH"){  $walletid = 6;}
		if($this->input->post('currency2') =="DASH"){ $walletid = 7;}
		if($this->input->post('currency2') =="DOGE"){ $walletid = 8;}
		$now = date("G:i:s");
		$currentDateTime = date("Y-m-d H:i:s");
		$newTime = $now;
		$newDate = date('Y-m-d', strtotime($currentDateTime));
		$data = array(
			'user_id' =>$userID,
			'plan_id' =>1,
			'account_no' =>"",
			'currency'=>$this->input->post('currency2'),
			'balance_deposit' =>$amount,
			'dep_date'=>$newDate,
			'dep_time'=>$newTime,
			'status'	=>"yes",
			'e_wallet_no'=>$walletid,
			'operation_id' =>$txn_id
		);

		$checkBE  = $this->crypto_model->checkBalanceCoin($data);
		if($checkBE == 1 ){
			redirect('login');
		}
		$batch = $txn_id.rand(5000,3520002)."LeX";
		$this->crypto_model->set_deposit_payeer_pm($data);	
		unset($data);
		}		

}
	public function failure(){






	print_r($this->input->post());
	$a1 = $this->input->get();
	$a2 = $this->input->post(); 
	$im1 = implode('-', $a1);
	$im2 = implode('-', $a2);
 
	if(!empty($a1)){ 
	$dummy =  array(
					'dummy'=>$im1
						);
	}
	if(!empty($a2)){ 
	$dummy =  array(
					'dummy'=>$im2
						);
	}	

	$this->crypto_model->dummy($dummy);		
		 // if($this->input->post('PAYMENT_BATCH_NUM') == 0){
		 // 	$this->session->set_flashdata('msg','query failed please retry or contact support! ');
		 // 	$r = base_url().'deposit';
		 // 	redirect($r);
		 // }else{
			// $t = base_url()."dashboard";
			// redirect($t);
		 // }		
	}		
}