


    <?php $users = $this->session->userdata('userVal');
 
          $getref = $this->crypto_model->getreferals($users['id']);
          $countRef = $this->crypto_model->count_referals($users['id']);
           $upline = $this->crypto_model->upline($users['id']);


          $getActiveDep = $this->crypto_model->getActiveDepositReferals($users['id']);

          $getReac = $this->crypto_model->totalActiveRef($users['id']);

          $arr =array();
          foreach($getReac as $dt){
          $arr[] = $dt->user_id;
          }

          $countM = count(array_unique($arr));
          unset($arr);

          $countRef = $countRef->total_ref;

$percentage = $this->crypto_model->percentage();
$your_commission = ($percentage->percentage / 100) * $getActiveDep->commission;


$originals = $users['id'];
$rs = rand(0,999);
$coded = str_replace('+','-',str_replace('/','_',base64_encode($originals)));
$r = str_replace('+','-',str_replace('/','_',base64_encode($rs)));


           ?>



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



<h3>Your Referrals:</h3><br>
Your upline is <a href=""><?= $upline->user_name; ?></a><br><br>
<br>
<table width="300" cellspacing="1" cellpadding="1">
<tbody><tr>
  <td class="item">Referrals:</td>
  <td class="item"><?php


   echo $countRef; ?></td>
</tr>
              <?php  $record=0; foreach($getReac as $refAm):

              ?>

                <?php $record++; endforeach; ?>
<tr>
  <td class="item">Active referrals:</td>
  <td class="item"><?php echo $record; ?></td>
</tr><tr>
  <td class="item">Total referral commission:</td>
  <td class="item">$<?php echo $countM; ?></td>
</tr>
<tr>
  <td>  <span class="user-info__title user-info__title_blue">Referral link:</span></td>
  <td>
              <div class="user-info">
            <div class="user-info__group">
            
              <div class="field user-info__field" >
<input type="" onclick="copy()" style="width: 541px;
    height: 53px;
    border: 0px;
" id="getVal" value="<?php echo base_url()."?ref=".$coded.'('.$r; ?>">
                </div>

            </div>
          </div>
  </td>
</tr>
</tbody></table>
<br>



      <div class="row">
          
</div>

<script type="text/javascript">

  function copy() {
  var copyText = document.getElementById("getVal");
  copyText.select();
  document.execCommand("copy");
  alert('Address copied successfully');
}
function recopy() {
  var copyText = document.getElementById("regetVal");
  copyText.select();
  document.execCommand("copy");
}

</script>