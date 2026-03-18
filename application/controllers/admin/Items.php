<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class items extends CI_Controller {

	public function index()
	{
		
		$data['category'] = $this->sc_model->getItems();
		$data['title'] = "Items view";
		$this->load->view('admin/item_list',$data);

	}

	public function add_item(){
		$data['title'] = "Add new Items";
		$this->load->view('admin/item_add',$data);
	}

	public function checkBarcode(){
		$barcode = $this->input->post('sku');
		$ret = $this->sc_model->checkBarcode($barcode);
		echo $ret;
	}

	public  function addProducts(){
		      	$config['upload_path']          = 'assets/uploads/item_images';
                $config['allowed_types']        = 'gif|jpg|png';
                // $config['max_size']             = 1000;
                // $config['max_width']            = 1000;
                // $config['max_height']           = 1080;
				$this->upload->initialize($config);
                $this->load->library('upload', $config);
			$files           = $_FILES;;
		 $filename  = basename($files['userfile']['name']);
		$extension = pathinfo($filename, PATHINFO_EXTENSION);
		 $str1 = str_replace('.jpg','',$filename);
		$title = $this->input->post('description');
 		$new     = $title.'-'.rand(100,1000).'.'.$extension;

				$_FILES['userfile']['name'] = str_replace(" ", "-", $new); //$files['files']['name'][$i];

				$_FILES['userfile']['type'] = $files['userfile']['type'];

				$_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'];

				$_FILES['userfile']['error'] = $files['userfile']['error'];

				$_FILES['userfile']['size'] = $files['userfile']['size'];

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $check = array('error' => $this->upload->display_errors());

                        //$data['title'] = "Set Episeode";
                $id = $this->input->post('id');


	$length = 5;
		$randomString = substr(str_shuffle(md5(time())),0,$length);
		$barcode='';
		$rand = rand(1,355);
		 $test = substr($this->input->post('barcode'),0,1);
		if( $test == $this->input->post('barcode')){
		 $barcode =  'sauto_G'.$rand . $randomString;
		}else{
		 $barcode = strip_tags($this->input->post('barcode'));
		}

	
     
    $exp_date = date("Y-m-d", strtotime(strip_tags($this->input->post('expire_date'))));  

$dataInn = array(
    'barcode'		  => $barcode,
    'product_name' => strip_tags($this->input->post('description')),
    'category_id' => strip_tags($this->input->post('category_id')),
    'category' => strip_tags($this->input->post('category')),        
    'brand_id'    => strip_tags($this->input->post('brand_id')),
    'brand' => strip_tags($this->input->post('brand')),           
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
    'supplier' => strip_tags($this->input->post('supplier')),      
    'expire_date' => $exp_date,
    'entry_date' => date('Y-m-d '), 
    'status' => 'yes'    
);

	$ret  = $this->sc_model->insertProduct($dataInn);		
	
		if($ret){
					$this->session->set_flashdata('msg','your product has been saved in database');
					redirect('admin/items/add_item');	
		}else{
			echo "failed to insert";
		}

                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
	$length = 5;
		$randomString = substr(str_shuffle(md5(time())),0,$length);
		$barcode='';
		$rand = rand(1,355);
		 $test = substr($this->input->post('barcode'),0,1);
		if( $test == $this->input->post('barcode')){
		 $barcode =  'sauto_G'.$rand . $randomString;
		}else{
		 $barcode = strip_tags($this->input->post('barcode'));
		}
     
    $exp_date = date("Y-m-d", strtotime(strip_tags($this->input->post('expire_date'))));  


$dataInn = array(
    'barcode'		  => $barcode,
    'product_name' => strip_tags($this->input->post('description')),
    'category_id' => strip_tags($this->input->post('category_id')),
    'category' => strip_tags($this->input->post('category')),        
    'brand_id'    => strip_tags($this->input->post('brand_id')),
    'brand' => strip_tags($this->input->post('brand')),           
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
    'supplier' => strip_tags($this->input->post('supplier')),      
    'expire_date' => $exp_date,				
    'photo' => $_FILES['userfile']['name'],	
	'entry_date' => date('Y-m-d '), 
    'status' => 'yes'    
);

	$ret  = $this->sc_model->insertProduct($dataInn);		
	
		if($ret){
					$this->session->set_flashdata('msg','your product has been saved in database');
					redirect('admin/items/add_item');	
		}else{
			echo "failed to insert";
		}


                }
echo "<pre>";
		print_r($this->input->post());
		die;
	
	}
  
	public function insertItem(){

//item adding images to this functions


		      	$config['upload_path']          = 'assets/itemimages/';
                $config['allowed_types']        = 'gif|jpg|png';
                // $config['max_size']             = 1000;
                // $config['max_width']            = 1000;
                // $config['max_height']           = 1080;
				$this->upload->initialize($config);
                $this->load->library('upload', $config);
			$files           = $_FILES;;
		$filename  = basename($files['userfile']['name']);
		$extension = pathinfo($filename, PATHINFO_EXTENSION);
		$str1 = str_replace('.jpg','',$filename);
		$title = $this->input->post('title');
		$new     = $title.'-'.rand(100,1000).'.'.$extension;

				$_FILES['userfile']['name'] = $new; //$files['files']['name'][$i];

				$_FILES['userfile']['type'] = $files['userfile']['type'];

				$_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'];

				$_FILES['userfile']['error'] = $files['userfile']['error'];

				$_FILES['userfile']['size'] = $files['userfile']['size'];

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $check = array('error' => $this->upload->display_errors());

                        //$data['title'] = "Set Episeode";
    //             $id = $this->input->post('id');
				// $EppArr = array(
				// 'site_name' =>$this->input->post('company_name'),
				// 'address' => $this->input->post('address'),
				// 'fax' => $this->input->post('fax'),
				// 'site_detail' => $this->input->post('site_detail'),
				// 'telephone' => $this->input->post('telephone'),
				// 'site_logo' => $_FILES['userfile']['name'],
				// );

		$data = array(

	"item_name" 		=> strip_tags($this->input->post('item_name')),
	"item_detail" 		=> strip_tags($this->input->post('item_detail')),
	"category_id" 		=> strip_tags($this->input->post('category_id')),
	"item_type" 		=> strip_tags($this->input->post('item_type')),
	"company_name" 		=> strip_tags($this->input->post('company_name')),
	"supplier_id" 	=> strip_tags($this->input->post('supplier_id')),
	"unit_price" 		=> strip_tags($this->input->post('unit_price')),
	"selling_price" 	=> strip_tags($this->input->post('selling_price')),
	"stock_item" 		=> strip_tags($this->input->post('stock_item')),
	"remaining_stock" 		=> strip_tags($this->input->post('stock_item')),
	"expire_date" 	=> strip_tags($this->input->post('expiration_date')),
	"photo"=> $_FILES['userfile']['name']
		);

$dtype = array(
	"spec" 		=> strip_tags($this->input->post('Specification'))
);


		$ret  = $this->sc_model->insertItem($data,$dtype);		
		if($ret){
			$red = base_url().$this->extra_lib->path."/items/add_item";
//			redirect($red);		
		}

                        // $ret = $this->sc_model->update_company_setting($id,$EppArr);
                        // $this->session->set_flashdata('remove',$check);
                        // $address = $this->extra_lib->path."/settings";
                        // redirect($address);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
				// $id = $this->input->post('id');
				// $EppArr = array(
				// 'site_name' =>$this->input->post('company_name'),
				// 'address' => $this->input->post('address'),
				// 'fax' => $this->input->post('fax'),
				// 'site_detail' => $this->input->post('site_detail'),
				// 'telephone' => $this->input->post('telephone'),
				// 'site_logo' => $_FILES['userfile']['name']
				// );

		$data = array(

	"item_name" 		=> strip_tags($this->input->post('item_name')),
	"item_detail" 		=> strip_tags($this->input->post('item_detail')),
	"category_id" 		=> strip_tags($this->input->post('category_id')),
	"item_type" 		=> strip_tags($this->input->post('item_type')),
	"company_name" 		=> strip_tags($this->input->post('company_name')),
	"supplier_id" 	=> strip_tags($this->input->post('supplier_id')),
	"unit_price" 		=> strip_tags($this->input->post('unit_price')),
	"selling_price" 	=> strip_tags($this->input->post('selling_price')),
	"stock_item" 		=> strip_tags($this->input->post('stock_item')),
	"remaining_stock" 		=> strip_tags($this->input->post('stock_item')),
	"expire_date" 	=> strip_tags($this->input->post('expiration_date')),
	"photo"=> $_FILES['userfile']['name']	
		);

$dtype = array(
	"spec" 		=> strip_tags($this->input->post('Specification'))
);
	print_r($data);	
		$ret  = $this->sc_model->insertItem($data,$dtype);		
		if($ret){
			$red = base_url().$this->extra_lib->path."/items/add_item";
			//redirect($red);		
		}

                        // $ret = $this->sc_model->update_company_setting($id,$EppArr);
                        // if($ret){
                        // 	$this->session->set_flashdata('msg','your company setting has been updated');
                        // 	redirect('admin/settings');
                        // }

                }
		



//end of items add images to this......

	}	

	public function importdata()
	{ 
		$data['title'] = "Import Data -  admin";
		$this->load->view('admin/itemsimport',$data);
		if(isset($_POST["submit"]))
		{
			$file = $_FILES['file']['tmp_name'];
			$handle = fopen($file, "r");
			$c = 0;//

				while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
			{

			   $item_id = $filesop[0];
			   $item_name = $filesop[1];
			   $item_detail = $filesop[2];
			   $category_id = $filesop[3];
			   $item_type = $filesop[4];
			   $company_name = $filesop[5];         
			   $supplier_id = $filesop[6];   
			   $unit_price = $filesop[7];
			   $selling_price = $filesop[8];  
			   $stock_item = $filesop[9];  
			   $remaining_stock = $filesop[10];
			   $expire_date = $filesop[11];         				

				if($c<>0){					//SKIP THE FIRST ROW
					$this->sc_model->importItems($item_id,$item_name,$item_detail,$category_id,$item_type,$company_name,$supplier_id,$unit_price,$selling_price,$stock_item,$remaining_stock,$expire_date );
				}
				$c = $c + 1;
			}
			$this->session->set_flashdata('msg','sucessfully import data');
			redirect('admin/items/add_item');
				
		}
	}
    	
public function importItems(){
		$data['title'] = "Import Data -  admin";
		$this->load->view('admin/itemsimport',$data);

	}


	// Export data in CSV format
	public function export(){
		
		// file name
		$filename = 'items_'.date('Ymd').'.csv';
		
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Type: application/csv; "); 

		// get data
		$usersData = $this->sc_model->getItemsCS();

		// file creation
		$file = fopen('php://output', 'w');

		$header = array("item_id",'item_name',"item_detail","category_id","item_type","company_name","supplier_id","unit_price","selling_price","stock_item","remaining_stock","expire_date")
;
		fputcsv($file, $header);

		foreach ($usersData as $key=>$line){

		 fputcsv($file,$line);
		}

		fclose($file);
		exit;
	}

}

	?>