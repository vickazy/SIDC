<script type="text/javascript" src="<?php echo base_url('assets/scripts/jquery-1.9.0.min.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/scripts/jquery.nivo.slider.js');?>"></script>
		<script type="text/javascript">
		$(window).load(function() {
			$('#slider').nivoSlider();
		});
		</script>
		<SCRIPT language=Javascript>
				<!--
				function isNumberKey(evt)
				{
				var charCode = (evt.which) ? evt.which : event.keyCode
				if (charCode > 31 && (charCode < 48 || charCode > 57))

				return false;
				return true;
				}
				//-->
			</SCRIPT>
<div class="container-fluid">
	<div class="side-body padding-top">
		<div class="row">
			<div class="col-lg-9">
				<div class="card primary">
					<div id="wrapper">
					<?php
					$level=$this->session->userdata('level');
					?>
						<div class="slider-wrapper theme-default">
							<div id="slider" class="nivoSlider">
								<img src="<?php echo base_url('assets/css2/1.jpg');?>" data-thumb="images/1.jpg" alt="" />
								<img src="<?php echo base_url('assets/css2/2.jpg');?>" data-thumb="images/2.jpg" alt="" data-transition="slideInLeft" />
								<img src="<?php echo base_url('assets/css2/3.jpg');?>" data-thumb="images/3.jpg" alt="" title="#htmlcaption" />
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
