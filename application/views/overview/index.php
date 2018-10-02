<div id="page-content-wraper">
<div class="container-fluid">
	<div class="row no-gutters">
		<div class="col-md-12">
   		   	<div class="row no-gutters">
   		   		<div class="col-md-4 chart-container" style="">
   		   			<div class="row no-gutters">
	   		   				<div class="col-md-6">
	   		   					<div class="card bg-black border border-right-0 border-bottom-0 border-blue" style="height: 14rem;">
								  <h7 class="card-header font-roboto text-white bg-blue-transparent" style="">Daily Revenue</h7>
								  <div class="card-body text-info font-roboto" style="">
								  	<div id="container-chart" style="height: 6.5rem; margin: 0 auto;"></div>
								  	<dl class="row">
								  		<dt class="col-sm-3"><small>Lalin</small></dt class="text-white">
								  		<dd class="col-sm-9"><small><span id="txtLalinGearDaily" class="text-white float-right">0</span></small></dd>
								  		<dt class="col-sm-5"><small><span class="">Pendapatan</span></small></dt>
								  		<dd class="col-sm-7"><small><span id="txtRevenueGearDaily" class="text-white float-right">0</span></small></dd>
								  	</dl>
								  </div>
								</div>
	   		   				</div>
	   		   				<div class="col-md-6">
	   		   					<div class="card bg-black border border-bottom-0 border-blue" style="height: 14rem;">
								  <h7 class="card-header font-roboto text-white bg-blue-transparent" style="">Tingkat Kepuasan</h7>
								  <div class="card-body text-white font-roboto" style="padding: .7rem 1rem !important;">
								  	<div class="row">
								  		<div class="col-md-12">
											<div class="star-ratings-sprite"><span class="star-ratings-sprite-rating" id="starLayananInformasi"></span></div>
											<small>Layanan Informasi (3.2/5)</small>
											<div class="star-ratings-sprite"><span class="star-ratings-sprite-rating" id="starKondisiTunnel"></span></div>
											<small>Kondisi Tunnel (3.7/5)</small>
											<div class="star-ratings-sprite"><span class="star-ratings-sprite-rating" id="starRambuJalan"></span></div>
											<small>Rambu Jalan (3.5/5)</small>
											<div class="star-ratings-sprite"><span class="star-ratings-sprite-rating" id="starKondisiJalan"></span></div>
											<small>Kondisi Jalan (3.4/5)</small>
								  		</div>
								  	</div>
								  </div>
								</div>
	   		   				</div>
	   		   				<div class="col-md-12">
	   		   					<div class="card bg-black border border-bottom-0 border-blue" style="">
	   		   					  <h7 class="card-header font-roboto text-white bg-blue-transparent" style="">Monthly  Revenue</h7>
								  <div class="card-body text-info font-roboto" style="min-height: 6.4rem; padding: 1.7rem 2rem;">
								  	<div class="row">
	   		   							<div class="col-md-4">
	   		   								<div class="arc e1 c_ease"><span id="txtRevenue">0</span>%</div>	
	   		   							</div>
	   		   							<div class="col-md-8">
	   		   								<small>Lalin <span id="txtLalinGear" class="text-white float-right"></span></small>
										  	<div class="progress">
											  <div class="progress-bar bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" id="barRevenue"></div>
											</div>
											<br>
											<small><span class="">Pendapatan</span> <span id="txtRevenueGear" class="text-white float-right"></span></small>
											<div class="progress">
											  <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
	   		   							</div>
	   		   						</div>	
								  </div>
								</div>
	   		   				</div>
   		   					<div class="col-md-12">
   		   					 	<div class="card bg-black border border-bottom-0 border-blue" style="">
	   		   					  <h7 class="card-header font-roboto text-white bg-blue-transparent" style="">Yearly  Revenue</h7>
								  <div class="card-body text-info font-roboto" style="min-height: 6.4rem; padding: 1.7rem 2rem;">
								  	<div class="row">
	   		   							<div class="col-md-4">
	   		   								<div class="arc e3 c_ease">
										      <div class="counterspin5"><span id="txtRevenueYearly">0</span>%</div>
										    </div>	
	   		   							</div>
	   		   							<div class="col-md-8">
	   		   								<small>Lalin <span id="txtLalinGearYearly" class="text-white float-right"></span></small>
										  	<div class="progress">
											  <div class="progress-bar bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" id="barRevenueYearly"></div>
											</div>
											<br>
											<small><span class="">Pendapatan</span> <span id="txtRevenueGearYearly" class="text-white float-right"></span></small>
											<div class="progress">
											  <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										  </div>
	   		   							</div>
	   		   						</div>	
							  	</div>
							</div>
	   		   				<div class="col-md-4">
	   		   					<div class="card bg-black border border-blue" style="">
								  <h7 class="card-header font-roboto border-right-0 text-white bg-blue-transparent" style="">Accident Rate</h7>
								  <div class="card-body text-white font-roboto" style="min-height: 12.1rem;">
								  	  <div class="progress progress-bar-vertical">
									    <div class="progress-bar bg-primary" id="barAccident" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
									      <span class="sr-only">60% Complete</span>
									    </div>
									  </div>
									  <small class="">Current
									  	<h6 id="txtAccidentCurrent">0.00</h6>
									  </small>
									  <small class="">Limit
									  	<h6 id="txtAccidentLimit">2.66</h6>
									  </small>
								  </div>
								</div>
	   		   				</div>
	   		   				<div class="col-md-4">
	   		   					<div class="card bg-black border border-left-0 border-right-0 border-blue" style="">
								  <h7 class="card-header font-roboto text-white bg-blue-transparent" style="">Complain</h7>
								  <div class="card-body text-white font-roboto" style="min-height: 12.1rem;">
								  	  <div class="progress progress-bar-vertical">
									    <div class="progress-bar bg-primary" id="barComplain" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
									      <span class="sr-only">60% Complete</span>
									    </div>
									  </div>
									  <small class="">Current
									  	<h6 id="txtComplainCurrent">0.00</h6>
									  </small>
									  <small class="">Limit
									  	<h6 id="txtComplainLimit">0.00</h6>
									  </small>
								  </div>
								</div>
	   		   				</div>
							<div class="col-md-4">
	   		   					<div class="card bg-black border border-blue" style="">
								  <h7 class="card-header font-roboto text-white bg-blue-transparent" style="">Potholes</h7>
								  <div class="card-body text-white font-roboto" style="min-height: 12.1rem;">
								  	  <div class="progress progress-bar-vertical">
									    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="height: 60%;">
									      <span class="sr-only">60% Complete</span>
									    </div>
									  </div>
									  <small class="">Current
									  	<h6>0.00</h6>
									  </small>
									  <small class="">Limit
									  	<h6>2.66</h6>
									  </small>
								  </div>
								</div>
	   		   				</div>
   		   			</div>
				</div>
				<div class="col-md-4 chart-container">
					<div class="card bg-transparent" style=" color: yellow;">
						<marquee><span align="center" class="font-roboto m-0 p-1">PT Hutama Karya (Persero) - Indonesia's Most Valuable. Infrastructure Developer</span></marquee>
					</div>
					<div class="card bg-transparent" style="">
					  <!-- <h7 class="card-header font-roboto text-white bg-blue-transparent" style="">Traffic Monitoring</h7> -->
					  <div class="card-body bg-transparent text-info p-1">
					  	<h3 align="center" class="text-white font-roboto m-0 p-1">AKSES TANJUNG PRIOK</h3>
					  </div>
					</div>
					<div class="card bg-blue-transparent" style="position: relative; top: 5rem; margin-bottom: 10rem; padding: 5rem; z-index: -1; background-image: url(<?=base_url('assets/images/bg-core.png')?>); background-size: 170%; background-position: 50% 50%;">
						<div style="align-self: center; position: inherit; background-image: url(<?=base_url('assets/images/core.png')?>); background-size: cover; height: 22rem; width: 22rem;">
						  	<div style="position: inherit; top: 4.71rem; left: 4.66rem; height: 100%; width: 100%;">
						  		<div class="semi_arc e6">
							      <div class="semi_arc_3 e5_1">
							        <div class="semi_arc_3 e5_2">
							          <div class="semi_arc_3 e5_3">
							            <div class="semi_arc_3 e5_4">
							            </div>
							          </div>
							        </div>
							      </div>
							      <div class="core2"><span class="font-roboto text-info" style="color: #000;">90%</span></div>
							    </div>
						  	</div>
						</div>
					</div>		
				</div>
				<div class="col-md-4 chart-container" style="">	
					<!-- <div class="card border border-blue shadow-blue" style="background-color: rgba(0, 0, 0, 1);"> -->
					<div class="card bg-black border border-bottom-0 border-blue" style="">
					  <h7 class="card-header font-roboto text-white bg-blue-transparent" style="">Revenue 01 - <?=date('d').' '.date('F')." '".date('y')?></h7>
					  <div class="card-body text-white font-roboto p-0" style="">
					  	<div class="d-flex p-0">
			  				<div class="px-3 pt-3 flex-fill border border-left-0 border-right-0 border-bottom-0 border-blue">
			  					<dl>
					  				<dt>Total Lalin</dt>
					  				<dd><h3><span id="txtTotalLalin">0</span></h3></dd>
					  				<dt>Total Pendapatan</dt>
					  				<dd><h5><span id="txtTotalPendapatan">0</span></h5></dd>
					  			</dl>
			  				</div>

			  				<div class="p-0 flex-fill border border-right-0 border-right-0 border-bottom-0 border-blue">
			  					<table class="table table-sm font-weight-light m-0" style="font-size: .8rem;">
					  				<tr>
					  					<td width="50"><span class="text-warning">BNI</span></td>
					  					<td><span id="txtBNI" class="float-right text-white font-weight-bold">0</span></td>
					  				</tr>

					  				<tr>
					  					<td><span class="text-warning">Mandiri</span></td>
					  					<td><span id="txtMandiri" class="float-right text-white font-weight-bold">0</span></td>
					  				</tr>

					  				<tr>
					  					<td><span class="text-warning">BCA</span></td>
					  					<td><span id="txtBCA" class="float-right text-white font-weight-bold">0</span></td>
					  				</tr>

					  				<tr>
					  					<td><span class="text-warning">BRI</span></td>
					  					<td><span id="txtBRI" class="float-right text-white font-weight-bold">0</span></td>
					  				</tr>

					  				<tr>
					  					<td><span class="text-warning">Tunai</span></td>
					  					<td><span id="txtTunai" class="float-right text-white font-weight-bold">0</span></td>
					  				</tr>

					  			</table>
			  				</div>
			  			</div>
					  	<!-- <div class="row">
					  		
					  		<div class="col-md-6" style="font-size: .7rem;"> -->
					  			<!-- <dl class="row p-1">
					  				<dt class="col-sm-5"><span class="text-info">BNI</span></dt>
					  				<dd class="col-md-7"><span id="txtBNI" class="float-right text-white">0</span></dd>
					  				<dt class="col-sm-5"><span class="text-info">Mandiri</span></dt>
					  				<dd class="col-md-7"><span id="txtMandiri" class="float-right text-white">0</span></dd>
					  				<dt class="col-sm-5"><span class="text-info">BCA</span></dt>
					  				<dd class="col-md-7"><span id="txtBCA" class="float-right text-white">0</span></dd>
					  				<dt class="col-sm-5"><span class="text-info">BRI</span></dt>
					  				<dd class="col-md-7"><span id="txtBRI" class="float-right text-white">0</span></dd>
					  				<dt class="col-sm-5"><span class="text-info">Tunai</span></dt>
					  				<dd class="col-md-7"><span id="txtTunai" class="float-right text-white">0</span></dd>
					  			</dl> -->
					  			<!-- <ul class=leaders>
									<li><span>Salmon Ravioli</span>
									 <span>7.95</span>
									<li><span>Fried Calamari</span>
									 <span>8.95</span>
									<li><span>Almond Prawn</span>
									 <span>7.95</span>
									<li><span>Bruschetta</span>
									 <span>5.25</span>
									<li><span>Margherita Pizza</span>
									 <span>10.95</span>
								</ul> -->
					  		<!-- </div>
					  	</div> -->
					  </div>
					</div>
					<div class="card bg-black border border-bottom-0 border-blue" style="">
					  <!-- <h7 class="card-header font-roboto text-info text-center">Traffic Monitoring</h7> -->
					  <h7 class="card-header font-roboto text-white bg-blue-transparent" style="">Traffic Monitoring</h7>
					  <div class="card-body text-info p-0">
					  	<div class="d-flex text-white font-roboto">
					  		<div class="p-2 flex-fill border border-left-0 border-bottom-0 border-blue">
					  			<span class="bg-dark px-2" style="width: fit-content; font-size: 1rem;">A</span>
					  			<!-- <div id="RTMS" align="center" class=""></div> -->
					  			<div id="loader-wrapper">
		                            <img src="<?=base_url('assets/images/speedometer.png')?>" class="background">
		                            <div class="loader">
		                                <div class="line"></div>
		                                <div class="line"></div>
		                                <div class="line"></div>
		                                <div class="line"></div>
		                                <div class="line"></div>
		                                <div class="line"></div>
		                                <div class="subline"></div>
		                                <div class="subline"></div>
		                                <div class="subline"></div>
		                                <div class="subline"></div>
		                                <div class="subline"></div>
		                                <div class="loader-circle-1">
		                                    <div class="loader-circle-2"></div>
		                                </div>
		                                <div class="needle_A" style="transform: rotate(90deg);"></div>
		                                <span class="loading_A">0 km/h</span>
		                            </div>
		                        </div>
			  					<small class="float-left">Avg. Speed</small>
			  					<small class="float-right avgspeed_A">0 Km/H</small>
			  					<br>
			  					<small class="float-left">Status</small>
			  					<small class="float-right badge badge-danger">Padat</small>
					  		</div>
					  		<div class="p-2 flex-fill border border-left-0 border-right-0 border-bottom-0 border-blue">
					  			<span class="bg-dark px-2" style="width: fit-content; font-size: 1rem">B</span>
					  			<div id="loader-wrapper">
		                            <img src="<?=base_url('assets/images/speedometer.png')?>" class="background">
		                            <div class="loader">
		                                <div class="line"></div>
		                                <div class="line"></div>
		                                <div class="line"></div>
		                                <div class="line"></div>
		                                <div class="line"></div>
		                                <div class="line"></div>
		                                <div class="subline"></div>
		                                <div class="subline"></div>
		                                <div class="subline"></div>
		                                <div class="subline"></div>
		                                <div class="subline"></div>
		                                <div class="loader-circle-1">
		                                    <div class="loader-circle-2"></div>
		                                </div>
		                                <div class="needle_B" style="transform: rotate(90deg);"></div>
		                                <span class="loading_B">0 km/h</span>
		                            </div>
		                        </div>
			  					<small class="float-left">Avg. Speed</small>
			  					<small class="float-right avgspeed_B">0 Km/H</small>
			  					<br>
			  					<small class="float-left">Status</small>
			  					<small class="float-right badge badge-danger">Padat</small>
					  		</div>
					  	</div>
					  </div>
					  <!-- <div class="card-footer text-info">
					    <strong>Legend : </strong><span class="text-white">Lancar</span> <span class="text-white">Ramai Lancar</span> <span class="badge badge-danger">Padat</span>
					  </div> -->
					</div>
					<div class="card bg-black border border-blue" style=" padding: 1px;">
						<div id="ATPmap" style="height: 20rem;"></div>
					</div>
				</div>
   		   	</div>						
		</div>
	</div>    
</div>
</div>