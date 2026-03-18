<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class banking extends CI_Controller {

	public function index()
	{
		$path =  $this->extra_lib->path;
		$data['setting'] = $this->sc_model->getsiteSetting();
		$data['title'] = "Admin Panel - Site Settings";
	//	$this->load->view($path.'/site_setting',$data);
	redirect('admin/dashboard');
	}



	public function set_thumbs(){
		      	$config['upload_path']          = 'assets/uploads/';
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
                $id = $this->input->post('id');
				$EppArr = array(
				'site_name' =>$this->input->post('company_name'),
				'address' => $this->input->post('address'),
				'fax' => $this->input->post('fax'),
				'site_detail' => $this->input->post('site_detail'),
				'telephone' => $this->input->post('telephone')
				);

                        $ret = $this->sc_model->update_company_setting($id,$EppArr);
                        $this->session->set_flashdata('remove',$check);
                        $address = $this->extra_lib->path."/settings";
                        redirect($address);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
				$id = $this->input->post('id');
				$EppArr = array(
				'site_name' =>$this->input->post('company_name'),
				'address' => $this->input->post('address'),
				'fax' => $this->input->post('fax'),
				'site_detail' => $this->input->post('site_detail'),
				'telephone' => $this->input->post('telephone'),
				'site_logo' => $_FILES['userfile']['name']
				);

                        $ret = $this->sc_model->update_company_setting($id,$EppArr);
                        if($ret){
                        	$this->session->set_flashdata('msg','your company setting has been updated');
                        	redirect('admin/settings');
                        }

                }
	}	

	public function add_account(){
		$data['bank'] = $this->sc_model->getBank();
		$data['title'] = 'Add Account Bank - admin';
		$this->load->view('admin/bank_account_add',$data);
	}


	public function add_deposit(){
		$data['bank'] = $this->sc_model->getDeposit();
		$data['title'] = 'Add Deposit Bank - admin';
		$this->load->view('admin/bank_deposit_add',$data);
	}


	public function edit_deposit($id){

		$data['bank'] = $this->sc_model->getDepositwithID($id);
		$data['title'] = 'Add Deposit Edit - admin';
		$this->load->view('admin/bank_deposit_edit',$data);
	}		

	// public function funds_transfer(){
	// 	$data['bank'] = $this->sc_model->getTransferFunds();
	// 	$data['title'] = 'Funds transfer - admin';
	// 	$this->load->view('admin/bank_account_tansfer',$data);
	// }		

	public function insertBank(){

		$data = array(
		'payee_name' => strip_tags($this->input->post('payee_name')),
		'account_no' => strip_tags($this->input->post('account_no')),
		'bank_name' => strip_tags($this->input->post('bank_name')),
		'account_created_date' => strip_tags($this->input->post('account_created_date')),
		'bank_location' => strip_tags($this->input->post('bank_location')),
		'amount' => strip_tags($this->input->post('amount')),
		'payment_method' => strip_tags($this->input->post('payment_method')),
		'bank_detail' => strip_tags($this->input->post('bank_detail')),		
		'reference' => strip_tags($this->input->post('reference'))				
		);

		$rev = $this->sc_model->insertBank($data);
		if($rev){
			$this->session->set_flashdata('msg','your bank detail has been added');
			$red = $this->extra_lib->path;
			$red1 =   $red."/banking/add_account";
			redirect($red1);
		}
	}


	public function insertDeposit(){


	$data = array(
		'account_name' => strip_tags($this->input->post('account_name')),
		'account_type' => strip_tags($this->input->post('account_type')),
		'account_no' => strip_tags($this->input->post('account_no')),
		// 'amount' => strip_tags($this->input->post('amount')),
		'opening_balance' => strip_tags($this->input->post('opening_balance')),
		'bank_name' => strip_tags($this->input->post('bank_name')),		
		'bank_address' => strip_tags($this->input->post('bank_address')),
		'default_account' => strip_tags($this->input->post('default_account'))						
		);

		$rev = $this->sc_model->insertDeposit($data);
		if($rev){
			$this->session->set_flashdata('msg','your bank detail has been added');
			$red = $this->extra_lib->path;
			$red1 =   $red."/banking/add_deposit";
			redirect($red1);
		}	
	}



	public function updateDeposit($id){


	$data = array(
		'account_name' => strip_tags($this->input->post('account_name')),
		'account_type' => strip_tags($this->input->post('account_type')),
		'account_no' => strip_tags($this->input->post('account_no')),
		// 'amount' => strip_tags($this->input->post('amount')),
		'opening_balance' => strip_tags($this->input->post('opening_balance')),
		'bank_name' => strip_tags($this->input->post('bank_name')),		
		'bank_address' => strip_tags($this->input->post('bank_address')),
		'default_account' => strip_tags($this->input->post('default_account'))						
		);


		$rev = $this->sc_model->updateDeposit($id,$data);
		if($rev){
			$this->session->set_flashdata('msg','your bank detail has been updated');
			$red = $this->extra_lib->path;
			$red1 =   $red."/banking/add_deposit";
			redirect($red1);
		}	
	}

public function delete_deposit($id){
	$rev = 	$this->sc_model->delete_deposit($id);
if($rev){
			$this->session->set_flashdata('remove','your deposit detail has been removed');
			$red = $this->extra_lib->path;
			$red1 =  $red."/banking/add_deposit";
			redirect($red1);
}
}

	public function delete_funds($id){
		
				$rev = 	$this->sc_model->delete_funds($id);
		
			if($rev){
			$this->session->set_flashdata('remove','your funds detail has been removed');
			$red = $this->extra_lib->path;
			$red1 =  $red."/settings/add_bank";
			redirect($red1);
		}		
				

	}


	public function insertTFunds(){


		$data = array(
		'from_account' => strip_tags($this->input->post('from_account')),
		'to_account' => strip_tags($this->input->post('to_account')),
		'ft_date' => strip_tags($this->input->post('ft_date')),
		'ft_detail' => strip_tags($this->input->post('ft_detail')),
		'ft_amount' => strip_tags($this->input->post('ft_amount')),
		'payment_method' => strip_tags($this->input->post('payment_method')),		
		'ft_reference' => strip_tags($this->input->post('ft_reference'))
		);

		$rev = $this->sc_model->insertFunds($data);
		if($rev){
			$this->session->set_flashdata('msg','your funds has been added');
			$red = $this->extra_lib->path;
			$red1 =   $red."/banking/funds_transfer";
			redirect($red1);
		}	
	}


	public function edit_bank($id){
		$data['bank'] = $this->sc_model->edit_bank($id);
		
		$data['title'] = "Edit Bank - Admin";
		$this->load->view('admin/bank_edit',$data);
	}

	public function updateBank(){
			   $id = $this->input->post('id');
				
				$data = array(
		'payee_name' => strip_tags($this->input->post('payee_name')),
		'account_no' => strip_tags($this->input->post('account_no')),
		'bank_name' => strip_tags($this->input->post('bank_name')),
		'account_created_date' => strip_tags($this->input->post('account_created_date')),
		'bank_location' => strip_tags($this->input->post('location')),
		'amount' => strip_tags($this->input->post('amount')),
		'payment_method' => strip_tags($this->input->post('payment_method')),
		'bank_detail' => strip_tags($this->input->post('bank_detail')),		
		'reference' => strip_tags($this->input->post('reference'))
				);

			$rev = 	$this->sc_model->update_bank($id,$data);
			if($rev){
			$this->session->set_flashdata('msg','your bank detail has been updated');
			$red = $this->extra_lib->path;
			$red1 =  $red."/banking/add_account";
			redirect($red1);
		}
	}

	public function delete_bank($id){
				$rev = 	$this->sc_model->delete_bank($id);
		
			if($rev){
			$this->session->set_flashdata('remove','your bank detail has been removed');
			$red = $this->extra_lib->path;
			$red1 =  $red."/settings/add_bank";
			redirect($red1);
		}		
				

	}


	// 	public function add_cheque(){
	// 	$data['cheque'] = $this->sc_model->getCheque();
	// 	$data['title'] = 'add cheque - admin';
	// 	$this->load->view('admin/cheque_add',$data);
	// }

	// public function insertCheque(){

	// 	$data = array(
	// 	'bank_name' => strip_tags($this->input->post('bank_name')),
	// 	'cheque_book' => strip_tags($this->input->post('cheque_book')),
	// 	'leaf' => strip_tags($this->input->post('leaf'))
		
	// 	);			
	// 	$rev = $this->sc_model->insertCheque($data);
	// 	if($rev){
	// 		$this->session->set_flashdata('msg','your cheque detail has been added');
	// 		$red = $this->extra_lib->path;
	// 		$red1 =  $red."/settings/add_cheque";
	// 		redirect($red1);
	// 	}
	// }

	// public function edit_cheque($id){
	// 	$data['cheque'] = $this->sc_model->edit_cheque($id);
	// 	$data['title'] = "Edit Cheque - Admin";
	// 	$this->load->view('admin/cheque_edit',$data);
	// }

	// public function updateCheque(){
	// 			 $id = $this->input->post('id');
				
	// 			$data = array(
	// 			'bank_name' =>$this->input->post('bank_name'),
	// 			'cheque_book' => $this->input->post('cheque_book'),
	// 			'leaf' => $this->input->post('leaf')
	// 			);
	// 		$rev = 	$this->sc_model->update_cheque($id,$data);
	// 		if($rev){
	// 		$this->session->set_flashdata('msg','your cheque detail has been updated');
	// 		$red = $this->extra_lib->path;
	// 		$red1 =  $red."/settings/add_cheque";
	// 		redirect($red1);
	// 	}
	// }

	// public function delete_cheque($id){
	// 			$rev = 	$this->sc_model->delete_cheque($id);
		
	// 		if($rev){
	// 		$this->session->set_flashdata('remove','your cheque detail has been removed');
	// 		$red = $this->extra_lib->path;
	// 		$red1 =  $red."/settings/add_cheque";
	// 		redirect($red1);
	// 	}		
				

	// }
		public function add_cheque(){
		$data['cheque'] = $this->sc_model->getCheque();
		$data['title'] = 'add cheque - admin';

		$this->load->view('admin/cheque_add',$data);
	}

	public function insertCheque(){

		$data = array(
		'bank_name' => strip_tags($this->input->post('bank_name')),
		'cheque_book' => strip_tags($this->input->post('cheque_book')),
		'leaf' => strip_tags($this->input->post('leaf'))
		
		);			
		$rev = $this->sc_model->insertCheque($data);
		if($rev){
			$this->session->set_flashdata('msg','your cheque detail has been added');
			$red = $this->extra_lib->path;
			$red1 =  $red."/settings/add_cheque";
			redirect($red1);
		}
	}

	public function edit_cheque($id){
		$data['cheque'] = $this->sc_model->edit_cheque($id);
		$data['title'] = "Edit Cheque - Admin";
		$this->load->view('admin/cheque_edit',$data);
	}

	public function updateCheque(){
				 $id = $this->input->post('id');
				
				$data = array(
				'bank_name' =>$this->input->post('bank_name'),
				'cheque_book' => $this->input->post('cheque_book'),
				'leaf' => $this->input->post('leaf')
				);
			$rev = 	$this->sc_model->update_cheque($id,$data);
			if($rev){
			$this->session->set_flashdata('msg','your cheque detail has been updated');
			$red = $this->extra_lib->path;
			$red1 =  $red."/settings/add_cheque";
			redirect($red1);
		}
	}

	public function delete_cheque($id){
				$rev = 	$this->sc_model->delete_cheque($id);
		
			if($rev){
			$this->session->set_flashdata('remove','your cheque detail has been removed');
			$red = $this->extra_lib->path;
			$red1 =  $red."/settings/add_cheque";
			redirect($red1);
		}		
				

	}


}
	?>