<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-8">
				<div class="d-flex justify-content-center">
					<div class="p-1 font-roboto bg-dark-blue text-white rounded-bottom position-absolute border border-top-0 border-info">
						<span style="font-size: 1.1rem; padding: 1rem;">Toll Monitoring Dashboard (ATP)</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 body-dashboard">
			<div class="col-md-8 chart-container">
				<div>
					<div id="progress1" style="background-color: #003366; z-index: -1; text-shadow: 0px 2px 0px rgba(0, 0, 0, 1);" class="rounded-circle">
						<div class="font-roboto" style="font-size: 2rem; font-weight: thin; color:#ffb900; position: absolute; top: 61px; left: 39px;">
							<h2 style="line-height: 1.5rem;"><small><p style="font-size: 1rem;">Daily Revenue</p></small></h2>
							<dl class="row" style="color: #fff; font-size: 0.7rem;">
							  <dt class="col-sm-3">lalin</dt>
							  <dd class="col-sm-9" id="txtLalinGearDaily">0</dd>
							  <dt class="col-sm-3">Rp</dt>
							  <dd class="col-sm-9" id="txtRevenueGearDaily">0</dd>
							</dl>
						</div>
					</div>
					<!-- <div id="progress3" style="background-color: #003366; z-index: -1; text-shadow: 0px 2px 0px rgba(0, 0, 0, 1);" class="rounded-circle">
						<div class="font-roboto" style="font-size: 2rem; font-weight: bold; color:#ffb900; position: absolute; top: 136px; left: 89px; line-height: 1rem;">0<span style="font-size: 0.9rem;">%</span><br><span style="font-size: 0.7rem;">Potholes</span></div>
					</div> -->
					<div id="progress4" style="background-color: #003366; z-index: -1; text-shadow: 0px 2px 0px rgba(0, 0, 0, 1);" class="rounded-circle">
						<div class="font-roboto" style="font-size: 2rem; font-weight: thin; color:#3AAACF; position: absolute; top: 61px; left: 39px;">
							<h2 style="line-height: 1.5rem;"><span id="txtRevenue">0</span><small>%<p style="font-size: 1rem;">Monthly Revenue</p></small></h2>
							<dl class="row" style="color: #fff; font-size: 0.7rem;">
							  <dt class="col-sm-3">lalin</dt>
							  <dd class="col-sm-9" id="txtLalinGear">0</dd>
							  <dt class="col-sm-3">Rp</dt>
							  <dd class="col-sm-9" id="txtRevenueGear">0</dd>
							</dl>
						</div>
					</div>

					<div id="progress2" style="background-color: #003366; z-index: -1; text-shadow: 0px 2px 0px rgba(0, 0, 0, 1);" class="rounded-circle">
						<div class="font-roboto" style="font-size: 3rem; font-weight: thin; color:#23C700; position: absolute; top: 65px; left: 32px; line-height: 1rem;" >
							<h2 style="line-height: 1.5rem;"><span id="txtRevenueYearly">0</span><small>%<p style="font-size: 1rem;">Yearly Revenue</p></small></h2>
							<dl class="row" style="color: #fff; font-size: 0.7rem;">
							  <dt class="col-sm-3">lalin</dt>
							  <dd class="col-sm-9" id="txtLalinGearYearly">0</dd>
							  <dt class="col-sm-3">Rp</dt>
							  <dd class="col-sm-9" id="txtRevenueGearYearly">0</dd>
							</dl>
						</div>
					</div>

					<img src="<?=base_url('assets/images/shadow.png')?>" width="500" id="shadow1" style="position: absolute; top: 220px; width: 300px; left: 90px; z-index: -1000;">
					<img src="<?=base_url('assets/images/shadow.png')?>" width="500" id="shadow2" style="position: absolute; top: 348px; width: 300px; left: 519px; z-index: -1000;">
					<img src="<?=base_url('assets/images/shadow.png')?>" width="500" id="shadow3" style="position: absolute; top: 495px; width: 300px; left: 246px; z-index: -1000;">
					<img src="<?=base_url('assets/images/gear16.png')?>" width="500" id="gear1" style="z-index: -1000;">
					<img src="<?=base_url('assets/images/gear16.png')?>" width="500" id="gear2" style="z-index: -1000;">
					<img src="<?=base_url('assets/images/gear16.png')?>" width="500" id="gear3" style="z-index: -1000;">
				</div>
			</div>
			<!-- <div class="d-flex flex-row-reverse bd-highlight">
			  <div class="p-2 bd-highlight">Flex item 1</div>
			  <div class="p-2 bd-highlight">Flex item 2</div>
			  <div class="p-2 bd-highlight">Flex item 3</div>
			</div> -->
			<div class="col-md-4 chart-container bg-dark-blue3" style="position: absolute;right:0px; top: -5px; -webkit-box-shadow: inset 10px 0px 7px -6px rgba(0,0,0,1);-moz-box-shadow: inset 10px 0px 7px -6px rgba(0,0,0,1);box-shadow: inset 10px 0px 7px -6px rgba(0,0,0,1);">	
				
				<div class="card border border-primary bg-dark-blue2">
				  <h6 class="card-header font-roboto text-white bg-dark-blue2 rounded-top">Revenue 01 - <?=date('d').' '.date('F')." '".date('y')?></h6>
				  <div class="card-body text-white">
				  	<div class="row">
				  		<div class="col-md-6"><strong>Total Lalin</strong><h3><span id="txtTotalLalin">0</span></h3>
				  			<strong>Total Pendapatan (Rp)</strong><h4><span id="txtTotalPendapatan">0</span></h4></div>
				  		<div class="col-md-6">
				  			<dl class="row">
				  				<dt class="col-sm-5"><strong">BNI</strong></dt>
				  				<dd class="col-md-7"><span id="txtBNI">0</span></dd>
				  				<dt class="col-sm-5"><strong">Mandiri</strong></dt>
				  				<dd class="col-md-7"><span id="txtMandiri">0</span></dd>
				  				<dt class="col-sm-5"><strong">BCA</strong></dt>
				  				<dd class="col-md-7"><span id="txtBCA">0</span></dd>
				  				<dt class="col-sm-5"><strong">BRI</strong></dt>
				  				<dd class="col-md-7"><span id="txtBRI">0</span></dd>
				  				<dt class="col-sm-5"><strong">Tunai</strong></dt>
				  				<dd class="col-md-7"><span id="txtTunai">0</span></dd>
				  			</dl>
				  		</div>
				  	</div>
				  </div>
				</div>

				<div class="card border border-primary bg-dark-blue2" style="margin-top: 0.5rem;">
				  <h6 class="card-header font-roboto text-white bg-dark-blue2 rounded-top">Traffic Monitoring</h6>
				  <div class="card-body">
				  	<div class="d-flex text-white">
				  		<div class="p-2 flex-fill"><div id="RTMS" align="center"></div></div>
				  		<div class="p-2 flex-fill">
				  			<dl class="row">
							  <dt class="col-sm-6">Volume</dt>
							  <dd class="col-sm-6">: 3.097.878</dd>
							  <dt class="col-sm-6">Speed</dt>
							  <dd class="col-sm-6">: 95 Km/H</dd>
							  <dt class="col-sm-6">Occupation</dt>
							  <dd class="col-sm-6">: 60%</dd>
							  <dt class="col-sm-6">Indicator</dt>
							  <dd class="col-sm-6">: <span class="badge badge-danger">Padat</span></dd>
							</dl>
				  		</div>
				  	</div>
				  </div>
				  <div class="card-footer text-white">
				    <strong>Legend : </strong><span class="badge badge-success">Lancar</span> <span class="badge badge-warning">Ramai Lancar</span> <span class="badge badge-danger">Padat</span>
				  </div>
				</div>

				<div class="card border border-primary bg-dark-blue2" style="margin-top: 0.5rem; height: 220px;" id="ATPmap">
				</div>
			</div>
		</div>
	</div>    
</div>