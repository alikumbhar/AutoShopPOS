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






<script language="javascript">
function IsNumeric(sText) {
  var ValidChars = "0123456789.";
  var IsNumber=true;
  var Char;
  if (sText == '') return false;
  for (i = 0; i < sText.length && IsNumber == true; i++) { 
    Char = sText.charAt(i); 
    if (ValidChars.indexOf(Char) == -1) {
      IsNumber = false;
    }
  }
  return IsNumber;
}

function checkform() {
  if (document.editform.fullname.value == '') {
    alert("Please type your full name!");
    document.editform.fullname.focus();
    return false;
  }


  if (document.editform.password.value != document.editform.password2.value) {
    alert("Please check your password!");
    document.editform.fullname.focus();
    return false;
  }





  for (i in document.editform.elements) {
    f = document.editform.elements[i];
    if (f.name && f.name.match(/^pay_account/)) {
      if (f.value == '') continue;
      var notice = f.getAttribute('data-validate-notice');
      var invalid = 0;
      if (f.getAttribute('data-validate') == 'regexp') {
        var re = new RegExp(f.getAttribute('data-validate-regexp'));
        if (!f.value.match(re)) {
          invalid = 1;
        }
      } else if (f.getAttribute('data-validate') == 'email') {
        var re = /^[^\@]+\@[^\@]+\.\w{2,4}$/;
        if (!f.value.match(re)) {
          invalid = 1;
        }
      }
      if (invalid) {
        alert('Invalid account format. Expected '+notice);
        f.focus();
        return false;
      }
    }
  }

  return true;
}
</script>


<br><br><h3>Your account:</h3><br><br>
<form action="https://minarybit.com/?a=edit_account" method="post" onsubmit="return checkform()" name="editform"><input type="hidden" name="form_id" value="16103005344576"><input type="hidden" name="form_token" value="d06aef12b71dc9937eadcd42a9661412">
<input type="hidden" name="a" value="edit_account">
<input type="hidden" name="action" value="edit_account">
<input type="hidden" name="say" value="">

<table cellspacing="0" cellpadding="2" border="0">
<tbody><tr>
 <td>Account Name:</td>
 <td><?php  echo $users['user_name']; ?></td>
</tr><tr>
 <td>Registration date:</td>
 <td><?= $users['reg_date'].'  '.$users['reg_time']; ?></td>
</tr><tr>
 <td>Your Full Name:</td>
 <td><input type="text" name="fullname" value="<?php echo $users['user_name'];?>" class="inpts" size="30">
</td></tr>

<tr>
 <td>New Password:</td>
 <td><input type="password" name="password" value="" class="inpts" size="30"></td>
</tr><tr>
 <td>Retype Password:</td>
 <td><input type="password" name="password2" value="" class="inpts" size="30"></td>
</tr>
<tr>
 <td>Your PerfectMoney acc no:</td>
 <td><input type="text" class="inpts" size="30" name="pay_account[18]" value="U25299640" data-validate="regexp" data-validate-regexp="^U\d{5,}$" data-validate-notice="UXXXXXXX"></td>
</tr>
<tr>
 <td>Your Bitcoin acc no:</td>
 <td><input type="text" class="inpts" size="30" name="pay_account[48]" value="" data-validate="regexp" data-validate-regexp="^(bc1|[13])[a-zA-HJ-NP-Z0-9]{25,39}$" data-validate-notice="Bitcoin Address"></td>
</tr>
<tr>
 <td>Your Litecoin acc no:</td>
 <td><input type="text" class="inpts" size="30" name="pay_account[68]" value="" data-validate="regexp" data-validate-regexp="^[LM3][a-km-zA-HJ-NP-Z1-9]{25,34}$" data-validate-notice="Litecoin Address"></td>
</tr>
<tr>
 <td>Your Dogecoin acc no:</td>
 <td><input type="text" class="inpts" size="30" name="pay_account[79]" value="" data-validate="regexp" data-validate-regexp="^[DA9][a-km-zA-HJ-NP-Z1-9]{25,34}$" data-validate-notice="Dogecoin Address"></td>
</tr>
<tr>
 <td>Your Ethereum acc no:</td>
 <td><input type="text" class="inpts" size="30" name="pay_account[69]" value="" data-validate="regexp" data-validate-regexp="^(0x)?[0-9a-fA-F]{40}$" data-validate-notice="Ethereum Address"></td>
</tr>
<tr>
 <td>Your Bitcoin Cash acc no:</td>
 <td><input type="text" class="inpts" size="30" name="pay_account[77]" value="" data-validate="regexp" data-validate-regexp="^[\w\d]{25,43}$" data-validate-notice="Bitcoin Cash Address"></td>
</tr>
<tr>
 <td>Your Dash acc no:</td>
 <td><input type="text" class="inpts" size="30" name="pay_account[71]" value="" data-validate="regexp" data-validate-regexp="^X[0-9a-zA-Z]{33}$" data-validate-notice="Dash Address"></td>
</tr>
<tr>
 <td>Your +30 Alt Coin ( 30% First Deposit Bonus ) CRYPTO ADDRESS:</td>
 <td><input type="text" class="inpts" size="30" name="pay_account[1000][CRYPTO ADDRESS]" value=""></td>
</tr>
<tr>
 <td>Your E-mail address:</td>
 <td><?= $users['user_email']; ?></td>
</tr>


<tr>
 <td>&nbsp;</td>
 <td><input type="submit" value="Change Account data" class="sbmt"></td>
</tr></tbody></table>
</form>