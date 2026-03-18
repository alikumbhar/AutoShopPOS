<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inventory extends CI_Controller {

	public function index()
	{
		
			$data['inventory'] = $this->sc_model->getInventory();

			$data['title'] = 'Inventory - admin panel';
 
			$this->load->view('admin/inventory_reports',$data);
	}

	public function disable_product($id=null,$status=null){
			$data =  array('status' => $status);
			
			if($status == 'yes'){
			$result =  $this->sc_model->disable_product($id,$data);
			if($result){
				$this->session->set_flashdata('msg1','the product has been enabled');
				redirect('admin/inventory');
			}				
		}else{
			$result =  $this->sc_model->disable_product($id,$data);
			if($result){
				$this->session->set_flashdata('msg','the product has been disabled');
				redirect('admin/inventory');
			}			
		}
	}


	 public function edit_product($id = null){
	 	
		$data['productID'] = $this->sc_model->get_product_with_id($id);

 		$data['title'] = "Admin panel - Edit Products";
		$this->load->view('admin/edit_product.php',$data); 	

	}	
	public function update_product($id=null){

		$id = $this->input->post('product_id');
$dataInn = array(
    'barcode'		  => "s".strip_tags($this->input->post('barcode')),
    'product_name' => strip_tags($this->input->post('description')),
    'category_id' => strip_tags($this->input->post('category_id')),
    'brand_id'    => strip_tags($this->input->post('brand_id')),
    'location'    => strip_tags($this->input->post('location')),
    'sale_price'  => strip_tags($this->input->post('sale_price')), 
    'cost'  	  => strip_tags($this->input->post('cost')),
    'unit'    => strip_tags($this->input->post('unit')),    
    'stock_level' => strip_tags($this->input->post('stock_level')),
    'stock_limits'=> strip_tags($this->input->post('stock_limits')),
    'comments'    => strip_tags($this->input->post('comments')),
    'promo_code'  => strip_tags($this->input->post('promo_code')),
    'net_weight'  => strip_tags($this->input->post('net_weight')),
    'gross_weight'=> strip_tags($this->input->post('gross_weight')),
    'supplier_id' => strip_tags($this->input->post('supplier_id')),
    'expire_date' => strip_tags($this->input->post('expiration_date'))
);


			$retV = $this->sc_model->update_product($id,$dataInn);
			if($retV){
				$this->session->set_flashdata('msg','product has been updated');
				$p = $this->extra_lib->path."/inventory/";
				redirect($p);
 			}	
	}

	public function alerts()
	{
		$data['stockLimits'] =  $this->sc_model->getStockLimits();
		$data['title'] = 'StockLimits - admin panel';
 		$this->load->view('admin/stock_alerts',$data);		
	}
	 public function delete_product($id = null)
	 {
	 	$del = $this->sc_model->delete_product($id);
		if($del){
				$this->session->set_flashdata('remove','product has been deleted');
				$p = $this->extra_lib->path."/inventory";
				redirect($p);
			}		
	}	


}