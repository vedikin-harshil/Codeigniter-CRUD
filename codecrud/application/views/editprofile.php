<br>
<br>
<br>
<div class="container">
	
	<?php 
		foreach ($pp as $row) { ?>

			<form  action="<?php echo base_url()?>controller_user/form_validation" method="post" enctype="multipart/form-data" >
				<div class="form-group col-lg-12">
					<label>Enter User Name</label>
					<input type="text" name="username" value="<?php echo $row->username ?>" class="form-control"/>
					<span class="text-danger"><?php echo form_error("username"); ?></span>
				</div>
				<div class="form-group col-lg-12">
					<label>Enter Email ID</label>
					<input type="text" name="email" value="<?php echo $row->email ?>" class="form-control"/>
					<span class="text-danger"><?php echo form_error("email"); ?></span>
				</div>
				<div class="form-group col-lg-12">
					<label>Enter Password</label>
					<input type="password" name="password" value="<?php echo $row->password; ?>"  class="form-control"/>
					<span class="text-danger"><?php echo form_error("password"); ?></span>
				</div>
				<div class="form-group col-lg-12">
					<label>User Profile Image</label><br>
					<?php if(!empty($row->upload)): ?>
						<img style="width: 200px;" src="<?php echo base_url($row->upload); ?>" alt="user"><br><br>
					<?php else: ?>
						<img style="width: 200px;" src="<?php echo base_url('upload/user.jpg'); ?>" alt="user"><br><br>
					<?php endif ?>
					<label>Choose file to Upload</label>
					<input type="file" name="upload" value="<?php echo $row->upload; ?>"  class="form-control"/>
				</div>
				<div class="form-group col-lg-12">
					<input type="hidden" name="status" class="form-control" value="1" />
				</div>
				<div class="form-group col-lg-12">
					<input type="hidden" name="hidden_id" value="<?php echo $row->id; ?>" class="form-control"  />
					<input type="submit" name="updatepro" value="Update Profile" class="btn btn-info" />
				</div>
			</form>
	<?php } ?>
</div>


<?php include('include/footer.php'); ?>
