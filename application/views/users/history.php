<?php $this->load->view('users/libs/header');?>

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
function go(p)
{
  document.opts.page.value = p;
  document.opts.submit();
}
</script>


<table cellspacing="0" cellpadding="0" border="0" width="100%"><tbody><tr>
 <td colspan="3">
	<h3></h3>
 </td>
</tr>


    <section class="section-page">
      <div class="wrapper">
        
        <div class="flex">
          <div class="user-dashboard">
            <div class="user-box">

            </div>


          </div>
            

          <div class="action-dashboard">




<?php  if($this->uri->segment(1) =="a=deposit_list"){ echo '<h2 class="page__title">My Deposit</h1>';}else{  ?>
<h2 class="page__title">View Histroy</h2>

   <select name="ec" class="form-control" style="width: 800px;float: left;height: 50px;">
     <option value="-1">All eCurrencies</option>
 <option value="18">PerfectMoney</option>
 <option value="48">Bitcoin</option>
 <option value="68">Litecoin</option>
 <option value="79">Dogecoin</option>
 <option value="69">Ethereum</option>
 <option value="77">Bitcoin Cash</option>
 <option value="71">Dash</option>
   </select>

<div class="box-page">

<select onchange="check(this)" class="form-control" style="width: 800px;float: left;height: 50px;">
  <option>Select Transactions</option>

  <?php if($this->uri->segment(2)=="deposit"){  ?><option value="1" selected="">By Deposit</option><?php } else { ?>
  <option value="1">By Deposit</option>
  <?php } ?>
    <?php if($this->uri->segment(2)=="withdraw"){  ?><option value="2" selected="">By Withdraw</option><?php } else { ?>
<option value="2">By Withdraw</option>
  <?php } ?>
    
  <?php if($this->uri->segment(2)=="earning"){  ?>
      <option value="3" selected="">By Earning</option>
    <?php } else { ?>
<option value="3">By Earning</option>
  <?php } ?>


  <?php if($this->uri->segment(2)=="referals"){  ?>
    <option value="4" selected="">By Referals</option>
  <?php } else { ?>
  <option value="4">By Referals</option>
  <?php } ?>

</select>
<?php } ?>
<div class="tabs">
    
   <ul class="tab-content">

 
<!--       <li class="tab-content__item js-tab-content active" data-tab="1">
        <div class="not_found"><i class="fas fa-search-dollar"></i><p>Not found operations</p></div><table class="table">
                </table>
      </li>
 -->

<?php 

if(!empty($history)){  ?>

<table style="width: 800px" class="table table-bordered">
  <tr style="background: #f1f1f3;border-radius: 16px;">
    <th><b>Type</b></th>
    <td><b>Amount</b></td>
    <th style="float: right;margin-right: 60px;">Date</th>    
  </tr>
  <?php foreach ($history as $ern) { ?>
    <tr>
<?php $dt = new DateTime($ern->dates);

 $date = $dt->format(' Y - m - d');


 ?>
    <td><b><?php if($this->uri->segment(2) ==""){ echo "DEPOSIT";}else{ echo strtoupper($this->uri->segment(2)); } ?></b></td>
    <td><b><?= $ern->earned_amount; ?></b></td>
    <td><b><?= $date ?></b></td>    
  </tr>
<?php } ?>
</table>

<?php }else{ ?><span style='color:#230404'><b>&nbsp<br></b></span><div class="alert alert-dismissable" role="alert">
  No record found!
</div>
 <?php } ?>
</div>

</div>
      </div>

    </div></div></section>


<script type="text/javascript">
function check(sel) {
  var v = sel.options[sel.selectedIndex].value
  if(v ==1){
    window.location="<?php echo base_url(); ?>history/deposit";
  }
  if(v ==2){
    window.location="<?php echo base_url(); ?>history/withdraw";
  }
  if(v ==3){
    window.location="<?php echo base_url(); ?>history/earning";
  }
  if(v ==4){
    window.location="<?php echo base_url(); ?>history/referals";
  }      
}

</script>
