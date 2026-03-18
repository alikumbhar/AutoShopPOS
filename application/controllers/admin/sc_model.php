<?php

class sc_model extends CI_Model {

public function __construct() {

   // parent::__construct();

   $this->load->database();

}


///////////add tested category for other project will be removed after successfully testing


//--------------------------
/*
****************************
admin Edit Products  section End 
****************************
*/


public function delete_product($id){
  $this->db->where('pro_id', $id);
  $query =  $this->db->delete('products');
  return $query;
}
public function update_product($id,$data){

  $this->db->where('pro_id', $id);
  $query =  $this->db->update('products',$data);
  return $query;
}
public function get_product_with_id($id){
$this->db->where('pro_id',$id);
$query = $this->db->get("products");
return $query->result();  
}

public function disable_product($id,$data){

  $this->db->where('pro_id', $id);
  $query =  $this->db->update('products',$data);
  echo $this->db->_error_message();
  return $query;
}

/*
****************************
admin Edit Products  section End 
****************************
*/


//--------------------------
/*
****************************
admin Service section Start 
****************************
*/
public function add_service($data){

$query = $this->db->insert('services',$data);
echo $this->db->_error_message();
return $query;
}
public function get_service(){
$this->db->order_by('service_id','DESC');
$query = $this->db->get("services");
return $query->result();  
}
public function delete_service($id){
  $this->db->where('service_id', $id);
  $query =  $this->db->delete('services');
  return $query;
}
public function update_service($id,$data){

  $this->db->where('service_id', $id);
  $query =  $this->db->update('services',$data);
  return $query;
}
public function get_service_with_id($id){
$this->db->where('service_id',$id);
$query = $this->db->get("services");
return $query->result();  
}

/*
****************************
admin Service section End 
****************************
*/

//--------------------------
/*
****************************
admin Service Type section Start 
****************************
*/
public function insertServiceType($data){
$query = $this->db->insert('service_type',$data);
return $query;
}
public function get_service_type(){
$this->db->order_by('st_id','ASC');
$query = $this->db->get("service_type");
return $query->result();  
}
public function delete_service_type($id){
  $this->db->where('st_id', $id);
  $query =  $this->db->delete('service_type');
  return $query;
}
public function update_service_type($id,$data){

  $this->db->where('st_id', $id);
  $query =  $this->db->update('service_type',$data);
  return $query;
}
public function get_service_with_id_type($id){
$this->db->where('st_id',$id);
$query = $this->db->get("service_type");
return $query->result();  
}

/*
****************************
admin Service Type section End 
****************************
*/

//--------------------------
/*
****************************
admin Vehcile Type section Start 
****************************
*/
public function add_vehicle_type($data){
$query = $this->db->insert('services',$data);
return $query;
}
public function get_vehicle_type(){
$this->db->order_by('vt_id','ASC');
$query = $this->db->get("vehicle_type");
return $query->result();  
}
public function delete_vehicle_type($id){
  $this->db->where('st_id', $id);
  $query =  $this->db->delete('service_type');
  return $query;
}
public function update_vehicle_type($id,$data){

  $this->db->where('st_id', $id);
  $query =  $this->db->update('service_type',$data);
  return $query;
}
public function get_vehicle_with_id_type($id){
$this->db->where('st_id',$id);
$query = $this->db->get("service_type");
return $query->result();  
}

/*
****************************
admin Vehcile Type section End 
****************************
*/



public function getCategroy(){
  $query = $this->db->get('category');
  return $query->result();
}
public function getUnit($id){
  $query = $this->db->query('SELECT * FROM products where pro_id ="'.$id.'" ');
 echo $this->db->_error_message();
  return $query->result();  
}
public function getInventory(){
  // $query = $this->db->query('SELECT * FROM products pr, category ct,suppliers sp,brand bd
  // WHERE ct.category_id = pr.category_id
  // AND  sp.supplier_id = pr.supplier_id
  // AND pr.brand_id = bd.brand_id');

  $query = $this->db->query('SELECT  p.*,c.category as cat,bc.brand as brandC  FROM products p, category c,brand bc
WHERE p.category_id = c.category_id
AND bc.brand_id = p.brand_id
ORDER BY p.pro_id DESC ');
 echo $this->db->_error_message();
  return $query->result();
}
public function getCredit(){
           
  $query = $this->db->query('SELECT * FROM credit cd,customers ct WHERE cd.customer_id = ct.id');
 echo $this->db->_error_message();
  return $query->result(); 
}

public function getCreditwithID($id){
   $query = $this->db->query('SELECT * FROM credit cd,customers ct WHERE cd.customer_id = ct.id');
 echo $this->db->_error_message();
  return $query->result();  
}

public function getItems(){
  $query = $this->db->get('items');
  return $query->result();
}
public function getItemsCS(){
  $query = $this->db->get('items');
  return $query->result_array();
}

public  function getProByCats($id){

           $this->db->where('category_id',$id);
$query = $this->db->get('products');
 
   return $query->result();
}
  


public function importItems($item_id,$item_name,$item_detail,$category_id,$item_type,$company_name,$supplier_id,$unit_price,$selling_price,$stock_item,$remaining_stock,$expire_date){
     // echo $fname." ".$lname;
   //$data['item_id'] = $item_id;
   $data['item_name'] = $item_name;
   $data['item_detail'] = $item_detail;
   $data['category_id'] = $category_id;
   $data['item_type'] = $item_type;
   $data['company_name'] = $company_name;         
   $data['supplier_id'] = $supplier_id;   
   $data['unit_price'] = $unit_price;
   $data['selling_price'] = $selling_price;  
   $data['stock_item'] = $stock_item;  
   $data['remaining_stock'] = $remaining_stock;            
   $data['expire_date'] = $expire_date;               

return    $this->db->insert('items',$data);
    //$this->db->query($query);
  
}
public function insertCategory($data){
  $query = $this->db->insert("category",$data);
  return $query;
}

public function delete_credit($id){
  $this->db->where('c_id',$id);
return  $this->db->delete('credit');
}

public function insertCredit($data){

  $query = $this->db->insert("credit",$data);
  echo $this->db->_error_message();
  return $query;
}
public function insertBrand($data){
  $query = $this->db->insert("brand",$data);
  return $query;
}

public function insertItem($data,$dtype){
  $query = $this->db->insert("items",$data);
  $last_id = $this->db->insert_id();
  $dtype['i_type'] =  $last_id;
  $query = $this->db->insert("item_type",$dtype);
  return $query;
}


public function getItemswithSupplier_id($id){
             $this->db->where('supplier_id',$id);
    $query = $this->db->get('items');
    return $query->result();
}


public function getQuanitiy($id){
             $this->db->where('item_id',$id);
    $query = $this->db->get('items');
    return $query->row();
}

public function checkBarcode($id){
$query = $this->db->query('select * from products where barcode = "'.$id.'"');

if($query->num_rows() == 1){
return "success";  
}else{
  return "false";
}
}
public function insertProduct($data){

  $query = $this->db->insert("products",$data);
  echo $this->db->_error_message();
  return $query;
}


public function get_category_with_id($id){
$this->db->where('category_id',$id);
$query = $this->db->get("category");
return $query->result();  
}

public function update_category($id,$data){
  $this->db->where('category_id', $id);
  $query =  $this->db->update('category',$data);
  return $query;
}
public function delete_category($id){

  $this->db->where('category_id', $id);
  $query =  $this->db->delete('category');
  return $query;
}

public function getbrand(){
  $query = $this->db->get('brand');
  return $query->result();
}

public function getSupplier(){
  $query = $this->db->get('suppliers');
  return $query->result();
}

public function insertSupplier($data){
  $query  = $this -> db -> insert('suppliers',$data);
  return $query;
}

public function get_supplier_with_id($id){
$this->db->where('supplier_id',$id);
$query = $this->db->get("suppliers");
return $query->result();  
}

public function update_supplier($id,$data){

  $this->db->where('supplier_id', $id);
  $query =  $this->db->update('suppliers',$data);
  return $query;
}

public function delete_supplier($id){
  $this->db->where('supplier_id', $id);
  $query =  $this->db->delete('suppliers');
  return $query;
}



public function getCustomer(){
    $query = $this->db->get('customers');
    return $query->result();
} 


public function insertCustomer($data){
  $query  = $this -> db -> insert('customers',$data);
  return $query;
}

public function get_customer_with_id($id){
$this->db->where('id',$id);
$query = $this->db->get("customers");
return $query->result();  
}

public function update_customer($id,$data){
print_r($data);
  $this->db->where('id', $id);
  $query =  $this->db->update('customers',$data);
  return $query;
}

public function delete_customer($id){
  $this->db->where('id', $id);
  $query =  $this->db->delete('customers');
  return $query;
}



public function inventory_reports(){
   $query = $this->db->query('SELECT itm.*,ityp.*,ct.category,ct.category_id,sup.supplier_name,sup.supplier_id 
FROM items itm, item_type ityp,category ct,suppliers sup 
WHERE ityp.i_type = itm.item_id 
AND ct.category_id = itm.category_id
AND sup.supplier_id = itm.supplier_id');
  return $query->result();
}


// public function insert_ad_sale_invoice($data){
//    $Query =  $this->db->insert('product_sale_invoice',$data);
//     return $Query;
// }

public function insert_ad_sale_invoice($data,$item_name,$Querys){

  $Query =  $this->db->insert('product_sale_invoice',$data);
  $last_id = $this->db->insert_id();
  $item_name['product_sale_id'] =  $last_id;
  $Query = $this->db->insert("product_sale",$item_name);
  foreach( $Querys as $q):
  $this->db->query($q);
  endforeach;
  echo $this->db->_error_message();
  return $Query;
}

public function getSaleReports(){
    $query = $this->db->query('SELECT * from product_sale_invoice');
  return $query->result(); 
}

public function addSale($data){
$item_id = $data['item_id'];
$this->db->where('item_id',$item_id);
$getQ = $this->db->get('items');
$r = $getQ->row();
 //echo $data['stock_quantity']." | " .$r->stock_item."  ";
$t =     $r->remaining_stock - $data['stock_quantity']; 
$upd = array('remaining_stock' => $t);
$Query =  $this->db->insert('sales_invoice',$data);
$this->db->where('item_id',$item_id);
$this->db->update('items',$upd);
 return $Query;
}

public function getreplenishment30days(){
  $Query = $this->db->query('SELECT * FROM products 
WHERE  entry_date BETWEEN (CURRENT_DATE() - INTERVAL 1 MONTH) AND CURRENT_DATE();
');
    $query =  $Query->result();
    echo $this->db->_error_message();
    return $query;
}

public function getStockConsumptio30days(){
  $Query = $this->db->query('SELECT * FROM products 
WHERE  entry_date BETWEEN (CURRENT_DATE() - INTERVAL 1 MONTH) AND CURRENT_DATE();
');
    $query =  $Query->result();
    echo $this->db->_error_message();
    return $query;
}


public function getSaleReportsByLast30DAys(){
  $Query = $this->db->query('SELECT * FROM product_sale_invoice psi, product_sale ps 
WHERE ps.product_sale_id = psi.id_inv
AND sale_date BETWEEN (CURRENT_DATE() - INTERVAL 1 MONTH) AND CURRENT_DATE()
ORDER By psi.id_inv DESC
');
    return $Query->result();
}

public function getSale(){
  $Query = $this->db->query('SELECT * FROM sales_invoice si,customers cs,items itm 
WHERE si.customer_id= cs.id
AND itm.item_id = si.item_id');
    return $Query->result();
}


public function getSaleBYID($id){
  $Query = $this->db->query('SELECT * FROM sales_invoice si,customers cs,items itm 
WHERE si.customer_id= cs.id
AND itm.item_id = si.item_id
AND si.invoice_no ="'.$id.'" ');
    return $Query->row();
}


public function getSaleInvID(){

    $Query = $this->db->query('SELECT * FROM sales_invoice order by invoice_id DESC limit 0,1');
    return $Query->row();

}
public function insertPurchase($data){
 $Query =  $this->db->insert('purchase_invoice',$data);
 return $Query;  

}

    public function authenticate_by_verification_code($vcode) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('verification_code', $vcode);
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->row();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
    }
      public function get_member_by_email($email){
    
    $Q = $this->db->query("SELECT verification_code FROM users WHERE email = '".$email."'");
    
        if ($Q->num_rows > 0) {
            $return = $Q->row('verification_code');
        
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
  }

public function authenticate_users_admin($email, $password) {
        $this->db->select('*');

        $this->db->from('admin');

        $this->db->where('email', $email);

    $this->db->where('users_password', $password);

         $Q = $this->db->get();

       

        if ($Q->num_rows > 0) {

  

            $return = $Q->row();


        } else {

            $return = 0;

        }

         $Q->free_result();

        

        return $return;

    }
    ///end for admin
public function getAdminrole($id){

  $role = $this->db->query("select * from user_roles where role_id = '".$id."'");
  return $role->row();
}
//login user check if exist return value in session
  public function authenticate_users($email, $password) {

         $Q = $this->db->query("select * from users 
          where email= '$email' 
          AND user_password = '".$password."'
          ");

          $ro = $Q->row();
         $d = $Q->row(); 

       

        if ($d->status) {


            $return = 1;
        } else {

            $return = 0;

        }

//         $Q->free_result();

        

        return $ro;

    }

    //end of user login


public function getsiteSetting(){
  $query = $this->db->get('site_setting');
  return $query->row();
}

public function update_company_setting($id,$data){

  $this->db->where('id', $id);
  $query =  $this->db->update('site_setting',$data);
  echo $this->db->_error_message();
  return $query;
}

public function getBank(){
  $this->db->order_by('id','DESC');
  $query = $this->db->get('bank');
 return $query->result();
}

public function insertBank($data){
 $Query =  $this->db->insert('bank',$data);
 echo $this->db->_error_message();
 return $Query;  
}
public function insertDeposit($data){
 $Query =  $this->db->insert('bank_deposit',$data);
 echo $this->db->_error_message();
 return $Query;  
}
public function insertFunds($data){
 $Query =  $this->db->insert('exchange_funds',$data);
 echo $this->db->_error_message();
 return $Query;   
}
public function getAccount(){
 $Query =  $this->db->get('bank');
 return  $Query->result();
}

public function edit_bank($id){
$this->db->where('id',$id);
$query = $this->db->get("bank");
return $query->row();  
}

public function update_bank($id,$data){
  $this->db->where('id', $id);
  $query =  $this->db->update('bank',$data);
  echo $this->db->_error_message();
  return $query;
}

public function delete_bank($id){
  $this->db->where('id', $id);
  $query =  $this->db->delete('bank');
  echo $this->db->_error_message();
  return $query;
}


public function getCheque(){
           $this->db->order_by('cheque_id','DESC');
  $query = $this->db->get('cheque');
  return $query->result();
}
public function insertCheque($data){
 $Query =  $this->db->insert('cheque',$data);
 echo $this->db->_error_message();
 return $Query;  
}

public function edit_cheque($id){
$this->db->where('cheque_id',$id);

$query = $this->db->get("cheque");
return $query->row();  

}

public function update_cheque($id,$data){
  $this->db->where('cheque_id', $id);
  $query =  $this->db->update('cheque',$data);
echo $this->db->_error_message();
  return $query;
}

public function delete_cheque($id){
  $this->db->where('cheque_id', $id);
  $query =  $this->db->delete('cheque');
echo $this->db->_error_message();
  return $query;
}




/*
******************************
admin users section Start 
******************************
*/

// public function add_users($data){
// $query = $this->db->insert('postal',$data);
// return $query;
// }

public function getUsers(){

  $query = $this->db->query('SELECT us.*,ur.name AS role_name,ur.id AS role_id FROM users us, user_roles ur WHERE us.role_id = ur.id 
      order by us.id desc');
  return $query->result();
}

public function add_users($data){

  $query =    $query  = $this->db->insert('users',$data);;
  echo $this->db->_error_message();
  return $query;
}

public function getRole(){
  $Query = $this->db->get('user_roles');
  return $Query->result();
}
public function delete_users($id){
  $this->db->where('id',$id);
  return $this->db->delete('users');
}



public function update_users($id,$data){

  $this->db->where('id', $id);
  $query =  $this->db->update('users',$data);
  echo $this->db->_error_message();
  return $query;
}
public function get_users_with_id($id){

$this->db->where('id',$id);
$query = $this->db->get("users");
$q =  $query->row();  
return $q;
}
public  function block_users($id,$data){
$this->db->where('user_id',$id);
$query = $this->db->update('users',$data);
return $query;
}

/*
******************************
admin users section END 
******************************
*/




/*
******************************
Reports Section - added the reports section
******************************
*/

//open Account transaction - report get Payment Method
public function getPaymentMethod(){
$Query = $this->db->query('select * form sales');
return $Query->result();
}

//open Account transaction - report get transactions
public function getTransaction(){

}

//by customers report top sale
public function TopSales(){

}

//by Suppliers report top sale
public function saleAnalytics(){

}

// by suppliers report sales analytics
public function salesBrief(){

}


//by Sales report - comission from sales person
public function ComissionBySalesPerson(){

} 

//by Sales report - peakHours
public function peakHours(){

}


//Sales report By Categories & Products
public function Categories_products(){

}
// sales report By SalesProduct 
public function getSaleByPRoduct(){
  
}


// get sales report By SalesByBrand 
public function getSaleByBrand(){
  
}

//get sales report By SalesByBrand 
public function getSaleByCustomerCategory(){
  
}

//get sales report By SalesByBrand 
public function getSaleByBundle(){
  
}

//get sales report By SalesByTax 
public function getSaleByTax(){
  
}

}
