
<div class="container">
	<table class="table table-hover table-bordered" border="1">
		<tr>
			<th>Sr No.</th>
			<th>User Name</th>
			<th>Email ID</th>
			<th>Password</th>
			<th>Status</th>
			<th>User Profile</th>
			<th>Delete</th>
			<th>Edit</th>
		</tr>
		<tbody class="list-all-user">
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
						<td>
						<?php 
							if($row->status == 1) { 
                               echo '<span class="user-active"><i class="fa fa-circle"></i><span>Active</span></span>';
                            }elseif($row->status == 0){
                               echo '<span class="user-block"><i class="fa fa-circle"></i><span>Block</span></span>';

                            }else{
                                redirect(base_url() . 'controller_user/logout');
                            }
                        ?>
					</td>
						<td class="avatar avatar-sm">
							<?php if(!empty($row->upload)): ?>
								<img class= "img-fluid rounded-circle shadow-lg" src="<?php echo base_url($row->upload); ?>" alt="user">
							<?php else: ?>
								<img style="width: 150px;height: 150px;" src="<?php echo base_url('upload/user.jpg'); ?>" alt="user">
							<?php endif ?>
						</td>
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
<a href="<?php echo base_url()?>controller_user/list_all_user" class="btn btn-primary">Back to List Page</a>
</div>
<br>
<br>

<?php include('include/footer.php'); ?>