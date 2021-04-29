
<br>
<br>
<br>
<div class="container">
	
	<form  action="<?php echo base_url()?>controller_user/changepwd" method="post" enctype="multipart/form-data" >
		<div class="form-group col-lg-12">
			<input type="password" name="oldpassword" placeholder="Enter Old Password"  class="form-control"/>
			<span class="text-danger"><?php echo form_error("oldpassword"); ?></span>
		</div>
		<div class="form-group col-lg-12">
			<input type="password" name="newpassword" placeholder="Enter New Password"  class="form-control"/>
			<span class="text-danger"><?php echo form_error("newpassword"); ?></span>
		</div>
		<div class="form-group col-lg-12">
			<input type="password" name="repnewpassword" placeholder="Repeat New Password"  class="form-control"/>
			<span class="text-danger"><?php echo form_error("repnewpassword"); ?></span>
		</div>
		<div class="form-group col-lg-12">
			<input type="submit" name="changepwd" value="Change Password" class="btn btn-info" />
		</div>
	</form>
</div>

<?php include('include/footer.php'); ?>