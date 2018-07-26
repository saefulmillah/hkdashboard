<!-- Start Content -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<span class="d-block">
				<form class="form-inline" id="myForm" name="myForm">
				  <div class="form-group mb-2">
				    <input type="text" name="start_date" id="start_date" class="form-control form-control-sm shadow-sm" placeholder="Start date" autocomplete="off" value="<?=date('Y-m-d')?>">
				    &nbsp;
				    <button type="button" class="btn btn-sm btn-success" id="search">Search</button>
				    &nbsp;
				    <button type="button" class="btn btn-sm btn-success" id="export">Export</button> 
				  </div>
				</form>
			</span>
		</div>
		<div class="col-md-12">
			<table id="table" class="table table-hover table-sm table-bordered table-striped" cellspacing="0" width="100%">
				<caption>Sumber data : database intracts</caption>
				<thead>
					<tr>
						<th rowspan="2">NO</th>
						<th rowspan="2">Tanggal</th>
						<th rowspan="2">Gerbang</th>
						<th colspan="4">Shift 1</th>
						<th colspan="4">Shift 2</th>
						<th colspan="4">Shift 3</th>
						<th colspan="4">Jumlah</th>
					</tr>
					<tr>
						<th>Tunai</th>
						<th>e-Toll</th>
						<th>Rp Tunai</th>
						<th>Rp e-Toll</th>
						<th>Tunai</th>
						<th>e-Toll</th>
						<th>Rp Tunai</th>
						<th>Rp e-Toll</th>
						<th>Tunai</th>
						<th>e-Toll</th>
						<th>Rp Tunai</th>
						<th>Rp e-Toll</th>
						<th>Tunai</th>
						<th>e-Toll</th>
						<th>Rp Tunai</th>
						<th>Rp e-Toll</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>		
	</div>
</div>
<!-- End Content -->