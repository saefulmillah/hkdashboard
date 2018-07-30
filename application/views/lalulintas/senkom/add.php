<form id="myForm">
  <div class="row">
  	<div class="col-md-6">
  	  
  	  <div class="form-group row">
	    <label for="shift" class="col-sm-4 col-form-label">Shift</label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control form-control-sm" autocomplete="off" id="shift" name="shift" placeholder="Input Shift...">
	    </div>
	  </div>

  	  <div class="form-group row">
	    <label for="logged_time" class="col-sm-4 col-form-label">Informasi diterima</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control form-control-sm" autocomplete="off" id="logged_time" name="logged_time" placeholder="Date">
	    </div>
	    <div class="col-sm-2">
	      <input type="text" class="form-control form-control-sm" autocomplete="off" id="logged_time_hour" name="logged_time_hour" placeholder="Hour">
	    </div>
	    <div class="col-sm-2">
	      <input type="text" class="form-control form-control-sm" autocomplete="off" id="logged_time_minute" name="logged_time_minute" placeholder="Minute">
	    </div>
	  </div>

	  <div class="form-group row">
	    <label for="arrived_time" class="col-sm-4 col-form-label">Tiba di TKP</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control form-control-sm" autocomplete="off" id="arrived_time" name="arrived_time" placeholder="Date">
	    </div>
	    <div class="col-sm-2">
	      <input type="text" class="form-control form-control-sm" autocomplete="off" id="arrived_time_hour" name="arrived_time_hour" placeholder="Hour">
	    </div>
	    <div class="col-sm-2">
	      <input type="text" class="form-control form-control-sm" autocomplete="off" id="arrived_time_minute" name="arrived_time_minute" placeholder="Minute">
	    </div>
	  </div>
	  
	  <div class="form-group row">
	    <label for="reporter_name" class="col-sm-4 col-form-label">Nama Pelapor</label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control form-control-sm" autocomplete="off" id="reporter_name" name="reporter_name" placeholder="Input Nama Pelapor...">
	    </div>
	  </div>

	  <div class="form-group row">
	    <label for="reporter_phone" class="col-sm-4 col-form-label">HP/Tlp Pelapor</label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control form-control-sm" autocomplete="off" id="reporter_phone" name="reporter_phone" placeholder="HP/Tlp Pelapor...">
	    </div>
	  </div>

	  <div class="form-group row">
	    <label for="reporter_address" class="col-sm-4 col-form-label">Alamat Pelapor</label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control form-control-sm" autocomplete="off" id="reporter_address" name="reporter_address" placeholder="Alamat Pelapor...">
	    </div>
	  </div>

	  <div class="form-group row">
	    <label for="lokasi_sta" class="col-sm-4 col-form-label">Lokasi (STA)</label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control form-control-sm" autocomplete="off" id="lokasi_sta" name="lokasi_sta" placeholder="Input Lokasi (STA)...">
	    </div>
	  </div>
	  
	  <div class="form-group row">
	    <label for="jalur" class="col-sm-4 col-form-label">Jalur</label>
	    <div class="col-sm-8">
	      <select class="form-control form-control-sm" autocomplete="off" id="jalur" name="jalur">
	      	<option selected="">Pilih Jalur</option>
	      	<option value="A">A</option>
	      	<option value="B">B</option>
	      </select>
	    </div>
	  </div>

	  <div class="form-group row">
	    <label for="kendaraan" class="col-sm-4 col-form-label">Jenis Kendaraan</label>
	    <div class="col-sm-8">
	      <select class="form-control form-control-sm" autocomplete="off" id="kendaraan" name="kendaraan">
	      	<option selected="">Pilih Jenis Kendaraan</option>
	      	<?php 
	      		foreach ($kendaraan as $listkendaraan) {
	      			echo '<option value="'.$listkendaraan['id'].'">'.$listkendaraan['name'].'</option>';
	      		}
	      	 ?>
	      </select>
	    </div>
	  </div>

	  <div class="form-group row">
	    <label for="golongan" class="col-sm-4 col-form-label">Golongan</label>
	    <div class="col-sm-8">
	      <select class="form-control form-control-sm" autocomplete="off" id="golongan" name="golongan">
	      	<option selected="">Pilih Golongan</option>
	      	<option value="I">I</option>
	      	<option value="II">II</option>
	      	<option value="III">III</option>
	      	<option value="IV">IV</option>
	      	<option value="V">V</option>
	      </select>
	    </div>
	  </div>

	  <div class="form-group row">
	    <div class="col-sm-8">
	      <button type="button" class="btn btn-sm btn-primary" onclick="handle_save()">Save</button>
	      <button type="button" class="btn btn-sm btn-warning" onclick="handle_main()">Back to list</button>
	    </div>
	  </div>

  	</div>
  	<div class="col-md-6">

		<div class="form-group row">
			<label for="vehicle_identification_number" class="col-sm-4 col-form-label">No. Polisi</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control form-control-sm" autocomplete="off" id="vehicle_identification_number" name="vehicle_identification_number" placeholder="Input No Polisi...">
			</div>
		</div>

		<div class="form-group row">
		    <label for="vehicle_support" class="col-sm-4 col-form-label">Bantuan Kendaraan</label>
		    <div class="col-sm-8">
		      <select class="form-control form-control-sm" autocomplete="off" id="vehicle_support" name="vehicle_support">
		      	<option selected="">Pilih Bantuan Kendaraan</option>
		      	<option value="derek">Derek</option>
		      	<option value="rescue">Rescue</option>
		      </select>
		    </div>
	  	</div>

	  	<div class="form-group row">
			<label for="tow_code" class="col-sm-4 col-form-label">Kode Kendaraan</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control form-control-sm" autocomplete="off" id="tow_code" name="tow_code" placeholder="Input Kode Kendaraan...">
			</div>
		</div>

		<div class="form-group row">
			<label for="stp_code" class="col-sm-4 col-form-label">No. STP</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control form-control-sm" autocomplete="off" id="stp_code" name="stp_code" placeholder="Input No STP...">
			</div>
		</div>		

		<div class="form-group row">
		    <label for="information" class="col-sm-4 col-form-label">Uraian Informasi</label>
		    <div class="col-sm-8">
		      <textarea class="form-control" id="information" name="information" rows="3"></textarea>
		    </div>
	  	</div>

	  	<div class="form-group row">
		    <label for="notes" class="col-sm-4 col-form-label">Keterangan</label>
		    <div class="col-sm-8">
		      <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
		    </div>
	  	</div>
  	</div>
  </div>
</form>