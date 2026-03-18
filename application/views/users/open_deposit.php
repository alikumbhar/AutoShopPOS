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





<script language="javascript"><!--
function openCalculator(id)
{

  w = 225; h = 400;
  t = (screen.height-h-30)/2;
  l = (screen.width-w-30)/2;
  window.open('?a=calendar&type=' + id, 'calculator' + id, "top="+t+",left="+l+",width="+w+",height="+h+",resizable=1,scrollbars=0");


  
  for (i = 0; i < document.spendform.h_id.length; i++)
  {
    if (document.spendform.h_id[i].value == id)
    {
      document.spendform.h_id[i].checked = true;
    }
  }

  

}

function updateCompound() {
  var id = 0;
  var tt = document.spendform.h_id.type;
  if (tt && tt.toLowerCase() == 'hidden') {
    id = document.spendform.h_id.value;
  } else {
    for (i = 0; i < document.spendform.h_id.length; i++) {
      if (document.spendform.h_id[i].checked) {
        id = document.spendform.h_id[i].value;
      }
    }
  }

  var cpObj = document.getElementById('compound_percents');
  if (cpObj) {
    while (cpObj.options.length != 0) {
      cpObj.options[0] = null;
    }
  }

  if (cps[id] && cps[id].length > 0) {
    document.getElementById('coumpond_block').style.display = '';

    for (i in cps[id]) {
      cpObj.options[cpObj.options.length] = new Option(cps[id][i]);
    }
  } else {
    document.getElementById('coumpond_block').style.display = 'none';
  }
}
var cps = {};
--></script>




<h3>Make a Deposit:</h3>
<br>

<?php echo form_open('deposit/confirm_deposit'); ?>
<input type="hidden" name="a" value="deposit">
 Select a plan:<br>
<table cellspacing="1" cellpadding="2" border="0" width="100%"><tbody><tr>
 <th colspan="3">
	<input type="radio" name="h_id" value="1" checked="" onclick="updateCompound()"> 
<!--	<input type=radio name=h_id value='1'  checked  > -->

	<b>+180% plan for this [ $0.3 Mininum Deposit ] ~ 25% - 15% - 10% - 5% ( Refferal Commissions 4 Levels)</b></th>
</tr><tr>
 <td class="inheader">Plan</td>
 <td class="inheader" width="200">Spent Amount ($)</td>
 <td class="inheader" width="100" nowrap=""><nobr>Daily Profit (%)</nobr></td>
</tr>
<tr>
 <td class="item">Min/Max</td>
 <td class="item" align="right">$0.30 - $1000.00</td>
 <td class="item" align="right">180.00</td>
</tr>
</tbody></table><br><br>
<script>
cps[1] = [];
</script>


<table cellspacing="1" cellpadding="2" border="0" width="100%"><tbody><tr>
 <th colspan="3">
  <input type="radio" name="h_id" value="2"  onclick="updateCompound()"> 
<!--  <input type=radio name=h_id value='1'  checked  > -->

  <b>+260% plan for this [ $10 Mininum Deposit ] ~ 25% - 15% - 10% - 5% ( Refferal Commissions 4 Levels)</b></th>
</tr><tr>
 <td class="inheader">Plan</td>
 <td class="inheader" width="200">Spent Amount ($)</td>
 <td class="inheader" width="100" nowrap=""><nobr>Daily Profit (%)</nobr></td>
</tr>
<tr>
 <td class="item">Min/Max</td>
 <td class="item" align="right">$10 - $10000.00</td>
 <td class="item" align="right">260.00</td>
</tr>
</tbody></table><br><br>
<script>
cps[1] = [];
</script>


<table cellspacing="1" cellpadding="2" border="0" width="100%"><tbody><tr>
 <th colspan="3">
	<input type="radio" name="h_id" value="3" onclick="updateCompound()"> 
<!--	<input type=radio name=h_id value='2'  > -->

	<b>+340% plan for this [ $50 Mininum Deposit ] ~  Get 35% - 15% - 10% - 5% ( Refferal Commissions 4 Levels)</b></th>
</tr><tr>
 <td class="inheader">Plan</td>
 <td class="inheader" width="200">Spent Amount ($)</td>
 <td class="inheader" width="100" nowrap=""><nobr>Daily Profit (%)</nobr></td>
</tr>
<tr>
 <td class="item">Min/Max</td>
 <td class="item" align="right">$50.00 - $500000.00</td>
 <td class="item" align="right">340.00</td>
</tr>
</tbody></table><br><br>
<script>
cps[2] = [];
</script>

<table cellspacing="0" cellpadding="2" border="0">
<tbody><tr>
 <td>Your account balance ($):</td>
 <td align="right">$0.00</td>
</tr>
<tr><td>&nbsp;</td>
 <td align="right">
  <small>
                          </small>
 </td>
</tr>
<tr>
 <td>Amount to Spend ($):</td>
 <td align="right"><input type="text" name="amount" value="0.30" class="inpts" size="15" style="text-align:right;"></td>
</tr>
<tr id="coumpond_block" style="display:none">
 <td>Compounding(%):</td>
 <td align="right">
  <select name="compound" class="inpts" id="compound_percents"></select>
 </td>
</tr>

<tr>
  <td colspan="2">
   <table cellspacing="0" cellpadding="2" border="0">
    <tbody>
    <tr>
     <td><input type="radio" name="type" value="1-pm" checked=""></td>
     <td>Spend funds from PerfectMoney</td>
    </tr>
    <tr>
     <td><input type="radio" name="type" value="2-pm" ></td>
     <td>Spend funds from Payeer</td>
    </tr>    
          <tr>
     <td><input type="radio" name="type" value="3-btc"></td>
     <td>Spend funds from Bitcoin</td>
    </tr>
          <tr>
     <td><input type="radio" name="type" value="5-ltc"></td>
     <td>Spend funds from Litecoin</td>
    </tr>
          <tr>
     <td><input type="radio" name="type" value="8-doge"></td>
     <td>Spend funds from Dogecoin</td>
    </tr>
          <tr>
     <td><input type="radio" name="type" value="4-eth"></td>
     <td>Spend funds from Ethereum</td>
    </tr>
          <tr>
     <td><input type="radio" name="type" value="6-xrp"></td>
     <td>Spend funds from Bitcoin Cash</td>
    </tr>
          <tr>
     <td><input type="radio" name="type" value="7-dash"></td>
     <td>Spend funds from Dash</td>
    </tr>
          <tr>
     <td><input type="radio" name="type" value="process_1000"></td>
     <td>Spend funds from +30 Alt Coin ( 30% First Deposit Bonus )</td>
    </tr>
      </tbody></table>
  </td>
</tr>
<tr>
 <td colspan="2"><input type="submit" value="Spend" class="sbmt"></td>
</tr></tbody></table>
</form>

<script language="javascript">
for (i = 0; i<document.spendform.type.length; i++) {
  if ((document.spendform.type[i].value.match(/^process_/))) {
    document.spendform.type[i].checked = true;
    break;
  }
}
updateCompound();
</script>




