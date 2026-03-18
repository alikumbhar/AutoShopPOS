<?php

class Crypto_model extends CI_Model {

public function __construct() {

    parent::__construct();
    $this->load->database();
$this->db->query('SET SESSION sql_mode = ""');

 // ONLY_FULL_GROUP_BY
$this->db->query('SET SESSION sql_mode =
                  REPLACE(REPLACE(REPLACE(
                  @@sql_mode,
                  "ONLY_FULL_GROUP_BY,", ""),
                  ",ONLY_FULL_GROUP_BY", ""),
                  "ONLY_FULL_GROUP_BY", "")'); 

	}

///////////add tested category for other project will be removed after successfully testing
public function bywithdraw($userID){
  $Query = $this->db->query('SELECT wab.withdraw_amount AS earned_amount,wab.withdraw_date_time AS dates FROM withdraw_account_balance wab WHERE user_id  = "'.$userID.'"');
 return $Query->result();
}


public function byreferals($userID){

  $Query = $this->db->query('SELECT rf.ref_commission AS earned_amount,rf.created_date AS dates
FROM ref_commission rf,db_users u
WHERE u.id = rf.user_id
AND rf.user_id =  "'.$userID.'"');
 return $Query->result();
}


public function withdrawbywallet($userID){

  $Query = $this->db->query('SELECT dab.e_wallet_no,wi.wallet_name ,w.id,w.account_no,SUM(dab.account_balance) AS balance FROM db_account_balance dab,wallet_id wi ,wallets w
WHERE dab.user_id = "'.$userID.'"
AND w.wallet_id = dab.e_wallet_no
AND wi.id = dab.e_wallet_no
AND w.user_id = dab.user_id
GROUP BY e_wallet_no
');
 return $Query->result();
}


public function bydeposit($userID){

  $Query = $this->db->query('SELECT d.status,d.balance_deposit AS earned_amount,d.dep_date AS dates,d.dep_time,d.final_date
FROM deposit d,db_users u
WHERE u.id = d.user_id
AND d.user_id =  "'.$userID.'"');
 return $Query->result();
}

public function byearning($userID){

  $Query = $this->db->query('SELECT d.amount as earned_amount,created_date as dates FROM e_balance d, db_users u
                     WHERE d.user_id= u.id
                     AND d.user_id = "'.$userID.'"');
 return $Query->result();
}

//--------------------------
/*
****************************
admin Edit Products  section End 
****************************
*/
public function dummy($data){
            return $this->db->insert('dummy',$data);

}

// public function getUsers(){

//   $query = $this->db->query('SELECT us.*,ur.name AS role_name,ur.id AS role_id FROM users us, user_roles ur WHERE us.role_id = ur.role_id 
//       order by us.id desc');
//   return $query->result();
// }



public function get_all_emails(){
  $gQuery = $this->db->query('SELECT * FROM emails  where  status="yes"
    ');
    return $gQuery->row();
}
public function checkBalance($data){

  $RQuery = $this->db->query('SELECT sum(account_balance) as account_balance FROM db_account_balance 
                  WHERE user_id = "'.$data['user_id'].'"
                  ');
$rws =$RQuery->row();

if( $data['withdraw_amount'] <=  $rws->account_balance){  return 1;}else{

  return 0; }

// if($RQuery->num_rows() > 0){
//   echo "Cant find the Query - Works";
// }else{
//   echo "else Query";
// }


}

public function getwithdrawbyid($uid){

$RQuery = $this->db->query('SELECT withdraw_amount as w_amount,withdraw_date_time as wdate,withdraw_batch_id as batch_id FROM withdraw_account_balance 
                  WHERE user_id = "'.$uid.'" ');
return $RQuery->result();

}

public function checkBalanceCoin($data){

  $RQuery = $this->db->query('SELECT * FROM deposit 
                  WHERE operation_id = "'.$data['operation_id'].'" ');
$rws =$RQuery->row();

if( $data['operation_id'] == $rws->operation_id){ return 1;}else{
  return 0; }




}


public function withdraw_payer_Pm($data){


$status="yes";

           $this->db->insert('withdraw_account_balance',$data);
                return $this->db->query('UPDATE db_account_balance SET account_balance = account_balance - "'.$data['withdraw_amount'].'",
                      status= "'.$status.'",
                      up_date="'.$data['withdraw_date_time'].'"
                      WHERE user_id = "'.$data['user_id'].'"
                      AND e_wallet_no="'.$data['wallet_id'].'"
                    ');
}


public function setWithdraw_coins($data){


$status="yes";
          $data['withdraw_action']= "unpaid";
           $this->db->insert('withdraw_request_coins',$data);
                return $this->db->query('UPDATE db_account_balance SET account_balance = account_balance - "'.$data['withdraw_amount'].'",
                      status= "'.$status.'",
                      up_date="'.$data['withdraw_date_time'].'"
                      WHERE user_id = "'.$data['user_id'].'"
                      AND e_wallet_no="'.$data['wallet_id'].'"
                    ');
}




public function getTransaction($id = null,$trx_id=null){

  $fetchQ = '';
if(!empty($id) AND !empty($trx_id)){
  $fetchQ.='SELECT  u.user_name,t.* 
FROM db_users u, transactiont t
WHERE t.user_id = u.id
AND t.status="yes" 
AND t.user_id ="'.$id.'"
AND t.transaction_id = "'.$trx_id.'"';
}else{
  $fetchQ.='SELECT  u.user_name,t.* 
FROM db_users u, transactiont t
WHERE t.user_id = u.id
AND t.status="yes" 
ORDER BY t.id DESC';
}

$Query =   $this->db->query($fetchQ);


if($Query->num_rows() > 0){ 

return $Query->result();


}
}




public  function insertTrx($trX){
  $checkTr = $this->db->query('SELECT  t.transaction_id FROM transactiont t
WHERE t.transaction_id = "'.$trX['transaction_id'].'"');
    
  if($checkTr->num_rows() > 0){
    return 0;
  }
  else{

    $a =  $this->db->insert('transactiont',$trX);
    return $a;
  }
  }
//endtime new funcions 






//get totalinvest by user
public function totalinvestByUser($user_id){
$Query =   $this->db->query('SELECT FORMAT(SUM(d.balance_deposit),2) AS totalinvest
FROM deposit d,db_users u
WHERE u.id = d.user_id
AND d.user_id = "'.$user_id.'"');
if($Query->num_rows() > 0){ 


return $Query->row();
}

}
//end


//edited
//get total available balance for  all pages
public function getTotalavailableBalance($user_id){

$Query =   $this->db->query('SELECT FORMAT(SUM(dab.account_balance),2) AS account_balance,dab.ac_id,dab.user_id,dab.e_wallet_no
FROM db_account_balance dab
WHERE dab.user_id  = "'.$user_id.'"');

return $Query->row();
// if($this->db->count_all_results() > 0){ 
// return $Query->row();
// }

}

public  function gettotalwithdraw($user_id){

$Query = $this->db->query('SELECT FORMAT(SUM(wab.withdraw_amount),2) AS total_withdraw FROM withdraw_account_balance wab WHERE user_id =  "'.$user_id.'"


');

if($Query->num_rows() > 0){ 
  return $Query->result();
}

}

public  function gettotalearned($user_id){

$Query = $this->db->query('SELECT FORMAT(SUM(eb.amount),2) AS total_earned FROM e_balance eb WHERE user_id =  "'.$user_id.'"


');

if($Query->num_rows() > 0){ 
  return $Query->result();
}

}


public  function getBalanceByMethod($w_id,$user_id){
    $users = $this->session->userdata('userVal');
    if($users['id'] ==$user_id ){}else{
      redirect('login');
    } 
$Query = $this->db->query('SELECT dab.account_balance,dab.e_wallet_no 
FROM db_account_balance dab
WHERE  user_id = "'.$user_id.'" 
AND e_wallet_no ="'.$w_id.'"
');


if($Query->num_rows() > 0){ 
$r = $Query->row();
if(!empty($r)){ 
$Query1 = $this->db->query('SELECT dab.e_wallet_no,w.account_no,w.user_id,w.wallet_id FROM db_account_balance dab,wallets w
WHERE w.user_id = "'.$user_id.'"
AND w.wallet_id = "'.$r->e_wallet_no.'"'); 
$r2 = $Query1->row();
$m = array('account_balance'=>$r->account_balance,
        'account_no'=>$r2->account_no);

return $m;
}
}

}


//getUsersbyip
public function getUserByIp($ip){
  $Query = $this->db->query('SELECT * from checkuser where ip="'.$ip.'"
    AND status="yes"');
    if($Query->num_rows() > 0)
      {
        return 1;
      } else{
        return 0;
      }
    }

  public function updateCoinReq($req){

      $ar1 = array('withdraw_action'=>'paid');
      $this->db->where('user_id',$req['user_id']);
      $this->db->where('id',$req['id']);
      $this->db->where('withdraw_account_no',$req['withdraw_account_no']);          
      return  $this->db->update('withdraw_request_coins',$ar1);
  }

//getcoinwithdrawRequest
public function getcoinwithdrawRequest($userId){
  $Query = $this->db->query('SELECT DISTINCT wrc.withdraw_account_no,u.fullname,u.id,wrc.wallet_id,wrc.withdraw_date_time,wrc.withdraw_amount,wrc.withdraw_payment_method,wrc.user_id,wrc.withdraw_batch,wrc.id as withdraw_id,u.user_name FROM withdraw_request_coins wrc,db_users u
WHERE u.id = wrc.user_id
AND wrc.withdraw_action="unpaid"
group by wrc.withdraw_account_no
');
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
     
      
      return $queryZ; 
  }else{
        $a =  $this->db->insert('wallets',$data);
       
        
        return $a;
   }
}

//create Deposit in payeer
//create deposit()
public function set_deposit_payeer_pm($data){
    
$myplan = 100;


  $your_commission = ((int)$myplan / 100) * (int)$data['balance_deposit'];
  $user_id = $data['user_id'];
$currecy1 = "";
if(!empty($data['currency'])){
  $currecy1= $data['currency'];
}else{
    $currecy1= "USD";
}
$fe = explode('-', $data['dep_date']);


$year  = $fe[0];
$month = $fe[1];
$day   = $fe[2]+1;
$filter="";
if(strlen($day) ==2 ){
  $filter = $day;
}else{
  $filter = "0".$day;
}


$final_date = $year."-".$month."-".$filter;
$insertBalance =  array(
    'user_id'         =>$data['user_id'],
    'plan_id'         =>1,
    'balance_deposit' =>$data['balance_deposit'],
    'dep_date'        =>$data['dep_date'],
    'dep_time'        =>$data['dep_time'],
    'currency'        =>$currecy1,
    'final_date'     =>$final_date, 
    'status'          =>$data['status'],
    'wallet_id'       =>$data['e_wallet_no'],
    'operation_id'=>$data['operation_id']
);

 
    $query   =  $this->db->insert('deposit',$insertBalance);
    $last_id =  $this->db->insert_id();

$upline = $this->db->query('SELECT r.referer_id,u.id,u.fullname,user_name  FROM referals r ,db_users u
WHERE  u.id = r.user_id 
AND referer_id = "'.$data['user_id'].'"');



$m = $upline->row();

if($upline->num_rows() > 0){
$QK = $this->db->query('SELECT * from percentages');
$per = $QK->row();

$walletInfo = $this->db->query('
SELECT * FROM wallets 
WHERE user_id = "'.$m->id.'"
AND u_type="primary" ');

$valt = $walletInfo->row();



  $my_ref_percentage = $per->percentage;
  $referalCommission = ($my_ref_percentage / 100) * $data['balance_deposit'];
  $user_id = $data['user_id'];

    $ac_balance_db = array(
                  'account_balance' =>$referalCommission,
                  'user_id' => $m->id,
                  'status' =>'yes', 
                  'in_date' =>$data['dep_date']." ".$data['dep_time'],
                  'e_wallet_no'=>$valt->wallet_id
                );  
                $ac_balance_db['balance_id'] = $last_id; 

                $upBal = $this->db->query('SELECT * from db_account_balance where user_id="'.$m->id.'" AND e_wallet_no ="'.$valt->wallet_id.'"');
//                $checkTopUp = $upBal->row();

           
                 if($upBal->num_rows() > 0){ 
                return $this->db->query('UPDATE db_account_balance SET account_balance = account_balance + "'.$referalCommission.'",
                      status="'.$data['status'].'",
                      up_date="'.$data['dep_time'].'",
                      balance_id = "'.$ac_balance_db['balance_id'].'" WHERE user_id = "'.$m->id.'"
                          AND e_wallet_no="'.$valt->wallet_id.'"                      
                    ');
                $earned = array(
                  'amount' =>$referalCommission,
                  'user_id' => $m->id,
                  'status' =>'yes',
                  'wallet_id'=>$valt->wallet_id 
                );
    
                $inRef = array(
                  'ref_commission' =>$referalCommission,
                  'user_id' => $m->id,
                  'status' =>'yes' 
                );
              $e  =  $this->db->insert('e_balance',$earned);
              $query1  =  $this->db->insert('ref_commission',$inRef);                
                }else{
                $earned = array(
                  'amount' =>$referalCommission,
                  'user_id' => $m->id,
                  'status' =>'yes',
                  'wallet_id'=>$valt->wallet_id 
                );
    
                $inRef = array(
                  'ref_commission' =>$referalCommission,
                  'user_id' => $m->id,
                  'status' =>'yes' 
                );
              $e1  =  $this->db->insert('e_balance',$earned);
              $query1s  =  $this->db->insert('ref_commission',$inRef);                                  
                  $query2  =  $this->db->insert('db_account_balance',$ac_balance_db);
                  
                }


    
}
//end create deposit in  payeer
    return $query;
}

//end create deposit in  payeer



//create deposit()
public function set_deposit($data =null,$trxData=null){
    
$myplan = "";
if($data['plan_id'] ==1) {
  $myplan = 100;
}
if($data['plan_id'] ==2) {
  $myplan = 220;
}
if($data['plan_id'] ==3) {
  $myplan = 370;
}
  $your_commission = ($myplan / 100) * $data['balance_deposit'];
  $user_id = $data['user_id'];


$insertBalance =  array(
    'user_id'         =>$data['user_id'],
    'plan_id'         =>$data['plan_id'],
    'wallet_no'      =>$data['account_no'],
    'balance_deposit' =>$data['balance_deposit'],
    'dep_date'        =>$data['dep_date'],
    'dep_time'        =>$data['dep_time'],
    'status'          =>$data['status'],
    'wallet_id'       =>$data['e_wallet_no'],
    'operation_id'=>$data['operation_id']
);


 
    $query   =  $this->db->insert('deposit',$insertBalance);
    $last_id =  $this->db->insert_id();
     
      // $this->db->where('user_id',$trxData['user_id']);
      $this->db->where('transaction_id',$trxData['transaction_id']);      
      $queryZ  = $this->db->update('transactiont',$trxData);
     
$upline = $this->db->query('SELECT r.referer_id,u.id,u.fullname,u.user_name  FROM referals r ,db_users u
WHERE  u.id = r.user_id 
AND referer_id = "'.$data['user_id'].'"');



$m = $upline->row();
 
if($upline->num_rows() > 0){
$QK = $this->db->query('SELECT * from percentages');
$per = $QK->row();

$walletInfo = $this->db->query('
SELECT * FROM wallets 
WHERE user_id = "'.$m->id.'"
AND u_type="primary" ');

$valt = $walletInfo->row();



  $my_ref_percentage = $per->percentage;
  $referalCommission = ($my_ref_percentage / 100) * $data['balance_deposit'];
  $user_id = $data['user_id'];

    $ac_balance_db = array(
                  'account_balance' =>$referalCommission,
                  'user_id' => $m->id,
                  'status' =>'yes', 
                  'in_date' =>$data['dep_date']." ".$data['dep_time'],
                  'e_wallet_no'=>$valt->wallet_id
                );  
                $ac_balance_db['balance_id'] = $last_id; 

                $upBal = $this->db->query('SELECT * from db_account_balance where user_id="'.$m->id.'" AND e_wallet_no ="'.$valt->wallet_id.'"');
                $checkTopUp = $upBal->row();

             
                 if($upBal->num_rows() > 0){ 
                return $this->db->query('UPDATE db_account_balance SET account_balance = account_balance + "'.$referalCommission.'",
                      status="'.$data['status'].'",
                      up_date="'.$data['dep_time'].'",
                      balance_id = "'.$ac_balance_db['balance_id'].'" WHERE user_id = "'.$m->id.'"
                          AND e_wallet_no="'.$valt->wallet_id.'"
                    ');
                 
                $earned = array(
                  'amount' =>$referalCommission,
                  'user_id' => $m->id,
                  'status' =>'yes',
                  'wallet_id'=>$valt->wallet_id 
                );
    
                $inRef = array(
                  'ref_commission' =>$referalCommission,
                  'user_id' => $m->id,
                  'status' =>'yes' 
                );
              $e  =  $this->db->insert('e_balance',$earned);
              $query1s  =  $this->db->insert('ref_commission',$inRef);

                }else{
                  $query2  =  $this->db->insert('db_account_balance',$ac_balance_db);
                 
                }
                $inRef = array(
                  'ref_commission' =>$referalCommission,
                  'user_id' => $m->id,
                  'status' =>'yes' 
                );
    
                $earned = array(
                  'amount' =>$referalCommission,
                  'user_id' => $m->id,
                  'status' =>'yes',
                  'wallet_id'=>$valt->wallet_id 
                );
    $e  =  $this->db->insert('e_balance',$earned);        
    $query1  =  $this->db->insert('ref_commission',$inRef);
     
    
}


   $this->session->unset_userdata('payeerData');
   return $query;

  }
  //END NEW REF


//count referals
public function getStatic(){
  $QM = $this->db->query('SELECT *
      from user_static ');
    return $QM->row();
  }
  public function count_referals($userid){
  
  $QM = $this->db->query('SELECT count(id) as total_ref 
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

public function totalActiveRef($userid){
      $QM = $this->db->query('SELECT r.referal_username,r.user_id,d.* FROM  referals r ,deposit d
      WHERE r.referer_id = d.user_id
      AND r.user_id = "'.$userid.'"
      ORDER BY r.id DESC
      ');
    return $QM->result();
}

  public function getActiveDepositReferals($userid){

    $QM = $this->db->query('SELECT COUNT(r.user_id) AS total_ref,sum(balance_deposit) as commission 
      FROM referals r ,deposit d
      WHERE r.referer_id = d.user_id
      AND d.status="yes"
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
	

	$dataUpdate =array(
						'withdraw_amount'=>$data['account_balance'],
						'withdraw_ewallet'=>$data['e_wallet_no'],
						'user_id'=>$data['user_id'],
						'ac_deposit_id'=>$id,
						'batch_id'=>$data['batch_id'],
						'E_account_no'=>$data['E_account_no']
					);
	$this->db->insert('db_withdraw_amount',$dataUpdate);
	

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
      
}


// add_available_balance
public function add_available_balance($data){
  $r =  $this->db->insert('db_account_balance',$data);
          
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

  $QM = $this->db->query('select * from db_users where id ="'.$username.'"');
  return $QM->row();  
}

public function getUserByRefs($ref){
  $QM = $this->db->query($ref);
   return $QM->row();   
}
//add users
public function add_users($data){

  $ref = $this->session->userdata('referals');

  $data['referal_id'] = $ref['referer_id'];
  $QM = $this->db->query('select * from db_users where user_name ="'.$data['user_name'].'"');
  // $QE = $this->db->query('select * from db_users where user_email ="'.$data['user_email'].'"');  
  $mb = $QM->num_rows();
  // $mb1 = $QE->num_rows();

if($mb > 0){

  $query =  $this->db->query('update db_users set 
    user_name="'.$data['user_name'].'", 
    wallet="'.$data['wallet'].'"
   where user_name="'.$data['user_name'].'" ');
    $GetID =  $this->db->query('SELECT id,wallet FROM db_users where user_name ="'.$data['user_name'].'" '); 
    
    $row = $GetID->row();
    $user_data = array(

         'id' => $row->id,
         'user_name' => $data['user_name'],
         'payment_method'=>$row->wallet         
        );
    
    $this->session->set_userdata('userVal',$user_data);    
    return $query;
    if($query == 1){
      redirec('page=deposit');
    }
}
else{

    $query  = $this->db->insert('db_users',$data);
    $last_id = $this->db->insert_id();
    $wallet['user_id'] = $this->db->insert_id();
    $user_data = array(

         'id' => $last_id,
         'user_name' => $data['user_name'],         
         'payment_method'=>$data['wallet']
        );

    
    $this->session->set_userdata('userVal',$user_data);    
    $query = $this->db->insert('wallets',$wallet);
  
    if(!empty($this->session->userdata('referals'))){
      
      $referal_array = array(
      'referer_id'     => $last_id,
      'referal_username' => $data['user_name'],
      'user_id' => $ref['referer_id'],
      'reg_time'  => $data['reg_time'],
      'reg_date'  => $data['reg_date'],
      'status' =>'yes'    
      );
    $query  = $this->db->insert('referals',$referal_array);
      
    $this->session->unset_userdata('referals');   
    }else{ }

  return $query;
  }
}

    public function authenticate_by_verification_code($vcode) {
        $this->db->select('*');
        $this->db->from('db_users');
        $this->db->where('verification_code', $vcode);
        $Q = $this->db->get();
if($Q->num_rows() > 0){ 
            $return = $Q->row();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
    }

      public function get_member_by_email($email){
    
    $Q = $this->db->query("SELECT verification_code FROM db_users WHERE user_email = '".$email."'");
    
if( $Q->num_rows() > 0){ 
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
  		
  		
      return $query;
  	
  	}

        public function get_member_by_emaildata($email){
    
    $Q = $this->db->query("SELECT * FROM db_users WHERE user_email = '".$email."'");
    
if($this->db->count_all_results() > 0){ 
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

public function getbyEmail($email){

       $Q = $this->db->query("SELECT * FROM db_users 
                  WHERE user_email='".$email."' ");

  if($Q->num_rows() < 1){
    return 0; 
  }       
return  $Q->row(); 
}



//login user check if exist return value in session
//work to be done later
  public function authenticate_users($user_name, $user_password) {

         $Q = $this->db->query("SELECT * FROM db_users 
          WHERE user_name ='".$user_name."'
          AND user_password = '".$user_password."'");
           return $Q->row();
          }


public function authenticate_usersname($user_name) {

         $Q = $this->db->query("SELECT * FROM db_users 
          WHERE user_name ='".$user_name."'");
           return $Q->row();
          }          

    //end of user login




}