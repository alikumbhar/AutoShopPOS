<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shopping_cart extends CI_Controller {
 
 function index()
 {
  $this->load->model("shopping_cart_model");
  $data["product"] = $this->shopping_cart_model->fetch_all();
  $this->load->view("shopping_cart", $data);
 }

public function products(){
         $this->load->model("shopping_cart_model");
  $id =  $this->input->post('id');
  $products  = $this->shopping_cart_model->getProbyCId($id); 

   foreach($products as $row)
   {
    echo '
    <div class="col-md-4" style="" align="center">
    <br />
     <input type="text" value="1" name="quantity" placeholder="Enter quantity" class="form-control quantity" id="'.$row->pro_id.'" /><br />
     <button type="button" name="add_cart" class="button1 add_cart" data-productname="'.$row->product_name.'" data-price="'.$row->sale_price.'" data-productid="'.$row->pro_id.'"  >'.$row->product_name.'   &nbsp &nbsp</button><br /><br />

    </div>
    ';
   }
   
}
 function add()
 {
  $this->load->library("cart");
  $data = array(
   "id"  => $_POST["product_id"],
   "name"  => $_POST["product_name"],
   "qty"  => $_POST["quantity"],
   "price"  => $_POST["product_price"]
  );
  $this->cart->insert($data); //return rowid 
  echo $this->view();
 }

 function load()
 {
  echo $this->view();
 }

 function remove()
 {
  $this->load->library("cart");
  $row_id = $_POST["row_id"];
  $data = array(
   'rowid'  => $row_id,
   'qty'  => 0
  );
  $this->cart->update($data);
  echo $this->view();
 }

 function clear()
 {
  $this->load->library("cart");
  $this->cart->destroy();
  echo $this->view();
 }
 
 function view()
 {
  $this->load->library("cart");
  $output = '';
  $output .= '
  <h3>Shopping Cart</h3><br />
  <div class="table-responsive">
   <div align="right">
    <button type="button" id="clear_cart" class="btn btn-warning">Clear Cart</button>
   </div>
   <br />
   <table class="table table-bordered">
    <tr>
     <th width="40%">Name</th>
     <th width="15%">Quantity</th>
     <th width="15%">Price</th>
     <th width="15%">Total</th>
     <th width="15%">Action</th>
    </tr>

  ';
  $count = 0;
  foreach($this->cart->contents() as $items)
  {
   $count++;
   $output .= '
   <tr> 
    <td>'.$items["name"].'</td>
    <td>'.$items["qty"].'</td>
    <td>'.$items["price"].'</td>
    <td>'.$items["subtotal"].'</td>
    <td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="'.$items["rowid"].'">Remove</button></td>
   </tr>
   ';
  }
  $output .= '
   <tr>
    <td colspan="4" align="right">Total</td>
    <td>'.$this->cart->total().'</td>
   </tr>
  </table>

  </div>
  ';

  if($count == 0)
  {
   $output = '<h3 align="center">  Cart is empty - please select any product for sale</h3>';
  }
  return $output;
 }
}
?>