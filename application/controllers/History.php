<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class history extends CI_Controller {
	public $global="";
	public function __construct(){
		parent::__construct();
		$users  = $this->session->userdata('userVal');
		$this->global =$users; 
	}
	public function index($history = null)
	{

		$data['title'] = "your referals";
		$this->load->view('users/history',$data);
	}


	public function deposit(){
		$data['history'] =  $this->crypto_model->bydeposit($this->global['id']);
		$data['title'] = "your referals";
		$this->load->view('users/history',$data);
	}
	public function withdraw(){
		$data['title'] = "your referals";
		$data['history'] =  $this->crypto_model->bywithdraw($this->global['id']);		

		$this->load->view('users/history',$data);		
	}
	public function earning(){
		
		$data['history'] =  $this->crypto_model->byearning($this->global['id']);
		$data['title'] = "your referals";
		$this->load->view('users/history',$data);
		}
	public function referals(){
		$data['history'] =  $this->crypto_model->byreferals($this->global['id']);

		$data['title'] = "your referals";
		$this->load->view('users/history',$data);
	}


		public function accounts(){
		$data['title'] = "Edit Accounts";
		$this->load->view('users/accounts',$data);
	}			
}



