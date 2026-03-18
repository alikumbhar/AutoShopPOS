<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class settings extends CI_Controller {

	public function index()
	{
		$users = $this->session->userdata('userVal');
       	$data['balance'] = $this->crypto_model->getTotalavailableBalance($users['id']);
	     $data['allInvest'] = $this->crypto_model->totalinvestByUser($users['id']);    		
		$this->load->view('s_pages/settings',$data);
	}


}



