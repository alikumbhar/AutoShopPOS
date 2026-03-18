<footer class="footer">
    <div class="main-container" style="border-top: 1px solid #e6e8ed;">
  <div class="container">
      <span style="float: left" class="sec-header-block-title">contact us</span>
      <span style="float: right " class="sec-header-block-title">support@cryptoriver.cc</span>
  </div>      
    </div>

</footer>

<script src="<?php echo base_url(); ?>binary/js/jquery.min.js.download"></script>
<script src="<?php echo base_url(); ?>binary/js/slick.min.js.download"></script>
<script src="<?php echo base_url(); ?>binary/js/moment-with-locales.min.js.download"></script>
<script src="<?php echo base_url(); ?>binary/js/moment-timezone.js.download"></script>
<script src="<?php echo base_url(); ?>binary/js/global.js.download"></script>
<script src="<?php echo base_url(); ?>binary/js/ng_responsive_tables.js.download"></script>
<script src="<?php echo base_url(); ?>binary/js/clipboard.min.js.download"></script>
<script src="<?php echo base_url(); ?>binary/js/sweetalert.min.js.download"></script>

<script src="<?php echo base_url(); ?>binary/js/jquery.waterwheelCarousel.js.download"></script>
<script src="<?php echo base_url(); ?>binary/js/TweenMax.min.js.download"></script>
<script src="<?php echo base_url(); ?>binary/js/wow.min.js.download"></script>
<script src="<?php echo base_url(); ?>binary/js/jquery.magnific-popup.min.js.download"></script>
<script src="<?php echo base_url(); ?>binary/js/jquery.formstyler.min.js.download"></script>


<script src="<?php echo base_url(); ?>binary/js/common.js.download"></script>
<script>

    $(function(){
        $('input[name="wal"]').change(function(){
            if($(this).val() == '2'){
                $('#dep_wallet option').each(function(){
                    var item = $(this);
                    var value = item.val();
                    console.log(value);
                    value = value.replace("process_", "account_")
                    item.val(value);
                });
            } else {
                $('#dep_wallet option').each(function(){
                    var item = $(this);
                    var value = item.val();
                    console.log(value);
                    value = value.replace("account_", "process_")
                    item.val(value);
                });
            }
        });
    });
</script>

</body></html>