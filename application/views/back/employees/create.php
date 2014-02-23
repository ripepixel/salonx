<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Employees</h3>
    </div>

    <div class="col-lg-12">
    	<div class="panel panel-default">
    		<div class="panel-heading">Create New Employee</div>
    		<div class="panel-body">
    			<div class="row">
    				<div class="col-lg-6 form-group">
      				<form id="new_employee_form" action="<?php echo base_url(); ?>employees/create_employee" method="post" class="form-horizontal ui-formwizard">
							 	<fieldset class="step ui-formwizard-content" id="step1" style="display: block;">
	           <div>
	               <h3 class="margin-top-none">
	                   <span class="label label-primary">Step 1</span>
	                   Employee Login Details
	               </h3>
	           </div>
	           <div class="margin-top">
	               <div class="col-md-12">
	                   <div class="form-group">
	                       <label>Username</label>
	                       <input class="form-control ui-wizard-content" type="text" name="username" required />
	                   </div>
	                   <div class="form-group">
	                       <label>Password</label>
	                       <input class="form-control ui-wizard-content" type="password" name="password" required />
	                   </div>
	                   <div class="form-group">
	                       <label>Email</label>
	                       <input type="email" class="form-control ui-wizard-content" name="email">
	                   </div>
										<div class="form-group">
											<?php $outlets = $this->Outlet_model->getUserOutlets($this->session->userdata('user_id')); ?>
	                       <label>Outlet</label>
												<select class="form-control" name="outlet">
											<?php foreach($outlets as $outlet) { 
												$outlet_name = ($outlet['reference']) ? $outlet['reference'] : $outlet['business_name'];
											?>
												
	                       <option value="<?php echo $outlet['id']; ?>"><?php echo $outlet_name; ?></option>
											<?php } ?>
											</select>
											<p class="help-block">Choose which outlet this employee will belong to.</p>
	                   </div>
	               </div>
	           </div>
	       </fieldset>
	       <fieldset id="step2" class="step ui-formwizard-content" style="display: none;">
	           <div>
	               <h3 class="margin-top-none">
	                   <span class="label label-primary">Step 2</span>
	                   Employee Details
	               </h3>
	           </div>
	           <div class="margin-top">
	               <div class="col-md-12">
	                  <div class="form-group">
	                       <label>Gender</label>
	                       <select class="form-control" name="gender">
													<option value="Female">Female</option>
													<option value="Male">Male</option>
											</select>
	                   </div> 
										<div class="form-group">
	                       <label>Title</label>
	                       <select class="form-control" name="title">
													<option value="Miss">Miss</option>
													<option value="Mrs">Mrs</option>
													<option value="Mr">Mr</option>
													<option value="Dr">Dr</option>
													<option value="">Other</option>
											</select>
	                   </div>
										<div class="form-group">
	                       <label>First Name</label>
	                       <input class="form-control ui-wizard-content" type="text" name="first_name" disabled="disabled">
	                   </div>
										<div class="form-group">
	                       <label>Surname</label>
	                       <input class="form-control ui-wizard-content" type="text" name="surname" disabled="disabled">
	                  </div>
			              <div class="form-group">
			                  <label>Address</label>
			              		<textarea class="form-control ui-wizard-content" name="address" disabled="disabled"></textarea>
			              </div>
										<div class="form-group">
	                       <label>Date Of Birth</label>
	                       <input class="form-control ui-wizard-content" type="text" name="dob" id="dob" disabled="disabled">
	                   </div>
										<div class="form-group">
	                       <label>National Insurance</label>
	                       <input class="form-control ui-wizard-content" type="text" name="national_insurance" disabled="disabled">
	                   </div>
										<div class="form-group">
	                       <label>Telephone</label>
	                       <input class="form-control ui-wizard-content" type="text" name="telephone" disabled="disabled">
	                   </div>
										<div class="form-group">
	                       <label>Mobile</label>
	                       <input class="form-control ui-wizard-content" type="text" name="mobile" disabled="disabled">
	                   </div>
										<div class="form-group">
	                       <label>Employment Start Date</label>
	                       <input class="form-control ui-wizard-content" type="text" name="start_date" id="start_date" disabled="disabled">
	                   </div>
	               </div>
	           </div>
	       </fieldset>
					<fieldset class="step ui-formwizard-content" id="step3" style="display: block;">
      <div>
          <h3 class="margin-top-none">
              <span class="label label-primary">Step 3</span>
              Employee Work Hours
          </h3>
      </div>
      <div class="margin-top">
          <div class="col-md-12">
              <div class="row">
								<div class="form-group">
                  <div class="col-md-12">	
										<label>Monday</label>
									</div>
									<div class="col-md-4">
										<select name="monday_start" id="monday_start" class="form-control">
											<?php $this->load->view('back/employees/start_hours'); ?>
										</select>
                  	
									</div>
									<div class="col-md-1">
                  	<p class="text-center">-</p>
									</div>
									<div class="col-md-4">
                  	<select name="monday_finish" id="monday_finish" class="form-control">
											<?php $this->load->view('back/employees/finish_hours'); ?>
										</select>
									</div>
									<div class="col-md-3">
										<div class="checkbox">
											<label>
                  			<input type="checkbox" id="copy_times" /> Copy to all
											</label>
										</div>
									</div>
              	</div>
							</div>
							<div class="row">
								<div class="form-group">
                  <div class="col-md-12">	
										<label>Tuesday</label>
									</div>
									<div class="col-md-4">
										<select name="tuesday_start" id="tuesday_start" class="form-control">
											<?php $this->load->view('back/employees/start_hours'); ?>
										</select>
                  	
									</div>
									<div class="col-md-1">
                  	<p class="text-center">-</p>
									</div>
									<div class="col-md-4">
                  	<select name="tuesday_finish" id="tuesday_finish" class="form-control">
											<?php $this->load->view('back/employees/finish_hours'); ?>
										</select>
									</div>
              	</div>
							</div>
							<div class="row">
								<div class="form-group">
                  <div class="col-md-12">	
										<label>Wednesday</label>
									</div>
									<div class="col-md-4">
										<select name="wednesday_start" id="wednesday_start" class="form-control">
											<?php $this->load->view('back/employees/start_hours'); ?>
										</select>
                  	
									</div>
									<div class="col-md-1">
                  	<p class="text-center">-</p>
									</div>
									<div class="col-md-4">
                  	<select name="wednesday_finish" id="wednesday_finish" class="form-control">
											<?php $this->load->view('back/employees/finish_hours'); ?>
										</select>
									</div>
              	</div>
							</div>
							<div class="row">
								<div class="form-group">
                  <div class="col-md-12">	
										<label>Thursday</label>
									</div>
									<div class="col-md-4">
										<select name="thursday_start" id="thursday_start" class="form-control">
											<?php $this->load->view('back/employees/start_hours'); ?>
										</select>
                  	
									</div>
									<div class="col-md-1">
                  	<p class="text-center">-</p>
									</div>
									<div class="col-md-4">
                  	<select name="thursday_finish" id="thursday_finish" class="form-control">
											<?php $this->load->view('back/employees/finish_hours'); ?>
										</select>
									</div>
              	</div>
							</div>
							<div class="row">
								<div class="form-group">
                  <div class="col-md-12">	
										<label>Friday</label>
									</div>
									<div class="col-md-4">
										<select name="friday_start" id="friday_start" class="form-control">
											<?php $this->load->view('back/employees/start_hours'); ?>
										</select>
                  	
									</div>
									<div class="col-md-1">
                  	<p class="text-center">-</p>
									</div>
									<div class="col-md-4">
                  	<select name="friday_finish" id="friday_finish" class="form-control">
											<?php $this->load->view('back/employees/finish_hours'); ?>
										</select>
									</div>
              	</div>
							</div>
							<div class="row">
								<div class="form-group">
                  <div class="col-md-12">	
										<label>Saturday</label>
									</div>
									<div class="col-md-4">
										<select name="saturday_start" id="saturday_start" class="form-control">
											<?php $this->load->view('back/employees/start_hours'); ?>
										</select>
                  	
									</div>
									<div class="col-md-1">
                  	<p class="text-center">-</p>
									</div>
									<div class="col-md-4">
                  	<select name="saturday_finish" id="saturday_finish" class="form-control">
											<?php $this->load->view('back/employees/finish_hours'); ?>
										</select>
									</div>
              	</div>
							</div>
							<div class="row">
								<div class="form-group">
                  <div class="col-md-12">	
										<label>Sunday</label>
									</div>
									<div class="col-md-4">
										<select name="sunday_start" id="sunday_start" class="form-control">
											<?php $this->load->view('back/employees/start_hours'); ?>
										</select>
                  	
									</div>
									<div class="col-md-1">
                  	<p class="text-center">-</p>
									</div>
									<div class="col-md-4">
                  	<select name="sunday_finish" id="sunday_finish" class="form-control">
											<?php $this->load->view('back/employees/finish_hours'); ?>
										</select>
									</div>
              	</div>
							</div>


          </div>
      </div>
  </fieldset>
	       <div class="form-actions">
	           <input class="btn ui-wizard-content ui-formwizard-button" id="back-1" value="Back" type="reset" disabled="disabled">
	           <input type="submit" class="btn btn-primary ui-wizard-content ui-formwizard-button" id="next-1" value="Next">
	       </div>
	   </form>
      			</div>
						<div class="col-lg-1">
						</div>
						<div class="col-lg-5">
							<h3>Creating Employees</h3>
							<p>Help text for creating an employee</p>
						</div>
    			</div>					
    		</div>
    	</div>
    </div>

</div>
