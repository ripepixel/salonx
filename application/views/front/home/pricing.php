<section id="pricing" class="white padding text-center">
      <div class="container">
        <div class="row">

          <div class="span12 mbottom30">
            <h1>Pricing</h1>
            <h2>Each plan comes with a wide range of features to suit your business type.</h2>
          </div>


          <?php foreach ($plans as $plan) { 
            $featured = $plan['is_featured'] == 1 ? 'large' : '';
          ?>
          <div class="plan <?php echo $featured; ?> span4">
              <div class="plan-title">
                <h2><?php echo $plan['name']; ?><br /><span><?php echo $plan['tagline']; ?></span></h2>
                <!-- <div class="hidden-tablet hidden-ie"><input type="text" value="25" class="dial pull-right" data-thickness=".2" data-readOnly="true" data-width="75" data-height="75" data-fgColor="#f24d35"></div> -->
              </div>
              
              <ul class="plan-features">
                <?php
                foreach ($plan as $key => $value) {
                  // ignore selected keys
                  if($key == 'id' || $key == 'name' || $key =='tagline' || $key == 'is_featured' || $key == 'price') {

                  } else {
                    $class = $value > 0 ? '' : 'class="cross"';
                    $the_val = $value > 0 ? $value : '';
                    // if key begins with * then dont display value, and remove *
                    if(substr($key, 0, 1) == '*') {
                      $key = str_replace('*', '', $key);
                      echo "<li ".$class.">".ucwords(str_replace('_', ' ', $key))."</li>";
                    } else {
                      echo "<li ".$class."><strong>".$the_val."</strong> ".ucwords(str_replace('_', ' ', $key))."</li>";  
                    }
                    
                  }
                }
                ?>

                
                
                <li><strong>30 Day</strong> Free Trial</li>
              </ul>
              <div class="plan-cta">
                <p class="plan-price pull-left">&pound;<?php echo $plan['price']; ?><span>/mo</span></p>
                <p class="plan-buy pull-right"><a href="index-2.html" class="btn">Select plan</a></p>
             </div>  
            </div>

          <?php
          }
          ?>

            </div>
          </div>

          <div class="span12 mtop40">
            <p>If you would like a bespoke plan creating, please contact us.</p>
          </div>

        </div>
      </div>
    </section>