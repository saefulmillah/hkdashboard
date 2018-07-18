<!-- Start content-->
<div class="container-fluid">
	<div class="d-flex justify-content-center">
			<div class="p-2  bg-primary text-white rounded-bottom shadow-lg border border-primary">Toll Monitoring Dashboard (ATP)</div>
		</div>
	<div class="row">
		<div class="col-md-12 body-dashboard">
			<div class="col-md-9 chart-container">
				<div>
					<div id="progress1">
						<div style="font-size: 1.2rem; font-weight: bold; color:blue; position: absolute; top: 35px; left: 64px; line-height: 1rem;">75<span style="font-size: 0.9rem;">%</span><br><span style="font-size: 0.7rem;">Traffic</span></div>
					</div>
					<div id="progress2" >
						<div style="font-size: 1.2rem; font-weight: bold; color:red; position: absolute; top: 65px; left: 55px; line-height: 1rem;">70<span style="font-size: 0.9rem;">%</span><br><span style="font-size: 0.7rem;">Revenue</span></div>
					</div>
					<div id="progress3" style="background-color: #000; opacity: 0.6; z-index: -1;" class="rounded-circle">
						<div style="font-size: 1.2rem; font-weight: bold; color:green; position: absolute; top: 125px; left: 76px; line-height: 1rem;">50<span style="font-size: 0.9rem;">%</span><br><span style="font-size: 0.7rem;">Accident</span></div>
					</div>
					<div id="progress4" style="background-color: #000; opacity: 0.6; z-index: -1;" class="rounded-circle">
						<div style="font-size: 3rem; font-weight: thin; color:yellow; position: absolute; top: 70px; left: 42px; line-height: 1.5rem;">50<span style="font-size: 1.5rem;">%</span><br><span style="font-size: 1.4rem;">Accident</span></div>
					</div>
					<img src="<?=base_url('assets/images/gear13.png')?>" width="300" id="gear1">
					<img src="<?=base_url('assets/images/gear13.png')?>" width="300" id="gear2">
					<img src="<?=base_url('assets/images/gear13.png')?>" width="300" id="gear3">
				</div>
			</div>
			<div class="col-md-3 chart-container">
				<div class="card border border-primary">
				  <h5 class="card-header text-white bg-primary">Potholes</h5>
				  <div class="card-body">
				  </div>
				</div>
				<br>
				<div class="card">
				  <h5 class="card-header text-white bg-primary">Complain & Satisfaction</h5>
				  <div class="card-body">
				  </div>
				</div>
				<br>
				<div class="card">
				  <h5 class="card-header text-white bg-primary">Accident</h5>
				  <div class="card-body">
				  </div>
				</div>

			</div>
		</div>
	</div>    
</div>
<!-- end of content -->