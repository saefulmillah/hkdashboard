<!-- Start Content -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<span class="d-block">
				<form class="form-inline" action="<?=site_url('Transaction/RekapitulasiTransaksi/getExcel')?>" id="myForm" name="myForm" method="POST" target="_BLANK">
				  <div class="form-group mb-2" id="content-periode">
				  	<label>Date</label>
				  	&nbsp;
				    <input type="text" name="start_date" id="start_date" class="form-control form-control-sm shadow-sm" placeholder="Start date" autocomplete="off" value="<?=date('Y-m-d')?>">
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
	                    <th>Gerbang</th>
			            <th>NoGerbang</th>
			            <th>Gerbang</th>
			            <th>NoGardu</th>
			            <th>Shift</th>
			            <th>Waktu</th>
			            <th>STATUS</th>
			            <th>Golongan</th>
			            <th>Metoda</th>
			            <th>IdKspt</th>
			            <th>IdPul</th>
			            <th></th>
	                </tr>
	            </thead>
	            <tbody>
	            </tbody>
	        </table>
		</div>		
	</div>
</div>
<!-- End Content -->