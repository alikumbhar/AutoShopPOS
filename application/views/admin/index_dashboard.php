<!DOCTYPE html>
<html>
<head>
	<title>Auto-Talk - Home</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'auto_assets/'; ?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'auto_assets/'; ?>css/stylesheet.css">
	<link rel="icon" href="<?php echo base_url().'auto_assets/'; ?>pics/logo.png" type="image/x-icon"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
<style>
.imgScs{
	margin-bottom:10px; 
}	
</style>
</head>
<body>
<div class="container-fluid maindiv">
	<!-----header---->
	<div class="container-fluid maindiv2">
		<div class="row">
			<div class="col-md-3">
				<img class="logo" src="<?php echo base_url().'auto_assets/'; ?>pics/logo.png">
			</div>
			<div class="col-md-5"></div>
			<div class="col-md-4">
				<div class="row ">
					<div class="col-md-4"></div>
					<div class="col-md-8 anchor">
						<a class="a1" href="#"><i class="fa fa-user"></i>  Profile Name</a>
						<a class="a1" href="#"><i class="fa fa-sign-out"></i>  Log Out</a>
					</div>
				</div>
				<img class="autotalk imgScs" src="<?php echo base_url().'auto_assets/'; ?>pics/autotalk.png">
			</div>
		</div>		
	</div>
	<!-----header---->

<!----dashboard----->
<div class="container-fluid showcase" >
<div class="row dashboard" >
	<div class="col-md-12">
		<h1>Dashboard</h1>
		<ul>
			<li><i class="fa fa-file"></i> POS</li>
			<li><i class="fa fa-star"></i> Product</li>
			<li><i class="fa fa-wrench"></i> Service</li>
			<li><i class="fa fa-file"></i> Report</li>
		</ul>

		<p>Contact Information
		<br>email@mydomain.com<br>
		+92 51 2225-6632</p>

	</div>
	
</div>
<!----dashboard----->

	<div class="container white">
	<div class="row saletables">
		<div class="col-md-1">
			
		</div>
		<div class="col-md-2">
			<div class="sales">
				<div class="icon1">
				<img class="icon1" src="<?php echo base_url().'auto_assets/'; ?>pics/icon1.png">
				<br>
				<a class="a2" href="#">View detail</a>
				</div>
				<div class="icon1div">
					<h6 class="orange">TOTAL SALES</h6>
					<table class="table1">
						<tr>
							<td>Today</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Yesterday</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Total</td>
							<td>0</td>
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
				<img class="icon1" src="<?php echo base_url().'auto_assets/'; ?>pics/icon2.png">
				<br>
				<a class="a2" href="#">View detail</a>
				</div>
				<div class="icon1div">
					<h6 class="blue">COSTUMERS</h6>
					<table class="table1">
						<tr>
							<td>Today</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Yesterday</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Total</td>
							<td>0</td>
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
				<img class="icon1" src="<?php echo base_url().'auto_assets/'; ?>pics/icon3.png">
				<br>
				<a class="a2" href="#">View detail</a>
				</div>
				<div class="icon1div">
					<h6 class="purple">RECIEVABLES</h6>
					<table class="table1">
						<tr>
							<td>Today</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Yesterday</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Total</td>
							<td>0</td>
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
			<h5>Last Sales : 2019-06-03 to 2019-06-09 <i class="fa fa-retweet glyphicon-refresh"></i> </h5>
			<div class="table-responsive">
			<table class="table table-hover table-striped ">
				<tr>
					<td>Paid</td>
					<td class="bold">PKR 0</td>
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
			<h5>Week Stats : 2019-06-03 to 2019-06-09 <i class="fa fa-retweet glyphicon-refresh"></i></h5>
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
					<td>Paid</td>
					<td class="bold">PKR 0</td>
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
</body>
</html>