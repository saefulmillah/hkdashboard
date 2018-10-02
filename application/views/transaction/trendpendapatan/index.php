<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<span class="d-block">
				<form class="form-inline" action="<?=site_url('Transaction/TrendPendapatan/getExcel')?>" id="myForm" name="myForm" method="POST" target="_BLANK">
					  <div class="form-group mb-2">
					  	<label>Start</label>
						&nbsp;
						<input type="text" name="start_date" id="start_date" class="form-control form-control-sm shadow-sm" placeholder="Start date" autocomplete="off" value="2018-01-01">
						&nbsp;
						<label>End</label>
						&nbsp;
						<input type="text" name="end_date" id="end_date" class="form-control form-control-sm shadow-sm" placeholder="end date" autocomplete="off" value="<?=date('Y-m-d')?>">
						&nbsp;
						Hari &nbsp;
						 <select class="form-control form-control-sm" name="hari">
						 	<option value="1">Minggu</option>
						 	<option value="2">Senin</option>
						 	<option value="3">Selasa</option>
						 	<option value="4">Rabu</option>
						 	<option value="5">Kamis</option>
						 	<option value="6">Jumat</option>
						 	<option value="7">Sabtu</option>
						 </select>
						&nbsp;
						Gerbang &nbsp;
						<?php 
						 echo '<select name="gerbang" class="form-control form-control-sm">';
						 			echo '<option value="-">Semua Gerbang</option>';
						    foreach ($gerbang as $row) {
							  		echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						     } 
						 echo '</select>';
						 ?>
						&nbsp;
						Gardu &nbsp;
						 <select class="form-control form-control-sm" name="gardu">
						 	<option value="-" selected>--</option>
						 	<option value="1">1</option>
						 	<option value="2">2</option>
						 </select>
						&nbsp;
						Shift&nbsp;
						<select class="form-control form-control-sm" name="shift">
							<option value="-" selected>--</option>
						 	<option value="1">1</option>
						 	<option value="2">2</option>
						 	<option value="3">3</option>
						</select>
						&nbsp;
						<button type="button" class="btn btn-sm btn-success" id="search" onclick="handle_search()"><i class="fa fa-search"></i> Search</button>
						&nbsp;
						<button type="submit" class="btn btn-sm btn-success" id="export"><i class="fa fa-file-export"></i> Excel</button> 
					</div>
				</form>
			</span>
		</div>
		<div class="col-md-12">
			<div class="col-md-12 chart-container" id="TrendPendapatan">
		    </div>
		</div>		
	</div>
</div>

