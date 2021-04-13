<!DOCTYPE html>
<html>
<head>
	<title>List all User</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>

<div class="container">
	<h2 class="text-center">List all User</h2>

	<form class="filter_form" id="frmListDataFilter" method="post" action="<?php echo base_url()?>controller_user/search">
		<div class="form-group col-sm-6">
			<input size="15" type="text" class="extra_field form-control" name="txtSearchKeyWord" id="txtSearchKeyWord" placeholder="Search Keyword" value="<?php echo set_value('txtSearchKeyWord');?>" required/>
		</div>
		<div class="form-group col-sm-6">
			<input type="submit" class="btn btn-warning" name="searchSubmit" id="searchSubmit" value="Search" />
		</div>
	</form>
	<table class="table table-hover table-bordered" border="1">
		<tr>
			<th>Sr No.</th>
			<th>User Name</th>
			<th>Email ID</th>
			<th>Password</th>
			<th>Status</th>
			<th>Delete</th>
			<th>Edit</th>
		</tr>
		<tbody>
			<?php 
            foreach ($h->result() as $row) { ?>
				<tr>
					<td><?php echo $row->id ?></td>
					<td><?php echo $row->username ?></td>
					<td><?php echo $row->email ?></td>
					<td><?php echo $row->password ?></td>
					<td><?php echo $row->status ?></td>
					<td><a href="<?php echo base_url('controller_user/delete_user/'.$row->id) ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a></td>
					<td><a href="<?php echo base_url('controller_user/edit_user/'.$row->id) ?>" class="btn btn-primary">Update</a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	
	<a href="<?php echo base_url()?>controller_user/add" class="btn btn-primary">Back to Home</a>
</div>
</body>
</html>