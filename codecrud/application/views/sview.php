<!DOCTYPE html>
<html>
<head>
	<title>Search User</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

</head>
<body>

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
			if(count($get_data) > 0)
			{
		        foreach ($get_data as $row) 
		        { ?>
					<tr>
						<td><?php echo $row->id ?></td>
						<td><?php echo $row->username ?></td>
						<td><?php echo $row->email ?></td>
						<td><?php echo $row->password ?></td>
						<td><?php echo $row->status ?></td>
						<td><a href="<?php echo base_url('controller_user/delete_user/'.$row->id) ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a></td>
						<td><a href="<?php echo base_url('controller_user/edit_user/'.$row->id) ?>" class="btn btn-primary">Update</a></td>
					</tr>
		<?php   } 
			}
			else{ ?>
				<h2>No Data Found</h2>
				<style type="text/css">
					.table{
						display: none;
					}
				</style>
			<?php } ?>
			
		</tbody>
	</table>
<br>
<a href="<?php echo base_url()?>controller_user/list_all_user" class="btn btn-primary">Back to Home</a>

</body>
</html>