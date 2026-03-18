<?php $this->load->view('users/libs/header'); ?>

<?php 
$users =  $this->session->userdata('userVal'); 


      $balance = $this->crypto_model->getTotalavailableBalance($users['id']);
      $allInvest = $this->crypto_model->totalinvestByUser($users['id']);      
    $earnedB = $this->crypto_model->gettotalearned($users['id']);
    $totalW = $this->crypto_model->gettotalwithdraw($users['id']);   
    ?>




                <section class="sec-header-block">
                    <div class="sec-header-block-title">
                      Dashboard
                    </div>
                    <a href="<?php echo base_url(); ?>a=deposit" class="btn-1"><u class="icon-minus"></u>Deposit</a>
                    <div class="sec-header-block-balance">
                        <div class="sec-header-block-balance-value">$
                            <span><?php if($balance->account_balance){  echo $balance->account_balance; }else{ echo "0.00"; }?></span></div>
                        <div class="sec-header-block-balance-title">
                            Account Balance
                        </div>
                    </div>
                </section>


<section class="row">
    <div class="col-lg-6">
        <div class="stat">
            <div class="stat__block">
                <div class="stat__box">
                    <div class="stat-value"><span></span>Total</div>
                    <div class="stat-i-title"></div>
                </div>
                <div class="stat__box">
                        <div class="stat-value"><span>$ </span><?php if(!empty($allInvest->totalinvest)){ ?>
                  <?php echo $allInvest->totalinvest ?>
                <?php } else{  ?> 
                  $0.00
                <?php } ?>                             </div>
                    <div class="stat-i-title"></div>
                </div>

            </div>
            <div class="stat-title">Investment</div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="stat">
            <div class="stat__block">
                <div class="stat__box">
                    <div class="stat-i-title">Total</div>
                    <div class="stat-value"><span>$ </span><?php if(!empty($totalW)){  ?>                  
                  <?php echo number_format($totalW[0]->total_withdraw,2);?>
                <?php } else{ ?>
                    <span>$0.00</span>
                  <?php } ?></div>
                </div>
                <div class="stat__box">
                    <div class="stat-i-title">Last</div>
                    <div class="stat-value"><span>$ </span>n/a
                    </div>
                </div>
            </div>
            <div class="stat-title">Withdrawal</div>

        </div>
    </div>
</section>

<section class="account-info">


    <div class="account-info-i">
        <u class="account-info-icon-3"></u>
        <dl>
            <dd><?php echo $users['user_email']; ?></dd>
            <dt>Email</dt>

        </dl>
    </div>
    <div class="account-info-i account-info-i--1">
        <u class="account-info-icon-4"></u>

        <dl>
            <dd><?php echo $users['user_name']; ?></dd>
            <dt>Username</dt>
        </dl>
    </div>


</section>

                

</div>            <!--col-xl-8-->

</div>
</div>

</div>


<?php $this->load->view('users/libs/footer'); ?>