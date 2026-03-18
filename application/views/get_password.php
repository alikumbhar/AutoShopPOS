<!DOCTYPE html>
<html lang="en">
<head>
  <title>Automanic Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="<?= base_url()."assets/login/"?>images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url()."assets/login/"?>vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url()."assets/login/"?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url()."assets/login/"?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url()."assets/login/"?>vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?= base_url()."assets/login/"?>vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url()."assets/login/"?>vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url()."assets/login/"?>vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?= base_url()."assets/login/"?>vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url()."assets/login/"?>css/util.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url()."assets/login/"?>css/main.css">
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
    <?php $msg = $this->session->flashdata('msg'); 
    ?>
    <div class="container-login100" style="background-image: url('<?= base_url()."auto_assets/"?>pics/hdsa.jpg');">
      <div class="wrap-login100 p-t-30 p-b-50">
        <span class="login100-form-title p-b-41">
          Reset Password 
        </span>
      <?php  $msg =  $this->session->flashdata('msg'); 

      ?>      
        <form action="<?= base_url('get_password/forget'); ?>" method="post" class="login100-form validate-form p-b-33 p-t-5">
<?php if($msg){ ?>
<span style="
    margin-left: 17px;
    color: red;
    font-size: 15px;
    font-stretch: extra-condensed;
"><?= $msg; ?></span>
 <?php }?>
          <div class="wrap-input100 validate-input" data-validate = "Enter username">
            <input class="input100" type="text" name="email" placeholder="Email">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>


          <div class="container-login100-form-btn m-t-32">
            <input type="submit" name="submit" value="login" class="login100-form-btn">

          </div>

        </form>

      </div>

    </div>

  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="<?= base_url()."assets/login/"?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="<?= base_url()."assets/login/"?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="<?= base_url()."assets/login/"?>vendor/bootstrap/js/popper.js"></script>
  <script src="<?= base_url()."assets/login/"?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="<?= base_url()."assets/login/"?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="<?= base_url()."assets/login/"?>vendor/daterangepicker/moment.min.js"></script>
<!--===============================================================================================-->

<!--===============================================================================================-->
  <script src="<?= base_url()."assets/login/"?>js/main.js"></script>

</body>
</html>