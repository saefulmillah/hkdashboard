<!-- Start content-->
<div class="container-fluid">
	<div class="d-flex justify-content-center">
			<div class="p-2  bg-primary text-white rounded-bottom position-absolute" style="font-weight: bolder; -webkit-box-shadow: 0px 5px 0px 1px rgba(0,0,0,1);
-moz-box-shadow: 0px 5px 0px 1px rgba(0,0,0,1);
box-shadow: 0px 5px 0px 1px rgba(0,0,0,1);">
				<center><img src="<?=base_url('assets/images/hk_logo.png')?>" height="40" class="d-inline-block align-top" style="height: 20px;"></center>
				<span style="font-weight: bold;">Toll Monitoring Dashboard (ATP)</span>
			</div>
	</div>
	<div class="row">
		<div class="col-md-12 body-dashboard">
			<div class="col-md-8 chart-container">
				<div>
					<div id="progress1">
						<div style="font-size: 2rem; font-weight: bold; color:#FF0700; position: absolute; top: 45px; left: 56px; line-height: 1rem;">75<span style="font-size: 0.9rem;">%</span><br><span style="font-size: 0.7rem;">Accident</span></div>
					</div>
					<!-- <div id="progress2" >
						<div style="font-size: 1.2rem; font-weight: bold; color:#ffb900; position: absolute; top: 65px; left: 55px; line-height: 1rem;">70<span style="font-size: 0.9rem;">%</span><br><span style="font-size: 0.7rem;">Potholes</span></div>
					</div> -->
					<div id="progress3" style="background-color: #000; opacity: 1; z-index: -1;" class="rounded-circle">
						<div style="font-size: 2rem; font-weight: bold; color:#ffb900; position: absolute; top: 115px; left: 68px; line-height: 1rem;">50<span style="font-size: 0.9rem;">%</span><br><span style="font-size: 0.7rem;">Potholes</span></div>
					</div>
					<div id="progress4" style="background-color: #000; opacity: 1; z-index: -1;" class="rounded-circle">
						<div style="font-size: 3rem; font-weight: thin; color:#23C700; position: absolute; top: 70px; left: 42px; line-height: 1.5rem;">50<span style="font-size: 1.5rem;">%</span><br><span style="font-size: 1.4rem;">Loss</span></div>
					</div>
					<img src="<?=base_url('assets/images/gear13.png')?>" width="500" id="gear1">
					<img src="<?=base_url('assets/images/gear13.png')?>" width="500" id="gear2">
					<img src="<?=base_url('assets/images/gear13.png')?>" width="500" id="gear3">
				</div>
			</div>
			<!-- <div class="d-flex flex-row-reverse bd-highlight">
			  <div class="p-2 bd-highlight">Flex item 1</div>
			  <div class="p-2 bd-highlight">Flex item 2</div>
			  <div class="p-2 bd-highlight">Flex item 3</div>
			</div> -->
			<div class="col-md-4 chart-container bg-info" style="position: absolute;right:0;top:0;height: 800px; -webkit-box-shadow: inset 10px 0px 7px -6px rgba(0,0,0,1);-moz-box-shadow: inset 10px 0px 7px -6px rgba(0,0,0,1);box-shadow: inset 10px 0px 7px -6px rgba(0,0,0,1);">	
				<div class="card border bg-dark-blue2 border-dark">
				  <h6 class="card-header text-white bg-dark-blue rounded-top">Potholes</h6>
				  <div class="card-body">
				  </div>
				</div>
				<br>
				<div class="card border bg-dark-blue2 border-dark">
				  <h6 class="card-header text-white bg-dark-blue rounded-top">Complain & Satisfaction</h6>
				  <div class="card-body">
				  </div>
				</div>
				<br>
				<div class="card border bg-dark-blue2 border-dark">
				  <h6 class="card-header text-white bg-dark-blue rounded-top">Map</h6>
				  <div class="card-body">
				  	<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15862.789539067006!2d106.8385830197754!3d-6.303433650000001!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1531899216737" width="100%" frameborder="0" style="border:0;" allowfullscreen></iframe>
				  </div>
				</div>

			</div>
		</div>
	</div>    
</div>
<!-- end of content -->