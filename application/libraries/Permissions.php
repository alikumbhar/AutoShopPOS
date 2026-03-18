<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class permissions {
 		private $CI;

 function __construct() {
 $this->CI =& get_instance();
  $this->CI->load->database('automanic');
   }
        public function getPermissions()
        {
 		$ps = $this->CI->session->userdata('userVal');
 		if(!empty($ps)){
 			
 		}else{
 			redirect(  base_url() );

 		}
  $query = $this->CI->db->query('SELECT * from  permissions where role_id='.$ps["role_id"].'  limit 0,20 ');
  	$result = $query->result();
//	echo $this->CI->db->_error_message();
// 	echo "<pre />";
// foreach($result as $p): print_r($p->page); echo "<br />"; endforeach; die;
	 return $result;
        	// $this->sc_model->getRecordyesterdaysaleRecieveable();
        }
}