<?php $this->load->view('users/libs/header');?>



<style type="text/css">
  #myInput{
    float-left
  }
</style>
    

<h3>&nbsp</h3>
<br><br>
<?php $hours ="24";
  if(!is_numeric($sendData['withdraw_amount'])){
    $this->session->set_flashdata('msg','please check form below and fill it');
    redirect(base_url('withdraw'));
  }

  if($sendData['withdraw_amount'] < 0.10){
    $this->session->set_flashdata('msg','please check form below and fill it');
    redirect(base_url('withdraw'));
  }
$method = "";

  
?>
<?php echo form_open('withdraw/payNow');?>
<table style="text-align: left;">
<tbody>
<tr>
 <th>Withdrawl Amount:</th>
 <td>$<?php echo number_format($sendData['withdraw_amount'],2); ?></td>
</tr>


 

<tr>
  <td></td>
</tr>
<tr>
 <th>No Fee for Withdraw:</th>
 <td>0.00% + $0.00 (min. $0.00 max. $0.00)</td>
</tr>




<tr>
  <td>
    <input type="hidden" name="user_id" value="<?= $sendData['user_id'] ?>">
    <input type="hidden" name="withdraw_amount" value="<?= $sendData['withdraw_amount']; ?>">

    <input type="hidden" name="wallet_id" value="<?= $sendData['wallet_id'];?>">
    <input type="hidden" name="p_request" value="005x5">
    <input type="hidden" name="withdraw_payment_method" value="<?= $sendData['withdraw_payment_method'];?>">
    <input type="hidden" name="withdraw_account_no" value="<?= $sendData['withdraw_account_no'];?>">
    <input type="hidden" name="withdraw_status" value="<?= $sendData['withdraw_status'];?>">
    <input type="hidden" name="withdraw_date_time" value="<?= $sendData['withdraw_date_time'];?>">
  </td>
</tr>
<tr>
 <td></td>
  <td><button class="sbmt">Confirm Withdraw</button></td>
</tr>
</tbody></table>

<?php echo form_close(); ?>



<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("your address copied: " + copyText.value);
}
</script>

