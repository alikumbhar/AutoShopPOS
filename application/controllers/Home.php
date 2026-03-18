<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public function index()
	{
		$user = $this->session->userdata('userVal');
		if(!$user){  }else { ?>
	<script> window.location = "<?php echo base_url('admin/dashboard'); ?>"; </script>

		<?php }

		$this->load->helper('form');	
		$this->load->view('index');
	}
}