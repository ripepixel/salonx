<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Business Details</h3>
    </div>

    <div class="col-lg-12">
    	<div class="panel panel-default">
    		<div class="panel-heading">Edit Business Details</div>
    		<div class="panel-body">
    			<div class="row">
    				<div class="col-lg-6 form-group">
        				<form role="form" method="post" action="<?php echo base_url(); ?>businesses/create_business">
        					<div class="form-group">
        						<label>Business Name</label>
        						<input type="text" class="form-control" name="business_name" required value="<?php echo $business->business_name; ?>" />
        						<p class="help-block">Required</p>
        						<?php if(form_error('business_name')) { echo form_error('business_name'); } ?>
        					</div>
        					<div class="form-group">
        						<label>Street</label>
        						<input type="text" class="form-control" name="street" value="<?php echo $business->street; ?>" />
        						<?php if(form_error('street')) { echo form_error('street'); } ?>
        					</div>
        					<div class="form-group">
        						<label>Town</label>
        						<input type="text" class="form-control" name="town" value="<?php echo $business->town; ?>" />
        						<?php if(form_error('town')) { echo form_error('town'); } ?>
        					</div>
        					<div class="form-group">
        						<label>County</label>
        						<input type="text" class="form-control" name="county" value="<?php echo $business->county; ?>" />
        						<?php if(form_error('county')) { echo form_error('county'); } ?>
        					</div>
        					<div class="form-group">
        						<label>PostCode</label>
        						<input type="text" class="form-control" name="postcode" value="<?php echo $business->postcode; ?>" />
        						<?php if(form_error('postcode')) { echo form_error('postcode'); } ?>
        					</div>
        					<div class="form-group">
        						<label>Telephone</label>
        						<input type="text" class="form-control" name="telephone" value="<?php echo $business->telephone; ?>" />
        						<?php if(form_error('telephone')) { echo form_error('telephone'); } ?>
        					</div>
        					<div class="form-group">
        						<label>Mobile</label>
        						<input type="text" class="form-control" name="mobile" value="<?php echo $business->mobile; ?>" />
        						<?php if(form_error('mobile')) { echo form_error('mobile'); } ?>
        					</div>
        					<div class="form-group">
        						<label>Fax</label>
        						<input type="text" class="form-control" name="fax" value="<?php echo $business->fax; ?>" />
        						<?php if(form_error('fax')) { echo form_error('fax'); } ?>
        					</div>
        					<div class="form-group">
        						<label>Website</label>
        						<input type="text" class="form-control" name="website" value="<?php echo $business->website; ?>" />
        						<?php if(form_error('website')) { echo form_error('website'); } ?>
        					</div>
        					
        					<div class="form-group">
        						<button class="btn btn-primary" type="submit">Update</button>
        					</div>
        				</form>
        			</div>
    			</div>
    		</div>
    	</div>
    </div>

</div>
