<?php
class Shopping_cart_model extends CI_Model
{
 function fetch_all()
 {
  $query = $this->db->get("product");
  return $query->result();
 }
public function getCategroy(){
  $query = $this->db->get('category');
  return $query->result();
}

public function getProbyCId($id){

$this->db->where('category_id',$id);
$query = $this->db->get("products");

return $query->result();  

}
}
