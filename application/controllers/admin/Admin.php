<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function index()
	{
		
		$data['product'] = $this->sc_model->fecthAll();

		$this->load->view('main',$data);
	}

}
	?>