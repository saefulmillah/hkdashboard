<div class="row">
	<div class="col-md-12">
		<span class="d-block">
			<form class="form-inline" action="<?=site_url('Transaction/LaporanHarian/getExcel')?>" id="myForm" name="myForm" method="POST" target="_BLANK">
			  <div class="form-group mb-2">
			    Tahun 
                &nbsp;
                 <select class="form-control form-control-sm" name="tahun">
                    <option value="2018">2018</option>
                 </select>
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
                    <th>Year</th>
                    <th>Month</th>
                    <th>Accident Level</th>
                    <th>Fatality Level</th>
                    <th>LHR</th>
                    <th>Accident Level Limit</th>
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
                </tr>
            </tfoot>
        </table>
	</div>		
</div>