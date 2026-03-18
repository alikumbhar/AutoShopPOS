<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class poz extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/pos/main');
	}

	public function getPos(){

		$this->load->view('admin/pos/ajax_action');
	}
	
	public function products(){


		$color = array ("btn btn-md btn-primary","btn btn-md btn-success","btn btn-md btn-danger","btn btn-md btn-warning"
		       );
		$rand_keys = array_rand($color, 2);
		$r = rand(0,1);    
		$id = strip_tags($this->input->post('id'));
		$product_array = $this->sc_model->getProByCats($id);

		    foreach($product_array as $value){
		  ?>
		         <input type="button" style="margin: 1px;" class="<?php echo $color[$rand_keys[$r]]; ?>" id="add_<?php echo $value->barcode; ?>" value="<?php echo $value->product_name;?>" class="btnAddAction cart-action" onclick ="cartAction('add','<?php echo $value->barcode; ?>','<?php echo $value->barcode; ?>')" /></button>
    <input type="hidden" id="qty_<?php echo $value->barcode; ?>" name="quantity" value="1" size="2" />
      </form>

  <?php
      }
  
  

	}	

}
?>