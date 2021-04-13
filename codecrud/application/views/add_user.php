<!DOCTYPE html>
<html>
<head>
	<title>Add User</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

</head>
<body>
<div class="container">
	<h1 class="text-center">Welcome to my site - <?php echo $this->session->userdata('username'); ?></h1>
	<br><br>

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
				<input type="hidden" name="status" class="form-control" value="1" />
			</div>
			<div class="form-group col-lg-12">
				<input type="submit" name="submit" value="Insert" class="btn btn-info btn-lg" />
			</div>
			
			<a href="<?php echo base_url('controller_user/list_all_user') ?>" class="btn btn-primary">List Users</a>

		<?php 
		}
		?>
	</form>

</div>
</body>
</html>