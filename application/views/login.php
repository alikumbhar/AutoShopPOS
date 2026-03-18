<?php //$this->load->view('front_pages/extra/header');?> 
<style type="text/css">
  .banner_wrap_sub {
    padding-bottom: 0px;
    background: #590469 url(images/feature-bg.png) repeat center;
    font-weight: 600;
    box-shadow: 0 5px 5px #1207357a;
}
.form_wrap {
    padding: 20px 0 30px;
    width: 100%;
    float: left;
    background: #11c340 url(images/stats-bg.jpg) no-repeat center top;
}
</style>

   <div class="banner_wrap banner_left">
    <div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="banner_left inside">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h1>Member Login</h1>
					</div>	
				
					</div>		
				</div>
			</div>
		</div>
   </div>
   </div>
  
</div><!--end wrapper-->
</div><!--end wrapper2-->

<script language="javascript">
function checkform() {
  if (document.mainform.username.value=='') {
    alert("Please type your username!");
    document.mainform.username.focus();
    return false;
  }
  if (document.mainform.password.value=='') {
    alert("Please type your password!");
    document.mainform.password.focus();
    return false;
  }
  return true;
}
</script>


<div class="form_wrap">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-lg-offset-3 col-md-12 col-sm-12 col-xs-12">
		  
        <div class="form-container loginpage">  <div class="icon-container"><img src="<?php echo base_url();?>front_assets/f_images/middle1.png"></div>
<?php $msg = $this->session->flashdata('msg'); ?>
<span style="margin-left: 5px;"><?php if($msg){ echo $msg; } ?></span>
<form action="<?php echo base_url(); ?>process/login" method="post" name="mainform" onsubmit="return checkform()">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

<table cellspacing="0" cellpadding="2" border="0" width="100%"><tbody><tr>
 <td>
  <span class="user">
    <input type="hidden" 
               name="<?php echo $this->security->get_csrf_token_name();?>" 
               value="<?php echo $this->security->get_csrf_hash();?>">
     <input type="text" name="username" value="" class="inpts" size="30" autofocus="autofocus" placeholder="Username"></span></td>
</tr><tr>
 <td><span class="password"><input type="password" name="password" value="" class="inpts" size="30" placeholder="Password"></span></td>
</tr>
<tr>
 <td align="center"><input type="submit" value="Login" class="sbmt"></td>
</tr>
<tr>
  <td height="45" align="center" valign="bottom"><div class="existing_user"><a href="<?php echo base_url(); ?>get_password" >Forgot your password?</a></div></td>
              </tr>
</tbody></table>
</form>

</div>
      </div>
</div>
</div>
</div>

<?php //$this->load->view('front_pages/extra/footer');?> 