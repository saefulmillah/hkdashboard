<form id="myForm" data-parsley-validate="">
  <div class="row">
  	<div class="col-md-6">
  	  
  	  <div class="form-group row">
	    <label for="shift" class="col-sm-4 col-form-label">Shift</label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control form-control-sm" autocomplete="off" id="shift" name="shift" placeholder="Input Shift..." required="">
	    </div>
	  </div>

  	  <div class="form-group row">
	    <label for="logged_time" class="col-sm-4 col-form-label">Informasi diterima</label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control form-control-sm" autocomplete="off" id="logged_time" name="logged_time" placeholder="Date" required="">
	    </div>
	    <div class="col-sm-2">
	      <input type="text" class="form-control form-control-sm" autocomplete="off" id="logged_time_hour" name="logged_time_hour" placeholder="Hour" required="">
	    </div>
	    <div class="col-sm-2">
	      <input type="text" class="form-control form-control-sm" autocomplete="off" id="logged_time_minute" name="logged_time_minute" placeholder="Minute" required="">
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
	    <label for="status_lalin" class="col-sm-4 col-form-label">Status lalin</label>
	    <div class="col-sm-8">
	      <select class="form-control form-control-sm" autocomplete="off" id="status_lalin" name="status_lalin">
	      	<option selected="">Pilih Jalur</option>
	      	<option value="1">1</option>
	      	<option value="2">2</option>
	      	<option value="3">3</option>
	      	<option value="4">4</option>
	      </select>
	    </div>
	  </div>
  	
  	  <div class="form-group row">
		<label for="kecepatan" class="col-sm-4 col-form-label">Kecepatan</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control form-control-sm" autocomplete="off" id="kecepatan" name="kecepatan" placeholder="Input Kecepatan" required="">
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