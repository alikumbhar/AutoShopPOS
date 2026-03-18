<?php
 $user = $this->session->userdata('userVal');     

      if(!$user){
redirect('/');
} ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<style type="text/css">
body{
    width:100%;
    overflow-x:hidden;
    overflow-y:hidden;
}
  .sidebar-left {
    /*overflow-y: scroll;*/
    top: 137px;
    bottom: 0;
    width: 215px;
}
.anchor{
  height: 0px !important; 
}
h1{
  width: 225px;

}
</style>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
<?php if($this->uri->segment('2') =="services"){ ?>



<?php } else{ ?>
<!--Bootstrap js file for no longer needeed cdn -->
<script src="<?php echo base_url()."/assets/js/bootstrap.min.js";?>"></script>
<!--End for the bootstrap-->
<?php  } ?>
    <aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <h1><a href="<?php echo base_url()."admin/dashboard"; ?>">Dashboard</a></h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
             

       <li class="treeview">
                <a href="<?php echo base_url().'pos_sale'; ?>">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span>POS</span>

                </a>
<!--                 <ul class="treeview-menu">
                  <li><a href="<?= base_url().'pos'; ?>"><i class="fa fa-angle-right"></i>POS</a></li>
                  <li><a href="<?php echo base_url().'admin/sales/sale_report' ?>"><i class="fa fa-angle-right"></i> Order</a></li>
                  <li><a href=""><i class="fa fa-angle-right"></i> Edit</a></li>
                  <li><a href=""><i class="fa fa-angle-right"></i> Exchange / Return</a></li>
                  <li><a href=""><i class="fa fa-angle-right"></i> Cancel</a></li>                     
                </ul> -->
              </li>
<!--         <li class="treeview">
                <a href="#">
                <i class="fa fa-users"></i>
                <span>Customers</span>

                </a>
                <ul class="treeview-menu">
                  <li><a href="<?= base_url().'admin/customers/add_customer'; ?>"><i class="fa fa-angle-right"></i> Add Customer</a></li>
                  <li><a href="<?= base_url().'admin/customers/manage_customer'; ?>"><i class="fa fa-angle-right"></i> Manage Customers</a></li>                  
                  <li><a href="<?= base_url().'admin/customers/add_customer_credit'; ?>"><i class="fa fa-angle-right"></i> Add Credit</a></li>                  
                </ul>
              </li>
 -->
<!--         <li class="treeview" id="hrm">
                <a>
                <i class="fa fa-list" aria-hidden="true"></i>
                <span>HRM</span>

                </a>
              </li> -->                            

        <li class="treeview">
                <a href="#">
                <i class="fa fa-th-large" aria-hidden="true"></i>

                <span>Products</span>

                </a>
                <ul class="treeview-menu">
                  <li><a href="<?= base_url().'admin/items/add_item'; ?>"><i class="fa fa-angle-right"></i> Add Product</a></li>
                  <li><a href="<?= base_url().'admin/suppliers/add_supplier' ?>"><i class="fa fa-angle-right"></i>  Suppliers</a></li>
                  <li><a href="<?= base_url().'admin/category/add_category' ?>"><i class="fa fa-angle-right"></i>  Category</a></li>
                                  
                  <li><a href="<?= base_url().'admin/inventory' ?>"><i class="fa fa-angle-right"></i> Inventory</a></li>                     </ul>
              </li>    
       <li class="treeview">
                <a href="#">
                <i class="fa fa-money" aria-hidden="true"></i>

                <span>Expenditures</span>

                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url().'admin/expenditure' ?>"><i class="fa fa-angle-right"></i>Add Expense</a></li>
                  <li><a href="<?php echo base_url().'admin/category/expense_category' ?>"><i class="fa fa-angle-right"></i> Add Expense Category </a></li>
                  <li><a href="<?php echo base_url().'admin/sales/sale_receiveable' ?>"><i class="fa fa-angle-right"></i> Sale Receiveable </a></li>                  
<!--                   <li><a href="<?php echo base_url().'admin/expenditure/expense_month_wise' ?>"><i class="fa fa-angle-right"></i> Expense Monthwise</a></li> -->
<!--                   <li><a href=""><i class="fa fa-angle-right"></i> Summary</a></li> -->                                       
                </ul>
              </li>              
                                      

<!--         <li class="treeview">
                <a href="<?= base_url().'admin/services'; ?>">
                <i class="fa fa-houzz" aria-hidden="true"></i>
                <span>Services</span>

                </a>
              </li> -->                            


        <li class="treeview">
                <a href="<?php echo base_url();?>admin/reports">
                <i class="fa fa-th-large" aria-hidden="true"></i>

                <span>Reports</span>

                </a>
<!--                 <ul class="treeview-menu">
                  <li><a href="<?= base_url().'admin/reports/reports_by_last_30_days'; ?>"><i class="fa fa-angle-right"></i>Sales reports  By Last 30 Days</a>
                  </li>

                  <li><a href="<?= base_url().'admin/reports/getStockConsumption30days'; ?>"><i class="fa fa-angle-right"></i>reports  by Consumption</a>
                  </li>
                  <li><a href="<?= base_url().'admin/reports/getreplenishment30days'; ?>"><i class="fa fa-angle-right"></i>reports  by replenishment</a>
                  </li>                                                      
                     </ul> -->
              </li>                            

<!--         <li class="treeview">
                <a href="#">
                <i class="fa fa-registered" aria-hidden="true"></i>
                <span>Register</span>

                </a>
                <ul class="treeview-menu">
                  <li><a href="<?= base_url().'admin/items/add_item'; ?>"><i class="fa fa-angle-right"></i> Current Register</a></li>
                  <li><a href=""><i class="fa fa-angle-right"></i> Previous Register</a></li>
                  <li><a href=""><i class="fa fa-angle-right"></i> Check Payment</a></li>
                     </ul>
              </li>                            
 -->
<!--         <li class="treeview">
                <a href="#">
                <i class="fa fa-group" aria-hidden="true"></i>
                <span>Users</span>

                </a>
                <ul class="treeview-menu"> -->
<!--                   <li><a href="<?= base_url().'admin/users'; ?>"><i class="fa fa-angle-right"></i> Add Users</a></li> -->
<!--                    <li><a href="<?= base_url().'admin/users'; ?>"><i class="fa fa-angle-right"></i> Manage Users</a></li>
                    </ul>
              </li>                        -->     


<!--         <li class="treeview">
                <a href="#">
                <i class="fa fa-bars"></i>
                <span>Reports</span>

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
              </li> -->
               <li class="treeview">
                <a href="<?php echo base_url().'admin/sales/sale_history'?>">
                <i class="fa fa-history" aria-hidden="true"></i>
                    <span>Sale History</span>
                </a>
              </li>
              
         <li class="treeview">
                <a href="#">
                <i class="fa fa-qrcode"></i>
                <span>Purchases</span>
               </a>                
                <ul class="treeview-menu">
<!--                   <li><a href="<?= base_url().'admin/sales/add_sale'; ?>"><i class="fa fa-angle-right"></i> Add Sale</a></li> -->
                  <li><a href="<?= base_url().'admin/purchases/add_purchase'; ?>"><i class="fa fa-angle-right"></i> Add purchase</a></li>
                  <li><a href="<?= base_url().'admin/purchases/view_purchase'; ?>"><i class="fa fa-angle-right"></i> Purchase list</a></li>                                    
                </ul>
              </li>    
                                      
        <li class="treeview">
                <a href="#">
                <i class="fa fa-users"></i>
                <span>Peoples</span>

                </a>
                <ul class="treeview-menu">
                  <li><a href="<?= base_url().'admin/customers/add_customer'; ?>"><i class="fa fa-angle-right"></i> Customers</a></li>
                  <li><a href="<?= base_url().'admin/suppliers/add_supplier'; ?>"><i class="fa fa-angle-right"></i> Vendors</a></li>
                  
                </ul>
              </li>              
   <li class="treeview">
                <a href="#">
                <i class="fa fa-users"></i>
                <span>Banking & Transactions</span>

                </a>
                <ul class="treeview-menu">
                  <li><a href="<?= base_url().'admin/banking/add_account'; ?>"><i class="fa fa-angle-right"></i> Bank Accounts</a></li>
                  <li><a href="<?= base_url().'admin/banking/add_deposit'; ?>"><i class="fa fa-angle-right"></i> Bank Account Deposit</a></li> 
                  <li><a href="<?= base_url().'admin/banking/add_cheque'; ?>"><i class="fa fa-angle-right"></i> Add Cheque Book</a></li>

<!--                   <li><a href="<?php  //base_url().'admin/banking/funds_transfer'; ?>"><i class="fa fa-angle-right"></i> Bank Account Transfers</a></li> -->                  <!-- 
                  <li><a href="<?php //base_url().'admin/banking/transaction'; ?>"><i class="fa fa-angle-right"></i> Transactions</a></li>                   
                       -->
                   </ul>
              </li>                       
         <li class="treeview">
                <a href="#">
                <i class="fa fa-gear"></i>
                <span>Settings</span>

                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url();?>admin/settings"><i class="fa fa-angle-right"></i> Site Setting</a></li>
                  <li><a href="<?= base_url().'admin/users'; ?>"><i class="fa fa-angle-right"></i> Users</a></li>
                  <li><a href="<?= base_url().'admin/users/add_user_role'; ?>"><i class="fa fa-angle-right"></i> User Roles</a></li>                  
                </ul>
              </li>                             
      


            </ul>
          </div>
          
      </nav>
    </aside>
        <script>
      $(document).ready(function(){
      $('#hrm').click(function(){ 
Swal.fire({
  type: 'warning',
  title: 'Wait',
  showCancelButton: false,
  showConfirmButton: false,
  text: 'The HRM is a dedicated human  resource managment module. it require seprate window and higher level security to function fully. please click on login button  to access HRM module this will open a new tab in your browser!',
  footer: '<a href="../../hrm" target="_blank"><button class="swal2-confirm swal2-styled">login</button></a>'
})

     });

      })
    </script>