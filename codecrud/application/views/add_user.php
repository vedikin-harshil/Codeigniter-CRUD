<?php include('include/header.php'); ?>

<div class="container">
	<!-- <?php 
		echo $this->session->userdata('username');
		echo $this->session->userdata('upload');
		
		?> -->

	<form method="post" action="<?php echo base_url()?>controller_user/form_validation" enctype="multipart/form-data">
		
		<!-- check when there is user_data value for update-->
		<?php  
           if(isset($user_data))  
           {  
                foreach($user_data->result() as $row)  
                {  
           ?>  
			<h2 class="text-center">Update User</h2>

			<div class="form-group col-lg-12">
				<label>Enter User Name</label>
				<input type="text" name="username" value="<?php echo $row->username; ?>" class="form-control"/>
				<span class="text-danger"><?php echo form_error("username"); ?></span>
			</div>
			<div class="form-group col-lg-12">
				<label>Enter Email Id</label>
				<input type="email" name="email" value="<?php echo $row->email; ?>" class="form-control"/>
				<span class="text-danger"><?php echo form_error("email"); ?></span>
			</div>
			<div class="form-group col-lg-12">
				<label>Enter Password</label>
				<input type="text" name="password" value="<?php echo $row->password; ?>"  class="form-control"/>
				<span class="text-danger"><?php echo form_error("password"); ?></span>
			</div>
			<div class="form-group col-lg-12">
				<label>User Profile Image</label><br>
				<?php if(!empty($row->upload)): ?>
					<img style="width: 200px;height: 200px;" src="<?php echo base_url($row->upload); ?>" alt="user"><br><br>
				<?php else: ?>
					<img style="width: 150px;height: 150px;" src="<?php echo base_url('upload/user.jpg'); ?>" alt="user"><br><br>
				<?php endif ?>
				<label>Choose file to Upload</label>
				<input type="file" name="upload" value="<?php echo $row->upload; ?>"  class="form-control"/>
			</div>
			<div class="form-group col-lg-12">
				<input type="hidden" name="status" class="form-control" value="1" />
			</div>
			<div class="form-group col-lg-12">
				<input type="hidden" name="hidden_id" value="<?php echo $row->id; ?>" class="form-control"  />
				<input type="submit" name="update" value="Update" class="btn btn-success" />
			</div>

		<?php			
			}
		}
		else {

		?>
			
			<h2 class="text-center">Create New User</h2>

			<div class="form-group col-lg-12">
				<input type="text" name="username" placeholder="Enter User Name" class="form-control" />
				<span class="text-danger"><?php echo form_error("username"); ?></span>
			</div>
			<div class="form-group col-lg-12">
				<input type="email" name="email" placeholder="Enter Email ID"  class="form-control"/>
				<span class="text-danger"><?php echo form_error("email"); ?></span>
			</div>
			<div class="form-group col-lg-12">
				<input type="password" name="password" placeholder="Enter Password"  class="form-control"/>
				<span class="text-danger"><?php echo form_error("password"); ?></span>
			</div>
			<div class="form-group col-lg-12">
				<label>Choose file to Upload</label>
				<input type="file" name="upload" class="form-control"/>
			</div>
			<div class="form-group col-lg-12">
				<input type="hidden" name="status" class="form-control" value="1" />
			</div>
			<div class="form-group col-lg-12">
				<input type="submit" name="submit" value="Insert" class="btn btn-info" />
			</div>
			
			<a href="<?php echo base_url('controller_user/list_all_user') ?>" class="btn btn-danger">List Users</a><br><br>

		<?php 
		}
		?>
	</form>
</div>


<?php include('include/footer.php'); ?>