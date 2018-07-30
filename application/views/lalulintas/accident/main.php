<div class="row">
	<div class="col-md-12">
		<span class="d-block">
			<form class="form-inline" action="<?=site_url('Transaction/LaporanHarian/getExcel')?>" id="myForm" name="myForm" method="POST" target="_BLANK">
			  <div class="form-group mb-2">
			    <input type="text" name="start_date" id="start_date" class="form-control form-control-sm shadow-sm" placeholder="Start date" autocomplete="off">
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
                    <th>Waktu Kejadian</th>
                    <th>Lokasi(STA)</th>
                    <th>Jalur</th>
                    <th>Posisi</th>
                    <th>Cuaca</th>
                    <th>Jenis Kecelakaan</th>
                    <th>Jenis Kendaraan</th>
                    <th>Penyebab</th>
                    <th>Gender</th>
                    <th>Luka Ringan</th>
                    <th>Luka Berat</th>
                    <th>Meninggal</th>
                    <th>Keterangan</th>
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