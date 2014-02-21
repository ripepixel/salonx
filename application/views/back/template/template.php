<?php $this->load->view('back/template/head'); ?>

        <div id="wrapper">
        	
            <?php $this->load->view('back/template/top-nav'); ?>

            <?php //$this->load->view('back/template/sidebar-nav'); ?>

            <div id="page-wrapper">
            <?php
					if ($this->session->flashdata('success')) {
							echo '<div class="col-md-8 col-md-offset-2">';
								echo "<div class='alert alert-success alert-dismissable'>";
								echo '<button class="close" aria-hidden="true" data-dismiss="alert" type="button">x</button>';
									echo $this->session->flashdata('success');
								echo "</div>";
							echo "</div>";
					}

					if ($this->session->flashdata('error')) {
							echo '<div class="col-md-8 col-md-offset-2">';
								echo "<div class='alert alert-danger alert-dismissable'>";
								echo '<button class="close" aria-hidden="true" data-dismiss="alert" type="button">x</button>';
									echo $this->session->flashdata('error');
								echo "</div>";
							echo "</div>";
					}

					if(isset($error_msg)) {
						echo '<div class="col-md-8 col-md-offset-2">';
							echo "<div class='alert alert-danger alert-dismissable'>";
							echo '<button class="close" aria-hidden="true" data-dismiss="alert" type="button">x</button>';
								echo $error_msg;
							echo "</div>";
						echo "</div>";
					}

					if(isset($success_msg)) {
						echo '<div class="col-md-8 col-md-offset-2">';
							echo "<div class='alert alert-success alert-dismissable'>";
							echo '<button class="close" aria-hidden="true" data-dismiss="alert" type="button">x</button>';
								echo $success_msg;
							echo "</div>";
						echo "</div>";
					}
				?>
            <?php $this->load->view($main); ?>
            </div>

        </div>
        <!-- /#wrapper -->

        <?php $this->load->view('back/template/footer'); ?>
