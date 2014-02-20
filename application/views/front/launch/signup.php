<section id="about">

  <div class="container">
    <div class="row">
      <div class="span12 hero-content">
        <h1 class="text-center">Signup to <span><?php echo $this->lang->line('common_site_name'); ?></span></h1>
      </div>

      <div class="feature span4">
            <h3>Sign up for a <?php echo $this->lang->line('common_site_name'); ?> account</h3>
            <p>Get a 30 Day Free Trial with each plan, so that you can try out our fantastic features.</p>
            <p>No payment details required, just enter your email address, choose a password and plan, then get started better managing your salon.</p>
      </div>

      <div class="span2">
            
      </div>

      <div class="span6">
            <form id="signup-form-page" class="white-page-block user-form" action="<?php echo base_url(); ?>launch/signup_process" method="post">
              <h2>Sign up for an account</h2>

              <input type="email" name="email" class="email" placeholder="Enter your email" maxlength="320" pattern="^[a-z0-9!#$%\x26'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%\x26'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" required value="<?php echo set_value('email'); ?>" />
              <?php if(form_error('email')) { echo form_error('email'); } ?>
           
              <input type="password" name="password" placeholder="Enter your password" class="password" title="Can contain any character. The length may vary between seven and hundred characters" maxlength="100" pattern=".{7,100}" required />
              <?php if(form_error('password')) { echo form_error('password'); } ?>
           
              <select name="plan">
                <option value="" selected=selected>-- Select Plan --</option>
                <?php $sel_plans = $this->Plan_model->getActivePlans(); 
                foreach ($sel_plans as $plan) { ?>
                  <option value="<?php echo $plan['id']; ?>"><?php echo $plan['name']; ?> ( &pound;<?php echo $plan['price']; ?>/mnth)</option>      
                <?php
                }
                ?>
              </select>
              <?php if(form_error('plan')) { echo form_error('plan'); } ?>
              
              <input type="submit" class="submit btn cta" value="Sign up" />

              <div class="form-text">By clicking 'Sign up' you agree to the our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.<br />
              Already have an account? <a href="<?php echo base_url(); ?>launch/login">login here</a>.</div>
               
            </form>
      </div>

    </div>
  </div>
</section>