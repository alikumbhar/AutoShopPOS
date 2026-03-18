<?php 
        $this->load->view('admin/common/header'); 
          $path = $this->extra_lib->path;
          $user = $this->session->userdata('userVal'); 
$userPermission = $this->session->userdata('userPermission'); 
$permission     = $this->permissions->getPermissions();

$unPaid =  $totalpaidunpaid->total - $totalpaidunpaid->paid;

$currency = $this->footer->getSettingFooter('co');
?>
<link href="<?php echo base_url().'assets/admin/css/adminLTE.min.css';?>" rel='stylesheet' type='text/css' />
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css' />

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

 <link rel="stylesheet" href="<?php echo base_url().'assets/css/new_style.css'; ?>">


  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style type="text/css">
@font-face {
  font-family: myFirstFont;
  src: url(<?php echo base_url('auto_assets/fonts/aileron_0102/Aileron-Thin.otf'); ?>);
}
.blink_me {
  animation: blinker 1s linear infinite;
color:red;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }

}

.container{ width: 1070px; }
.btn-info{   background: #5bc0de; }
.breadcrumb{
    background: rebeccapurple;
}

.fa-dashboard{
    color: white;
}
 li >a{
    color: white;
}
h1{ width: 220px; }
h2{
      font-family: myFirstFont;

}
.text-uppercase{}
.bg-dream-pink{
    background:#D81B60
}
.bg-dream-purple{
    background: #a612a6;
}
.bg-dream-maroon{
    background: #058ef2;
}
.bg-dream-green{
    background: green;
}
.fa{display:inline-block;font:normal normal normal 14px/1 FontAwesome;font-size:inherit;text-rendering:auto; }
.small-box>.inner{
    padding: 10px;
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
 <div class="clearfix"> </div>
    </div>


<?php $this->view('admin/common/left-sidebar.php');?>
        <!-- main content start-->
        <div id="page-wrapper">

            <div class="main-page">
            <!----dashboard----->
 <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li  class="breadcrumb-item active" ><span class="fa fa-dashboard"></span> <a href="#"> Home</a></li>
  </ol>
</nav>
<div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
             <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-shopping-bag" aria-hidden="true"></i>
</span>
                <div class="info-box-content">
                   <span class="text-bold text-uppercase">Total Purchase Due</span>
                   <span class="info-box-number"><?php echo $currency.' '.$Due;?> </span>
                </div>
                <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
             <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-dollar"></i></span>
                <div class="info-box-content">
                   <span class="text-bold text-uppercase">Total Sales Due</span>
                   <span class="info-box-number"><?php  echo $currency.' '.$saleDue->totalSaleDue; ?></span>
                </div>
                <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
             <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-cart-plus"></i></span>
                <div class="info-box-content">
                   <span class="text-bold text-uppercase">Total Sales Amount</span>
                   <span class="info-box-number"><?php echo $currency.' '.$saleCash->totalSaleCash; ?></span>
                </div>
                <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
             <div class="info-box">
                <span class="info-box-icon bg-red "><i class="fa fa-minus-square-o"></i></span>
                <div class="info-box-content">
                   <span class="text-bold text-uppercase">Total Expense Amount</span>
                     <span class="info-box-number"><?php echo $currency.' '.$totalExpenditure->totalExpense; ?></span>
                   
                </div>
                <!-- /.info-box-content -->
             </div>
             <!-- /.info-box -->
          </div>
          <!-- /.col -->
       </div>
  <div class="container white">
    <div class="row saletables">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-dream-pink">
            <div class="inner text-uppercase">
              <h3><?php print_r( $totalCustomer->totalCustomer ); ?></h3><p>Customers</p>
            </div>
            <div class="icon">
              <i class="fa fa-group "></i>
            </div>
             
            <a href="<?php echo base_url('admin/customers/add_customer'); ?>" class="small-box-footer text-uppercase">View <i class="fa fa-arrow-circle-right"></i>
            </a>
                      </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-dream-purple">
            <div class="inner text-uppercase">
              <h3><?php  echo $totalSupplier->totalSupplier;?></h3><p>Suppliers</p>
            </div>
            <div class="icon">
              <i class="fa fa-group "></i>
            </div>
             
            <a href="<?php echo base_url('admin/suppliers/add_supplier'); ?>" class="small-box-footer text-uppercase">View <i class="fa fa-arrow-circle-right"></i>
            </a>
                      </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-dream-maroon">
            <div class="inner text-uppercase">
              <h3><?php echo $totalPurchase->purchaseTotal; ?></h3><p>purchase invoice</p>
            </div>
            <div class="icon">
<i class="fa fa-files-o" aria-hidden="true"></i>

            </div>
             
            <a href="<?php echo base_url('admin/purchases/add_purchase'); ?>" class="small-box-footer text-uppercase">View <i class="fa fa-arrow-circle-right"></i>
            </a>
                      </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-dream-green">
            <div class="inner text-uppercase">
              <h3><?php echo $totalSales->saleTotal; ?></h3><p>sale invoice</p>
            </div>
            <div class="icon">
<i class="fa fa-files-o" aria-hidden="true"></i>
            </div>
             
            <a href="<?php echo base_url('admin/reports'); ?>" class="small-box-footer text-uppercase">View <i class="fa fa-arrow-circle-right"></i>
            </a>
                      </div>
        </div>                        
    </div>
    <div class="row saletables">
        <div class="col-md-1">
            
        </div>
        <div class="col-md-2">
            <div class="sales">
            
                <div class="icon1">
                <img class="icon1" src="<?php echo base_url().'auto_assets/';?>pics/icon1.png">
                <br>
<!--                 <a class="a2" href="#">View detail</a>
 -->                </div>
                <div class="icon1div">
                    <h6 class="orange">TOTAL SALES</h6>
                    <table class="table1">
                        <tr>
                            <td>Today  </td>
                            <td><?php if($calculation['today_sale']): echo $calculation['today_sale']; endif ?></td>
                        </tr>
                        <tr>
                            <td>Yesterday</td>
                            <td><?php if($calculation['yeterday_sale']): echo $calculation['yeterday_sale']; endif; ?></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td><?php if($calculation['totalSales']): echo $calculation['totalSales']; endif; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            
        </div>
        <div class="col-md-2">
                <div class="sales">
                <div class="icon1">
                <img class="icon1" src="<?php echo base_url().'auto_assets/';?>pics/icon2.png">
                <br>
                <!-- <a class="a2" href="#">View detail</a> -->
                </div>
                <div class="icon1div">
                    <h6 class="blue">COSTUMERS</h6>
                    <table class="table1">
                        <tr>
                            <td>Today</td>
                            <td><?php if($calculation['todayCustomer']){ echo $calculation['todayCustomer']; } else{ echo " 0"; } ?></td>
                        </tr>
                        <tr>
                            <td>Yesterday</td>
                            <td><?= $calculation['yeterdayCustomer'] ?></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td><?= $calculation['totalCustomer'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            
        </div>
        <div class="col-md-2">
                <div class="sales">
                <div class="icon1">
                <img class="icon1" src="<?php echo base_url().'auto_assets/';?>pics/icon3.png">
                <br>
                <!-- <a class="a2" href="#">View detail</a> -->
                </div>
                <div class="icon1div">
                    <h6 class="purple">RECIEVABLES</h6>
                    <?php //print_r($calculation); ?>
                    <table class="table1">
                        <tr>
                            <td>Today</td>
                            <td><?php if($calculation['todaySaleRecieveable']){ echo $calculation['todaySaleRecieveable']; } else{ echo " 0"; } ?></td>
                        </tr>
                        <tr>
                            <td>Yesterday</td>
                            <td><?php echo $calculation['YesterdaySaleRecieveable'];  ?></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td><?php echo $calculation['totalSaleRecieveable'];  ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-1">
            
        </div>
        
    </div>

<br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5">
          
            <div class="table-responsive">
            <table class="table table-hover table-striped ">
                <tr>
                    <td>Paid</td>
                    <td class="bold"> <?php if($calculation['totalPaid']){  echo $currency.' '. $calculation['totalPaid']; }else { echo "0" ;} ?></td>

                </tr>

                <tr>
                    <td>Total unpaid</td>
                    <td class="bold"><?php echo $currency.' '. $unPaid; ?></td>
                </tr>
                <tr>
                    <td>Total Refunds</td>
                    <td class="bold"><?php echo $currency.' '.$sale_refund->refund; 
                ?></td>
                </tr>

            </table>
            </div>
        </div>
  <div class="col-md-6">
          
<nav aria-label="breadcrumb" >
  <ol class="breadcrumb" style="background: rebeccapurple !important;">
    <li  class="breadcrumb-item active" ><span style="color:white" class="fa fa-calendar"></span> <span style="color:white" class="text-bold text-uppercase">Expired products list</span></li>
  </ol>
</nav>
            <div class="table-responsive">
            <table class="table table-hover table-striped " id="employee_id1">
              <thead>
                <th style="background: #bb0f0f;color:white">Product Name</th>
                <th style="background: #bb0f0f;color:white">Stock</th>
                <th style="background: #bb0f0f;color:white">Category</th>
                <th style="background: #bb0f0f;color:white" class='blink_me'>Expire items</th>
              </thead>
              <tbody>
                  <?php foreach($expireProduct as $exPr){  ?>
                  <tr>
                    <td > <?php  echo $exPr->product_name ?></td>
                    <td > <?php  echo $exPr->stock_level ?></td>
                    <td > <?php  echo $exPr->category ?></td>
                    <td > <?php  echo $exPr->expire_date ?></td>

                </tr>
<?php } ?>
</tbody>

            </table>
            </div>
        </div>        
        <div class="col-md-12">
<nav aria-label="breadcrumb" >
  <ol class="breadcrumb" style="background: red !important;">
    <li  class="breadcrumb-item active" ><span class="fa fa-warning blink_me" style="color:white"></span> <a href="<?php echo base_url('admin').'/inventory/alerts';?>"><span class="text-bold text-uppercase">Stock Alerts</span></a></li>
  </ol>
</nav>
            <div class="table-responsive">
            <table class="table table-bordered table-striped " id="employee_id">
              <thead>
                <tr>
                <th style="background: #bb0f0f;color:white">Category Name</th>
                <th style="background: #bb0f0f;color:white">Product Name</th>
                <th style="background: #bb0f0f;color:white">Stock</th>
                </tr>
              </thead>

                
                <tbody>
                <?php foreach($stockLimits as $stock):


                      ?>

                <tr>
                    <td class="bold"><?= $stock->category; ?></td>
                    <td class="bold"><?= $stock->product_name; ?></td>
                    <td class="bold blink_me"><?= $stock->stock_level; ?></td>

                </tr>

            <?php endforeach; ?>
              </tbody>
            <td><a href="<?php echo base_url('admin').'/inventory/alerts';?>">See More..</a></td>

            </table>
            </div>
            <br>
        </div>        
         



<div class="col-md-12 chart-blo-1">  
<div class="chart">
<hr>
                <canvas id="barChart" style="height: 229px; width: 700px;" height="229" width="700"></canvas>
              </div>
</div>
        <div class="col-md-12 chart-blo-1">
           
           <div class="dygno" >
                 <h2 style="text-align: center">Monthly Selling Items </h2>
<?php 
        $data = array();

        foreach($gettotalsalebypro as $saleRec): 
        $rc = '#'.rand(0,913456);
           $data[] = array('label'=>$saleRec->product_name,'value'=>$saleRec->totalSalebypro,'color'=>$rc);

endforeach;
    $data = json_encode($data);
    
                    ?>
                    <canvas id="doughnut" height="300" width="470" style="width: 470px; height: 300px;"></canvas>
                                <script>
                
                                    var doughnutData = 
                                    
                                    <?php echo $data; ?>
                                    
                                    new Chart(document.getElementById("doughnut").getContext("2d")).Doughnut(doughnutData);
                                </script>

            </div>  

         </div>                 
    </div>
</div>
                
            </div>
        </div>
    <!--footer-->
        <div class="footer" style="margin-left: 116px;">
           <p>  <?= $this->footer->getSettingFooter(); ?>
            </p>
       </div>
    <!--//footer-->
    </div>
        
    <?php 
    unset($data);
        $dataRep = array();
        $dataV = array();
    foreach($getRepBy12 as $rep12): 
        //$rc = '#'.rand(0,913456);
           $dataRep[] = $rep12->MONTH;
           $dataV[] = $rep12->TOTAL;
endforeach;

        $dataRep1 = array();
        $dataV1 = array();
    foreach($getRepBy12P as $rep12): 
        //$rc = '#'.rand(0,913456);
           $dataRep1[] = $rep12->MONTH;
           $dataV1[] = $rep12->TOTAL;
endforeach;


    $dataReps = json_encode($dataRep);
    $dataV = json_encode($dataV);

    $dataReps1 = json_encode($dataRep1);
    $dataV1 = json_encode($dataV1);

           ?>
    
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */


    //-------------
    //- BAR CHART -
    //-------------

    var barChartData = {
      labels: <?php echo $dataReps; ?>,
      datasets: [
        {
          label: "Purchases <?php echo $currency; ?>",
          fillColor: "rgb(241, 24, 24)",
          strokeColor: "rgb(241, 24, 24)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: <?php echo $dataV1; ?>
        },
        {
          label: "Sales <?php echo $currency; ?>",
          fillColor: "rgb(39, 228, 39)",
          strokeColor: "rgb(39, 228, 39)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgb(39, 228, 39)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgb(39, 228, 39)",
          data: <?php echo $dataV; ?>
        },
      ]
    };
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    // barChartData.datasets[1].fillColor = "#00a65a";
    // barChartData.datasets[1].strokeColor = "#00a65a";
    // barChartData.datasets[1].pointColor = "#00a65a";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template

      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    // barChartOptions.datasetFill = false;
    // barChart.Bar(barChartData, barChartOptions);
var ctx = document.getElementById("barChart").getContext("2d");

window.myBar = new Chart(ctx).Bar(barChartData, {
   responsive : true,
   animation: true,
   barValueSpacing : 5,
   barDatasetSpacing : 1,
   tooltipFillColor: "rgba(0,0,0,0.8)",                
   multiTooltipTemplate: "<%= datasetLabel %><%= value %>"
});
  });



         /* PIE CHART END*/
</script>

    
        <script>
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
        

    
    <!-- side nav js -->
    <script src='<?php echo base_url()."assets/admin/js/"?>SidebarNav.min.js' type='text/javascript'></script>
    <script>
      $('.sidebar-menu').SidebarNav()
      
        $(document).ready(function(){
        $('#employee_id').DataTable();
        $('#employee_id1').DataTable();        
    })
    </script>
    
    
<!--    <script src="<?php //echo base_url()."assets/admin/js/"?>bootstrap.js"> </script> -->
    <!-- //Bootstrap Core JavaScript -->
    
</body>
</html>