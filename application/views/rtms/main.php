<div class="row">
	<div class="col-md-12">
		<span class="d-block">
			<form class="form-inline" action="<?=site_url('Lalulintas/Senkom/getExcel')?>" id="myForm" name="myForm" method="POST" target="_BLANK">
			  <div class="form-group mb-2">
			    <input type="text" name="start_date" id="start_date" class="form-control form-control-sm shadow-sm" placeholder="Start date" autocomplete="off">
                &nbsp;
                <input type="text" name="end_date" id="end_date" class="form-control form-control-sm shadow-sm" placeholder="End date" autocomplete="off">
			    &nbsp;
			    <button type="button" class="btn btn-sm btn-success" id="search"><i class="fa fa-search"></i> Search</button>
			    &nbsp;
			    <button type="submit" class="btn btn-sm btn-success" id="export"><i class="fa fa-file-export"></i> Excel</button> 
			    &nbsp;
			    <button type="button" class="btn btn-sm btn-info" onclick="handle_new()"><i class="fa fa-plus"></i> New</button> 
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
                    <th>Shift</th>
                    <th>Kecepatan</th>
                    <th>Jalur</th>
                    <th>Waktu Pengukuran</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
	</div>		
</div>