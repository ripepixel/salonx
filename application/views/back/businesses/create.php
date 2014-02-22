    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Business Details</h3>
        </div>

        <div class="col-lg-12">
        	<div class="panel panel-default">
        		<div class="panel-heading">Business Details</div>
        		<div class="panel-body">
        			<div class="row">
        				<div class="col-lg-6 form-group">
	        				<form role="form" method="post" action="<?php echo base_url(); ?>businesses/create_business">
	        					<div class="form-group">
	        						<label>Business Name</label>
	        						<input type="text" class="form-control" name="business_name" required />
	        						<p class="help-block">Required</p>
	        						<?php if(form_error('business_name')) { echo form_error('business_name'); } ?>
	        					</div>
	        					<div class="form-group">
	        						<label>Street</label>
	        						<input type="text" class="form-control" name="street" />
	        						<?php if(form_error('street')) { echo form_error('street'); } ?>
	        					</div>
	        					<div class="form-group">
	        						<label>Town</label>
	        						<input type="text" class="form-control" name="town" />
	        						<?php if(form_error('town')) { echo form_error('town'); } ?>
	        					</div>
	        					<div class="form-group">
	        						<label>County</label>
	        						<input type="text" class="form-control" name="county" />
	        						<?php if(form_error('county')) { echo form_error('county'); } ?>
	        					</div>
	        					<div class="form-group">
	        						<label>PostCode</label>
	        						<input type="text" class="form-control" name="postcode" />
	        						<?php if(form_error('postcode')) { echo form_error('postcode'); } ?>
	        					</div>
	        					<div class="form-group">
	        						<label>Telephone</label>
	        						<input type="text" class="form-control" name="telephone" />
	        						<?php if(form_error('telephone')) { echo form_error('telephone'); } ?>
	        					</div>
	        					<div class="form-group">
	        						<label>Mobile</label>
	        						<input type="text" class="form-control" name="mobile" />
	        						<?php if(form_error('mobile')) { echo form_error('mobile'); } ?>
	        					</div>
	        					<div class="form-group">
	        						<label>Fax</label>
	        						<input type="text" class="form-control" name="fax" />
	        						<?php if(form_error('fax')) { echo form_error('fax'); } ?>
	        					</div>
	        					<div class="form-group">
	        						<label>Website</label>
	        						<input type="text" class="form-control" name="website" />
	        						<?php if(form_error('website')) { echo form_error('website'); } ?>
	        					</div>
	        					<div class="form-group">
	        						<label>Create Outlet</label>
	        						<div class="checkbox">
	        							<label><input type="checkbox" name="create_outlet" /></label> Would you like an outlet creating from these details?
	        						</div>
	        					</div>
	        					<div class="form-group">
	        						<button class="btn btn-primary" type="submit">Save</button>
	        					</div>
	        				</form>
	        			</div>
        			</div>
							<div class="col-lg-6">
								<p>Please enter your business details.</p>
							</div>
        		</div>
        	</div>
        </div>
    
    </div>
