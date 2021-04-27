<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
	
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/toastr.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/sidebar-themes.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.css">
	<link rel="shortcut icon" href="<?php echo base_url()?>assets/img/favicon.ico">
</head>
<body>

<div class="container">
	<br><br>
	<h1 class="text-center"><img style="width: 200px;height: auto;" src="<?php echo base_url()?>assets/img/logo-bg.svg"></h1>
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
		<div class="form-group col-lg-12 text-center">
			<input type="submit" name="login" value="Login" class="btn btn-outline-primary btn-lg btn-block" />
		</div>
	</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
	
	<?php if($this->session->flashdata('error')){ ?>
    	toastr.error("<?php echo $this->session->flashdata('error'); ?>");
	<?php } ?>
</script>
<script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/sidebar-main.js"></script>
</body>
</html>