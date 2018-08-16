<!-- Start Content -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<span class="d-block">
				<form class="form-inline" action="<?=site_url('Transaction/RekapitulasiTransaksi/getExcel')?>" id="myForm" name="myForm" method="POST" target="_BLANK">
				  <div class="form-group mb-2" id="content-periode">
				  	<label>Tahun</label>
				  	&nbsp;
				  	<select class="form-control form-control-sm" name="tahun" id="tahun">
				  		<option value="-" selected="">-</option>
				  		<option value="2018">2018</option>
				  		<option value="2017">2017</option>
				  	</select>
				  	&nbsp;
				  	<label>Bulan</label>
				  	&nbsp;
				  	<select class="form-control form-control-sm" name="bulan" id="bulan">
				  		<option value="-" selected="">-</option>
				  		<?php echo $bulan ?>
				  	</select>
				  	&nbsp;
				  	<label>Category</label>
				  	&nbsp;
				  	<select class="form-control form-control-sm" name="category" id="category">
				  		<option value="-" selected="">-</option>
				  		<option value="1">Keluhan</option>
				  		<option value="2">Info Lalu Lintas</option>
				  		<option value="3">Info Kecelakaan</option>
				  		<option value="4">Panic Button</option>
				  		<option value="5">Lain-lain</option>
				  	</select>
				  	&nbsp;
				  	<label>Info/Keluhan</label>
				  	&nbsp;
				    <input type="text" name="info_keluhan" id="info_keluhan" class="form-control form-control-sm shadow-sm" placeholder="" autocomplete="off" value="">
				  </div>
				  <div class="form-group mb-2" id="content-periode">
				  	&nbsp;
				    <button type="button" class="btn btn-sm btn-success" id="search"><i class="fa fa-search"></i> Search</button>
				    &nbsp;
				    <button type="submit" class="btn btn-sm btn-success" id="export"><i class="fa fa-file-export"></i> Excel</button> 
				  </div>
				</form>
			</span>
		</div>
		<div class="col-md-12">
			<table id="table" class="table table-hover table-sm table-bordered table-striped" cellspacing="0" width="100%">
				<caption>Sumber data : database intracts</caption>
	            <thead>
	                <tr>
	                    <th>No</th>
	                    <th>#</th>
	                    <th>#</th>
	                    <th>Status</th>
	                    <th>Event Time</th>
	                    <th>Category</th>
	                    <th>Info/Feedback</th>
	                    <th>Notes</th>
	                    <th>Submitter Phone</th>
	                    <th>Submitter Email</th>
	                    <th>Submitter Time</th>
	                </tr>
	            </thead>
	            <tbody>
	            </tbody>
	        </table>
		</div>		
	</div>
</div>
<!-- End Content -->