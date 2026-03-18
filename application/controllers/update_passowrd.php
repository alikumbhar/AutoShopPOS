<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class update_passowrd extends CI_Controller {


		public function index(){
			$data['title'] = 'update password';
			$this->load->view('users',$data);
		}
}