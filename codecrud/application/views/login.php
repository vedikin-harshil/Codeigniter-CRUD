<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

</head>
<body>

<div class="container">
	<h1 class="text-center">Login</h1>
	<br><br>

	<form method="post" action="<?php echo base_url()?>controller_user/login_validation">
		
		<?php //if($this->session->flashdata('error')): ?>
		    <h4 style="color: red;"><?php //echo $this->session->flashdata('error'); ?></h4>
		<?php //endif; ?>
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
		</div>
	</form>
</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script type="text/javascript">
		<?php if($this->session->flashdata('error')){ ?>
	    	toastr.error("<?php echo $this->session->flashdata('error'); ?>");
		<?php } ?>
	</script>
</body>
</html>