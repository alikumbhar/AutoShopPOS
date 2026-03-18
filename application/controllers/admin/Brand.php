<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class brand extends CI_Controller {

	public function index()
	{
		
		$p = $this->extra_lib->path."/category/add_category";
		redirect($p);
		$data['category'] = $this->sc_model->getCategroy();
		$data['title'] = "category view";
		$this->load->view('admin/category_list',$data);

	}

	public function add_category(){
		$data['category'] = $this->sc_model->getCategroy();
		$data['title'] = "Add new category";
		$this->load->view('admin/category_add',$data);
	}

	 public function edit_category($id = null){
		$data['categoryID'] = $this->sc_model->get_category_with_id($id);

 		$data['title'] = "Admin panel - Edit Category";
		$this->load->view('admin/edit_category.php',$data); 	

	}	


	public function update_category($id=null){

		$id = $this->input->post('category_id');

		$data = array(
			'category' => $this->input->post('category'),
		);


			$retV = $this->sc_model->update_category($id,$data);
			if($retV){
				$this->session->set_flashdata('msg','category has been updated');
				$p = $this->extra_lib->path."/category/add_category";
				redirect($p);
 			}	
	}

	public function insertBrand(){
	
		$data = array(
				"brand" => strip_tags($this->input->post('brand'))
				);
	
		$ret  = $this->sc_model->insertBrand($data);		
		if($ret){
				$this->session->set_flashdata('msg','category has been Added');
			$red = base_url().$this->extra_lib->path."/category/add_category";
			redirect($red);		
		}
	}

public function insertBrandModal(){
	
		$data = array(
				"brand" => strip_tags($this->input->post('brand'))
				);
	
		$ret  = $this->sc_model->insertBrand($data);		
		if($ret){
			echo "Brand Has been added";
		}
	}	
public function insertUnitModal(){
	
		$data = array(
				"unit" => strip_tags($this->input->post('unit'))
				);
	
		$ret  = $this->sc_model->insertunit($data);		
		if($ret){
			echo "Unit Has been added";
		}
	}		


public  function getUnitBySelect(){
					     $unit = $this->sc_model->getunits();
					      ?>
 <div class="form-group" id="getBrandID">
      		<select class="selectpicker form-control" id="brand_id" name="brand_id" required=""  data-live-search="true" id="brand_id_div">			                                                	

                            <option>Select Unit</option>
                        <?php foreach($unit as $uni):   ?>
                        
              <option value="<?php echo  strtolower($uni->unit); ?>"><?php echo ucfirst($uni->unit); ?>
                                
                            </option>
                            <?php endforeach; ?>
                        </select>
                                         <a class="Primary mg-b-10"  data-toggle="modal" data-target="#getBrand" data-backdrop="false">New unit</a>
                                                </div>
<?php } 


public function getBrandBySelect(){ 
					     $brand = $this->sc_model->getbrand();?>
 <div class="form-group" id="getBrandID">
      		<select class="selectpicker form-control" id="brand_id" name="brand_id" required=""  data-live-search="true" id="brand_id_div">			                                                	

                            <option>Select Brand</option>
                        <?php foreach($brand as $bran):   ?>
                        
                            <option value="<?= $bran->brand_id; ?>"><?= $bran->brand; ?>
                                
                            </option>
                            <?php endforeach; ?>
                        </select>
                                         <a class="Primary mg-b-10"  data-toggle="modal" data-target="#getBrand" data-backdrop="false">New Brand</a>
                                                </div>

<?php }


public function insertCategoryModal(){
	
		$data = array(
				"category" => strip_tags($this->input->post('category'))
				);
	
		$ret  = $this->sc_model->insertCategory($data);		
		if($ret){
		echo "category has been Added";		
		}
	}

	 public function delete_category($id = null){

	 	$del = $this->sc_model->delete_category($id);
		if($del){
				$this->session->set_flashdata('remove','category has been deleted');
				$p = $this->extra_lib->path."/category";
				redirect($p);
			}		
	}	

}
	?>