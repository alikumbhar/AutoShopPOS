<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class footer {
 		private $CI;

 function __construct() {

 $this->CI =& get_instance();
  $this->CI->load->database('automanic');
   
   }
        public function getSettingFooter($test = null)
        {
  		
  $query = $this->CI->db->query('SELECT * from  site_setting ');
  	$result = $query->result();
	if($test =='co'){
   return  $result[0]->currency;
  }
  if($test =="name"){
   return  $result[0]->site_name; 
  } 
 else{
  return  $result[0]->footer_text;
 }

        	// $this->sc_model->getRecordyesterdaysaleRecieveable();
        }
}