<?php 
$users =  $this->session->userdata('userVal'); 
if(!empty($users)){}else{
  redirect('login');
}
?>
<!DOCTYPE html>
<!-- saved from url=(0032)<?php echo base_url(); ?>a=account -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Minarybit LTD | Investment And Earn 12% ~ 17% Daily Profit For LifeTime</title>
    <!-- Useful meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/favicons/favicon.png">

    <link rel="stylesheet" href="<?php echo base_url(); ?>binary/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>binary/css/ng_responsive_tables.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>binary/css/sweetalert.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>binary/css/slick.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>binary/css/slick-theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>binary/css/animate.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>binary/css/jquery.formstyler.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>binary/css/jquery.formstyler.theme.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>binary/css/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>binary/css/jquery-ui.theme.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>binary/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>binary/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>binary/css/countrySelect.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>binary/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>binary/css/custom.css">
</head>
<body>
<div class="page-wrap">
    <div class="container" style="position: relative;">
        <div class="content-scene">
            <div class="content-scene__item"></div>
            <div class="content-scene__item"></div>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="aside-block" style="margin-top:5rem">
                    <a class="buy-link" href="<?php echo base_url(); ?>a=deposit">
                            <span class="buy-link__box">
                                <span class="buy-link-t-1">Make investment</span>
                                <span class="buy-link-t-2">Start profit earning</span>
                              </span>
                    </a>
                    <ul class="cab-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>a=account"><u class="cab-menu-icon-1"></u>My account</a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>a=deposit"><u class="cab-menu-icon-2"></u>Open deposit</a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>a=withdraw"><u class="cab-menu-icon-3"></u>Withdraw Funds</a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>a=deposit_list"><u class="cab-menu-icon-4"></u>My deposits</a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>a=earnings"><u class="cab-menu-icon-5"></u>History</a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>a=referals"><u class="cab-menu-icon-6"></u>Referral program</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-8">
                <section class="header-panel">
                    <div class="cab-logo">
                        <b style="margin-top: 55px !important;font-size: 15px;color:#a90101">CRYPTO</b><a href="<?php echo base_url(); ?>" class="">
                         <img src="<?php echo base_url(); ?>binary/images/logo2.png" style="width:120px;margin-left: -10px;" alt="">
                        </a>
                    </div>

                    <a href="<?php echo base_url(); ?>a=edit_account" class="header-link-logout">Settings

                      <!-- <img src="<?php //echo base_url('binary/images/settings.gif'); ?>" style="width: 120px;"> -->
                      
                    </style></a>
                    <a href="<?php echo base_url(); ?>logout" class="header-link-logout">Logout</a>
                    <section class="header-name">
                        <div class="header-name-avatar">
                        </div>
                        <div class="header-name-text">
                           <?php echo $users['user_name']; ?>
                        </div>

                    </section>
                </section>
                

<style>
table {
  width: 100%;
}

table td, table th {
  border: none;
  padding: 8px;
}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #e3655b;
  color: white;
}


.sbmt {
  border: none;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  border-radius:50px;
}

.sbmt {
  background-color: white; 
  color: black; 
  border: 2px solid #e3655b;
}

.sbmt:hover {
  background-color: #e3655b;
  color: white;
}

input {
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid #e3655b;
  border-radius: 4px;
}

</style>




