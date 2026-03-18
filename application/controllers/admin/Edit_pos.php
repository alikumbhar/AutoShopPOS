<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class edit_pos extends CI_Controller {

	public function index()
	{
		echo "works"
		$this->load->view('admin/pos/main');
	}
}