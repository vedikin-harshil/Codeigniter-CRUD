<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

</head>
<body>

<div class="container">
	<h1 class="text-center">Login</h1>
	<br><br>
	<form method="post" action="<?php echo base_url()?>controller_user/login_validation">
		
		<div class="form-group col-lg-12">
			<input type="text" name="username" placeholder="Enter Username" class="form-control"/>
			<span class="text-danger"><?php echo form_error("username"); ?></span>
		</div>
		<div class="form-group col-lg-12">
			<input type="password" name="password" placeholder="Enter Password" class="form-control"/>
			<span class="text-danger"><?php echo form_error("password"); ?></span>
		</div>
		<div class="form-group col-lg-12">
			<input type="submit" name="login" value="Login" class="btn btn-primary" />
			<?php echo $this->session->flashdata('error'); ?>
		</div>
	</form>
</div>

</body>
</html>