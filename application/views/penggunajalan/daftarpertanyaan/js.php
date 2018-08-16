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
        // "paging" : false,
        // "sDom": '<"top"i>rt<"bottom"lp><"clear">',
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('PenggunaJalan/DaftarPertanyaan/getDaftarPertanyaan')?>",
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

var handle_datepicker = function () {
    $( function() {
        $("#start_date, #end_date" ).datepicker({
            altFormat: "yy-mm-dd",
            dateFormat: "yy-mm-dd"
        });
    });
}
 
$(document).ready(function() {
    handle_datatables();
    handle_datepicker();
});
</script>