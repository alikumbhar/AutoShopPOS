<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Controller {

	public function index()
	{
		$path =  $this->extra_lib->path;
		$data['users'] = $this->sc_model->getUsers();
		$data['title'] = "Users ";
		$this->load->view('admin/users',$data);
	}

	public function add_user_role(){
		$data['roles'] = $this->sc_model->getRole();
		$data['title'] = "Add User Role ";
		$this->load->view('admin/user_role_create',$data);
	
	}
	public function delete_roles($id = null){

	 	$del = $this->sc_model->delete_user_role($id);
		if($del){
				$this->session->set_flashdata('remove','users role has been removed');
				$p = $this->extra_lib->path."/users/add_user_role";
				redirect($p);
			}		
	}

	public function add_role(){
			$session = $this->session->userdata('userVal');
			$userID = $session['id'];

		$data = array(
			'name' => strip_tags($this->input->post('role_name')),
			'created_user_id' => $userID,
			'created_datetime'  => date('m/d/Y h:i:s', time()),
		
		);

			$true = $this->sc_model->addRole($data);

			if($true){
				redirect('admin/users/setNullPermission');
			}


	}

	public function update_role(){


			date_default_timezone_set("asia/karachi");
			$session = $this->session->userdata('userVal');
			$userID = $session['id'];
			$id = $this->input->post('role_id');
			$data = array(
			'name' => strip_tags($this->input->post('role_name')),
			'updated_user_id' => $userID,
			'updated_datetime'  => date('m/d/Y h:i:s', time()),
			
		);



			$true = $this->sc_model->updateRole($data,$id);

			if($true){
				redirect('admin/users/add_user_role');
			}


	}


	public function add_users(){

		$data = array(
			'fullname' => strip_tags($this->input->post('fullname')),
			'email' => $this->input->post('email'),
			'user_password' => $this->input->post('password'),
			'role_id' => strip_tags($this->input->post('user_role')),
			'created_user_id' 	=> strip_tags($this->input->post('created_user_id')),
			'created_datetime'  => date('m/d/Y h:i:s', time()),
			'status'			=> strip_tags($this->input->post('status'))					
		);

		$retV = $this->sc_model->add_users($data);
//commenting here disable user for few function will active again
		$retV = true;
		if($retV){
				$this->session->set_flashdata('msg','users has been added');
				$p = $this->extra_lib->path."/users";
				redirect($p);
			}	
	}
		public function user_roles_edit($id){
				$data['roles'] = $this->sc_model->getRoleByID($id);

		$this->load->view('admin/edit_user_roles',$data);
	}

	 public function delete_user($id = null){

	 	$del = $this->sc_model->delete_users($id);
		if($del){
				$this->session->set_flashdata('remove','users has been removed');
				$p = $this->extra_lib->path."/users";
				redirect($p);
			}		
	}

	 public function edit_users($id = null){
		$data['users'] = $this->sc_model->get_users_with_id($id);
		
 		$data['title'] = "Admin panel - Edit users";
		$this->load->view('admin/edit_users.php',$data); 	

	}
	public function add_role_permission(){


		$data = array( 
		'action'		=> $this->input->post('cb'),
		'pageName' 	=> $this->input->post('pageName'),
		'cb' 	=> $this->input->post('ids'),
		'pageID'	=> $this->input->post('pageID'),
		'roleID'	=> $this->input->post('roleID'),						
		 
	);

		$this->sc_model->updatePermissions($data);
	}


	public function setNullPermission(){
		$true = $this->sc_model->getRoleLast();		
		 $role_id = $true[0]->role_id;
		 $role_name = $true[0]->name;
			$session = $this->session->userdata('userVal');
			$userID = $session['id'];

		$r = $this->sc_model->add_permissions($role_id,$userID);


		if($r){
			
				$this->session->set_flashdata('msg','users has been added');
				$p = $this->extra_lib->path."/users/user_roles/".$role_id.'/'.$role_name;
				redirect($p);
			}
		
	}

	public function update_users($ids=null){
		$id = $this->input->post('id');
 		
 		$user = $this->session->userdata('userVal');
		$data = array(
			'fullname' 			=> $this->input->post('fullname'),
			'email' 			=> $this->input->post('email'),
			'user_password' 	=> $this->input->post('user_password'),
			'role_id' 			=> $this->input->post('user_role'),
			'updated_user_id' 	=> $user['id'],	
			'status'			=> $this->input->post('status')
		);

			$retV = $this->sc_model->update_users($id,$data);
			if($retV){
				$this->session->set_flashdata('msg','users has been updated');
				$p = $this->extra_lib->path."/users";
				redirect($p);
 			}	
	}	

	public function update_users_pass(){
		$id = $this->input->post('id');
 		
		$time = date("h:i:s"); 

$Seconds =  implode(explode(':',$time));
 		$user = $this->session->userdata('userVal');
		$data = array(
			'user_password' 	=> $this->input->post('user_password'),
			'verification_code' =>md5(rand(50,$Seconds))
		);

			$retV = $this->sc_model->update_users($id,$data);
			if($retV){

				$this->session->set_flashdata('msg2','user password has been updated');
				
				   redirect(base_url());
 			}	

	}
			public function block_users($ids=null,$status=null){

		$id = $ids;

		$data = array(
			'user_status' => $status
		);
	
			$retV = $this->sc_model->block_users($id,$data);
			if($retV){
				$this->session->set_flashdata('msg','users has been updated');
				$p = $this->extra_lib->path."/users";
				redirect($p);
 			}	
	}	
	// public function user_roles(){
	// 		$path =  $this->extra_lib->path;
	// 	$data['users'] = $this->sc_model->getUsers();
	// 	$data['title'] = "Users ";
	// 	$this->load->view('admin/user_role',$data);
	// 	}


	public function user_roles($id=null,$dd=null){
		$path =  $this->extra_lib->path;
	
	
		$data['users'] = $this->sc_model->getUsers();
		$data['pages'] = $this->sc_model->getPagesPermissions($id);
		$data['title'] = "Users ";

		$this->load->view('admin/user_role',$data);
}
		}
	?>