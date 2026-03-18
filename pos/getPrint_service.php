<?php session_start(); 


if(isset($_POST['total'])){
//echo $_POST['total']." ".$_POST['discount'];
$_SESSION['totalp'] =$_POST['total'];
$_SESSION['discp']  =$_POST['discount'];
$_SESSION['company_name'] = $_POST['company_name'];

$_SESSION['address'] =$_POST['address'];
exit;
}
?>
<style type="text/css">
  .modal-dialog{
    overflow-y: initial !important
}
.modal-body{
    height: 400px ;
    overflow-y: auto;
}
.rightDate{
  float: right;
}
</style>
<div id="invoice-POS" style="text-align: center;">
 <center id="top">
      <span class="rightDate"> <?php echo date('d-m-y') ." ".date('h:i A', time()); ?> 
         </span>
      <div class="logo"></div>

    </center><!--End InvoiceTop-->
<!--    runQuery('SELECT psv.*,p.pro_id,p.product_name,ci.firstname FROM products p,customers ci,product_sale_invoice psv 
   WHERE psv.product_id = p.pro_id
   ORDER  BY id_inv DESC
   LIMIT 0,1
   ');
    ?> -->
 <div id="mid">
      <div class="info">

        <h2><?php echo $_SESSION['company_name']; ?></h2>

      <?php echo $_SESSION['address'] ; ?>  
      </div>
    </div><!--End Invoice Mid-->
                
              <div id="bot">
          <div id="table">
            <table>
              <tr class="tabletitle">

            <tr>
            <td class="item"><h5>Service Name</h5></td>
              </tr>


  <?php
    foreach ($_SESSION["cart_service"] as $item){ ?>
          <tr class="service">
          <td class="tableitem"><span id="product_name"><?php echo $item["service"]; ?></span></td>
         </tr>
<?php } ?>


              <tr class="tabletitle">
                <td></td>
                <td class="Rate"><h2>Total</h2></td>
                <td class="tableitem">
<h2><?php if(!empty($_SESSION['totalp'])): echo $_SESSION['totalp']; endif;
 ?></h2>                            </td>    
              </tr>

            </table>
          </div><!--End Table-->

          <div id="legalcopy">
            <p class="legal">
              <strong>Powered By </strong>Techobites islamabad</p>
          </div>

        </div><!--End InvoiceBot-->
  </div><!--End Invoice-->

<?php unset($_SESSION['totalp']);
      unset($_SESSION['discp']);
      ?>