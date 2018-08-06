<!-- Start Content -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<span class="d-block">
				<form class="form-inline" action="<?=site_url('Transaction/RekapitulasiLalin/getExcel')?>" id="myForm" name="myForm" method="POST" target="_BLANK">
				  <div class="form-group mb-2">
				  	<label>Start</label>
				  	&nbsp;
				    <input type="text" name="start_date" id="start_date" class="form-control form-control-sm shadow-sm" placeholder="Start date" autocomplete="off" value="<?=date('Y-m-d', strtotime('-1 days'))?>">
				    &nbsp;
				    <label>End</label>
				  	&nbsp;
				    <input type="text" name="end_date" id="end_date" class="form-control form-control-sm shadow-sm" placeholder="Start date" autocomplete="off" value="<?=date('Y-m-d')?>">
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
						<th rowspan="2">NO</th>
						<th rowspan="2">Gerbang</th>
						<th rowspan="2">Gardu</th>
						<th colspan="2">Gol 1</th>
						<th colspan="2">Gol 2</th>
						<th colspan="2">Gol 3</th>
						<th colspan="2">Gol 4</th>
						<th colspan="2">Gol 5</th>
						<th rowspan="2">Total</th>
						<th rowspan="2">Rp</th>
					</tr>
					<tr>
						<th>Lalin</th>
						<th>Rp</th>
						<th>Lalin</th>
						<th>Rp</th>
						<th>Lalin</th>
						<th>Rp</th>
						<th>Lalin</th>
						<th>Rp</th>
						<th>Lalin</th>
						<th>Rp</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
				<tfoot>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</tfoot>
			</table>
		</div>		
	</div>
</div>
<!-- End Content -->