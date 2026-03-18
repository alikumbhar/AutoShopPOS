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


// getSalewithproductforbarchart
public function gettotalSalebyproduct(){
$query = $this->db->query("SELECT psl.product_name,SUM(psl.quantity) AS totalSalebypro
FROM product_sale_invoice psi,
product_sale_list psl
WHERE psi.id_inv = psl.psi_id
AND psi.sale_date BETWEEN (CURRENT_DATE() - INTERVAL 1 MONTH) AND CURRENT_DATE()
GROUP BY psl.product_name");
 	
  return $query->result(); 
}

function getCurrency(){

  $q = $this->db->query('select * from currency');
  	
  return $q->result();
  



}

// gettotalRefund
public function getSaleReturn($from = null,$to =null){
if($from && $to){
  $Query = $this->db->query('SELECT * FROM sale_return
  WHERE return_date BETWEEN "'.$from.'" AND "'.$to.'" 
');
    return $Query->result();
}
else{

  $Query = $this->db->query('SELECT * FROM sale_return');
    return $Query->result();
}
}




// gettotalRefundEnd

// gettotalRefund

public function gettotalRefund(){
$query = $this->db->query("SELECT SUM(refund_amount) AS refund FROM sale_return 
");
 	
  return $query->row(); 
}

// gettotalRefundEnd

// gettotalPaidUnpaid

public function gettotalPaidUnpaid(){
$query = $this->db->query("SELECT SUM(total) AS total,SUM(paid) AS paid FROM product_sale_invoice");
 	
  return $query->row(); 
}
// gettotalPaidUnpaid


//run query for pos home category products

public function runQuery4POSCategory($queryC){
$query = $this->db->query($queryC);
 	
  return $query->result_array(); 
}


public function runQuery4POSCustomer(){
$query = $this->db->query('select * from customers');
 	
  return $query->result_array(); 
}

public function runQuery4POSService($queryC){
$query = $this->db->query($queryC);
 	
 if($query->num_rows() > 0){
  return $query->result_array();
  } 
}

//end of run query pos category products






// getExpireProductsDataLastOneMonth

public function getExpireProductsData(){
$query = $this->db->query("SELECT * FROM products 
WHERE expire_date NOT IN (CURRENT_DATE())
AND expire_date  BETWEEN (CURRENT_DATE() - INTERVAL 1 MONTH) AND CURRENT_DATE() ");
 	
  return $query->result(); 
}
// getExpireProductsDataLastOneMonthEnd

// getSalewithSale12Month

public function gettotalSaleby12(){
$query = $this->db->query("SELECT DATE_FORMAT(sale_date, '%M') AS MONTH, SUM(total) as TOTAL
FROM product_sale_invoice
GROUP BY DATE_FORMAT(sale_date, '%M')");
 	
  return $query->result(); 
}
// EndgetSalewithSale12Month

// getSalewithPurchase12Month

public function gettotalPurchaseby12(){
$query = $this->db->query("SELECT DATE_FORMAT(entry_date, '%M') AS MONTH, SUM(amount_paid) AS TOTAL
FROM purchase_invoice
GROUP BY DATE_FORMAT(entry_date, '%M')");
 	
  return $query->result(); 
}
// getSalewithPurchase12Month



/*  Count Total Expenditure  =*/

public function getStockLimits(){
  

$query = $this->db->query("SELECT category, stock_level,stock_limits,product_name,barcode,pro_id FROM products   
");
 	
  return $query->result(); 
}

/* Count Total Expenditure  end*/

/*  Count Total Expenditure  =*/

public function getCountTotalExpenditures(){
  

$query = $this->db->query("SELECT SUM(amount) AS totalExpense FROM expenditure 
");
 	
  return $query->row(); 
}

/* Count Total Expenditure  end*/

/*  Count Total Sale Due =*/

public function getCountTotalSaleDue(){
  

$query = $this->db->query("SELECT SUM(total) AS totalSaleDue FROM product_sale_invoice WHERE pay_method = 'credit' ");
 	
  return $query->row(); 
}

/* Count Total  Sale end*/

/*  Count Total Sale Cash =*/

public function getCountTotalSaleCash(){
  

$query = $this->db->query("SELECT SUM(total) AS totalSaleCash FROM product_sale_invoice WHERE pay_method = 'cash' ");
 	
  return $query->row(); 
}

/* Count Total Purchase Sale Cash end*/

/*  Count Total Purchase Due =*/

public function getCountTotalPurchaseDue(){
  

$query = $this->db->query("SELECT SUM(add_payment) AS payment , SUM(amount_paid) AS totalpaid FROM purchase_invoice ");
 	
  return $query->row(); 
}

/* Count Total Purchase Due end*/


public function getViewPurchaseReports(){
  

$query = $this->db->query("SELECT pis.*,sp.supplier_name,sp.supplier_id FROM purchase_invoice pis, suppliers sp
WHERE sp.supplier_id  = pis.supplier_id 
ORDER BY pis.invoice_no DESC ");
 	
  return $query->result(); 
}


/*  Count Total Sales =*/

public function getCountTotalSales(){
  

$query = $this->db->query("SELECT count(id_inv) AS saleTotal FROM product_sale_invoice ");
 	
  return $query->row(); 
}

/* Count Total Customer end*/


/*  Count Total Customer =*/

public function getCountTotalPurchases(){
  

$query = $this->db->query("SELECT count(purchase_id) AS purchaseTotal FROM purchase_invoice ");
 	
  return $query->row(); 
}

/* Count Total Customer end*/


/*  Count Total Suppliers =*/

public function getCountSupplier(){
  

$query = $this->db->query("SELECT count(supplier_id) AS totalSupplier FROM suppliers ");
 	
  return $query->row(); 
}

/* Count Total Customer end*/


/*  Count Total Customer =*/

public function getCountCustomer(){
  

$query = $this->db->query("SELECT count(id ) AS totalCustomer FROM customers ");
 	
  return $query->row(); 
}

/* Count Total Customer end*/


/*  Today Sale Record code*/

public function getRecordTodaySale(){
  

$query = $this->db->query("SELECT SUM(paid ) AS total_sale_today FROM product_sale_invoice 
WHERE pay_method='cash'
AND DATE_FORMAT(sale_date, '%Y-%m-%d')  = CURRENT_DATE()");
 	
  return $query->result(); 
}

/*  Today Sale Record code end*/

/*  yesterday Sale Record code*/

public function getRecordYesterdaySale(){
  

$query = $this->db->query("SELECT SUM(paid ) AS total_sale_yesterday FROM product_sale_invoice
  WHERE pay_method='cash'
  AND DATE_FORMAT(sale_date, '%Y-%m-%d')  = SUBDATE(CURRENT_DATE(),1)");
 	
  return $query->result(); 
}
/*  Today yesterday Record code end*/

/*  todayCustomer Record code*/

public function getRecordTodayCustomer(){
  

$query = $this->db->query("SELECT SUM(customer_id) AS today_customers FROM count_customer
  WHERE DATE_FORMAT(count_date, '%Y-%m-%d')  = CURRENT_DATE()");
  	
  return $query->result(); 
}

/*  todayCustomer Record code end*/

/*  yesterdayCustomer Record code*/

public function getRecordyesterdayCustomer(){
  

$query = $this->db->query("SELECT SUM(customer_id) AS yesterday_customers FROM count_customer
  WHERE  DATE_FORMAT(count_date, '%Y-%m-%d')  =  SUBDATE(CURRENT_DATE(),1)");
 	
  return $query->result(); 
}

/*  yesterdayCustomer Record code end*/


/*  yesterdayCustomer Record code*/
public function getRecordTotalPaid(){
  $query = $this->db->query("SELECT SUM(paid) AS totalPaid  FROM product_sale_invoice WHERE pay_method='cash'");
 	
  return $query->result(); 
}
/*  yesterdayCustomer Record code end*/


/*  yesterdayCustomer Record code*/
public function getRecordWeeklySale(){
  $query = $this->db->query("SELECT sum(paid) as weeklyPaid
FROM product_sale_invoice
WHERE pay_method='cash'
AND sale_date > DATE_SUB(CURDATE(), INTERVAL 1 WEEK);");
 	
  return $query->result(); 
}
/*  yesterdayCustomer Record code end*/


/*  getRecordTodaysaleRecieveable Record code*/

public function getRecordTodaysaleRecieveable(){
  

$query = $this->db->query("SELECT SUM(paid) as TodaySaleRecieveable FROM product_sale_invoice WHERE pay_method = 'credit'
AND DATE_FORMAT(sale_date, '%Y-%m-%d')  = CURRENT_DATE()");
 	
  return $query->result(); 
}

/*  getRecordTodaysaleRecieveable Record code End */



/*  getRecordyesterdaysaleRecieveable Record code*/

public function getRecordyesterdaysaleRecieveable(){
  

$query = $this->db->query("SELECT SUM(paid) as YesterdaySaleRecieveable FROM product_sale_invoice WHERE pay_method = 'credit'
AND DATE_FORMAT(sale_date, '%Y-%m-%d')  =  SUBDATE(CURRENT_DATE(),1)");
 	
  return $query->result(); 
}

/*  getRecordyesterdaysaleRecieveable Record code end*/





/*  totalsaleonRecieveable Record code*/
public function totalsaleonRecieveable(){
  $query = $this->db->query("SELECT SUM(paid) as TotalSaleRecieveable FROM product_sale_invoice WHERE pay_method = 'credit'");
 	
  return $query->result(); 
}
/*  totalsaleonRecieveable Record code end*/



public function delete_product($id){
  $this->db->where('pro_id', $id);
  $query =  $this->db->delete('products');
  return $query;
}


public function compareMyVal($invoice_id){

   $Mquery1 = $this->db->query("SELECT * from  product_sale_invoice WHERE id_inv = '".$invoice_id."' ");

 	
return  $Mquery1->result();
}

public function update_receiveable_invoice($invoice_id,$data){
  $this->db->where('id_inv', $invoice_id);
$d1 = $data;
$d2 = $data;

  $arr = array_splice($data, 1, 4);
  $dues =  array_splice($d1, 3, 4);

   $Mquery1 = $this->db->query("SELECT * from  product_sale_invoice WHERE id_inv = '".$invoice_id."' ");

 	
  $Q =  $Mquery1->result();

// if($Q[0]->paid > $arr['paid']){


// }
$du =   $Q[0]->dues - $d2['dues'];

 $Q[0]->dues .' '. $arr['dues'];

if($Q[0]->dues == $arr['dues']){
  
  $arrAdd = array('pay_method' =>'cash','dues'=>'0'); 
  $this->db->where('id_inv', $invoice_id);
  $query1 =  $this->db->update('product_sale_invoice',$arrAdd);
  	

}else{
  $dues['pay_method'] = 'credit';
  $dues['dues'] = $du;

  $this->db->where('id_inv', $invoice_id);
  $this->db->update('product_sale_invoice',$dues);
  	

}

  // $query =  $this->db->update('product_sale_invoice',$arr);
  // 	
//  return $query;
}

public function update_product($id,$data){

  $this->db->where('pro_id', $id);
  $query =  $this->db->update('products',$data);
  	
  return $query;
}
public function get_product_with_id($id){

$queryNSP = $this->db->query('SELECT p.*,c.category as cat,bc.brand as brandC  FROM products p, category c,brand bc
WHERE p.category_id = c.category_id
AND bc.brand_id = p.brand_id
AND p.pro_id = "'.$id.'" ');

$query = $this->db->query('SELECT sup.supplier_name,sup.supplier_id,p.*,c.category as cat,bc.brand as brandC  FROM products p, category c,brand bc,suppliers sup
WHERE p.category_id = c.category_id
AND sup.supplier_id = p.supplier_id
AND bc.brand_id = p.brand_id
AND p.pro_id = "'.$id.'" ');


$dbe = $queryNSP->result();
if($dbe[0]->supplier_id > 0){ 

return $query->result();
}else{ 
  return $queryNSP->result();
}
//die;


//$this->db->where('pro_id',$id);
//$query = $this->db->get("products");
	
//return $query->result();  
}
public function getSaleService($from = null,$to =null){
$Query = '';
  if($from && $to){ 
 
  $Query = $this->db->query('SELECT * FROM service_sale_invoice ssi, service_sale_list ssli 
WHERE ssli.service_sale_id =  ssi.ser_id
AND ssi.sale_date BETWEEN   "'.$from.'" AND "'.$to.'"  
ORDER BY ssi.ser_id DESC ');
 $query =  $Query->result();
    	
    return $query;
}
else{
    $query = $this->db->query('SELECT * FROM service_sale_invoice ssi, service_sale_list ssli 
WHERE ssli.service_sale_id =  ssi.ser_id
ORDER BY ssi.ser_id DESC');
 	
  return $query->result(); 
  }
}

public function disable_product($id,$data){

  $this->db->where('pro_id', $id);
  $query =  $this->db->update('products',$data);
  	
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
 	
  return $query->result();
}
public function getCredit(){
           
  $query = $this->db->query('SELECT * FROM credit cd,customers ct WHERE cd.customer_id = ct.id');
 	
  return $query->result(); 
}

public function getCreditwithID($id){
   $query = $this->db->query('SELECT * FROM credit cd,customers ct WHERE cd.customer_id = ct.id');
 	
  return $query->result();  
}

public function getItems(){
  $query = $this->db->get('products');
  return $query->result();
}
public function getItemsCS(){
  $query = $this->db->get('products');
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

return    $this->db->insert('products',$data);
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
  	
  return $query;
}
public function insertBrand($data){
  $query = $this->db->insert("brand",$data);
  return $query;
}
public function insertUnit($data){
  $query = $this->db->insert("unit",$data);
  return $query;
}

public function insertItem($data,$dtype){
  $query = $this->db->insert("products",$data);
  $last_id = $this->db->insert_id();
  $dtype['i_type'] =  $last_id;
  $query = $this->db->insert("item_type",$dtype);
  return $query;
}


public function getItemswithSupplier_id($id){
             $this->db->where('supplier_id',$id);
    $query = $this->db->get('products');
    return $query->result();
}


public function getQuanitiy($id){
             $this->db->where('item_id',$id);
    $query = $this->db->get('products');
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

public function getunits(){
  $query = $this->db->get('unit');
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
public function getExpcategory(){
          $this->db->order_by('exp_cate_id','desc');
  $query = $this->db->get('expense_category');
  	
  return $query->result();
}

public function insertCategoryExp($data){
    $query = $this->db->insert("expense_category",$data);
    return $query;
}
public function get_categoryExp_with_id($id){
$this->db->where('exp_cate_id',$id);
$query = $this->db->get("expense_category");
return $query->result();  
}

public function update_categoryExp($id,$data){
  $this->db->where('exp_cate_id', $id);
  $query =  $this->db->update('expense_category',$data);
  return $query;
}
public function delete_categoryExp($id){

  $this->db->where('exp_cate_id', $id);
  $query =  $this->db->delete('expense_category');
  return $query;
}

public function update_sale_return($data,$invoice_id,$sale_refund){

$product_ids = $data['item_ids'];
$quantity = $data['quantity'];
$pro_sale_id = $data['pro_sale_id'];
// echo "<br /> ";
 
$sale_list_data =  array('quantity'=> $quantity);

$fileData = array('paid' => $data['already_paid'],'total'=>$data['already_total'],'discount' => $data['discount']);

  $this->db->where('id_inv', $invoice_id);
  $query =  $this->db->update('product_sale_invoice',$fileData);

    // $this->db->where("(foo_filed = 'foo_value') AND (bar_field = 'bar_value') AND (more_field = 'more_value')");

    $this->db->where("(pro_sale_id = '".$pro_sale_id."') 
      AND ( product_ids = '".$product_ids."') 
      AND (psi_id = '".$invoice_id."') 
    ");

    $query =  $this->db->update('product_sale_list',$sale_list_data);
  $this->db->insert('sale_return',$sale_refund);
  	
  return $query;

}

public function get_sale_return_by_single($idp,$item_id){
  
 $Query = $this->db->query('SELECT * FROM product_sale_invoice psi, product_sale_list psl, products p
WHERE psi.id_inv = psl.psi_id
AND p.pro_id = psl.product_ids
AND psl.product_ids = "'.$item_id.'"
AND psi.id_inv ="'.$idp.'"  ');
    $query =  $Query->result();
    	
    return $query;
}

public function insertExpense($data,$op){
  $query  =  $this -> db -> insert('expenditure',$data);
  $last_id = $this->db->insert_id();

  $op['exp_id'] =  $last_id;
   $this -> db -> insert('calculate_expenditure',$op);
  	
  return $query;
}


public function getExpense(){
             $this->db->order_by('expn_id','DESC');
    $query = $this->db->get('expenditure');
    return $query->result();
} 

public function get_expense_with_id($id){
$this->db->where('expn_id',$id);
$query = $this->db->get("expenditure");
return $query->result();  
}

public function update_expense($id,$data){

  $this->db->where('expn_id', $id);
  $query =  $this->db->update('expenditure',$data);
  return $query;
}

public function delete_expense($id){
  $this->db->where('expn_id', $id);
  $query =  $this->db->delete('expenditure');
  return $query;
}



public function getCustomer(){


    $q = 'SELECT *
FROM customers
ORDER BY id = 
      (SELECT id FROM customers WHERE id = 1 ORDER BY id DESC LIMIT 1) DESC, 
   id DESC';
   $query  = $this->db->query($q);
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

public function insert_service_sale_invoice($data,$item_name,$Querys,$proQuery){

  $Query =  $this->db->insert('service_sale_invoice',$data);
  	
  $last_id = $this->db->insert_id();
  $item_name['service_sale_id'] =  $last_id;
  $Query = $this->db->insert("service_sale_list",$item_name);
  foreach( $Querys as $q):
  
  $this->db->query($q);
  endforeach;
foreach( $proQuery as $pq):
$repLa =  str_replace('Rumor', $last_id, $pq);
    $this->db->query($repLa);
    endforeach;  
  	
  return $Query;
}


public function inventory_reports(){
   $query = $this->db->query('SELECT itm.*,ityp.*,ct.category,ct.category_id,sup.supplier_name,sup.supplier_id 
FROM products itm, item_type ityp,category ct,suppliers sup 
WHERE ityp.i_type = itm.item_id 
AND ct.category_id = itm.category_id
AND sup.supplier_id = itm.supplier_id');
  return $query->result();
}


// public function insert_ad_sale_invoice($data){
//    $Query =  $this->db->insert('product_sale_invoice',$data);
//     return $Query;
// }

public function insert_ad_sale_invoice($data,$item_name,$Querys,$proQuery,$customerCount){
if($data['pay_method'] == 'credit'){
    $data['dues'] = $data['paid'];
  }
  $Query =  $this->db->insert('product_sale_invoice',$data);
  $last_id = $this->db->insert_id();
  $item_name['product_sale_id'] =  $last_id;
  $customerCount['product_sale_id'] =  $last_id;  
  $Query = $this->db->insert("count_customer",$customerCount);
  	
  $Query = $this->db->insert("product_sale",$item_name);
  foreach( $Querys as $q):
  $this->db->query($q);
  endforeach;
foreach( $proQuery as $pq):
$repLa =  str_replace('Rumor', $last_id, $pq);
    $this->db->query($repLa);
  //print_r($repLa);
  	
    endforeach;  

  return $Query;
}
public function getTax(){
  $pisQ = $this->db->query("select * from tax_info");
   return $pisQ->result_array();
   
}

public function insert_ad_sale_invoice_edit($data,$item_name,$Querys,$proQuery,$customerCount,$sale_invoice_id,$cartIDS,$updateInsert,$quantityCheck){

$data['dues']="";
if($data['pay_method'] == 'credit'){
    $data['dues'] = $data['paid'];
  }

  $cit = explode(',', $cartIDS);

  $pisQ = $this->db->query("select * from product_sale_list where psi_id =".$sale_invoice_id);
    $dt = $pisQ->result_array();
    foreach ($dt as $pData) 
    {

      $d_data[] = $pData['product_ids'];
      $d_qty[] = $pData['quantity'];
    }


    $arrayExp = explode('^', $updateInsert);
    foreach($arrayExp as $addNewArarrE)
    {
      $new = json_encode($addNewArarrE);
      $split = strrchr( json_decode($new), '@'); //returns ".jpg"
      $match_ids =  filter_var($split, FILTER_SANITIZE_NUMBER_INT);
      $r = str_replace("'@',", "", $addNewArarrE);
      $newV[$match_ids] = $r;
        } 

      $res = array_diff($d_data,$cit);
      $newDiffer = array_diff($cit,$d_data);
      foreach ($newDiffer as $setV) 
       {

          $this->db->query($newV[$setV]);
          	
          $last = $this->db->insert_id();
          $res1 = $this->db->query('SELECT * FROM product_sale_list WHERE pro_sale_id ="'.$last.'"');
           	
          $rZ = $res1->result_array();
      foreach ($rZ as $upQ) {

               $this->db->query('UPDATE products SET stock_level = stock_level - "'.$upQ["quantity"].'",stock_consume = stock_consume + "'.$upQ["quantity"].'" WHERE pro_id = '.$upQ['product_ids']);
                         	
              }        
        }



  foreach($res as $fireThis)
  {
  $pisQ = $this->db->query("select * from product_sale_list where product_ids ='".$fireThis."' AND psi_id ='".$sale_invoice_id."'");
    	
    $dt = $pisQ->result_array();

    foreach ($dt as $proData) 
    {
      $this->db->query("
            UPDATE products SET stock_level = stock_level +'".$proData['quantity']."', stock_consume = stock_consume - '".$proData['quantity']."' WHERE pro_id='".$proData['product_ids']."' 
          ");
      	
    }

$this->db->query('DELETE FROM product_sale_list WHERE psi_id='.$sale_invoice_id.' AND product_ids ='.$fireThis);
      	
  }

  $myquery ='UPDATE product_sale_invoice SET
      pay_method="'.$data['pay_method'].'",
      paid = "'.$data['paid'].'",
      total = "'.$data['paid'].'",
      dues = "'.$data['dues'].'",
      quantity ="'.$data['quantity'].'",
      customer_id = "'.$data['customer_id'].'",
      customer_name = "'.$data['customer_name'].'",
      discount = "'.$data['discount'].'",
      sale_agent ="'.$data['sale_agent'].'",
      updated_date = "'.date("Y-m-d H:i:s").'"
      WHERE id_inv = "'.$sale_invoice_id.'"
  ';
  
  $Query =  $this->db->query($myquery);
  	

  $Cupdate = "UPDATE count_customer SET 
  customer_id ='".$data['customer_id']."' 
  ,customer_name = '".$data['customer_name'].
  "' WHERE product_sale_id =".$sale_invoice_id;

  $updateProNames = "UPDATE product_sale SET 
  item_name ='".$item_name['item_name']."' 
  WHERE product_sale_id =".$sale_invoice_id;

    $Query = $this->db->query($Cupdate);
    	
    $this->db->query($updateProNames);
  foreach( $Querys as $q):
    $this->db->query($q);
    	
  endforeach;
  foreach( $proQuery as $pq):
    $this->db->query($pq);
    	
   endforeach;  
}


public function getDeleteReturn($idp)
{
 $Query = $this->db->query('SELECT * FROM product_sale_invoice psi, product_sale_list psl, products p
  WHERE psi.id_inv = psl.psi_id
  AND p.pro_id = psl.product_ids
  AND psl.product_ids ="'.$idp.'" ');
    $query =  $Query->result_array();
    	
    return $query; 
}
public function setQueryDeleteSaleReturn($idp){
  
 $Query = $this->db->query('DELETE FROM product_sale_list WHERE product_ids  = "'.$idp.'" ');
    	
    return $Query;
}

//get sale edit

public function get_sale_edit($idp){
  
 $Query = $this->db->query('SELECT * FROM product_sale_invoice psi, product_sale_list psl, products p
WHERE psi.id_inv = psl.psi_id
AND p.pro_id = psl.product_ids
AND psi.id_inv ="'.$idp.'" ');
    $query =  $Query->result();
    	
    return $query;
}

public function get_sale_return($idp){
  
 $Query = $this->db->query('SELECT * FROM product_sale_invoice psi, product_sale_list psl, products p
WHERE psi.id_inv = psl.psi_id
AND p.pro_id = psl.product_ids
AND psi.id_inv ="'.$idp.'" ');
    $query =  $Query->result();
    	
    return $query;
}
public function get_sale_returnWIID(){
  
 $Query = $this->db->query('SELECT * from product_sale_invoice
 ');
    $query =  $Query->result_array();
    	
    return $query;
}
public function get_sale_receiveableWIID(){
  
 $Query = $this->db->query('SELECT * FROM product_sale_invoice psi, product_sale
 ps 
WHERE ps.product_sale_id = psi.id_inv
AND psi.pay_method ="credit"  

ORDER BY psi.id_inv DESC

 ');
    $query =  $Query->result_array();
    	
    return $query;
}

public function getSaleReports(){
    $query = $this->db->query('SELECT * from product_sale_invoice');
  return $query->result(); 
}

public function addSale($data){
$item_id = $data['item_id'];
$this->db->where('item_id',$item_id);
$getQ = $this->db->get('products');
$r = $getQ->row();
 //echo $data['stock_quantity']." | " .$r->stock_item."  ";
$t =     $r->remaining_stock - $data['stock_quantity']; 
$upd = array('remaining_stock' => $t);
$Query =  $this->db->insert('sales_invoice',$data);
$this->db->where('item_id',$item_id);
$this->db->update('products',$upd);
 return $Query;
}

public function getSaleByProducts($from = null,$to =null){
$Query = '';
  if($from && $to){ 
 $from.' '.$to;
  $Query = $this->db->query('SELECT * FROM product_sale_invoice psi, product_sale
 ps 
WHERE ps.product_sale_id = psi.id_inv
AND psi.sale_date BETWEEN   "'.$from.'" AND "'.$to.'"  
ORDER BY psi.id_inv DESC ');
 $query =  $Query->result();
    	
    return $query;
}
else{
    $Query = $this->db->query('SELECT * FROM product_sale_invoice psi, product_sale ps 
WHERE ps.product_sale_id = psi.id_inv
ORDER BY psi.id_inv DESC ');

    $query =  $Query->result();
    	
    return $query;
  }
}
//select list of all product by service 
public function getProductByService(){

  $Query = $this->db->query('SELECT * FROM product_sale_invoice psi, product_sale ps 
WHERE ps.product_sale_id = psi.id_inv
AND sale_date BETWEEN (CURRENT_DATE() - INTERVAL 1 MONTH) AND CURRENT_DATE()
ORDER By psi.id_inv DESC
');
    return $Query->result();

}

public function getreplenishment30days(){
  $Query = $this->db->query('SELECT * FROM products 
WHERE  entry_date BETWEEN (CURRENT_DATE() - INTERVAL 1 MONTH) AND CURRENT_DATE();
');
    $query =  $Query->result();
    	
    return $query;
}


public function getOpeningBalance(){
    $Query = $this->db->query("SELECT ce.set_date ,SUM(ce.opening_balance) AS opening_balances FROM expenditure EXP, calculate_expenditure ce
WHERE ce.exp_id = exp.expn_id
AND DATE_FORMAT(ce.set_date, '%Y-%m-%d')  =  SUBDATE(CURRENT_DATE(),1);
");
  $query =  $Query->result();
    	
    return $query;
}


public function getReportsByCashInHand($from = null,$to= null){
if($from && $to){   

  $Query = $this->db->query("SELECT exp.expn_id,ce.set_date ,SUM(ce.opening_balance) AS balance,SUM(exp.amount) AS exp_amount FROM expenditure exp, calculate_expenditure ce
WHERE ce.exp_id = exp.expn_id
AND exp.account_type = 'cash_hand'
AND ce.set_date NOT IN (CURRENT_DATE())
AND ce.set_date BETWEEN '".$from."' AND '".$to."'
GROUP BY ce.set_date
ORDER BY id desc

");
  $query =  $Query->result();
    	
    return $query;
}else{
  $Query = $this->db->query("SELECT exp.expn_id,ce.set_date ,SUM(ce.opening_balance) AS balance,SUM(exp.amount) AS exp_amount FROM expenditure exp, calculate_expenditure ce
WHERE ce.exp_id = exp.expn_id
AND exp.account_type = 'cash_hand'
AND ce.set_date NOT IN (CURRENT_DATE())
GROUP BY ce.set_date
ORDER BY id desc

");
  $query =  $Query->result();
    	
    return $query;
}
}


public function getReportsByCashInCheque( $from =  null,$to =null){
  if($from && $to){
    $Query = $this->db->query("SELECT exp.expn_id,ce.set_date ,SUM(ce.opening_balance) AS balance,SUM(exp.amount) AS exp_amount FROM expenditure exp, calculate_expenditure ce WHERE ce.exp_id = exp.expn_id
AND exp.account_type = 'cash_cheque'
AND ce.set_date NOT IN (CURRENT_DATE())
AND ce.set_date BETWEEN '".$from."' AND '".$to."'
GROUP BY ce.set_date
ORDER BY id desc
");
  $query =  $Query->result();
    	
    return $query;
    exit;
  } else{
        $Query = $this->db->query("SELECT exp.expn_id,ce.set_date ,SUM(ce.opening_balance) AS balance,SUM(exp.amount) AS exp_amount FROM expenditure exp, calculate_expenditure ce
  WHERE ce.exp_id = exp.expn_id
AND exp.account_type = 'cash_cheque'
AND ce.set_date NOT IN (CURRENT_DATE())
GROUP BY ce.set_date
ORDER BY id desc
");
  $query =  $Query->result();
    	
    return $query;
  }
}

public function getStockConsumptio30days($from = null,$to = null){

  $Query = '';
  if($from && $to){
  $Query = $this->db->query('SELECT p.product_name ,p.stock_level AS opening_balance,p.unit, SUM(psl.quantity) AS consumed ,p.stock_level AS remaining_balance,psl.sale_entry_date  
FROM products p,product_sale_list psl 
WHERE p.pro_id = psl.product_ids
AND psl.sale_entry_date BETWEEN   "'.$from.'" AND "'.$to.'"
GROUP BY p.pro_id, psl.sale_entry_date');
    $query =  $Query->result();
    	
    return $query;
}
else{
   $Query = $this->db->query('SELECT p.product_name ,p.stock_level AS opening_balance,p.unit, SUM(psl.quantity) AS consumed ,p.stock_level AS remaining_balance,psl.sale_entry_date  
FROM products p,product_sale_list psl 
WHERE p.pro_id = psl.product_ids
GROUP BY p.pro_id, psl.sale_entry_date');
    $query =  $Query->result();
    	
    return $query; 
}
}

public function getSaleReportsByLast30DAys(){
  $Query = $this->db->query('SELECT * FROM product_sale_invoice psi, product_sale ps 
WHERE ps.product_sale_id = psi.id_inv
AND sale_date BETWEEN (CURRENT_DATE() - INTERVAL 1 MONTH) AND CURRENT_DATE()
ORDER By psi.id_inv DESC
');
    return $Query->result();
}

public function getSale($from = null,$to =null){
if($from && $to){
  $Query = $this->db->query('SELECT SUM(si.total) AS totals ,cs.* ,si.sale_date FROM product_sale_invoice si,customers cs,product_sale_list psl
    WHERE si.customer_id = cs.id
  AND psl.psi_id = si.id_inv
  AND psl.sale_entry_date BETWEEN "'.$from.'" AND "'.$to.'" 
GROUP BY si.customer_id');
    return $Query->result();
}
else{
  $Query = $this->db->query('SELECT SUM(si.total) AS totals ,cs.* ,si.sale_date FROM product_sale_invoice si,customers cs,product_sale_list psl
    WHERE si.customer_id = cs.id
  AND psl.psi_id = si.id_inv

GROUP BY si.customer_id');
    return $Query->result();
}
}

public function saleReportByService(){

  $Query = $this->db->query('SELECT * FROM service_sale_invoice ssi, service_sale_list ssli
WHERE ssi.ser_id = ssli.service_sale_id 
');
    return $Query->result();
} 

public function getSaleBYID($id){

  $Query = $this->db->query('SELECT pd.product_name,cs.firstname,cs.lastname,cs.mobile,cs.address,psi.*,psl.*,pd.product_name,pd.sale_price,pd.stock_level FROM product_sale_invoice psi,customers cs, product_sale_list psl, products pd
WHERE psi.customer_id= cs.id
AND psl.psi_id = psi.id_inv
AND pd.pro_id = psl.product_ids
AND psi.id_inv ="'.$id.'" ');
    return $Query->result();
}


public function getPurchasedBYID($id){

  $Query = $this->db->query('SELECT pfi.quantity as Qty,pfi.pro_name,pfi.pro_price,pfi.quantity,pis.*,sp.supplier_name,sp.supplier_id FROM purchase_invoice pis, suppliers sp,purchase_final_inv pfi
    WHERE sp.supplier_id  = pis.supplier_id
    AND pfi.purchase_id = pis.purchase_id
    AND pfi.purchase_id ="'.$id.'" ');
    return $Query->result();

  
}


public function getSaleInvID(){

    $Query = $this->db->query('SELECT * FROM sales_invoice order by invoice_id DESC limit 0,1');
    return $Query->row();

}


public function delete_purchases($id){
   $this->db->query('delete from purchase_invoice where purchase_id='.$id);
  echo $id;
  $this->db->query('delete from purchase_final_inv where purchase_id='.$id);  
  	
  return true;
}
public function checkInvoice($inv){
  
  $Query = $this->db->query('SELECT invoice_no FROM purchase_invoice where invoice_no ='.$inv);
    

    if ($Query->num_rows() > 0) {
      
        return true;
        }  
        else{
          return false;
        }
}
public function getPurchaseInvoice(){

    $Query = $this->db->query('SELECT * FROM purchase_invoice pin,suppliers sp,products p
      WHERE pin.supplier_id = sp.supplier_id
      AND p.pro_id = pin.item_id
      ORDER BY pin.purchase_id DESC
      limit 0,2');
      return $Query->result();

}
public function getdatabybarcodeforpurchaseAdd($Queries){
  $Query = $this->db->query($Queries);
    return $Query->result_array();
      
}

public function getItembynameSearch($item){
  if($item):
  $Query = $this->db->query('SELECT pro_id,product_name,sale_price, cost AS purchase_price,barcode FROM products WHERE product_name LIKE "%'.$item.'%"');
    return $Query->result();
    endif;
  }

public function insertPurchase($data,$proQuery){


 $Query =  $this->db->insert('purchase_invoice',$data);
  $last_id = $this->db->insert_id();
  $t2['purchase_id'] = $last_id; 
 

foreach( $proQuery as $pq):
$repLa =  str_replace('Rumor', $last_id, $pq);
    $this->db->query($repLa);

  	
    endforeach;  


  

 return $Query;  

}

    public function authenticate_by_verification_code($vcode) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('verification_code', $vcode);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0) {
            $return = $Q->row();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
    }
      public function get_member_by_email($email){
    
    $Q = $this->db->query("SELECT verification_code FROM users WHERE email = '".$email."'");
    
        if ($Q->num_rows() > 0) {
            $return = $Q->row('verification_code');
        
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
  }

public function getPagesPermissions($id = null){
  if(!empty($id)){

  } else{
  redirect('admin/users/add_user_role');
  }

  $query = $this->db->query('SELECT * from  permissions where role_id='.$id.'  limit 0,20 ');
  return $query->result();
  }

public function authenticate_users_admin($email, $password) {
        $this->db->select('*');

        $this->db->from('admin');

        $this->db->where('email', $email);

    $this->db->where('users_password', $password);

         $Q = $this->db->get();

       

        if ($Q->num_rows() > 0) {

  

            $return = $Q->row();


        } else {

            $return = 0;

        }

         $Q->free_result();

        

        return $return;

    }

//add update roles
public function updateRole($data,$id){
              $this->db->where('role_id',$id);
   $query  = $this->db->update('user_roles',$data);;
  	
  return $query;
}
//delete user role 
public function delete_user_role($id){
        $this->db->where('id',$id);
        $this->db->delete(array('user_roles','permissions'));
return true;
}

//update permissions
public function updatePermissions($data){

  
   $roleID = $data['roleID'];
   $action = $data['action']; 
   $cb   = $data['cb'] ;
   $page_id   = $data['pageID'] ;
   $pageName = $data['pageName']; 
  
  if($cb =='can_view'){ 
  $Query = $this->db->query('update permissions set 
    can_view = "'.$action.'"
    WHERE page_id="'.$page_id.'"
    AND role_id ="'.$roleID.'"
    ');

    echo $action;

  }
  if($cb =='can_add'){ 
  $Query = $this->db->query('update permissions set 
    can_add = "'.$action.'"
    WHERE page_id="'.$page_id.'"
    AND role_id ="'.$roleID.'"
    ');
	
    return $Query;
  }
  if($cb =='can_edit'){ 
  $Query = $this->db->query('update permissions set 
    can_edit = "'.$action.'"
    WHERE page_id="'.$page_id.'"
    AND role_id ="'.$roleID.'"
    ');
	
    return $Query;
  }
  if($cb =='can_delete'){ 
  $Query = $this->db->query('update permissions set 
    can_delete = "'.$action.'"
    WHERE page_id="'.$page_id.'"
    AND role_id ="'.$roleID.'"
    ');
	
    return $Query;
  }else{
    return 0;
  }      
}
//update permissions end
// ad role function added here;
public function addRole($data){
  $query =    $query  = $this->db->insert('user_roles',$data);
  echo $role_id = $this->db->insert_id();
  $this->db->query('update  user_roles set role_id="'.$role_id.'" where id='.$role_id);

  	

  return $query;
}
    ///end for admin
public function getAdminrole($id){

  $role = $this->db->query("select * from user_roles where role_id = '".$id."'");
  return $role->row();
}

public function getRoleByID($id){
            $this->db->where('role_id',$id);
  $Query = $this->db->get('user_roles');
  return $Query->result();
}

public function getRoleLast(){
            $this->db->order_by('role_id','DESC');
            $this->db->limit(1);
  $Query = $this->db->get('user_roles');
  return $Query->result();
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


public function add_permissions($role_id,$userCreated){

  $Query = $this->db->query("insert  into `permissions`(`page_id`,`page`,`can_view`,`can_add`,`can_edit`,`can_delete`,`role_id`,`created_user_id`) 
    values (1,'pos','no','no','no','no','".$role_id."','".$userCreated."' ),
    (2,'dashboard','no','no','no','no','".$role_id."','".$userCreated."'),
    (3,'add_supplier','no','no','no','no','".$role_id."','".$userCreated."'),
    (4,'add_item','no','no','no','no','".$role_id."','".$userCreated."'),
    (5,'add_category','no','no','no','no','".$role_id."','".$userCreated."'),
    (6,'inventory','no','no','no','no','".$role_id."','".$userCreated."'),
    (7,'expenditure','no','no','no','no','".$role_id."','".$userCreated."'),
    (8,'expense_category','no','no','no','no','".$role_id."','".$userCreated."'),
    (9,'sale_receiveable','no','no','no','no','".$role_id."','".$userCreated."'),
    (10,'services','no','no','no','no','".$role_id."','".$userCreated."'),
    (11,'reports','no','no','no','no','".$role_id."','".$userCreated."'),
    (12,'add_purchase','no','no','no','no','".$role_id."','".$userCreated."'),
    (13,'add_customer','no','no','no','no','".$role_id."','".$userCreated."'),
    (14,'add_account','no','no','no','no','".$role_id."','".$userCreated."'),
    (15,'add_deposit','no','no','no','no','".$role_id."','".$userCreated."'),
    (16,'settings','no','no','no','no','".$role_id."','".$userCreated."'),
    (17,'users','no','no','no','no','".$role_id."','".$userCreated."'),
    (18,'add_bank','no','no','no','no','".$role_id."','".$userCreated."'),
    (19,'add_cheque','no','no','no','no','".$role_id."','".$userCreated."')
    ");
	
return $Query;
}

public function getsiteSetting(){
  $query = $this->db->get('site_setting');
  return $query->row();
}

public function update_company_setting($id,$data){
  $this->db->where('id', $id);
  $query =  $this->db->update('site_setting',$data);
  	
  return $query;
}

public function getBank(){
  $this->db->order_by('id','DESC');
  $query = $this->db->get('bank');
 return $query->result();
}
public function getDeposit(){
  $this->db->order_by('id','DESC');
  $query = $this->db->get('bank_deposit');
 return $query->result();
}
public function getDepositwithID($id){

$this->db->where('id',$id);
$query = $this->db->query("select * from bank_deposit where id = '".$id."'");
return $query->row();  
}
public function insertBank($data){
 $Query =  $this->db->insert('bank',$data);
 	
 return $Query;  
}
public function insertDeposit($data){
 $Query =  $this->db->insert('bank_deposit',$data);
 	
 return $Query;  
}

public function updateDeposit($id,$data){

  $this->db->where('id', $id);
  $query =  $this->db->update('bank_deposit',$data);
  	

  return $query;
}

public function delete_deposit($id){
  $this->db->where('id', $id);
  $query =  $this->db->delete('bank_deposit');
  	
  return $query;
}
public function insertFunds($data){
 $Query =  $this->db->insert('exchange_funds',$data);
 	
 return $Query;   
}
public function getAccount(){
 $Query =  $this->db->query('select * from bank');
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
  	

  return $query;
}

public function delete_bank($id){
  $this->db->where('id', $id);
  $query =  $this->db->delete('bank');
  	
  return $query;
}


public function getCheque(){
           $this->db->order_by('cheque_id','DESC');
  $query = $this->db->get('cheque');
  return $query->result();
}
public function insertCheque($data){
 $Query =  $this->db->insert('cheque',$data);
 	
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
	
  return $query;
}

public function delete_cheque($id){
  $this->db->where('cheque_id', $id);
  $query =  $this->db->delete('cheque');
	
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

  $query = $this->db->query('SELECT us.*,ur.name AS role_name,ur.id AS role_id FROM users us, user_roles ur WHERE us.role_id = ur.role_id 
      order by us.id desc');
  return $query->result();
}

public function add_users($data){

  $query =    $query  = $this->db->insert('users',$data);;
  	
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
