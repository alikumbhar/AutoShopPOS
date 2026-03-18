<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class about extends CI_Controller {

	public function index()
	{
		$this->load->view('front_pages/about_us');
	}


}



