<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function index()
	{
	$userPermissionID = $this->session->userdata('userVal'); 
	if(!$this->session->userdata('userVal')){
		redirect('login');
	}
	// if($userPermissionID['id'] == 1){
	// 	redirect('admin/items/add_item');	
	// }
//		redirect('pos');		
		
	$getCountCustomer = $this->sc_model->getCountCustomer();
	$getCountSupplier = $this->sc_model->getCountSupplier();
	$getCountTotalSales=$this->sc_model->getCountTotalSales();
	$getCountTotalPurchaseDue = $this->sc_model->getCountTotalPurchaseDue();
	$payment = $getCountTotalPurchaseDue->payment;
	$paid = $getCountTotalPurchaseDue->totalpaid;
	$data['Due'] =  $payment - $paid;
	$data['totalCustomer'] = $getCountCustomer;
	$data['totalSupplier'] = $getCountSupplier;
	$data['totalSales'] = $getCountTotalSales; 
	$data['totalPurchase'] = $this->sc_model->getCountTotalPurchases();
	$data['totalExpenditure'] = $this->sc_model->getCountTotalExpenditures();	
	$data['saleDue'] = $this->sc_model->getCountTotalSaleDue();
	$data['saleCash'] = $this->sc_model->getCountTotalSaleCash();	
	$data['stockLimits'] =  $this->sc_model->getStockLimits();
	$getRecordTodaySale = $this->sc_model->getRecordTodaySale();
	$getRecordYesterdaySale = $this->sc_model->getRecordYesterdaySale();	
	$getRecordTodayCustomer = $this->sc_model->getRecordTodayCustomer();
	$getRecordyesterdayCustomer = $this->sc_model->getRecordyesterdayCustomer();	
	$getRecordTotalPaid = $this->sc_model->getRecordTotalPaid();
	$getRecordWeeklySale = $this->sc_model->getRecordWeeklySale();
	$yesterdaySaleRecieveable = $this->sc_model->getRecordyesterdaysaleRecieveable();
	$todaySaleRecieveable = $this->sc_model->getRecordTodaysaleRecieveable();
	$data['totalpaidunpaid'] = $this->sc_model->gettotalPaidUnpaid(); 
	$data['sale_refund'] = $this->sc_model->gettotalRefund();

	$data['getRepBy12'] = $this->sc_model->gettotalSaleby12();
	
	$data['getRepBy12P'] = $this->sc_model->gettotalPurchaseby12();	
	
	$data['expireProduct'] = $this->sc_model->getExpireProductsData();
	$gettotalsalebypro = $this->sc_model->gettotalSalebyproduct();
	$YesterdaySaleRecieveable = $yesterdaySaleRecieveable[0]->YesterdaySaleRecieveable;

 	$todaySaleRecieveable =$todaySaleRecieveable[0]->TodaySaleRecieveable;
 $totalSaleRecieveable = 	$todaySaleRecieveable + $YesterdaySaleRecieveable;

	$weeklyPaid = $getRecordWeeklySale[0]->weeklyPaid; 		
	$totalPaid = $getRecordTotalPaid[0]->totalPaid; 		
	$today_sale = $getRecordTodaySale[0]->total_sale_today; 
	 $yeterday_sale = $getRecordYesterdaySale[0]->total_sale_yesterday; 
	$todayCustomer = $getRecordTodayCustomer[0]->today_customers; 
	$yeterdayCustomer = $getRecordyesterdayCustomer[0]->yesterday_customers; 
	$data['gettotalsalebypro'] = $gettotalsalebypro;
	$totalCustomer =  $todayCustomer + $yeterdayCustomer;
	$totalSales =  $today_sale + $yeterday_sale;	
	$data['calculation'] = array('todayCustomer' => $todayCustomer, 'yeterdayCustomer' => $yeterdayCustomer, 'today_sale' => $today_sale, 'yeterday_sale' => $yeterday_sale,'totalCustomer' =>$totalCustomer, 'totalSales' => $totalSales ,'totalPaid'=> $totalPaid ,'weeklyPaid'=>$weeklyPaid,'YesterdaySaleRecieveable'=>$YesterdaySaleRecieveable,'todaySaleRecieveable'=>$todaySaleRecieveable,'totalSaleRecieveable' => $totalSaleRecieveable);


		 $path = $this->extra_lib->path."/new_index.php";
 		 	$data['title'] = "Admin panel - Home Dashboards";
		$this->load->view($path,$data);
	}

}
