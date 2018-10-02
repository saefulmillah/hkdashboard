<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/parsley.css')?>">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="<?=base_url('assets/js/parsley.min.js')?>"></script>
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
            "url": "<?php echo site_url('Rtms/getRtms')?>",
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
    var str_url = "<?php echo site_url('Rtms/save')?>";
    // $('#myForm').parsley({
    //    errorClass: 'is-invalid text-danger',
    //    successClass: 'is-valid', // Comment this option if you don't want the field to become green when valid. Recommended in Google material design to prevent too many hints for user experience. Only report when a field is wrong.
    //    errorsWrapper: '<span class="invalid-feedback"></span>',
    //    errorTemplate: '<span></span>',
    //    trigger: 'change'
    // }).on('form:submit', function(e) {
    //     return true; 
    //     // Don't submit form for this demo
    //     // e.preventDefault();
    // });
    $.ajax({
        type: "POST",
        url: str_url,
        dataType: "json",
        data: $("#myForm").serialize(),
        success: function () {
            handle_main();
        }
    });
}

var handle_main = function () {
    main = "<?=site_url('Rtms/main')?>"
    $('#content-ajax').load(main, function () {
        handle_datatables();
        handle_datepicker();
    })
}

var handle_new = function () {
    main = "<?=site_url('Rtms/add')?>"
    $('#content-ajax').load(main, function () {
        handle_datepicker();
    })
}

var handle_datepicker = function () {
    $( function() {
        $( "#start_date, #end_date, #logged_time" ).datepicker({
            altFormat: "yy-mm-dd",
            dateFormat: "yy-mm-dd"
        }, function (start, end, label) {
            $('#start_date, #end_date').parsley().validate();
        });
    });
}
 
$(document).ready(function() {
    handle_main();
    // handle_submit();
});
</script>