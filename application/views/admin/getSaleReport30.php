<?php $this->load->view('admin/common/header'); 
$path = $this->extra_lib->path;
$user = $this->session->userdata('userVal');
$gP =  $this->permissions->getPermissions();

$userPermission = $gP[10]; 



if($userPermission->can_view == 'yes'){
}else{
    redirect('admin/dashboard');
}




?>
<link href="<?php echo base_url().'assets/admin/css/adminLTE.min.css';?>" rel='stylesheet' type='text/css' />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery.datatables.min.css"/>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.datatables.min.js"></script>

 <link rel="stylesheet" href="<?php echo base_url().'assets/css/new_style.css'; ?>">


<style type="text/css">
.dataTables_length{
  content: "\A" !important;

}
.sorting{
    background: rgb(187, 15, 15);
}
.modal-lg{
width: 1020px;
}
.btn-danger{
    background: #ef0c40;
}

</style>
<body class="cbp-spmenu-push">
    <div class="main-content maindiv">
    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1" >


    </div>
        <!--left-fixed -navigation-->
        

    <div class="container-fluid maindiv2">
        <div class="row">
            <div class="col-md-3">
                <img class="logo" src="<?php echo base_url().'auto_assets/';?>pics/logo.png">
            </div>
            <div class="col-md-5"></div>
            <div class="col-md-4">
                <div class="row ">
                    <div class="col-md-4"></div>
                    <div class="col-md-8 anchor">
                        <a class="a1" href="#"><i class="fa fa-user red"></i>  <?php echo $user['fullname'];?></a>
                        <a class="a1" href="<?php echo base_url().'logout'; ?>"><i class="fa fa-sign-out red"></i>  Logout</a>
                    </div>
                </div>
                <img class="autotalk imgScs"  src="<?php echo base_url().'auto_assets/';?>pics/autotalk.png">
            </div>
        </div>      
    </div>
<div class="clearfix"> </div>
<?php $this->view('admin/common/left-sidebar.php');?>
        <!-- //header-ends -->
        <!-- main content start-->

        <div id="page-wrapper">
            <div class="main-page">
                <div class="forms">
                    <?php $msg = $this->session->flashdata('msg'); ?>
                    <?php $remove = $this->session->flashdata('remove'); ?>
                    <div class="row">

            
                <div class="form-three widget-shadow">
                    <style>
                        .small-box{ margin-left: 5px;margin-right: 5px;    border-radius: 19px;position: relative;display: block;margin-bottom: 15px;box-shadow: 0 1px 1px rgba(0,0,0,0.1);height: 39px;width: auto;font-size: 15px }
                    </style>

<!-- saleReturnModal -->
<!-- ExpenditureCashInHandModal
ExpenditurecashinchequeModal -->
<!-- SaleConsumptionModal -->
<!-- SaleCustomerModal -->
 

    <div class="row">
        <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
      <script>

    $( function() {
        var dateFormat = "mm/dd/yy",
            from = $( "#from" )
                .datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 3
                })
                .on( "change", function() {
                    to.datepicker( "option", "minDate", getDate( this ) );
                }),
            to = $( "#to" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 3
            })
            .on( "change", function() {
                from.datepicker( "option", "maxDate", getDate( this ) );
            });

        function getDate( element ) {
            var date;
            try {
                date = $.datepicker.parseDate( dateFormat, element.value );
            } catch( error ) {
                date = null;
            }

            return date;
        }
    } );
    </script>

<div class="row" style="">
<div class="col-md-4">
<label for="from">Choose Report</label>
<select  class="form-control" id="by_reports_val" >
    <option value="">Select Reports</option>
    <option value="by_sale">Reports By Product Sale</option>
<!--     <option value="by_service">Reports by Service Sale</option> -->
    <option value="by_return">Reports by Sale Return</option>
    <option value="by_consume">Reports by Sale Consumptions</option>
    <option value="by_hand">Reports by Expenditure Cash in Hand</option>
    <option value="by_cheque">Reports by Expenditure Cash in Cheque</option>    
    <option value="by_customer">Reports by Customer</option>    
</select>

</div>
   
<div class="col-md-8">
<label for="from">From</label>
<input  type="text" class="form-control" id="from" name="from">

<label for="to">to</label>
<input  class="form-control" type="text" id="to" name="to">
<br>
<button class="btn btn-success btn-default" id="userinfo">Go</button>
<hr>
</div>
</div>

            <br>
           <div class="row">
            <br>


            <div class="small-box bg-red col-md-2">
                <div class="inner"> 
                    <a style="color:white" class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#categoryModal" data-backdrop="false">Reports By Product Sale</a>   
            </div>
        </div>
<!--             <div class="small-box bg-green col-md-2">
                <div class="inner">            
                    <a style="color:white" class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#serviceSale" data-backdrop="false">Reports by Service Sale</a>
            </div>
        </div> -->
           <div class="row">
            <div class="small-box bg-red col-md-2">
                <div class="inner"> 
                    <a style="color:white" class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#saleReturnModal" data-backdrop="false">Reports by Sale Return</a>   
            </div>
        </div>
            <div class="small-box bg-green col-md-2">
                <div class="inner">            
                    <a style="color:white" class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#SaleConsumptionModal" data-backdrop="false">Reports by Sale Consumption</a>
            </div>
        </div>
           <div class="row">
            <div class="small-box bg-red col-md-2">
                <div class="inner"> 
                    <a style="color:white" class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#ExpenditureCashInHandModal" data-backdrop="false">Reports by Expenditure Cash in Hand</a>   
            </div>
        </div>
            <div class="small-box bg-red col-md-2">
                <div class="inner"> 
                    <a style="color:white" class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#ExpenditurecashinchequeModal" data-backdrop="false">Reports by Expenditure Cash in Cheque</a>   
            </div>
        </div>        
            <div class="small-box bg-green col-md-2">
                <div class="inner">            
                    <a style="color:white" class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#SaleCustomerModal" data-backdrop="false">Reports by Customer</a>
            </div>
        </div>

  </div>



<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
       <!--  <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a> -->
      </div>
    </div>
  </div>
<!--   <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><b>Select Reports</b></h5><hr>
        <select class="form-control" id="get_sale" name="" >
            <option value="by_product">-  By product (Sales)</option>
            <option value="by_service">-  By service (sales)</option>
            <option value="by_return">-  By return</option>
            <option value="by_cancellation">-  By cancellation</option>
            <option value="by_expenditure">-  By expenditure</option>
            <option value="by_customer">-  By Customer </option>
            <option value="by_stock">-  By stock </option>

        </select>
      </div>
    </div>
  </div> -->
</div>

                                <div class="form-group mb-n" style="color:red">
                                    <label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp</label>
                                    
                                </div>

                        </div>

                
                    </div>

                </div>
            </div>                      
                    
                    </div>

                </div>
            </div>
        </div>

<!--        Reports by  Date modal  -->

    <div class="modal fade preview-modal" data-backdrop="false" id="dateModal"  role="dialog" aria-labelledby="preview-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-body">
<span  data-dismiss="modal" style="float: right;color:red; "><i class="fa fa-times" aria-hidden="true"></i>
</span>             
            <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-content-section">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="categoryAdded"></div>
                                        <div class="devit-card-custom">
                                        <div class="row divAdder">
                                        
                                        </div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                            
                </div>
                <div class="modal-footer info-md">
                    <button class="btn btn-danger" style="color:white" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>

<!--        Reports by  Date modal end -->


<!--     Reports By modal -->
    <div id="categoryModal" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-body">
<span  data-dismiss="modal" style="float: right;color:red; "><i class="fa fa-times" aria-hidden="true"></i>
</span>             
            <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-content-section">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="categoryAdded"></div>
                                        <div class="devit-card-custom">
                                                            <div class="row">
                    <div class="form-three widget-shadow" style="height: 90px;">
                    <h2 class="title1">Reports by Products </h2>
                    </div>

                        <?php if($reports): ?>
                        <div class="form-three widget-shadow table-responsive"> 
                        <table class="table table-bordered" id="employee_id">
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
                        <?php $sr=1; foreach($reports as $rep): 
                            //print_r($rep); ?>
                              <tr>
                                <td><?= $sr++; ?></td>
                                <td><?= $rep->sale_date; ?></td>
                                <td><?=   $rep->customer_name;?></td>
                                <td><?=   $rep->item_name?></td>
                                <td><?=   $rep->total;?></td>
                                <td><?php   if($rep->discount){ echo $rep->discount;}else{ echo "N/A";} ?></td>
                                <td><?=   (int) $rep->total + (int) $rep->discount;?></td>       
                                <td><?=   $rep->pay_method;?></td>
                                <td><?=   $rep->sale_agent;?></td>
                            </tr>
                <?php endforeach; ?>



                        </table>

                        </div>                      
                    <?php endif; ?>
                    </div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                            
                </div>
                <div class="modal-footer info-md">
                    <button class="btn btn-danger" style="color:white" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>

<!--        Reports by  modal end -->


<!--     Reports By ProductSale  modal -->
    <div id="ProductSaleModal" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-body">
<span  data-dismiss="modal" style="float: right;color:red; "><i class="fa fa-times" aria-hidden="true"></i>
</span>                    
                    
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-content-section">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="categoryAdded"></div>
                                        <div class="devit-card-custom">
                                                            <div class="row">
                    <div class="form-three widget-shadow" style="height: 90px;">
                    <h2 class="title1"><!-- Reports by consumption -->  </h2>
                    </div>

                        <?php if($saleByProduct): ?>
                        <div class="form-three widget-shadow table-responsive"> 
                        <table class="table table-bordered" id="consumption_id">
                                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Date</th>
                                <th>Product Name</th>
                                <th>Total Sale</th>
                                <th>Discount Offered</th>
                                <th>Final revenue</th>
                                <th>Sale Agent</th>                                                                

<?php

//SELECT * FROM product_sale_invoice 
//WHERE sale_date BETWEEN (CURRENT_DATE() - INTERVAL 1 MONTH) AND CURRENT_DATE();
?>


                            </tr>
                        </thead>
                        <?php $sr=1; foreach($saleByProduct as $rep): 
                        $strC = (int) $rep->discount +(int) $rep->total;
                        ?>
                              <tr>
                                <td><?= $sr++; ?></td>
                                <td><?= $rep->sale_date; ?></td>
                                <td><?=   $rep->item_name;?></td>
                                <td><?=   $rep->total;?></td>
                                <td><?=   $rep->discount;?></td>
                                <td><?php echo $strC; ; ?></td>
                                <td><?php echo $rep->sale_agent;  ?></td>
                                <td></td>                              
                            </tr>
                            <?php endforeach; ?>
                            </table>
                         </div>                      
                        <?php endif; ?>
                    </div>                                        
                </div>
            </div>
        </div>
    </div>
</div>
</div>
                                            
                </div>
                <div class="modal-footer info-md">
                    <button class="btn btn-danger" style="color:white" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>

<!--        Reports By Product sale  modal end -->













<!-- ///////////////////////////////////////////////////

    All Modals code Started

    ///////////////////////////////////////////////////

-->






<!--#####01 Second modal code added----->
<!-- This modal is for sale Return     ####saleReturnModel -->
    <div id="saleReturnModal" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-body">
<span  data-dismiss="modal" style="float: right;color:red; "><i class="fa fa-times" aria-hidden="true"></i>
</span>                    
               
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-content-section">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="categoryAdded"></div>
                                        <div class="devit-card-custom">
                                                            <div class="row">
                    <div class="form-three widget-shadow" style="height: 90px;">
                    <h2 class="title1">Reports by sale return</h2>
                    </div>

                    <!-- reports by return -->

<?php
                        $return = $this->sc_model->getSaleReturn();
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
                    <?php } else{ echo '<p style="text-align:center">No record found</p>'; } ?>
        <!-- reports by return -->       
                    </div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                            
                </div>
                <div class="modal-footer info-md">
                    <button class="btn btn-danger" style="color:white" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>

<!-- This modal is for sale Return     ####saleReturnModel  END-->




<!--#####02 Second modal code added----->





<!-- reports by Expenditure Cash in Hand     ####ExpenditureCashInHand -->
    <div id="ExpenditureCashInHandModal" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-body">
<span  data-dismiss="modal" style="float: right;color:red; "><i class="fa fa-times" aria-hidden="true"></i>
</span>                    
                    
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-content-section">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="categoryAdded"></div>
                                        <div class="devit-card-custom">
                                                            <div class="row">
                    <div class="form-three widget-shadow" style="height: 90px;">
                    <h2 class="title1">Reports by Expenditure Cash in Hand</h2>
                    </div>

<!-- reports by Expenditure Cash in Hand -->
<?php   if($cashinHand){  ?>
                        <div class="form-three widget-shadow table-responsive"> 
                        <table class="table table-bordered" id="ExpenditureChequeInHands">
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
                        <?php $sr=1; foreach($cashinHand as $rep):  ?>
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
                    <?php } else{ echo '<p style="text-align:center">No record found</p>'; } ?>
        <!-- reports by expenditure Cash in hand end -->    

                    </div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                            
                </div>
                <div class="modal-footer info-md">
                    <button class="btn btn-danger" style="color:white" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>

<!-- This modal is for sale Return     ####ExpenditureCashInHand -->


<!-- 03 ##### ThirdModel code added----->

<!-- reports by Expenditure cash in cheque     ####Expenditurecashincheque -->
    <div id="ExpenditurecashinchequeModal" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-body">
<span  data-dismiss="modal" style="float: right;color:red; "><i class="fa fa-times" aria-hidden="true"></i>
</span>                    
                    
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-content-section">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="categoryAdded"></div>
                                        <div class="devit-card-custom">
                                                            <div class="row">
                    <div class="form-three widget-shadow" style="height: 90px;">
                    <h2 class="title1">Reports by Expenditure cash in cheque</h2>
                    </div>

<!-- reports by Expenditure cash in cheque-->
<!-- reports by Expenditure cash in cheque-->
<?php if($cashinCheque){    ?>
                        <div class="form-three widget-shadow table-responsive"> 
                        <table class="table table-bordered" id="ExpenditureCashInHands">
                                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Date</th>
                                <th>Opening Balance </th>
<!--                                 <th>Cheque Number</th> -->
                                <th>Expenditure</th>
<!--                                 <th>Details of Expenditure</th> -->
                                <th>Closing balance</th>                    
                            </tr>
                        </thead>
                        <?php $sr=1; foreach($cashinCheque as $rep): ?>
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
                    <?php }else{ echo '<p style="text-align:center">No record found</p>'; } ?>
                            <!-- reports by expenditure cash in checque end --> 
       

                    </div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                            
                </div>
                <div class="modal-footer info-md">
                    <button class="btn btn-danger" style="color:white" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>

<!-- This modal is for Expenditure cash in cheque     ####Expenditurecashincheque -->

<!-- 04 ##### ThirdModel code added----->




<!-- reports by SaleConsumption     ####SaleConsumption -->
    <div id="SaleConsumptionModal" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-body">
<span  data-dismiss="modal" style="float: right;color:red; "><i class="fa fa-times" aria-hidden="true"></i>
</span>                    
                    
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-content-section">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="categoryAdded"></div>
                                        <div class="devit-card-custom">
                                                            <div class="row">
                    <div class="form-three widget-shadow" style="height: 90px;">
                    <h2 class="title1"> Reports by Stock (Consumption) </h2>
                    </div>

<?php if($consumption):  ?>
                        <div class="form-three widget-shadow table-responsive"> 
                        <table class="table table-bordered" id="sale_consumption">
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
                        <?php $sr=1; foreach($consumption as $rep): 
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
                    <?php endif; ?>
       <!-- reports by Consumption -->    

                    </div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                            
                </div>
                <div class="modal-footer info-md">
                    <button class="btn btn-danger" style="color:white" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>

<!-- This modal is for SaleConsumption     ####SaleConsumption -->





<!-- 05 ##### fifthModal code added----->

<!-- reports by SaleCustomer     ####SaleCustomer -->
    <div id="SaleCustomerModal" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-body">
<span  data-dismiss="modal" style="float: right;color:red; "><i class="fa fa-times" aria-hidden="true"></i>
</span>                    
                    
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-content-section">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="categoryAdded"></div>
                                        <div class="devit-card-custom">
                                                            <div class="row">
                    <div class="form-three widget-shadow" style="height: 90px;">
                    <h2 class="title1"><!-- Sale Reports by last 30 days --></h2>
                    </div>

        <!-- reports by Customer -->
<?php if($custSale){  ?>
                        <div class="form-three widget-shadow table-responsive"> 
                        <table class="table table-bordered" id="by_customer">
                                        <thead>
                            <tr>
                                <th>Sr</th>
                                
                                <th>Name of Customer</th>
                                <th>CNIC </th>
                                <th>Mobile  Number</th>
                                <th>Email</th>
                                <th>Address</th>    
                                <th>Total Sale By Customer</th>                    
                            </tr>
                        </thead>
                        <?php $sr=1; foreach($custSale as $rep): ?>
                              <tr>
                                <td><?= $sr++; ?></td>
                               
                                <td><?=   $rep->firstname.' '.$rep->lastname;?></td>
                                <td><?php  if($rep->nric){ echo $rep->nric; } else { echo "N/A";} ?></td>
                                <td><?php   if($rep->mobile){ echo $rep->mobile; }else { echo "N/A"; }?></td>
                                
                                <td><?php   if($rep->email){ echo $rep->email; } else { echo "N/A"; }?></td>
                                <td><?=   $rep->address;?></td>       
                                <td><?php echo   $rep->totals;?></td>
                            </tr>
                <?php endforeach; ?>



                        </table>

                        </div>                      
                    <?php } else{ echo '<p style="text-align:center">No record found</p>'; } ?>
        <!-- reports by Customer end -->      


                    </div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                            
                </div>
                <div class="modal-footer info-md">
                    <button class="btn btn-danger" style="color:white" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>

<!-- This modal is for Customer     ####SaleCustomer -->


<!-- 06 ##### fifthModal code added----->

<!-- reports by sale Services     ####sale Services -->
    <div id="serviceSale" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-body">
<span  data-dismiss="modal" style="float: right;color:red; "><i class="fa fa-times" aria-hidden="true"></i>
</span>                    
                    
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-content-section">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="categoryAdded"></div>
                                        <div class="devit-card-custom">
                                                            <div class="row">
                    <div class="form-three widget-shadow" style="height: 90px;">
                    <h2 class="title1">Reports  By Sale Services</h2>
                    </div>

        <!-- reports by sale Services -->
<?php if($SaleService){  ?>
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
                        <?php $sr=1; foreach($SaleService as $rep): ?>
                              <tr>
                                <td><?= $sr++; ?></td>
                                <td><?= $rep->sale_date; ?></td>
                                <td><?=   $rep->service_name;?></td>                                
                                <td><?=   $rep->total;?></td>
                                <td><?=   $rep->discount?></td>
                                <td><?php echo (int) $rep->discount  + (int) $rep->total; ?></td>
                                       
                                <td><?=   $rep->pay_method;?></td>
                                <td><?=   $rep->sale_agent;?></td>
                            </tr>

                <?php  endforeach; unset($SaleService); ?>



                        </table>

                        </div>                      
                    <?php } else{ echo '<p style="text-align:center">No record found</p>'; } ?>
        <!-- reports by Customer end -->      


                    </div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                            
                </div>
                <div class="modal-footer info-md">
                    <button class="btn btn-danger" style="color:white" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>

<!-- This modal is for Customer     ####SaleCustomer -->


<!-- 
Call Modal with these id's
__________________________
saleReturnModal
ExpenditureCashInHandModal
ExpenditurecashinchequeModal
SaleConsumptionModal
SaleCustomerModal 
___________________________
-->










<!-- ///////////////////////////////////////////////////

    All Modals code End

    ///////////////////////////////////////////////////

-->








        <!--footer-->
        <div class="footer" style="margin-left: 116px;">
           <p>  <?= $this->footer->getSettingFooter();?>
            </p>
       </div>
        <!--//footer-->
    </div>
    
    
        <script src='<?php echo base_url()."assets/admin/js/"?>SidebarNav.min.js' type='text/javascript'></script>
    <script>
      $('.sidebar-menu').SidebarNav()
    </script>
    <!-- //side nav js -->
    
    <!-- Classie --><!-- for toggle left push menu script -->
        <script src="<?php echo base_url()."assets/admin/js/"?>classie.js"></script>
        <script>

 $(document).ready(function(){
          // getting modal data with dates
                 $('#userinfo').click(function(){
                  var from     = $('#from').val()
                   var to       = $('#to').val()
                var report_get = $('#by_reports_val').val();
                 if(report_get ==''){
                    alert('please select reports  to get the result');
                    $('#by_reports_val').css('border-color','red');
                    return false;
                }

                if(from ==''){

                    alert('please select date  from the calander');
                    $('#by_reports_val').css('border-color','black');
                    $('#from').css('border-color','red');
                    return false;
                }
                if(to ==''){
                    alert('please select TO date  from the calander');
                    $('#by_reports_val').css('border-color','black');
                    $('#from').css('border-color','black');
                    $('#to').css('border-color','red');                                        
                    return false;
                }else{
                    $('#to').css('border-color','black');
                }

                    $.ajax({
                        url: '<?php echo base_url();?>admin/reports/getRecordwithdates',
                        type: 'post',
                        data: {from: from,to:to,by_reports:report_get},
                        success: function(response){ 
                            // Add response in Modal body
                            $('.divAdder').html(response); 

                            // Display Modal
                            $('#dateModal').modal('show'); 
                        }
                    });
                });

                 //end of getting modal with dates


$("#get_sale").change(function(){
    var Rep = $("#get_sale").val();
    var $modal = $('#consumptionModal');
    if(Rep == 'by_product'){
     jQuery('#getClicka').click();

    }
    if(Rep == 'by_service'){
     jQuery('#getClickaPro').click();

    }
})


  
 });
  $('#employee_id').DataTable({
   
   dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });

       $('#sale_return').DataTable({
   
   dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });


   $('#sale_services').DataTable({
   
   dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });



      $('#sale_consumption').DataTable({
   
   dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });


$('#ExpenditureCashInHands').DataTable({
dom: 'lBfrtip',
buttons: [
'excel', 'csv', 'pdf'
],
"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
});

$('#ExpenditureChequeInHands').DataTable({
dom: 'lBfrtip',
buttons: [
'excel', 'csv', 'pdf'
],
"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
});
  

  $('#by_customer').DataTable({
dom: 'lBfrtip',
buttons: [
'excel', 'csv', 'pdf'
],
"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
});
 
            
            var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
                showLeftPush = document.getElementById( 'showLeftPush' ),
                body = document.body;
                
            showLeftPush.onclick = function() {
                classie.toggle( this, 'active' );
                classie.toggle( body, 'cbp-spmenu-push-toright' );
                classie.toggle( menuLeft, 'cbp-spmenu-open' );
                disableOther( 'showLeftPush' );
            };
            
            function disableOther( button ) {
                if( button !== 'showLeftPush' ) {
                    classie.toggle( showLeftPush, 'disabled' );
                }
            }
        </script>
    <!-- //Classie --><!-- //for toggle left push menu script -->
    
    <!-- Bootstrap Core JavaScript -->


</body>
</html>