<?php $this->load->view('users/libs/header'); ?>

<style>
table {
  width: 100%;
}

table td, table th {
  border: none;
  padding: 8px;
}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #e3655b;
  color: white;
}


.sbmt {
  border: none;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  border-radius:50px;
}

.sbmt {
  background-color: white; 
  color: black; 
  border: 2px solid #e3655b;
}

.sbmt:hover {
  background-color: #e3655b;
  color: white;
}

input {
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid #e3655b;
  border-radius: 4px;
}

</style>


<h3>Deposit Confirmation:</h3>
<br><br>

<table cellspacing="0" cellpadding="2" class="form deposit_confirm">
<tbody><tr>
 <th>Plan:</th>
 <td>Selected plan: +<?= $sendData['plan'] ?>% </td>
 <td rowspan="6"></td>
</tr>
<tr>
 <th>Profit:</th>
 <td><?= $sendData['plan'] ?>% Daily for lifelong</td>
</tr>
<tr>
 <th>Principal Return:</th>
 <td>No (included in profit)</td>
</tr>
<tr>
 <th>Principal Withdraw:</th>
 <td>
Not available </td>
</tr>
 

<tr>
 <th>Credit Amount:</th>
 <td>$<?= $sendData['balance_deposit'] ?></td>
</tr>
<tr>
 <th>Deposit Fee:</th>
 <td>0.00% + $0.00 (min. $0.00 max. $0.00)</td>
</tr>
<tr>
 <th>Debit Amount:</th>
 <td>$<?= $sendData['balance_deposit'] ?></td>
</tr>
<tr>
	<th></th>
	<td>

<?php

 $amount= $sendData['balance_deposit'];
   $currencyCrypto = "";
   if($sendData['e_wallet_no'] == 3){ $currencyCrypto = "BTC";}
   if($sendData['e_wallet_no'] == 4){ $currencyCrypto = "ETH";}
   if($sendData['e_wallet_no'] == 5){ $currencyCrypto = "LTC";}
   if($sendData['e_wallet_no'] == 6){ $currencyCrypto = "XRP";}
   if($sendData['e_wallet_no'] == 7){ $currencyCrypto = "DASH";}   
   if($sendData['e_wallet_no'] == 8){ $currencyCrypto = "DOGE";}


?>









<br><br>
<?php $hours ="24";
  if($sendData['balance_deposit'] < 0.10){
    $this->session->set_flashdata('msg','ERROR!  Please Deposit 0.50 in your account ');
    redirect(base_url('deposit'));
    echo "condition true";
  }



?>

<?php if($sendData['e_wallet_no'] == 1){ 
    $this->load->library('session');
    $nonce = md5('salt'.microtime());
    $gonce = $amount;
    $gonce_user = $sendData['user_id']; 
    $this->session->set_userdata('nonce',$nonce);
    $this->session->set_userdata('gonce',$gonce);
      $this->session->set_userdata('gonce_user',$gonce_user);
  ?>



<form action="https://perfectmoney.com/api/step1.asp" method="POST">
<input type="hidden" name="PAYEE_ACCOUNT" value="U26779791">
<input type="hidden" name="PAYEE_NAME" value="TodayCrypto">
<input type="hidden" name="PAYMENT_ID" value="<?php echo rand(12555,5697885); ?>"><BR>
<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $amount; ?>">
<input type="hidden" name="PAYMENT_UNITS" value="USD">
<input type="hidden" name="STATUS_URL" value="https://today-crypto.com/pm/status">
<input type="hidden" name="PAYMENT_URL" value="https://today-crypto.com/pm/success">
<input type="hidden" name="PAYMENT_URL_METHOD" value="GET">
<input type="hidden" name="NOPAYMENT_URL" value="https://today-crypto.com/pm/fail">
<input type="hidden" name="NOPAYMENT_URL_METHOD" value="GET">
<input type="hidden" name="SUGGESTED_MEMO" value="Today-Crypto.com">
<input type="hidden" name="userid" value="<?php echo $sendData['user_id'] ?>">
<input type="hidden" name="walletid" value="<?php echo $sendData['e_wallet_no'] ?>">
<input type="hidden" name="status" value="<?php echo $nonce; ?>">
<input type="hidden" name="BAGGAGE_FIELDS" value="userid walletid status">
<input type="submit" name="PAYMENT_METHOD" class="sbmt" value="Send!">
</form>




<?php 



} if($sendData['e_wallet_no'] == 2 ){

$Pdata = array(
  'userid'=>$sendData['user_id'],
  'walletid'=>$sendData['e_wallet_no'],
  'status'=>'yes'
);

$this->load->library('Payeer');   // Подключаем библиотеку

$config = array(
  'm_shop'            => '1192182404',
  'm_orderid'         => "00".rand(123,7898),
  'm_amount'          => $sendData['balance_deposit'],
  'm_curr'            => 'USD',
  'm_desc'            => 'paying to today-crypto',
  'm_key'       =>'newpakistanDvxvz123',
  'user_id' =>$sendData['user_id'],
  'walletid'=>$sendData['e_wallet_no']
);




$this->session->set_userdata('payData',$Pdata);

$payeer = new Payeer($config);

$hash = $payeer->digital_signature();

$payAnswer = false;

if(isset($_GET['action']) && $_GET['action'] == 'payed'){
  $payAnswer = $payeer->payment_handler();  
  // Проверяем, прошла ли оплата
  if($payAnswer == 'success')
    echo 'transaction Success!';

}
if($payAnswer != 'success'){

  echo $payeer->generateForm(); // выводим форму для оплаты
}

} 

if(   $sendData['e_wallet_no'] ==3 ){
//$this->load->view('users/coinpayments.inc.php');  
if($sendData['balance_deposit'] < 3){
    $this->session->set_flashdata('msg','ERROR!  Please Deposit 3 Dollars in BTC or choose another wallet. ');
    redirect(base_url('deposit'));
    echo "condition true";
  }

$this->load->view('users/coinpayments.inc.php');



  $cps = new CoinPaymentsAPI();
  $cps->Setup('55D9cb465e0739D76151f8d7D2854889A9EE89798dE9D87faDc8206fAD0f8e66', 'b93a58b8810e1cb35a9462a60585ee2ad5ba12afc4121d07b4e610826a74aff7');
  $url = "https://today-crypto.com/scb/success";
  $currencyUSD="USD";
  $user_id = $sendData['user_id'];
  $emails = "todaycrypto@gmail.com-".$sendData['user_id'];
  $result = $cps->CreateTransactionSimple($amount, $currencyUSD, $currencyCrypto, $emails, '', $url,$user_id);
  if ($result['error'] == 'ok') {
    $le = php_sapi_name() == 'cli' ? "\n" : '<br />';

    $address = $result['result']['address'];    
?>
    <div class="btc_form"><img src='//chart.apis.google.com/chart?cht=qr&amp;chld=Q|1&amp;chs=150&amp;chl="<?php echo $address; ?>"'></div>
  <br>
<div class="ref__info_box" style="width: 790px;">
        <input type="text" class="form-control btn" style="border:0px" id="getVal" onclick="copy()" value="<?php echo $address; ?>">
    </div>
<?php     
    print 'Please Send <b>'.sprintf('%.08f', $result['result']['amount']).' '.$currencyCrypto.' '.$le. "</b> at ".$address;

  } else {
    print 'Error: '.$result['error']."\n";
  }  
}
if(    $sendData['e_wallet_no'] == 4    || $sendData['e_wallet_no'] ==5  
    || $sendData['e_wallet_no'] == 6    || $sendData['e_wallet_no'] ==7  
    || $sendData['e_wallet_no'] == 8 
  ){ 
$this->load->view('users/coinpayments.inc.php');

if($sendData['balance_deposit'] < 1){
    $this->session->set_flashdata('msg','ERROR!  Please Deposit 1 Dollar in Cryptocurrency E-wallet. ');
    redirect(base_url('deposit'));
  }

  $cps = new CoinPaymentsAPI();
  $cps->Setup('55D9cb465e0739D76151f8d7D2854889A9EE89798dE9D87faDc8206fAD0f8e66', 'b93a58b8810e1cb35a9462a60585ee2ad5ba12afc4121d07b4e610826a74aff7');
  $url = "https://today-crypto.com/scb/success";
  $currencyUSD="USD";
  $user_id = $sendData['user_id'];
  $emails = "todaycrypto@gmail.com-".$sendData['user_id'];
  $result = $cps->CreateTransactionSimple($amount, $currencyUSD, $currencyCrypto, $emails, '', $url,$user_id);
  if ($result['error'] == 'ok') {
    $le = php_sapi_name() == 'cli' ? "\n" : '<br />';

    $address = $result['result']['address'];    
?>
    <div class="btc_form"><img src='//chart.apis.google.com/chart?cht=qr&amp;chld=Q|1&amp;chs=150&amp;chl="<?php echo $address; ?>"'></div>
  <br>
<div class="ref__info_box" style="width: 790px;">
        <input type="text" class="form-control btn" style="border:0px" id="getVal" onclick="copy()" value="<?php echo $address; ?>">
    </div>
<?php     
    print 'Please Send <b>'.sprintf('%.08f', $result['result']['amount']).' '.$currencyCrypto.' '.$le. "</b> at ".$address;

  } else {
    print 'Error: '.$result['error']."\n";
  }
}
  ?>

</td>
</tbody>
</table>


<script type="text/javascript">

  function copy() {
  var copyText = document.getElementById("getVal");
  copyText.select();
  document.execCommand("copy");
  alert('address copied successfully');
}
function recopy() {
  var copyText = document.getElementById("regetVal");
  copyText.select();
  document.execCommand("copy");
}

</script>
</div></div>
 
