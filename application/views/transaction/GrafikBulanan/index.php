<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<span class="d-block">
				<form class="form-inline" action="<?=site_url('Transaction/GrafikBulanan/getExcel')?>" id="myForm" name="myForm" method="POST" target="_BLANK">
				  <div class="form-group mb-2">
				  	Tahun &nbsp;
					 <select class="form-control form-control-sm" name="tahun">
					 	<option value="2018">2018</option>
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
				    <button type="button" class="btn btn-sm btn-success" id="search" onclick="handle_search()"><i class="fa fa-search"></i> Search</button>
				    &nbsp;
				    <button type="submit" class="btn btn-sm btn-success" id="export"><i class="fa fa-file-export"></i> Excel</button> 
				  </div>
				</form>
			</span>
		</div>
		<div class="col-md-12">
			<div class="col-md-12 chart-container" id="GrafikBulanan">
		    </div>
		</div>		
	</div>
</div>

