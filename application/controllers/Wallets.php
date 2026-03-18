<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class wallets extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('crypto_model'); 		
	}
	public function index()
	{
		$users = $this->session->userdata('userVal');
       	$data['balance'] = $this->crypto_model->getTotalavailableBalance($users['id']);
	     $data['allInvest'] = $this->crypto_model->totalinvestByUser($users['id']);    
		$data['title'] = "your referals";
		$this->load->view('s_pages/wallets',$data);
	}

	public function setwallet(){


		$csrf  = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
		$users = $this->session->userdata('userVal');
		if(!empty($users)){}else{
			redirect('wallets');
		}


		$methods = $this->input->post('system');
		$account_no = $this->input->post('wallet');		
		$user_id =$users['id'];
		$GW = explode('-', $methods);
		$wallet_id  = 	  $GW[0];
		$arr =  array(
			'wallet_id'=>strip_tags($wallet_id),
			'account_no'=>strip_tags($account_no),
			'user_id'=>strip_tags($user_id)
		);

		$checkVal = $this->crypto_model->insertWallets($arr);
		if($checkVal > 0){
			$this->session->set_flashdata('msg','Wallet Updated');
			?>
			<script type="text/javascript">
				window.location="<?php echo base_url().'wallets';?>";
			</script>
			<?php
		}else{
			$this->session->set_flashdata('msg','Failed to update');?>
			<script type="text/javascript">
				window.location="<?php echo base_url().'wallets';?>";
			</script>
			<?php			
		}
	}
}



