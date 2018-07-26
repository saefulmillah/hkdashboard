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
	                    <th>No</th>
	                    <th>Gerbang</th>
	                    <th>Total Lalin</th>
	                    <th>Total Pendapatan</th>
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
	                </tr>
	            </tfoot>
	        </table>
		</div>		
	</div>
</div>
<!-- End Content -->