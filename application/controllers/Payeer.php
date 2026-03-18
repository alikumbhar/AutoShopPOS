<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class payeer extends CI_Controller {

	public function index()
	{
	$t = base_url()."deposit";
	redirect($t);
	}

	public function status(){
	$t = base_url()."deposit";
	redirect($t);
	}

	public function confirm_success(){



	 $users = $this->session->userdata('userVal');	
	 $paysess = $this->session->userdata('DBpaye');		 
     

     if(!empty($paysess['amount'])){ }else{ ?>
				<script type="text/javascript">
					window.location="<?php echo base_url().'deposit';?>";
				</script>			     	
     <?php }
     // $amount = $this->input->get('m_amount');
     // $st = $this->input->get('m_status');
     // $operation_id = $this->input->get('m_operation_id');

        $status="";
    if($paysess['status'] =="success"){
    	$status = "yes"; 
	}
    else{
    	$status="no";
    }


		$now = date("G:i:s");
		$currentDateTime = date("Y-m-d H:i:s");
		$newTime = $now;
		$newDate = date('Y-m-d', strtotime($currentDateTime));
	    $uData = $this->session->userdata('payData');

$data = array(
		'user_id' =>$uData['userid'],
		'balance_deposit' =>$paysess['amount'],
		'dep_date'=>$newDate,
		'dep_time'=>$newTime,
		'status'	=>$status,
		'e_wallet_no'=>$uData['walletid'],
        'operation_id'=>$paysess['operation_id']
	);


	
	$r = $this->crypto_model->set_deposit_payeer_pm($data);	
	if($r ==1){
        
	    	$this->session->set_flashdata('msg','your deposit amount have been added in our database');
				?>
				<script type="text/javascript">
					window.location="<?php echo base_url().'deposit';?>";
				</script>			
	

<?php
		}	
	}
	public function success(){
	 $data['amount'] = $this->input->get('m_amount');
     $data['status'] = $this->input->get('m_status');
     $data['operation_id'] = $this->input->get('m_operation_id');
     $this->load->view('s_pages/payeer',$data);
	}


	public function fail(){
		 if($this->input->post('PAYMENT_BATCH_NUM') == 0){
		 	$this->session->set_flashdata('msg','query failed please retry or contact support! ');
		 	$r = base_url().'deposit';
		 	redirect($r);
		 }else{
			$t = base_url()."deposit";
			redirect($t);
		 }		
	}		
}