<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class orders extends CI_Controller {

	public function index()
	{
		
		$data['product'] = $this->sc_model->fecthAll();
 		$path = $this->extra_lib->path."/orders.php";
 		$data['title'] = "Admin panel - Orders";
		$this->load->view($path,$data);
	}

}