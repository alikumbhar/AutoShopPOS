<?php session_start(); 


date_default_timezone_set("Asia/Karachi");
if(isset($_POST['total'])){

$_SESSION['totalp'] =$_POST['total'];
$_SESSION['gt'] =$_POST['gt'];
$_SESSION['discp'] =$_POST['discount'];
$_SESSION['company_name'] = $_POST['company_name'];

$_SESSION['address'] =$_POST['address'];

}
?>
<div id="invoice-POS">
 
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        body {
            font-size: 11pt;
            line-height: 12pt;
        }

        .product th,
        table .product {
            border-top: 1px solid #2B2B2B;
            border-collapse: collapse;
            font-size: 11pt;
            font-weight: 600;
        }

        .sum_table th, table .sum_table {
            border-collapse: collapse;
            font-size: 11pt;
        }

        .sum_table td, .sum_table tr {
            border-collapse: collapse;
            font-size: 12pt;
            padding-top: 5pt;
        }

        .product td, .product tr {
            border-top: 1px solid #8c8c8c;
            border-collapse: collapse;
            font-size: 10pt;
            padding-top: 5pt;
        }

        td.description,
        th.description {
            width: 33mm;
            max-width: 57mm;
        }

        td.quantity,
        th.quantity {
            width: 12mm;
            max-width: 12mm;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 12mm;
            max-width: 12mm;
            word-break: break-all;
        }

        td.summary {
            width: 28mm;
            max-width: 28mm;
            word-break: break-all;

        }

        .text_right {
            text-align: right;
        }


        .align_center {
            text-align: center;
            align-content: center;
        }

        .receipt {
            width: 57mm;
            max-width: 57mm;
            font-size: 10px;
        }

        img {
            max-width: inherit;
            width: inherit;
            max-height: 20mm;
        }

        .stamp {
            margin: 5pt;
            padding: 3pt;
            border: 1pt solid #111;
            text-align: center;
            font-size: 12pt;
            
        }
#myModal .modal-content{
  width: 75mm;
}  
    </style>
    <title>Invoice Number</title>
</head>

<body dir="ltr" >
<div class="receipt">
    <div class="align_center">
      <img src="../../../pos/pics/logo.png" alt="">
    </div>

    <p class="align_center"><?php echo $_SESSION['company_name']; ?><small>
      <?php echo $_SESSION['address'] ; ?></small> </p>

    <table class="product">
        <thead>
        <tr>
            <th class="description">Description</th>
            <th class="quantity">Qty</th>
            <th class="price">Price</th>
        </tr>
        </thead>
        <tbody>
    <?php
    foreach ($_SESSION["cart_item_edit"] as $item){
?>
        <tr>
               <td ><p id="product_name"><?php echo $item["product_name"]; ?></p></td>
                <td><p  id="pro_quantity"><?php echo $item["quantity"]; ?></p></td>
                <td><?php echo $item["sale_price"]; ?></td>
           </tr>

           

  <?php } ?>
  <tr>
    <td>Total</td>
    <td style="float: right">Discount</td>

    
  </tr>
  <tr>
    <td> <?php echo $_SESSION['totalp'];
 ?>                          
</td>
    <td><?php echo $_SESSION['discp'] ?>
</td>
</td>
    
</tr>
        </tbody>
    </table>
    <hr>
<!--     <table class="sum_table">
        <tbody>
        <tr>
            <td class="summary text_right">TAX :</td>
            <td class="summary">51.72 $</td>
        </tr>
        <tr>
            <td class="summary text_right">Discount :</td>
            <td class="summary">4.00 $</td>
        </tr>
        <tr>
            <td class="summary text_right">Grand Total :</td>
            <td class="summary">909.72 $</td>
        </tr>
        </tbody>
    </table> -->
    <hr>
    <p class="align_center"><small>Thank you for being our valued customer!</small></p>
            <div class="stamp">Pay:<?php echo $_SESSION['gt'] ?></div>
        </div>
</body>
</html>

</div>