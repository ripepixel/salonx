<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Your Employees</h3>
    </div>

    <div class="col-lg-12">
    	<div class="panel panel-default">
    		<div class="panel-heading">Employees</div>
    		<div class="panel-body">
    			<div class="row">
    				<?php
    				if($employees) { ?>
							
						<?php } else { ?>
							<div class="col-lg-6">
								<p><a href="<?php echo base_url(); ?>employees/create" class="btn btn-social btn-primary"><i class="fa fa-plus"> New Employee</i></a></p>
								<p>You have no employees to display. <a href="<?php echo base_url(); ?>employees/create">Why not create one now</a>.</p>
							</div>							
						<?php
						}
    				?>
    			</div>
    		</div>
    	</div>
    </div>

</div>