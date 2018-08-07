<div class="row">
	<div class="col-md-12">
		<span class="d-block">
			<form class="form-inline" action="<?=site_url('Transaction/LaporanHarian/getExcel')?>" id="myForm" name="myForm" method="POST" target="_BLANK">
			  <div class="form-group mb-2">
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
                    <th>Name</th>
                    <th>String Value</th>
                    <th>Integer Value</th>
                    <th>Float Value</th>
                    <th>Date Value</th>
                    <th>Description</th>
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