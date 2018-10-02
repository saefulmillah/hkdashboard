<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
 
var table;

var handle_datatables = function () {
    //datatables
    table = $('#table').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "paging" : false,
        "sDom": '<"top"i>rt<"bottom"lp><"clear">',
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Lalulintas/Potholes/getPotholes')?>",
            "type": "POST",
            "data": function ( data ) {
                data.start_date = $('#start_date').val();
            }
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });

    $('#search').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
}

var handle_save = function () {
    var str_url = "<?php echo site_url('Lalulintas/Potholes/save')?>";
    $.ajax({
        type: "POST",
        url: str_url,
        dataType: "json",
        data: $("#myForm").serialize(),
        success: function (data) {
            console.log(data);
            handle_main();
        }
    });
}

var handle_saveHandling = function () {
    var str_url = "<?php echo site_url('Lalulintas/Potholes/saveHandling')?>";
    $.ajax({
        type: "POST",
        url: str_url,
        dataType: "json",
        data: $("#myFormModal").serialize(),
        success: function (data) {
            $('#myModal').modal('hide');
            // console.log(data);
            // handle_main();
        }
    });
}

var handle_main = function () {
    main = "<?=site_url('Lalulintas/Potholes/main')?>"
    $('#content-ajax').load(main, function () {
        handle_datatables();
        handle_datepicker();
    })
}

var handle_new = function () {
    main = "<?=site_url('Lalulintas/Potholes/add')?>"
    $('#content-ajax').load(main, function () {
        handle_datepicker();
    })
}

var handle_datepicker = function () {
    $( function() {
        $( "#start_date, #end_date, #event_time", ).datepicker({
            altFormat: "yy-mm-dd",
            dateFormat: "yy-mm-dd"
        });
    });
}

var handle_getPotholes = function ($id) {
    var str_url = "<?php echo site_url('Lalulintas/Potholes/getPotholeID/')?>";
    $.ajax({
        type: "POST",
        url: str_url,
        dataType: "json",
        data: {
                'id' : $id,
            },
        success: function (data) {
            $('#potholes_id').val($id);
        }
    });
}
 
$(document).ready(function() {
    handle_main();
    // handle_handling();
    // handle_submit();
});
</script>