<?php $this->load->view('users/libs/header');

$users  = $this->session->userdata('userVal');
$dt = $this->crypto_model->withdrawbywallet($users['id']);
 


      $balance = $this->crypto_model->getTotalavailableBalance($users['id']);
      $allInvest = $this->crypto_model->totalinvestByUser($users['id']);      
    $earnedB = $this->crypto_model->gettotalearned($users['id']);
    $totalW = $this->crypto_model->gettotalwithdraw($users['id']); 
 ?>


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



<h3>Ask for withdrawal:</h3><br>






<?php echo form_open('withdraw/confirm_withdraw'); ?>





<table cellspacing="0" cellpadding="2" border="0">
<tbody>
<?php $msg =  $this->session->flashdata('msg');
if(!empty($msg)){  ?>
<tr>
  <td><div class="alert alert-dismissable" role="alert"><?= $msg; ?></div></td>
</tr>
<?php } ?>
<tr>
 <td>Account Balance:</td>
 <td>$<b><?php if($balance->account_balance){  echo $balance->account_balance; }else{ echo "0.00"; }?></b></td>
</tr>
<?php $Pending =false; if($Pending){  ?>
<tr>
 <td>Pending Withdrawals: </td>
 <td>$<b></b></td>
</tr>
<?php } ?>
</tbody></table>

<table cellspacing="0" cellpadding="2" border="0">
<tbody><tr>
 <th></th>
 <th>Method</th> 
 <th>Processing</th>
 <th>Available</th>
 <th>Pending</th>
 <th>Account</th>
</tr>
<?php $i=1; foreach($dt as $datap){ 
$img = "";
$system ="";
if($datap->e_wallet_no ==1){
$img = "18.gif";
$system ="pm";
}
if($datap->e_wallet_no ==2){
$img = "pe.png";
$system ="pe";
}

if($datap->e_wallet_no ==3){
$system ="btc";
$img = "48.gif";
}
 
if($datap->e_wallet_no ==4){
$img = "69.gif";
$system ="eth";
}

if($datap->e_wallet_no ==5){
$img = "68.gif";
$system ="ltc";
}

if($datap->e_wallet_no ==6){
$system ="xrp";
$img = "77.gif";
}

if($datap->e_wallet_no ==7){
$img = "71.gif";
$system ="dash";
}

if($datap->e_wallet_no ==8){
$img = "79.gif";
$system ="doge";
}



  ?>
<tr>
 <td></td>
<td> <input type="radio"  required=""  name="system" value="<?php echo $datap->e_wallet_no.'-'.$system.'-'.$datap->account_no.'-'.$datap->balance; ?>" placeholder="">

</td>
 <td>
  <img src="<?php echo base_url(); ?>binary/images/<?= $img; ?>" width="44" height="17" align="absmiddle"> <?= $datap->wallet_name; ?></td>
 <td><b style="color:green">$<?= $datap->balance; ?></b></td>
 <td><b style="color:red">$0.00</b></td>
 <td><?= $datap->account_no; ?></td>
</tr>
<?php } ?>

</tbody></table>

<br><br>


<div class="main-container">  
<div class="container" style="text-align: center"> 
<button class="sbmt" id="wid">Withdraw Now</button>
</div>
</div>
<?php echo form_close(); ?>
  
<script language="javascript">

for (i = 0; i<document.spendform.type.length; i++) {
  if ((document.spendform.type[i].value.match(/^process_/))) {
    document.spendform.type[i].checked = true;
    break;
  }
}

</script>