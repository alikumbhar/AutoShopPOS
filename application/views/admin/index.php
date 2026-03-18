<?php 
        $this->load->view('admin/common/header'); 
          $path = $this->extra_lib->path;
          $user = $this->session->userdata('userVal'); 
$userPermission = $this->session->userdata('userPermission'); 
$permission     = $this->permissions->getPermissions();
?>
<link href="<?php echo base_url().'assets/admin/css/adminLTE.min.css';?>" rel='stylesheet' type='text/css' />
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css' />

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

 <link rel="stylesheet" href="<?php echo base_url().'assets/css/new_style.css'; ?>">


  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style type="text/css">
.container{ width: 1070px; }
.btn-info{   background: #5bc0de; }
h1{ width: 220px; }
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

  <div class="container white">
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
                            <td><?php if($calculation['today_sale']): echo $calculation['today_sale'].'PKR'; endif ?></td>
                        </tr>
                        <tr>
                            <td>Yesterday</td>
                            <td><?php if($calculation['yeterday_sale']): echo $calculation['yeterday_sale'].'PKR'; endif; ?></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td><?php if($calculation['totalSales']): echo $calculation['totalSales'].'PKR'; endif; ?></td>
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
                    <h6 class="blue">CUSTOMERS</h6>
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
                    <td class="bold">PKR <?php if($calculation['totalPaid']){  echo $calculation['totalPaid']; }else { echo "0" ;} ?></td>
                    <td>Total Complete</td>
                    <td class="bold">0</td>
                </tr>
                <tr>
                    <td>Partially Paid</td>
                    <td class="bold">PKR 0</td>
                    <td>Total Partial Orders</td>
                    <td class="bold">0</td>
                </tr>
                <tr>
                    <td>Unpaid</td>
                    <td class="bold">PKR 0</td>
                    <td>Total unpaid</td>
                    <td class="bold">0</td>
                </tr>
                <tr>
                    <td>Refunds</td>
                    <td class="bold">PKR 0</td>
                    <td>Total Refunds</td>
                    <td class="bold">0</td>
                </tr>
                <tr>
                    <td>Taxes</td>
                    <td class="bold">PKR 0</td>
                    <td>Discounts</td>
                    <td class="bold">0</td>
                </tr>
            </table>
            </div>
        </div>
        <div class="col-md-5">
          
            <div class="table-responsive">
            <table class="table table-striped table-hover">
                <tr>
                    <td>Paid</td>
                    <td class="bold">PKR <?php if($calculation['weeklyPaid']){ echo $calculation['weeklyPaid']; } else{ echo " 0"; } ?></td>
                    <td>Total Complete</td>
                    <td class="bold">0</td>
                </tr>
                <tr>
                    <td>Partially Paid</td>
                    <td class="bold">PKR 0</td>
                    <td>Total Partial Orders</td>
                    <td class="bold">0</td>
                </tr>
                <tr>
                    <td>Unpaid</td>
                    <td class="bold">PKR 0</td>
                    <td>Total unpaid</td>
                    <td class="bold">0</td>
                </tr>
                <tr>
                    <td>Refunds</td>
                    <td class="bold">PKR 0</td>
                    <td>Total Refunds</td>
                    <td class="bold">0</td>
                </tr>
                <tr>
                    <td>Taxes</td>
                    <td class="bold">PKR 0</td>
                    <td>Discounts</td>
                    <td class="bold">0</td>
                </tr>
            </table>
            </div>
            <div class="col-md-1"></div>
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
        
    <!-- new added graphs chart js-->
    
    <script src="<?php echo base_url()."assets/admin/js/"?>Chart.bundle.js"></script>
    <script src="<?php echo base_url()."assets/admin/js/"?>utils.js"></script>
    
    <script>
        var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var color = Chart.helpers.color;
        var barChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: 'Dataset 1',
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ]
            }, {
                label: 'Dataset 2',
                backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ]
            }]

        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Chart.js Bar Chart'
                    }
                }
            });

        };

        document.getElementById('randomizeData').addEventListener('click', function() {
            var zero = Math.random() < 0.2 ? true : false;
            barChartData.datasets.forEach(function(dataset) {
                dataset.data = dataset.data.map(function() {
                    return zero ? 0.0 : randomScalingFactor();
                });

            });
            window.myBar.update();
        });

        var colorNames = Object.keys(window.chartColors);
        document.getElementById('addDataset').addEventListener('click', function() {
            var colorName = colorNames[barChartData.datasets.length % colorNames.length];;
            var dsColor = window.chartColors[colorName];
            var newDataset = {
                label: 'Dataset ' + barChartData.datasets.length,
                backgroundColor: color(dsColor).alpha(0.5).rgbString(),
                borderColor: dsColor,
                borderWidth: 1,
                data: []
            };

            for (var index = 0; index < barChartData.labels.length; ++index) {
                newDataset.data.push(randomScalingFactor());
            }

            barChartData.datasets.push(newDataset);
            window.myBar.update();
        });

        document.getElementById('addData').addEventListener('click', function() {
            if (barChartData.datasets.length > 0) {
                var month = MONTHS[barChartData.labels.length % MONTHS.length];
                barChartData.labels.push(month);

                for (var index = 0; index < barChartData.datasets.length; ++index) {
                    //window.myBar.addData(randomScalingFactor(), index);
                    barChartData.datasets[index].data.push(randomScalingFactor());
                }

                window.myBar.update();
            }
        });

        document.getElementById('removeDataset').addEventListener('click', function() {
            barChartData.datasets.splice(0, 1);
            window.myBar.update();
        });

        document.getElementById('removeData').addEventListener('click', function() {
            barChartData.labels.splice(-1, 1); // remove the label first

            barChartData.datasets.forEach(function(dataset, datasetIndex) {
                dataset.data.pop();
            });

            window.myBar.update();
        });
    </script>
    <!-- new added graphs chart js-->
    
    <!-- Classie --><!-- for toggle left push menu script -->
        <script src="<?php echo base_url()."assets/admin/js/"?>classie.js"></script>
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
    </script>
    <!-- //side nav js -->
    
    <!-- for index page weekly sales java script -->
    <script src="<?php echo base_url()."assets/admin/js/"?>SimpleChart.js"></script>
    <script>
        var graphdata1 = {
            linecolor: "#CCA300",
            title: "Monday",
            values: [
            { X: "6:00", Y: 10.00 },
            { X: "7:00", Y: 20.00 },
            { X: "8:00", Y: 40.00 },
            { X: "9:00", Y: 34.00 },
            { X: "10:00", Y: 40.25 },
            { X: "11:00", Y: 28.56 },
            { X: "12:00", Y: 18.57 },
            { X: "13:00", Y: 34.00 },
            { X: "14:00", Y: 40.89 },
            { X: "15:00", Y: 12.57 },
            { X: "16:00", Y: 28.24 },
            { X: "17:00", Y: 18.00 },
            { X: "18:00", Y: 34.24 },
            { X: "19:00", Y: 40.58 },
            { X: "20:00", Y: 12.54 },
            { X: "21:00", Y: 28.00 },
            { X: "22:00", Y: 18.00 },
            { X: "23:00", Y: 34.89 },
            { X: "0:00", Y: 40.26 },
            { X: "1:00", Y: 28.89 },
            { X: "2:00", Y: 18.87 },
            { X: "3:00", Y: 34.00 },
            { X: "4:00", Y: 40.00 }
            ]
        };
        var graphdata2 = {
            linecolor: "#00CC66",
            title: "Tuesday",
            values: [
              { X: "6:00", Y: 100.00 },
            { X: "7:00", Y: 120.00 },
            { X: "8:00", Y: 140.00 },
            { X: "9:00", Y: 134.00 },
            { X: "10:00", Y: 140.25 },
            { X: "11:00", Y: 128.56 },
            { X: "12:00", Y: 118.57 },
            { X: "13:00", Y: 134.00 },
            { X: "14:00", Y: 140.89 },
            { X: "15:00", Y: 112.57 },
            { X: "16:00", Y: 128.24 },
            { X: "17:00", Y: 118.00 },
            { X: "18:00", Y: 134.24 },
            { X: "19:00", Y: 140.58 },
            { X: "20:00", Y: 112.54 },
            { X: "21:00", Y: 128.00 },
            { X: "22:00", Y: 118.00 },
            { X: "23:00", Y: 134.89 },
            { X: "0:00", Y: 140.26 },
            { X: "1:00", Y: 128.89 },
            { X: "2:00", Y: 118.87 },
            { X: "3:00", Y: 134.00 },
            { X: "4:00", Y: 180.00 }
            ]
        };
        var graphdata3 = {
            linecolor: "#FF99CC",
            title: "Wednesday",
            values: [
              { X: "6:00", Y: 230.00 },
            { X: "7:00", Y: 210.00 },
            { X: "8:00", Y: 214.00 },
            { X: "9:00", Y: 234.00 },
            { X: "10:00", Y: 247.25 },
            { X: "11:00", Y: 218.56 },
            { X: "12:00", Y: 268.57 },
            { X: "13:00", Y: 274.00 },
            { X: "14:00", Y: 280.89 },
            { X: "15:00", Y: 242.57 },
            { X: "16:00", Y: 298.24 },
            { X: "17:00", Y: 208.00 },
            { X: "18:00", Y: 214.24 },
            { X: "19:00", Y: 214.58 },
            { X: "20:00", Y: 211.54 },
            { X: "21:00", Y: 248.00 },
            { X: "22:00", Y: 258.00 },
            { X: "23:00", Y: 234.89 },
            { X: "0:00", Y: 210.26 },
            { X: "1:00", Y: 248.89 },
            { X: "2:00", Y: 238.87 },
            { X: "3:00", Y: 264.00 },
            { X: "4:00", Y: 270.00 }
            ]
        };
        var graphdata4 = {
            linecolor: "Random",
            title: "Thursday",
            values: [
              { X: "6:00", Y: 300.00 },
            { X: "7:00", Y: 410.98 },
            { X: "8:00", Y: 310.00 },
            { X: "9:00", Y: 314.00 },
            { X: "10:00", Y: 310.25 },
            { X: "11:00", Y: 318.56 },
            { X: "12:00", Y: 318.57 },
            { X: "13:00", Y: 314.00 },
            { X: "14:00", Y: 310.89 },
            { X: "15:00", Y: 512.57 },
            { X: "16:00", Y: 318.24 },
            { X: "17:00", Y: 318.00 },
            { X: "18:00", Y: 314.24 },
            { X: "19:00", Y: 310.58 },
            { X: "20:00", Y: 312.54 },
            { X: "21:00", Y: 318.00 },
            { X: "22:00", Y: 318.00 },
            { X: "23:00", Y: 314.89 },
            { X: "0:00", Y: 310.26 },
            { X: "1:00", Y: 318.89 },
            { X: "2:00", Y: 518.87 },
            { X: "3:00", Y: 314.00 },
            { X: "4:00", Y: 310.00 }
            ]
        };
        var Piedata = {
            linecolor: "Random",
            title: "Profit",
            values: [
              { X: "Monday", Y: 50.00 },
            { X: "Tuesday", Y: 110.98 },
            { X: "Wednesday", Y: 70.00 },
            { X: "Thursday", Y: 204.00 },
            { X: "Friday", Y: 80.25 },
            { X: "Saturday", Y: 38.56 },
            { X: "Sunday", Y: 98.57 }
            ]
        };
        $(function () {
            $("#Bargraph").SimpleChart({
                ChartType: "Bar",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: true,
                data: [graphdata4, graphdata3, graphdata2, graphdata1],
                legendsize: "140",
                legendposition: 'bottom',
                xaxislabel: 'Hours',
                title: 'Weekly Profit',
                yaxislabel: 'Profit in $'
            });
            $("#sltchartype").on('change', function () {
                $("#Bargraph").SimpleChart('ChartType', $(this).val());
                $("#Bargraph").SimpleChart('reload', 'true');
            });
            $("#Hybridgraph").SimpleChart({
                ChartType: "Hybrid",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: true,
                data: [graphdata4],
                legendsize: "140",
                legendposition: 'bottom',
                xaxislabel: 'Hours',
                title: 'Weekly Profit',
                yaxislabel: 'Profit in $'
            });
            $("#Linegraph").SimpleChart({
                ChartType: "Line",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: false,
                data: [graphdata4, graphdata3, graphdata2, graphdata1],
                legendsize: "140",
                legendposition: 'bottom',
                xaxislabel: 'Hours',
                title: 'Weekly Profit',
                yaxislabel: 'Profit in $'
            });
            $("#Areagraph").SimpleChart({
                ChartType: "Area",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: true,
                data: [graphdata4, graphdata3, graphdata2, graphdata1],
                legendsize: "140",
                legendposition: 'bottom',
                xaxislabel: 'Hours',
                title: 'Weekly Profit',
                yaxislabel: 'Profit in $'
            });
            $("#Scatterredgraph").SimpleChart({
                ChartType: "Scattered",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: true,
                data: [graphdata4, graphdata3, graphdata2, graphdata1],
                legendsize: "140",
                legendposition: 'bottom',
                xaxislabel: 'Hours',
                title: 'Weekly Profit',
                yaxislabel: 'Profit in $'
            });
            $("#Piegraph").SimpleChart({
                ChartType: "Pie",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: true,
                showpielables: true,
                data: [Piedata],
                legendsize: "250",
                legendposition: 'right',
                xaxislabel: 'Hours',
                title: 'Weekly Profit',
                yaxislabel: 'Profit in $'
            });

            $("#Stackedbargraph").SimpleChart({
                ChartType: "Stacked",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: true,
                data: [graphdata3, graphdata2, graphdata1],
                legendsize: "140",
                legendposition: 'bottom',
                xaxislabel: 'Hours',
                title: 'Weekly Profit',
                yaxislabel: 'Profit in $'
            });

            $("#StackedHybridbargraph").SimpleChart({
                ChartType: "StackedHybrid",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: true,
                data: [graphdata3, graphdata2, graphdata1],
                legendsize: "140",
                legendposition: 'bottom',
                xaxislabel: 'Hours',
                title: 'Weekly Profit',
                yaxislabel: 'Profit in $'
            });
        });

    </script>
    <!-- //for index page weekly sales java script -->
    
    
    <!-- Bootstrap Core JavaScript -->
   <script src="<?php echo base_url()."assets/admin/js/"?>bootstrap.js"> </script>
    <!-- //Bootstrap Core JavaScript -->
    
</body>
</html>