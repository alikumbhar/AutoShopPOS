<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cleaner extends CI_Controller {

	public function index()
	{
		

		$path = $this->extra_lib->path.'/become_cleaner';
		$data['title'] = 'Admin panel - Set location';
		$this->load->view($path,$data);
	}

}
	?>