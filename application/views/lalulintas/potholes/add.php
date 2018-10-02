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
	    <label for="lajur" class="col-sm-4 col-form-label">Lajur</label>
	    <div class="col-sm-8">
	      <select class="form-control form-control-sm" autocomplete="off" id="lajur" name="lajur">
	      	<option selected="">Pilih Jalur</option>
	      	<option value="1">1</option>
	      	<option value="2">2</option>
	      	<option value="3">3</option>
	      	<option value="4">4</option>
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
	    <label for="potholes_type" class="col-sm-4 col-form-label">Kategori</label>
	    <div class="col-sm-8">
	      <select class="form-control form-control-sm" autocomplete="off" id="potholes_type" name="potholes_type">
	      	<option selected="">Pilih Kategori</option>
	      	<option value="A">A</option>
	      	<option value="B">B</option>
	      	<option value="C">C</option>
	      	<option value="D">D</option>
	      	<option value="E">E</option>
	      </select>
	    </div>
	  </div>

	  <div class="form-group row">
	    <label for="lokasi_sta" class="col-sm-4 col-form-label">Pelapor</label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control form-control-sm" autocomplete="off" id="pelapor" name="pelapor" placeholder="Pelapor">
	    </div>
	  </div>
	  
	  <div class="form-group row">
	    <div class="col-sm-8">
	      <button type="button" class="btn btn-sm btn-primary" onclick="handle_save()">Save</button>
	      <button type="button" class="btn btn-sm btn-warning" onclick="handle_main()">Back to list</button>
	    </div>
	  </div>

  	</div>
  </div>
</form>