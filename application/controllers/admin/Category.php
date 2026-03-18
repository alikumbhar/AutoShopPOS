<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class category extends CI_Controller {

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
	public function getCategorySelect(){ 

				$categorys = $this->sc_model->getCategroy();		?>

                <div class="form-group" id="refreshCat">
      		<select class="selectpicker form-control" id="category_id" name="category_id" required=""  data-live-search="true">			                                      
                            <option>Select Category</option>
                        <?php foreach($categorys as $cat):   ?>
                        
                            <option value="<?= $cat->category_id; ?>"><?= $cat->category; ?>
                                
                            </option>
                            <?php endforeach; ?>
                        </select>

                                                <a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#categoryModal" data-backdrop="false">New Category</a>

                                                </div>



<?php	} 

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

	public function insertCategory(){
	
		$data = array(
				"category" => strip_tags($this->input->post('category'))
				);
	
		$ret  = $this->sc_model->insertCategory($data);		
		if($ret){
				$this->session->set_flashdata('msg','category has been Added');
			$red = base_url().$this->extra_lib->path."/category/add_category";
			redirect($red);		
		}
	}


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

//add expense category list here

	public function expense_category(){
		$data['categoryExp'] = $this->sc_model->getExpcategory();
		$data['title'] = "Add new Expense category";
		$this->load->view('admin/expCategory_add',$data);
	}

	 public function edit_exp_category($id = null){
		$data['categoryID'] = $this->sc_model->get_categoryExp_with_id($id);

 		$data['title'] = "Admin panel - Edit Expense Category";
		$this->load->view('admin/edit_categoryExp.php',$data); 	

	}	


	public function update_exp_category($id=null){

		$id = $this->input->post('exp_cate_id');

		$data = array(
			'category' => $this->input->post('category'),
			'category_detail' => $this->input->post('category_detail'),			
		);


			$retV = $this->sc_model->update_categoryExp($id,$data);
			if($retV){
				$this->session->set_flashdata('msg','category has been updated');
				$p = $this->extra_lib->path."/category/expense_category";
				redirect($p);
 			}	
	}

	public function insert_exp_category(){
	
		$data = array(
				"category" => strip_tags($this->input->post('category')),
				"category_detail" => strip_tags($this->input->post('category_detail'))				
				);
	
		$ret  = $this->sc_model->insertCategoryExp($data);		
		if($ret){
				$this->session->set_flashdata('msg','category has been Added');
			$red = base_url().$this->extra_lib->path."/category/expense_category";
			redirect($red);		
		}
	}




	 public function delete_exp_category($id = null){

	 	$del = $this->sc_model->delete_categoryExp($id);
		if($del){
				$this->session->set_flashdata('remove','category has been deleted');
				$p = $this->extra_lib->path."/category/expense_category";
				redirect($p);
			}		
	}	

//end add expense category lists	
}
	?>