<?php

class crypto_model extends CI_Model {

public function __construct() {

    parent::__construct();

   $this->load->database();

	}

///////////add tested category for other project will be removed after successfully testing


//--------------------------
/*
****************************
admin Edit Products  section End 
****************************
*/


// public function getUsers(){

//   $query = $this->db->query('SELECT us.*,ur.name AS role_name,ur.id AS role_id FROM users us, user_roles ur WHERE us.role_id = ur.role_id 
//       order by us.id desc');
//   return $query->result();
// }
public function getUsers(){
$Query = $this->db->query('select * from db_users');
 $this->db->error();
return $Query->result();  
}
public  function getBalanceByMethod(){
$Query = $this->db->query('SELECT w.*,dab.account_balance,u.id AS user_id,wi.wallet_name FROM db_account_balance dab,wallets w,db_users u,wallet_id wi
WHERE u.id = dab.user_id
AND w.wallet_id = wi.id
AND dab.e_wallet_no = w.wallet_id
AND w.wallet_id = 2
AND u.id = 2');
echo $this->db->error();
return $Query->result();

}
public  function getALLC($data){
  $Query = $this->db->query('
                  Select * from wallets 
                  WHERE user_id ="'.$data.'"');
return $Query->result();

}
public function insertWallets($data){
  
  $Query = $this->db->query('
                  Select * from wallets where 
                  wallet_id = "'.$data['wallet_id'].'"
                  AND user_id ="'.$data['user_id'].'"');
  if($Query->num_rows() > 0){
      $this->db->where('user_id',$data['user_id']);
      $this->db->where('wallet_id',$data['wallet_id']);      
      $queryZ  = $this->db->update('wallets',$data);
      $error =  $this->db->error();
      echo $error['message'];
      return $queryZ; 
  }else{
        $a =  $this->db->insert('wallets',$data);
        $error =  $this->db->error();
        echo $error['message'];
        return $a;
   }
}

//create deposit()
public function set_deposit($data){
    

$myplan = "";
if($data['plan_id'] ==1) {
  $myplan = 185;
}
if($data['plan_id'] ==2) {
  $myplan = 220;
}
if($data['plan_id'] ==3) {
  $myplan = 370;
}
  // $your_commission = ($myplan / 100) * $data['balance_deposit'];
  // $user_id = $data['user_id'];

//insert in the deposit table
$insertBalance =  array(
    'user_id'         =>$data['user_id'],
    'plan_id'         =>$data['plan_id'],
    'wallet_no'      =>$data['account_no'],
    'balance_deposit' =>$data['balance_deposit'],
    'dep_date'        =>$data['dep_date'],
    'dep_time'        =>$data['dep_time'],
    'status'          =>$data['status'],
    'wallet_id'       =>$data['e_wallet_no']
);

 
    $query   =  $this->db->insert('deposit',$insertBalance);
    $last_id =  $this->db->insert_id();
    echo $this->db->error();

$upline = $this->db->query('SELECT r.referer_id,u.id,u.fullname,user_name  FROM referals r ,db_users u
WHERE  u.id = r.user_id 
AND referer_id = "'.$data['user_id'].'"');

$m = $upline->row();
if($upline->num_rows > 0){
$my_ref_percentage = 25;
  $referalCommission = ($my_ref_percentage / 100) * $data['balance_deposit'];
  $user_id = $data['user_id'];
//insertDatainthe balance table for referals
    $ac_balance_db = array(
                  'account_balance' =>$referalCommission,
                  'user_id' => $m->id,
                  'status' =>'yes', 
                  'in_date' =>$data['dep_date']." ".$data['dep_time'],
                  'e_wallet_no'=>$data['e_wallet_no']
                );  

                $ac_balance_db['balance_id'] = $last_id; 
                $query2  =  $this->db->insert('db_account_balance',$ac_balance_db);
}
  $inRef = array(
                  'ref_commission' =>$your_commission,
                  'user_id' => $m->id,
                  'status' =>'yes' 
                );

    $query1  =  $this->db->insert('ref_commission',$inRef);
    echo $this->db->error();
  	return $query;

  }


//count referals
public function getStatic(){
  $QM = $this->db->query('SELECT *
      from user_static ');
    return $QM->row();
  }
  public function count_referals($userid){
  
  $QM = $this->db->query('SELECT *,count(id) as total_ref 
      from referals 
      where user_id = "'.$userid.'"
      ');
    return $QM->row();

}

/// get_referals

  public function getreferals($userid){

    $QM = $this->db->query('SELECT *,count(id) as total_ref 
      from referals 
      where user_id = "'.$userid.'"
      GROUP BY id
      ');
return $QM->result();
}


public  function percentage(){
  $QM = $this->db->query('SELECT * from percentages
      ');
    return $QM->row();

}
/// getActiveDepositReferals
      // SELECT *,count(id) as total_ref 
      // from referals 
      // where user_id = 
      // GROUP BY id

  public function upline($userid){

    $QM = $this->db->query('SELECT r.referer_id,u.id,u.fullname,user_name  FROM referals r ,db_users u
WHERE  u.id = r.user_id 
AND referer_id = "'.$userid.'"
');
    return $QM->row();
  }

  public function getActiveDepositReferals($userid){

    $QM = $this->db->query('SELECT COUNT(r.user_id) AS total_ref,sum(balance_deposit) as commission 
      FROM referals r ,deposit d
      WHERE r.referer_id = d.user_id
      AND r.user_id = "'.$userid.'"
      ');
    return $QM->row();
//   foreach($mb as $res){
//     $chk = $this->db->query('SELECT count(balance_id) as activeDeposit from deposit 
//       where user_id 
//       IN("'.$res->referer_id.'")
//       ');
//      $red[] =  $chk->result();
//   }
// return $red;
}



//gloabal investment of all the records


  
  public function gloabalinvestment(){

  	$QM = $this->db->query('SELECT SUM(floor(balance_deposit)) AS total_active_balance
  		FROM deposit 
  		');
	$mb = $QM->row();
	return $mb;  
}

//update_account_balance_db

public function db_account_balance($id,$data){
  



	$acData = $this->db->query('UPDATE db_account_balance SET account_balance = account_balance -"'.$data['account_balance'].'"
	Where  ac_id ='.$id);
	echo $this->db->error();

	$dataUpdate =array(
						'withdraw_amount'=>$data['account_balance'],
						'withdraw_ewallet'=>$data['e_wallet_no'],
						'user_id'=>$data['user_id'],
						'ac_deposit_id'=>$id,
						'batch_id'=>$data['batch_id'],
						'E_account_no'=>$data['E_account_no']
					);
	$this->db->insert('db_withdraw_amount',$dataUpdate);
	echo $this->db->error();

	return $acData;


}

public function getewallet1($user_id){
  $QM = $this->db->query('SELECT w.*,dab.*,u.id AS user_id, SUM(account_balance) AS totalbywallet 
FROM db_account_balance dab,wallets w,db_users u
WHERE u.id = dab.user_id
AND dab.e_wallet_no = w.id
AND e_wallet_no = 1
AND u.id =  "'.$user_id.'"

');
return $QM->row();

}
public function getewallet2($user_id){
  $QM = $this->db->query('SELECT w.*,dab.*,u.id AS user_id, SUM(account_balance) AS totalbywallet 
FROM db_account_balance dab,wallets w,db_users u
WHERE u.id = dab.user_id
AND dab.e_wallet_no = w.id
AND e_wallet_no = 2
AND u.id = "'.$user_id.'"

');
return $QM->row();

}
public function getewallet3($user_id){
  $QM = $this->db->query('SELECT w.*,dab.*,u.id AS user_id, SUM(account_balance) AS totalbywallet 
FROM db_account_balance dab,wallets w,db_users u
WHERE u.id = dab.user_id
AND dab.e_wallet_no = w.id
AND e_wallet_no = 3
AND u.id  = "'.$user_id.'"

');
return $QM->row();

}
//get_withdraw_detail

public function checkvisitors($ip){
      $QM = $this->db->query('SELECT * FROM visitors where ip ="'.$ip.'"');
    return $QM->num_rows();
  }

public function insertCountry($data){
    

    $r =  $this->db->insert('visitors',$data);
    echo $this->db->error();   
    return $r;
  }

public  function getwithdrawAccountinfo($user_id){

  	$QM = $this->db->query('SELECT w.*,dab.*,u.id AS user_id FROM db_account_balance dab,wallets w,db_users u
WHERE u.id = dab.user_id
AND dab.e_wallet_no = w.id
AND u.id = "'.$user_id.'"');
	$mb = $QM->result();
	return $mb;  
}

//totalWithdrawl

public function getwithdraw($user_id){
	$QW = $this->db->query('SELECT SUM(withdraw_amount) AS withdrawl FROM db_withdraw_amount WHERE user_id = "'.$user_id.'"');
	$mb = $QW->row();
	return $mb;  
}

//available account balance

public function available_account_balance($user_id){
	
  	$QM = $this->db->query('SELECT SUM(account_balance) AS available_balance FROM db_account_balance WHERE user_id="'.$user_id.'" ');
	$mb = $QM->row();
	return $mb;  
}

public function updatetime($data,$id){

      $this->db->where('ref_percenteage',$id);
      $query  = $this->db->update('percentages',$data);
      echo $this->db->error();
}


// add_available_balance
public function add_available_balance($data){
  $r =  $this->db->insert('db_account_balance',$data);
       echo $this->db->error();   
  return $r;
} 



//start plans for all time interval processing 
  public function process_depoist_time_interval_plan_1($user_id){

    $QM = $this->db->query('SELECT SUM(d.balance_deposit) AS active_balance, d.balance_id, w.id,p.plan,d.dep_time,d.dep_time
      FROM deposit d , wallets w,plans p
      WHERE user_id = "'.$user_id.'"
      AND p.id = 1
      AND w.id = d.wallet_id
      AND STATUS ="yes" 
      GROUP BY d.dep_time ');
  $mb = $QM->result();
  return $mb;  
}
  public function process_depoist_time_interval_plan_2($user_id){

    $QM = $this->db->query('SELECT SUM(d.balance_deposit) AS active_balance, d.balance_id, w.id,p.plan,d.dep_time,d.dep_time
      FROM deposit d , wallets w,plans p
      WHERE user_id = "'.$user_id.'"
      AND p.id = 2
      AND w.id = d.wallet_id
      AND STATUS ="yes" 
      GROUP BY d.dep_time');
  $mb = $QM->row();
  return $mb;  
}
  public function process_depoist_time_interval_plan_3($user_id){

    $QM = $this->db->query('SELECT SUM(d.balance_deposit) AS active_balance, d.balance_id, w.id,p.plan,d.dep_time,d.dep_time
      FROM deposit d , wallets w,plans p
      WHERE user_id = "'.$user_id.'"
      AND p.id = 3
      AND w.id = d.wallet_id
      AND STATUS ="yes" 
      GROUP BY d.dep_time');
  $mb = $QM->row();
  return $mb;  
}

//end plans for all processing after time interval

//active investments
  public function active_investments($user_id){

  	$QM = $this->db->query('SELECT SUM(d.balance_deposit) AS active_balance, d.balance_id, w.id
      FROM deposit d , wallets w
      WHERE user_id ="'.$user_id.'"
    AND w.id = d.wallet_id
      AND STATUS ="yes" ');
	$mb = $QM->row();
	return $mb;  
}

//sum totalinvestment
  public function totalinvest($user_id){
	$QM = $this->db->query('SELECT plans,SUM(balance_deposit) as total_investment_user FROM deposit WHERE user_id ="'.$user_id.'"');
	$mb = $QM->row();

	return $mb;  	
  }

//get_deposit
  public function getDeposit($user_id){
	$QM = $this->db->query('select * from deposit where user_id ="'.$user_id.'"');
	$mb = $QM->row();

	return $mb;  	
  }
//getuserinfobyusername();
public function getuserinfobyusername($username){

  $QM = $this->db->query('select * from db_users where user_name ="'.$username.'"');
  return $QM->row();  
}


//add users
public function add_users($data){

      $ref = $this->session->userdata('referals');

  $data['referal_id'] = $ref['referer_id'];
	$QM = $this->db->query('select * from db_users where user_name ="'.$data['user_name'].'"');
	$mb = $QM->num_rows();
if($mb > 0){
	
return "0";
}else{

  	$query  = $this->db->insert('db_users',$data);
    $last_id = $this->db->insert_id();
	
		if(!empty($this->session->userdata('referals'))){
			
			$referal_array = array(
			'referer_id' 	   => $last_id,
			'referal_username' => $data['user_name'],
			'user_id' => $ref['referer_id'],
			'reg_time' 	=> $data['reg_time'],
			'reg_date'	=> $data['reg_date'],
			'status' =>'yes'		
			);
	  $query  = $this->db->insert('referals',$referal_array);
  	  echo $this->db->error();
	  $this->session->unset_userdata('referals');		
		}else{ }
  echo $this->db->error();
  return $query;
	}
}

    public function authenticate_by_verification_code($vcode) {
        $this->db->select('*');
        $this->db->from('db_users');
        $this->db->where('verification_code', $vcode);
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->row();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
    }

      public function get_member_by_email($email){
    
    $Q = $this->db->query("SELECT verification_code FROM db_users WHERE user_email = '".$email."'");
    
        if ($Q->num_rows > 0) {
            $return = $Q->row('verification_code');
        
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
  }


  	public function update_users($data,$id){
      
		$this->db->where('id',$id);
   		$query  = $this->db->update('db_users',$data);;
  		echo $this->db->error();
  		
      return $query;
  	
  	}

        public function get_member_by_emaildata($email){
    
    $Q = $this->db->query("SELECT * FROM db_users WHERE user_email = '".$email."'");
    
        if ($Q->num_rows > 0) {
            $return = $Q->row();
        
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
  }

public function getbyUsername($username){

	     $Q = $this->db->query("SELECT * FROM db_users 
	     						WHERE user_name='".$username."' ");
return  $Q->result(); 
}



//login user check if exist return value in session
//work to be done later
  public function authenticate_users($user_name, $user_password) {

         $Q = $this->db->query("SELECT * FROM db_users 
          WHERE user_name ='".$user_name."'
          AND user_password = '".$user_password."'");
		  echo  $this->db->error();
           return $Q->row();
          }


public function authenticate_usersname($user_name) {

         $Q = $this->db->query("SELECT * FROM db_users 
          WHERE user_name ='".$user_name."'");
		  echo  $this->db->error();
           return $Q->row();
          }          

    //end of user login




}