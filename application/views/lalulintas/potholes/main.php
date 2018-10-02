<div class="row">
	<div class="col-md-12">
		<span class="d-block">
			<form class="form-inline" action="<?=site_url('lalulintas/Accident/getExcel')?>" id="myForm" name="myForm" method="POST" target="_BLANK">
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
                    <th>Action</th>
                    <th>waktu</th>
                    <th>sta</th>
                    <th>lane</th>
                    <th>position_id</th>
                    <th>lajur</th>
                    <th>potholes_type</th>
                    <th>pelapor</th>
                    <th>foto</th>
                    <th>Status</th>
                    <th>create_by</th>
                    <th>create_date</th>
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
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Penanganan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" id="myFormModal">
            <input type="hidden" name="potholes_id" id="potholes_id" value="">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="form-group row no-gutters">
                        <label for="event_time" class="col-sm-4 col-form-label">Waktu Kejadian</label>
                        <div class="col-sm-4 pr-1">
                          <input type="text" class="form-control form-control-sm" autocomplete="off" id="event_time" name="event_time" placeholder="Date">
                        </div>
                        <div class="col-sm-2 pr-1">
                          <input type="text" class="form-control form-control-sm" autocomplete="off" id="event_time_hour" name="event_time_hour" placeholder="Hour">
                        </div>
                        <div class="col-sm-2">
                          <input type="text" class="form-control form-control-sm" autocomplete="off" id="event_time_minute" name="event_time_minute" placeholder="Minute">
                        </div>
                    </div>

                    <div class="form-group row no-gutters">
                        <label for="event_time" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" name="status">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row no-gutters">
                        <label for="event_time" class="col-sm-4 col-form-label">Foto</label>
                        <div class="col-sm-8">
                            <input type="file" name="foto_handling" id="foto_handling" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="form-group row no-gutters">
                        <label for="event_time" class="col-sm-4 col-form-label">Notes</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" cols="2" name="notes"></textarea>
                        </div>
                    </div>


                </div>  


            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save" onclick="handle_saveHandling()">Save</button>
      </div>
    </div>
  </div>
</div>