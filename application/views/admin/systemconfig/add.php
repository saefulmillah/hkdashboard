<form id="myForm">
  <div class="row">
  	<div class="col-md-6">	  
	  
	  <div class="form-group row">
	    <label for="name" class="col-sm-4 col-form-label">Name</label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control form-control-sm" autocomplete="off" id="name" name="name" placeholder="Input name...">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label for="name" class="col-sm-4 col-form-label">String Value</label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control form-control-sm" autocomplete="off" id="stringValue" name="stringValue" placeholder="Input string value...">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label for="name" class="col-sm-4 col-form-label">Integer Value</label>
	    <div class="col-sm-8">
	      <input type="number" class="form-control form-control-sm" autocomplete="off" id="IntValue" name="IntValue" placeholder="Input integer value...">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label for="name" class="col-sm-4 col-form-label">Float Value</label>
	    <div class="col-sm-8">
	      <input type="number" class="form-control form-control-sm" autocomplete="off" id="FloatValue" name="FloatValue" placeholder="Input float value...">
	    </div>
	  </div>
	  <div class="form-group row">
		<label for="description" class="col-sm-4 col-form-label">Description</label>
		<div class="col-sm-8">
		  <textarea class="form-control" id="description" name="description" rows="3"></textarea>
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