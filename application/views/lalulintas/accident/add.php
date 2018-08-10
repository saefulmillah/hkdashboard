<form id="myForm">
  <div class="row">
  	<div class="col-md-6">
  	  <div class="form-group row">
	    <label for="event_time" class="col-sm-4 col-form-label">Waktu Kejadian</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control form-control-sm" autocomplete="off" id="event_time" name="event_time" placeholder="Date">
	    </div>
	    <div class="col-sm-2">
	      <input type="text" class="form-control form-control-sm" autocomplete="off" id="event_time_hour" name="event_time_hour" placeholder="Hour">
	    </div>
	    <div class="col-sm-2">
	      <input type="text" class="form-control form-control-sm" autocomplete="off" id="event_time_minute" name="event_time_minute" placeholder="Minute">
	    </div>
	  </div>
	  
	  <div class="form-group row">
	    <label for="lokasi_sta" class="col-sm-4 col-form-label">Lokasi (STA)</label>
	    <div class="col-sm-2">
	      <input type="number" class="form-control form-control-sm" autocomplete="off" id="sta_km" name="sta_km" placeholder="KM">
	    </div>
	    <div class="col-sm-6">
	      <input type="number" class="form-control form-control-sm" autocomplete="off" id="sta_m" name="sta_m" placeholder="Meter">
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
	    <label for="posisi" class="col-sm-4 col-form-label">Posisi</label>
	    <div class="col-sm-8">
	      <select class="form-control form-control-sm" autocomplete="off" id="posisi" name="posisi">
	      	<option selected="">Pilih Posisi</option>
	      	<?php 
	      		foreach ($posisiKecelakaan as $listposisiKecelakaan) {
	      			echo '<option value="'.$listposisiKecelakaan['id'].'">'.$listposisiKecelakaan['name'].'</option>';
	      		}
	      	 ?>
	      </select>
	    </div>
	  </div>
	  
	  <div class="form-group row">
	    <label for="cuaca" class="col-sm-4 col-form-label">Cuaca</label>
	    <div class="col-sm-8">
	      <select class="form-control form-control-sm" autocomplete="off" id="cuaca" name="cuaca">
	      	<option selected="">Pilih Cuaca</option>
	      	<?php 
	      		foreach ($cuaca as $listCuaca) {
	      			echo '<option value="'.$listCuaca['id'].'">'.$listCuaca['name'].'</option>';
	      		}
	      	 ?>
	      </select>
	    </div>
	  </div>
	  
	  <div class="form-group row">
	    <label for="jenisKecelakaan" class="col-sm-4 col-form-label">Jenis Kecelakaan</label>
	    <div class="col-sm-8">
	      <select class="form-control form-control-sm" autocomplete="off" id="jenisKecelakaan" name="jenisKecelakaan">
	      	<option selected="">Pilih Jenis Kecelakaan</option>
	      	<?php 
	      		foreach ($kecelakaan as $listkecelakaan) {
	      			echo '<option value="'.$listkecelakaan['id'].'">'.$listkecelakaan['name'].'</option>';
	      		}
	      	 ?>
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
	    <label for="sebabKecelakaan" class="col-sm-4 col-form-label">Penyebab Kecelakaan</label>
	    <div class="col-sm-8">
	      <select class="form-control form-control-sm" autocomplete="off" id="sebabKecelakaan" name="sebabKecelakaan">
	      	<option selected="">Pilih Penyebab Kecelakaan</option>
	      	<?php 
	      		foreach ($penyebabKecelakaan as $listpenyebabKecelakaan) {
	      			echo '<option value="'.$listpenyebabKecelakaan['id'].'">'.$listpenyebabKecelakaan['name'].'</option>';
	      		}
	      	 ?>
	      </select>
	    </div>
	  </div>
	  
	  <fieldset class="form-group">
	    <div class="row">
	      <legend class="col-form-label col-sm-4 pt-0">Jenis Kelamin Pengemudi</legend>
	      <div class="col-sm-8">
	        <div class="form-check">
	          <input class="form-check-input" type="radio" name="GenderDriver" id="Laki" value="M">
	          <label class="form-check-label" for="gridRadios1">
	            Laki-Laki
	          </label>
	        </div>
	        <div class="form-check">
	          <input class="form-check-input" type="radio" name="GenderDriver" id="Perempuan" value="W">
	          <label class="form-check-label" for="gridRadios2">
	            Perempuan
	          </label>
	        </div>
	        <div class="form-check disabled">
	          <input class="form-check-input" type="radio" name="GenderDriver" id="tidakDiketahui" value="U">
	          <label class="form-check-label" for="gridRadios3">
	            Tidak Diketahui
	          </label>
	        </div>
	      </div>
	    </div>
	  </fieldset>

	  <div class="form-group row">
	    <div class="col-sm-8">
	      <button type="button" class="btn btn-sm btn-primary" onclick="handle_save()">Save</button>
	      <button type="button" class="btn btn-sm btn-warning" onclick="handle_main()">Back to list</button>
	    </div>
	  </div>

  	</div>
  	<div class="col-md-6">
		<div class="form-group row">
		<label for="jmlLukaRingan" class="col-sm-4 col-form-label">Jml. luka ringan</label>
		<div class="col-sm-8">
		<input type="number" class="form-control form-control-sm" autocomplete="off" id="jmlLukaRingan" name="jmlLukaRingan" placeholder="Input Jumlah luka ringan...">
		</div>
		</div>

		<div class="form-group row">
		<label for="jmlLukaBerat" class="col-sm-4 col-form-label">Jml. luka berat</label>
		<div class="col-sm-8">
		<input type="number" class="form-control form-control-sm" autocomplete="off" id="jmlLukaBerat" name="jmlLukaBerat" placeholder="Input jumlah luka berat...">
		</div>
		</div>

		<div class="form-group row">
		<label for="jmlMeninggal" class="col-sm-4 col-form-label">Jml. korban meninggal</label>
		<div class="col-sm-8">
		<input type="number" class="form-control form-control-sm" autocomplete="off" id="jmlMeninggal" name="jmlMeninggal" placeholder="Input jumlah korban meninggal...">
		</div>
		</div>	  	  
		<div class="form-group row">
		    <label for="remarks" class="col-sm-4 col-form-label">Keterangan</label>
		    <div class="col-sm-8">
		      <textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea>
		    </div>
	  	</div>
  	</div>
  </div>
</form>