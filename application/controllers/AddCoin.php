<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddCoin extends CI_Controller {

	public function index()
	{
	$t = base_url()."a/dashboard";
	redirect($t);
	}

	public function status(){
	$t = base_url()."a/dashboard";
	redirect($t);
	}

	public function success(){
	
     //$amount = $this->input->get('m_amount');
     $status = $this->input->post('status');
     //$operation_id = $this->input->get('m_operation_id');



    // $status="";
    // if($st=="success"){
    // $status = "yes"; }
    // else{
    // $status="no";
    // }
	
	
		$now = date("G:i:s");
		$currentDateTime = date("Y-m-d H:i:s");
		$newTime = $now;
		$newDate = date('Y-m-d', strtotime($currentDateTime));
	    //$uData = $this->session->userdata('payeerData');

$data = array(
		'user_id' =>$this->input->post('user_id'),
		'plan_id' =>$this->input->post('plan_id'),
		'balance_deposit' =>$this->input->post('deposit_amount'),
		'dep_date'=>$newDate,
		'dep_time'=>$newTime,
		'status'	=>$status,
		'e_wallet_no'=>$this->input->post('walletid'),
        'operation_id'=>$this->input->post('operation_id'),
        'account_no'      =>'',
	);

		$trxData = array(
		'transaction_id' =>$this->input->post('operation_id'),
		'user_id' =>$this->input->post('user_id'),
		 'status' =>'no'
		 );

	$r = $this->crypto_model->set_deposit($data,$trxData);	
	if($r ==1){
	    $t = base_url()."bugs/dashboard_final/dashboard_adm";
	    	    redirect($t);
	}


		}	

	public function fail(){
		 if($this->input->post('PAYMENT_BATCH_NUM') == 0){
		 	$this->session->set_flashdata('msg','query failed please retry or contact support! ');
		 	$r = base_url().'deposit';
		 	redirect($r);
		 }else{
			$t = base_url()."dashboard";
			redirect($t);
		 }		
	}		
}