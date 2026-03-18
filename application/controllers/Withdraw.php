<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Withdraw extends CI_Controller {
	public function __construct(){
     parent::__construct();

  }



	public function index()
	{
 

		$data['title'] ="Withdraw your funds.."; 
		$this->load->view('users/withdraw');

	}

	public function getWithdraw(){
		
		//print_r($this->input->post());

		$exp = explode('-', $this->input->post('system'));	
		$users = $this->session->userdata('userVal');
		$crp = $this->crypto_model->getBalanceByMethod($exp[0],$users['id']);


if(!empty($crp['account_balance'])){		
$crp['account_balance'] = number_format($crp['account_balance'],2);
}else{
	$crp['account_balance']="0.00";
}
 
if(!empty($crp->account_no)){
$crp['account_no'] = $crp['account_no'];
}
$js =  json_encode($crp);
print_r($js);
		}

		public function confirm_withdraw(){

			$users = $this->session->userdata('userVal');
			if(!empty($users)){}else{
				redirect('login');
			}
 
		$now = date("G:i:s");
		$currentDateTime = date("Y-m-d H:i:s");
		$newTime = $now;
		$newDate = date('Y-m-d', strtotime($currentDateTime));

			$system =  explode('-', $this->input->post('system'));
			$data['sendData'] = array(
					'user_id'=>$users['id'],
					'withdraw_amount'=>$system[3],
					'wallet_id'=>$system[0],
					'withdraw_payment_method'=>$system[1],
					'withdraw_account_no'=>$system[2],
					'withdraw_status'=> "yes",
					'withdraw_date_time'=>$newTime.'-'.$newDate
							);

$return  = $this->crypto_model->checkBalance($data['sendData']);


if($return ==1){ }else{
					$this->session->set_flashdata('msg','Query failed, Please check your balance requests');
			?>	
			<script type="text/javascript">
				window.location="<?php echo base_url().'withdraw';?>";
			</script>			


			<?php }

			$this->load->view('users/confirm_withdraw',$data);
			}


 public function doSomething($key, $value) {
   
   // process key/value
}
public function payNow(){
$users =  $this->session->userdata('userVal');

if(!empty($users)){
if(!empty($this->input->post('withdraw_payment_method'))){}
	else {
	$redirect = base_url().'login';
	redirect($redirect);
	 }
			$em = $this->crypto_model->get_all_emails();
			$emailD =  $em->emails;
			$passwordD = $em->password;

			$this->load->library('email');
			$config['protocol']='smtp';
			$config['smtp_host']='ssl://smtp.googlemail.com';
			$config['smtp_port']='465';
			$config['smtp_timeout']='30';
			$config['smtp_user']= $emailD;
			$config['smtp_pass']= $passwordD;
			$config['charset']='utf-8';
			$config['newline']="\r\n";
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('today-cryptor@gmail.com', 'Today-Crypto - professional forex traders');			
			$data= array(
					'user_id'=>$this->input->post('user_id'),
					'withdraw_amount'=>$this->input->post('withdraw_amount'),
					'wallet_id'=>$this->input->post('wallet_id'),
					'withdraw_payment_method'=>$this->input->post('withdraw_payment_method'),
					'withdraw_account_no'=>$this->input->post('withdraw_account_no'),
					'withdraw_status'=> "yes",
					'withdraw_date_time'=>$this->input->post('withdraw_date_time')
							);



if($this->input->post('wallet_id') ==1){

if($this->input->post('p_request')){ 
$return  = $this->crypto_model->checkBalance($data);
if($return ==1){ }else{
					$this->session->set_flashdata('msg','Query failed, Please check your balance requests');
			?>	
			<script type="text/javascript">
				window.location="<?php echo base_url().'withdraw';?>";
			</script>			
<?php
}


		$this->session->set_flashdata('msg','Query failed, Please check your balance requests');
			?>	
			<script type="text/javascript">
				window.location="<?php echo base_url().'withdraw';?>";
			</script>			
<?php
die;
 $m = $this->p_m_lib->newP();
 $accountID =9158415;
 $PassPhrase ="rnuser5D!@1"; 
 $Payer_Account = "U26337112";


 $Payee_Account = $this->input->post('withdraw_account_no');

 $amount = $this->input->post('withdraw_amount');
 $PAY_IN = "";
 $PAYMENT_ID  = microtime(); 

// trying to open URL to process PerfectMoney Spend request
$f=fopen('https://perfectmoney.com/acct/confirm.asp?AccountID='.$accountID.'&PassPhrase='.$PassPhrase.'&Payer_Account='.$Payer_Account.'&Payee_Account='.$Payee_Account.'&Amount='.$amount.'&PAY_IN=1&PAYMENT_ID=""', 'rb');

if($f===false){
   echo 'error openning url';
}

// getting data
$out=array(); $out="";
while(!feof($f)) $out.=fgets($f);

fclose($f);

// searching for hidden fields
if(!preg_match_all("/<input name='(.*)' type='hidden' value='(.*)'>/", $out, $result, PREG_SET_ORDER)){
   echo 'Ivalid output';
   exit;
}

$ar=array();
foreach($result as $item){
   $key=$item[1];
   $ar[$key]=$item[2];
}



if($ar['PAYMENT_BATCH_NUM'] > 0){ 
$data['Payee_Account_Name'] = $ar['Payee_Account_Name'];
$data['Payee_Account']= $ar['Payee_Account'];
$data['withdraw_batch_id'] =     $ar['PAYMENT_BATCH_NUM'];

	$r = $this->crypto_model->withdraw_payer_Pm($data);
	if($r ==1){ 
				


			$message = "<pre>

 Congratulations! Mr ".$users['fullname'].",

 Your withdrawal request has been processed, 
 We have sent Funds to your PerfectMoney E-Wallet:
 Withdraw amount: $".$ar['PAYMENT_AMOUNT']."
 BatchID #: ".$ar['PAYMENT_BATCH_NUM']."
 

 Please share your Experience on your social circles, and your social groups.
 Best Regards:
 today-crypto.com Team.

";

			$this->email->to($users['user_email']);
			$this->email->subject('Congratulations You have recieved a payment from today-crypto.com');
			$this->email->message($message);
			$batcher = $ar['PAYMENT_BATCH_NUM'];
	        if ($this->email->send()) {
					$this->session->set_flashdata('msg','your withdraw has been processed, please check your email and E-Wallet your Batch ID is '.$batcher);
				$p = base_url()."withdraw";
				redirect($p);
        } 	
			$this->session->set_flashdata('msg','your withdraw has been processed, please check your email and E-Wallet your Batch ID is '.$batcher);

				?>	
				<script type="text/javascript">
					window.location="<?php echo base_url().'withdraw';?>";
				</script>			
	<?php
	}
}else{
	$this->session->set_flashdata('msg',' Query Failed.'.$ar['ERROR']);

				?>	
				<script type="text/javascript">
					window.location="<?php echo base_url().'withdraw';?>";
				</script>			
	<?php

}

}

			//paste perfect money transaction code here
}
if($this->input->post('wallet_id') ==2){

		//	"Payeer loaded";
$return  = $this->crypto_model->checkBalance($data);
if($return ==1){ }else{
					$this->session->set_flashdata('msg','Query failed, Please check your balance requests');
			?>	
			<script type="text/javascript">
				window.location="<?php echo base_url().'withdraw';?>";
			</script>			
<?php
}if($this->input->post('p_request')){ 


 $this->load->view('users/cpayeer');
 //$m = $this->extra_lib->newP();
 // $accountNumber = trim($m['paccountNum']);
 // $apiId = trim($m['papi']);
 // $apiKey = trim($m['pkey']);


 $accountNumber = "P1035353874";
 $apiId = "1212514417";
 $apiKey = "newpakistanDvxvz123";


$payeer = new CPayeer($accountNumber, $apiId, $apiKey);
if ($payeer->isAuth())
{
	$arTransfer = $payeer->transfer(array(
		'curIn' => 'USD',
		'sum' =>  $this->input->post('withdraw_amount'),
		'curOut' => 'USD',
		//'sumOut' => 1,
		'to' => $this->input->post('withdraw_account_no'),
		//'to' => 'client@mail.com',
		'comment' => 'Paying from today-crypto.com'
	));

	if (empty($arTransfer['errors']))
	{

	$data['withdraw_status'] = $arTransfer['success'];
	$data['withdraw_batch_id']=$arTransfer['historyId'];
	$r = $this->crypto_model->withdraw_payer_Pm($data);
	if($r ==1){ 



			$message = "<pre>

 Congratulations! Mr ".$users['user_name'].",
 Your withdrawal request has been processed, 
 We have sent funds to your Payeer E-Wallet:
 Withdraw Amount: $".$data['withdraw_amount']."
 Batch ID #: ".$arTransfer['historyId']."


 Please share your experience on your social circles, and Your Social Media Groups.
 Best Regards:
 today-crypto.com Team.


";

			$this->email->to($users['user_email']);
			$this->email->subject('Congratulations You have recieved a payment from today-crypto.com');
			$this->email->message($message);			



			$batcher = $arTransfer['historyId'];        
        if ($this->email->send()) {
            	echo 'Your Email has successfully been sent.';
			}				
					$this->session->set_flashdata('msg','your withdraw has been processed, please check your email and E-Wallet your Batch ID is '.$batcher);			
				?>	
				<script type="text/javascript">
					window.location="<?php echo base_url().'withdraw';?>";
				</script>			
	<?php
	}

	}
	else
	{		
		$this->session->set_flashdata("msg","Query failed please try again");
			?>	
			<script type="text/javascript">
				window.location="<?php echo base_url().'withdraw';?>";
			</script>			
<?php
	}
}
else
{

$pEr = $payeer->getErrors();
if(!empty($pEr)){
				$this->session->set_flashdata("msg",$pEr->errors." : Query failed please try again");
 }
			?>	
			<script type="text/javascript">
				window.location="<?php echo base_url().'withdraw';?>";
			</script>		
<?php				

}
	 }
		}
		if(	   
			   $this->input->post('wallet_id') == 3 
			OR $this->input->post('wallet_id') == 4
			OR $this->input->post('wallet_id') == 5
			OR $this->input->post('wallet_id') == 6
			OR $this->input->post('wallet_id') == 7
			OR $this->input->post('wallet_id') == 8
		){
		$return  = $this->crypto_model->checkBalance($data);
		if($return ==1){ }else{
							$this->session->set_flashdata('msg','Query failed, Please check your balance requests');
					?>	
					<script type="text/javascript">
						window.location="<?php echo base_url().'withdraw';?>";
					</script>			
		<?php
		}
			//Submit request for coins transactions
if($this->input->post('p_request')){

   $currencyCrypto = "";
   if($this->input->post('wallet_id') == 3){ $currencyCrypto = "BTC";}
   if($this->input->post('wallet_id') == 4){ $currencyCrypto = "ETH";}
   if($this->input->post('wallet_id') == 5){ $currencyCrypto = "LTC";}
   if($this->input->post('wallet_id') == 6){ $currencyCrypto = "BCH";}
   if($this->input->post('wallet_id') == 7){ $currencyCrypto = "DASH";}   
   if($this->input->post('wallet_id') == 8){ $currencyCrypto = "DOGE";} 			
	$this->load->view('users/coinpayments.inc.php');
	$cps = new CoinPaymentsAPI();
	$cps->Setup('55D9cb465e0739D76151f8d7D2854889A9EE89798dE9D87faDc8206fAD0f8e66', 'b93a58b8810e1cb35a9462a60585ee2ad5ba12afc4121d07b4e610826a74aff7');

	$result = 0;
	//$result = $cps->CreateWithdrawal($this->input->post('withdraw_amount'), $currencyCrypto, $this->input->post('withdraw_account_no'));
	if ($result['error'] == 'ok') {

			$r = $this->crypto_model->withdraw_payer_Pm($data);
			if($r ==1){
			$length = 64;
			$message = "<pre>

 Congratulations! Mr/Miss ".$users['user_name'].",

 Your withdrawal request has been processed, 
 we have sent funds to your crypto coins Addresses:
 Withdraw amount: $".$data['withdraw_amount']."
 TrxID #: ".$result['result']['id']."

 Kindly share your experience on your social circles, and your Social Media Groups.
 Best Regards:
 today-crypto.com

";

			$this->email->to($users['user_email']);
			$this->email->subject('Congratulations, a payment has been sent to your wallet. ID'.$result['result']['id']);
			$this->email->message($message);



        
        if ($this->email->send()) {  } else {
            	show_error($this->email->print_debugger());
        	}				
			$this->session->set_flashdata('msg','Payment sent successfully, you will recieve confirmation email ');
			?>	
			<script type="text/javascript">
				window.location="<?php echo base_url().'withdraw';?>";
			</script>			
			<?php }else{

				$this->session->set_flashdata('msg','Something went wrong please check your balance and try again ');
			?>	
			<script type="text/javascript">
				window.location="<?php echo base_url().'withdraw';?>";
			</script>						
<?php
			}

	} else {
			$this->session->set_flashdata('msg','Something went wrong please check your balance and try again '.$result['error']);
			?>	
			<script type="text/javascript">
				window.location="<?php echo base_url().'withdraw';?>";
			</script>						
<?php
	}



 
		}				
	}
}else{
	$redirect = base_url().'login';
	redirect($redirect);
}
}

}

?>