<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reports extends CI_Controller {

	public function index()
	{
		
	
		$data['SaleService'] = $this->sc_model->saleReportByService();
		$data['getSaleService'] = $this->sc_model->getSaleService();
		$data['custSale'] =  $this->sc_model->getSale();
		$data['cashinHand'] = $this->sc_model->getReportsByCashInHand();
		$data['cashinCheque'] = $this->sc_model->getReportsByCashInCheque();		
		
		$data['reports'] = $this->sc_model->getSaleReportsByLast30DAys();
		$data ['consumption'] = $this->sc_model->getStockConsumptio30days();  
		$data['saleByProduct'] = $this->sc_model->getSaleByProducts();
		$data['title']  = "All Reports";
		$data['getProByService'] = $this->sc_model->getProductByService();

		$data['title']  = "All Reports";

		$this->load->view('admin/getSaleReport30',$data);

	}

    public function sale_history(){
        $data['saleByProduct'] = $this->sc_model->getSaleByProducts();
        $data['title']  = "sales Reports";
        $this->load->view('admin/sale_history',$data);
    }   

	public function sale(){
		$data['reports'] = $this->sc_model->getSale();
		$data['title']  = "sales Reports";
		$this->load->view('admin/sale-report',$data);
	}	

	public function reports_by_last_30_days(){


		$data['reports'] = $this->sc_model->getSaleReportsByLast30DAys();
		$data['title']  = "Sales reports  By Last 30 Days";
		$this->load->view('admin/reports_by_last_30_days',$data);

	}	


	public function getStockConsumption30days(){


		$data['reports'] = $this->sc_model->getStockConsumptio30days();
		$data['title']  = "Sales reports  by Consumption of last 30 days";
		$this->load->view('admin/getStockConsumption30days',$data);

	}	

	public function getreplenishment30days(){


		$data['reports'] = $this->sc_model->getreplenishment30days();
		$data['title']  = "Sales reports  by replenishment of last 30 days";
		$this->load->view('admin/getreplenishment30days',$data);

	}	



	public function inventory_reports(){
		$data['reports'] = $this->sc_model->inventory_reports();
		$data['title'] = "inventory Reports";
		$this->load->view('admin/inventory_reports',$data);
	}

	public function insertItem(){

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
	"expire_date" 	=> strip_tags($this->input->post('expiration_date'))				
		);
$dtype = array(
	"spec" 		=> strip_tags($this->input->post('Specification'))
);
	
		$ret  = $this->sc_model->insertItem($data,$dtype);		
		if($ret){
			$red = base_url().$this->extra_lib->path."/items/add_item";
			redirect($red);		
		}
	}	
public function getRecordwithdates(){
    
     $from =$this->input->post('from');
     $to = $this->input->post('to');


$tempDate = explode('/',$from);
$tempDate1 = explode('/',$to);

$fr = $tempDate[2].'-'.$tempDate[0].'-'.$tempDate[1];
$t = $tempDate1[2].'-'.$tempDate1[0].'-'.$tempDate1[1];
     $by_report = $this->input->post('by_reports');     
    if($by_report =='by_sale'){ 
        $reports = $this->sc_model->getSaleByProducts($fr,$t);
    
        // $data['getSaleService'] = $this->sc_model->getSaleService();
        // $data['custSale'] =  $this->sc_model->getSale();
        // $data['cashinHand'] = $this->sc_model->getReportsByCashInHand();
        // $data['cashinCheque'] = $this->sc_model->getReportsByCashInCheque();
        // $data['reports'] = $this->sc_model->getSaleReportsByLast30DAys();
        // $data ['consumption'] = $this->sc_model->getStockConsumptio30days();  
        // $data['saleByProduct'] = $this->sc_model->getSaleByProducts();
        // $data['getProByService'] = $this->sc_model->getProductByService();


    ?>
    <style>
     .sorting{
        background: rgb(187, 15, 15);
    }   
    </style>
    <script type="">
        $(document).ready(function(){
                    $('#employee_id1').DataTable({
   
   dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });
    })
    </script>
 <div class="row">
 <div class="form-three widget-shadow" style="height: 90px;">
                    <h2 class="title1">Reports by Products </h2>
                    </div>

                        <?php if($reports): ?>
                        <div class="form-three widget-shadow table-responsive"> 
                        <table class="table table-bordered" id="employee_id1">
                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Date</th>
                                <th>Name Of Customers</th>
<!--                                <th>Remaining Qty</th> -->
                                <th>Items</th>
                                <th>Total Sales</th>

                                <th>Discount Offered</th>
                                <th>Final Revenue</th>                                                  
                                <th>Payment Method</th>
                                <th>Sale Agent</th>
<?php

//SELECT * FROM product_sale_invoice 
//WHERE sale_date BETWEEN (CURRENT_DATE() - INTERVAL 1 MONTH) AND CURRENT_DATE();
?>


                            </tr>
                        </thead>
                        <tbody>
                        <?php $sr=1; foreach($reports as $rep): 
                             ?>
                              <tr>
                                <td><?= $sr++; ?></td>
                                <td><?= $rep->sale_date; ?></td>
                                <td><?=   $rep->customer_name;?></td>
                                <td><?=   $rep->item_name?></td>
                                <td><?=   $rep->total;?></td>
                                <td><?php   if($rep->discount){ echo $rep->discount;}else{ echo "N/A";} ?></td>
                                <td><?=   $rep->total+ $rep->discount;?></td>       
                                <td><?=   $rep->pay_method;?></td>
                                <td><?=   $rep->sale_agent;?></td>
                            </tr>
                <?php endforeach; ?>
</tbody>


                        </table>

                        </div>                      
                    <?php endif; unset($reports)?>
</div>

<?php 
    }
    if($by_report =='by_service'){

    $reports = $this->sc_model->getSaleService($fr,$t);
    
        // $data['getSaleService'] = $this->sc_model->getSaleService();
         ?>

<script>
       $('#sale_services').DataTable({
   
   dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });

</script>         
<div class="row">
 <div class="form-three widget-shadow" style="height: 90px;">
                    <h2 class="title1">Reports by Sale Service </h2>
                    </div>

    <?php if($reports){  ?>
                        <div class="form-three widget-shadow table-responsive"> 
                        <table class="table table-bordered" id="employee_id">
                                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Date</th>
                                <th>Service Name</th>
                                <th>Total Sale </th>
                                <th>Discount Offer</th>
                                <th>Final Revenue</th>
                                <th>Payment Method</th>
                                <th>Sale Agent</th>                        
                            </tr>
                        </thead>
                        <?php $sr=1; foreach($reports as $rep): ?>
                              <tr>
                                <td><?= $sr++; ?></td>
                                <td><?= $rep->sale_date; ?></td>
                                <td><?=   $rep->service_name;?></td>                                
                                <td><?=   $rep->total;?></td>
                                <td><?=   $rep->discount?></td>
                                <td><?php echo $rep->discount +$rep->total; ?></td>
                                       
                                <td><?=   $rep->pay_method;?></td>
                                <td><?=   $rep->sale_agent;?></td>
                            </tr>

                <?php  endforeach; unset($reports); ?>



                        </table>

                        </div>                      
                    <?php } else{ echo '<p style="text-align:center">No record found</p>'; } ?>
        <!-- reports by Customer end -->      

</div>
<?php 
} //end of  sale  service
if($by_report =='by_consume'){ 

    $reports = $this->sc_model->getStockConsumptio30days($fr,$t);
?>
    <script type="">
        $(document).ready(function(){
                    $('#consumption_ids').DataTable({
   
   dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });
    })
    </script>
    <div class="row">
 <div class="form-three widget-shadow" style="height: 90px;">
                    <h2 class="title1">Reports by Consumptions </h2>
                    </div>

<?php if($reports){   ?>
                        <div class="form-three widget-shadow table-responsive"> 
                        <table class="table table-bordered" id="consumption_ids">
                                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Date</th>
                                <th>Name of the product</th>
                                <th>Opening Balance <br>  </th>
                                <th>Consumed </th>
                                <th>Remaining Balance </th>
                                                    
                            </tr>
                        </thead>
                        <?php $sr=1; foreach($reports as $rep): 
                        ?>
                              <tr>
                                <td><?= $sr++; ?></td>
                                <td><?= $rep->sale_entry_date; ?></td>
                                <td><?= $rep->product_name; ?></td>
                                <td><?=   $rep->opening_balance.' '.$rep->unit;?></td>
                                <td><?=   $rep->consumed.$rep->unit;?></td>
                               <td><?php echo    $rep->opening_balance - $rep->consumed.$rep->unit;?></td>


                            </tr>
                <?php endforeach; ?>


                        </table>

                        </div>                      
                    <?php } else{ echo '<p style="text-align:center">No record found</p>'; }  unset($reports); ?>


</div>  
    <?php }// end of sale consume
    if($by_report =='by_hand'){ 
        $reports = $this->sc_model->getReportsByCashInHand($fr,$t);
        ?>
    <script type="">
        $(document).ready(function(){
     $('#by_hands').DataTable({
   
   dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });
    })
    </script>        
<div class="row">
<div class="form-three widget-shadow" style="height: 90px;">
                    <h2 class="title1">Reports by Expenditures in hand</h2>
                    </div>
                        <div class="form-three widget-shadow table-responsive"> 
                        <table class="table table-bordered" id="by_hands">
                                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Date</th>
                                <th>Opening Balance </th>
                                <th>Expenditure amount</th>
                                <th>Closing balance</th>                    
                            </tr>
                        </thead>
                        <?php $sr=1; foreach($reports as $rep):  ?>
                              <tr>
                                <td><?= $sr++; ?></td>
                                <td><?= $rep->set_date; ?></td>
                                <td><?=   $rep->balance;?></td>
                                <td><?=   $rep->exp_amount;?></td>
                                <!-- <td><?php //   echo 'no detail'; ?></td> -->
                                <td><?=        $rep->exp_amount-$rep->balance ;?></td>

                            </tr>
                <?php endforeach; ?>


                        </table>

                        </div>                      
                    <?php   unset($reports); ?>
</div>
    <?php 
    } 
    // end of sale consume
    if($by_report =='by_cheque'){ 
        $reports = $this->sc_model->getReportsByCashInCheque($fr,$t);
        ?>
    <script type="">
        $(document).ready(function(){
     $('#by_cheques').DataTable({
   
   dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });
    })
    </script>                
<div class="row">
<div class="form-three widget-shadow" style="height: 90px;">
                    <h2 class="title1">Reports by Expenditures in Cheque</h2>
                    </div>

                        <div class="form-three widget-shadow table-responsive"> 
                        <table class="table table-bordered" id="by_cheques">
                                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Date</th>
                                <th>Opening Balance </th>
                                <th>Expenditure amount</th>
<!--                                 <th>Details of expenditure</th> -->
                                <th>Closing balance</th>                    
                            </tr>
                        </thead>
                        <?php $sr=1; foreach($reports as $rep):  ?>
                              <tr>
                                <td><?= $sr++; ?></td>
                                <td><?= $rep->set_date; ?></td>
                                <td><?=   $rep->balance;?></td>
                                <td><?=   $rep->exp_amount;?></td>
                                <!-- <td><?php //   echo 'no detail'; ?></td> -->
                                <td><?=        $rep->exp_amount-$rep->balance ;?></td>

                            </tr>
                <?php endforeach; ?>


                        </table>

                        </div>                      
                    <?php   unset($reports); ?>
</div>
    <?php 
    }   
if($by_report =='by_customer'){ 
        $reports = $this->sc_model->getSale($fr,$t);
        ?>
            <script type="">
        $(document).ready(function(){
     $('#by_customers').DataTable({
   
   dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });
    })
    </script>                
<div class="row">
<div class="form-three widget-shadow" style="height: 90px;">
                    <h2 class="title1">Reports by Customers</h2>
                    </div>
<?php if($reports){  ?>
                        <div class="form-three widget-shadow table-responsive"> 
                        <table class="table table-bordered" id="by_customers">
                                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Date</th>
                                <th>Name of Customer</th>
                                <th>CNIC </th>
                                <th>Mobile  Number</th>
                                <th>Email</th>
                                <th>Address</th>    
                                <th>Total Sale By Customer</th>                    
                            </tr>
                        </thead>
                        <?php $sr=1; foreach($reports as $rep): ?>
                              <tr>
                                <td><?= $sr++; ?></td>
                                <td><?= $rep->sale_date; ?></td>
                                <td><?=   $rep->firstname.' '.$rep->lastname;?></td>
                                <td><?=   $rep->nric?></td>
                                <td><?=   $rep->mobile?></td>
                                
                                <td><?=   $rep->email?></td>
                                <td><?=   $rep->address;?></td>       
                                <td><?=   $rep->totals;?></td>
                            </tr>
                <?php endforeach; ?>



                        </table>

                        </div>                      
                    <?php } else{ echo '<p style="text-align:center">No record found</p>'; } ?>
        <!-- reports by Customer end -->     


              
                  
                    <?php   unset($reports); ?>
</div>
    <?php 
    } 
if($by_report =='by_return'){ 
        
        ?>
<script>
       $('#sale_return').DataTable({
   
   dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });

</script>
<div class="row">
<div class="form-three widget-shadow" style="height: 90px;">
                    <h2 class="title1">Reports by Sale Return</h2>
                    </div>
<?php 

                        $return = $this->sc_model->getSaleReturn($fr,$t);
                      ?>
                        <div class="form-three widget-shadow table-responsive"> 
                        <table class="table table-bordered" id="sale_return">
                            
                            <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Date of return</th>
                                <th>Products</th>
                                <th>Refund Amount</th>
                                <th>Reason of return</th>                     
                            </tr>
                        </thead>

                        <?php if($return){ $sr=1; foreach($return as $rep): 
                            //print_r($rep); ?>
                              <tr>
                                <td><?= $sr++; ?></td>
                                <td><?= $rep->return_date; ?></td>
                                <td><?=   $rep->return_product;?></td>
                                <td><?=   $rep->refund_amount?></td>
                                <td><?=   $rep->return_notes;?></td>

                            </tr>
                <?php endforeach; ?>




                        </table>

                        </div>                      
                    <?php } else{ } ?>
        <!-- reports by Customer end -->     


              
                  
                    <?php   unset($return); ?>
</div>
    <?php 
    }           
}   
}
?>