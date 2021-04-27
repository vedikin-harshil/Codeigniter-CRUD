		<div class="row footer">
		    <div class="form-group col-md-12">
		        <small>Made with <i class="fa fa-heart text-danger" aria-hidden="true"></i> by <span
		                class="text-secondary font-weight-bold"><a href="http://vedikin.com">VedikIn Solutions </a></span></small>
		    </div>
		    <div class="col-md-12">
		        <a href="#" target="_blank" class="btn btn-sm bg-secondary shadow-sm rounded-0 text-light"> <i class="fab fa-github" aria-hidden="true"></i> </a>
		        <a href="#" target="_blank" class="btn btn-sm bg-secondary shadow-sm rounded-0 text-light"> <i class="fab fa-twitter" aria-hidden="true"></i> </a>
		        <a href="#" target="_blank" class="btn btn-sm bg-secondary shadow-sm rounded-0 text-light"> <i class="fab fa-instagram" aria-hidden="true"></i> </a>
		        <a href="#" target="_blank" class="btn btn-sm bg-secondary shadow-sm rounded-0 text-light"> <i class="fab fa-linkedin-in" aria-hidden="true"></i> </a>
		    </div>
		</div>
	</main>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
	<?php if($this->session->flashdata('success')){ ?>
    	toastr.success("<?php echo $this->session->flashdata('success'); ?>");
	<?php } ?>
	<?php if($this->session->flashdata('error')){ ?>
    	toastr.error("<?php echo $this->session->flashdata('error'); ?>");
	<?php } ?>
</script>
<script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/sidebar-main.js"></script>

</body>
</html>