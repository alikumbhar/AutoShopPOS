<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pos_sale extends CI_Controller {
	
function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model("sc_model");
    }
	public function index(){
		
		$this->load->view('admin/pos');
	}
}