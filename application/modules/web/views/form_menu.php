<div class="navbar">
  <div class="wrapper_large">
    <div class="navbar__header">
      <button aria-expanded="false" data-target="@collapse" data-toggle="collapse" type="button" class="navbar__toggle collapsed"><span class="navbar__toggle__bar"></span><span class="navbar__toggle__bar"></span><span class="navbar__toggle__bar"></span></button><a href="https://doctordong.vn/" class="navbar__logo">Doctor Cash</a>
    </div>
    <div role="collapse" class="navbar__collapse collapse">
      <ul class="navbar__nav navbar__nav-right">
        <?php 
        $active_1 = $active_2 = $active_3 = $active_4 = $active_5 = $active_6 = '';
        switch ($content) {
            case 'form_home':  
              $active_1 = 'navbar__item-active';
              $active_2 = $active_3 = $active_4 = $active_5 = $active_6 ='false';
              break;
            case 'form_about':  
              $active_2 = 'navbar__item-active'; 
              $active_1 = $active_3 = $active_4 = $active_5 = $active_6 ='false';
              break;
            case 'form_apply_for_loan':  
              $active_3 = 'navbar__item-active'; 
              $active_1 = $active_2 = $active_4 = $active_5 = $active_6 ='false';
              break;
            case 'form_loan_repayment':  
              $active_4 = 'navbar__item-active'; 
              $active_1 = $active_2 = $active_3 = $active_5 = $active_6 ='false';
              break;
            case 'form_contact_us':  
              $active_5 = 'navbar__item-active'; 
              $active_1 = $active_2 = $active_3 = $active_4 = $active_6 ='false';
              break;
            case 'form_faq':  
              $active_6 = 'navbar__item-active'; 
              $active_1 = $active_2 = $active_3 = $active_4 = $active_5 = 'false';
              break;
        }
        ?>  
        <!--  -->
        <li class="navbar__item <?php echo $active_1; ?>"><a href="<?php echo base_url().'web';?>" class="navbar__home">Trang chủ</a></li>
        <li class="navbar__item <?php echo $active_2; ?>"><a href="<?php echo base_url().'web/about'?>">Về Doctor Đồng</a></li>
        <li class="navbar__item <?php echo $active_3; ?>"><a href="<?php echo base_url().'web/apply_for_loan'?>">Tiến hành vay</a></li>
        <li class="navbar__item <?php echo $active_4; ?>"><a href="<?php echo base_url().'web/loan_repayment'?>">Thanh toán khoản vay</a></li>
        <li class="navbar__item <?php echo $active_5; ?>"><a href="<?php echo base_url().'web/contact_us'?>">Liên hệ</a></li>
        <li class="navbar__item <?php echo $active_6; ?>"><a href="<?php echo base_url().'web/faq'?>">Câu hỏi thường gặp</a></li>
        <div class="personal_account">
          <div class="navbar_acc"><a data-modal="true" role="lkMain" data-remote="true" href="/clients/auth/sign_in">Đăng ký Vay lại</a></div>
        </div>
      </ul>
    </div>
  </div>
</div>