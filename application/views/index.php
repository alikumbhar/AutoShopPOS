<!DOCTYPE html>
<html>
<head>
  <?php 
  $GetInn =  $this->session->userdata('userVal');
  if($GetInn):
    redirect('admin/dashboard');
  endif;
  ?>
  <title>AutoTalk - Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=500, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'auto_assets/';?>css/bootstrap.min.css">
  <script src="<?php echo base_url();?>/assets/js/jquery-2.2.3.min.js" type="text/javascript" charset="utf-8" ></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'auto_assets/';?>css/stylesheet.css">
  <link rel="icon" href="<?php echo base_url().'auto_assets/';?><?php echo base_url().'auto_assets/pics/'?>logo.png" type="image/x-icon"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  @font-face {


}
@font-face {
font-family: "CustomFont";
src: url("/fonts/MYRIADPRO-BOLD.OTF");
}



.imgScs{
  margin-bottom:10px; 
} 
.clear-both{ clear: both }

.footer{
  height: 40px;
  background: red;

}
.white{ 
background-image: url("<?php echo base_url().'auto_assets/pics/'?>hdsa.jpg");
  min-height: 500px;
  background-attachment: fixed;
  background-position: right: ;
  background-repeat: no-repeat;
  background-size: cover;
  margin-bottom: 0px !important;
/*  background-image: url(../hdsa.jpg);background-repeat: no-repeat;  background-size: auto; */
 }

div.transbox {
  font-family: myFirstFont;
  width: 300px;
  height: 440px;
  margin: 30px;
  background-color: black;
  border: 1px solid black;
  opacity: 0.6;
  filter: alpha(opacity=60); /* For IE8 and earlier */

}

div.transbox p {
  margin: 5%;
  font-weight: bold;
  color: #000000;
}
.layout{
  width: 100px;
  height: 40px;
  padding: 10px 10px 10px 10px;
  color: white;
}
.imgW{ width: 273px; height: 120px;  }
input{background: black;
    border: 1px solid red;
    width: 250px;
    height: 41px;
  padding: 5px 5px 5px 5px;
}
.btnD{
  background: red;
  border-color: red;
  width: 80px;
  height: 35px;
}
label{ font-weight: bold;font-size: 18px; }
form{  margin-left: 20px;}
.t-image{ width:20px;margin-top: 10px; } 
.setC{
  font-family: CustomFont;
  margin-top: 10px;
  float: right;
  color: black;
  margin-right: 102px;
  font-size: 13px;
  font-weight: bold
}
</style>
</head>
<body>
    <?php 
              
          
          ?>
  
<div class="container-fluid maindiv">
  <!-----header---->
  <div class="container-fluid maindiv2">
    <div class="row">
      <div class="col-md-3">
        <img class="logo" src="<?php echo base_url().'auto_assets/pics/'?>logo.png">
      </div>
      <div class="col-md-5"></div>
      <div class="col-md-4">
        <div class="row ">
          <div class="col-md-4"></div>
          <div class="col-md-8 anchor">

          </div>
        </div>
        <img class="autotalk imgScs" src="<?php echo base_url().'auto_assets/pics/'?>autotalk.png">
      </div>
    </div>    
  </div>
  <!-----header---->


  <div class="main-container white ">
  <div class="container">
    <div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-6"></div>
  <div class="col-md-4">
<div class="transbox">
  <div class="layout">
    <?php

     $msg = $this->session->flashdata('msg') ?>
    <img src="<?php echo base_url().'auto_assets/pics/'?>min-auto.png" class="imgW">
    <h2 style="color:white;margin-left:11px;">Welcome</h2>
<?php         if(isset($msg)){  ?>
                    <div class="row" style="margin-left: 20px;width: 200px;color:orange"><?php echo $msg; ?></div>
                  <?php
                }
  ?>
    
    <div class="row" style="padding:10px;">
<?php echo form_open('login'); ?>
        <form action="<?= base_url('login'); ?>" method="post" class="login100-form validate-form p-b-33 p-t-5">
  <div class="form-group">
    <label for="email">Email:</label>
        <input id="email" name="email" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input id="password" type="password" name="password" placeholder="Password">
  </div>




    </div>

<div class="row" style="width: 300px;">  
              <input type="submit" id="sb-btn" name="submit" value="login" class="btnD" style="float:right">
</form>
  <br>
    <a href="<?php echo base_url().'get_password'; ?>"><b style="color:white;margin-left: 10px;margin-top: 30px;margin-left: 30px;">forgot password </b></a>
</div>

  </div>
  
  </div>
  </div>
    </div>
  </div>
    

</div>

</div>
<?php //         $this->session->sess_destroy();?>  
<div class="clear-both"></div>

  <div class="main-container footer">
    <div class="col-md-2"></div>
    <div class="col-md-6"><img src="<?php echo base_url().'auto_assets/pics/'?>fb.png" class="t-image">   &nbsp&nbsp<img src="<?php echo base_url().'auto_assets/pics/'?>tw.png" class="t-image"> &nbsp&nbsp  <img src="<?php echo base_url().'auto_assets/pics/'?>in.png" class="t-image" ></div>
    <div class="col-md-4"><p class="setC">© 2019 - Techobites - All Rights Reserved Techobites.com</p></div>    
  </div>
  
</body>
</html>
<script>
  $(document).ready(function(){
$('#sb-btn').on('mouseover click', function () {
    
    var email = $('#email').val();
    var password = $('#password').val();
var url ="pos/index.php";
$.ajax({ url: url,
  type: 'post',
  data: {email:email,password:password},
  success: function(data) { 
   
  }

  });


    })
  })
</script>