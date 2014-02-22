<nav class="navbar navbar-default navbar-static-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-top-links">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><?php echo $this->lang->line('common_site_name'); ?><div id="time"></div></a>

                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-left">
                  
					<li>
                    	<a href="#" title="Appointments">
                            <i class="fa fa-calendar fa-2x fa-fw"></i>
                        </a>
                    </li>
					<li>
                    	<a href="#" title="Clients">
                            <i class="fa fa-users fa-2x fa-fw"></i>
                        </a>
                    </li>
					<li>
                    	<a href="#" title="Sales">
                            <i class="fa fa-shopping-cart fa-2x fa-fw"></i>
                        </a>
                    </li>
										
                    <?php if($this->session->userdata('user_type') == 'manager') { ?>  
										<li>
	                  	<a href="#">
	                  			<i class="fa fa-dashboard fa-2x fa-fw"></i>
	                  	</a>
	                  </li>
										<li>
	                  	<a href="<?php echo base_url(); ?>outlets/" title="Outlets">
	                  			<i class="fa fa-building-o fa-2x fa-fw"></i>
	                  	</a>
	                  </li>
										<li class="dropdown">
	                  	<a class="dropdown-toggle" href="#" data-toggle="dropdown" title="Settings">
	                  			<i class="fa fa-cogs fa-2x fa-fw"></i>
	                  	</a>
												<ul class="dropdown-menu dropdown-user">
													<li><a href="#"><i class="fa fa-user fa-fw"></i> Treatments</a></li>
													<li><a href="#"><i class="fa fa-tags fa-fw"></i> Products</a></li>
													<li><a href="#"><i class="fa fa-truck fa-fw"></i> Suppliers</a></li>
													<li><a href="<?php echo base_url(); ?>employees/"><i class="fa fa-users fa-fw"></i> Employees</a></li>
													<li><a href="<?php echo base_url(); ?>businesses/edit"><i class="fa fa-building-o fa-fw"></i> Business</a></li>
													<li><a href="#"><i class="fa fa-cogs fa-fw"></i> Main Settings</a></li>
												</ul>
												
	                  </li>
										<?php } ?>
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user  fa-2x fa-fw"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url(); ?>launch/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

            </nav>
            <!-- /.navbar-static-top -->