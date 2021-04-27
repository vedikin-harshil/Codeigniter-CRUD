<?php     
	include('include/header.php'); 
?>

<div class="grey-bg container-fluid">
  	<section id="minimal-statistics">
	    <div class="row">
		    <div class="col-xl-3 col-sm-6 col-12"> 
		        <div class="card">
		          	<div class="card-content">
			            <div class="card-body">
			              	<div class="media d-flex">
				                <div class="align-self-center">
				                  <i class="icon-user primary font-large-2 float-left"></i>
				                </div>
				                <div class="media-body text-right">
				                	<?php $query = $this->db->count_all('user'); ?>
				                  	<h3><?php echo $query; ?></h3>
				                  	<span>Total User</span>
				                </div>
			              	</div>
			            </div>
			        </div>
		        </div>
	      	</div>
	      	<div class="col-xl-3 col-sm-6 col-12"> 
		        <div class="card">
		          	<div class="card-content">
			            <div class="card-body">
			              	<div class="media d-flex">
				                <div class="align-self-center">
				                  <i class="icon-user success font-large-2 float-left"></i>
				                </div>
				                <div class="media-body text-right">
				                	<?php $query = $this->session->userdata('logged_in'); ?>
				                  	<h3><?php echo $query; ?></h3>
				                  	<span>Logged In User</span>
				                </div>
			              	</div>
			            </div>
			        </div>
		        </div>
	      	</div>
	    </div>
	</section>
</div>

<?php include('include/footer.php'); ?>