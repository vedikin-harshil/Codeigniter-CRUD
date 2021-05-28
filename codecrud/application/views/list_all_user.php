<style>
span.user_status {
    cursor: pointer;
}
</style>
<div class="container">
	<form class="filter_form" id="frmListDataFilter" method="post" action="<?php echo base_url()?>controller_user/search">
		<div class="form-group col-sm-4">
			<input size="15" type="text" class="extra_field form-control" name="txtSearchKeyWord" id="txtSearchKeyWord" placeholder="Search Keyword" value="<?php echo set_value('txtSearchKeyWord');?>" required/>
		</div>
		<div class="form-group col-sm-8">
			<input type="submit" class="btn btn-warning" name="searchSubmit" id="searchSubmit" value="Search" />
		</div>
	</form>
	<button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url="<?php echo base_url()?>userDelete">Delete</button>
	<table class="table table-hover table-bordered" border="1">
		<tr>
			<th width="50px"><input type="checkbox" id="master"></th>
			<th>Sr No.</th>
			<th>User Name</th>
			<th>Email ID</th>
			<th>Password</th>
			<th>Status</th>
			<th>User Image</th>
			<th>Delete</th>
			<th>Edit</th>
		</tr>
		<tbody class="list-all-user">
			<?php 
			$i = 1;
            foreach ($h->result() as $row) { ?>
				<tr>
					<td><input type="checkbox" class="sub_chk" data-id="<?php echo $row->id ?>"></td>
					<td><?php echo $i++ ?></td>
					<td><?php echo $row->username ?></td>
					<td><?php echo $row->email ?></td>
					<td><?php echo $row->password ?></td>
					<td>
						<?php 
							if($row->status == 1) { 
                               echo '<span class="user-active user_status" uid="'.$row->id.'"  ustatus="'.$row->status.'"><i class="fa fa-circle"></i><span>Active</span></span>';
                            }elseif($row->status == 0){
                               echo '<span class="user-block user_status" uid="'.$row->id.'"  ustatus="'.$row->status.'"><i class="fa fa-circle"></i><span>Inactive</span></span>';
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
			<?php } ?>
		</tbody>
	</table>
	<br><br>
</div>
<div class="modal modal-danger fade" id="modal_popup">
    <div class="modal-dialog modal-sm">
    	<form action="<?php echo base_url(); ?>controller_user/user_status_changed" method="post"> 
	     	 <div class="modal-content">
		        <div class="modal-header" style="height: 150px;">
		          	<h4 style="margin-top: 50px;text-align: center;">Are you sure, do you want to change user status?</h4>
					<input type="hidden" name="id" id="user_id" value="">
					<input type="hidden" name="status" id="user_status" value="">
		        </div>
		        <div class="modal-footer">
		            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">No</button>
		            <button type="submit" name="submit" class="btn btn-success">Yes</button>
		        </div>
	        </div>
        </form>
    </div>
 </div>

<?php include('include/footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function () {
 
        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);  
         } else {  
            $(".sub_chk").prop('checked',false);  
         }  
        });
 
        $('.delete_all').on('click', function(e) {
 
            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  
 
            if(allVals.length <=0)  
            {  
                alert("Please select row.");  
            }  else {  
 
                var check = confirm("Are you sure you want to delete this row?");  
                if(check == true){  
 
                    var join_selected_values = allVals.join(","); 
 
                    $.ajax({
                        url: $(this).data('url'),
                        type: 'POST',
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                          console.log(data);
                          $(".sub_chk:checked").each(function() {  
                              $(this).parents("tr").remove();
                          });
                          alert("Selected Users Deleted successfully.");
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });
 
                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }  
            }  
        });
    });
</script>
<script type="text/javascript">
	$(document).on('click','.user_status',function(){

		var id = $(this).attr('uid'); //get attribute value in variable
		var status = $(this).attr('ustatus'); //get attribute value in variable

		$('#user_id').val(id); //pass attribute value in ID
		$('#user_status').val(status);  //pass attribute value in ID

		$('#modal_popup').modal({backdrop: 'static', keyboard: true, show: true}); //show modal popup

	});
</script>
