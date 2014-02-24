<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Your Employees</h3>
    </div>

    <div class="col-lg-12">
    	<div class="panel panel-default">
    		<div class="panel-heading">Employees</div>
    		<div class="panel-body">
    			<div class="row">
						<div class="col-lg-12">
							<p><a href="<?php echo base_url(); ?>employees/create" class="btn btn-social btn-primary"><i class="fa fa-plus"> New Employee</i></a></p>
						</div>
    				<?php
    				if($employees) { ?>
    					<div class="table responsive col-lg-12">
    						<table class="table table-striped table-bordered table-hover">
    							<thead>
    								<tr>
    									<th>First Name</th>
    									<th>Last Name</th>
    									<th>Actions</th>
    								</tr>
    							</thead>
    							<tbody>
								<?php foreach($employees as $employee) {
									$emp = $this->Employee_model->getEmployeeDetails($employee['id']);
									echo "<tr>";
									echo "<td>".$emp->first_name."</td>";
									echo "<td>".$emp->surname."</td>";
									echo "<td>Edit | Delete</td>";
									echo "</tr>";
								?>
							
								<?php 
								} ?>
								</tbody>
							</table>
						</div>
						<?php 
						} else { ?>
							<div class="col-lg-6">
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
