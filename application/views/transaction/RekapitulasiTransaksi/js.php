<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
 
var table;

var handle_datatables = function () {
    //datatables
    table = $('#table').DataTable({ 

        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // converting to interger to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,.]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };

            // Update footer
            for (i=2; i < table.columns().header().length; i++) {
                $( api.column(i).footer()).html(handle_addCommas(api.column(i).data().reduce( function (a, b) { return intVal(a) + intVal(b); }, 0 )));
            }
        },
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "paging" : false,
        "sDom": '<"top"i>rt<"bottom"lp><"clear">',
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Transaction/RekapitulasiTransaksi/getRekapitulasiTransaksi')?>",
            "type": "POST",
            "data": function ( data ) {
                data.periodesasi = $('#periodesasi').val();
                data.daily = $('#start_date').val();
                data.monthly = $('#tahun').val()+'-'+$('#bulan').val();
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

var handle_addCommas = function (nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

var handle_periode = function () {
    var periodesasi = $('#periodesasi').val();
    var str_url = "<?=site_url('Transaction/RekapitulasiTransaksi/getBulanTahun/')?>";
    $('#periodesasi').on('change', function () {
        if ($('#periodesasi').val()=='harian') {
            $('#content-periode').load(str_url+'/0', function () {
                handle_datepicker();
            });
        } else {
            $('#content-periode').load(str_url+'/1');
        }
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
    handle_periode();
});
</script>