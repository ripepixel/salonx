<section id="about">

  <div class="container">
    <div class="row">
      <div class="span12 hero-content">
        <h1 class="text-center">Contact <span><?php echo $this->lang->line('common_site_name'); ?></span></h1>
      </div>

      <div class="feature span4">
            <h3>Fancy a chat?</h3>
            <p>If you need any help or have any questions, please use the form and we will get back to you as soon as we can.</p>
            <p>Alternitively you can call us on 0161 408 3334</p>
      </div>

      <div class="span2">
            
      </div>

      <div class="span6">
            <div class="">
              <form id="login-form" class="user-form white-page-block">
                <h2>Contact Us</h2>
                <input type="text" placeholder="Enter your name" class="name" maxlength="100" required />  
                <input type="email" name="email" class="email" placeholder="Enter your email" maxlength="320" pattern="^[a-z0-9!#$%\x26'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%\x26'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" required />
             
                <input type="text" placeholder="Enter your telephone" class="telephone" maxlength="20" />

                <textarea name="message" placeholder="Your Message" required></textarea>
             
                <input type="submit" class="submit btn cta" value="Contact Us" />
 
                </form>
            </div>
      </div>

    </div>
  </div>
</section>