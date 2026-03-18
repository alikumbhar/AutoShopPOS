<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class referals extends CI_Controller {

	public function index()
	{
		$users = $this->session->userdata('userVal');
       	$data['balance'] = $this->crypto_model->getTotalavailableBalance($users['id']);
	     $data['allInvest'] = $this->crypto_model->totalinvestByUser($users['id']);    		
		$data['title'] = "your referals";
		$this->load->view('users/referals',$data);
	}


}



