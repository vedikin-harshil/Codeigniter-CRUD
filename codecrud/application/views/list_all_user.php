<?php include('include/header.php'); ?>


<div class="container">
	<form class="filter_form" id="frmListDataFilter" method="post" action="<?php echo base_url()?>controller_user/search">
		<div class="form-group col-sm-4">
			<input size="15" type="text" class="extra_field form-control" name="txtSearchKeyWord" id="txtSearchKeyWord" placeholder="Search Keyword" value="<?php echo set_value('txtSearchKeyWord');?>" required/>
		</div>
		<div class="form-group col-sm-8">
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
			<th>User Image</th>
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
					<td>
					<?php if(!empty($row->upload)): ?>
						<img style="width: 200px;height: 200px;" src="<?php echo base_url($row->upload); ?>" alt="user">
					<?php else: ?>
						<img style="width: 150px;height: 150px;" src="<?php echo base_url('upload/user.jpg'); ?>" alt="user">
					<?php endif ?>
					</td>
					<td><a href="<?php echo base_url('controller_user/delete_user/'.$row->id) ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a></td>
					<td><a href="<?php echo base_url('controller_user/edit_user/'.$row->id) ?>" class="btn btn-primary">Update</a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<br><br>
</div>

<?php include('include/footer.php'); ?>