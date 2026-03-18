<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_final extends CI_Controller {

	public function index()
	{
		$this->load->view('s_pages/dt_login');
	}
	public function dashboard_adm($id = null){
	$data['custom_deposit'] =  $this->crypto_model->getTransaction();
		$data['singel_page'] ="No";
	$this->load->view('s_pages/dashboard_adm',$data);

	}

	public function detail($id = null,$trx_id = null){

		if(!empty($id) AND !empty($trx_id)){
	$data['custom_deposit'] =  $this->crypto_model->getTransaction($id,$trx_id);
	 $data['singel_page'] ="yes";
	$this->load->view('s_pages/dashboard_adm',$data);
	} else { ?>
	<script>window.location="<?php echo base_url().'bugs/dashboard_final/dashboard_adm';?>";</script>
	<?php }
	}	



}



