<?php session_start(); 


if(isset($_POST['total'])){
//echo $_POST['total']." ".$_POST['discount'];
$_SESSION['totalp'] =$_POST['total'];
$_SESSION['discp']  =$_POST['discount'];
exit;
}
?>
<div id="invoice-POS" style="text-align: center;">
    
    <center id="top">
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

        <h2>AutoManic</h2>

        <p> 

            Address : Gulberg Green ISB</br>
            Email   : abc@gmail.com</br>
            Phone   : 555-555-5555</br>
        </p>
      </div>
    </div><!--End Invoice Mid-->
                
              <div id="bot">
          <div id="table">
            <table>
              <tr class="tabletitle">

        <tr>


<!--                 <td class="item"><h5>Product Name</h5></td>
 -->            <td class="item"><h5>ITEM</h5></td>
                <td class="Hours"><h5>QTY</h5></td>
                <td class="Hours"><h5>Discount</h5></td>

              </tr>


  <?php
    foreach ($_SESSION["cart_item"] as $item){

?>
              <tr class="service">
                             <td class="tableitem"><p class="itemtext" id="product_name"><?php echo $item["product_name"]; ?></p></td>
                <td class="tableitem"><p class="itemtext" id="pro_quantity"><?php echo $item["quantity"]; ?></p></td>

<?php } ?>

                     <td class="Hours"><h5><?php echo $_SESSION['discp'] ?></h5></td>
                   </tr>



              <tr class="tabletitle">
                <td></td>
                <td class="Rate"><h2>Total</h2></td>
                <td class="tableitem">
<h2><?php echo $_SESSION['totalp'];
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