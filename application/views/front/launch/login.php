<section id="about">

  <div class="container">
    <div class="row">
      <div class="span12 hero-content">
        <h1 class="text-center">Login to <span><?php echo $this->lang->line('common_site_name'); ?></span></h1>
      </div>

      <div class="feature span4">
            <h3>Sign up for a <?php echo $this->lang->line('common_site_name'); ?> account</h3>
            <p>Get a 30 Day Free Trial with each plan, so that you can try out our fantastic features.</p>
            <p>No payment details required, just enter your email address, choose a password and plan, then get started better managing your salon.</p>
      </div>

      <div class="span2">
            
      </div>

      <div class="span6">
            <div class="">
              <form id="login-form" class="user-form white-page-block" action="<?php echo base_url(); ?>launch/login_process" method="post">
                <h2>Login to your account</h2>
                
                <input type="email" name="email" class="email" placeholder="Enter your email" maxlength="320" pattern="^[a-z0-9!#$%\x26'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%\x26'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" required />
<?php if(form_error('email')) { echo form_error('email'); } ?>
             
                <input type="password" placeholder="Enter your password" class="password" title="Can contain any character. The length may vary between seven and hundred characters" maxlength="100" pattern=".{7,100}" required />
<?php if(form_error('password')) { echo form_error('password'); } ?>

                <input id="check1" type="checkbox" name="check" value="check1">
                <label class="checkbox" for="check1">Keep me logged in</label>
             
                <input type="submit" class="submit btn cta" value="Submit" />

                <div class="form-text"><a href="#">Forgot your password?</a></div>
                 
                </form>
            </div>
      </div>

    </div>
  </div>
</section>