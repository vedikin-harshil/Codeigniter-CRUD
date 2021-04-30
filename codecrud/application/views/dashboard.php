<br><br>
<div class="grey-bg container-fluid">
  	<section id="minimal-statistics">
	    <div class="row">
		    <div class="col-xl-3 col-sm-6 col-12"> 
		        <div class="card card-blog">
		                <div class="card-image">
							<img src="<?php echo base_url()?>assets/img/linth3.svg" alt="Image placeholder" class="card-img-top">
		                </div>
		                <div class="card-body media-body text-right">
		                  	<i class="icon-user primary font-large-2 float-left"></i>
		                	<?php $query = $this->db->count_all('user'); ?>
		                  	<h3><?php echo $query; ?></h3>
		                  	<span>Total User</span>
		                </div>
		        </div>
	      	</div>
	      	<div class="col-xl-3 col-sm-6 col-12"> 
		        <div class="card card-blog">
	                <div class="card-image">
						<img src="<?php echo base_url()?>assets/img/linth3.svg" alt="Image placeholder" class="card-img-top">
	                </div>
	                <div class="card-body media-body text-right">
	                  	<i class="icon-user primary font-large-2 float-left"></i>
	                	<?php $query = $this->session->userdata('logged_in'); ?>
	                  	<h3><?php echo $query; ?></h3>
	                  	<span>Logged In User</span>
	                </div>
		        </div>
	      	</div>
	    </div>
	</section>
</div>
<!-- <div class="col-md-6 col-lg-4">
	<div class="card text-white bg-default" data-background="pattern">
		<div class="card-body">
			<div class="content">
				<h5 class="h2 card-title text-white mb-2">Card Title</h5>
				<p class="card-description"> This is a wider card with supporting text below as a natural lead-in to additional content. </p>
				<p class="card-text text-sm font-weight-bold"> Last updated 3 mins ago </p>
			</div>
		</div>
		<a href="javascript:;">
			<img src="<?php echo base_url()?>assets/img/inn.svg" class="img pattern rounded">
		</a>
	</div>
</div> -->
<?php include('include/footer.php'); ?>