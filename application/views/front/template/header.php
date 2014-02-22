<header class="animatedHeader">
	
				<?php
					if ($this->session->flashdata('success')) {
							echo '<div class="span8 offset4">';
								echo "<div class='alert alert-success'>";
									echo $this->session->flashdata('success');
								echo "</div>";
							echo "</div>";
					}

					if ($this->session->flashdata('error')) {
							echo '<div class="span8 offset4">';
								echo "<div class='alert alert-error'>";
									echo $this->session->flashdata('error');
								echo "</div>";
							echo "</div>";
					}
				?>

          <div id="logo-wrapper">
            <a href="#home" class="btn btn-large cta logo"><?php echo $this->lang->line('common_site_name'); ?></a>
          </div>

          <div class="span3 pull-right header-cta">
            <a href="<?php echo base_url(); ?>launch/signup" class="signup btn transparent pull-right"><?php echo $this->lang->line('common_signup'); ?></a>
            <a href="<?php echo base_url(); ?>launch/login" class="login btn transparent pull-right"><?php echo $this->lang->line('common_login'); ?></a>
          </div>

          <nav id="main" class="span9">
            <ul>
            <?php $what_active = $this->uri->segment(2); ?>
              <li class="<?php if($what_active == '') echo 'current'; ?> hidden-tablet"><a href="<?php echo base_url(); ?>">Home</a></li>
              <!-- <li class="<?php if($what_active == 'about') echo 'current'; ?>"><a href="<?php echo base_url(); ?>home/about">About</a></li> -->
              <li class="<?php if($what_active == 'features') echo 'current'; ?>"><a href="<?php echo base_url(); ?>home/features">Features</a></li>
              <li class="<?php if($what_active == 'pricing') echo 'current'; ?>"><a href="<?php echo base_url(); ?>home/pricing">Pricing</a></li>
              <li class="<?php if($what_active == 'contact') echo 'current'; ?>"><a href="<?php echo base_url(); ?>home/contact">Contact</a></li> 
            </ul>
            
          </nav>

    </header>