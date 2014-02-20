<nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <!-- <li>
                            <div class="user-info-wrapper">	
                                
                                <div class="user-info">
                                    <div class="user-welcome">Welcome</div>
                                    <div class="username">John <strong>Doe</strong></div>
                                </div>
                            </div>
                        </li> -->
                        
                        <?php if($this->session->userdata('user_type') == 'manager') { ?>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw fa-3x"></i> Dashboard</a>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="fullcalendar.html"><i class="fa fa-table fa-fw fa-3x"></i> Calendar</a>
                        </li>                       
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw fa-3x"></i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Flot Charts</a>
                                </li>
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-th fa-fw fa-3x"></i> Tables</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw fa-3x"></i> Forms<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="forms.html">Form Components</a>
                                </li>
                                <li>
                                    <a href="form-wizards.html">Form Wizards</a>
                                </li>
                                <li>
                                    <a href="file-uploader.html">File Uploader</a>
                                </li>
                                <li>
                                    <a href="wysiwyg.html">WYSIWYG Editor</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </nav>
            <!-- /.navbar-static-side -->