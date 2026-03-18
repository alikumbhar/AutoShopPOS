<?php
 $user = $this->session->userdata('userVal');     

      if(!$user){
redirect('/');
} ?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>


    <aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" style="color:#03a9f4" href="#"><span class="fa fa-area-chart"></span> AutoManic<span class="dashboard_text">Workshop</span></a></h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li class="treeview">
                <a href="<?php echo base_url()."admin/dashboard"; ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>

       <li class="treeview">
                <a href="#">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                <span>Sales</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?= base_url().'admin/items/add_item'; ?>"><i class="fa fa-angle-right"></i> New Sale</a></li>
                  <li><a href=""><i class="fa fa-angle-right"></i> Order</a></li>
                  <li><a href=""><i class="fa fa-angle-right"></i> Edit</a></li>
                  <li><a href=""><i class="fa fa-angle-right"></i> Exchange / Return</a></li>
                  <li><a href=""><i class="fa fa-angle-right"></i> Cancel</a></li>                     
                </ul>
              </li>
        <li class="treeview">
                <a href="#">
                <i class="fa fa-th-large" aria-hidden="true"></i>

                <span>Products</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?= base_url().'admin/items/add_item'; ?>"><i class="fa fa-angle-right"></i> Add Product</a></li>
                  <li><a href=""><i class="fa fa-angle-right"></i> Stock Tansaction</a></li>
                  <li><a href=""><i class="fa fa-angle-right"></i> Suppliers</a></li>
                  <li><a href=""><i class="fa fa-angle-right"></i> Expire Date</a></li>
                  <li><a href=""><i class="fa fa-angle-right"></i> Inventory</a></li>                     </ul>
              </li>                            
        <li class="treeview">
                <a href="#">
                <i class="fa fa-users"></i>
                <span>Customers</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?= base_url().'admin/category/add_category'; ?>"><i class="fa fa-angle-right"></i> Add Customer</a></li>
                  <li><a href="<?= base_url().'admin/category/add_category'; ?>"><i class="fa fa-angle-right"></i> Edit Customer</a></li>                  
                  <li><a href="<?= base_url().'admin/items/add_item'; ?>"><i class="fa fa-angle-right"></i> Add Credit</a></li>                  
                </ul>
              </li>
<!--         <li class="treeview">
                <a href="#">
                <i class="fa fa-sort-amount-asc"></i>
                <span>Inventory</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php  // echo base_url().'admin/category/add_category'; ?>"><i class="fa fa-angle-right"></i> Add Category</a></li>

                </ul>
              </li> 
            -->
        <li class="treeview">
                <a href="#">
                <i class="fa fa-bars"></i>
                <span>Reports</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?= base_url().'admin/reports/sale'; ?>"><i class="fa fa-angle-right"></i> Payment Methods Report</a></li>
                  <li><a href="<?= base_url().'admin/reports/inventory_reports'; ?>"><i class="fa fa-angle-right"></i> Tansactions Reports</a></li>
                  <li><a href="<?= base_url().'admin/reports/sale'; ?>"><i class="fa fa-angle-right"></i>Top Sales</a></li>
                  <li><a href="<?= base_url().'admin/reports/inventory_reports'; ?>"><i class="fa fa-angle-right"></i> Sales Analytics</a></li>
                  <li><a href="<?= base_url().'admin/reports/sale'; ?>"><i class="fa fa-angle-right"></i> Sales Brief</a></li>
                  <li><a href="<?= base_url().'admin/reports/inventory_reports'; ?>"><i class="fa fa-angle-right"></i> Comission By Sales Person</a></li>
                  <li><a href="<?= base_url().'admin/reports/sale'; ?>"><i class="fa fa-angle-right"></i> Peak Hours</a></li>
                  <li><a href="<?= base_url().'admin/reports/inventory_reports'; ?>"><i class="fa fa-angle-right"></i> By Category & Products</a></li>                                  
                  <li><a href="<?= base_url().'admin/reports/sale'; ?>"><i class="fa fa-angle-right"></i> Sales By Brand</a></li>
                  <li><a href="<?= base_url().'admin/reports/inventory_reports'; ?>"><i class="fa fa-angle-right"></i>Customers & Category</a></li>
                  <li><a href="<?= base_url().'admin/reports/sale'; ?>"><i class="fa fa-angle-right"></i> Sales By Bundle</a></li>
                  <li><a href="<?= base_url().'admin/reports/inventory_reports'; ?>"><i class="fa fa-angle-right"></i> Sales By Tax</a></li>  
                </ul>
              </li>
       
        <li class="treeview">
                <a href="#">
                <i class="fa fa-qrcode"></i>
                <span>Generate Sale/purchase</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?= base_url().'admin/sales/add_sale'; ?>"><i class="fa fa-angle-right"></i> Add Sale</a></li>
                  <li><a href="<?= base_url().'admin/purchases/add_purchase'; ?>"><i class="fa fa-angle-right"></i> Add purchase</a></li>                  
                </ul>
              </li>    
                                      
        <li class="treeview">
                <a href="#">
                <i class="fa fa-users"></i>
                <span>Peoples</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?= base_url().'admin/Customers/add_customer'; ?>"><i class="fa fa-angle-right"></i> Customers</a></li>
                  <li><a href="<?= base_url().'admin/suppliers/add_supplier'; ?>"><i class="fa fa-angle-right"></i> Vendors</a></li>
                  
                </ul>
              </li>              
   <li class="treeview">
                <a href="#">
                <i class="fa fa-users"></i>
                <span>Banking & Transactions</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?= base_url().'admin/banking/add_account'; ?>"><i class="fa fa-angle-right"></i> Bank Accounts</a></li>
                  <li><a href="<?= base_url().'admin/banking/add_deposit'; ?>"><i class="fa fa-angle-right"></i> Bank Account Deposit</a></li>
<!--                   <li><a href="<?php  //base_url().'admin/banking/funds_transfer'; ?>"><i class="fa fa-angle-right"></i> Bank Account Transfers</a></li> -->                  <!-- 
                  <li><a href="<?php //base_url().'admin/banking/transaction'; ?>"><i class="fa fa-angle-right"></i> Transactions</a></li> -->                  
                </ul>
              </li>                            
        <li class="treeview">
                <a href="#">
                <i class="fa fa-gear"></i>
                <span>Settings</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-angle-right"></i> Site Setting</a></li>
                  <li><a href="<?= base_url().'admin/users'; ?>"><i class="fa fa-angle-right"></i> Users</a></li>
                  <li><a href="<?= base_url().'admin/settings/add_bank'; ?>"><i class="fa fa-angle-right"></i> Add Bank</a></li>
                  <li><a href="<?= base_url().'admin/settings/add_cheque'; ?>"><i class="fa fa-angle-right"></i> Add Cheque Book</a></li>                                                      
                </ul>
              </li>                            
      


            </ul>
          </div>
      </nav>
    </aside>